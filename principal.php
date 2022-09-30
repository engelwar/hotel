<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/cargando.css">
</head>

<body>

    <div class="cargando">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>

    <div class="jumbotron mb-0 d-flex align-items-center" style="height: 100vh">
        <div class="container text-center w-50 bg-white p-5">
            <a href="login_cliente.php" class="btn btn-danger mb-5">Iniciar Sesion - Cliente</a>
            <br>
            <a href="login_personal.php" class="btn btn-danger">Iniciar Sesion - Personal</a>
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