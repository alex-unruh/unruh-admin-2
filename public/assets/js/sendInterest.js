
$(".cel").mask('(99) 99999-9999');

$("#form_interest").submit(function(e){
    e.preventDefault();
    
    var form = {
        nome: $("#nome").val().trim(),
        email: $("#email").val().trim(),
        telefone: $("#telefone").val().trim(),
        imovel: $("#imovel_id").val().trim(),
        mensagem: $("#mensagem").val().trim()
    };

    $.ajax({
        url: '/imoveis/interesse',
        dataType: 'json',
        method: 'post',
        data: form,
        success: function(){
            alert('Mensagem enviada com sucesso');
        },
        error: function(){
            alert('Erro ao enviar mensagem');
        }
    })
})