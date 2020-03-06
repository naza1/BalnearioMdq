$(document).ready(function(){
  load(1);
});

function load(page){
  var q= $("#q").val();

  var cliente_id= $("#cliente_id").val();
  var parametros={'action':'ajax','page':page,'q':q,'cliente_id':cliente_id};
  $("#loader").fadeIn('slow');
  $.ajax({
    data: parametros,
    url:'./ajax/buscar_clientes.php',
     beforeSend: function(objeto){
     $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
    },
    success:function(data){
      $(".outer_div").html(data).fadeIn('slow');
      $('#loader').html('');
      
    }
  })
}

$( "#add_cliente" ).submit(function( event ) {
  $('#add_cliente').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
			  },
			success: function(datos){
      $('#nuevoCliente').attr("disabled", false);
      $('#nuevoCliente').modal('toggle');
      load(1);
      $("#resultados").html(datos);
		  }
	});
  event.preventDefault();
})

function eliminar(id)
{
  var q= $("#q").val();
  if (confirm("Realmente deseas eliminar el cliente ?")){	
    $.ajax({
      type: "GET",
      url: "./ajax/eliminar_cliente.php",
      data: "id="+id,"q":q,
      beforeSend: function(objeto){
      $("#resultados").html("Mensaje: Cargando...");
    },
    success: function(datos){
      $("#resultados").html(datos);
      load(1);
    }
    });
  }
}

$('#editClient').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var nombre = button.data('nombre') 
  var dni = button.data('dni') 
  var email = button.data('email') 
  var id = button.data('id') 
  var modal = $(this)
  modal.find('.modal-body #nombre').val(nombre)
  modal.find('.modal-body #dni').val(dni) 
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #id').val(id)
})

$("#editar_cliente").submit(function(event) {
  $('#actualizar_datos').attr("disabled", true);
  var parametros = $(this).serialize();
	$.ajax({
    type: "POST",
		url: "ajax/editar_cliente.php",
		data: parametros,
		beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		},
		success: function(datos){
      $('#editClient').modal('hide');
			$('#actualizar_datos').attr("disabled", false);
      load(1);
      $("#resultados").html(datos);
		}
	});
  event.preventDefault();
})
