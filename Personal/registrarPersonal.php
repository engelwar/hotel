<?php include("../include/header.php") ?>

<div class="container w-50 mt-2 mb-3">
    <form name="form-data" action="recibPersonal.php" method="POST">
    
        <div class="row">
            <div class="col-md-12">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" name="nombres" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="ci" class="form-label">Carnet de Identidad</label>
                <input type="number" class="form-control" name="ci" required='true'>
            </div>
            <div class="col-md-12 mt-2">
                <label for="fecha_nacimiento" class="form-label">Fecha nacimiento</label>
                <input type="date" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" step="1" autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="direccion" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="number" class="form-control" name="telefono" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" class="form-control" name="cargo" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="especialidad" class="form-label">Especialidad</label>
                <input type="text" class="form-control" name="especialidad" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="turno" class="form-label">Turno</label>
                <input type="text" class="form-control" name="turno" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" name="nacionalidad" required='true' autofocus>
            </div>
        </div>
        <div class="row justify-content-start text-center mt-5">
            <div class="col-2">
                <button class="btn btn-primary btn-block" id="btnEnviar">
                    Registrar Personal
                </button>
            </div>
            <div class="col-2">
                <a href="index.php" class="btn btn-danger btn-block">
                    Cancelar
                </a>
            </div>
        </div>
    </form>
</div>

<?php include("../include/footer.php") ?>