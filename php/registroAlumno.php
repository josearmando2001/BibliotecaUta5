<?php
require_once("../bd/conexion.php");
$correo = filter_var($_POST["correo2"], FILTER_SANITIZE_EMAIL);
if (empty($correo)) {
    echo "<script>
alert('USED NO TIENE ACCESO DEBE INTRODUCIR LOS DATOS DE FORMA CORRECTA');
window.location = '../index.php';
</script>";
    exit;
}


//verificacion si esta inscrito a la iniversidad
$queryRegistro = $conex->query("SELECT * FROM registro WHERE preCorreo='$correo'");
$numberRegistro = $queryRegistro->num_rows;
if ($numberRegistro == 0) {
    echo "<script>
    alert('USTED NO ESTA INSCRITO EN LA UNIVERDIAD TECNOLÓGICA DE ACAPULCO, COMUNICARSE AL PLANTEL');
    window.location = '../index.php';
    </script>";
} else if ($numberRegistro == 1) {
    //verificacion si el correo ya esta registrado como usario
    $usuario = $conex->query("SELECT * from usuario where correo='$correo'");
    if ($usuario->num_rows == 0) {
?>
<!doctype html>
<html lang="en">
<!-- <style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

   * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
   }
</style> -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/validarlogin.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Registro Alumno</title>
    <link rel="shortcut icon" href="../img/uta.png">
</head>

<body style="background: linear-gradient(to right, #5DADE2, #D7DBDD);"><br>
    <?php
            while ($rows = $queryRegistro->fetch_assoc()) {
                $preNombre = $rows["preNombre"];
                $preCorreo = $rows["preCorreo"];
            }
            ?>
    <center>
        <h2 class="title">Crear Cuenta</h2>
        <p>Ingresa la siguiente información para registrarte.</p>
    </center>
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-sm-6 col-md-6" style="margin-top:1%;">
                <form action="#" method="post" id="formRegistro">

                    <div class="mb-3">
                        <label class="font-weight-bold"><b>Nombre </b><span class="text-danger">*</span></label>
                        <p class="form-control"><?php echo $preNombre ?></p>
                        <input type="hidden" id="nombre" value="<?php echo $preNombre ?>" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold"><b>Correo</b><span class="text-danger">*</span></label>
                        <p class="form-control"> <?php echo $preCorreo ?> </p>
                        <input type="hidden" value="<?php echo $preCorreo ?>" id="correo" name="correo" required>
                    </div>
                    <div class="formulario__grupo" id="grupo__password">
                        <label class="formulario__label font-weight-bold">Contraseña <span
                                class="text-danger">*</span></label>
                        <div class="formulario__grupo-input">
                            <input type="password" class="formulario__input form-control" id="password" name="password" placeholder="Escriba una contraseña" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">La longitud debe ser entre 6 a 12 caracteres.</p>
                    </div>
                    <div class="formulario__grupo" id="grupo__password2">
                        <label class="formulario__label font-weight-bold">Contraseña <span
                                class="text-danger">*</span></label>
                        <div class="formulario__grupo-input">
                            <input type="password" class="formulario__input form-control" id="password2" name="password2" placeholder="Escriba una contraseña" required>
                            <input type="hidden" name="Tipo" id="Tipo" value="2">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">La longitud debe ser entre 6 a 12 caracteres.</p><br>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="font-weight-bold"><b>Contraseña</b><span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Escriba una contraseña" required>
                    </div> -->
                    <!-- <div class="mb-3">
                        <label class="font-weight-bold"><b>Confirmar Contraseña</b><span class="text-danger">*</span></label>
                        <input type="password" id="password2" name="password2" class="form-control"
                            placeholder="Vuelva a escribir la contraseña" required>
                        <input type="hidden" name="Tipo" id="Tipo" value="2"><br>
                    </div> -->
                    <div class=" mb-3 form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check" required>
                        <label class="form-check-label">
                            Al seleccionar esta casilla aceptas nuestro
                            aviso de privacidad y los términos y condiciones
                        </label>
                    </div>
                    <center><button class="btn btn-primary width-100" id="registrousu">Registrar</button>
                    </center>
                    <br>
                </form>
                <center>
                    <small>Todos los derechos reservados | © 2021 UTA</small>
                </center>

            </div>
        </div>
    </div>
    <script src="../js/funcionesRegistro.js"></script>
    <script src="../js/registroAlumnos.js"></script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
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
    alert('EXISTIÓ UN ERROR AL EVALUAR LA PETICIÓN');
    window.location = '../index.php';
    </script>";
}
?>