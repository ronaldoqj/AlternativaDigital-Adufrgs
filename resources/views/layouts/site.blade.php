<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" maximum-scale="1.0"/>

    @yield('metatags')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{-- config('app.title') --}}ADUFRGS</title>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/plugins-frameworks/materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    @yield('css')


   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124794759-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-124794759-1');
</script>


   </head>
<body>
    <div id="voltarAoTopo"></div>
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="fechar-menu-mobile">X</div>

                <div class="menu-mobile-info">
                    <div><a href="/"><img src="/images/logo.png" width="162" height="34" alt="ADVerso" title="ADVerso" /></a></div>
                    <div><a href="#">ADUFRGS</a></div>
                    <div class="p-l-16">51. 3228 1188</div>
                    <div><a href="#">contato@adufrgs.com.br</a></div>
                    <!-- <div><a href="#"><img src="/images/Adufrgs-sindical.png" width="79" height="23" /></a></div> -->
                </div>
            </div>
        </li>

        <!-- <li>
            <div style="margin-left:15px;">
            <form action="/pesquisa" method="post">
                {{ csrf_field() }}
                <input name="pesquisa" id="bt-search" class="browser-default" type="text" placeholder="Buscar" value="" required />
                <input type="submit" value="Pesquisar" />
            </form>
            </div>
        </li> -->
        <li><a class="waves-effect" href="/instituicao">INSTITUIÇÃO</a></li>
        <li><a class="waves-effect" href="/associe-se">ASSOCIE-SE</a></li>
        <li><a class="waves-effect" href="/area-do-associado">ÁREA DO ASSOCIADO</a></li>
        <li><a class="waves-effect" href="/juridico">JURIDÍCO</a></li>
        <li><a class="waves-effect" href="/carreira-e-salarios">CARREIRA E SALÁRIOS</a></li>
        <li><a class="waves-effect" href="/convenios">CONVÊNIOS</a></li>
        <!-- <li><a class="waves-effect" href="/contato">CONTATO</a></li> -->
        <li><div class="divider"></div></li>
        <li><a class="subheader">Redes Sociais</a></li>
        <li><a class="waves-effect" target="_blank" href="https://www.facebook.com/adufrgssindical/" title="Facebook"><i class="fontello-icon icon-facebook">&#xe80d;</i> <span class="m-l--20">Facebook</span></a> </li>
        <li><a class="waves-effect" target="_blank" href="https://twitter.com/adufrgssindical" title="Twitter"><i class="fontello-icon icon-twitter">&#xe802;</i>  <span class="m-l--20">Twitter</span></a>  </li>
        <li><a class="waves-effect" target="_blank" href="https://www.instagram.com/adufrgssindical/" title="Instagram"><i class="fontello-icon icon-instagram">&#xe80e;</i> <span class="m-l--20">Istagram</span></a>  </li>
        <li><a class="waves-effect" target="_blank" href="http://www.flickr.com/people/140228450@N08/" title="Flickr"><i><div class="box-flickr"><div class="bola-flickr"></div><div class="bola-flickr"></div></div></i> <span class="m-l--20">Flickr</span></a>  </li>
        <li>&nbsp;<br/>&nbsp;</li>
    </ul>

    <div class="menu-desktop">
        <div class="container background-top hide-desketop-and-down">
            <div class="row">
                <div class="col s2 p-l-0">
                    <a href="/"><img src="/images/logo.png" width="192" height="40" alt="ADVerso" title="ADVerso" class="logo" /></a>
                </div>
                <div class="col s10 p-0">
                    <div class="menus">
                        <div class="menu-principal clearfix">
                            <div class="principal-itens">
                                <ul>
                                    <!-- <li><a href="/contato">CONTATO</a></li> -->
                                    <li><a href="/convenios">CONVÊNIOS</a></li>
                                    <li><a href="/carreira-e-salarios">CARREIRA E SALÁRIOS</a></li>
                                    <li><a href="/juridico">JURIDÍCO</a></li>
                                    <li><a href="/area-do-associado">ÁREA DO ASSOCIADO</a></li>
                                    <li><a href="/associe-se">ASSOCIE-SE</a></li>
                                    <li><a href="/instituicao">INSTITUIÇÃO</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu-mobile show-xlarge clearfix">
            <div class="container">
                <div class="menu-icone right"><a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fontello-icon icon-menu">&#xe800;</i></a></div>
                <div class="center valign-wrapper logo-mobile-left"><a href="/"><img src="/images/logo.png" width="162" height="34" alt="ADVerso" title="ADVerso" /></a></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <!-- Modal Newsletter -->
    <div id="alert" class="modal modal-fixed-footer">
        <div class="modal-content">
            <div class="form-news-letter">
                <div class="col s12 title-alert">Realizado com sucesso!</div>
                <hr />
                <div class="col s12 text-alert">Realizado com sucesso!</div>
            </div>
        </div>

        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
    </div>


    @yield('content')

    <footer>
        <!-- <div class="container background-top hide-desketop-and-down"> -->
        <div class="container background-top">
            <div class="row">
                <div class="col s3 m-t-60 box-logo-rodape">
                    <a href="/"><img src="/images/Adufrgs-sindical.png" width="210" height="44" alt="ADVerso" title="ADVerso" /></a>
                </div>
                <div class="col s9 p-0 box-menu-social">
                    <div class="menus">
                        <div class="menu-principal clearfix">
                            <div class="principal-itens">
                                <ul>
                                    <li><a href="/instituicao">INSTITUIÇÃO</a></li>
                                    <li><a href="/associe-se">ASSOCIE-SE</a></li>
                                    <li><a href="/area-do-associado">ÁREA DO ASSOCIADO</a></li>
                                    <li><a href="/juridico">JURIDÍCO</a></li>
                                    <li><a href="#">CARREIRA E SALÁRIOS</a></li>
                                    <li><a href="/convenios">CONVÊNIOS</a></li>
                                    <!-- <li><a href="/contato">CONTATO</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="menu-social">
                          <div class="group-social-network">
                              <ul>
                                  <li><div redes-sociais>ADUFRGS nas Redes sociais</div></li>
                                  <li><a target="_blank" href="#" title="Facebook"><i class="fontello-icon icon-facebook">&#xe80d;</i></a></li>
                                  <li><a target="_blank" href="#" title="Twitter"><i class="fontello-icon icon-twitter">&#xe802;</i></a></li>
                                  <li><a target="_blank" href="#" title="Whatsapp"><i class="fontello-icon icon-whatsapp">&#xe803;</i></a></li>
                              </ul>
                          </div>
                    </div> -->





                    <div class="contato-rodape">
                        <div class="col s6">
                              <div class="mapa">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.286743593924!2d-51.19291238529911!3d-30.05731418187761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9519780fe2f65c95%3A0x9ef9a35faea4363f!2sADUFRGS+Sindical!5e0!3m2!1spt-BR!2sie!4v1539907611013" width="100%" height="120" frameborder="0" style="border:0" allowfullscreen></iframe>
                              </div>
                              <div class="title-contato">SEDE BARÃO DO AMAZONAS</div>
                              <table>
                                  <tr>
                                      <td><div class="localizacao"></div></td>
                                      <td>
                                          <p>Rua Barão do Amazonas, 1581</p>
                                          <p>Jardim Botânico - Porto Alegre - RS</p>
                                          <p>CEP: 90670-005</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><div class="fone"></div></td>
                                      <td>
                                          <p>51.3228 1188</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><div class="site"></div></td>
                                      <td>contato@adufrgs.org.br</td>
                                  </tr>
                              </table>
                        </div>
                    </div>

                    <div class="contato-rodape">
                        <div class="col s6">
                              <div class="mapa">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3452.80798353121!2d-51.12243013529873!3d-30.0710380318726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sAV.+Bento+Gon%C3%A7alves%2C+9500+(Pr%C3%A9dio+43.606+-+Setor+2)!5e0!3m2!1spt-BR!2sie!4v1539908781921" width="100%" height="120" frameborder="0" style="border:0" allowfullscreen></iframe>
                              </div>
                              <div class="title-contato">SEDE BENTO GONÇALVES</div>
                              <table>
                                  <tr>
                                      <td><div class="localizacao"></div></td>
                                      <td>
                                          <p>AV. Bento Gonçalves, 9500 (Prédio 43.606 - Setor 2)</p>
                                          <p>Porto Alegre - RS</p>
                                          <p>CEP: 91501-970</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><div class="fone"></div></td>
                                      <td>
                                          <p>51.3315 8161 -3308 7388 1188</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><div class="site"></div></td>
                                      <td>contato@adufrgs.org.br</td>
                                  </tr>
                              </table>
                        </div>
                    </div>




                    <!-- <div class="contato-rodape">
                        <div class="col s3">
                            <div class="box-contato-rodape">
                                <div>Telefones</div>
                                <div>(51) 3228-1188</div>
                                <div>(51) 3315-8161</div>
                                <div>(51) 3308-7388</div>
                            </div>
                        </div>
                        <div class="col s9">
                            <div class="box2-contato-rodape">
                                <div>Endereço</div>
                                <div>Rua Barão do Amazonas, 1581 - Jardim Botânico - Porto Alegre - RS</div>
                                <div class="endereco-contato-rodape">Avenida Bento Gonçalves, 9500 - Prédio 43606 - Setor 2 - Porto Alegre - RS</div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>

        <div id="alternativa-digital">
            <a href="http://alternativadigital.com.br" target="_blank"><img src="/images/alternativa-digital.png" width="245" height="29" alt="Alternativa Digital" title="Alternativa Digital" /></a>
        </div>
    </footer>

    <!--  Scripts-->
    <script src="/plugins-frameworks/jquery/v3.3.1/jquery-3.3.1.min.js"></script>
    <script src="/plugins-frameworks/materialize/js/materialize.js"></script>
    <script src="/js/init.js"></script>
    @yield('js')
</body>
</html>
