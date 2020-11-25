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
    url:'./ajax/credencial_cliente.php',
     beforeSend: function(objeto){
     $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
    },
    success:function(credencial){
      $(".outer_div").html(data).fadeIn('slow');
      $('#loader').html('');
      
    }
  })
}



function credencial(id)
{
  var q= $("#q").val();
  if (confirm("Realmente deseas generar la CREDENCIAL ?")){	
    $.ajax({
      type: "GET",
      url: "./ajax/credencial_cliente.php",
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


