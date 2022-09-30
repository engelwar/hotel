<?php include("../include/header.php") ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../principal.php');
}

$nombres = $_SESSION['nombres'];

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
<div class="p-5">

  <?php
  include('../config.php');

  if (isset($_GET['ci']) && $_GET['ci'] != null) {
    $ci = $_GET['ci'];

    $sqlPersonal   = ("SELECT * FROM personal where carnet = '" . $ci . "' ");
    $queryPersonal = mysqli_query($con, $sqlPersonal);
    $cantidad     = mysqli_num_rows($queryPersonal);
  } else {
    $sqlPersonal   = ("SELECT * FROM personal ORDER BY codigo  DESC ");
    $queryPersonal = mysqli_query($con, $sqlPersonal);
    $cantidad     = mysqli_num_rows($queryPersonal);
  }

  ?>


  <h4 class="text-center">
    <a href="registrarPersonal.php" class="btn btn-primary mb-4">Registrar Personal</a>
  </h4>
  <hr>

  <div class="container w-50">
    <form action="index.php" method="$_POST">
      <div class="mb-3 text-center">
        <label for="" class="form-label">Carnet de Identidad</label>
        <input type="number" class="form-control" id="ci" name="ci" placeholder="123">
      </div>
      <div class="text-center">
        <button class="btn btn-danger">Consultar</button>
      </div>
    </form>
  </div>

  <div class="mt-4">

    <div class="row text-center" style="background-color: #cecece">
      <div class="col-md-12">
        <strong>Lista de Personal <span style="color: crimson"> ( <?php echo $cantidad; ?> )</span> </strong>
      </div>
    </div>

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
                          <th scope="col">Celular</th>
                          <th scope="col">Direccion</th>
                          <th scope="col">Correo</th>
                          <th scope="col">Nacionalidad</th>
                          <th scope="col">Cargo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($dataPersonal = mysqli_fetch_array($queryPersonal)) { ?>
                          <tr>
                            <td><?php echo $dataPersonal['nombres']; ?></td>
                            <td><?php echo $dataPersonal['apellidos']; ?></td>
                            <td><?php echo $dataPersonal['carnet']; ?></td>
                            <td><?php echo $dataPersonal['celular']; ?></td>
                            <td><?php echo $dataPersonal['direccion']; ?></td>
                            <td><?php echo $dataPersonal['correo']; ?></td>
                            <td><?php echo $dataPersonal['nacionalidad']; ?></td>
                            <td><?php echo $dataPersonal['cargo']; ?></td>
                            <td>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataPersonal['codigo']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                              </button>

                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataPersonal['codigo']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                              </button>
                            </td>
                          </tr>


                          <!--Ventana Modal para Actualizar--->
                          <?php include('ModalEditar.php'); ?>

                          <!--Ventana Modal para la Alerta de Eliminar--->
                          <?php include('ModalEliminar.php'); ?>


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

<?php include("../include/footer.php") ?>