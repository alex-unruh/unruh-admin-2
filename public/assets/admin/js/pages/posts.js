
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
 * Remove o nome da galeria
 */
function remover_galeria() {
	$("#gallery").val('');
	$("#galleryName").val('');
}

/**
 * Evento para buscar o slug
 */
$('#title').change(function () {
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
		url: '/admin/posts/criar-slug',
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
