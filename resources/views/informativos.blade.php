@extends('layouts.site')

@section('css')
    <link href="/css/pages/internas.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/pages/informativos.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('js')
    <script src="/js/pages/internas.js"></script>
@endsection

@section('content')
<div class="clearfix"></div>

<!-- ======================================================================= -->
<!-- Topo                                                                    -->
<!-- ======================================================================= -->

<div class="container noticia-padding normal box-conteudo">
    <div class="title-pages">Informativos</div>
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
                  <div class="img-topo-juridico"><img class="responsive-img" src=""></div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac lectus lorem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                  </p>
              </div>

            {{-- ========================================================== --}}
            {{-- ========================= PDF's ========================== --}}
            {{-- ========================================================== --}}

            <p class="title-texto">INFORMATIVOS</p>
            <div class="row">
                <div class="col s12 m6">
                    <div class="box-estatutos">
                        <div class="col s12">
                            <a href="#"><div class="col s3"><img class="responsive-img" src="/images/PDF.png"></div>
                            <div class="col s9">
                                <div class="texto-estatuto">
                                    <p>INFORMATIVO Nº 086/17</p>
                                    <p>Assembleia aprova sugestões de alterações nas normas para promoção e progressão docente na UFRGS</p>
                                </div>
                            </div> </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <div class="box-estatutos">
                        <div class="col s12">
                            <a href="#"><div class="col s3"><img class="responsive-img" src="/images/PDF.png"></div>
                            <div class="col s9">
                                <div class="texto-estatuto">
                                    <p>INFORMATIVO Nº 085/17</p>
                                    <p>ADUFRGS conclama professores para mobilização contra o Escola sem Partido
                                       A concentração da riqueza é tema do ADUFRGS no Ar desta terça (26/09)</p>
                                </div>
                            </div> </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <div class="box-estatutos">
                        <div class="col s12">
                            <a href="#"> <div class="col s3"><img class="responsive-img" src="/images/PDF.png"></div>
                            <div class="col s9">
                                <div class="texto-estatuto">
                                    <p>INFORMATIVO Nº 084/17</p>
                                    <p>Assembleia Geral – 22 de setembro, sexta-feira, às 13h – Sede da ADUFRGS</p>
                                </div>
                            </div> </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

            <div class="col s12 m6">
                    <div class="box-estatutos">
                        <div class="col s12">
                           <a href="#"> <div class="col s3"><img class="responsive-img" src="/images/PDF.png"></div>
                            <div class="col s9">
                                <div class="texto-estatuto">
                                    <p>INFORMATIVO Nº 082/17</p>
                                    <p>NOTA DA ADUFRGS-SINDICAL SOBRE PARALISAÇÃO NO DIA 14 DE SETEMBRO</p>
                                </div>
                            </div> </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


                <div class="col s12 m6">
                    <div class="box-estatutos">
                        <div class="col s12">
                            <a href="#"><div class="col s3"><img class="responsive-img" src="/images/PDF.png"></div>
                            <div class="col s9">
                                <div class="texto-estatuto">
                                    <p>INFORMATIVO Nº 081/17</p>
                                    <p>Proifes defende manutenção do Acordo de reestruturação de carreiras em reunião com o MPOD Claudio Scherer, Prêmio Proifes 2017, é o entrevistado do ADUFRGS no Ar</p>
                                </div>
                            </div> </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


                <div class="col s12 m6">
                    <div class="box-estatutos">
                        <div class="col s12">
                            <a href="#"><div class="col s3"><img class="responsive-img" src="/images/PDF.png"></div>
                            <div class="col s9">
                                <div class="texto-estatuto">
                                    <p>INFORMATIVO Nº 080/17</p>
                                    <p>Nota do Presidente da ADUFRGS-Sindical</p>
                                </div>
                            </div> </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


                <div class="col s12 m6">
                    <div class="box-estatutos">
                        <div class="col s12">
                            <a href="#"><div class="col s3"><img class="responsive-img" src="/images/PDF.png"></div>
                            <div class="col s9">
                                <div class="texto-estatuto">
                                    <p>INFORMATIVO Nº 079/17</p>
                                    <p>Informe Jurídico – A ganância do Governo Temer atinge credores de precatórios</p>
                                </div>
                            </div> </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


                <div class="col s12 m6">
                    <div class="box-estatutos">
                        <div class="col s12">
                            <a href="#"><div class="col s3"><img class="responsive-img" src="/images/PDF.png"></div>
                            <div class="col s9">
                                <div class="texto-estatuto">
                                    <p>INFORMATIVO Nº 078/17</p>
                                    <p>residente da ADUFRGS entrega ao reitor da UFRGS contribuição para “Código de Ética” ADUFRGS no Ar desta terça aborda a CRES 2018</p>
                                                                    </div>
                            </div> </a>
                        </div>




                        <div class="clearfix"></div>
                    </div>
                </div>






            </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


        </div>
    </div>
    </div>
</div>

@endsection
