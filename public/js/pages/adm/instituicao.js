$(document).ready(function()
{

    $('.btns-delete-arquivo').click(function()
    {
        if (confirm('Tem certeza que deseja deletar este registro?'))
        {
            var id = $(this).attr('relId');
            var campo = $(this).attr('relCampo');
            var acao = $(this).attr('relAcao');
            $("#form-delete input[name*='id']").val(id);
            $("#form-delete input[name*='action']").val(acao);
            $("#form-delete input[name*='campo']").val(campo);
            $('#form-delete').submit();
        }
    });

});
