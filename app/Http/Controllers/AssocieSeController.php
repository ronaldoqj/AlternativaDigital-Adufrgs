<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AssocieSe;
use Mail;
use Exception;

class AssocieSeController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, $id = null, $title = null)
    {
        $return = ['title' => 'Associe-se'];
        $return['formSubmetido'] = false;

        $arrayForm = [];
        $arrayDependentes = [];
        if ($request->isMethod('post'))
        {
            $arrayForm['nome'] = $request->input('nome');
            $arrayForm['email'] = $request->input('email');
            $arrayForm['data_de_nascimento'] = $request->input('data_de_nascimento');
            $arrayForm['rg'] = $request->input('rg');
            $arrayForm['cpf'] = $request->input('cpf');
            $arrayForm['telefone'] = $request->input('telefone');
            $arrayForm['cep'] = $request->input('cep');
            $arrayForm['endereco'] = $request->input('endereco');
            $arrayForm['numero'] = $request->input('numero');
            $arrayForm['complemento'] = $request->input('complemento');
            $arrayForm['bairro'] = $request->input('bairro');
            $arrayForm['cidade'] = $request->input('cidade');
            $arrayForm['siape'] = $request->input('siape');
            $arrayForm['identificacao_unica'] = $request->input('identificacao_unica');
            $arrayForm['instituicao'] = $request->input('instituicao');
            $arrayForm['unidade'] = $request->input('unidade');
            $arrayForm['departamento'] = $request->input('departamento');
            $arrayForm['titulacao'] = $request->input('titulacao');
            $arrayForm['regime_de_trabalho'] = $request->input('regime_de_trabalho');
            $arrayForm['vinculo'] = $request->input('vinculo');
            $arrayForm['vinculoDetalhes'] = [];

            // Vinculo
            if ($request->input('vinculo') != '')
            {
                if ($request->input('data_de_aposentadoria') != '') { $arrayForm['vinculoDetalhes'][] = [ 'data_de_aposentadoria' => $request->input('data_de_aposentadoria')]; }
                if ($request->input('data_de_ingresso') != '') { $arrayForm['vinculoDetalhes'][] = [ 'data_de_ingresso' => $request->input('data_de_ingresso')]; }
                if ($request->input('data_de_termino_do_contrato') != '') { $arrayForm['vinculoDetalhes'][] = [ 'data_de_termino_do_contrato' => $request->input('data_de_termino_do_contrato')]; }
                if ($request->input('pensionista') != '') { $arrayForm['vinculoDetalhes'][] = [ 'pensionista' => $request->input('pensionista')]; }
                if ($request->input('data_de_obito') != '') { $arrayForm['vinculoDetalhes'][] = [ 'data_de_obito' => $request->input('data_de_obito')]; }
            }

            // Dependentes
            $arrayForm['dependentes'] = [];
            if ($request->input('idDependentes') > 0)
            {
                for ($i=1; $i < $request->input('idDependentes') + 1; $i++)
                {
                    if ($request->input('dependente-nome-'.$i))
                    {
                        $arrayDependentes[] = [ 'Nome'=> $request->input('dependente-nome-'.$i),
                                                'Vinculo' => $request->input('dependente-vinculo-'.$i),
                                                'TipoPensao' => $request->input('dependente-tipo-pensao-'.$i)
                                              ];
                    }
                }

                $arrayForm['dependentes'] = $arrayDependentes;
            }

            $arrayForm['data'] = date("d/m/Y H:i:s");

            try {
                $this->sendMail($arrayForm);
                $arrayForm['enviado'] = 'S';
            }
            catch(\Exception $e) {
                $arrayForm['enviado'] = 'N';
            }

            $this->cadastrar($arrayForm);
            $return['formSubmetido'] = true;
        }

        return view('associe-se')->withReturn($return);
    }

    private function cadastrar($arrayForm)
    {
        $associeSe = new AssocieSe();

        $associeSe->enviado = $arrayForm['enviado'];
        $associeSe->nome = $arrayForm['nome'];
        $associeSe->email = $arrayForm['email'];
        $associeSe->data_de_nascimento = $arrayForm['data_de_nascimento'];
        $associeSe->rg = $arrayForm['rg'];
        $associeSe->cpf = $arrayForm['cpf'];
        $associeSe->cep = $arrayForm['cep'];
        $associeSe->endereco = $arrayForm['endereco'];
        $associeSe->numero = $arrayForm['numero'];
        $associeSe->complemento = $arrayForm['complemento'];
        $associeSe->bairro = $arrayForm['bairro'];
        $associeSe->cidade = $arrayForm['cidade'];
        $associeSe->siape = $arrayForm['siape'];
        $associeSe->identificacao_unica = $arrayForm['identificacao_unica'];
        $associeSe->instituicao = $arrayForm['instituicao'];
        $associeSe->unidade = $arrayForm['unidade'];
        $associeSe->departamento = $arrayForm['departamento'];
        $associeSe->titulacao = $arrayForm['titulacao'];
        $associeSe->regime_de_trabalho = $arrayForm['regime_de_trabalho'];
        $associeSe->vinculo = $arrayForm['vinculo'];
        $associeSe->vinculoDetalhes = json_encode($arrayForm['vinculoDetalhes'], TRUE);
        $associeSe->dependentes = json_encode($arrayForm['dependentes'], TRUE);
        $associeSe->data = $arrayForm['data'];
        $associeSe->json = json_encode($arrayForm, TRUE);

        $associeSe->save();
    }

    public function sendMail($arrayForm)
    {
        // $this->mailSend = 'portal@portaladverso.com.br';
        $this->mailSend = 'portal@portaladverso.com.br';
        $this->mailFrom = $arrayForm['email'];
        $this->nomeSend = $arrayForm['nome'];

        // $user = User::findOrFail(auth()->id());
        $user = 'Usuário';

        Mail::send('emails.associa-se', ['user' => $user, 'parameters' => $arrayForm], function ($m) use ($user) {
            $m->from($this->mailFrom, 'ADFRGS | Formulário via site Associa-se, '. $this->nomeSend);
            $m->to($this->mailSend, $this->nomeSend)->subject($this->nomeSend);
        });
        return;
     }
}
