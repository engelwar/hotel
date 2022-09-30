<?php include('../include/header.php') ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../login_paciente.php');
}

$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];

include('../config.php');

if (isset($_GET['especialidad']) && $_GET['especialidad'] != 'todos') {
  $sqlPersonal   = ("SELECT * FROM personal where ESPECIALIDAD = '" . $_GET['especialidad'] . "' ");
  $queryPersonal = mysqli_query($con, $sqlPersonal);
  $cantidad     = mysqli_num_rows($queryPersonal);
} else {
  $sqlPersonal   = ("SELECT * FROM personal ORDER BY CODIGO DESC ");
  $queryPersonal = mysqli_query($con, $sqlPersonal);
  $cantidad     = mysqli_num_rows($queryPersonal);
}

$sqlEspecialidad = ("SELECT ESPECIALIDAD FROM personal");
$queryEspecialidad = mysqli_query($con, $sqlEspecialidad);

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
<div class="jumbotron pt-4">
  <div class="container">
    <div class="text-center mb-4">
      <h2>Consultar Especialidad</h2>
    </div>
    <div class="container w-50">
      <form action="especialidades.php" method="$_POST">
        <div class="border p-4">
          <div class="w-50 m-auto text-center">
            <select class="form-select w-100" aria-label="Default select example" name="especialidad">
              <option selected value="todos">Todos</option>
              <?php 
              while ($dataEspecialidad = mysqli_fetch_array($queryEspecialidad)){
              ?>
              <option value="<?php echo $dataEspecialidad['ESPECIALIDAD']; ?>"><?php echo $dataEspecialidad['ESPECIALIDAD']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mt-2 text-center">
            <button class="btn btn-danger">Consultar</button>
          </div>
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
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Especialidad</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Nacionalidad</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($dataPersonal = mysqli_fetch_array($queryPersonal)) { ?>
                            <tr>
                              <td><?php echo $dataPersonal['NOMBRE']; ?></td>
                              <td><?php echo $dataPersonal['APELLIDO']; ?></td>
                              <td><?php echo $dataPersonal['TELEFONO']; ?></td>
                              <td><?php echo $dataPersonal['CORREO']; ?></td>
                              <td><?php echo $dataPersonal['CARGO']; ?></td>
                              <td><?php echo $dataPersonal['ESPECIALIDAD']; ?></td>
                              <td><?php echo $dataPersonal['TURNO']; ?></td>
                              <td><?php echo $dataPersonal['NACIONALIDAD']; ?></td>
                            </tr>
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
</div>

<?php include('../include/footer.php') ?>