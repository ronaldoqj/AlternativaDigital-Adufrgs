<?php
namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DocenteAutor;
use App\Models\DocenteMateria;
use App\Models\File;
use Validator;
use Classes\Helpers;

class DocenteAutorController extends Controller
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
        $return = ['title' => 'DOCENTE / Autor'];
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

        $docenteAutor = new DocenteAutor();
        $return['docenteAutor'] = $docenteAutor->listDocenteAutor();
        if($erros)
        {
          return view('adm.docente-autor')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.docente-autor')->withReturn($return);
          } else {
              return redirect('/adm/docente/autor'); //Adicionado o redirect para limpar o post
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
                    'profession' => 'nullable|max:140',
                    'link' => 'nullable|max:240',
                    'file.*' => 'nullable|image|dimensions:min_width=100,min_height=100',
                    'link' => 'nullable|max:240'
                ];
                $messages = [
                    'name.required' => 'Campo nome é obrigatório.',
                    'name.max' => 'Campo nome não pode ter mais do que 240 caracteres.',
                    'profession.max' => 'Campo profissão não pode ter mais do que 140 caracteres.',
                    'link.max' => 'Campo link não pode ter mais do que 240 caracteres.',
                    'file.*.image' => 'Para o campo só é permitido arquivos do tipo imagem.',
                    'file.*.dimensions' => 'Para o a imagem não pode ser de dimensões inferiores que 100x100.',
                    'link.max' => 'Campo link não pode ter mais do que 240 caracteres.'
                ];
                break;
            case 'edit':
                $rules = [
                    'id' => 'required',
                    'name' => 'required|max:240',
                    'profession' => 'nullable|max:140',
                    'link' => 'nullable|max:240',
                    'file.*' => 'nullable|image|dimensions:min_width=100,min_height=100',
                    'link' => 'nullable|max:240'
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado.',
                    'name.required' => 'Campo nome é obrigatório.',
                    'name.max' => 'Campo nome não pode ter mais do que 240 caracteres.',
                    'profession.max' => 'Campo profissão não pode ter mais do que 140 caracteres.',
                    'link.max' => 'Campo link não pode ter mais do que 240 caracteres.',
                    'file.*.image' => 'Para o campo imagem só é permitido arquivos do tipo imagem.',
                    'file.*.dimensions' => 'Imagens não podem terem dimensões inferiores que 100x100.',
                    'link.max' => 'Campo link não pode ter mais do que 240 caracteres.'
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
                    'campo' => 'required',
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado!',
                    'campo.required' => 'Não foi possivel indentificar o campo a ser excluído!',
                ];
                break;
            case 'order':
                $rules = [
                  'id' => 'required',
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado!',
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
        $autor = new DocenteAutor();
        $item = $autor->find($request->input('id'));
        $nameAuthor = $item->name;
        $this->msgErros = '';

        if (!$item)
        {
            $erro = true;
            $Mensagem = 'Não foi encontrado nenhum autor';
            $this->msgErros = $Mensagem;
        }
        else
        {
            // Verifica Programação
            $Verifica = new DocenteMateria();
            $itemMateria = $Verifica->where('autor', $request->input('id'))->get();
            $Mensagem = '';

            if( count($itemMateria) )
            {
                $erro = true;
                $Mensagem .= 'O autor "'.$nameAuthor.'" está sendo utilizada nas seguintes matérias:';
                $Mensagem .= '<ul>';

                foreach($itemMateria as $item)
                {
                    $Mensagem .= '<li>'. $item->title .'.</li>';
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
          $register = new DocenteAutor();
          $register->name = $request->input('name');
          $register->profession = $request->input('profession');
          $register->link = $request->input('link');
          $register->text = $request->input('text');

          $helpers = new Helpers;

          // -------------------------------------------------------------------
          // FileImageHeight
          // -------------------------------------------------------------------
          if (count($request->file('file')))
          {
              $params = [
                  'files' => $request->file('file'),
                  'model' => 'File',
                  'thumb' => true,
                  'path' => 'images/_DocenteAutor',
                  'pathThumb' => 'images/_DocenteAutor/_Thumbs'
              ];
              $idArray = $helpers->uploadImages( $params );
              $register->image = $idArray[0];
          }
          $register->save();

          $order = new DocenteAutor();
          $orderEdit = $order->find($register->id);
          $orderEdit->order = $register->id;
          $orderEdit->save();

        return true;
    }



    private function delete(Request $request)
    {

        $id = $request->input('id');
        $registerDelete = new DocenteAutor();
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

    public function updateDocenteAutor(Request $request, $id = null)
    {
        $return = ['title' => 'DOCENTE / Atualizar Autor'];
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

        $docenteAutor = new DocenteAutor();
        $return['docenteAutor'] = $docenteAutor->find($id);

        // Retorna a imagem prinpipal
        $image = new DocenteAutor();
        $return['image'] = $image->returnaImage($id);

        if(!is_numeric($id) || !$return['docenteAutor']->count() || !$id) {
            return redirect('/adm/docente/autor'); //Se não encontrar o registro volta para listagem
        }

        if($erros)
        {
          return view('adm.docente-autor-update')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.docente-autor-update')->withReturn($return);
          } else {
              return redirect('/adm/docente/autor-edit/'.$id); //Adicionado o redirect para limpar o post
          }
        }
    }

    private function order(Request $request)
    {
        $update = new DocenteAutor();
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
                $register = new DocenteAutor();
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
          $docenteAutor = new DocenteAutor();
          $edit = $docenteAutor->find($request->input('id'));
          $edit->name = $request->input('name');
          $edit->profession = $request->input('profession');
          $edit->link = $request->input('link');
          $edit->text = $request->input('text');

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
                  $nameFileFullThumb = $file->namefilefullthumb;

                  if (file_exists($nameFileFull) ) { unlink($nameFileFull); }
                  if (file_exists($nameFileFullThumb) ) { unlink($nameFileFullThumb); }

                  $file->delete();
              }

              $params = [
                  'files' => $request->file('file'),
                  'model' => 'File',
                  'thumb' => true,
                  'path' => 'images/_DocenteAutor',
                  'pathThumb' => 'images/_DocenteAutor/_Thumbs'
              ];
              $idArray = $helpers->uploadImages( $params );
              $edit->image = $idArray[0];
          }
          $edit->save();


        return true;
    }

}
