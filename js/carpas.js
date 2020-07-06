$(document).ready(function(){
  load(1);
});

function load(page){
  var q= $("#q").val();

  var carpa_id= $("#carpa_id").val();
  var parametros={'action':'ajax','page':page,'q':q,'carpa_id':carpa_id};
  $("#loader").fadeIn('slow');
  $.ajax({
    data: parametros,
    url:'./ajax/buscar_carpas.php',
     beforeSend: function(objeto){
     $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
    },
    success:function(data){
      $(".outer_div").html(data).fadeIn('slow');
      $('#loader').html('');
      
    }
  })
}



$( "#add_carpa" ).submit(function( event ) {
  $('#add_carpa').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nueva_carpa.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
			  },
			success: function(datos){
      $('#nuevaCarpa').attr("disabled", false);
      $('#nuevaCarpa').modal('toggle');
      load(1);
      $("#resultados").html(datos);
		  }
	});
  event.preventDefault();
})

function eliminar(id)
{
  var q= $("#q").val();
  if (confirm("Realmente deseas eliminar la Carpa ?")){	
    $.ajax({
      type: "GET",
      url: "./ajax/eliminar_carpa.php",
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

$('#editCarpa').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var ocupacion_actual = button.data('ocupacion_actual') 
  var id_cliente = button.data('id_cliente') 
  var tipo_estado = button.data('tipo_estado') 
  var tipo_contrato = button.data('tipo_contrato') 
  var detalle_carpa = button.data('detalle_carpa') 
  var id_pasillo = button.data('id_pasillo') 
  var id_carpa= button.data('id_carpa') 
  var modal = $(this)
  
  
 
  modal.find('.modal-body #ocupacion_actual').val(ocupacion_actual) 
  modal.find('.modal-body #id_cliente').val(id_cliente)
  modal.find('.modal-body #tipo_estado').val(tipo_estado)
  modal.find('.modal-body #tipo_contrato').val(tipo_contrato)
  modal.find('.modal-body #detalle_carpa').val(detalle_carpa) 
  modal.find('.modal-body #id_pasillo').val(id_pasillo)
  modal.find('.modal-body #id_carpa').val(id_carpa)
})





			

$("#editar_carpas").submit(function(event) {
  $('#actualizar_datos').attr("disabled", true);
  var parametros = $(this).serialize();
	$.ajax({
    type: "POST",
		url: "ajax/editar_carpas.php",
		data: parametros,
		beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		},
		success: function(datos){
      $('#editCarpa').modal('hide');
			$('#actualizar_datos').attr("disabled", false);
      load(1);
      $("#resultados").html(datos);
		}
	});
  event.preventDefault();
})

