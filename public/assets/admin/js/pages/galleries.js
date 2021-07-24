
/**
 * Arquivo de configuração das páginas de cadastro e edição de galerias
 */

var base_url = $("#url").val();
var assets = $("#assets").val();
var index = parseInt($("#gallery_index").val());

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
 * @param string name
 */
function getSlug(name) {
	var token = $('input[name="_token"]').val();
	$.ajax({
		url: '/admin/galerias/criar-slug',
		type: "post",
		dataType: 'json',
		data: { "_token": token, "name": name },
		success: function (response) {
			$('#slug').val(response.slug);
		},
		error() {
			alert('Erro ao obter Slug para o título da galeria');
		}
	});
}

/**
 * Função de callback do plugin para adicionar imagens e exibir a pré visualização
 *
 * @param integer field_id
 */
function responsive_filemanager_callback(field_id) {
	var src = $("#" + field_id).val();

	// Caso seja selecionada mais de uma imagem, transforma a string retornada
	// pelo plugin em um Array válido
	src = src.replace('[', '').replace(']', '');
	src = src.replace(/"/g, '');
	src = src.split(',');

	// Caso tenha sido selecionada apenas uma imagem, converte para um array de um elemento
	if(!Array.isArray(src)){
		src = [src];
	}

	// Adiciona o container para a pŕé visualização
	for(var i = 0; i < src.length; i++){
		var image = src[i];
		index++;
		addContainer(index, image);
	}
}

/**
 * Adiciona um novo container de imagem
 *
 * @param integer index
 */
function addContainer(index, image){
	var container = '';
	container += '<div class="col-lg-3 col-md-4" id="container'+ index +'">'
	container += '	<div class="card">';
	container += '		<div class="card-body">';
	container += '			<div class="col-md-12 mb-2">';
	container += '				<div class="row">';
	container += '					<div class="img-container-wrap">';
	container += '						<input type="hidden" name="gallery['+ index +'][path]" id="img'+ index +'" value="' + image + '">';
	container += '						<img src="' + assets + '/admin/uploads/large/' + image + '" class="img-thumbnail" id="view_img'+ index +'" style="width:100%" />';
	container += '					</div>';
	container += '				</div>'
	container += '			</div>';
	container += '			<div class="row">'
	container += '				<div class="form-group col-md-12">';
	container += '					<label for="title">Título</label>';
	container += '					<input type="text" class="form-control" name="gallery['+ index +'][title]">';
	container += '				</div>';
	container += '				<div class="form-group col-md-12">';
	container += '					<label for="title">Descrição</label>';
	container += '					<textarea class="form-control" name="gallery['+ index +'][description]"></textarea>';
	container += '				</div>';
	container += '				<div class="form-group col-md-12">';
	container += '					<label for="title">Link</label>';
	container += '					<input type="url" class="form-control" name="gallery['+ index +'][link]">';
	container += '				</div>';
	container += '				<div class="col-md-12">';
	container += '					<button type="button" class="btn btn-danger btn-block" onclick="remove('+ index +')"><i class="fa fa-trash"></i> Remover</button>';
	container += '				</div>';
	container += '			</div>';
	container += '		</div>';
	container += '	</div>';
	container += '</div>';

	$("#row_containers").append(container);
}

/**
 * Remove um container de imagem
 *
 * @param integer index
 */
function remove(index){
	$("#container" + index).remove();
}
