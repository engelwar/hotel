<?php include('../include/header.php') ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../login_paciente.php');
}

$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];

include('../config.php');

if (isset($_GET['especialidad']) && $_GET['especialidad'] != null) {
  $especialidadPersonal = $_GET['especialidad'];
  $sqlPersonal   = ("SELECT CODIGO, NOMBRE, APELLIDO, ESPECIALIDAD FROM personal WHERE ESPECIALIDAD = '".$especialidadPersonal."' ");
  $queryPersonal = mysqli_query($con, $sqlPersonal);
} else {
  $sqlPersonal   = ("SELECT * FROM personal where ESPECIALIDAD = '" . null . "' ");
  $queryPersonal = mysqli_query($con, $sqlPersonal);
}

?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
  <!-- Navbar Brand-->
  <a class="navbar-brand ps-3" href="../index.php">CONSULTORIO</a>
  <!-- Navbar-->
  <span class="text-info fs-2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
    </svg><?php echo $nombres; ?></span>
  <div>
    <a class="navbar-brand ps-3" href="../logout.php">Cerrar Sesion</a>
  </div>
</nav>
<a href="index.php" class="position-absolute ml-4"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="backward" class="svg-inline--fa fa-backward fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M11.5 280.6l192 160c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.2zm256 0l192 160c20.6 17.2 52.5 2.8 52.5-24.6V96c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.2z"></path></svg>Volver a Consultas</a>
<div class="jumbotron">
  <div class="container text-center w-50 shadow-lg p-4">
    <div class="text-center mb-4">
      <h2>Registrar Consulta</h2>
    </div>
    <div class="col-md-12 mt-4 border p-4">
      <form action="accion_registra_reserva.php" method="$_POST" class="row flex-column" id="form_consulta">
        <input type="text" name="idPaciente" value="<?php echo $id; ?>" class="d-none">
        <label for="" class="mr-4">
          <h4>Medicos:</h4>
        </label>
        <select class="form-select" multiple aria-label="multiple select example" name="idMedico" id="idMedico" required>
          <?php
          while ($dataPersonal = mysqli_fetch_array($queryPersonal)) {
          ?>
            <option value="<?php echo $dataPersonal['CODIGO']; ?>"><?php echo $dataPersonal['NOMBRE'] . ' ' . $dataPersonal['APELLIDO']; ?></option>
          <?php } ?>
        </select>
        <label for="" class="mr-4">
          <h4>Fecha:</h4>
        </label>
        <input type="date" id="fecha_consulta" class="form-control" name="fecha_consulta" step="1" autofocus value="" required>

        <button type="button" id="actu" class="btn btn-info" onclick="select()">Consultar Horarios</button>

        <label for="" class="mr-4">
          <h4>Horarios:</h4>
        </label>
        <select class="form-select" multiple aria-label="multiple select example" name="id_horario" id="horas" required></select>
        <div class="col-md-12 mt-2">
          <button type="submit" class="btn btn-danger">Registrar Reserva</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  function select() {
    var medico_array = $('#idMedico').val();
    var medico = medico_array[0];
    var fecha_consulta = $('#fecha_consulta').val();

    console.log(medico);
    console.log(fecha_consulta);

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
</script>

<?php include('../include/footer.php') ?>