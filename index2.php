<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="sweetalert/dist/sweetalert2.min.css">
  <!-- Bootstrap CSS -->
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link href="css/registro.css" rel="stylesheet">
  <link href="css/validarlogin.css" rel="stylesheet">
  <title>Biblioteca</title>
  <link rel="shortcut icon" href="img/uta.png">

<!-- HACIENDO LLAMAR API DE RECAPTCHA -->
<!-- 6LfYSfkeAAAAANbGBnUtw6LryMNZtkfqmgBQesrl-->
  <script src="https://www.google.com/recaptcha/api.js?6LfYSfkeAAAAANbGBnUtw6LryMNZtkfqmgBQesrl"></script>
<!-- HACIENDO LLAMAR API DE RECAPTCHA -->
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['Id_Tipo'] == 1) {
      header("Location: admin/index.php");
    } else if ($_SESSION['usuario']['Id_Tipo'] == 2) {
      header("Location: php/index.php");
    }
  } else {
  }
  ?>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

      <!-- ID PARA HACER LLAMAR EL RECAPCHAT-->
        <form method="post" action="#" id="iniciar" class="sign-in-form">
          <h2 class="title">Iniciar Sesión</h2>
          <p>Ingresa la siguiente información para iniciar sesión.</p>
          <!-- Correo 1 -->
          <div class="form-group mb-3 formulario__grupo" id="grupo__correo">
            <label class="formulario__label font-weight-bold ">Correo electrónico <span
                class="text-danger">*</span></label>
            <div class="formulario__grupo-input">
              <input type="email" class="form-control formulario__input" onkeyup="javascript:this.value=this.value.toLowerCase();" placeholder="Ingresa tu correo electrónico"
                id="correo" name="correo">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Incorrecto.</p>
          </div>
          <!-- Contraseña 1 -->
          <div class="form-group mb-3 formulario__grupo" id="grupo__password">
            <label class="font-weight-bold formulario__label">Contraseña <span class="text-danger">*</span></label>
            <div class="formulario__grupo-input">
              <input type="password" class="form-control formulario__input" placeholder="Ingresa tu contraseña"
                name="password" id="password">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Incorrecto.</p>
          </div><br>
        <!-- BOTON DE INICIAR SESION 6LfYSfkeAAAAAEa217w68PdCr-oc6JakLmg_56To-->
        <div class="g-recaptcha" data-sitekey="6LfYSfkeAAAAAEa217w68PdCr-oc6JakLmg_56To"></div>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
        <!-- PERFIL DONDE SE VE QUE NO ERES UN ROBOT-->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- PERFIL DONDE SE VE QUE NO ERES UN ROBOT-->
          <button type="button" id="entrar" name="submit" class="btn">Iniciar</button>

          <?php
          require_once 'vendor/autoload.php';
          require_once 'config.php';
          $client = new Google_Client();
          $client->setClientId($clientID);
          $client->setClientSecret($clientSecret);
          $client->setRedirectUri($redirectUri);
          $client->addScope("email");
          $client->addScope("profile");

          echo "<a class='google' href='" . $client->createAuthUrl() . "'>Google Login</a>";
          ?>
          <center>
            <!-- <p class="1"><b><i>Sistema desarrollado por:</i></b><br>
              Obed Loeza Garduño <b>(Desarrollador)</b><br>
              Jose Armando Chavez Ayona <b>(Diseñador)</b><br>
            </p> -->
          </center>
        </form>

        <form action="php/registroAlumno.php" id="iniciar2" method="post" class="sign-up-form">
          <h2 class="title">Crea tu cuenta</h2>
          <p>Ingresa la siguiente información para registrarte.</p>
          <!-- Correo 2 -->
          <div class="form-group mb-3 formulario__grupo" id="grupo__correo2">
            <label class="formulario__label font-weight-bold ">Correo electrónico <span
                class="text-danger">*</span></label>
            <div class="formulario__grupo-input">
              <input type="email" class="form-control formulario__input" onkeyup="javascript:this.value=this.value.toLowerCase();" placeholder="Ingresa tu correo electrónico"
                id="correo2" name="correo2" required>
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Incorrecto.</p>
          </div>
          <center>
            <div class="">
              <input class="" type="checkbox" required>
              <label class="form-check-label text-muted">Al seleccionar esta casilla aceptas nuestro aviso de privacidad
                y los términos y condiciones</label>
            </div>
          </center><br>

          <button type="submit" class="btn">Registrar</button>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Biblioteca de la Universidad Tecnológica de Acapulco</h3>
          <p>Registrate para ver nuestro catálogo de libros.</p>
          <a href="cambiocontra/contrasena.php" class="btn transparent2" style="text-decoration:none;color:#fff;">¿Olvidaste tu contraseña?</a>
          <button class="btn transparent" id="sign-up-btn">
            Regístrate
          </button>
        </div>
        <img src="img/uta.png" class="image" whidth="30%" height="30%" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Biblioteca de la Universidad Tecnológica de Acapulco</h3>
          <p>Descubre la variedad de libros que tenemos.</p>
          <button class="btn transparent" id="sign-in-btn">Iniciar Sesión</button>
        </div>
        <img src="img/uta.png" class="image" whidth="30%" height="30%" />
      </div>
    </div>
  </div>

  <script src="js/login2.js"></script>
  <script src="sweetalert/dist/sweetalert2.all.min.js"></script>
  <script src="js/iniciar.js"></script>
  <script src="js/registro.js"></script>
</body>
</html>
<script>
</script>