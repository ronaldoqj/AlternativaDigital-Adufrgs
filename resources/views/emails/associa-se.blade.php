<table border="0" cellpadding="0" cellspacing="0" >
    <tr><td colspan="3"><h1><u>ASSOCIE-SE | Formulário via site</u></h1></td></tr>
    <tr><td><div style="height: 10px;"></div></td></tr>
    <tr>
        <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Nome:</b></td>
        <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
        <td style="background-color: #eeeeee;">{{ $parameters['nome'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap;"><b>E-Mail:</b></td>
        <td><div style="width: 5px;"></div></td>
        <td>{{ $parameters['email'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>RG:</b></td>
        <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
        <td style="background-color: #eeeeee;">{{ $parameters['rg'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap;"><b>CPF:</b></td>
        <td><div style="width: 5px;"></div></td>
        <td>{{ $parameters['cpf'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Endereço:</b></td>
        <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
        <td style="background-color: #eeeeee;">{{ $parameters['endereco'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap;"><b>Número:</b></td>
        <td><div style="width: 5px;"></div></td>
        <td>{{ $parameters['numero'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Complemento:</b></td>
        <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
        <td style="background-color: #eeeeee;">{{ $parameters['complemento'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap;"><b>Bairro:</b></td>
        <td><div style="width: 5px;"></div></td>
        <td>{{ $parameters['bairro'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Cidade:</b></td>
        <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
        <td style="background-color: #eeeeee;">{{ $parameters['cidade'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap;"><b>SIAPE Número:</b></td>
        <td><div style="width: 5px;"></div></td>
        <td>{{ $parameters['siape'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Identificação Única:</b></td>
        <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
        <td style="background-color: #eeeeee;">{{ $parameters['identificacao_unica'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap;"><b>Instituição:</b></td>
        <td><div style="width: 5px;"></div></td>
        <td>{{ $parameters['instituicao'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Unidade:</b></td>
        <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
        <td style="background-color: #eeeeee;">{{ $parameters['unidade'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap;"><b>Departamento:</b></td>
        <td><div style="width: 5px;"></div></td>
        <td>{{ $parameters['departamento'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Titulação:</b></td>
        <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
        <td style="background-color: #eeeeee;">{{ $parameters['titulacao'] }}</td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap;"><b>Regime de Trabalho:</b></td>
        <td><div style="width: 5px;"></div></td>
        <td>{{ $parameters['regime_de_trabalho'] }}</td>
    </tr>
    <tr>
        <td align="right" valign="top" style="white-space: nowrap; background-color: #eeeeee;"><b>Vinculos:</b></td>
        <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
        <td style="background-color: #eeeeee;">
            {{ $parameters['vinculo'] }}<br />
            @foreach( $parameters['vinculoDetalhes'] as $item )
                <b>{{key($item)}}:</b> {{$item[key($item)]}}<br />
            @endforeach
        </td>
    </tr>
    <tr>
        <td align="right" valign="top" style="white-space: nowrap;"><b>Dependentes:</b></td>
        <td><div style="width: 5px;"></div></td>
        <td>
            @foreach( $parameters['dependentes'] as $item )
                    @if($item['Nome'])
                        <b>Nome:</b> {{$item['Nome']}}<br />
                    @endif
                    @if($item['Vinculo'])
                        <b>Vinculo:</b> {{$item['Vinculo']}}<br />
                    @endif
                    @if($item['TipoPensao'])
                        <b>TipoPensao:</b> {{$item['TipoPensao']}}<br />
                    @endif

                    @if (!$loop->last)
                        <br />
                    @endif
            @endforeach
        </td>
    </tr>
    <tr>
        <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Data e Hora:</b></td>
        <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
        <td style="background-color: #eeeeee;">{{ $parameters['data'] }}</td>
    </tr>
</table>
