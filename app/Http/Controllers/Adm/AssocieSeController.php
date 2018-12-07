<?php
namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssocieSe;

class AssocieSeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $return = ['title' => 'Associe-se | Formulário'];

        $associeSe = new AssocieSe();
        $return['associe-se'] = $associeSe->all();

        return view('adm.associe-se')->withReturn($return);
    }
}
