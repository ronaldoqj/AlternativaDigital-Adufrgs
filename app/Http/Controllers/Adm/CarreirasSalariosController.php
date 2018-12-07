<?php
namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarreiraSalario;
use App\Models\File;
use Classes\Helpers;
use Validator;
use DB;

class CarreirasSalariosController extends Controller
{
    private $msgErros = '';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id = null)
    {
        $return = ['title' => 'Carreiras e Salários'];
        $erros = false;
        $firstCall = true;

        // verifica se existe registro
        $vrf = new CarreiraSalario();
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
        $carreiraSalario = new CarreiraSalario();
        $return['carreiraSalario'] = $carreiraSalario->All()->first();

        $return['arquivo'] = ['nome' => '', 'path' => ''];
        if ( $return['carreiraSalario']->arquivo != '' ) {
            $fileOBJ = new File();
            $file = $fileOBJ->find($return['carreiraSalario']->arquivo);
            if ($file) {
                $return['arquivo']['nome'] = $file->name;
                $return['arquivo']['path'] = $file->namefilefull;
            }
        }

        if($erros)
        {
            return view('adm.carreiras-e-salarios')->withReturn($return)->withErrors($validator);
        }
        else
        {
            return view('adm.carreiras-e-salarios')->withReturn($return);
        }
    }

    private function validator($request)
    {
          switch ( $request->input('action') )
          {
              case 'register':
                  $rules = [ 'titulo' => 'nullable|max:240' ];
                  $messages = [ 'titulo.max' => 'Campo titulo não pode ter mais do que 240 caracteres.' ];
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
        $update = new CarreiraSalario();
        $update = $update->all()->first();
        $update->text = $request->input('text');
        $update->titulo = $request->input('titulo');
        $update->descritivo = $request->input('descritivo');

        if ( count($request->file('file'))  || $request->input('nome_arquivo') )
        {

            if ( count($request->file('file')) )
            {
                $this->delete($request);
                $params = [
                  'files' => $request->file('file'),
                  'model' => 'File',
                  'name'  => $request->input('nome_arquivo'),
                  'thumb' => false,
                  'path' => 'images/_CarreirasSalarios'
                ];
                $helpers = new Helpers;
                $idArray = $helpers->uploadFiles( $params );
                $update->arquivo = $idArray[0];
            }
            else
            {
                $files = new File();
                $file = $files->find($update->arquivo);
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
        $registerDelete = new CarreiraSalario();
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
