<?php
    $register = $return['juridico'];
?>

@extends('layouts.site')

@section('css')
    <link href="/css/pages/internas.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/pages/juridico.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
    <div class="title-pages">Jurídico</div>
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
                <!-- <div class="img-topo-juridico"><img class="responsive-img" src="/images/img-juridico.png"></div> -->
                {!!$register->text!!}
            </div>





        </div>
    </div>
    </div>
</div>

@endsection
