<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Juridico;

class JuridicoController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, $id = null, $title = null)
    {
        $return = ['title' => 'Jurídico'];

        $juridico = new Juridico();
        $return['juridico'] = $juridico->All()->first();
        return view('juridico')->withReturn($return);
    }
}
