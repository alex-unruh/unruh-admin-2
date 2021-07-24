/* 
 * Copyright (C) 2018 Alexandre Unruh <alexandre@unruh.com.br>
 * Unruh Solutions <http://unruh.com.br>
 */

$('.fancy').fancybox({
  'type': 'iframe',
  'autoScale': false
});

function message(msg, style) {
  swal({
    text: msg,
    type: style,
    confirmButtonClass: 'btn btn-info'
  });
}

function confirmation(formId) {
  swal({
    title: 'Tem certeza?',
    text: "Essa operação exige confirmação, deseja realmente continuar?",
    type: 'warning',
    dangerMode: true,
    showCancelButton: true,
    confirmButtonClass: 'btn btn-danger',
    cancelButtonClass: 'btn btn-default',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Confirmar'
  }).then(function () {
    $("#" + formId).submit();
  });
}


