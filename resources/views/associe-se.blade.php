<?php
    $formSubmetido = $return['formSubmetido'];
?>

@extends('layouts.site')

@section('css')
    <link href="/css/pages/internas.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/pages/associe-se.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('js')
    <script src="/js/pages/associe-se.js"></script>
@endsection

@section('content')

@if($formSubmetido)
    <div id="aviso-envio">Sua mensagem foi enviada com sucesso!</div>
@endif

<div class="clearfix"></div>

<!-- ======================================================================= -->
<!-- Topo                                                                    -->
<!-- ======================================================================= -->

<div class="container noticia-padding normal box-conteudo">
    <div class="title-pages">Associe-se</div>
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
                    Faça parte do sindicato comprometido com o professor de educação pública superior no Rio Grande do Sul. Você pode se filiar à ADUFRGS-Sindical diretamente neste formulário..
                </p>
                <p>
                    Quando entrar na  ADUFRGS você tem direito a diversos serviços e convênios que facilitam a sua vida, como consultoria jurídica e contábil, plano de Saúde, descontos em farmácias, laboratórios, escolas de língua e infantis, livrarias, profissionais de saúde e tantos outros que você pode conferir no portal.
                </p>
                <p>
                    Façaparte da luta em defesa da educação pública, gratuita e de qualidade para todos.
                </p>


            </div>

            {{-- ========================================================== --}}
            {{-- ======================= Associe-se ======================= --}}
            {{-- ========================================================== --}}
            <form action="" method="post">
                {{ csrf_field() }}
                <input type="hidden" id="idDependentes" name="idDependentes" value="" />
                <div class="row">
                   <div class="col s12 section-form"><div>Dados Gerais</div></div>
                   <div class="col s12 m-b-5"><span>Nome Completo:*</span><input class="browser-default inputs-associe-se" type="text" placeholder="Nome Completo" name="nome" maxlength="240" required /></div>
                   <div class="col s12 m-b-5"><span>E-Mail:*</span><input class="browser-default inputs-associe-se" type="email" placeholder="E-Mail" name="email" maxlength="240" required /></div>
                   <div class="col s12 m-b-5"><span>Data de Nascimento:*</span><input class="browser-default inputs-associe-se" type="date" placeholder="Data de Nascimento" name="data_de_nascimento" maxlength="240" required /></div>

                   <div class="col s12 m2 l1 clearfix m-b-5"><span class="titulos-radio">Sexo:*</span></div>
                      <div class="col s12 m10 l11">
                        <label>
                          <input class="with-gapp" name="sexo" type="radio" value="M" required />
                          <span>Masculino</span>
                        </label>
                        <label>
                          <input class="with-gap" name="sexo" type="radio" value="F" required />
                          <span>Feminino</span>
                        </label>
                      </div>

                   <div class="col s12 m-b-5"><span>RG:*</span><input class="browser-default inputs-associe-se" type="number" placeholder="Rg" name="rg" maxlength="240" required /></div>
                   <div class="col s12 m-b-5"><span>CPF:*</span><input class="browser-default inputs-associe-se" type="text" placeholder="CPF" name="cpf" \ pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" \ title="Digite um CPF no formato: xxx.xxx.xxx-xx" maxlength="240" required /></div>
                   <div class="col s12 m-b-5"><span>Telefone:*</span><input class="browser-default inputs-associe-se" type="text" placeholder="Telefone" name="telefone" maxlength="240" required /></div>
                   <div class="col s12 m-b-5"><span>CEP:*</span><input class="browser-default inputs-associe-se" type="text" placeholder="CEP" name="cep" \ pattern="\d{5}-\d{3}" \ title="Digite um CEP no formato: xxxxx-xxx" maxlength="240" required /></div>

                   <div class="col s12 m6 m-b-5"><span>Endereço:*</span><input class="browser-default inputs-associe-se" type="text" placeholder="Endereço" name="endereco" maxlength="240" required /></div>
                      <div class="col s12 m3 m-b-5"><span>Número:*</span><input class="browser-default inputs-associe-se" type="text" placeholder="Número" name="numero" maxlength="240" required /></div>
                      <div class="col s12 m3 m-b-5"><span>Complemento:</span><input class="browser-default inputs-associe-se" type="text" placeholder="Complemento" name="complemento" maxlength="240"/></div>
                   <div class="col s12 m6 m-b-5"><span>Bairro:*</span><input class="browser-default inputs-associe-se" type="text" placeholder="Bairro" name="bairro" maxlength="240" required /></div>
                      <div class="col s12 m6 m-b-5"><span>Cidade:*</span><input class="browser-default inputs-associe-se" type="text" placeholder="Cidade" name="cidade" maxlength="240" required /></div>

                   <div class="col s12 m-b-5"><span>Estado:*</span>
                       <select name="uf" class="browser-default selects" required>
                         <option value="" disabled selected>Estados</option>
                         <option value="0">Nenhum</option>
                         <option value="AC">Acre</option>
                         <option value="AL">Alagoas</option>
                         <option value="AP">Amapá</option>
                         <option value="AM">Amazonas</option>
                         <option value="BA">Bahia</option>
                         <option value="CE">Ceará</option>
                         <option value="DF">Distrito Federal</option>
                         <option value="ES">Espírito Santo</option>
                         <option value="GO">Goiás</option>
                         <option value="MA">Maranhão</option>
                         <option value="MT">Mato Grosso</option>
                         <option value="MS">Mato Grosso do Sul</option>
                         <option value="MG">Minas Gerais</option>
                         <option value="PA">Pará</option>
                         <option value="PB">Paraíba</option>
                         <option value="PR">Paraná</option>
                         <option value="PE">Pernambuco</option>
                         <option value="PI">Piauí</option>
                         <option value="RJ">Rio de Janeiro</option>
                         <option value="RN">Rio Grande do Norte</option>
                         <option value="RS">Rio Grande do Sul</option>
                         <option value="RO">Rondônia</option>
                         <option value="RR">Roraima</option>
                         <option value="SC">Santa Catarina</option>
                         <option value="SP">São Paulo</option>
                         <option value="SE">Sergipe</option>
                         <option value="TO">Tocantins</option>
                       </select>
                   </div>

                   <div class="col s12 m-b-5"><span>Siape Número:*</span><input class="browser-default inputs-associe-se" type="text" placeholder="SIAPE Número" name="siape" maxlength="240" required /></div>
                   <div class="col s12 m-b-5"><span>Identificação Única:</span><input class="browser-default inputs-associe-se" type="text" placeholder="Identificação Única" name="identificacao_unica" maxlength="240"/></div>

                   <div class="col s12 m-b-5"><span>Instituição:*</span>
                       <select id="instituicao" class="browser-default selects" name="instituicao" required>
                         <option value="">Nenhum</option>
                         <option value="UFCSPA">UFCSPA</option>
                         <option value="IFRS">IFRS</option>
                         <option value="UFRGS">UFRGS</option>
                         <option value="IFSUL">IFSUL</option>
                         <option value="UNIPAMPA">UNIPAMPA</option>
                         <option value="IF FARROUPILHA">IF FARROUPILHA</option>
                         <option value="UFSM">UFSM</option>
                       </select>
                   </div>
                       <div class="col s12 m-b-5"><span>Unidade:*</span>
                           <select id="unidade" class="browser-default selects" name="unidade" required>
                              <option value="">Selecione</option>
                           </select>
                       </div>

                   <div class="col s12 m-b-5"><span>Departamento:*</span>
                       <select id="departamento" class="browser-default selects" name="departamento" required>
                           <option value="">Selecione</option>
                       </select>
                   </div>
                       <div class="col s12 m6 m-b-5"><span>Titulação:</span>
                           <select class="browser-default selects" name="titulacao">
                               <option value="" disabled selected>Titulação</option>
                               <option value="Doutor">Doutor</option>
                               <option value="Especialização">Especialização</option>
                               <option value="Gradruação">Graduação</option>
                               <option value="Mestre">Mestre</option>
                               <option value="Pós Doutorado">Pós Doutorado</option>
                           </select>
                       </div>
                   <div class="col s12 m6 m-b-5"><span>Regime de Trabalho:</span>
                       <select class="browser-default selects" name="regime_de_trabalho">
                           <option value="">Selecione</option>
                           <option value="20 horas">20 horas</option>
                           <option value="40 horas">40 horas</option>
                           <option value="DE">DE</option>
                       </select>
                   </div>

                   <div class="col s12 section-form"><div>Vinculos:*</div></div>
                      <div class="col s12 m12 box-vinculos">
                          <label>
                              <input id="ativo" class="with-gap" name="vinculo" type="radio" value="ativo" required/>
                              <span>Ativo</span>
                          </label>
                          <label>
                              <input id="aposentado" class="with-gap" name="vinculo" type="radio" value="aposentado" required/>
                              <span>Aposentado</span>
                          </label>
                          <label>
                              <input id="substituto" class="with-gap" name="vinculo" type="radio" value="substituto" required/>
                              <span>Substituto</span>
                          </label>
                          <label>
                              <input id="pensionista" class="with-gap" name="vinculo" type="radio" value="pensionista" required/>
                              <span>Pensionista</span>
                          </label>
                      </div>

                      <div class="vinculo-ativo">

                      </div>
                      <div class="vinculos vinculo-aposentado">
                          <div class="col s12"><input class="browser-default inputs-associe-se" type="text" placeholder="Data de Aposentadaria" name="data_de_aposentadoria" maxlength="120" /></div>
                      </div>
                      <div class="vinculos vinculo-substituto">
                          <div class="col s12"><input class="browser-default inputs-associe-se" type="date" placeholder="Data de Ingresso" name="data_de_ingresso" maxlength="120" /></div>
                          <div class="col s12"><input class="browser-default inputs-associe-se" type="date" placeholder="Data de Termino do Contrato" name="data_de_termino_do_contrato" maxlength="120" /></div>
                      </div>
                      <div class="vinculos vinculo-pensionista">
                          <div class="col s12"><input class="browser-default inputs-associe-se" type="text" placeholder="Pensionista" name="pensionista" maxlength="120" /></div>
                          <div class="col s12"><input class="browser-default inputs-associe-se" type="date" placeholder="Data de Óbito" name="data_de_obito" maxlength="120" /></div>
                      </div>
                </div>
                <div class="row">
                      <div class="col s12 section-form"><div>Dependentes<input type="button" id="bt-novo" value="Adicionar Novo" /></div></div>
                      <div id="dependentes">
                          <div class="row">
                              <div class="col s4 titulo-dependentes">Nome</div>
                              <div class="col s4 titulo-dependentes">Vínculo</div>
                              <div class="col s4 titulo-dependentes">Tipo Pensão</div>
                          </div>
                          <?php /*
                          <div class="box-dependente">
                              <div class="col s12"><input type="button" id="bt-excluir" class="bt-excluir-dependentes" value="Excluir" /></div>
                              <div class="col s4">
                                  <input class="browser-default inputs-associe-se" type="text" placeholder="Nome" name="" requiredd />
                              </div>
                              <div class="col s4">
                                  <input class="browser-default inputs-associe-se" type="text" placeholder="Nome Vinculo" name="" requiredd />
                              </div>
                              <div class="col s4">
                                <select class="browser-default selects">
                                    <option value="temporaria">Temporária</option>
                                    <option value="vitalicia">Vitalícia</option>
                                </select>
                              </div>
                              <div class="clearfix"></div>
                          </div>
                          */ ?>
                      </div>
                      <div class="col s12">
                          <input type="submit" id="bt-login" class="bt-cadastrar-associe-se" name="bt-login" value="Associe-se" />
                      </div>
                </div>
            </form>

        </div>
    </div>
    </div>
</div>

@endsection
