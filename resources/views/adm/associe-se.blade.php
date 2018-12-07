<?php
   $associeSe = $return['associe-se'];
?>
@extends('layouts.adm')
@section('js')
@endsection


@section('css')
  <style>
      .card { margin-bottom: 1px; }
      .enviado { background-color: #003d0099; color: white; }
      .nao-enviado { background-color: #8f090099; color: white; }

      .associe-se .card-header { padding: 0; cursor: pointer; }
      .associe-se .card-header:hover { background-color: #eee; }
      .associe-se .card-header:hover button { color: #333; }
      .associe-se table { width: 100%; border: solid 1px #ccc; }
      .associe-se .aviso { padding: 0; text-align: center; margin: 0; }
  </style>
@endsection

@section('content')

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <h5 class="text-center m-b-20"><strong>Erro ao concluir a requisição!</strong></h5>

  <ul>
      @foreach ($errors->all() as $error)
          <li>{!! $error !!}</li>
      @endforeach
  </ul>

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
              <div>
                  <div class="card">
                      <div class="card-header">
                          Listagem dos cadastros
                      </div>
                      <div class="card-body associe-se">
                            @if($associeSe->count())
                            <div class="accordion" id="accordionExample">
                            @endif
                                @forelse ($associeSe as $register)
                                    <?php
                                    ?>

                                    <div class="card" style="border-color: {{ $register['enviado'] == 'S' ? '#003d00' : '#8f0900' }};">
                                        <div class="card-header" id="heading{{$loop->iteration}}" data-toggle="collapse" data-target="#collapse{{$loop->iteration}}" aria-expanded="false" aria-controls="collapse{{$loop->iteration}}">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button">
                                                    {{explode(" ", $register->data)[0]  }} - {{$register->nome}}, {{$register->email}}
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse{{$loop->iteration}}" class="collapse" aria-labelledby="heading{{$loop->iteration}}" data-parent="#accordionExample">
                                            <div class="card-body">


                                                    <table border="0" cellpadding="0" cellspacing="0" >
                                                        <tr>
                                                            <td class="{{ $register['enviado'] == 'S' ? 'enviado' : 'nao-enviado' }}" align="right" style="white-space: nowrap;"><b>Enviado Por E-Mail:</b></td>
                                                            <td class="{{ $register['enviado'] == 'S' ? 'enviado' : 'nao-enviado' }}"><div style="width: 5px;"></div></td>
                                                            <td class="{{ $register['enviado'] == 'S' ? 'enviado' : 'nao-enviado' }}">{{ $register['enviado'] == 'S' ? 'Sim' : 'Não' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Nome:</b></td>
                                                            <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
                                                            <td style="background-color: #eeeeee;">{{ $register['nome'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap;"><b>E-Mail:</b></td>
                                                            <td><div style="width: 5px;"></div></td>
                                                            <td>{{ $register['email'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>RG:</b></td>
                                                            <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
                                                            <td style="background-color: #eeeeee;">{{ $register['rg'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap;"><b>CPF:</b></td>
                                                            <td><div style="width: 5px;"></div></td>
                                                            <td>{{ $register['cpf'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Endereço:</b></td>
                                                            <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
                                                            <td style="background-color: #eeeeee;">{{ $register['endereco'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap;"><b>Número:</b></td>
                                                            <td><div style="width: 5px;"></div></td>
                                                            <td>{{ $register['numero'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Complemento:</b></td>
                                                            <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
                                                            <td style="background-color: #eeeeee;">{{ $register['complemento'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap;"><b>Bairro:</b></td>
                                                            <td><div style="width: 5px;"></div></td>
                                                            <td>{{ $register['bairro'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Cidade:</b></td>
                                                            <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
                                                            <td style="background-color: #eeeeee;">{{ $register['cidade'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap;"><b>SIAPE Número:</b></td>
                                                            <td><div style="width: 5px;"></div></td>
                                                            <td>{{ $register['siape'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Identificação Única:</b></td>
                                                            <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
                                                            <td style="background-color: #eeeeee;">{{ $register['identificacao_unica'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap;"><b>Instituição:</b></td>
                                                            <td><div style="width: 5px;"></div></td>
                                                            <td>{{ $register['instituicao'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Unidade:</b></td>
                                                            <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
                                                            <td style="background-color: #eeeeee;">{{ $register['unidade'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap;"><b>Departamento:</b></td>
                                                            <td><div style="width: 5px;"></div></td>
                                                            <td>{{ $register['departamento'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap; background-color: #eeeeee;"><b>Titulação:</b></td>
                                                            <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
                                                            <td style="background-color: #eeeeee;">{{ $register['titulacao'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="white-space: nowrap;"><b>Regime de Trabalho:</b></td>
                                                            <td><div style="width: 5px;"></div></td>
                                                            <td>{{ $register['regime_de_trabalho'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" valign="top" style="white-space: nowrap; background-color: #eeeeee;"><b>Vinculos:</b></td>
                                                            <td style="background-color: #eeeeee;"><div style="width: 5px;"></div></td>
                                                            <td style="background-color: #eeeeee;">
                                                                {{ $register['vinculo'] }}<br />
                                                                @foreach( json_decode($register['vinculoDetalhes'], true) as $item )
                                                                    <b>{{key($item)}}:</b> {{$item[key($item)]}}<br />
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" valign="top" style="white-space: nowrap;"><b>Dependentes:</b></td>
                                                            <td><div style="width: 5px;"></div></td>
                                                            <td>
                                                                @foreach( json_decode($register['dependentes'], true) as $item )
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
                                                            <td style="background-color: #eeeeee;">{{ $register['data'] }}</td>
                                                        </tr>
                                                    </table>



                                            </div>
                                        </div>
                                    </div>

                                    {{--dd($loop->iteration)--}}
                                @empty
                                    <p class="aviso">Nenhum cadastro realizado até o momento.</p>
                                @endforelse
                          @if($associeSe->count())
                          </div>
                          @endif
                    </div>


                </div>

            </div>
    </div>
  </div>
</div>

@endsection
