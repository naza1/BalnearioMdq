<form class="form-horizontal"  method="post" name="add_cliente" id="add_cliente">
<!-- Modal -->
<div id="nuevoCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Agregar Cliente</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nombre y Apellido</label>
            <div class="col-sm-6">
              <input type="text" min="150" name="name" class="form-control" id="name" value="" placeholder="Nombre y Apellido" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="documento" class="col-sm-2 control-label">DNI</label>
            <div class="col-sm-6">
              <input type="number" name="documento" class="form-control" id="documento" value="" placeholder="Dni" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="direccion" class="col-sm-2 control-label">Dirección</label>
            <div class="col-sm-6">
              <input type="text" name="direccion" class="form-control" id="direccion" value="" placeholder="Direción" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="localidad" class="col-sm-2 control-label">Localidad</label>
            <div class="col-sm-6">
              <input type="text" name="localidad" class="form-control" id="localidad" value="" placeholder="Localidad" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="telefono" class="col-sm-2 control-label">Telefono</label>
            <div class="col-sm-6">
              <input type="text" name="telefono" class="form-control" id="telefono" value="" placeholder="Telefono" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-6">
              <input type="text" name="email" class="form-control" id="email" value="" placeholder="Email" required="">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		    <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>

  </div>
</div> 
 </form>