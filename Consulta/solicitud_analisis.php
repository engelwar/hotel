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

$sqlConsulta = (" SELECT cm.NUMERO_CONSULTA FROM reservas r, consulta_medica cm WHERE r.CODIGO_RESERVA = cm.CODIGO_RESERVA AND r.CODIGO_PACIENTE = '".$id."' ");
$queryConsulta = mysqli_query($con, $sqlConsulta);
if($queryConsulta){
  $row = $queryConsulta->fetch_assoc();
  $numero_consulta = $row['NUMERO_CONSULTA'];
  if(isset($_GET['detalle'])){
    $detalle = $_GET['detalle'];
    $fecha = date('Y-m-d H:i:s');
    $sqlSolicitud = (" INSERT INTO solicitud_analisis(
      NUMERO_CONSULTA,
      CODIGO_PACIENTE,
      DETALLE,
      FECHA
    )
    VALUES(
      '".$numero_consulta."',
      '".$id."',
      '".$detalle."',
      '".$fecha."'
    ) ");
    $querySolicitud = mysqli_query($con, $sqlSolicitud);
    if($querySolicitud){
      $sqlConsultaAnalisis = (" SELECT MAX(NUMERO_ANALISIS) FROM `solicitud_analisis` WHERE CODIGO_PACIENTE = '".$id."' ");
      $queryConsultaAnalisis = mysqli_query($con, $sqlConsultaAnalisis);
      $row2 = $queryConsultaAnalisis->fetch_assoc();
      $numero_analisis = $row2['MAX(NUMERO_ANALISIS)'];
      $detalleTest = ' ';
      $sqlResultado = (" INSERT INTO resultado_analisis(
        NUMERO_ANALISIS,
        DETALLE_RESULTADO_LABORATORIO,
        FECHA
      )
      VALUES(
        '".$numero_analisis."',
        '".$detalleTest."',
        '".$fecha."'
      ) ");
      $queryResultado = mysqli_query($con, $sqlResultado);
      if($queryResultado){
        header('Location: index.php');
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
  <div class="container w-50 border p-3">
    <div class="text-center mb-4">
      <h2>Solicitar Analisis</h2>
    </div>
    <form action="solicitud_analisis.php" method="$_POST">
      <div class="mb-3 w-75 m-auto">
        <label for="exampleFormControlTextarea1" class="form-label">Detalle de los analisis</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detalle"></textarea>
      </div>
      <div class="text-center mt-2">
        <button class="btn btn-danger">Solicitar</button>
      </div>
    </form>
  </div>
</div>

<?php include("../include/footer.php") ?>