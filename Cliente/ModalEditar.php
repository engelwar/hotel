<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataCliente['codigo_cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #563d7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
          Actualizar Información
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="recib_Update.php">
        <input type="hidden" name="id" value="<?php echo $dataCliente['codigo_cliente']; ?>">

        <div class="modal-body" id="cont_modal">

          <div class="col-md-12">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" name="nombres" required='true' value="<?php echo $dataCliente['nombres']; ?>" autofocus>
          </div>
          <div class="col-md-12 mt-2">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" required='true' value="<?php echo $dataCliente['apellidos']; ?>" autofocus>
          </div>
          <div class="col-md-12 mt-2">
            <label for="ci" class="form-label">Carnet de Identidad</label>
            <input type="number" class="form-control" name="ci" required='true' value="<?php echo $dataCliente['carnet']; ?>" autofocus>
          </div>
          <div class="col-md-12 mt-2">
            <label for="celular" class="form-label">Celular</label>
            <input type="number" class="form-control" name="celular" required='true' value="<?php echo $dataCliente['celular']; ?>" autofocus>
          </div>
          <div class="col-md-12 mt-2">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" name="correo" required='true' value="<?php echo $dataCliente['correo']; ?>" autofocus>
          </div>
          <div class="col-md-12 mt-2">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" name="nacionalidad" required='true' value="<?php echo $dataCliente['nacionalidad']; ?>" autofocus>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->