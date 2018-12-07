<?php
namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Juridico;
use DB;

class JuridicoController extends Controller
{
    private $msgErros = '';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id = null)
    {
        $return = ['title' => 'Jurídico'];
        $erros = false;
        $firstCall = true;

        // verifica se existe registro
        $vrf = new Juridico();
        if ( !$vrf->all()->count() ) { $vrf->save(); }

        // Post
        if ($request->isMethod('post'))
        {
              switch ( $request->input('action') )
              {
                  case 'register':
                      $this->register($request);
                      break;
              }
        }

        $juridico = new Juridico();
        $return['juridico'] = $juridico->All()->first();

        return view('adm.juridico')->withReturn($return);
    }

    private function register(Request $request)
    {
        $update = new Juridico();
        $update = $update->all()->first();
        $update->text = $request->input('text');

        $update->save();
        return true;
    }
}
