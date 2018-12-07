<?php
    $register = $return['instituicao'];
    $arquivo = $return['arquivo'];
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
    </style>
@endsection
@section('jsHead')
    <script type="text/javascript" src="/plugins-frameworks/ckeditor/ckeditor.js"></script>
@endsection
@section('js')
    <script src="/js/pages/adm/instituicao.js"></script>
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
                <div class="card border-dark">
                    <form action="" method="post" enctype="multipart/form-data" class="was-validated">
                        {{ csrf_field() }}
                        <input type="hidden" name="action" value="register" />
                        <input type="hidden" name="id" value="{{$register->id}}" />
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputTitulo">Título:</label>
                                    <input type="text" class="form-control form-control-sm" id="inputTitulo" maxlength="240" placeholder="Título" name="titulo" value="{{$register->titulo}}" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputSubtitulo">Subtítulo:</label>
                                    <textarea id="inputSubtitulo" name="subtitulo">{!!$register->subtitulo!!}</textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace( 'inputSubtitulo' );
                                    </script>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputImage">Arquivo (PDF):</label>

                                    <div class="card border-secondary">
                                        <div class="card-body">
                                            <?php
                                                $image= '';
                                                $imageId = '';
                                                $img = 'images/default.png';
                                                $path = '';
                                                $mostraBtExcluir = false;
                                                if($arquivo['path'] != '')
                                                {
                                                    $path = '/'.$arquivo['path'];
                                                    $mostraBtExcluir = true;
                                                    // $imageId = $image->id;
                                                    $imageId = $register->arquivo;
                                                    // $img = $image->image_namefilefullthumb ? $image->image_namefilefullthumb : $img;
                                                    $img = 'images/adm/PDF.png';
                                                }
                                            ?>
                                            <a href="{{$path}}" {{$path != '' ? 'target="_blank"' : ''}}><img src="/{{$img}}" class="rounded mx-auto d-block imagesList" height="80" alt="" /></a>
                                            <div class="col-md-12 text-center mb-3">
                                                @if($mostraBtExcluir)
                                                    <button type="button" id="btns-delete-arquivo" relId="{{$register->id}}" relCampo="arquivo" relAcao="delete-file" class="btn btn-outline-danger btn-sm btns-delete-arquivo">Excluir Arquivo</button>
                                                @endif
                                            </div>

                                            <label for="inputFile">Selecione Um Arquivo:</label>
                                            <div class="custom-file {{--mb-2--}}">
                                                <input type="file" id="inputFile" class="custom-file-input" name="file[]" />
                                                <label class="custom-file-label" for="customFile">Arquivo</label>
                                            </div>
                                            <label for="inputNomeDoArquivo">Nome do Arquivo:</label>
                                            <input type="text" id="inputNomeDoArquivo" class="form-control form-control-sm" maxlength="120" placeholder="Nome do Arquivo" name="nome_arquivo" value="{{$arquivo['nome']}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputText">Gestões:</label>
                                    <textarea id="inputText" name="text">{!!$register->text!!}</textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace( 'inputText' );
                                    </script>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-muted">
                            <button type="submit" id="bt-cadastrar-editar" class="btn btn-outline-success btn-block">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Form Delete -->
    <form id="form-delete" action="" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="action" value="delete-file">
          <input type="hidden" name="id" value="">
          <input type="hidden" name="campo" value="">
    </form>
@endsection
