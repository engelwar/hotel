<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataPersonal['codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
        <input type="hidden" name="id" value="<?php echo $dataPersonal['codigo']; ?>">

        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" name="nombres" required='true' value="<?php echo $dataPersonal['nombres']; ?>">
          </div>
          <div class="form-group">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" required='true' value="<?php echo $dataPersonal['apellidos']; ?>">
          </div>
          <div class="form-group">
            <label for="ci" class="form-label">Carnet de Identidad</label>
            <input type="number" class="form-control" name="ci" required='true' value="<?php echo $dataPersonal['carnet']; ?>">
          </div>
          <div class="form-group">
            <label for="celular" class="form-label">Celular</label>
            <input type="number" class="form-control" name="celular" required='true' value="<?php echo $dataPersonal['celular']; ?>">
          </div>
          <div class="form-group">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" name="direccion" required='true' value="<?php echo $dataPersonal['direccion']; ?>">
          </div>
          <div class="form-group">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" name="correo" required='true' value="<?php echo $dataPersonal['correo']; ?>">
          </div>
          <div class="form-group">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" name="nacionalidad" required='true' value="<?php echo $dataPersonal['nacionalidad']; ?>">
          </div>
          <div class="form-group">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" class="form-control" name="cargo" required='true' value="<?php echo $dataPersonal['cargo']; ?>">
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