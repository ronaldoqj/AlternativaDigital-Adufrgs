<?php
    $banner1 = $return['banner1'];
    $banner2 = $return['banner2'];
    $materias = $return['materias'];
    $convenios = $return['convenios'];
    $materiasJson = $return['materiasJson'];
    $informativo = $return['informativo'];
?>

@extends('layouts.site')

@section('css')
    <link href="/css/pages/home.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!-- OWL -->
    <link href="/plugins-frameworks/owl_carousel/owl.carousel.css" rel="stylesheet">
    <link href="/plugins-frameworks/owl_carousel/owl.theme.css" rel="stylesheet">
    <!-- lightbox  -->
    <link rel="stylesheet" href="/plugins-frameworks/lightbox/css/lightbox.min.css">
    <style>
        .card .card-calendario { background: #9D224E; }
        .card .card-background .card-texto { border-top: 3px solid #9D224E; }
        .card:hover { border: solid 1px #9D224E; }
        .card:hover .card-background .card-texto {
            background-color: #9D224E90;
        }
    </style>
@endsection

@section('js')
    <script src="/js/pages/home.js"></script>
    <script src="/js/pages/ajaxNewsLetter.js"></script>
    <!-- OWL -->
    <script src="/plugins-frameworks/owl_carousel/owl.carousel.js"></script>
@endsection

@section('content')
<div class="clearfix"></div>
<!-- ======================================================================= -->
<!-- Topo                                                                    -->
<!-- ======================================================================= -->
<input type="hidden" id="inputJson" value="{{$materiasJson}}" />
<div class="container-fluid">
      <div id="owl-home-banner1" class="owl-home-banner1">
          @foreach($banner1 as $banner)
              <?php
                  $img = '/images/default.png';
                  if ( $banner->image_namefilefull != '' ) { $img = '/' . $banner->image_namefilefull; }
              ?>
              @if ($banner->link != '')
                  <a href="{{$banner->link}}" target="_blank">
              @endif
              <div class="image" style="background: url({{$img}});">
                  <div class="row">
                  <div class="col s12 text">
                      <table>
                        <tr>
                          <td>
                              <div class="conteiner-text">
                              <div class="container">
                                  <div class="row">
                                      <div class="col s12 text-banner">{!!$banner->text!!}</div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              </div>
                          </td>
                        </tr>
                      </table>
                  </div>
                  </div>
              </div>
              @if ($banner->link != '')
                  </a>
              @endif
          @endforeach
              <!--
              <div class="image" style="background: url(/images/Home/diadobasta.png);">
                  <div class="row">
                  <div class="col s12 text">
                      <table>
                        <tr>
                          <td>
                                <div class="conteiner-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col s12 text-banner">Dia do Basta!</div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                </div>
                          </td>
                        </tr>
                      </table>
                  </div>
                  </div>
              </div>



              <div class="image" style="background: url(/images/Home/promocoes-e-progressoes.png);">
                <div class="row">
                <div class="col s12 text">
                    <table>
                      <tr>
                        <td>
                              <div class="conteiner-text">
                              <div class="container">
                                  <div class="row">
                                      <div class="col s12 text-banner">ADUFRGS orienta</div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              </div>
                        </td>
                      </tr>
                    </table>
                </div>
                </div>
            </div>
             -->
      </div>
</div>


<!-- ======================================================================= -->
<!-- Redes Sociais                                                           -->
<!-- ======================================================================= -->
<div class="container-fluid redes-sociais-home">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <ul class="ul-redes-sociais">
                    <li class="li-texto">ADUFRGS nas Redes sociais</li>
                    <li class="li-facebook"><a target="_blank" href="http://www.facebook.com/adufrgssindical/" title="Facebook"><i class="fontello-icon icon-facebook">&#xe80d;</i></a></li>
                    <li class="li-twitter"><a target="_blank" href="http://twitter.com/adufrgssindical" title="Twitter"><i class="fontello-icon icon-twitter">&#xe802;</i></a></li>
                    <li class="li-instagram"><a target="_blank" href="https://www.instagram.com/adufrgssindical/" title="Instagram"><i class="fontello-icon icon-instagram">&#xe80e;</i></a></li>
                    <li class="li-flickr"><a target="_blank" href="http://www.flickr.com/people/140228450@N08/" title="Flickr"><div class="box-flickr"><div class="bola-flickr"></div><div class="bola-flickr"></div></div></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- ======================================================================= -->
<!-- Newsletter                                                              -->
<!-- ======================================================================= -->
<div class="container-fluid newsletter">
    <div class="container">
        <div class="row">

            <div class="col s12 m12 l8 offset-l2">
                <div class="newsletter-home">
                    <div class="title-newsletter">RECEBA NOSSOS INFORMATIVOS NO SEU E-MAIL</div>
                    <div class="form">
                        <form action="">
                            <input type="text" id="name_newsletter" name="name_newsletter"  value="" class="browser-default inputs" placeholder="NOME"  required />
                            <input type="text" id="email_newsletter" name="email_newsletter" value="" class="browser-default inputs" placeholder="EMAIL" required />
                            <div class="radio-publico">
                              <label>
                                <input name="publico" type="radio" value="socio" />
                                <span>Associado</span>
                              </label>
                              <label>
                                <input name="publico" type="radio" value="publico geral" />
                                <span>Não associado</span>
                              </label>
                            </div>
                            <input type="submit" id="bt_cadastrar_newsletter" class="btn" value="Cadastrar" />
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ======================================================================= -->
<!-- Banner 2                                                                -->
<!-- ======================================================================= -->
<div class="container-fluid">
      <div id="owl-home-banner2" class="owl-home-banner2">
            @foreach($banner2 as $banner)
                <?php
                    $img = '/images/default.png';
                    if ( $banner->image_namefilefull != '' ) { $img = '/' . $banner->image_namefilefull; }
                ?>
                @if ($banner->link != '')
                    <a href="{{$banner->link}}" target="_blank">
                @endif
                <div class="image" style="background: url({{$img}});">
                    <div class="row">
                        <div class="col s12 text">
                            <table>
                              <tr>
                                <td>
                                      <div class="conteiner-text">
                                      <div class="container">
                                          <div class="row">
                                              <div class="col s12 text-banner">{!!$banner->text!!}</div>
                                              <div class="clearfix"></div>
                                          </div>
                                      </div>
                                      </div>
                                </td>
                              </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($banner->link != '')
                    </a>
                @endif
            @endforeach
            <!--
            <a href="http://www.portaladverso.com.br" target="_blank">
            <div class="image" style="background: url(/images/Home/novo_portal_adverso.png);">
                <div class="row">
                <div class="col s12 text">
                    <table>
                      <tr>
                        <td>
                              <div class="conteiner-text">
                              <div class="container">
                                  <div class="row">
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              </div>
                        </td>
                      </tr>
                    </table>
                </div>
                </div>
            </div>
            </a>
             -->
      </div>
</div>


<!-- ======================================================================= -->
<!-- Convenios                                                               -->
<!-- ======================================================================= -->
@if ($convenios->count())
<div class="container-fluid convenios">
    <div class="container">
        <div class="row">

            <div class="col s12">

                <div class="title-convenios">CONVÊNIOS</div>
                <div id="owl-home-convenios" class="owl-home-convenios">

                    @foreach( $convenios as $convenio )
                        <div class="item">
                            <a href="convenios/{{$convenio->id}}/#convenio{{$convenio->id}}">
                                <div class="img-convenios icone-convenio-branco" style="background-image: url(/{{$convenio->categoria_namefilefull}})"></div>
                                <div class="nome-convenios truncate">{{$convenio->name}}</div>
                            </a>
                        </div>
                    @endforeach
                    <?php /*
                    <div class="item">
                      <a href="http://adufrgs.alternativadigital.com.br/convenios">
                          <div class="img-convenios" style="background-image: url(/images/icones/entretenimento_branco.png)"></div>
                          <div class="nome-convenios truncate">Studio Clio</div>
                      </a>
                    </div>
                    <div class="item">
                      <a href="http://adufrgs.alternativadigital.com.br/convenios">
                          <div class="img-convenios" style="background-image: url(/images/icones/cinema_branco.png)"></div>
                          <div class="nome-convenios truncate">Guion</div>
                      </a>
                    </div>
                    <div class="item">
                      <a href="http://adufrgs.alternativadigital.com.br/convenios">
                          <div class="img-convenios" style="background-image: url(/images/icones/clubes_branco.png)"></div>
                          <div class="nome-convenios truncate">AABB Porto Alegre</div>
                      </a>
                    </div>
                    <div class="item">
                      <a href="http://adufrgs.alternativadigital.com.br/convenios">
                          <div class="img-convenios" style="background-image: url(/images/icones/educacao_branco.png)"></div>
                          <div class="nome-convenios truncate">Escola Amigos do Verde</div>
                      </a>
                    </div>
                    <div class="item">
                      <a href="http://adufrgs.alternativadigital.com.br/convenios">
                          <div class="img-convenios" style="background-image: url(/images/icones/livraria_branco.png)"></div>
                          <div class="nome-convenios truncate">Livraria Via Sapiens</div>
                      </a>
                    </div>
                    <div class="item">
                      <a href="http://adufrgs.alternativadigital.com.br/convenios">
                          <div class="img-convenios" style="background-image: url(/images/icones/laboratorio_branco.png)"></div>
                          <div class="nome-convenios truncate">CDI- Centro de Diagnóstico por Imagem</div>
                      </a>
                    </div>
                    <div class="item">
                      <a href="http://adufrgs.alternativadigital.com.br/convenios">
                          <div class="img-convenios" style="background-image: url(/images/icones/estacionamento_branco.png)"></div>
                          <div class="nome-convenios truncate">Safepark do Colégio Rosário</div>
                      </a>
                    </div>
                    <div class="item">
                      <a href="http://adufrgs.alternativadigital.com.br/convenios">
                          <div class="img-convenios" style="background-image: url(/images/icones/carro_branco.png)"></div>
                          <div class="nome-convenios truncate">Concessionária Peugeot Lyon</div>
                      </a>
                    </div>
                    <div class="item">
                      <a href="http://adufrgs.alternativadigital.com.br/convenios">
                          <div class="img-convenios" style="background-image: url(/images/icones/farmacia_dois_branco.png)"></div>
                          <div class="nome-convenios truncate">Panvel</div>
                      </a>
                    </div>
                    */ ?>
                </div>

            </div>
        </div>
    </div>
</div>
@endif



<!-- ======================================================================= -->
<!-- Informativos                                                            -->
<!-- ======================================================================= -->
@if( $informativo->count() )
<div class="container-fluid informativos">
    <div class="container">
        <div class="row">

            <div class="col s12">

                <div class="title-informativos">INFORMATIVOS</div>
                <div id="owl-home-informativos" class="owl-home-informativos">
                    @foreach($informativo as $item)
                    <div class="item">
                        <a href="/instituicao/#informativos">
                            <table class="table-informativos">
                                <tr>
                                    <td class="td-irformativos">
                                        <div class="img-informativos" style="background-image: url(/images/icones/pdf_branco.png)"></div>
                                    </td>
                                    <td>
                                        <div class="nome-informativos">
                                            <p>{{$item->codigo}}</p>
                                            <p>{{$item->titulo}}</p>
                                            <p>{!!$item->descricao!!}</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </a>
                    </div>
                    @endforeach
                    <!--
                    <div class="item">
                        <a href="http://adufrgs.alternativadigital.com.br/informativos">
                            <table class="table-informativos">
                                <tr>
                                    <td class="td-irformativos">
                                        <div class="img-informativos" style="background-image: url(/images/icones/pdf_branco.png)"></div>
                                    </td>
                                    <td>
                                        <div class="nome-informativos">
                                            <p>INFORMATIVO Nº 086/17</p>
                                            <p>INFORMATIVO Nº 086/17</p>
                                            <p>Assembleia aprova sugestões de alterações nas normas para promoção e progressão docente na UFRGS</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </a>
                    </div>

                    <div class="item">
                        <a href="http://adufrgs.alternativadigital.com.br/informativos">
                            <table class="table-informativos">
                                <tr>
                                    <td class="td-irformativos">
                                        <div class="img-informativos" style="background-image: url(/images/icones/pdf_branco.png)"></div>
                                    </td>
                                    <td>
                                        <div class="nome-informativos">
                                            <p>INFORMATIVO Nº 086/17</p>
                                            <p>INFORMATIVO Nº 086/17</p>
                                            <p>Assembleia aprova sugestões de alterações nas normas para promoção e progressão docente na UFRGS</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </a>
                    </div>

                    <div class="item">
                        <a href="http://adufrgs.alternativadigital.com.br/informativos">
                            <table class="table-informativos">
                                <tr>
                                    <td class="td-irformativos">
                                        <div class="img-informativos" style="background-image: url(/images/icones/pdf_branco.png)"></div>
                                    </td>
                                    <td>
                                        <div class="nome-informativos">
                                            <p>INFORMATIVO Nº 086/17</p>
                                            <p>INFORMATIVO Nº 086/17</p>
                                            <p>Assembleia aprova sugestões de alterações nas normas para promoção e progressão docente na UFRGS</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </a>
                    </div>

                    <div class="item">
                        <a href="http://adufrgs.alternativadigital.com.br/informativos">
                            <table class="table-informativos">
                                <tr>
                                    <td class="td-irformativos">
                                        <div class="img-informativos" style="background-image: url(/images/icones/pdf_branco.png)"></div>
                                    </td>
                                    <td>
                                        <div class="nome-informativos">
                                            <p>INFORMATIVO Nº 086/17</p>
                                            <p>INFORMATIVO Nº 086/17</p>
                                            <p>Assembleia aprova sugestões de alterações nas normas para promoção e progressão docente na UFRGS</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </a>
                    </div>

                    <div class="item">
                        <a href="http://adufrgs.alternativadigital.com.br/informativos">
                            <table class="table-informativos">
                                <tr>
                                    <td class="td-irformativos">
                                        <div class="img-informativos" style="background-image: url(/images/icones/pdf_branco.png)"></div>
                                    </td>
                                    <td>
                                        <div class="nome-informativos">
                                            <p>INFORMATIVO Nº 086/17</p>
                                            <p>INFORMATIVO Nº 086/17</p>
                                            <p>Assembleia aprova sugestões de alterações nas normas para promoção e progressão docente na UFRGS</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </a>
                    </div>
                     -->

                </div>

            </div>
        </div>
    </div>
</div>
@endif


@if ($materias->count())
<!-- ======================================================================= -->
<!-- Canal do docente                                                        -->
<!-- ======================================================================= -->
<div class="container-fluid docente">
    <div class="container">
        <div class="row">

            <div class="col s12 box-cards-docentes">

                <div class="title-docente">CANAL DO DOCENTE</div>

                @foreach($materias as $materia)

                <div class="col s12 m12 l6 outro {{--$rightLeft--}}">
                    <div class="box-colunista">
                      <?php
                          $link = '/'.'noticia/'.$materia->id.'/'.str_slug($materia->title, '-');
                          if ($materia->site != '') {
                              $link = $materia->site;
                          }
                          $img = '/images/default.png';
                          if ( $materia->imagem_principal_namefilefull != '' ) { $img = '/' . $materia->imagem_principal_namefilefull; }
                      ?>

                        <a href="{{$link}}"><div class="colunista-img" style="background-image: url({{$img}});"></div></a>
                    </div>
                    <div class="colunista-text">
                        <div class="sub-title">
                            <table border="1">
                                  <tr>
                                      <td width="1">
                                          <div class="borda-avatar">
                                              <?php
                                                  $img = '/images/default.png';
                                                  if ( $materia->autorImagem_namefilefull != '' ) { $img = '/' . $materia->autorImagem_namefilefull; }
                                              ?>

                                              <div class="avatar" style="background-image: url({{$img}});"></div>
                                          </div>
                                      </td>
                                      <td class="td-avatar-info">
                                            <div class="avatar-name assuntos">por {{$materia->autor_name}}</div>
                                      </td>
                                  </tr>
                            </table>
                        </div>
                        <div class="title titles"><a href="{{$link}}">{{$materia->title}}</a></div>
                        <div class="subtitles"><a href="{{$link}}">{{$materia->subtitle}}</a></div>
                    </div>
                </div>
                @endforeach


                <div class="col s12">
                   <div class="bt-ver-todas"><span>VER TODAS</span></div>
                </div>

            </div>
        </div>
    </div>
</div>
@endif


@endsection
