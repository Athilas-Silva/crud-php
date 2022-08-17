$(".btn-editar").click(function(){
    const id = $(this).attr('data-id');
    const nome = $(this).attr('data-nome');
    const idade = $(this).attr('data-idade');
    const telefone = $(this).attr('data-telefone');
    const email = $(this).attr('data-email');

    $('#form_save').addClass('hidden');
    $('#form_edit').removeClass('hidden');
    $('#form_delete').addClass('hidden');

    $("#id_editado").val(id);
    $("#nome_editado").val(nome);
    $("#idade_editado").val(idade);
    $("#telefone_editado").val(telefone);
    $("#email_editado").val(email);
});

$(".btn-deletar").click(function(){
    const id = $(this).attr('data-id');
    const nome = $(this).attr('data-nome');
    const idade = $(this).attr('data-idade');
    const telefone = $(this).attr('data-telefone');
    const email = $(this).attr('data-email');

    $("#id_deletar").val(id);
    $("#nome_deletar").val(nome);
    $("#idade_deletar").val(idade);
    $("#telefone_deletar").val(telefone);
    $("#email_deletar").val(email);
    $("#cliente").html(nome);

    $('#form_save').addClass('hidden');
    $('#form_edit').addClass('hidden');
    $('#form_delete').removeClass('hidden');

});

$('#cancelar').click(function(){
    $('#form_save').removeClass('hidden');
    $('#form_edit').addClass('hidden');
    $('#form_delete').addClass('hidden');
});

$('#cancelar_deletar').click(function(){
    $('#form_save').removeClass('hidden');
    $('#form_edit').addClass('hidden');
    $('#form_delete').addClass('hidden');
});