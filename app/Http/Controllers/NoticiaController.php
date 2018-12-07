<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Galeria;
use App\Models\GaleriaHasFileGaleria;
use App\Models\DocenteMateria;
use App\Models\File;

class NoticiaController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, $id = '', $title = '')
    {
        $return = ['id' => $id];
        $return = ['ExistsGaleria' => false];


        $materia = new DocenteMateria();
        $return['materia'] = $materia->listHomeMaterias(['id' => $id])->toArray()[0];

        if ( !count($return['materia']) ) {
            return redirect('/');
        }


        $GaleriaHasFileGaleria = new GaleriaHasFileGaleria();
        $GaleriaHasFileGaleria = $GaleriaHasFileGaleria->where('id_materia', $id)->get();


        if ( $GaleriaHasFileGaleria->count() )
        {
            $return['ExistsGaleria'] = true;
            $listGaleria = new GaleriaHasFileGaleria();
            $return['files'] = $listGaleria->listGaleriaSite($id);
        }

        return view('noticia')->withReturn($return);
    }
}
