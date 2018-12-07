@extends('layouts.site')

@section('css')
    <link href="/css/pages/internas.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/pages/contato.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('js')
@endsection

@section('content')

<!-- ======================================================================= -->
<!-- Galeria de fotos                                                        -->
<!-- ======================================================================= -->
<div class="container-fluid">
    <div class="container">
        <div class="title-pages">Contato</div>
        <div class=" box-conteudo">
            <div class="row">
                <div class="col m12 l5">
                    <!-- <div class="logo-contato"><img src="/images/logo-contato.png" class="responsive-img"></div> -->
                    <p>O Portal ADverso pretende ser referência na produção de conteúdo informativo e analítico em diferentes linguagens na área da educação, pesquisa e assuntos sindicais.</p>
                    <p>Queremos que este espaço seja um difusor de ideias sobre questões importantes para a educação brasileira. </p>
                    <p>Por isso, para nós é fundamental manter relacionamento constante com nossos usuários. A sua opinião e contribuição são muito importantes para nós.</p>
                </div>
                <div class="col m12 l7">
                    <form action="">
                    <div class="box-contato">
                        <p>Você pode enviar sua mensagem para a equipe do Portal ADverso nos campos abaixo. Sugestões são sempre necessárias para melhorarmos nossa produção. Deixe seus contatos.</p>

                        <div class="form-contato">
                            <div class="labels-input">NOME</div>
                            <div class="inputs-contato">
                                <input type="text" name="nome" value="" class="browser-default" placeholder="NOME" required />
                            </div>
                            <div class="labels-input">TELEFONE</div>
                            <div class="inputs-contato">
                                <input type="tel" name="fone" value="" class="browser-default" placeholder="TELEFONE" required />
                            </div>
                            <div class="labels-input">E-MAIL</div>
                            <div class="inputs-contato">
                                <input type="email" name="email" value="" class="browser-default" placeholder="E-MAIL" required />
                            </div>
                            <div class="labels-input">ASSUNTO</div>
                            <div class="inputs-contato">
                                <input type="text" name="assunto" value="" class="browser-default" placeholder="ASSUNTO" required />
                            </div>
                            <div class="labels-input">MENSAGEM</div>
                            <textarea id="mensagem" name="mensagem" class="browser-default text-area" rows="7" placeholder="MENSAGEM" required></textarea>

                            <input type="submit" id="cadastrar" class="btn" value="ENVIAR" />
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
