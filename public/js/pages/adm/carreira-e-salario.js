$(document).ready(function()
{

    $('.delete').click(function()
    {
        if (confirm('Tem certeza que deseja deletar este registro?'))
        {
            var id = $(this).attr('rel');
            $('#form-delete input[name="id"]').val(id);
            $('#form-delete').submit();
        }
    });

    $('.imagesList').click(function() {
        var img = $(this).attr('rel');
        var path = $(this).attr('relPah');
        $("#imageThumb").attr("src", img);
        $("#linkArquivo").attr("href", path);
        $('#modalImage').modal();
    });

    $('.order').click(function() {
        var id = $(this).attr('rel');
        $('#form-order input[name*="id"]').val(id);
        $('#form-order').submit();
    });

    // ================================================================================
    // Exclusivos para home banner1-update
    // ================================================================================

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
