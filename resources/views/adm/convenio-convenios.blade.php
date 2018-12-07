<?php
    $convenios = $return['convenios'];
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
        .imagesList:hover {
            box-shadow: inset 0px 0px 0px 4px #999;
            opacity: 0.8;
            transition: 0.3s ease-out;
            cursor: pointer;
        }
        .imagesList {
            width: 45px;
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
    <script src="/js/pages/adm/convenio-convenios.js"></script>
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
                    Cadastrar Novo Convênio
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
                                        <div class="col-lg-6">
                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputNome">Nome:*</label>
                                                      <input type="text" class="form-control form-control-sm" id="inputNome" maxlength="240" placeholder="Nome" name="name" required>
                                                  </div>
                                              </div>

                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="selectCategoria">Categoria:</label>
                                                      <select id="selectCategoria" name="categoria" class="selectpicker is-valid" data-actions-box="true" data-width="100%" title="Selecione uma Categoria" required >
                                                          <option value="">Selecione uma categoria</option>
                                                          @foreach( $categorias as $categoria )
                                                              <?php
                                                                  $img = '/images/default.png';
                                                                  if ( $categoria->image_namefilefull != '' ) { $img = '/' . $categoria->image_namefilefull; }
                                                              ?>
                                                              <option value="{{$categoria->id}}" data-content="<img src='{{$img}}' height='25' alt='{{$categoria->name}}'> {{str_limit($categoria->name, 30, '...')}}">{{str_limit($categoria->name, 30, '...')}}</option>
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>

                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputDescription">Vantagem:</label>
                                                      <textarea id="inputDescription" name="description"></textarea>
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
                                                      <input type="text" class="form-control form-control-sm" id="inputEndereco" maxlength="240" placeholder="Endereço" name="endereco" />
                                                  </div>
                                              </div>

                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputFone">Telefone:</label>
                                                      <input type="text" class="form-control form-control-sm" id="inputFone" maxlength="30" placeholder="Telefone" name="fone" />
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputEmail">E-Mail:</label>
                                                      <input type="text" class="form-control form-control-sm" id="inputEmail" maxlength="240" placeholder="E-Mail" name="email" />
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-12">
                                                      <label for="inputSite">Site:</label>
                                                      <input type="text" class="form-control form-control-sm" id="inputSite" maxlength="240" placeholder="Site" name="site" />
                                                  </div>
                                              </div>
                                        </div>
                                    </div>
                              </div>

                              <div class="card-footer text-muted">
                                    <button type="submit" id="bt-cadastrar-editar" class="btn btn-outline-success btn-block">Cadastrar Convênio</button>
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
                <div class="card-header">Listagem dos Convênios</div>
                <div class="card-body">

                      <!-- ==================================================================  -->
                      <!-- ======================== Itens listados =========================== -->
                      <!-- ==================================================================  -->
                      @forelse ($convenios as $register)
                          <?php
                              $img = 'images/default.png';
                              $img = $register->categoria_namefilefull ? $register->categoria_namefilefull : $img;
                              $imgGrande = $img;

                              $checkBoxActive = '';
                              $checkBoxCheck = '';
                              $checkBoxHomeActive = '';
                              $checkBoxHomeCheck = '';
                          ?>
                          <form action="{{url("/adm/convenio/convenios-edit/{$register->id}")}}" method="get">
                              <div class="card border-secondary">
                                <div class="card-body text-secondary">

                                  <div class="row">
                                  </div>

                                  <div class="imagesList" rel="/{{$imgGrande}}" style="background-image: url(/{{$img}});"></div>
                                      <div style="float:right;" class="btns-listagem">
                                          <div class="input-group-append">
                                            <button class="btn btn-outline-secondary edit" type="submit" title="Edita"><i class="material-icons i-corrige">mode_edit</i></button>
                                            <button class="btn btn-outline-secondary delete" type="button" rel="{{$register->id}}"><i class="material-icons i-corrige">delete_forever</i></button>
                                          </div>
                                      </div>
                                      <div style="float:left; margin-right:8px; padding-top:10px;">{{$register->name}}</div>
                                </div>
                              </div>
                          </form>
                      @empty
                          <p>Nenhum convênio cadastrado no momento.</p>
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
      <input type="hidden" name="action" value="delete">
      <input type="hidden" name="id" value="">
</form>
@endsection
