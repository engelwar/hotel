<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataConsulta['NUMERO_RECETA']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #563d7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
          Cambiar Medico
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="">
        <input type="hidden" name="numero_receta" id="numero_receta" value="<?php echo $dataConsulta['NUMERO_RECETA']; ?>">

        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="medicamento" class="form-label">Nombre del Medicamento</label>
            <input type="text" id="nombre_medicamento" class="form-control" name="nombre_medicamento" step="1" autofocus value="" required>
          </div>
        </div>
        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="posologia" class="form-label">Posologia</label>
            <input type="text" id="posologia" class="form-control" name="posologia" step="1" autofocus value="" required>
          </div>
        </div>
        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="medicamento" class="form-label">Cantidad</label>
            <input type="number" id="cantidad" class="form-control" name="cantidad" step="1" autofocus value="" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" id="actu" class="btn btn-info" onclick="select()">Guardar</button>
        </div>
      </form>
      <div class="modal-body" id="cont_modal">
        <div class="form-group">
          <label for="receta" class="form-label">Detalle de Recetas:</label>
          <select class="form-select w-100" multiple aria-label="multiple select example" name="receta" id="receta" required></select>
          <button type="button" id="actu" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    consultar();
  });

  function select() {
    let numero_receta = $('#numero_receta').val();
    let nombre_medicamento = $('#nombre_medicamento').val();
    let posologia = $('#posologia').val();
    let cantidad = $('#cantidad').val();
    $.ajax({
      url: 'detalle_receta.php',
      type: 'POST',
      // dataType: 'json',
      data: {
        dato1: numero_receta,
        dato2: nombre_medicamento,
        dato3: posologia,
        dato4: cantidad
      },
      success: function(res) {
        let js = JSON.parse(res);
        let option;
        for (let i = 0; i < js.length; i++) {
          option += '<option value="' + js[i].NOMBRE_MEDICAMENTO + '">' + js[i].NOMBRE_MEDICAMENTO + ' - ' + js[i].POSOLOGIA + ' - ' + js[i].CANTIDAD + '</option>';
        }
        $('#receta').html(option);
      }
    });
  };

  function consultar() {
    let numero_receta = $('#numero_receta').val();
    $.ajax({
      url: 'consultar_receta.php',
      type: 'POST',
      // dataType: 'json',
      data: {
        dato1: numero_receta
      },
      success: function(res) {
        let js = JSON.parse(res);
        let option;
        console.log(js.length);
        console.log(js);
        for (let i = 0; i < js.length; i++) {
          option += '<option value="' + js[i].NOMBRE_MEDICAMENTO + '">' + js[i].NOMBRE_MEDICAMENTO + ' - ' + js[i].POSOLOGIA + ' - ' + js[i].CANTIDAD + '</option>';
        }
        $('#receta').html(option);
      }
    });
  };

  function eliminar() {
    let numero_receta = $('#numero_receta').val();
    let arrayReceta = $('#receta').val();
    let nombreReceta = arrayReceta[0];
    $.ajax({
      url: 'delete_receta.php',
      type: 'POST',
      // dataType: 'json',
      data: {
        dato1: numero_receta,
        dato2: nombreReceta
      },
      success: function(res) {
        let js = JSON.parse(res);
        let option;
        for (let i = 0; i < js.length; i++) {
          option += '<option value="' + js[i].NOMBRE_MEDICAMENTO + '">' + js[i].NOMBRE_MEDICAMENTO + ' - ' + js[i].POSOLOGIA + ' - ' + js[i].CANTIDAD + '</option>';
        }
        $('#receta').html(option);
      }
    });
  };
</script>
<!---fin ventana Update --->