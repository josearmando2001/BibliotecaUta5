<?php
session_start();
if(isset($_SESSION['usuario'])){
    if($_SESSION['usuario']['Id_Tipo']==1){
      
    }else if($_SESSION['usuario']['Id_Tipo']==2){
        header("Location: ../php/index.php");
    }
  }else{
    echo '<script>
        alert("Usted no tiene acceso al contenido");
        window.location="../index.php";
        </script>';
    die();
  }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Registrar Usuario</title>
    <link rel="shortcut icon" href="../img/uta.png">
</head>
<header>
    <?php require_once("navResto.php");
    require_once("../bd/conexion.php") ?>
</header>


<body style="background: linear-gradient(to right, #5DADE2, #D7DBDD);"><br>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecciona Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    include("listarUsuarios.php");
                    if (!empty($_GET["Id_User"])) {
                        $lisId = $_GET["Id_User"];
                        $Lista = $conex->query("SELECT * FROM registro WHERE Id_Registro = '$lisId'");
                        while ($dau = $Lista->fetch_assoc()) {
                            $correoUsu = $dau["preCorreo"];
                            $nomUsu = $dau["preNombre"];
                            $idUsu = $dau["Id_Registro"];
                        }
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-sm-6 col-md-6" style="margin-top:1%;">
                <center>
                    <h2 class="title">Crear Cuenta</h2>
                    <p>Ingresa la siguiente información para registrarte.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Usuarios
                    </button>
                </center>
                <form action="#" method="post" id="formRegistro">
                    <?php if (!empty($_GET["Id_User"])) { ?>
                    <div class="mb-3">
                        <label class="font-weight-bold"><b>Correo</b><span class="text-danger">*</span></label>
                        <p class="form-control"> <?php echo $correoUsu ?> </p>
                        <input type="hidden" value="<?php echo $correoUsu ?>" id="correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold"><b>Nombre</b><span class="text-danger">*</span></label>
                        <p class="form-control"><?php echo $nomUsu ?></p>
                        <input type="hidden" id="nombre" value="<?php echo $nomUsu ?>" name="nombre">
                    </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label class="font-weight-bold"><b>Categoría</b><span class="text-danger">*</span></label><br>
                        <!-- Lista de opciones -->
                        <select id="items" name="Tipo" class="form-control" required>
                            <?php
                            $opcionesCategoria = $conex->query("SELECT * FROM tipo");
                            while ($rows = $opcionesCategoria->fetch_assoc()) { ?>
                            <option value="<?php echo $rows["Id_Tipo"] ?>">
                                <?php echo $rows["nombre"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="font-weight-bold"><b>Contraseña</b><span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Escriba una contraseña" required>
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold"><b>Confirmar Contraseña</b><span
                                class="text-danger">*</span></label>
                        <input type="password" id="password2" name="password2" class="form-control"
                            placeholder="Vuelva a escribir la contraseña" required>
                    </div>
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
            </div>
        </div>
        <center>
            <small>Todos los derechos reservados | © 2021 UTA</small>
        </center>
    </div>
    <script src="../js/funcionesRegistro.js"></script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
</body>

</html>