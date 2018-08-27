$(document).ready(function(){
  iniciarDataTable('example1');
  iniciarDataTable('example2');
});

function iniciarDataTable(id){
  var table = $('#'+id).DataTable({
    "language": {
      "decimal": "",
      "emptyTable": "No hay datos disponibles",
      "info": "Mostrando _START_ hasta _END_ de _TOTAL_ registros",
      "infoEmpty": "Mostrando 0 hasta 0 de 0 entries",
      "infoFiltered": "(filtrando de _MAX_ registros totales)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ registros",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "No se encontraron coincidencias",
      "paginate": {
        "first": "Primera",
        "last": "Ultima",
        "next": "Siguiente",
        "previous": "Anterior"
      },
      "aria": {
        "sortAscending": ": activar para ordenar de forma ascendente",
        "sortDescending": ": activar para ordenar de forma descendente"
      }
    },
    dom: 'Blfrtip',
    buttons: [ 'excel', 'pdf' ],
    lengthMenu: [
      [ 10, 20, 30, 40, -1 ],
      [ '10', '20', '30', '40', 'Todo' ]
    ],
    "order": [
      [0, 'desc']
    ],
    "scrollX": true
  });
  table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)');
}