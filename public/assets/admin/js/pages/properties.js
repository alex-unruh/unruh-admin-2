
/**
 * Arquivo de configuração das páginas de edição e cadastro de Posts
 */

var assets = $("#assets").val();
var base_url = $("#url").val();

/**
* Inicialização do Tiny MCE
*/
tinymce.init({
    language: 'pt_BR',
    selector: '#editor',
    height: 550,
    menubar: true,
    relative_urls: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen imagetools lorumipsum',
        'insertdatetime media table contextmenu paste code help wordcount responsivefilemanager'
    ],
    formats: {
        alignleft: {
            selector: 'img',
            styles: {
                float: 'left',
                margin: '0 10px 0 0'
            }
        },
        alignright: {
            selector: 'img',
            styles: {
                float: 'right',
                margin: '0 0 0 10px'
            }
        }
    },
    toolbar: 'insert | undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | lorumipsum',
    external_filemanager_path: assets + "/admin/plugins/filemanager/",
    external_plugins: {
        "filemanager": assets + "/admin/plugins/filemanager/plugin.min.js"
    }
});

/**
 * Busca os dados de endereço com o CEP e preenche o formulário
 */
function getAdrress() {
    var cep = $("#cep").val().replace('-', '');
    $.ajax({
        url: 'https://viacep.com.br/ws/' + cep + '/json/',
        dataType: 'json',
        success: function (response) {
            $("#uf").val(response.uf);
            $("#city").val(response.localidade);
            $("#district").val(response.bairro);
            $("#address").val(response.logradouro);
            $("#number").focus();
        }
    });
}

/**
 * Função para buscar a imagem destacada do post
 *
 * @param string field_id
 */
function responsive_filemanager_callback(field_id) {
    var src = $("#" + field_id).val();
    if (field_id === 'gallery') {
        return $("#galleryName").val(src);
    }
    $("#prevImg").attr('src', assets + "/admin/uploads/medium/" + src);
}

/**
 * Remove a imagem destacada do post
 */
function remover_img() {
    var src = assets + "/admin/img/no-image.png";
    $("#image").val('');
    $("#prevImg").attr('src', src);
}

/**
 * Mostra os campos do formulário de acordo com o tipo
 */
function showFields() {
    var type = $("#type").val();
    var types = { "Galpão": "Galpoes", "Área Industrial": "Terrenos", "Terreno": "Terrenos", "Loja": "Lojas", "Ponto Comercial": "Lojas" };
    var comp = types[type];
    $('.comp').addClass('d-none');
    $('.comp').attr('disabled', true);
    $('#comp' + comp).removeAttr('disabled');
    $('#comp' + comp).removeClass('d-none');
}

// ################ MÁSCARAS #####################

$(".cep").mask('00000-000');
$('.money').mask('000.000.000.000.000,00', {reverse: true});

// ################ EVENTOS ######################

/**
 * Evento dispoarado quando o campo tipo de imóvel é alterado
 */
$("#type").change(function () {
    showFields();
})

/**
 * Evento disparado quando o usuário "sair" do campo cep
 */
$("#cep").focusout(function () {
    getAdrress();
})

/**
 * Dispara a função na inicialização
 */
showFields();