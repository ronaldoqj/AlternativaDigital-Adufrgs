//function atualizar() { location.reload(true) } window.setInterval("atualizar()",3000);

$(document).ready(function()
{
    $('#menos').click(function(){
        var rel = $(this).attr('rel');
        aumentaDiminui('diminui', rel);
    });

    $('#mais').click(function(){
        var rel = $(this).attr('rel');
        aumentaDiminui('aumenta', rel);
    });

});

function aumentaDiminui (aumentaDiminui, classe)
{
    var valor = 1;
    var obj = $('.' + classe).css('font-size');

    if(aumentaDiminui == 'aumenta') {
        $('.' + classe).css('font-size', parseFloat(obj) + valor );
    }
    if(aumentaDiminui == 'diminui') {
        $('.' + classe).css('font-size', parseFloat(obj) - valor );
    }
}
