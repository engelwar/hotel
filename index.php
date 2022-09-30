<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: principal.php');
}

// $ci = $_SESSION['ci'];
$nombres = $_SESSION['nombres'];
$rol = $_SESSION['rol'];

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Consultorio</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/cargando.css">
  <link rel="stylesheet" type="text/css" href="css/maquinawrite.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <div class="cargando">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
  </div>

  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php">CONSULTORIO</a>
    <!-- Navbar-->
    <span class="text-info fs-2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
          <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
        </svg><?php echo $nombres; ?></span>
    <div>
      <a class="navbar-brand ps-3" href="logout.php">Cerrar Sesion</a>
    </div>
  </nav>

  <div class="jumbotron mb-0 position-relative">
    <div class="overlay"></div>
    <div class="container">
      <div class="title text-center">
        <h1 class="">
          Centro Medico Llojeta
        </h1>
      </div>
      <div class="links d-flex flex-column align-items-center justify-content-around mt-5">
        <?php if($rol == 'adm' || $rol == 'personal'){ ?>
          <a href="Paciente/index.php" class="text-white">Paciente</a>
          <a href="Personal/index.php" class="text-white">Personal</a>
          <a href="Consulta/index.php" class="text-white">Consultas</a>
        <?php } else { ?>
          <a href="Consulta/index.php" class="text-white">Consultas</a>
        <?php } ?>
      </div>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {

      $(window).load(function() {
        $(".cargando").fadeOut(1000);
      });

    });
  </script>
</body>

</html>