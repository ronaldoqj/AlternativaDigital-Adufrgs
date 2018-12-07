<?php
    $register = $return['materia'];
    $existsGaleria = $return['ExistsGaleria'];
    $imgAutor = '/images/default.png';
    if ($register->autorImagem_namefilefull != '') {
        $imgAutor = '/'.$register->autorImagem_namefilefull;
    }
    $cont = 0;
?>
@extends('layouts.site')

@section('css')
    <link href="/css/pages/internas.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/pages/noticia.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!-- OWL -->
    <link href="/plugins/owl_carousel/owl.carousel.css" rel="stylesheet">
    <link href="/plugins/owl_carousel/owl.theme.css" rel="stylesheet">
    <!-- lightbox  -->
    <link rel="stylesheet" href="/plugins-frameworks/lightbox/css/lightbox.min.css">
@endsection

@section('js')
    <script src="/js/pages/internas.js"></script>
    <!-- OWL -->
    <script src="/plugins/owl_carousel/owl.carousel.js"></script>
    <!-- lightbox -->
    <script src="/plugins-frameworks/lightbox/js/lightbox.min.js"></script>
@endsection

@section('content')
<div class="clearfix"></div>
<!-- ======================================================================= -->
<!-- Topo                                                                    -->
<!-- ======================================================================= -->

<div class="container noticia-padding normal box-conteudo">
    <div class="title-pages">Notícia</div>
    <div class="colunista">
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
        <div class="row">
            <div class="conteudo">

                    <div class="box-avatar">
                        <div class="title">
                            <table>
                                <tr>
                                    <td>
                                        <div class="borda-avatar">
                                            <div class="avatar" style="background-image: url({{$imgAutor}});"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>por {{$register->autor_name}}</div>
                                        {!!$register->autor_text!!}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                <?php
                    // $date = $register->created_at;
                    // $daysOfWeek = ['Sunday' => 'Domingo', 'Monday' => 'Segunda-feira', 'Tuesday' => 'Terça-feira', 'Wednesday' => 'Quarta-feira', 'Thursday' => 'Quinta-feira', 'Friday' => 'Sexta-feira', 'Saturday' => 'Sábado'];
                    // $months = ['', 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'];
                    // $month = intval( date( 'm', strtotime($date) ) );
                    // $dataOfNews = $daysOfWeek[date( 'l', strtotime($date) )] . ', ' .
                    //               date( 'd', strtotime($date) ) . ' de ' .
                    //               $months[$month] . ' de ' .
                    //               date( 'Y', strtotime($date) );
                ?>
                <div class="data">{{--$dataOfNews--}} 18/02/2018</div>
                <div class="banner-texts">
                    <ul>
                        <li class="assuntos">{{$register->assunto}}</li>
                        <li class="titles">{{$register->title}}</li>
                    </ul>
                </div>
                <div class="clearfix"></div>

                <div class="paragrafos">
                    <p>{{$register->subtitle}}</p>
                    @if ($register->texto  != '')
                        {!!$register->texto!!}
                    @endif
                </div>

                @if ($register->imagem_principal_namefilefull != '')
                <div class="col s12 center-align">
                    <img class="responsive-img" style="margin-bottom: 20px;" src="/{{$register->imagem_principal_namefilefull}}" alt="{{$register->autorImagem_name}}" title="{{$register->autorImagem_name}}" />
                </div>
                @endif

                {!!$register->texto2!!}

                @if($existsGaleria)
                <?php
                    $files = $return['files'];
                ?>
                <!-- ======================================================================= -->
                <!-- Galeria                                                                 -->
                <!-- ======================================================================= -->
                  <div class="container-fluid galeria">
                      <div class="container">
                          <div class="row"><br />
                              <div class="col s12 title-texto">GALERIA DE FOTOS</div>
                          </div>
                          <div class="row">

                              <div id="owl-galeria" class="owl-galeria-index">
                                  @foreach($files as $fileGaleria)
                                  <div class="item">
                                      <div class="foto-style style-1">
                                          <a href="/{{$fileGaleria->namefilefull}}" data-lightbox="galeria" data-title="{{$fileGaleria->name}}">
                                              <div class="card-background" style="background-image: url('/{{$fileGaleria->namefilefull}}')"></div>
                                          </a>
                                      </div>
                                  </div>
                                  @endforeach
                              </div>
                          </div>
                      </div>
                  </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
