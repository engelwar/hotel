<?php include("../include/header.php") ?>

<div class="container w-50 mt-2 mb-3">
    <form name="form-data" action="recibCliente.php" method="POST">

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
                <input type="number" class="form-control" name="ci" required='true' autofocus>
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
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="num_referencia" class="form-label">Numero de referencia</label>
                <input type="number" class="form-control" name="num_referencia" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="tipo_sangre" class="form-label">Tipo de sangre</label>
                <input type="text" class="form-control" name="tipo_sangre" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="seguro_medico" class="form-label">Seguro medico</label>
                <input type="text" class="form-control" name="seguro_medico" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="profesion" class="form-label">Profesion</label>
                <input type="text" class="form-control" name="profesion" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <input type="text" class="form-control" name="nacionalidad" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="enfermedad_base" class="form-label">Enfermedad de base</label>
                <input type="text" class="form-control" name="enfermedad_base" required='true' autofocus>
            </div>
            <div class="col-md-12 mt-2">
                <label for="personal_referencia" class="form-label">Personal de referencia</label>
                <input type="text" class="form-control" name="personal_referencia" required='true' autofocus>
            </div>

        </div>
        <div class="row justify-content-start text-center mt-5">
            <div class="col-4">
                <button class="btn btn-primary btn-block" id="btnEnviar">
                    Registrar Paciente
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