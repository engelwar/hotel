<?php include("../include/header.php") ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../login_paciente.php');
}

$nombres = $_SESSION['nombres'];

?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
  <!-- Navbar Brand-->
  <a class="navbar-brand ps-3" href="../index.php">CONSULTAS</a>
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

    $sqlCliente   = ("
    SELECT * 
    FROM cliente 
    JOIN detalle_servicio ON detalle_servicio.codigo_cliente = cliente.codigo_cliente 
    JOIN servicio ON servicio.codigo_servicio = detalle_servicio.codigo_servicio 
    WHERE carnet = '" . $ci . "' 
    ");
    $queryCliente = mysqli_query($con, $sqlCliente);
    $cantidad     = mysqli_num_rows($queryCliente);
  } else {
    $sqlCliente   = ("
    SELECT * 
    FROM cliente 
    JOIN detalle_servicio ON detalle_servicio.codigo_cliente = cliente.codigo_cliente 
    JOIN servicio ON servicio.codigo_servicio = detalle_servicio.codigo_servicio 
    ");
    $queryCliente = mysqli_query($con, $sqlCliente);
    $cantidad     = mysqli_num_rows($queryCliente);
  }

  ?>

  <h4 class="text-center">
    <a href="registrarCliente.php" class="btn btn-primary mb-4">Registrar Cliente</a>
  </h4>
  <hr>

  <div class="container w-50">
    <form action="index.php" method="$_POST">
      <div class="mb-3 text-center">
        <label for="" class="form-label">Carnet de Identidad</label>
        <input type="number" class="form-control" id="ci" name="ci" placeholder="123">
      </div>
      <div class="text-center">
        <button class="btn btn-danger">Consultas</button>
      </div>
    </form>
  </div>

  <div class="mt-4">
    <div class="text-center" style="background-color: #cecece">
      <div class="">
        <strong>Lista de Cliente <span style="color: crimson"> ( <?php echo $cantidad; ?> )</span> </strong>
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
                          <th scope="col">Descripcion</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">SubTotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
                            <td><?php echo $dataCliente['nombres']; ?></td>
                            <td><?php echo $dataCliente['apellidos']; ?></td>
                            <td><?php echo $dataCliente['carnet']; ?></td>
                            <td><?php echo $dataCliente['celular']; ?></td>
                            <td><?php echo $dataCliente['descripcion']; ?></td>
                            <td><?php echo $dataCliente['precio']; ?></td>
                            <td><?php echo $dataCliente['cantidad']; ?></td>
                            <td><?php echo $dataCliente['subtotal']; ?></td>
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

<?php include("../include/footer.php") ?>