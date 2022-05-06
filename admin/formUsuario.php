<?php
require_once("../bd/conexion.php");
$correo = filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);
//Verificcacion si campo esta completo
if (empty($correo)) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
}
//verificacion si esta inscrito a la iniversidad
$queryRegistro = $conex->query("SELECT * FROM registro WHERE preCorreo='$correo'");
$numberRegistro = $queryRegistro->num_rows;
if ($numberRegistro == 0) {
    echo "<script>
    alert('USTED NO ESTA INSCRITO EN LA UNIVERDIAD TECNOLOGICA DE ACAPULCO, COMUNICARSE AL PLANTEL');
    window.location = '../index.php';
    </script>";
} else if ($numberRegistro == 1) {
    //verificacion si el correo ya esta registrado como usario
    $usuario = $conex->query("SELECT * from usuario where correo='$correo'");
    if ($usuario->num_rows == 0) {
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <title>Registro</title>
</head>

<body>
    <section class="contact-box">
        <div class="row no-gutters bg-dark">
            <div class="col-xl-5 col-lg-12 register-bg">
                <div class="position-absolute testiomonial p-4">
                    <center>
                        <h3 class="font-weight-bold text-light">Biblioteca de la Universidad Tecnológica de Acapulco.
                        </h3>
                        <p class="lead text-light">Registrate para ver nuestro catálago de libros.</p>
                    </center>
                </div>
            </div>
            <div class="col-xl-7 col-lg-12 d-flex">
                <div class="container align-self-center p-6">
                    <center>
                        <h1 class="">Crea tu cuenta</h1>

                        <p class="font-weight-bold mb-3">Ingresa la siguiente información para registrarte.</p>
                    </center>
                    <?php
                            while ($rows = $queryRegistro->fetch_assoc()) {
                                $preNombre = $rows["preNombre"];
                                $preCorreo = $rows["preCorreo"];
                            }
                            ?>
                    <form action="../bd/inscritoUta.php" method="post">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nombre de Usuario: <br> <span
                                    class="text-danger"><?php echo $preNombre ?></span></label>
                            <input type="hidden" name="nombre" value="<?php echo $preNombre ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Correo electrónico: <br> <span
                                    class="text-danger"><?php echo $preCorreo ?> </span></label>
                            <input type="hidden" name="correo" value="<?php echo $preCorreo ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Tipo <span class="text-danger">*</span></label><br>
                            <select name="Tipo" id="">
                            <option selected>SELECCIONA UN TIPO</option>
                                <?php 
                            $opcionesCategoria=$conex->query("SELECT * FROM tipo");
                            while($rows=$opcionesCategoria->fetch_assoc()){?>
                                <option value="<?php echo $rows["Id_Tipo"] ?>"><?php echo $rows["nombre"] ?></option>
                                <?php } ?>
                        </div>
                        <br>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Ingresa una contraseña" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" name="password2" class="form-control"
                                placeholder="Vuelve a escribir la contraseña" required>
                        </div>
                        <div class="form-group mb-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label text-muted">Al seleccionar esta casilla aceptas nuestro
                                    aviso de privacidad y los términos y condiciones</label>
                            </div>
                        </div>
                        <center><button class="btn btn-primary width-100" name="registro">Regístrate</button></center>
                        <br>
                        <center><a class="btn btn-danger width-100" href="index.php">Iniciar Sesión</a></center>
                    </form>
                    <small class="d-inline-block text-muted mt-5">Todos los derechos reservados | © 2021 Loeza
                        Chavez</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
    } else {
        echo "<script>
        alert('USTED YA TIENE CUENTA DE USUARIO EN LA BIBLIOTECA');
        window.location = '../index.php';
        </script>";
    }
} else {
    echo "<script>
    alert('EXISTIO UN ERROR AL EVALUAR LA PETICIÓN');
    window.location = '../index.php';
    </script>";
}
?>