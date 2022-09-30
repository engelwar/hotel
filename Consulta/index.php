<?php include("../include/header.php") ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../login_paciente.php');
}

$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];
$rol = $_SESSION['rol'];

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

<div class="jumbotron d-flex align-items-center">
  <div class="container d-flex flex-column align-items-center" style="gap: 2rem;">
  <?php if($rol == 'rrhh'){ ?>
    <a href="especialidades.php" class="btn btn-primary w-25">Consultar especialidades</a>
    <a href="registrar_reserva.php" class="btn btn-primary w-25">Registrar Reserva de Consulta</a>
    <a href="generar_consulta.php" class="btn btn-primary w-25">Generar Consulta</a>
    <a href="asignar_medico.php" class="btn btn-primary w-25">Asignar Medico a Consulta</a>
    <a href="consultar_paciente.php" class="btn btn-primary w-25">Consultar Paciente</a>
    <a href="detalle_resultados_servicios.php" class="btn btn-primary w-25">Detalle Resultado Servicio</a>
    <a href="solicitud_analisis.php" class="btn btn-primary w-25">Solicitud de Analisis</a>
    <a href="resultado_analisis.php" class="btn btn-primary w-25">Resultado de Analisis</a>
  <?php }elseif($rol == 'personal'){ ?>
    <a href="especialidades.php" class="btn btn-primary w-25">Consultar especialidades</a>
    <a href="generar_consulta.php" class="btn btn-primary w-25">Generar Consulta</a>
    <a href="consultar_paciente.php" class="btn btn-primary w-25">Consultar Paciente</a>
    <a href="detalle_resultados_servicios.php" class="btn btn-primary w-25">Detalle Resultado Servicio</a>
    <a href="resultado_analisis.php" class="btn btn-primary w-25">Resultado de Analisis</a>
  <?php } else{ ?>
    <a href="especialidades.php" class="btn btn-primary w-25">Consultar especialidades</a>
    <a href="registrar_reserva.php" class="btn btn-primary w-25">Registrar Reserva de Consulta</a>
    <a href="consultar_paciente.php" class="btn btn-primary w-25">Consultar Paciente</a>
    <a href="solicitud_analisis.php" class="btn btn-primary w-25">Solicitud de Analisis</a>
  <?php } ?>
  </div>
</div>

<?php include("../include/footer.php") ?>