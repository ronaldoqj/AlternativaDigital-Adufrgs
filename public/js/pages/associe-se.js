var idDependentes = 0;
$(document).ready(function()
{
    $('.vinculos').hide('slow');

    $(".box-vinculos input[type='radio']").change(function(){
        $('.vinculos').hide();

        switch( $(".box-vinculos input[type='radio']:checked").val() ) {
            case 'ativo':
                break;
            case 'aposentado':
                $('.vinculo-aposentado').show();
                break;
            case 'substituto':
                $('.vinculo-substituto').show();
                break;
            case 'pensionista':
                $('.vinculo-pensionista').show();
                break;
        }
    });

    $('.bt-excluir-dependentes').click(function(){
        $(this).parent().parent().hide();
    });

    $('#bt-novo').click(function() {
        idDependentes++;
        var dependente = '';
        $('#idDependentes').val(idDependentes);

        dependente += '<div class="box-dependente">';
        dependente += '   <div class="col s12"><input type="button" id="bt-excluir" class="bt-excluir-dependentes" value="Excluir" /></div>';
        dependente += '   <div class="col s4">';
        dependente += '       <input name="dependente-nome-'+idDependentes+'" class="browser-default inputs-associe-se" type="text" placeholder="Nome" value="" maxlength="240" required />';
        dependente += '   </div>';
        dependente += '   <div class="col s4">';
        dependente += '       <input name="dependente-vinculo-'+idDependentes+'" class="browser-default inputs-associe-se" type="text" placeholder="Vinculo" value="" maxlength="240" required />';
        dependente += '   </div>';
        dependente += '   <div class="col s4">';
        dependente += '       <select name="dependente-tipo-pensao-'+idDependentes+'" class="browser-default selects" required>';
        dependente += '           <option value="temporaria">Temporária</option>';
        dependente += '           <option value="vitalicia">Vitalícia</option>';
        dependente += '       </select>';
        dependente += '   </div>';
        dependente += '   <div class="clearfix"></div>';
        dependente += '</div>';

        $( "#dependentes" ).append( dependente );

        $('.bt-excluir-dependentes').click(function(){
            // $(this).parent().parent().hide();
            $(this).parent().parent().remove();
        });
    });

    comboboxes();
});

function comboboxes()
{
    var objUnidade = {
        'UFCSPA'         : [ 'UFCSPA'],
        'IFRS'           : [
                             'IFRS - CAMPUS PORTO ALEGRE',
                             'IFRS - CAMPUS RESTINGA',
                             'IFRS - CAMPUS OSORIO',
                             'IFRS - CAMPUS CANOAS',
                             'IFRS - CAMPUS CAXIAS DO SUL',
                             'IFRS - CAMPUS BENTO GONÇALVES',
                             'IFRS -- CAMPUS ERECHIM',
                             'IFRS - CAMPUS FARROUPILHA',
                             'IFRS - CAMPUS FELIZ',
                             'IFRS -- CAMPUS IBIRUBÁ',
                             'IFRS -- CAMPUS RIO GRANDE',
                             'IFRS -- CAMPUS SERTÃO',
                             'IFRS - CAMPUS ALVORADA',
                             'IFRS -- CAMPUS ROLANTE',
                             'IFRS -- CAMPUS VACARIA',
                             'IFRS -- CAMPUS VERANÓPOLIS',
                             'IFRS - CAMPUS VIAMÃO'
                           ],
        'UFRGS'          : [
                             'FACULDADE DE AGRONOMIA',
                             'FACULDADE DE ARQUITETURA',
                             'INSTITUTO DE ARTES',
                             'FACULDADE DE BIBLIOTECONOMIA E COMUNICAÇÃO',
                             'INSTITUTO DE BIOCIÊNCIAS',
                             'INSTITUTO DE CIÊNCIAS BÁSICAS DA SAÚDE',
                             'FACULDADE DE DIREITO',
                             'ESCOLA DE ADMINISTRAÇÃO',
                             'FACULDADE DE CIÊNCIAS ECONOMICAS',
                             'FACULDADE DE EDUCAÇÃO',
                             'ESCOLA DE EDUCAÇÃO FÍSICA, FISIOTERAPIA E DANÇA - ESEFID',
                             'ESCOLA DE ENFERMAGEM',
                             'ESCOLA DE ENGENHARIA',
                             'FACULDADE DE FARMÁCIA',
                             'INSTITUTO DE FÍSICA',
                             'INSTITUTO DE GEOCIÊNCIAS',
                             'INSTITUTO DE FILOSOFIA E CIÊNCIAS HUMANAS',
                             'INSTITUTO DE INFORMÁTICA',
                             'INSTITUTO DE PESQUISAS HIDRÁULICAS',
                             'INSTITUTO DE CIÊNCIA E TECNOLOGIA DOS ALIMENTOS',
                             'INSTITUTO DE LETRAS',
                             'INSTITUTO DE MATEMÁTICA E ESTATÍSTICA',
                             'FACULDADE DE MEDICINA',
                             'FACULDADE DE ODONTOLOGIA',
                             'INSTITUTO DE PSICOLOGIA',
                             'INSTITUTO DE QUÍMICA',
                             'FACULDADE DE VETERINÁRIA',
                             'COLEGIO DE APLICACAO',
                             'EXTRA - PROJETO PRELUDIO',
                             'ESCOLA TECNICA DA UFRGS',
                             'UFRGS',
                             'ESCOLA TECNICA DE COMERCIO',
                             'CAMPUS LITORAL NORTE'
                           ],
        'IFSUL'          : [
                             'CAMPUS SAPUCAIA DO SUL',
                             'CAMPUS CHARQUEADAS',
                             'CAMPUS BAGÉ',
                             'CAMPUS CAMAQUÃ',
                             'CAMPUS GRAVATAÍ',
                             'CAMPUS JAGUARÃO',
                             'CAMPUS LAJEADO',
                             'CAMPUS NOVO HAMBURGO',
                             'CAMPUS PASSO FUNDO',
                             'CAMPUS PELOTAS',
                             'CAMPUS PELOTAS - VISCONDE DA GRAÇA',
                             'CAMPUS SANTANA DO LIVRAMENTO',
                             'CAMPUS SAPIRANGA',
                             'CAMPUS VENÂNCIO AIRES'
                           ],
        'UNIPAMPA'       : [
                             'CAMPUS ALEGRETE',
                             'CAMPUS BAGÉ',
                             'CAMPUS CAÇAPAVA DO SUL',
                             'CAMPUS DOM PEDRITO',
                             'CAMPUS ITAQUI',
                             'CAMPUS JAGUARÃO',
                             'CAMPUS SANTANA DO LIVRAMENTO',
                             'CAMPUS SÃO BORJA',
                             'CAMPUS SÃO GABRIEL',
                             'CAMPUS URUGUAIANA'
                           ],
        'IF FARROUPILHA' : [
                             'CAMPUS ALEGRETE',
                             'CAMPUS FREDERICO WESTPHALEN',
                             'CAMPUS JAGUARI',
                             'CAMPUS JÚLIO DE CASTILHOS',
                             'CAMPUS PANAMBI',
                             'CAMPUS SANTA ROSA',
                             'CAMPUS SÃO BORJA',
                             'CAMPUS SANTO ÂNGELO',
                             'CAMPUS SANTO AUGUSTO',
                             'CAMPUS SÃO VICENTE DO SUL',
                             'CAMPUS AVANÇADO URUGUAIANA'
                           ],
        'UFSM'           : [ 'CENTRO DE ARTES E LETRAS' ]
    };

    var objDepartamento = {
        'UFCSPA'                                                   : [ 'CIENCIAS FISIOLOGICAS',
                                                                       'MICROBIOLOGIA E PARASITOLOGIA',
                                                                       'CIÊNCIAS BÁSICAS DA SAÚDE',
                                                                       'ENFERMAGEM',
                                                                       'PSICOLOGIA',
                                                                       'PATOLOGIA E MEDICINA LEGAL',
                                                                       'SAÚDE COLETIVA',
                                                                       'CLÍNICA MÉDICA',
                                                                       'EDUCAÇÃO E HUMANIDADES',
                                                                       'FISIOTERAPIA',
                                                                       'FONOAUDIOLOGIA',
                                                                       'CLÍNICA CIRÚRGICA',
                                                                       'NUTRIÇÃO',
                                                                       'MÉTODOS DIAGNÓSTICOS',
                                                                       'GINECOLOGIA E OBSTETRÍCIA',
                                                                       'PEDIATRIA',
                                                                       'ANALISES',
                                                                       'CIRURGIA',
                                                                       'SEM REGISTRO',
                                                                       'FARMACOCIÊNCIAS',
                                                                       'CIÊNCIAS EXATAS E SOCIAIS APLICADAS' ],

        'IFRS - CAMPUS PORTO ALEGRE'                               : [ 'Nenhum' ],
        'IFRS - CAMPUS RESTINGA'                                   : [ 'Nenhum' ],
        'IFRS - CAMPUS OSORIO'                                     : [ 'Nenhum' ],
        'IFRS - CAMPUS CANOAS'                                     : [ 'Nenhum' ],
        'IFRS - CAMPUS CAXIAS DO SUL'                              : [ 'Nenhum' ],
        'IFRS - CAMPUS BENTO GONÇALVES'                            : [ 'Nenhum' ],
        'IFRS -- CAMPUS ERECHIM'                                   : [ 'Nenhum' ],
        'IFRS - CAMPUS FARROUPILHA'                                : [ 'Nenhum' ],
        'IFRS - CAMPUS FELIZ'                                      : [ 'Nenhum' ],
        'IFRS -- CAMPUS IBIRUBÁ'                                   : [ 'Nenhum' ],
        'IFRS -- CAMPUS RIO GRANDE'                                : [ 'Nenhum' ],
        'IFRS -- CAMPUS SERTÃO'                                    : [ 'Nenhum' ],
        'IFRS - CAMPUS ALVORADA'                                   : [ 'Nenhum' ],
        'IFRS -- CAMPUS ROLANTE'                                   : [ 'Nenhum' ],
        'IFRS -- CAMPUS VACARIA'                                   : [ 'Nenhum' ],
        'IFRS -- CAMPUS VERANÓPOLIS'                               : [ 'Nenhum' ],
        'IFRS - CAMPUS VIAMÃO'                                     : [ 'Nenhum' ],

        'FACULDADE DE AGRONOMIA'                                   : [ 'ZOOTECNIA',
                                                                       'SOLOS',
                                                                       'FITOSSANIDADE',
                                                                       'FORRAGEIRAS E AGROMETEOROLOGIA',
                                                                       'PLANTAS DE LAVOURA',
                                                                       'HORTICULTURA E SILVICULTURA',
                                                                       'FITOTECNIA' ],
        'FACULDADE DE ARQUITETURA'                                 : [ 'ARQUITETURA',
                                                                       'URBANISMO',
                                                                       'DESIGN E EXPRESSAO GRAFICA' ],
        'INSTITUTO DE ARTES'                                       : [ 'ARTE DRAMATICA',
                                                                       'ARTES VISUAIS',
                                                                       'MUSICA' ],
        'FACULDADE DE BIBLIOTECONOMIA E COMUNICAÇÃO'               : [ 'CIÊNCIA DA INFORMAÇÃO',
                                                                       'COMUNICACAO' ],
        'INSTITUTO DE BIOCIÊNCIAS'                                 : [ 'BOTANICA',
                                                                       'ECOLOGIA',
                                                                       'GENETICA',
                                                                       'ZOOLOGIA',
                                                                       'BIOFISICA',
                                                                       'BIOLOGIA MOLECULAR E BIOTECNOLOGIA' ],
        'INSTITUTO DE CIÊNCIAS BÁSICAS DA SAÚDE'                   : [ 'FISIOLOGIA',
                                                                       'BIOQUIMICA',
                                                                       'CIENCIAS MORFOLOGICAS',
                                                                       'MICROBIOLOGIA',
                                                                       'FARMACOLOGIA',
                                                                       'MICROBIOLOGIA E PARASITOLOGIA' ],
        'FACULDADE DE DIREITO'                                     : [ 'CIENCIAS PENAIS',
                                                                       'DIR PRIVADO E PROC CIVIL',
                                                                       'DIR PUBL E FILOS DIREITO',
                                                                       'DIR ECONOMICO E DO TRAB' ],
        'ESCOLA DE ADMINISTRAÇÃO'                                  : [ 'CIÊNCIAS ADMINISTRATIVAS',
                                                                       'ASTRONOMIA' ],
        'FACULDADE DE CIÊNCIAS ECONOMICAS'                         : [ 'DEPARTAMENTO DE ECONOMIA E RELAÇÕES INTERNACIONAIS',
                                                                       'CIÊNCIAS CONTABEIS E ATUARIAIS' ],
        'FACULDADE DE EDUCAÇÃO'                                    : [ 'ESTUDOS BÁSICOS',
                                                                       'ENSINO E CURRÍCULO',
                                                                       'ESTUDOS ESPECIALIZADOS',
                                                                       'ANALISES' ],
        'ESCOLA DE EDUCAÇÃO FÍSICA, FISIOTERAPIA E DANÇA - ESEFID' : [ 'EDUCAÇÃO FÍSICA' ],
        'ESCOLA DE ENFERMAGEM'                                     : [ 'ENFERMAGEM MAT-INFANTIL',
                                                                       'ENFERMAGEM MED-CIRURGICA',
                                                                       'ASSISTÊNCIA E ORIENTAÇÃO PROFISSIONAL' ],
        'ESCOLA DE ENGENHARIA'                                     : [ 'ENGENHARIA CIVIL',
                                                                       'ENGENHARIA DE MATERIAIS',
                                                                       'ENGENHARIA MECÂNICA',
                                                                       'ENGENHARIA DE MINAS',
                                                                       'ENGENHARIA METALURGICA',
                                                                       'ENGENHARIA QUÍMICA',
                                                                       'ENGENHARIA NUCLEAR',
                                                                       'ENGENHARIA DE PRODUÇÃO E TRANSPORTES',
                                                                       'ENGENHARIA ELÉTRICA' ],
        'FACULDADE DE FARMÁCIA'                                    : [ 'PRODUÇÃO DE MATÉRIA PRIMA',
                                                                       'PRODUÇÃO E CONTROLE DE MEDICAMENTOS',
                                                                       'ANALISES' ],
        'INSTITUTO DE FÍSICA'                                      : [ 'FÍSICA',
                                                                       'ASTRONOMIA' ],
        'INSTITUTO DE GEOCIÊNCIAS'                                 : [ 'GEOLOGIA',
                                                                       'MINERALOGIA E PETROLOGIA',
                                                                       'PALEONTO E ESTRATIGRAFIA',
                                                                       'GEODESIA',
                                                                       'GEOGRAFIA' ],
        'INSTITUTO DE FILOSOFIA E CIÊNCIAS HUMANAS'                : [ 'FILOSOFIA',
                                                                       'HISTORIA',
                                                                       'SOCIOLOGIA',
                                                                       'ANTROPOLOGIA',
                                                                       'POLITICA',
                                                                       'DIR PRIVADO E PROC CIVIL' ],
        'INSTITUTO DE INFORMÁTICA'                                 : [ 'INFORMÁTICA APLICADA',
                                                                       'INFORMÁTICA TEÓRICA' ],
        'INSTITUTO DE PESQUISAS HIDRÁULICAS'                       : [ 'HIDROMECÂNICA E HIDROLOGIA',
                                                                       'OBRAS HIDRÁULICAS' ],
        'INSTITUTO DE CIÊNCIA E TECNOLOGIA DOS ALIMENTOS'          : [ 'CIÊNCIA DOS ALIMENTOS',
                                                                       'TECNOLOGIA DOS ALIMENTOS' ],
        'INSTITUTO DE LETRAS'                                      : [ 'LETRAS CLÁSSICAS E VERNÁCULOS',
                                                                       'LÍNGUAS MODERNAS',
                                                                       'LINGUISTICA E FILOLOGIA' ],
        'INSTITUTO DE MATEMÁTICA E ESTATÍSTICA'                    : [ 'MATEMATICA PURA E APLICADA',
                                                                       'ESTATISTICA' ],
        'FACULDADE DE MEDICINA'                                    : [ 'MEDICINA INTERNA',
                                                                       'PEDIATRIA E PUERICULTURA',
                                                                       'CIRURGIA',
                                                                       'PATOLOGIA',
                                                                       'MEDICINA SOCIAL',
                                                                       'OFTALMO E OTORRINOLARINGO',
                                                                       'GINECOLOGIA E OBSTETRÍCIA',
                                                                       'PSIQUIATRIA E MED LEGAL',
                                                                       'RADIOLOGIA',
                                                                       'SAUDE COLETIVA',
                                                                       'PSIQUIATRIA E MEDICINA LEGAL',
                                                                       'NEUROLOGIA',
                                                                       'OFTALMOLOGIA E OTORRINOLARINGOLOGIA',
                                                                       'PEDIATRIA E PUERICULTURA',
                                                                       'ANALISES',
                                                                       'EDUCAÇÃO FÍSICA' ],
        'FACULDADE DE ODONTOLOGIA'                                 : [ 'CIR. E ORTOPEDIA',
                                                                       'ODONTOLOGIA CONSERVADORA',
                                                                       'ODONTO PREVENT E SOCIAL' ],
        'INSTITUTO DE PSICOLOGIA'                                  : [ 'PSICOLOGIA DO DESENVOLVIMENTO E DA PERSONALIDADE',
                                                                       'PSICOLOGIA SOCIAL E INSTITUCIONAL',
                                                                       'PSICANÁLISE PSICOPATOLOGIA E CLÍNICAS PSICOLÓGICAS',
                                                                       'SAÚDE E COMUNICAÇÃO HUMANA',
                                                                       'SERVIÇO SOCIAL' ],
        'INSTITUTO DE QUÍMICA'                                     : [ 'QUÍMICA INORGÂNICA',
                                                                       'QUÍMICA ORGÂNICA',
                                                                       'FÍSICO QUÍMICA' ],
        'FACULDADE DE VETERINÁRIA'                                 : [ 'MEDICINA ANIMAL',
                                                                       'MED VET PREVENTIVA',
                                                                       'PATOL E CLÍNICA VETERINÁRIA' ],
        'COLEGIO DE APLICACAO'                                     : [ 'EXPRESSAO E MOVIMENTO',
                                                                       'COMUNICAÇÃO',
                                                                       'HUMANIDADES',
                                                                       'CIÊNCIAS EXATAS E DA NATUREZA' ],
        'EXTRA - PROJETO PRELUDIO'                                 : [ 'Nenhum' ],
        'ESCOLA TECNICA DA UFRGS'                                  : [ 'Nenhum' ],
        'UFRGS'                                                    : [ 'Nenhum' ],
        'ESCOLA TECNICA DE COMERCIO'                               : [ 'Nenhum' ],
        'CAMPUS LITORAL NORTE'                                     : [ 'Nenhum' ],

        'CAMPUS SAPUCAIA DO SUL'                                   : [ 'Nenhum' ],
        'CAMPUS CHARQUEADAS'                                       : [ 'Nenhum' ],
        'CAMPUS BAGÉ'                                              : [ 'Nenhum' ],
        'CAMPUS CAMAQUÃ'                                           : [ 'Nenhum' ],
        'CAMPUS GRAVATAÍ'                                          : [ 'Nenhum' ],
        'CAMPUS JAGUARÃO'                                          : [ 'Nenhum' ],
        'CAMPUS LAJEADO'                                           : [ 'Nenhum' ],
        'CAMPUS NOVO HAMBURGO'                                     : [ 'Nenhum' ],
        'CAMPUS PASSO FUNDO'                                       : [ 'Nenhum' ],
        'CAMPUS PELOTAS'                                           : [ 'Nenhum' ],
        'CAMPUS PELOTAS - VISCONDE DA GRAÇA'                       : [ 'Nenhum' ],
        'CAMPUS SANTANA DO LIVRAMENTO'                             : [ 'Nenhum' ],
        'CAMPUS SAPIRANGA'                                         : [ 'Nenhum' ],
        'CAMPUS VENÂNCIO AIRES'                                    : [ 'Nenhum' ],

        'CAMPUS ALEGRETE'                                          : [ 'Nenhum' ],
        // 'CAMPUS BAGÉ'                                           : [ 'Nenhum' ],
        'CAMPUS CAÇAPAVA DO SUL'                                   : [ 'Nenhum' ],
        'CAMPUS DOM PEDRITO'                                       : [ 'Nenhum' ],
        'CAMPUS ITAQUI'                                            : [ 'Nenhum' ],
        // 'CAMPUS JAGUARÃO'                                       : [ 'Nenhum' ],
        // 'CAMPUS SANTANA DO LIVRAMENTO'                          : [ 'Nenhum' ],
        'CAMPUS SÃO BORJA'                                         : [ 'Nenhum' ],
        'CAMPUS SÃO GABRIEL'                                       : [ 'Nenhum' ],
        'CAMPUS URUGUAIANA'                                        : [ 'Nenhum' ],

        // 'CAMPUS ALEGRETE'                                       : [ 'Nenhum' ],
        'CAMPUS FREDERICO WESTPHALEN'                              : [ 'Nenhum' ],
        'CAMPUS JAGUARI'                                           : [ 'Nenhum' ],
        'CAMPUS JÚLIO DE CASTILHOS'                                : [ 'Nenhum' ],
        'CAMPUS PANAMBI'                                           : [ 'Nenhum' ],
        'CAMPUS SANTA ROSA'                                        : [ 'Nenhum' ],
        // 'CAMPUS SÃO BORJA'                                      : [ 'Nenhum' ],
        'CAMPUS SANTO ÂNGELO'                                      : [ 'Nenhum' ],
        'CAMPUS SANTO AUGUSTO'                                     : [ 'Nenhum' ],
        'CAMPUS SÃO VICENTE DO SUL'                                : [ 'Nenhum' ],
        'CAMPUS AVANÇADO URUGUAIANA'                               : [ 'Nenhum' ],

        'CENTRO DE ARTES E LETRAS'                                 : [ 'ARTES CÊNICAS' ]
    };

    $('#instituicao').change(function()
    {
        var instituicao = $(this).val();
        var arrayUnidade = objUnidade[instituicao];

        $('#unidade').children('option:not(:first)').remove();
        $('#departamento').children('option:not(:first)').remove();

        $.each(arrayUnidade, function(item) {
             $('#unidade')
                 .append($("<option></option>")
                 .attr("value",arrayUnidade[item])
                 .text(arrayUnidade[item]));
        });
    });


    $('#unidade').change(function()
    {
        var unidade = $(this).val();
        var arrayDepartamento = objDepartamento[unidade];
        $('#departamento').children('option:not(:first)').remove();

        $.each(arrayDepartamento, function(item) {
             $('#departamento')
                 .append($("<option></option>")
                 .attr("value",arrayDepartamento[item])
                 .text(arrayDepartamento[item]));
        });
     });

}
