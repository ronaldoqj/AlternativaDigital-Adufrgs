<?php
    $materias = $return['materias'];
    $autores = $return['docenteAutores'];
?>
@extends('layouts.adm')
@section('css')
    <link rel="stylesheet" href="/plugins-frameworks/bootstrap-select-1.13.0/dist/css/bootstrap-select.css">
    <style>
        label { margin-bottom: 0rem; }
        .card-header { cursor: pointer; }
        .card .border-secondary { margin: 5px 0; }
        .text-secondary { padding: 8px; }
        .btns-listagem { padding-top: 3px; height: 40px; }
        .btns-listagem .btn { padding: 3px 8px 0px; }
        .col-form-label { word-wrap:normal; }
        .imagesList:hover {
            box-shadow: inset 0px 0px 0px 4px #999;
            opacity: 0.8;
            transition: 0.3s ease-out;
            cursor: pointer;
        }
        .imagesList {
            width: 80px;
            height: 40px;
            float: left;
            margin-right: 8px;
            background-position: center, center !important;
            -webkit-background-size: cover, cover !important;
            -moz-background-size: cover, cover !important;
            -o-background-size: cover, cover !important;
            background-size: contain, cover !important;
            background-repeat: no-repeat;
            cursor: pointer;

            opacity: 1;
            box-shadow: inset 0px 0px 1px 1px #999;
            transition: 0.3s;
        }
        .explicacao {
            font-size: 0.8em;
            line-height: 1.1em;
            color: #888;
            margin-top: 3px;
        }
        .italico { font-style: italic; text-decoration: underline; }
        .idNegrito { color: black; font-weight: bold; font-style: normal; text-decoration: underline; }
    </style>
@endsection
@section('jsHead')
    <script type="text/javascript" src="/plugins-frameworks/ckeditor/ckeditor.js"></script>
@endsection
@section('js')
    <script src="/js/pages/adm/docente-materia.js"></script>
    <!-- <script src="/js/pages/adm/ajaxBannersTop.js"></script> -->
    <script src="/plugins-frameworks/bootstrap-select-1.13.0/dist/js/bootstrap-select.js"></script>
@stop
@section('content')

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <h5 class="text-center m-b-20"><strong>Erro ao concluir a requisição!</strong></h5>

  <ul>
      @foreach ($errors->all() as $error)
          <li>{!! $error !!}</li>
      @endforeach
  </ul>

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-20">
            <p>
                <button class="btn btn-outline-dark btn-block" type="button" data-toggle="collapse" data-target="#register" aria-expanded="false" aria-controls="register">
                    Cadastrar Nova Matéria
                </button>
            </p>
            <div id="register" class="collapse">
                    <div class="card border-dark">

                          <form action="" method="post" enctype="multipart/form-data" class="was-validated">
                              {{ csrf_field() }}
                              <input type="hidden" name="action" value="register">
                              <input type="hidden" name="categorias" value="">
                              <div class="card-body">

                                    <div class="row">

                                        <div class="col-lg-5">

                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputTelefone">Autor:</label>
                                                      <select id="selectAutor" name="autor" class="selectpicker is-valid" data-actions-box="true" data-width="100%" title="Selecione o autor">
                                                          <option value="">Selecione um autor</option>
                                                          @foreach( $autores as $autor )
                                                              <?php
                                                                  $img = '/images/default.png';
                                                                  if ( $autor->image_namefilefull != '' ) { $img = '/' . $autor->image_namefilefull; }
                                                              ?>
                                                              <option value="{{$autor->id}}" data-content="<img src='{{$img}}' height='25' alt='{{$autor->name}}'> {{str_limit($autor->name, 30, '...')}}">{{str_limit($autor->name, 30, '...')}}</option>
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>

                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputAssunto">Assunto:*</label>
                                                      <input type="text" class="form-control form-control-sm" id="inputAssunto" maxlength="240" placeholder="Assunto" name="assunto" />
                                                  </div>
                                              </div>
                                              
                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputTitle">Título:*</label>
                                                      <input type="text" class="form-control form-control-sm" id="inputTitle" maxlength="240" placeholder="Título" name="title" required />
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputSub_title">Sub-titulo:</label>
                                                      <input type="text" class="form-control form-control-sm" id="inputSub_title" maxlength="240" placeholder="Sub-titulo" name="subtitle" />
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputTexto">Texto 1:</label>
                                                      <textarea id="inputTexto" name="texto"></textarea>
                                                      <script type="text/javascript">
                                                          CKEDITOR.replace( 'inputTexto' );
                                                      </script>
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputTexto2">Texto 2:</label>
                                                      <textarea id="inputTexto2" name="texto2"></textarea>
                                                      <script type="text/javascript">
                                                          CKEDITOR.replace( 'inputTexto2' );
                                                      </script>
                                                  </div>
                                              </div>
                                        </div>
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-6">
                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputImagemPrincipal">Imagem Principal:</label>

                                                      <div class="card border-secondary">
                                                          <div class="card-body">
                                                              <div class="custom-file mb-3">
                                                                  <input type="file" id="inputImagemPrincipal" class="custom-file-input" name="fileImagemPrincipal[]">
                                                                  <label class="custom-file-label" for="customFile">Imagem Principal</label>
                                                              </div>
                                                              <label for="inputLegendaImagemPrincipal">Legenda:</label>
                                                              <input type="text" class="form-control form-control-sm" maxlength="240" placeholder="Legenda da imagem" name="legendaImagem">
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                    <label for="inputGaleria">Galeria de Fotos:</label>

                                                    <div class="card border-secondary">
                                                        <div class="card-body">
                                                            <label for="inputGaleria">Nome Padrão:</label>
                                                            <input type="text" class="form-control form-control-sm mb-3" maxlength="140" placeholder="Nome padrão para todas imagens" name="namedefault">
                                                            <label for="inputGaleria">Selecione as Imagens:</label>
                                                            <div class="custom-file">
                                                                <input type="file" id="inputGaleria" class="custom-file-input" multiple name="filesGaleria[]">
                                                                <label class="custom-file-label" for="customFile">Imagens Para a Galeria</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </div>

                                              <?php /*
                                              <div class="form-group row">
                                                  <label for="inputVideo" class="col-sm-12 col-form-label">Link de incorporação do vídeo*</label>
                                                  <div class="col-sm-12">
                                                      <textarea class="form-control form-control-sm is-invalid" rows="4" id="inputVideo" placeholder="Link de incorporação." name="video"></textarea>
                                                      <div class="explicacao">Esse é o link que aparece quando clicamos no botão compartilhar e em seguida no botão incorporar. Após isso é apresentada uma nova seção com o título de, "Embed Video", basta cópiar o link desta seção.</div>
                                                  </div>
                                              </div>
                                              */ ?>

                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputSite">Site:</label>
                                                      <input type="text" class="form-control form-control-sm" id="inputSite" maxlength="240" placeholder="Site" name="site">
                                                  </div>
                                              </div>
                                              <?php /*
                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputResponsavel">Links Redes Sociais:</label>
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-2">
                                                      <img src="/images/adm/facebook.png" class="img-fluid" alt="Facebook" />
                                                  </div>
                                                  <div class="form-group col-md-10">
                                                      <input type="text" class="form-control form-control-sm" id="inputFacebook" maxlength="240" placeholder="Facebook" name="facebook">
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-2">
                                                      <img src="/images/adm/twiiter.png" class="img-fluid" alt="Twitter" />
                                                  </div>
                                                  <div class="form-group col-md-10">
                                                      <input type="text" class="form-control form-control-sm" id="inputTwitter" maxlength="240" placeholder="Twitter" name="twitter">
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-2">
                                                      <img src="/images/adm/instagram.png" class="img-fluid" alt="Instagram" />
                                                  </div>
                                                  <div class="form-group col-md-10">
                                                      <input type="text" class="form-control form-control-sm" id="inputInstagram" maxlength="240" placeholder="Instagram" name="instagram">
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-2">
                                                      <img src="/images/adm/flickr.png" class="img-fluid" alt="Flickr" />
                                                  </div>
                                                  <div class="form-group col-md-10">
                                                      <input type="text" class="form-control form-control-sm" id="inputFlickr" maxlength="240" placeholder="Flickr" name="flickr">
                                                  </div>
                                              </div>
                                              */ ?>
                                        </div>
                                    </div>

                              </div>

                              <div class="card-footer text-muted">
                                    <button type="submit" id="bt-cadastrar-editar" class="btn btn-outline-success btn-block">Cadastrar Matéria</button>
                              </div>
                          </form>

                    </div>
            </div>
        </div>
    </div>

    <div></div>

    <div class="row">
        <div class="col-md-12">

              <!-- Conteiner da listagem -->
              <div class="card bg-light">
                <div class="card-header">Listagem das Matérias</div>
                <div class="card-body">
                      <!-- ==================================================================  -->
                      <!-- ======================== Itens listados =========================== -->
                      <!-- ==================================================================  -->

                      @forelse ($materias as $register)
                          <?php
                              $img = 'images/default.png';
                              $img = $register->imagem_principal_namefilefullthumb ? $register->imagem_principal_namefilefullthumb : $img;
                              $imgGrande = $img;
                              $imgGrande = $register->imagem_principal_namefilefull ? $register->imagem_principal_namefilefull : $img;

                              $checkBoxActive = '';
                              $checkBoxCheck = '';
                              // if ($register->banner == 'S') {
                              //     $checkBoxActive = 'active';
                              //     $checkBoxCheck = 'checked';
                              // }
                              $checkBoxHomeActive = '';
                              $checkBoxHomeCheck = '';
                              // if ($register->home == 'S') {
                              //     $checkBoxHomeActive = 'active';
                              //     $checkBoxHomeCheck = 'checked';
                              // }
                          ?>
                          <form action="{{url("/adm/docente/materia-edit/{$register->id}")}}" method="get">
                              <div class="card border-secondary">
                                <div class="card-body text-secondary">


                                  <div class="row">
                                      <?php /*
                                      <div class="col col-12 col-sm-6">

                                          <div class="input-group input-group-sm mb-1">
                                              <div class="input-group-prepend">
                                                  <div class="input-group-text">
                                                    <input type="checkbox" class="checkbox-register-home" rel-id="{{$register->id}}" rel-table="noticias" rel-Column="home" aria-label="Checkbox for following text input" {{$checkBoxHomeCheck}} /><span id="span-register-home_{{$register->id}}" class="check-register checkBoxSN {{$checkBoxHomeActive}}">Home</span>
                                                  </div>
                                              </div>
                                              <input type="number" id="order_home-{{$register->id}}" class="form-control size-font order-banners" rel-id="{{$register->id}}" rel-table="noticias" rel-Column="order_home" aria-label="Text input with checkbox" placeholder="Ordem na home" value="{{$register->order_home}}" />
                                          </div>

                                      </div>
                                      <div class="col col-12 col-sm-6">
                                        <div class="input-group input-group-sm mb-1">
                                          <input type="number" id="order-{{$register->id}}" class="form-control text-right size-font order-banners" rel-id="{{$register->id}}" rel-table="noticias" rel-Column="order" aria-label="Text input with checkbox" placeholder="Ordem do banner" value="{{$register->order}}" />
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                  <input type="checkbox" class="checkbox-register" rel-id="{{$register->id}}" rel-table="noticias" rel-Column="banner" aria-label="Checkbox for following text input" {{$checkBoxCheck}} /><span id="span-register_{{$register->id}}" class="check-register checkBoxSN {{$checkBoxActive}}">Banner</span>
                                                </div>
                                            </div>

                                        </div>
                                      </div>
                                      */ ?>
                                  </div>

                                  <?php
                                      $pelicula = 'url("/images/adm/padrao.png"), ';
                                      // if ($register->pelicula == 'player' ) {
                                      //     $pelicula = 'url("/images/adm/play.png"), ';
                                      // } elseif ($register->pelicula == 'galeria' ) {
                                      //     $pelicula = 'url("/images/adm/galeria.png"), ';
                                      // } else {
                                      //     $pelicula = 'url("/images/adm/padrao.png"), ';
                                      // }
                                  ?>
                                  <div class="imagesList" rel="/{{$imgGrande}}" style="background-image: {{$pelicula}} url(/{{$img}});"></div>
                                      <div style="float:right;" class="btns-listagem">
                                          <div class="input-group-append">
                                            <!-- <div class="input-group-text">
                                                <input type="checkbox" class="checkbox-register-home" rel-id="{{$register->id}}" rel-table="noticias" rel-Column="home" aria-label="Checkbox for following text input" {{$checkBoxHomeCheck}} /><span id="span-register-home_{{$register->id}}" class="check-register checkBoxSN {{$checkBoxHomeActive}}">Home</span>
                                            </div>
                                            <div class="input-group-text">
                                                <input type="checkbox" class="checkbox-register" rel-id="{{$register->id}}" rel-table="noticias" rel-Column="banner" aria-label="Checkbox for following text input" {{$checkBoxCheck}} /><span id="span-register_{{$register->id}}" class="check-register checkBoxSN {{$checkBoxActive}}">Banner</span>
                                            </div> -->
                                            <button class="btn btn-outline-secondary edit" type="submit" title="Edita"><i class="material-icons i-corrige">mode_edit</i></button>
                                            <button class="btn btn-outline-secondary delete" type="button" rel="{{$register->id}}"><i class="material-icons i-corrige">delete_forever</i></button>
                                          </div>
                                      </div>
                                      <div style="float:left; margin-right:8px; padding-top:10px;">{{$register->title}}</div>
                                </div>
                              </div>
                          </form>
                      @empty
                          <p>Nenhuma matéria cadastrada no momento.</p>
                      @endforelse
                      <!-- ==================================================================  -->
                      <!-- ======================== Itens listados =========================== -->
                      <!-- ==================================================================  -->
                </div><!-- Fim card-body -->
              </div><!-- Fim card bg-light -->

        </div> <!-- Fim m12 -->
    </div> <!-- Fim row -->


</div>


<!-- =====================================================================================================================================  -->
<!-- Modal Imagem                                                                                                                           -->
<!-- =====================================================================================================================================  -->
<div id="modalImage" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div id="edit" class="modal-dialog modal-lg">
    <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Imagem da Matéria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
              <div style="margin-bottom: 10px;">
                <img src="" alt="" id="imageThumb" class="img-fluid img-thumbnail img-modal mx-auto d-block">
              </div>
              <div style="clear:both;"></div>
          </div>
      </div>
  </div>
</div>


<!-- Form Delete -->
<form id="form-delete" action="" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="action" value="delete">
      <input type="hidden" name="idMateria" value="">
</form>
@endsection
