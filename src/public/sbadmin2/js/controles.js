(function($) {
  $(document).ready(function() {
    
    
    $('.show').click(function() {
      var url = $(this).attr("href");
      // $('.modal').html('');
      $.get(
        url,
        function(data) {
          $('.modal').html(data);
          // show modal
          $('#mymodal').modal('show');
        }
      );
    });
    
    
    // $('#mymodal').on('shown.bs.modal', function() {
    //   $('select').select2();
    // })
    
    $('.eliminar').click(function() {
      var url = $(this).attr("href");
      var r = confirm("¿Está seguro que desea eliminar este elemto?");
      if (r == true) {
        return true;
      } else {
        return false;
      }
    });
    
    // $(function(){
    //   var url = window.location;
    //   // for sidebar menu but not for treeview submenu
    //   $('ul.sidebar-menu a').filter(function() {
    //     return this.href == url;
    //   }).parent().siblings().removeClass('active').end().addClass('active');
    //   // for treeview which is like a submenu
    //   $('ul.treeview-menu a').filter(function() {
    //     return this.href == url;
    //   }).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active menu-open').end().addClass('active menu-open');
    // });
    
    // $('.input_rut').rut({
    //   fn_error : function(input){
    //     if(input.val() != ''){
    //       alert('El rut: ' + input.val() + ' es incorrecto');
    //       input.val('');
    //     }
    //   },
    //   placeholder: true
    // });
    // $('.input_rut').rut({formatOn: 'keyup'});
    
    // $(".input_rut").rut({
    //   formatOn: 'keyup',
    //   minimumLength: 8, // validar largo mínimo; default: 2
    //   validateOn: 'change' // si no se quiere validar, pasar null
    // }).on('rutInvalido', function(e) {
    //   alert("El rut " + $(this).val() + " es inválido");
    //   $(this).val('');
    // });
    
    // $('select').select2();
    
    // $('select').selectpicker({
    //   liveSearch: true,
    //   size:8
    // });
    
    // $('.datepicker').datepicker({
    //   language: "es",
    //   format: 'yyyy-mm-dd',
    //   todayHighlight: true,
    //   autoclose: true
    // });
    // FUNCION QUE CONTROLA EL AUTOCLOSE DE LAS ALERTAS
    // $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    //   $(".alert-success").alert('close');
    // });
    
    $('#dataTable').DataTable({
      "order": [],
      dom: "<'row'<'col-sm-12 col-md-6'b><'col-sm-12 col-md-6'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'l i><'col-sm-12 col-md-7'p>>",
      responsive: true,
      language: {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontró nada - lo siento",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtered from _MAX_ total records)",
        paginate: {
          "previous": "<",
          "next": ">"
        }
      }
      // dom: '<"toolbar"Bftip>',
    });
    
    var table = $('#mareas').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('mareas.list') }}",
      columns: [
        {data: 'id', name: 'id'},
        {data: 'fecha_zarpe', name: 'fecha_zarpe'},
        {data: 'fecha_recalada', name: 'fecha_recalada'},
        {data: 'puerto_zarpe', name: 'puerto_zarpe'},
        {data: 'orp', name: 'orp'},
        {data: 'embarcaion', name: 'embarcacion'},
        {data: 'arte_pesca', name: 'arte_pesca'},
        {data: 'captura', name: 'captura'},
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: true
        },
      ]
    });
    
    $('.alert').alert()
    
  });
  // $(function(){
  //   $('.datetimepicker').datetimepicker({
  //     locale: 'es',
  //     format: 'YYYY-MM-DD HH:mm:ss',
  //   });
  // });
  
  
})(jQuery);
