<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Banner1;
use App\Models\Banner2;
use App\Models\DocenteMateria;
use App\Models\Convenio;
use App\Models\DocenteAutor;
use App\Models\Informativo;

class WelcomeController extends Controller
{
    public function __construct() { }

    public function index()
    {
        $return = ['title' => 'Matérias'];

        $banner1 = new Banner1();
        $return['banner1'] = $banner1->listBanner1();
        $banner2 = new Banner2();
        $return['banner2'] = $banner2->listBanner2();

        $materias = new DocenteMateria();
        $return['materias'] = $materias->listHomeMaterias(['limit' => 3]);
        // $return['materias'] = $materias->listHomeMaterias();

        $materiasJson = new DocenteMateria();
        $return['materiasJson'] = json_encode($materiasJson->listHomeMaterias(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

        $convenio = new Convenio();
        $return['convenios'] = $convenio->listHomeConvenios(['sort' => true, 'limit' => 5]);

        $informativo = new Informativo();
        $return['informativo'] = $informativo->listInformativo(['sort' => true, 'limit' => 5]);

        return view('welcome')->withReturn($return);
    }

    public function ajax_selectMaterias() {

        $materiasJson = new DocenteMateria();
        $materias = json_encode($materiasJson->listHomeMaterias(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        return $materias;
    }
}
