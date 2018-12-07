<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pagina;
use App\Models\Convenio;
use App\Models\ConvenioCategoria;
use App\Models\File;
use Classes\Helpers;

class ConveniosController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, $id = null, $title = null)
    {
        $return = ['title' => 'Convênios'];


        $pagina = new Pagina();
        $return['texto'] = $pagina->where('section', 'Texto Topo')->get()[0];

        $convenio = new Convenio();
        $return['convenios'] = $this->montaAcordeon( $convenio->listConveniosAdmListagem(), $id );

        return view('convenios')->withReturn($return);
    }

    private function montaAcordeon ($convenios, $id)
    {
        $return = [];
        $categoria = '';
        foreach ( $convenios as $convenio )
        {
            $ativo = $convenio->categoria == $id ? 'active' : '';
            if ($convenio->categoria != $categoria)
            {
                $string1  = '<li class="'.$ativo.'">';
                $string1 .= '   <div id="convenio'.$convenio->categoria.'" class="collapsible-header valign-wrapper"><a href="#convenio'.$convenio->categoria.'"></a>';
                $string1 .= '       <div class=""> <img class="responsive-img icone-convenio-branco" src="/'.$convenio->categoria_namefilefull.'" /> </div>';
                $string1 .=             $convenio->categoria_name_convenio;
                $string1 .= '       </div>';
                $string1 .= '       <div class="collapsible-body">';

                $string2  = '       <div class="clearfix"></div>';
                $string2 .= '   </div>';
                $string2 .= '</li>';

                $categoria = $convenio->categoria;
                $return[$categoria] = [ $string1,
                                        [],
                                        $string2 ];
            }

            $string  = '<div class="col s12 m6">';
            $string .= '     <div class="col s12 m3">';
            $string .= '         <img class="responsive-img" src="/'.$convenio->categoria_namefilefull.'"/>';
            $string .= '     </div>';
            $string .= '     <div class="col s12 m9">';
            $string .= '        <div class="title">'.$convenio->name.'</div>';
            $string .= '        <div class="texto">'.$convenio->description.'</div>';
            $string .= '        <div class="contatos">';
            $string .= '            <table>';
            if($convenio->endereco != '') {
            $string .= '                <tr>';
            $string .= '                    <td><div class="localizacao"></div></td>';
            $string .= '                    <td>'.$convenio->endereco.'</td>';
            $string .= '                </tr>';
            }
            if($convenio->fone != '') {
            $string .= '                <tr>';
            $string .= '                    <td><div class="fone"></div></td>';
            $string .= '                    <td>'.$convenio->fone.'</td>';
            $string .= '                </tr>';
            }
            if($convenio->email != '') {
            $string .= '                <tr>';
            $string .= '                    <td><div class="email"></div></td>';
            $string .= '                    <td>'.$convenio->email.'</td>';
            $string .= '                </tr>';
            }
            if($convenio->site != '') {
            $string .= '                <tr>';
            $string .= '                    <td><div class="site"></div></td>';
            $string .= '                    <td>'.$convenio->site.'</td>';
            $string .= '                </tr>';
            }
            $string .= '            </table>';
            $string .= '        </div>';
            $string .= '    </div>';
            $string .= '</div>';
            $return[$categoria][1][] = $string;
        }

        return $return;
    }
}
