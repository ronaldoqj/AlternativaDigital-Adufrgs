<?php
    $carreiraSalrios = $return['carreiraSalario'];
    $arquivo = $return['arquivo'];
?>
@extends('layouts.site')

@section('css')
    <link href="/css/pages/internas.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/pages/area-do-associado.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
    <div class="title-pages">Carreira e Salários</div>
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
                <p></p>
                {!!$carreiraSalrios->text!!}
            </div>

            @if ($arquivo['path'] != '')
            <div class="row">
                <div class="col s12 m6">
                    <div class="box-estatutos">
                        <div class="col s12">
                            <a href="/{{$arquivo['path']}}"><div class="col s3"><img class="responsive-img" src="/images/XLS.png" title="{{$arquivo['nome']}}" alt="{{$arquivo['nome']}}"></div>
                            <div class="col s9">
                                <div class="texto-estatuto">
                                    <p>{{$carreiraSalrios->titulo}}</p>
                                    {!!$carreiraSalrios->descritivo!!}
                                </div>
                            </div> </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    </div>
</div>

@endsection
