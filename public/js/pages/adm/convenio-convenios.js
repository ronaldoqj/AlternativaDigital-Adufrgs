$(document).ready(function()
{
    $('#bt-cadastrar-editar').click(function()
    {
        // Desabilita o botao
        $(this).disabled = true;

        var select = $('#selectCategoria').val();
        $('input[name="categoria"]').val(select);
    });

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
        $("#imageThumb").attr("src", img);
        $('#modalImage').modal();
    });








});
