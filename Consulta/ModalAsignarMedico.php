<!--ventana para Update--->
<?php 

include('../config.php');

$sqlEspecial = (" SELECT CODIGO, NOMBRE, APELLIDO, ESPECIALIDAD FROM personal ");
$queryEspecial = mysqli_query($con, $sqlEspecial);

?>

<div class="modal fade" id="editChildresn<?php echo $dataConsulta['CODIGO_RESERVA']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


      <form method="POST" action="accion_asignar_medico.php">
        <input type="hidden" name="id" value="<?php echo $dataConsulta['CODIGO_RESERVA']; ?>">

        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="especialidad" class="form-label">Especialidad</label>
            <select class="form-select w-100" aria-label="Default select example" id="idEspecial">
              <?php
              while ($dataEspecial = mysqli_fetch_array($queryEspecial)) {
              ?>
                <option value="<?php echo $dataEspecial['ESPECIALIDAD']; ?>"><?php echo $dataEspecial['ESPECIALIDAD']; ?></option>
              <?php } ?>
            </select>
            <button type="button" id="actu" class="btn btn-info w-100" onclick="especial()">Consultar Medicos</button>
          </div>
        </div>
        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="medicos" class="form-label">Medicos:</label>
            <select class="form-select w-100" multiple aria-label="multiple select example" name="idMedico" id="idMedico" required>
              
            </select>
          </div>
        </div>
        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" id="fecha_consulta" class="form-control" name="fecha_consulta" step="1" autofocus value="" required>
            <button type="button" id="actu" class="btn btn-info w-100" onclick="select()">Consultar Horarios</button>
          </div>
        </div>
        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="horas" class="form-label">Horarios:</label>
            <select class="form-select w-100" multiple aria-label="multiple select example" name="id_horario" id="horas" required></select>
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

<script src="../js/jquery.min.js"></script>
<script>
  function select() {
    var medico_array = $('#idMedico').val();
    var medico = medico_array[0];
    var fecha_consulta = $('#fecha_consulta').val();

    $.ajax({
      url: 'datos_horario.php',
      type: 'POST',
      // dataType: 'json',
      data: {
        dato1: medico,
        dato2: fecha_consulta
      },
      success: function(res) {
        var js = JSON.parse(res);
        var option;
        for (var i = 0; i < js.length; i++) {
          option += '<option value="' + js[i].CODIGO + '">' + js[i].INICIO + ' - ' + js[i].FIN + '</option>';
        }
        $('#horas').html(option);
      }
    });
  };

  function especial() {
    var idEspecial = $('#idEspecial').val();
    console.log(idEspecial);

    $.ajax({
      url: 'datos_especialidad.php',
      type: 'POST',
      // dataType: 'json',
      data: {
        dato1: idEspecial
      },
      success: function(res2) {
        var js2 = JSON.parse(res2);
        var option2;
        for (var j = 0; j < js2.length; j++) {
          option2 += '<option value="' + js2[j].CODIGO + '">' + js2[j].NOMBRE + ' - ' + js2[j].APELLIDO + '</option>';
        }
        $('#idMedico').html(option2);
      }
    });
  };
</script>
<!---fin ventana Update --->