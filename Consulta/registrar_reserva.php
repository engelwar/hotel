<?php include('../include/header.php') ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../login_paciente.php');
}

$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];

include('../config.php');

$sqlEspecialistas = ("SELECT * FROM personal");
$queryEspecialistas = mysqli_query($con, $sqlEspecialistas);

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
    <form action="registrar_hora.php" method="$_POST">
      <div class="border p-4">
        <div class="col-md-12 mt-2">
          <label for="">
            <h4>Especialista en:</h4>
          </label>
          <select class="form-select w-100" aria-label="Default select example" name="especialidad">
            <?php while ($dataEspecialistas = mysqli_fetch_array($queryEspecialistas)) { ?>
              <option value="<?php echo $dataEspecialistas['ESPECIALIDAD']; ?>"><?php echo $dataEspecialistas['ESPECIALIDAD']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-12 mt-2">
          <button type="submit" class="btn btn-danger">Consultar Medicos</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include('../include/footer.php') ?>