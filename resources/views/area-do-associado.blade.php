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
    <div class="title-pages">Área do Associado</div>
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
                <p>
                  Acesse suas informações de administrativas, financeiras e jurídicas
                </p>

            </div>


            {{-- ========================================================== --}}
            {{-- ==================== Área do Associado =================== --}}
            {{-- ========================================================== --}}

            <div class="row">
                <div class="col s12 m10 offset-m1 l8 offset-l2">
                    <div class="area-do-associado">
                        <input class="browser-default inputs-area-do-associado" type="text" placeholder="CPF" name="cpf" required />
                        <input class="browser-default inputs-area-do-associado" type="password" placeholder="Senha" name="senha" required />
                        <input type="button" id="bt-login" name="bt-login" value="login" />
                        <a href="#">Esqueci minha senha</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
</div>

@endsection
