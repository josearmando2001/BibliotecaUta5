<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
  <!-- Bootstrap CSS -->
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link href="../css/registro.css" rel="stylesheet">
  <link href="../css/validarlogin.css" rel="stylesheet">
  <title>Biblioteca</title>
  <link rel="shortcut icon" href="../img/uta.png">

</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['Id_Tipo'] == 1) {
      header("Location: ../admin/index.php");
    } else if ($_SESSION['usuario']['Id_Tipo'] == 2) {
      header("Location: ../php/index.php");
    }
  } else {
  }
  ?>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <!-- form1 solicitud -->
        <form action="#" id="formsolicitud" method="POST" class="sign-in-form">
          <h2 class="title">Recuperación de contraseña</h2>
          <p>Ingresa la siguiente información para iniciar sesión.</p><br>
          <!-- Correo 1 -->
          <div class="form-group mb-3 formulario__grupo" id="grupo__correo">
            <label class="formulario__label font-weight-bold ">Correo electrónico <span
                class="text-danger">*</span></label>
            <div class="formulario__grupo-input">
              <input type="email" class="form-control formulario__input"
                onkeyup="javascript:this.value=this.value.toLowerCase();" placeholder="Ingresa tu correo electrónico"
                id="correo" name="correo">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Incorrecto.</p>
          </div><br>
          <center>
            <div class="">
              <input class="" type="checkbox" id="terminsoli" required>
              <label class="form-check-label text-muted">Al seleccionar esta casilla aceptas nuestro aviso de privacidad
                y los términos y condiciones</label>
            </div>
          </center><br>
          <input type="submit" id="conbioctr" class="btn" value="Validar Correo">

        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Biblioteca de la Universidad Tecnológica de Acapulco</h3>
          <p>Registrate para ver nuestro catálogo de libros.</p>
        </div>
        <img src="../img/uta.png" class="image" whidth="30%" height="30%" />
      </div>
    </div>
  </div>
  <script src="../js/cambiocontra.js"></script>
  <script src="../js/contrasena.js"></script>
  <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
</body>

</html>