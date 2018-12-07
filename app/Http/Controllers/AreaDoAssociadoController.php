<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AreaDoAssociadoController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, $id = null, $title = null)
    {
        $return = ['title' => 'Area do associado'];

        return view('area-do-associado')->withReturn($return);
    }
}
