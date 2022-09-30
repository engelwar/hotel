<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataConsulta['NUMERO_SOLICITUD_SERVICIO']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


      <form method="POST" action="recibEditDetalleServicio.php">
        <input type="hidden" name="id" value="<?php echo $dataConsulta['NUMERO_SOLICITUD_SERVICIO']; ?>">

        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="detalle" class="form-label">Detalle Resultado Servicio</label>
            <input type="text" class="form-control" name="detalle" value="<?php echo $dataConsulta['DETALLE_RESULTADO_SERVICIO']; ?>">
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