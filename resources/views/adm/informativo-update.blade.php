<?php
    $informativo = $return['informativo'];
    $file = count($return['file']) ? $return['file'][0] : [];
?>
@extends('layouts.adm')
@section('css')
    <style>
        label { margin-bottom: 0rem; }
        .card-header { cursor: pointer; }
        .card .border-secondary { margin: 5px 0; }
        .text-secondary { padding: 8px; }
        .btns-listagem { padding-top: 3px; height: 40px; }
        .btns-listagem .btn { padding: 3px 8px 0px; }
        .col-form-label { word-wrap:normal; }
        .imagesList:hover {
            border: solid 3px #999;
            opacity: 0.8;
            transition: 0.2s ease-out;
            cursor: pointer;
        }
        .imagesList {
            cursor: pointer;
            opacity: 1;
            border: solid 0px #999;
            transition: 0.2s;
        }
        .explicacao {
            font-size: 0.8em;
            line-height: 1.1em;
            color: #888;
            margin-top: 3px;
        }
        .italico { font-style: italic; text-decoration: underline; }
        .idNegrito { color: black; font-weight: bold; font-style: normal; text-decoration: underline; }
        .card .card-body .card-body { padding: 0.65rem; }

        /* Galeria */
        .thumbs { width: 102px; float: left; margin: 8px; }
        .btnThumbs { font-size: 0px; padding: 3px 13px 6px; }
        .btnThumbsImages { font-size: 0px; padding: 0px 4px 5px; }
        .inputThumb { width: 250px; }
    </style>
@endsection
@section('jsHead')
    <script type="text/javascript" src="/plugins-frameworks/ckeditor/ckeditor.js"></script>
@endsection
@section('js')
    <script src="/js/pages/adm/informativo.js"></script>
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
            <a class="btn btn-outline-dark btn-sm" href="/adm/informativos" role="button">Voltar</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 m-b-20">
                <div class="card border-dark">

                      <form action="" method="post" enctype="multipart/form-data" class="was-validated">
                          {{ csrf_field() }}
                          <input type="hidden" name="action" value="edit" />
                          <input type="hidden" name="id" value="{{$informativo->id}}" />
                          <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-12">

                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  <label for="inputCodigo">Informativo Nº:</label>
                                                  <input type="text" class="form-control form-control-sm" id="inputCodigo" maxlength="240" placeholder="Informativo Nº" name="codigo" value="{{$informativo->codigo}}" />
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  <label for="inputTitulo">Título:</label>
                                                  <input type="text" class="form-control form-control-sm" id="inputTitulo" maxlength="240" placeholder="Título" name="titulo" value="{{$informativo->titulo}}" />
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  <label for="descricao">Descrição</label>
                                                  <textarea id="descricao" name="descricao">{!!$informativo->descricao!!}</textarea>
                                                  <script type="text/javascript">
                                                      CKEDITOR.replace( 'descricao' );
                                                  </script>
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  <label for="inputFile">File:</label>

                                                  <div class="card border-secondary">
                                                      <div class="card-body">
                                                          <?php
                                                              $fileId = '';
                                                              $img = 'images/adm/PDF.png';
                                                              $mostraBtExcluir = false;
                                                              if($file)
                                                              {
                                                                  $mostraBtExcluir = true;
                                                                  $fileId = $file->id;
                                                              }
                                                          ?>
                                                          <img src="/{{$img}}" rel="/{{$img}}" relPah="/{{$file->arquivo_namefilefull}}" class="rounded mx-auto d-block imagesList" height="80" alt="" />
                                                          <?php /*
                                                          <div class="col-md-12 text-center mb-3">
                                                              @if($mostraBtExcluir)
                                                                  <button type="button" id="bt-excluir-banner-principal" relId="{{$fileId}}" relCampo="Image" relAcao="delete-image" class="btn btn-outline-danger btn-sm btns-delete-imgs-principais">Excluir Arquivo</button>
                                                              @endif
                                                          </div>
                                                          */ ?>

                                                          <label for="inputImage">Selecione um Arquivo:</label>
                                                          <div class="custom-file mb-2">
                                                              <input type="file" id="inputImage" class="custom-file-input" name="file[]" />
                                                              <label class="custom-file-label" for="customFile">Arquivo</label>
                                                          </div>
                                                          <label for="inputNomeDoArquivo">Nome do Arquivo:</label>
                                                          <input type="text" id="inputNomeDoArquivo" class="form-control form-control-sm" maxlength="120" placeholder="Nome do Arquivo" name="nome_arquivo" value="{{$file->arquivo_name}}" />
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                    </div>
                                </div>

                          </div>

                          <div class="card-footer text-muted">
                                <button type="submit" id="bt-cadastrar-editar" class="btn btn-outline-success btn-block">Atualizar Informativo</button>
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
              <h5 class="modal-title" id="exampleModalLabel">Arquivo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <div class="modal-body">
              <div style="margin-bottom: 10px;">
                  <a href="" target="_blank" id="linkArquivo">
                      <img src="" alt="" id="imageThumb" class="img-fluid img-thumbnail img-modal mx-auto d-block" />
                  </a>
              </div>
              <div style="clear:both;"></div>
          </div>
      </div>
  </div>
</div>

<!-- Form Delete -->
<form id="form-delete" action="" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="action" value="" />
      <input type="hidden" name="id" value="" />
      <input type="hidden" name="campo" value="" />
</form>

<form id="form-images" action="" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="action" value="order">
      <input type="hidden" name="id" value="" />
      <input type="hidden" name="idArquivo" value="" />
      <input type="hidden" name="name" value="" />
</form>
@endsection
