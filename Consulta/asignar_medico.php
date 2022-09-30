<?php include('../include/header.php') ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../login_paciente.php');
}

$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];

include('../config.php');

if (isset($_GET['nombre'])) {
  $nombrePaciente = $_REQUEST['nombre'];
  $apellidoPaciente = $_REQUEST['apellido'];
  $ciPaciente = $_REQUEST['ci'];

  $sqlConsulta = ("SELECT DISTINCT r.CODIGO_RESERVA, pa.NOMBRE, pa.APELLIDO, pa.CI, pa.TIPO_SANGRE, pa.ENFERMEDAD_BASE, r.FECHA_RESERVA, GROUP_CONCAT(DISTINCT p.NOMBRE,' ',p.APELLIDO) AS personal, p.ESPECIALIDAD, c.DETALLE_CONSULTA FROM personal p, paciente pa, reservas r, turnos t, consulta_medica c WHERE pa.NOMBRE = '$nombrePaciente' AND pa.APELLIDO = '$apellidoPaciente' AND pa.CI = $ciPaciente AND pa.CODIGO = r.CODIGO_PACIENTE AND p.CODIGO = r.CODIGO_PERSONAL AND r.CODIGO_RESERVA = c.CODIGO_RESERVA ");

  $queryConsulta = mysqli_query($con, $sqlConsulta);
} else {
  $sqlConsulta = ("SELECT NOMBRE FROM personal WHERE NOMBRE IS NULL ");
  $queryConsulta = mysqli_query($con, $sqlConsulta);
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

<div class="p-5">
  <div class="container w-50">
    <div class="text-center mb-4">
      <h2>Asignar Medico</h2>
    </div>
    <form action="asignar_medico.php" method="$_POST">
      <div class="border p-4">
        <h4 class="text-center">Datos del Paciente</h4>
        <div class="mb-3">
          <label for="" class="form-label">Nombres del Paciente</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php if(isset($_GET['nombre'])){
            echo $nombrePaciente;
          } else {
            echo "";
          } 
          ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Apellidos del Paciente</label>
          <input type="text" class="form-control" id="apellido" name="apellido" required value="<?php if(isset($_GET['apellido'])){
            echo $apellidoPaciente;
          } else {
            echo "";
          } 
          ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">CI</label>
          <input type="number" class="form-control" id="ci" name="ci" required value="<?php if(isset($_GET['ci'])){
            echo $ciPaciente;
          } else {
            echo "";
          } 
          ?>">
        </div>
        <div class="text-center">
          <button class="btn btn-danger">Consultar</button>
        </div>
      </div>
    </form>
  </div>

  <div class="mt-4">
    <div class="row clearfix flex-row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <div class="row clearfix">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-md-12 p-2">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Nombres</th>
                          <th scope="col">Apellidos</th>
                          <th scope="col">CI</th>
                          <th scope="col">Tipo de Sangre</th>
                          <th scope="col">Enfermedad de Base</th>
                          <th scope="col">Fecha Consulta</th>
                          <th scope="col">Medico Asignado</th>
                          <th scope="col">Especialidad</th>
                          <th scope="col">Detalle</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($dataConsulta = mysqli_fetch_array($queryConsulta)) {?>
                        <tr>
                          <td><?php echo $dataConsulta['NOMBRE']; ?></td>
                          <td><?php echo $dataConsulta['APELLIDO']; ?></td>
                          <td><?php echo $dataConsulta['CI']; ?></td>
                          <td><?php echo $dataConsulta['TIPO_SANGRE']; ?></td>
                          <td><?php echo $dataConsulta['ENFERMEDAD_BASE']; ?></td>
                          <td><?php echo $dataConsulta['FECHA_RESERVA']; ?></td>
                          <td><?php echo $dataConsulta['personal']; ?></td>
                          <td><?php echo $dataConsulta['ESPECIALIDAD']; ?></td>
                          <td><?php echo $dataConsulta['DETALLE_CONSULTA']; ?></td>
                          <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataConsulta['CODIGO_RESERVA']; ?>">
                            Cambiar Medico
                            </button>
                          </td>
                        </tr>
                        <!--Ventana Modal para Actualizar--->
                        <?php include('ModalAsignarMedico.php'); ?>

                        <?php } ?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include('../include/footer.php') ?>