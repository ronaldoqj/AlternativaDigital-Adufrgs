<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CarreiraSalario;
use App\Models\File;

class CarreiraESalariosController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
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

        return view('carreira-e-salarios')->withReturn($return);
    }
}
