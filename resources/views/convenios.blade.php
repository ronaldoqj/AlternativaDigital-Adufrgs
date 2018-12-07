<?php
    $register = $return;
    $text = $register['texto'];
    $convenios = $return['convenios'];
?>
@extends('layouts.site')

@section('css')
    <link href="/css/pages/internas.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/pages/convenios.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('js')
    <script src="/js/pages/internas.js"></script>
    <script src="/js/pages/convenios.js"></script>
@endsection

@section('content')
<div class="clearfix"></div>

<!-- ======================================================================= -->
<!-- Topo                                                                    -->
<!-- ======================================================================= -->

<div class="container noticia-padding normal box-conteudo">
    <div class="title-pages">Convênios</div>
    <div class="noticia">
    <div class="row">
        <div class="topo-noticia">
          <div class="box-amplia-social">
              <div class="amplia-fonte">
                  <p>Ampliar fonte</p>
                  <ul>
                      <li id="menos" rel="noticia"><a>-</a></li>
                      <li>A</li>
                      <li id="mais" rel="noticia"><a>+</a></li>
                  </ul>
              </div>
          </div>
        </div>
        <div class="conteudo">
            <div class="paragrafos">
                <p class="title-texto"></p>
                {!!$text->text!!}
                <p class="texto-segido-titlo">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac lectus lorem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque posuere, felis at consectetur fringilla, felis nisi molestie magna, ut ultricies purus augue quis justo. Praesent ornare turpis a scelerisque gravida. Donec rhoncus arcu quis consectetur scelerisque.
                </p>
            </div>

            {{-- ========================================================== --}}
            {{-- ======================= Convenios ======================== --}}
            {{-- ========================================================== --}}

            <ul class="collapsible m-t-60">

              @foreach ( $convenios as $convenio )
                  {!!$convenio[0]!!}
                  @foreach ( $convenio[1] as $itens )
                      {!!$itens!!}
                  @endforeach
                  {!!$convenio[2]!!}
              @endforeach

              <?php /*
              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/cinema_branco.png" /> </div>
                      Cinema
                  </div>
                  <div class="collapsible-body">
                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/cinema.png" />
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Guion</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Ingressos a R$ 17,00 (dezessete reais), válidos para todos os dias e sessões. Venda nas sedes da ADUFRGS. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Centro Comercial Nova Olaria</td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3335 3535</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>email@email.com.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.site.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/cinema.png"/>
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Arteplex</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Ingressos a R$ 14,00 (quatorze reais), válidos para todos os dias e sessões. Venda nas sedes da ADUFRGS. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Shopping Bourbon Country</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3335 3535</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>email@email.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.site.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>


                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/cinema.png"/>
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Gnc Cinemas</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Ingressos a R$ 14,00 (quatorze reais), válidos para todos os dias e sessões. Venda nas sedes da ADUFRGS. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Shopping Praia de Belas, Shopping Iguatemi, Shopping Lindoia e Moinhos Shopping</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3335 3535</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>email@email.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.site.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>


              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/clubes_branco.png" /> </div>
                      Clubes e Turismo
                  </div>
                  <div class="collapsible-body">
                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/clubes.png" />
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">AABB Porto Alegre</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS o valor da mensalidade é R$210,50 (duzentos e dez reais e cinquenta centavos). Este valor é para associado e mais dependentes de até 24 anos. Após os 24 anos de idade o dependente pode tornar-se "dependente pago", até completar 30 anos, pagando o valor mensal de R$ 71,50 (setenta e um reais e cinquenta centavos). Para informações mais detalhadas, confira aqui o contrato. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Rua Coronel Marcos, n. 1000 <br> Ipanema - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3335 3535</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>email@email.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.site.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/clubes.png" />
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Adesbam</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferece estrutura de lazer (colônia de férias, quadras esportivas e demais serviços) em Porto Alegre, Torres, Florianópolis e Itanhaém (SP), mediante pagamento das taxas de utilização. Para informações mais detalhadas, confira aqui o contrato. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Rua dos Andradas n. 943 (11º andar) <br> Centro Histórico - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3211 4661</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>email@email.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.site.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>


                       <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/clubes.png" />
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Sogipa</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS, oferece o beneficio de 2 meses de musculação gratuito ao titular do plano ou a um dependente, oferece também desconto de 10% no pagamento da mensalidade do plano contratado, mediante apresentação da carteira de sócio. Para informações mais detalhadas, confira aqui o contrato. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Rua Barão de Cotegipe n. 400 <br> São João - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3325 7200</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>email@email.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.site.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>


              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/educacao_branco.png" /> </div>
                      Educação
                  </div>
                  <div class="collapsible-body">

                         <!-- ======================================================================= -->


                          <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/educacao.png" />
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Escola Amigos do Verde</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 5% sobre as mensalidades meio turno na Educação Infantil e do Ensino Fundamental- SOMENTE PARA NOVOS ALUNOS (filhos e/ou netos de professores associados). No caso da matrícula de netos, o avô/avó deverá ser o responsável financeiro e assinar o contrato de prestação de serviços. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Av. Cristovão Colombo, 3437 <br> Higienopolis - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3337 7630</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>secretaria@amigosdoverde.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.amigosdoverde.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>


                   <!-- ======================================================================= -->

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/educacao.png" />
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Colégio Anchieta</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferce desconto de 10% na matrícula e nas mensalidades - SOMENTE PARA NOVOS ALUNOS (filhos e/ou netos de professores associados), desde que haja vaga para o ano letivo. Necessário retirar na ADUFRGS uma Declaração que comprove Vínculo Associativo. Para informações mais detalhadas, confira aqui o contrato. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Av. Dr. Nilo Peçanha n. 1521 <br>Bela Vista - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3382 6001</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>secretaria@colegioanchieta.g12.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.colegioanchieta.g12.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                     <!-- ======================================================================= -->

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/educacao.png" />
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Colégio Israelita</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 10% na matrícula e nas mensalidades - SOMENTE PARA NOVOS ALUNOS (filhos ou netos de professores associados), desde que haja vaga para o ano letivo. Necessário retirar na ADUFRGS uma Declaração de Vínculo Associativo. Para informações mais detalhadas, confira aqui o contrato. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Av. Protásio Alves n. 943 <br> Rio Branco - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3331 3030</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>secretaria@colegioisraelita.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.colegioisraelita.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                      <!-- ======================================================================= -->

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/educacao.png" />
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">CID- Centro Integrado de Desenvolvimento</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 10% na matrícula e nas mensalidades - SOMENTE PARA NOVOS ALUNOS (filhos e/ou netos de professores associados), desde que haja vaga para o ano letivo. Necessário retirar na ADUFRGS uma Declaração de Vínculo Associativo. Para informações mais detalhadas, confira aqui o contrato. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Rua Fernandes Vieira , 553 <br> Bom Fim - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3311 2789</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>secretaria@cidcrianca.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.cidcrianca.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                     <!-- ======================================================================= -->

                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/educacao.png" />
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Escola Aqui Eu Fico</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 10% na matrícula e nas mensalidades - SOMENTE PARA NOVOS ALUNOS (filhos e/ou netos de professores associados), desde que haja vaga para o ano letivo. Necessário retirar na ADUFRGS uma Declaração de Vínculo Associativo. Para informações mais detalhadas, confira aqui o contrato. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Rua Eça de Queirós, 129 <br> Petrópolis - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3237 1596</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>secretaria@aquieufico.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.aquieufico.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                     <!-- ======================================================================= -->


                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/educacao.png" />
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Escola Curumim</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 15% nas mensalidades para período integral ou intermediário e desconto de 10% nas mensalidades de meio turno- SOMENTE PARA NOVOS ALUNOS (filhos e/ou netos de professores associados), desde que haja vaga para o ano letivo.Necessário retirar na ADUFRGS uma Declaração de Vínculo Associativo. Para informações mais detalhadas, confira aqui o contrato. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td> Rua da Republica, nº 378 <br> Cidade Baixa - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3227 1574</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>secretaria@escolacurumim.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.escolacurumim.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                     <!-- ======================================================================= -->

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/educacao.png" />
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Escolas Michigan</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 30% nas atividades e material didático. Necessário apresentar carteira de sócio. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td> Av. Broges de Medeiros n. 340<br> Centro Histórico - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3228 1354</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>secretaria@escolasmichigan.com</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.escolasmichigan.com</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>
                      <!-- ======================================================================= -->


                      <!-- ======================================================================= -->

                      <div class="clearfix"></div>
                  </div>
              </li>


             <!-- ======================================================================= -->
             <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/entretenimento_branco.png" /> </div>
                      ENTRETENIMENTO E LAZER
                  </div>
                  <div class="collapsible-body">
                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/entretenimento.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">StudioClio - Instituto de Arte & Humanismo</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFRGS desconto de 10%, além do percentual que já é concedido a professores. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Rua José do Patrocínio n. 698 <br>Cidade Baixa - Porto Alegre - RS</td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3254 7200</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>clio@studioclio.com.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.studioclio.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/entretenimento.png"/>
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Centro Cultural Usina do Gasômetro</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para associados da ADUFRGS oferece desconto de 50% em espetáculos de teatro, dança, música e oficinas (exceto cinema). <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Av. João Goulart n. 551 <br> Centro Histórico - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3289 8100</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>@.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>


                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/entretenimento.png"/>
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Companhia Teatro Novo</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS e seus familiares oferece desconto de até 20% nas peças montadas pela Companhia. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Shopping DC Navegantes - Rua Frederico Mentz n. 1561<br>Navegantes - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3374 7626</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>teatronovo2@teatronovo.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.teatronovo.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/entretenimento.png"/>
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Companhia Teatro Novo</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS e seus familiares oferece desconto de até 20% nas peças montadas pela Companhia. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Shopping DC Navegantes - Rua Frederico Mentz n. 1561<br>Navegantes - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3374 7626</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>teatronovo2@teatronovo.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.teatronovo.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/entretenimento.png"/>
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">FCG - Foto Cine Clube Gaucho / Cursos</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 20%. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Rua Dr. Flores n. 98 (salas 81 e 82)<br> Centro Histórico - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3224 7655</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>cadmatheus@ig.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.fcg.art.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/entretenimento.png"/>
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Santander Cultural</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 20% nas programações de cinema e de música (verificar lotação). <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Rua Sete de Setembro n. 1028<br> Centro Histórico - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3287 5940</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>scultura@santander.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.santander.com.br/institucional-santander/cultura/santander-cultural</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/entretenimento.png"/>
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Portal Da Terra</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 10% na locação de espaços de lazer com infraestrutura para receber grupos. O local possui trilhas, açudes, pomares, mata nativa e ambientes integrados adequados para reuniões profissionais ou familiares. Para locação, é necessário apresentar carteira de sócio da ADUFRGS. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Beco do Juiz n. 3210<br>Passo da Areia - Viamão- RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 3108 3388</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>scultura@santander.com.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.oportaldaterra.com.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                          <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/entretenimento.png"/>
                          </div>
                              <div class="col s12 m9">
                                  <div class="title">Hotel Casa do Professor</div>
                                  <div class="texto">
                                      <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 15% do valor da tabela de não sócio praticada pela Casa do Professor. Para informações mais detalhadas, confira aqui o contrato. <br>
                                  </div>
                                  <div class="contatos">
                                      <table>
                                          <tr>
                                              <td><div class="localizacao"></div></td>
                                              <td>Rua Lopo Gonçalves n. 29<br>Cidade Baixa - Porto Alegre - RS</td>
                                          </tr>
                                          <tr>
                                              <td><div class="fone"></div></td>
                                              <td>51. 4009 2988</td>
                                          </tr>
                                          <tr>
                                              <td><div class="email"></div></td>
                                              <td>casadoprofessor@sinprors.org.br</td>
                                          </tr>
                                          <tr>
                                              <td><div class="site"></div></td>
                                              <td>www.casadoprofessor.sinprors.org.br</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>
               <!-- ======================================================================= -->


              <!-- ======================================================================= -->
              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/livraria_branco.png" /> </div>
                      LIVRARIA E REVISTARIA
                  </div>
                  <div class="collapsible-body">
                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/livraria.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Livraria Via Sapiens</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 10%, prazo de pagamento para 30 e 60 dias. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Rua Lima e Silva n. 407<br>Cidade Baixa - Porto Alegre - RS</td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3221 0006</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>contato@livrariaviasapiens.com.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.livrariaviasapiens.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->

              <!-- ======================================================================= -->

              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/profissional_saude_branco.png" /> </div>
                      PROFISSIONAIS DE SAÚDE
                  </div>
                  <div class="collapsible-body">



                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/profissional_saude.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Ruy Dornelles Dias (Gastroenterologia)</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 30% nas consultas e exames. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Rua dos Andradas n. 1137 (cj. 505) <br> Centro Histórico - Porto Alegre - RS</td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3224 0266</td>
                                      </tr>

                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/profissional_saude.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Rodrigo F. de Carvalho Veiga (Quiropraxista)</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFGRS oferece desconto de: 18% na primeira consulta, 10% (adquirindo pacote de 7 sessões) e 20% (adquirindo o pacote de 11 sessões); Condições de pagamento: 3x até 7 sessões e 4x até 11 sessões, em cheque ou dinheiro. Necessário apresentar carteira de sócio emitida pelo sindicado, acompanhada de documento oficial com foto. Para informações mais detalhadas confira aqui o contrato. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Rua Cel. Fernando Machado n. 657
                                              <br>Centro Histórico - Porto Alegre - RS<br><br>
                                              Rua Bagé n. 248
                                              <br>Niterói - Canoas - RS
                                          </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3228 8475</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->

              <!-- ======================================================================= -->
              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/laboratorio_branco.png" /> </div>
                      LABORATÓRIOS E CENTROS DE DIAGNÓSTICO
                  </div>
                  <div class="collapsible-body">

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/laboratorio.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">CDI- Centro de Diagnóstico por Imagem</div>
                              <div class="texto">
                                  <b>Vantagens:</b>  Para os associados da ADUFRGS oferece desconto de 10%. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Rua Dr. Flores n. 327 (9º andar) <br>Centro - Porto Alegre - RS
                                              <br>Rua Marquês do Pombal n. 783 (4° andar)<br>Moinhos de Vento - Porto Alegre - RS
                                              <br>Rua José de Alencar n. 868 (8º andar) <br>Menino Deus - Porto Alegre - RS
                                          </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3225 4645</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>cdi@cdi.odo.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.cdi.odo.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                       <div class="col s12 m6">
                            <div class="col s12 m3">
                                <img class="responsive-img" src="/images/icones/laboratorio.png"/>
                            </div>
                            <div class="col s12 m9">
                                <div class="title">Ultra Med- Clinica de Ecografia</div>
                                <div class="texto">
                                    <b>Vantagens:</b>  Para os associados da ADUFRGS oferece desconto de 50% nos exames. <br>
                                </div>
                                <div class="contatos">
                                    <table>
                                        <tr>
                                            <td><div class="localizacao"></div></td>
                                            <td> Rua Prof. Annes Dias n.154 (sala 1701) <br>Centro Histórico - Porto Alegre - RS </td>
                                        </tr>
                                        <tr>
                                            <td><div class="fone"></div></td>
                                            <td>51. 3224 2388</td>
                                        </tr>
                                        <tr>
                                            <td><div class="email"></div></td>
                                            <td>corporativo@ultramed.com.br</td>
                                        </tr>
                                        <tr>
                                            <td><div class="site"></div></td>
                                            <td>www.ultramed.com.br</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="col s12 m6">
                            <div class="col s12 m3">
                                <img class="responsive-img" src="/images/icones/laboratorio.png"/>
                            </div>
                            <div class="col s12 m9">
                                <div class="title">Centrofisio - Clinica de fisioterapia</div>
                                <div class="texto">
                                    <b>Vantagens:</b>  Para os associados da ADUFRGS oferece desconto de 50% na fisioterapia e 15% na estética. <br>
                                </div>
                                <div class="contatos">
                                    <table>
                                        <tr>
                                            <td><div class="localizacao"></div></td>
                                            <td>Rua dos Andradas 1711 (conj. 502) <br>Centro Histórico - Porto Alegre - RS

                                              </td>
                                        </tr>
                                        <tr>
                                            <td><div class="fone"></div></td>
                                            <td>51. 3225 6882</td>
                                        </tr>
                                        <tr>
                                            <td><div class="email"></div></td>
                                            <td>centrofisiobsb@gmail.com</td>
                                        </tr>
                                        <tr>
                                            <td><div class="site"></div></td>
                                            <td>www.centrofisio.com.br</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->

              <!-- ======================================================================= -->
              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/estacionamento_branco.png" /> </div>
                      ESTACIONAMENTOS
                  </div>
                  <div class="collapsible-body">
                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/estacionamento.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Safepark do Colégio Rosário</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFRGS os valores cobrados são: R$15,00 até 8h e R$4,00 adicional a cada 30min. É necessário adquirir um selo na Sede da ADUFRGS, com o custo de R$ 0,30. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td> Rua Irmão José Otão n. 11 <br>Centro Histórico - Porto Alegre - RS </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3225 4645</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>@safepark.com.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.safepark.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->


              <!-- ======================================================================= -->
              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/carro_branco.png" /> </div>
                      VEÍCULOS
                  </div>
                  <div class="collapsible-body">

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/carro.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Concessionária Peugeot Lyon</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para associados da ADUFRGS oferece desconto de 2% na compra de veículos novos e quaisquer outros produtos e serviços da referida concessionária. Condições de compra e de pagamentos devem ser negociados pelo comprador diretamente com a concessionária e podem sofrer variações de mercado. Necessário retirar na ADUFRGS uma declaração que comprove vinculo associativo com o sindicato. Para informações mais detalhadas confira aqui o contrato. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td> Av. Ipiranga n. 5566<br>Azenha - Porto Alegre - RS </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3320 2500</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>contato@lyonportoalegre.com.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.lyonportoalegre.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>


                    <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/carro.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Concessionária Panambra Volkswagen</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para associados da ADUFRGS oferece desconto de 2% na compra de veículos novos e serviços na concessionária Panambra. Necessário retirar na ADUFRGS uma declaração que comprove vinculo associativo com o sindicato. Para informações mais detalhadas confira aqui o contrato. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td> Av. Azenha n. 85<br>Azenha - Porto Alegre - RS </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3218 1800</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>contato@panambra.com.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.panambra.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>


                      <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->


              <!-- ======================================================================= -->
              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/farmacia_dois_branco.png" /> </div>
                      FARMÁCIAS
                  </div>
                  <div class="collapsible-body">

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/farmacia_dois.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Panvel</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 10% em medicamentos de referência e 30% nos medicamentos genéricos. Desconto será concedido mediante a apresentação da carteira Panvel, que deverá ser solicitada por e-mail para a ADUFRGS. A carteira será fornecida pela Panvel no prazo de 10 dias úteis após o cadastramento na ADUFRGS, a mesma deverá ser retirada na Sede do Sindicato. A relação de lojas aptas a processarem as vendas mediante o presente convênio, pode ser consultada aqui. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Todas as unidades<br> </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3218 9000</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>sac@panvel.com.br </td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.panvel.com</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                    <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/farmacia_dois.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Porto Vita Farmácia de Manipulação</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 10% para compras à vista acima de R$ 25,00 (vinte e cinco reais), e nas compras a prazo acima de R$100,00 (cem reais). Compras acima de R$ 100,00 (cem reais), o conveniado fica isento da taxa de tele-entrega. Necessário apresentar carteira de sócio emitida pelo sindicato. Para informações mais detalhadas, confira aqui o contrato. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Coronel Bordini n. 106  <br>Auxiliadora - Porto Alegre - RS</td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3325 5795</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>contato@portovitafarma.com</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.portovitafarma.com</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/farmacia_dois.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Farmacia Dose Certa</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 12%. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Vicente da Fontoura n. 2186 <br>Santa Cecilia - Porto Alegre - RS</td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3333 8815</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>contato@dosecerta.com.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.dosecerta.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->

              <!-- ======================================================================= -->
              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/bem_estar_branco.png" /> </div>
                      BEM ESTAR
                  </div>
                  <div class="collapsible-body">


                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/bem_estar.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Spa do Corpo</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 20% nas aulas de pilates (2 vezes por semana) e 20% de desconto em qualquer pacote de serviços corporais. Necessário apresentar carteira de sócio emitida pelo sindicato. Para informações mais detalhadas, confira aqui o contrato. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Rua José do patrocínio n. 83 <br> Cidade Baixa - Porto Alegre - RS

                                            </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3226 7391</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>onespa@onespa.com.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.onespa.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                  <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/bem_estar.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Spa do Corpo</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFRGS oferece desconto de 20% nas aulas de pilates (2 vezes por semana) e 20% de desconto em qualquer pacote de serviços corporais. Necessário apresentar carteira de sócio emitida pelo sindicato. Para informações mais detalhadas, confira aqui o contrato. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Rua Miguel Tostes n. 880 <br> Rio Branco - Porto Alegre - RS

                                            </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3316 7630</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>faleconosco@fisiocarebrasil.com.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.fisiocarebrasil.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->

              <!-- ======================================================================= -->

              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/poscicologia_branco.png" /> </div>
                      PSICOLOGIA
                  </div>
                  <div class="collapsible-body">

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/poscicologia.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Fernanda Soibelman (Psicóloga)</div>
                              <div class="texto">
                                  <b>Vantagens:</b>  Para os associados da ADUFRGS oferece desconto de 30% nas consultas. Necessário apresentar carteira de sócio emitida pelo sindicato. Confira aqui o site da Psicóloga para mais informações. Entre em contato também pelo e-mail. Para informações mais detalhadas confira aqui o contrato. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td> Av. Montenegro n. 192 (sala 03)  <br>Petrópolis - Porto Alegre - RS </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 99636 2919</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>fsoibelman@gmail.com</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.safepark.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>


                      <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->

              <!-- ======================================================================= -->
              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/joalheria_branco.png" /> </div>
                      JOALHERIA E ÓTICA
                  </div>
                  <div class="collapsible-body">

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/joalheria.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Óptica Deluz</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFRGS oferece os seguintes descontos: Compra à vista em dinheiro: 20% de desconto. Compra débito: 15% de desconto. Compra crédito (30 dias): 10% de desconto. Compra em até 6 vezes no cartão: 5% de desconto. Necessário apresentar carteira de sócio emitida pelo sindicato e documento oficial com foto. Para informações mais detalhadas, confira aqui o contrato. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td> AV. Benjamin Constant n. 41 <br>São João - Porto Alegre - RS </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3019 0159</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>@safepark.com.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.safepark.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->

              <!-- ======================================================================= -->

              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/odonto_branco.png" /> </div>
                     ODONTOLOGIA
                  </div>
                  <div class="collapsible-body">

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/odonto.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">UNIODONTO</div>
                           <div class="texto">
                                  <b>Vantagens:</b> <br>
                                  1-DOCUMENTOS NECESSÁRIOS PARA INCLUSÃO NO PLANO.pdf<br>
                                  2-TERMO DE ADESÃO.pdf<br>
                                  3-AUTORIZAÇÃO DE DÉBITO BB.pdf<br>
                                  4-VALORES E COBERTURA.pdf<br>
                                  5-CONTRATO UNIODONTO.pdf <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td> Rua Irmão José Otão n. 11 <br>Centro - Porto Alegre - RS </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3225 4645</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>uniodonto@uniodonto.coop.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.uniodonto.coop.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->

              <!-- ======================================================================= -->
              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/revista_branco.png" /> </div>
                     PLANO DE SAÚDE
                  </div>
                  <div class="collapsible-body">
                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/revista.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">UNIMED</div>
                              <div class="texto">
                                  <b>Vantagens:</b> <br>
                                  1-DOCUMENTOS NECESSÁRIOS PARA INCLUSÃO NO PLANO.pdf<br>
                                  2-TERMO DE ADESÃO.pdf<br>
                                  3-ORIENTAÇÕES PARA PREENCHIMENTO DA DECLARAÇÃO DE SAÚDE.pdf<br>
                                  4-DECLARAÇÃO DE SAUDE.pdf<br>
                                  5-AUTORIZAÇÃO DE DÉBITO BB.pdf<br>
                                  6-TABELA COM VALORES.pdf<br>
                                  7- TABELA DE COPARTICIPAÇÕES EM CONSULTAS.pdf<br>
                                  8-CONTRATO UNIMAX PRIVATIVO.pdf<br>
                                  9-CONTRATO UNIMAX SEMIPRIVATIVO.pdf<br>
                                  10-TRANSPORTE AEROMEDICO.pdf<br>
                                  11-MANUAL DE ORIENTAÇÃO.pdf<br>
                                  12-GUIA DE LEITURA CONTRATUAL.pdf<br>
                                  13-BENEFÍCIO FAMÍLIA.pdf<br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Rua Irmão José Otão n. 11 <br>Centro - Porto Alegre - RS


                                            </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3225 4645</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>unimed@unimed.coop.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.unimed.coop.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->

              <!-- ======================================================================= -->
              <li>
                  <div class="collapsible-header valign-wrapper">
                      <div class=""> <img class="responsive-img" src="/images/icones/transporte_branco.png" /> </div>
                    TRANSPORTADORA
                  </div>
                  <div class="collapsible-body">

                     <div class="col s12 m6">
                          <div class="col s12 m3">
                              <img class="responsive-img" src="/images/icones/transporte.png"/>
                          </div>
                          <div class="col s12 m9">
                              <div class="title">Granero Transportes</div>
                              <div class="texto">
                                  <b>Vantagens:</b> Para os associados da ADUFRGS oferece os seguintes descontos: 10% sobre o valor total do serviço de mudança residencial e/ ou comercial. O desconto somente será dado para solicitações realizadas diretamente com a Granero Porto Alegre independente da origem e destino da mudança (nível nacional). Necessário apresentar carteira de sócio emitida pelo sindicato e documento oficial com foto. Confira aqui o site da transportadora para mais informações. Confira aqui o contrato. <br>
                              </div>
                              <div class="contatos">
                                  <table>
                                      <tr>
                                          <td><div class="localizacao"></div></td>
                                          <td>Rua Ary dias Ferreira n. 70 <br>Distrito Industrial Jorge Lanner - Canoas - RS </td>
                                      </tr>
                                      <tr>
                                          <td><div class="fone"></div></td>
                                          <td>51. 3477 4222 - 9363 9071</td>
                                      </tr>
                                      <tr>
                                          <td><div class="email"></div></td>
                                          <td>poa@granero.com.br</td>
                                      </tr>
                                      <tr>
                                          <td><div class="site"></div></td>
                                          <td>www.granero.com.br</td>
                                      </tr>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <div class="clearfix"></div>
                  </div>
              </li>
              <!-- ======================================================================= -->
              */ ?>

            </ul>
        </div>
    </div>
    </div>
</div>
@endsection
