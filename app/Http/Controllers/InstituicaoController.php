<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Instituicao;
use App\Models\Informativo;
use App\Models\File;

class InstituicaoController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, $id = null, $title = null)
    {
        $return = ['title' => 'Instituicao'];

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

        $informativo = new Informativo();
        $return['informativo'] = $informativo->listInformativo();

        return view('instituicao')->withReturn($return);
    }
}
