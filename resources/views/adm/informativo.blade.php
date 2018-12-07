<?php
    $informativo = $return['informativo'];
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
            box-shadow: inset 0px 0px 0px 2px #999;
            opacity: 0.8;
            transition: 0.3s ease-out;
            cursor: pointer;
        }
        .imagesList {
            width: 45px;
            height: 40px;
            float: left;
            margin-right: 8px;
            background-position: center !important;
            -webkit-background-size: contain !important;
            -moz-background-size: contain !important;
            -o-background-size: contain !important;
            background-size: contain !important;
            background-repeat: no-repeat;
            cursor: pointer;

            opacity: 1;
            /* box-shadow: inset 0px 0px 1px 1px #999; */
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
            <p>
                <button class="btn btn-outline-dark btn-block" type="button" data-toggle="collapse" data-target="#register" aria-expanded="false" aria-controls="register">
                    Cadastrar Novo Informativo
                </button>
            </p>
            <div id="register" class="collapse">
                    <div class="card border-dark">

                          <form action="" method="post" enctype="multipart/form-data" class="was-validated">
                              {{ csrf_field() }}
                              <input type="hidden" name="action" value="register" />
                              <div class="card-body">

                                    <div class="row mb-2">
                                        <div class="col-lg-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputCodigo">Informativo Nº:</label>
                                                    <input type="text" class="form-control form-control-sm" id="inputCodigo" maxlength="240" placeholder="Informativo Nº" name="codigo" value="" required />
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputTitulo">Título:</label>
                                                    <input type="text" class="form-control form-control-sm" id="inputTitulo" maxlength="240" placeholder="Título" name="titulo" value="" required />
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="descricao">Descrição:</label>
                                                    <textarea id="descricao" name="descricao"></textarea>
                                                    <script type="text/javascript">
                                                        CKEDITOR.replace( 'descricao' );
                                                    </script>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <label for="inputFile">Selecione um Arquivo:</label>
                                                <div class="custom-file mb-2">
                                                    <input type="file" id="inputFile" class="custom-file-input" name="file[]" required />
                                                    <label class="custom-file-label" for="customFile">Arquivo</label>
                                                </div>
                                                <label for="inputNomeDoArquivo">Nome do Arquivo:</label>
                                                <input type="text" id="inputNomeDoArquivo" class="form-control form-control-sm" maxlength="120" placeholder="Nome do Arquivo" name="nome_arquivo" value="" />
                                            </div>
                                        </div>
                                    </div>

                              </div>


                              <div class="card-footer text-muted">
                                <button type="submit" id="bt-cadastrar-editar" class="btn btn-outline-success btn-block">Cadastrar Informativo</button>
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
                <div class="card-header">Listagem dos Informativos</div>
                <div class="card-body">
                      <!-- ==================================================================  -->
                      <!-- ======================== Itens listados =========================== -->
                      <!-- ==================================================================  -->

                      @forelse ($informativo as $register)
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
                          <form action="{{url("/adm/informativo-edit/{$register->id}")}}" method="get">
                              <div class="card border-secondary">
                                <div class="card-body text-secondary">
                                  <div class="imagesList" rel="/{{$img}}" relPah="/{{$register->arquivo_namefilefull}}" style="background-image: url(/{{$img}});"></div>
                                      <div style="float:right;" class="btns-listagem">
                                          <div class="input-group-append">
                                            <!-- <div class="input-group-text">
                                                <input type="checkbox" class="checkbox-register" rel-id="{{$register->id}}" rel-table="quem_somos" aria-label="Checkbox for following text input" {{$checkBoxCheck}} /><span id="span-register_{{$register->id}}" class="check-register checkBoxSN {{$checkBoxActive}}">Ativo</span>
                                            </div> -->
                                            <button class="btn btn-outline-secondary order {{$ativo}}" type="button" title="Ordenar" rel="{{$register->id}}"><i class="material-icons">vertical_align_top</i></button>
                                            <button class="btn btn-outline-secondary edit" type="submit" title="Edita"><i class="material-icons i-corrige">mode_edit</i></button>
                                            <button class="btn btn-outline-secondary delete" type="button" rel="{{$register->id}}"><i class="material-icons i-corrige">delete_forever</i></button>
                                          </div>
                                      </div>
                                      <div class="texts-listagem"><p>{{$register->codigo}}</p></div>
                                </div>
                              </div>
                          </form>
                      @empty
                          <p>Nenhuma informativo cadastrado no momento.</p>
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
            <h5 class="modal-title" id="exampleModalLabel">Informativo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
              <div style="margin-bottom: 10px;">
                  <a href="" target="_blank" id="linkArquivo">
                      <img src="" alt="" id="imageThumb" class="img-fluid img-thumbnail img-modal mx-auto d-block">
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
      <input type="hidden" name="action" value="delete">
      <input type="hidden" name="id" value="">
</form>

<form id="form-order" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="">
    <input type="hidden" name="action" value="order">
</form>
@endsection
