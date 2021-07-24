
/**
 * Arquivo de configuração das páginas de edição e cadastro de Posts
 */

/**
 * 
 * @param {*} field_id 
 */
function responsive_filemanager_callback(field_id) {
    var src = $("#" + field_id).val();
    $("#prevImg").attr('src', '/assets/admin/uploads/medium/' + src);
}

/**
 * 
 */
function remover_img() {
    var src = '/assets/admin/img/no-image.png';
    $("#image").val('');
    $("#prevImg").attr('src', src);
}

/**
 * Evento para buscar o slug
 */
$('#name').change(function () {
    var text = $(this).val();
    getSlug(text);
});

/**
 * Busca um slug para o título através de uma consulta ajax
 *
 * @param string title
 */
function getSlug(title) {
    var token = $('input[name="_token"]').val();
    $.ajax({
        url: '/admin/categorias/criar-slug',
        type: "post",
        dataType: 'json',
        data: { "_token": token, "title": title },
        success: function (response) {
            $('#slug').val(response.slug);
        },
        error() {
            alert('Erro ao obter Slug para o título do post');
        }
    });
}
