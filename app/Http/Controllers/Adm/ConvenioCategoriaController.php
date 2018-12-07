<?php
namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConvenioCategoria;
use App\Models\Convenio;
use App\Models\File;
use Validator;
use Classes\Helpers;

class ConvenioCategoriaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $return = ['title' => 'Convênio / Categorias'];
        $erros = false;
        $firstCall = true;


        if ($request->isMethod('post'))
        {
            $firstCall = false;
            $validator = $this->validator($request);

            if (!$validator->fails())
            {
                switch ( $request->input('action') )
                {
                    case 'register':
                        $this->register($request);
                        break;
                    case 'order':
                        $this->order($request);
                        break;
                    case 'delete':
                        $this->delete($request);
                        break;
                }
            }
            else
            {
              $erros = true;
            }
        }

        $convenioCategoria = new ConvenioCategoria();
        $return['convenio-categorias'] = $convenioCategoria->listConvenioCategoria();
        if($erros)
        {
          return view('adm.convenio-categorias')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.convenio-categorias')->withReturn($return);
          } else {
              return redirect('/adm/convenio/categorias'); //Adicionado o redirect para limpar o post
          }
        }

    }


    private function validator($request)
    {
        switch ( $request->input('action') )
        {
            case 'register':
                $rules = [
                    'name' => 'required|max:240',
                    'file.*' => 'nullable|image|dimensions:min_width=5,min_height=5'
                ];
                $messages = [
                    'name.required' => 'Campo nome é obrigatório.',
                    'name.max' => 'Campo nome não pode ter mais do que 240 caracteres.',
                    'file.*.image' => 'Para o campo Logo só é permitido arquivos do tipo imagem.',
                    'file.*.dimensions' => 'Para o Logo a imagem não pode ser de dimensões inferiores que 5x5.'
                ];
                break;
            case 'edit':
                $rules = [
                    'id' => 'required',
                    'name' => 'required|max:240',
                    'file.*' => 'nullable|image|dimensions:min_width=5,min_height=5'
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado.',
                    'name.required' => 'Campo nome é obrigatório.',
                    'name.max' => 'Campo nome não pode ter mais do que 240 caracteres.',
                    'file.*.image' => 'Para o campo imagem logo só é permitido arquivos do tipo imagem.',
                    'file.*.dimensions' => 'Para a imagem logo a imagem não pode ser de dimensões inferiores que 5x5.'
                ];
                break;
            case 'delete':
                $rules = [
                    'id' => 'required'
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado!'
                ];
                break;
            case 'delete-image':
                $rules = [
                    'id' => 'required',
                    'campo' => 'required'
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado!',
                    'campo.required' => 'Não foi possivel indentificar o campo a ser excluído!'
                ];
                break;
            case 'order':
                $rules = [
                  'id' => 'required'
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado!'
                ];
                break;
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if($request->input('action') == 'delete')
        {
            $validator = $this->validaDelete($request, $validator);
        }

        return $validator;
    }


    private function validaDelete (Request $request, $validator)
    {
        $erro = false;
        $Mensagem = '';
        $Categoria = new ConvenioCategoria();
        $item = $Categoria->find($request->input('id'));
        $nameCategory = $item->name;
        $this->msgErros = '';

        if (!$item)
        {
            $erro = true;
            $Mensagem = 'Não foi encontrado nenhuma categoria';
            $this->msgErros = $Mensagem;
        }
        else
        {
            // Verifica Programação
            $Verifica = new Convenio();
            $itemConvenio = $Verifica->where('categoria', $request->input('id'))->get();
            $Mensagem = '';

            if( count($itemConvenio) )
            {
                $erro = true;
                $Mensagem .= 'A categoria "'.$nameCategory.'" está sendo utilizada nos seguintes convênios:';
                $Mensagem .= '<ul>';

                foreach($itemConvenio as $item)
                {
                    $Mensagem .= '<li>'. $item->name .'.</li>';
                }

                $Mensagem .= '</ul>';
            }
        }

        $this->msgErros = $Mensagem;
        if($erro)
        {
            $validator->after(function ($validator) {
                $validator->errors()->add('field', $this->msgErros);
            });
        }

        return $validator;
    }


    private function register(Request $request)
    {
          $register = new ConvenioCategoria();
          $register->name = $request->input('name');

          $helpers = new Helpers;

          // -------------------------------------------------------------------
          // FileImageHeight
          // -------------------------------------------------------------------
          if (count($request->file('file')))
          {
              $params = [
                  'files' => $request->file('file'),
                  'model' => 'File',
                  'thumb' => false,
                  'path' => 'images/_ConvenioCategoria'
              ];
              $idArray = $helpers->uploadImages( $params );
              $register->image = $idArray[0];
          }
          $register->save();

          $order = new ConvenioCategoria();
          $orderEdit = $order->find($register->id);
          $orderEdit->order = $register->id;
          $orderEdit->save();

        return true;
    }



    private function delete(Request $request)
    {
        $id = $request->input('id');
        $registerDelete = new ConvenioCategoria();
        $delete = $registerDelete->find($id);

        if ($delete->image)
        {
            $files = new File();
            $file = $files->find($delete->image);
            $nameFileFull = $file->namefilefull;
            $nameFileFullThumb = $file->namefilefullthumb;

            if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
            if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }

            $file->delete();
        }

        // Deleta a Galeria reaproveitando a função delete galerias feita no editar abaixo

        $delete->delete();
        return true;
    }



    // ================================================================================
    // ============================= Edição das casas =================================
    // ================================================================================

    public function update(Request $request, $id = null)
    {
        $return = ['title' => 'Convênio / Atualizar Categorias'];
        $erros = false;
        $firstCall = true;

        if ($request->isMethod('post'))
        {
            $firstCall = false;
            $validator = $this->validator($request);

            if (!$validator->fails())
            {
                switch ( $request->input('action') )
                {
                    case 'register':
                        $this->register($request);
                        break;
                    case 'edit':
                        $this->edit($request);
                        break;
                    case 'delete-image':
                        $this->deleteImage($request);
                        break;
                }
            }
            else
            {
              $erros = true;
            }
        }

        $convenioCategoria = new ConvenioCategoria();
        $return['convenio-categoria'] = $convenioCategoria->find($id);

        // Retorna a imagem prinpipal
        $image = new ConvenioCategoria();
        $return['image'] = $image->returnaImage($id);

        if(!is_numeric($id) || !$return['convenio-categoria']->count() || !$id) {
            return redirect('/adm/convenio/categorias'); //Se não encontrar o registro volta para listagem
        }

        if($erros)
        {
          return view('adm.convenio-categorias-update')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.convenio-categorias-update')->withReturn($return);
          } else {
              return redirect('/adm/convenio/categorias-edit/'.$id); //Adicionado o redirect para limpar o post
          }
        }
    }

    private function order(Request $request)
    {
        $update = new ConvenioCategoria();
        $edit = $update->all()->sortByDesc('order')->toArray();
        $orderNext = null;

        if( count($edit) > 1 )
        {
            for($i = 0; $i < count($edit); $i++)
            {
                if(isset($edit[$i+1]))
                {
                    $orderNext = $edit[$i+1]['order'];

                    $next = $update->find($edit[$i+1]['id']);
                    $next->order = $edit[$i]['order'];
                    $next->save();

                    $atual = $update->find($edit[$i]['id']);
                    $atual->order = $orderNext;
                    $atual->save();
                    return true;
                }
            }
        }

        return true;
    }


    private function deleteImage(Request $request)
    {

        switch ( $request->input('campo') )
        {
            case 'Image':
                $register = new ConvenioCategoria();
                $delete = $register->find($request->input('id'));

                $files = new File();
                $file = $files->find($delete->image);
                $nameFileFull = $file->namefilefull;
                $nameFileFullThumb = $file->namefilefullthumb;

                if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
                if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }

                $file->delete();

                $delete->image = null;
                $delete->save();
                break;
        }

        return true;

    }



    private function edit(Request $request)
    {
          $convenioCategoria = new ConvenioCategoria();
          $edit = $convenioCategoria->find($request->input('id'));
          $edit->name = $request->input('name');

          $helpers = new Helpers();

          // -------------------------------------------------------------------
          // FileImageHeight
          // -------------------------------------------------------------------
          if (count($request->file('file')))
          {
              if ($edit->image)
              {
                  // Deleta imagem existente
                  $files = new File();
                  $file = $files->find($edit->image);
                  $nameFileFull = $file->namefilefull;

                  if (file_exists($nameFileFull) ) { unlink($nameFileFull); }

                  $file->delete();
              }

              $params = [
                  'files' => $request->file('file'),
                  'model' => 'File',
                  'thumb' => false,
                  'path' => 'images/_ConvenioCategoria'
              ];
              $idArray = $helpers->uploadImages( $params );
              $edit->image = $idArray[0];
          }
          $edit->save();


        return true;
    }

}
