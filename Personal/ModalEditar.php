<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataPersonal['CODIGO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
        <input type="hidden" name="id" value="<?php echo $dataPersonal['CODIGO']; ?>">

        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" name="nombres" required='true' value="<?php echo $dataPersonal['NOMBRE']; ?>">
          </div>
          <div class="form-group">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" required='true' value="<?php echo $dataPersonal['APELLIDO']; ?>">
          </div>
          <div class="form-group">
            <label for="ci" class="form-label">Carnet de Identidad</label>
            <input type="number" class="form-control" name="ci" required='true' value="<?php echo $dataPersonal['CI']; ?>">
          </div>
          <div class="form-group">
            <label for="fecha_nacimiento" class="form-label">Fecha nacimiento</label>
            <input type="date" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" step="1" value="<?php echo $dataPersonal['FECHA_NACIMIENTO']; ?>">
          </div>
          <div class="form-group">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" name="direccion" required='true' value="<?php echo $dataPersonal['DIRECCION']; ?>">
          </div>
          <div class="form-group">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="number" class="form-control" name="telefono" required='true' value="<?php echo $dataPersonal['TELEFONO']; ?>">
          </div>
          <div class="form-group">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" name="correo" required='true' value="<?php echo $dataPersonal['CORREO']; ?>">
          </div>
          <div class="form-group">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" class="form-control" name="cargo" required='true' value="<?php echo $dataPersonal['CARGO']; ?>">
          </div>
          <div class="form-group">
            <label for="especialidad" class="form-label">Especialidad</label>
            <input type="text" class="form-control" name="especialidad" required='true' value="<?php echo $dataPersonal['ESPECIALIDAD']; ?>">
          </div>
          <div class="form-group">
            <label for="turno" class="form-label">Turno</label>
            <input type="text" class="form-control" name="turno" required='true' value="<?php echo $dataPersonal['TURNO']; ?>">
          </div>          
          <div class="form-group">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" name="nacionalidad" required='true' value="<?php echo $dataPersonal['NACIONALIDAD']; ?>">
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