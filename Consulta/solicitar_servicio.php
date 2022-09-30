<?php include("../include/header.php") ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../login_paciente.php');
}

$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];
$rol = $_SESSION['rol'];

include("../config.php");

$sqlServicios = ("SELECT * FROM servicios");
$queryServicios = mysqli_query($con, $sqlServicios);

if (isset($_GET['codigo_servicio']) && $_GET['codigo_servicio'] != 'todos') {
  $codigo_servicio = $_GET['codigo_servicio'];

  $sqlConsultaMedica = (" SELECT c.NUMERO_CONSULTA FROM consulta_medica c, reservas r WHERE c.CODIGO_RESERVA = r.CODIGO_RESERVA AND r.CODIGO_PACIENTE = '" . $id . "' ");
  $queryConsultaMedica = mysqli_query($con, $sqlConsultaMedica);

  if ($queryConsultaMedica) {
    $row = $queryConsultaMedica->fetch_assoc();
    $numero_consulta = $row['NUMERO_CONSULTA'];
    $fechaSolicitud = date('Y-m-d H:i:s');
    $sqlSolicitudServicio = (" INSERT INTO solicitud_servicios(
      CODIGO_PACIENTE,
      NUMERO_CONSULTA,
      FECHA
    )
    VALUES(
      '" . $id . "',
      '" . $numero_consulta . "',
      '" . $fechaSolicitud . "'
    ) ");
    $querySolicitudServicio = mysqli_query($con, $sqlSolicitudServicio);
    if ($querySolicitudServicio) {
      $sqlConsultaSolicitudServicio = (" SELECT NUMERO_SOLICITUD FROM solicitud_servicios WHERE CODIGO_PACIENTE = '" . $id . "' ");
      $queryConsultaSolicitudServicio = mysqli_query($con, $sqlConsultaSolicitudServicio);
      $row2 = $queryConsultaSolicitudServicio->fetch_assoc();
      $numero_solicitud = $row2['NUMERO_SOLICITUD'];
      $sqlDetalleSolicitud = (" INSERT INTO detalle_solicitud_servicios(
        NUMERO_SOLICITUD,
        CODIGO_SERVICIO
      )
      VALUES(
        '" . $numero_solicitud . "',
        '" . $codigo_servicio . "'
      ) ");
      $queryDetalleSolicitud = mysqli_query($con, $sqlDetalleSolicitud);
      if ($queryDetalleSolicitud) {
        $sqlDetalleResultado = (" INSERT INTO detalle_resultados_servicios(
          NUMERO_SOLICITUD_SERVICIO,
          DETALLE_RESULTADO_SERVICIO
        )
        VALUES (
          '" . $numero_solicitud . "',
          null
        ) ");
        $queryDetalleResultado = mysqli_query($con, $sqlDetalleResultado);
        if ($queryDetalleResultado) {
          header('Location: index.php');
        } else {
          echo "error";
        }
      }
    }
  }
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
  <div class="container">
    <div class="text-center mb-4">
      <h2>Solicitar Servicio</h2>
    </div>
    <form action="solicitar_servicio.php" method="$_POST">
      <div class="w-50 m-auto text-center">
        <select class="form-select w-100" aria-label="Default select example" name="codigo_servicio">
          <option selected value="todos">Todos</option>
          <?php
          while ($dataServicios = mysqli_fetch_array($queryServicios)) {
          ?>
            <option value="<?php echo $dataServicios['CODIGO_SERVICIO']; ?>"><?php echo $dataServicios['DESCRIPCION']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mt-2 text-center">
        <button class="btn btn-danger">Solicitar Servicio</button>
      </div>
    </form>
  </div>
</div>

<?php include("../include/footer.php") ?>