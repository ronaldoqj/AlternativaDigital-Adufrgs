<?php
namespace App\Http\Controllers\Adm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagina;
use App\Models\Convenio;
use App\Models\ConvenioCategoria;
use App\Models\File;
use Classes\Helpers;
use Validator;
use DB;

class ConvenioController extends Controller
{
    private $msgErros = '';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $id = null)
    {
        $return = ['title' => 'Convênio / Convênios'];
        $erros = false;
        $firstCall = true;

        if ($request->isMethod('post'))
        {
            $firstCall = false;
            $validator = $this->validator($request);

            if (!$validator->fails())
            {
                switch ( $request->input('action') )
                {
                    case 'register':
                        $this->register($request);
                        break;
                    case 'order':
                        $this->order($request);
                        break;
                    case 'delete':
                        $this->delete($request);
                        break;
                }
            }
            else
            {
              $erros = true;
            }
        }

        $convenio = new Convenio();
        $return['convenios'] = $convenio->listConveniosAdmListagem();
        // dd($return['convenios']->toArray());
        $categorias = new ConvenioCategoria();
        $return['categorias'] = $categorias->listConvenioCategoria();
        if($erros)
        {
          return view('adm.convenio-convenios')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.convenio-convenios')->withReturn($return);
          } else {
              return redirect('/adm/convenio/convenios'); //Adicionado o redirect para limpar o post
          }
        }

    }

    private function validator($request)
    {
        switch ( $request->input('action') )
        {
            case 'register':
                $rules = [
                    'name' => 'required|max:240',
                    'categoria' => 'required',
                    'endereco' => 'nullable|max:240',
                    'fone' => 'nullable|max:30',
                    'email' => 'nullable|max:240',
                    'site' => 'nullable|max:240'
                ];
                $messages = [
                    'name.required' => 'Campo nome é obrigatório.',
                    'name.max' => 'Campo nome não pode ter mais do que 240 caracteres.',
                    'endereco.required' => 'Campo endereço é obrigatório.',
                    'fone.max' => 'Campo telefone não pode ter mais do que 30 caracteres.',
                    'email.max' => 'Campo email não pode ter mais do que 240 caracteres.',
                    'site.max' => 'Campo site não pode ter mais do que 240 caracteres.'
                ];
                break;
            case 'edit':
                $rules = [
                    'id' => 'required',
                    'name' => 'required|max:240',
                    'categoria' => 'required',
                    'endereco' => 'nullable|max:240',
                    'fone' => 'nullable|max:30',
                    'email' => 'nullable|max:240',
                    'site' => 'nullable|max:240'
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado.',
                    'name.required' => 'Campo nome é obrigatório.',
                    'name.max' => 'Campo nome não pode ter mais do que 240 caracteres.',
                    'endereco.required' => 'Campo endereço é obrigatório.',
                    'fone.max' => 'Campo telefone não pode ter mais do que 30 caracteres.',
                    'email.max' => 'Campo email não pode ter mais do que 240 caracteres.',
                    'site.max' => 'Campo site não pode ter mais do que 240 caracteres.'
                ];
                break;
            case 'delete':
                $rules = [
                    'id' => 'required'
                ];
                $messages = [
                    'id.required' => 'Nenhum registro informado!'
                ];
                break;
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        return $validator;
    }


    private function register(Request $request)
    {
        $register = new Convenio();
        $register->name = $request->input('name');
        $register->categoria = $request->input('categoria');
        $register->description = $request->input('description');
        $register->endereco = $request->input('endereco');
        $register->fone = $request->input('fone');
        $register->email = $request->input('email');
        $register->site = $request->input('site');
        $register->save();

        $order = new Convenio();
        $orderEdit = $order->find($register->id);
        $orderEdit->order = $register->id;
        $orderEdit->save();

        return true;
    }

    private function delete(Request $request)
    {
        $id = $request->input('id');
        $registerDelete = new Convenio();
        $delete = $registerDelete->find($id);
        $delete->delete();
        return true;
    }



    // ================================================================================
    // ========================== Edição dos Convenios ================================
    // ================================================================================


    public function update(Request $request, $id = null)
    {
        $return = ['title' => 'Convênio / Atualizar Convênios'];
        $erros = false;
        $firstCall = true;

        if ($request->isMethod('post'))
        {
            $firstCall = false;
            $validator = $this->validator($request);

            if (!$validator->fails())
            {
                switch ( $request->input('action') )
                {
                    case 'register':
                        $this->register($request);
                        break;
                    case 'edit':
                        $this->edit($request);
                        break;
                }
            }
            else
            {
              $erros = true;
            }
        }

        $convenio = new Convenio();
        $return['convenio'] = $convenio->find($id);

        $categorias = new ConvenioCategoria();
        $return['categorias'] = $categorias->listConvenioCategoria();

        // Retorna a imagem prinpipal
        $imagemPrincipal = new Convenio();
        $return['imagemPrincipal'] = $imagemPrincipal->returnImagemCategoria($id);


        if(!count($return['convenio']) || !$id) {
            return redirect('/adm/convenio/convenios'); //Se não encontrar o registro volta para listagem
        }

        if($erros)
        {
          return view('adm.convenio-convenios-update')->withReturn($return)->withErrors($validator);
        }
        else
        {
          if($firstCall) {
              return view('adm.convenio-convenios-update')->withReturn($return);
          } else {
              return redirect('/adm/convenio/convenios-edit/'.$id); //Adicionado o redirect para limpar o post
          }
        }
    }

    private function edit(Request $request)
    {
        $registers = new Convenio();
        $register = $registers->find($request->input('id'));
        $register->name = $request->input('name');
        $register->categoria = $request->input('categoria');
        $register->description = $request->input('description');
        $register->endereco = $request->input('endereco');
        $register->fone = $request->input('fone');
        $register->email = $request->input('email');
        $register->site = $request->input('site');
        $register->save();

        return true;
    }

    public function textoTopo(Request $request, $id = null)
    {
      $return = ['title' => 'Convênio / Texto Topo'];


      $pagina = new Pagina();
      $paginaVerifica = $pagina->where('section', 'Texto Topo');

      if ( !$paginaVerifica->count() ) {
          $pagina->section = 'Texto Topo';
          $pagina->save();
      }

      if ($request->isMethod('post'))
      {
          $update = new Pagina();
          $update = $update->where('section', 'Texto Topo')->get()[0];
          $update->text = $request->input('text');
          $update->save();
      }

      $pagina = new Pagina();
      $return['texto'] = $pagina->where('section', 'Texto Topo')->get()[0];

      return view('adm.convenio-texto-topo')->withReturn($return);
    }
}
