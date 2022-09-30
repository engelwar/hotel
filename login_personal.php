<?php 
    include('config.php');

    session_start();

    if ($_POST){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = ("SELECT codigo, nombres, apellidos, carnet, celular, direccion, correo, contraseña, nacionalidad, cargo FROM personal WHERE correo = '".$email."' ");

        $resultado = mysqli_query($con, $sql);
        $num = $resultado->num_rows;

        if ($num > 0){
            $row = $resultado->fetch_assoc();
            $password_bd = $row['contraseña'];

            // $pass_c = sha1($password);

            if ($password_bd == $password){
                $_SESSION['id'] = $row['codigo'];
                $_SESSION['nombres'] = $row['nombres'];
                $_SESSION['rol'] = $row['cargo'];
                $_SESSION['ci'] = $row['carnet'];

                header('Location: index.php');
            }else{
                echo 'No Coincide la Contraseña';
            }
        }else{
            echo 'No Existe';
        }
    }

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
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
</head>

<body>

    <div class="cargando">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>

    <div class="jumbotron mb-0 d-flex align-items-center" style="height: 100vh;">
        <div class="container w-50 bg-white p-5">
            <h1 class="text-secondary text-center mb-4">Iniciar Sesion - Personal</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
                <a href="Personal/registrarPersonal.php">Registrar Personal</a>
            </form>
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

            //Ocultar mensaje
            setTimeout(function() {
                $("#contenMsjs").fadeOut(1000);
            }, 3000);



            $('.btnBorrar').click(function(e) {
                e.preventDefault();
                var id = $(this).attr("id");

                var dataString = 'id=' + id;
                url = "recib_Delete.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    success: function(data) {
                        window.location.href = "index.php";
                        $('#respuesta').html(data);
                    }
                });
                return false;

            });
        });
    </script>
</body>

</html>