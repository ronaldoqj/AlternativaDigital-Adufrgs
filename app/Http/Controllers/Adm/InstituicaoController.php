<?php
namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instituicao;
use App\Models\File;
use Classes\Helpers;
use Validator;
use DB;

class InstituicaoController extends Controller
{
    private $msgErros = '';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id = null)
    {
        $return = ['title' => 'Instituição'];
        $erros = false;
        $firstCall = true;

        // verifica se existe registro
        $vrf = new Instituicao();
        if ( !$vrf->all()->count() ) { $vrf->save(); }

        // Post
        if ($request->isMethod('post'))
        {
            $validator = $this->validator($request);

            if (!$validator->fails())
            {

                switch ( $request->input('action') )
                {
                    case 'register':
                        $this->register($request);
                        break;
                    case 'delete-file':
                        $this->delete($request);
                        break;
                }
            }
            else
            {
                $erros = true;
            }
        }
        $instituicao = new Instituicao();
        $return['instituicao'] = $instituicao->All()->first();

        $return['arquivo'] = ['nome' => '', 'path' => ''];
        if ( $return['instituicao']->arquivo != '' ) {
            $fileOBJ = new File();
            $file = $fileOBJ->find($return['instituicao']->arquivo);
            if ($file) {
                $return['arquivo']['nome'] = $file->name;
                $return['arquivo']['path'] = $file->namefilefull;
            }
        }

        if($erros)
        {
            return view('adm.instituicao')->withReturn($return)->withErrors($validator);
        }
        else
        {
            return view('adm.instituicao')->withReturn($return);
        }
    }

    private function validator($request)
    {

          switch ( $request->input('action') )
          {
              case 'register':
                  $rules = [
                      'titulo' => 'required|max:240',
                      'nome_arquivo' => 'nullable|max:120'
                  ];
                  $messages = [
                      'titulo.required' => 'Campo titulo é obrigatório.',
                      'titulo.max' => 'Campo titulo não pode ter mais do que 240 caracteres.',
                      'nome_arquivo.max' => 'Campo nome do arquivo não pode ter mais do que 120 caracteres.'
                  ];
                  break;
              case 'delete-file':
                  $rules = [
                      'id' => 'required',
                      'campo' => 'required',
                  ];
                  $messages = [
                      'id.required' => 'Nenhum registro informado!',
                      'campo.required' => 'Não foi possivel indentificar o campo a ser excluído!',
                  ];
                  break;
          }

          $validator = Validator::make($request->all(), $rules, $messages);
          return $validator;
    }


    private function register(Request $request)
    {
        $update = new Instituicao();
        $update = $update->all()->first();
        $update->titulo = $request->input('titulo');
        $update->subtitulo = $request->input('subtitulo');
        $update->text = $request->input('text');

        if ( count($request->file('file')) )
        {
            $this->delete($request);
            $params = [
                'files' => $request->file('file'),
                'model' => 'File',
                'name'  => $request->input('nome_arquivo'),
                'thumb' => false,
                'path' => 'images/_Instituicao'
            ];
            $helpers = new Helpers;
            $idArray = $helpers->uploadFiles( $params );
            $update->arquivo = $idArray[0];
        }
        else
        {
            $files = new File();
            $file = $files->find($update->arquivo);

            if ( $file->count() )
            {
              $file->name = $request->input('nome_arquivo');
              $file->save();
            }
        }
        $update->save();
        return true;
    }


    private function delete(Request $request)
    {
        $id = $request->input('id');
        $registerDelete = new Instituicao();
        $delete = $registerDelete->find($id);

        if ($delete->arquivo)
        {
            $files = new File();
            $file = $files->find($delete->arquivo);

            if ($file) {
                $nameFileFull = $file->namefilefull;

                if (file_exists($nameFileFull) ) { unlink($nameFileFull); }

                $file->delete();
                $delete->arquivo = null;
                $delete->save();
            }
        }

        return true;
    }

}
