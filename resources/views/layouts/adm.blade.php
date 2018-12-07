<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ADUFRGS') }}</title>

    <!-- Fonte Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
    <link href="/plugins-frameworks/bootstrap/v4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/adm-layout.css">
    @yield('css')
    @yield('jsHead')
</head>
<body>
  @php
      $title = 'AD Verso';
  @endphp
  @isset($return['title'])
      @php
          $home = '';
          $docente = '';
          $associeSe = '';
          $programacoes = '';
          $categorias = '';
          $convenios = '';
          $instituicao = '';
          $usuario = '';
          $informativos = '';
          $juridico = '';
          $carreiraSalario = '';

          $title = $return['title'];

          if( $title == 'HOME / Banner 1' ||
              $title == 'Home / Atualizar Banner 1' ||
              $title == 'HOME / Banner 2' ||
              $title == 'Home / Atualizar Banner 2' ) { $home = 'active'; }
          if( $title == 'DOCENTE / Autor' ||
              $title == 'DOCENTE / Atualizar Autor' ||
              $title == 'DOCENTE / Matéria' ||
              $title == 'DOCENTE / Atualizar Matéria' ) { $docente = 'active'; }
          if($title == 'Categorias-Banco de Imagens' ||
             $title == 'Categorias-Matéria' ||
             $title == 'Categorias-Colunista') { $categorias = 'active'; }
          if($title == 'Convênio / Categorias' ||
             $title == 'Convênio / Atualizar Categorias' ||
             $title == 'Convênio / Convênios' ||
             $title == 'Convênio / Atualizar Convênios' ||
             $title == 'Convênio / Texto Topo') { $convenios = 'active'; }
          if($title == 'Associe-se | Formulário') { $associeSe = 'active'; }
          if($title == 'Instituição') { $instituicao = 'active'; }
          if($title == 'Informativo' ||
             $title == 'Informativo / Atualizar') { $informativos = 'active'; }
          if($title == 'Jurídico') { $juridico = 'active'; }
          if($title == 'Carreiras e Salários') { $carreiraSalario = 'active'; }
          if($title == 'Usuário') { $usuario = 'active'; }
      @endphp
  @endisset
    <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="titulo-menu-header text-center">
                    <h3><img src="/images/Adufrgs-sindical-120x25.png" /></h3>
                    <strong><img src="/images/Adufrgs-sindical-51x40.png" /></strong>
                </div>
                <div class="sidebar-header">
                    <!-- <h3 class="text-center"><img src="/images/avatar-adm.png" /></h3>
                    <strong>AD</strong> -->
                    <div class="adm-avatar-menu"><img class="img-fluid rounded-circle" src="/images/avatar-adm.png" /></div>
                    <div class="adm-info-avatar-menu">
                        <ul>
                            <li>{{ Auth::user()->name }}</li>
                            <li>{{ Auth::user()->funcao }}</li>
                        </ul>
                    </div>
                    <div style="clear:both;"></div>
                </div>

                <ul class="list-unstyled components">

                    <li class="titulos-menus-adm">Conteúdo Portal</li>

                    <li class="{{$home}}">
                      <a href="#home" data-toggle="collapse" aria-expanded="false">
                        <i class="material-icons">home</i>
                        Home
                      </a>
                      <ul class="collapse list-unstyled" id="home">
                        <li>
                          <a href="/adm/banner1">
                            <i class="material-icons">picture_in_picture</i>
                            Banner 1
                          </a>
                        </li>
                        <li>
                          <a href="/adm/banner2">
                            <i class="material-icons">picture_in_picture_alt</i>
                            Banner 2
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li class="{{$docente}}">
                      <a href="#docente" data-toggle="collapse" aria-expanded="false">
                        <i class="material-icons">group</i>
                        Docente
                      </a>
                      <ul class="collapse list-unstyled" id="docente">
                        <li>
                          <a href="/adm/docente/autor">
                            <i class="material-icons">person_outline</i>
                            Autor
                          </a>
                        </li>
                        <li>
                          <a href="/adm/docente/materia">
                            <i class="material-icons">web</i>
                            Matéria
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li class="{{$convenios}}">
                      <a href="#convenios" data-toggle="collapse" aria-expanded="false">
                        <i class="material-icons">payment</i>
                        Convenio
                      </a>
                      <ul class="collapse list-unstyled" id="convenios">
                        <li>
                          <a href="/adm/convenio/texto-topo">
                            <i class="material-icons">text_fields</i>
                            Texto Topo
                          </a>
                        </li>
                        <li>
                          <a href="/adm/convenio/categorias">
                            <i class="material-icons">apps</i>
                            Categorias
                          </a>
                        </li>
                        <li>
                          <a href="/adm/convenio/convenios">
                            <i class="material-icons">payment</i>
                            Convenios
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li class="{{$associeSe}}">
                        <a href="/adm/associe-se">
                            <i class="material-icons">local_post_office</i>
                            Associe-se
                        </a>
                    </li>

                    <li class="{{$instituicao}}">
                        <a href="/adm/instituicao">
                            <i class="material-icons">business</i>
                            Instituição
                        </a>
                    </li>

                    <li class="{{$informativos}}">
                        <a href="/adm/informativos">
                            <i class="material-icons">info</i>
                            Informativo
                        </a>
                    </li>

                    <li class="{{$juridico}}">
                        <a href="/adm/juridico">
                            <i class="material-icons">account_balance</i>
                            Jurídico
                        </a>
                    </li>

                    <li class="{{$carreiraSalario}}">
                        <a href="/adm/carreiras-e-salarios">
                            <i class="material-icons">monetization_on</i>
                            Carreiras e Salários
                        </a>
                    </li>

                </ul>

                <ul class="list-unstyled list-unstyled-top">
                    <li class="titulos-menus-adm">Admin</li>

                    <li class="{{$usuario}}">
                        <a href="/adm/usuario">
                            <i class="material-icons">person</i>
                            Usuário
                        </a>
                    </li>
                </ul>
                <div class="m-b-40"></div>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">

                    <div class="container-fluid">
                        <i id="sidebarCollapse" class="material-icons">view_compact</i>

                        <table class="table-home-title">
                          <tr>
                            <td class="title">{{$title}}</td>
                          </tr>
                        </table>

                        <div>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>

                </nav>

                @yield('content')

            </div>
    </div>

    <!--<script src="/plugins-frameworks/bootstrap/v4.0.0/js/boostrap.min.js"></script>
    <script src="/plugins-frameworks/bootstrap/v4.0.0/js/popperV1.12.9.min.js"></script> -->
	<script src="/plugins-frameworks/jquery/v3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!-- Scripts -->
    @yield('js')

</body>
</html>
