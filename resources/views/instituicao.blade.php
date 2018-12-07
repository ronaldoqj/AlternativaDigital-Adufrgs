<?php
    $register = $return['instituicao'];
    $arquivo = $return['arquivo'];
    $informativo = $return['informativo'];
?>
@extends('layouts.site')

@section('css')
    <link href="/css/pages/internas.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/pages/instituicao.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/css/pages/informativos.css" type="text/css" rel="stylesheet" media="screen,projection" />
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
    <div class="title-pages">Instituição</div>
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
                    <p class="title-texto">{{$register->titulo}}</p>
                    {!!$register->subtitulo!!}
                </div>

                @if ($arquivo['path'] != '')
                <p class="title-texto-cinza">{{$arquivo['nome']}}</p>
                <div class="row">
                    <div class="col s12 m6 l4">
                        <div class="box-estatutos">
                            <a href="/{{$arquivo['path']}}" target="_blank">
                                <div class="imagem-estatuto"><img class="responsive-img" src="/images/PDF.png" /></div>
                                <div class="texto-estatuto"> <p>{{$arquivo['nome']}}</p> </div>
                            </a>
                        </div>
                        <div class="col s12 m6 l4">
                        </div>
                        <div class="col s12 m6 l4">
                        </div>
                    </div>
                </div>
                @else
                  <br />
                @endif

                {!!$register->text!!}

            </div>

            @if ( $informativo->count() )
            {{-- ========================================================== --}}
            {{-- ====================== INFORMATIVOS ====================== --}}
            {{-- ========================================================== --}}
            <br />

            <p class="title-texto">INFORMATIVOS</p>
            <div class="row"><a href="#informativos"></a>
                @foreach ($informativo as $register)
                <?php
                    $img = 'images/adm/PDF.png';

                    $checkBoxActive = '';
                    $checkBoxCheck = '';

                    if ($loop->first) {
                        $ativo = 'disabled';
                    } else {
                        $ativo = '';
                    }
                ?>
                <div class="col s12 m6">
                    <div class="box-estatutos">
                        <div class="col s12">
                            <a href="/{{$register->arquivo_namefilefull}}" target="_blank"><div class="col s3"><img class="responsive-img" src="/{{$img}}"></div>
                            <div class="col s9">
                                <div class="texto-estatuto">
                                    <p>{{$register->codigo}}</p>
                                    <!-- <p>Assembleia aprova sugestões de alterações nas normas para promoção e progressão docente na UFRGS</p> -->
                                    <p>{{$register->titulo}}</p>
                                    {!!$register->descricao!!}
                                </div>
                            </div> </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                @endforeach
            </div>
            @endif
        </div>
    </div>
    </div>
</div>

@endsection
