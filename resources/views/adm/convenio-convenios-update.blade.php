<?php
    $register = $return['convenio'];
    $categorias = $return['categorias'];
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
        .imagesList:hover { border: solid 3px #999; opacity: 0.8; cursor: pointer; transition: 0.2s ease-out; }
        .imagesList { cursor: pointer; opacity: 1; border: solid 0px #999; transition: 0.2s; }
        .explicacao { font-size: 0.8em; line-height: 1.1em; color: #888; margin-top: 3px; }
        .italico { font-style: italic; text-decoration: underline; }
        .idNegrito { color: black; font-weight: bold; font-style: normal; text-decoration: underline; }
        .card .card-body .card-body { padding: 0.65rem; }

        /* Galeria */
        .thumbs { width: 102px; float: left; margin: 8px; }
        .btnThumbs { font-size: 0px; padding: 3px 13px 6px; }
        .btnThumbsImages { font-size: 0px; padding: 0px 4px 5px; }
        .inputThumb { width: 250px; }
        .custom-control-inline { margin-right: 0.5rem; }
        .custom-control { padding-left: 1.2rem; }
        .pelicolas {
            margin: 0 auto;
            width: 21px;
            height: 21px;
            -webkit-background-size: cover !important;
            -moz-background-size: cover !important;
            -o-background-size: cover !important;
            background-position: center !important;
            background-size: cover !important;
            background-repeat: no-repeat;
        }
        .pelicula-none {
            background: url('/imgs/Home/sem_pelicula.png') no-repeat;
        }
        .pelicula-play {
            /* background: url('/imgs/Home/play.png') no-repeat; */
        }
        .pelicula-galeria {
            /* background: url('/imgs/Home/galeria.png') no-repeat; */
        }
    </style>
@endsection
@section('jsHead')
    <script type="text/javascript" src="/plugins-frameworks/ckeditor/ckeditor.js"></script>
@endsection
@section('js')
    <script src="/js/pages/adm/convenio-convenios.js"></script>
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
            <a class="btn btn-outline-dark btn-sm" href="/adm/convenio/convenios" role="button">Voltar</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 m-b-20">
                <div class="card border-dark">

                      <form action="" method="post" enctype="multipart/form-data" class="was-validated">
                          {{ csrf_field() }}
                          <input type="hidden" name="action" value="edit">
                          <input type="hidden" name="id" value="{{$register->id}}">
                          <input type="hidden" name="categorias" value="">
                          <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-6">
                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  <label for="inputNome">Nome:*</label>
                                                  <input type="text" class="form-control form-control-sm" id="inputNome" maxlength="240" placeholder="Nome" name="name" value="{{$register->name}}" required />
                                              </div>
                                          </div>

                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  <label for="inputTelefone">Categorias:</label>
                                                  <select id="selectCategoria" name="categoria" class="selectpicker is-valid" data-actions-box="true" data-width="100%" title="Selecione o Autor">
                                                      <option value="">Selecione uma Categoria</option>

                                                      @foreach( $categorias as $item )
                                                          <?php
                                                              $img = '/images/default.png';
                                                              if ( $item->image_namefilefull != '' ) { $img = '/' . $item->image_namefilefull; }

                                                              $selected = '';

                                                              if ($item->id == $register->categoria) {
                                                                  $selected = 'selected';
                                                              }
                                                          ?>
                                                          <option {{$selected}}  value="{{$item->id}}" data-content="<img src='{{$img}}' height='25' alt='{{$item->name}}'> {{str_limit($item->name, 30, '...')}}">{{str_limit($item->name, 30, '...')}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                          </div>

                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  <label for="inputDescription">Vantagem:</label>

                                                  <textarea id="inputDescription" name="description">{!!$register->description!!}</textarea>
                                                  <script type="text/javascript">
                                                      CKEDITOR.replace( 'inputDescription' );
                                                  </script>
                                              </div>
                                          </div>
                                    </div>
                                    <div class="col-lg-6">
                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  <label for="inputEndereco">Endereço:</label>
                                                  <input type="text" class="form-control form-control-sm" id="inputEndereco" maxlength="240" placeholder="Endereco" name="endereco" value="{{$register->endereco}}" />
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  <label for="inputFone">Telefone:</label>
                                                  <input type="text" class="form-control form-control-sm" id="inputFone" maxlength="30" placeholder="Telefone" name="fone" value="{{$register->fone}}" />
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  <label for="inputEmail">E-Mail:</label>
                                                  <input type="text" class="form-control form-control-sm" id="inputEmail" maxlength="240" placeholder="Email" name="email" value="{{$register->email}}" />
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  <label for="inputTelefone">Site:</label>
                                                  <input type="text" class="form-control form-control-sm" id="inputSite" maxlength="240" placeholder="Site" name="site" value="{{$register->site}}">
                                              </div>
                                          </div>
                                    </div>
                                </div>
                          </div>

                          <div class="card-footer text-muted">
                                <button type="submit" id="bt-cadastrar-editar" class="btn btn-outline-success btn-block">Atualizar Convênio</button>
                          </div>
                      </form>

                </div>
        </div>
    </div>

</div>


<!-- =====================================================================================================================================  -->
<!-- Modal Imagem                                                                                                                           -->
<!-- =====================================================================================================================================  -->
<div id="modalImage" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div id="edit" class="modal-dialog modal-lg">
    <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Imagem do Convênio</h5>
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
      <input type="hidden" name="action" value="">
      <input type="hidden" name="id" value="">
      <input type="hidden" name="campo" value="">
</form>
@endsection
