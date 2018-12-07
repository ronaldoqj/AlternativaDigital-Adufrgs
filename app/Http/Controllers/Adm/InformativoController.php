<?php
namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informativo;
use App\Models\File;
use Validator;
use Classes\Helpers;

class InformativoController extends Controller
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
        $return = ['title' => 'Informativo'];
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

        $informativo = new Informativo();
        $return['informativo'] = $informativo->listInformativo();
        if($erros)
        {
          return view('adm.informativo')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.informativo')->withReturn($return);
          } else {
              return redirect('/adm/informativos'); //Adicionado o redirect para limpar o post
          }
        }

    }


    private function validator($request)
    {
        switch ( $request->input('action') )
        {
            case 'register':
                $rules = [
                    'codigo' => 'required|max:240',
                    'titulo' => 'required|max:240',
                    'nome_arquivo' => 'nullable|max:120'
                ];
                $messages = [
                    'codigo.required' => 'Campo informativo nº é obrigatório.',
                    'codigo.max' => 'Campo informativo nº não pode ter mais do que 240 caracteres.',
                    'titulo.required' => 'Campo titulo é obrigatório.',
                    'titulo.max' => 'Campo titulo não pode ter mais do que 240 caracteres.',
                    'nome_arquivo.max' => 'Campo nome do arquivo não pode ter mais do que 120 caracteres.'
                ];
                break;
            case 'edit':
                $rules = [
                    'codigo' => 'required|max:240',
                    'titulo' => 'required|max:240',
                    'nome_arquivo' => 'nullable|max:120'
                ];
                $messages = [
                    'codigo.required' => 'Campo informativo nº é obrigatório.',
                    'codigo.max' => 'Campo informativo nº não pode ter mais do que 240 caracteres.',
                    'titulo.required' => 'Campo titulo é obrigatório.',
                    'titulo.max' => 'Campo titulo não pode ter mais do que 240 caracteres.',
                    'nome_arquivo.max' => 'Campo nome do arquivo não pode ter mais do que 120 caracteres.'
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
        return $validator;
    }


    private function register(Request $request)
    {
          $register = new Informativo();
          $register->codigo = $request->input('codigo');
          $register->titulo = $request->input('titulo');
          $register->descricao = $request->input('descricao');

          $helpers = new Helpers;

          // -------------------------------------------------------------------
          // FileImageHeight
          // -------------------------------------------------------------------
          if (count($request->file('file')))
          {
              $params = [
                  'files' => $request->file('file'),
                  'model' => 'File',
                  'name'  => $request->input('nome_arquivo'),
                  'path' => 'images/_Informativo'
              ];
              $idArray = $helpers->uploadFiles( $params );
              $register->arquivo = $idArray[0];
          }
          $register->save();

          $order = new Informativo();
          $orderEdit = $order->find($register->id);
          $orderEdit->order = $register->id;
          $orderEdit->save();

        return true;
    }



    private function delete(Request $request)
    {
        $id = $request->input('id');
        $registerDelete = new Informativo();
        $delete = $registerDelete->find($id);

        if ($delete->arquivo)
        {
            $files = new File();
            $file = $files->find($delete->arquivo);
            $nameFileFull = $file->namefilefull;

            if (file_exists($nameFileFull) ) { unlink($nameFileFull); }

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
        $return = ['title' => 'Informativo / Atualizar'];
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

        $informativo = new Informativo();
        $return['informativo'] = $informativo->find($id);

        // Retorna a imagem prinpipal
        $file = new Informativo();
        $return['file'] = $file->returnFile($id);

        if( !is_numeric($id) || !$return['informativo'] ) {
            return redirect('/adm/informativos'); //Se não encontrar o registro volta para listagem
        }

        if($erros)
        {
          return view('adm.informativo-update')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.informativo-update')->withReturn($return);
          } else {
              return redirect('/adm/informativo-edit/'.$id); //Adicionado o redirect para limpar o post
          }
        }
    }

    private function order(Request $request)
    {
        $update = new Informativo();
        $edit = $update->all()->sortByDesc('order')->toArray();
        $orderNext = null;

        if ( count($edit) > 1 )
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


    private function deleteFile(Request $request)
    {

        switch ( $request->input('campo') )
        {
            case 'arquivo':
                $register = new Informativo();
                $delete = $register->find($request->input('id'));

                $files = new File();
                $file = $files->find($delete->arquivo);
                $nameFileFull = $file->namefilefull;

                if (file_exists($nameFileFull) ) { unlink($nameFileFull); }

                $file->delete();

                $delete->arquivo = null;
                $delete->save();
                break;
        }

        return true;
    }



    private function edit(Request $request)
    {
        $informativo = new Informativo();
        $edit = $informativo->find($request->input('id'));
        $edit->codigo = $request->input('codigo');
        $edit->titulo = $request->input('titulo');
        $edit->descricao = $request->input('descricao');

        $helpers = new Helpers();

        // -------------------------------------------------------------------
        // FileImageHeight
        // -------------------------------------------------------------------
        if ( count($request->file('file')) || $request->input('nome_arquivo') )
        {

            $files = new File();
            $file = $files->find($edit->arquivo);

            if (count($request->file('file')))
            {
                // Deleta imagem existente
                $nameFileFull = $file->namefilefull;

                if (file_exists($nameFileFull) ) { unlink($nameFileFull); }

                $file->delete();

                $params = [
                    'files' => $request->file('file'),
                    'model' => 'File',
                    'name'  => $request->input('nome_arquivo'),
                    'thumb' => false,
                    'path' => 'images/_Informativo'
                ];
                $idArray = $helpers->uploadFiles( $params );
                $edit->arquivo = $idArray[0];
            }
            else
            {
                if ( $file->count() )
                {
                  $file->name = $request->input('nome_arquivo');
                  $file->save();
                }
            }

        }

        $edit->save();
        return true;
    }

}
