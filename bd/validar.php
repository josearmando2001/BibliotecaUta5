<head>
  <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
</head>
<?php
#Activar la elinicion de errores por variables
#error_reporting(0);
session_start();
include("conexion.php");
require_once("funciones.php");
$correo = filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
$usuario = $conex->query("SELECT * from usuario where correo='$correo'");
//hacemo un arreglo asociativo con los dats que sean del correo 
if ($usuario->num_rows == 1) {
  $datos = $usuario->fetch_assoc();
}
$consulta = "SELECT * from usuario where correo='$correo'";
$query = mysqli_query($conex, $consulta);
#se crea una variable con el numero de filas para arrogar que existe el usuario
$existe = mysqli_num_rows($query);
if ($existe > 0) {
  #se recorre la solicitud a los datoa del usuario obteniendo contraseña, nombre,Id del tipo, Id del usuario
  while ($rows = mysqli_fetch_assoc($query)) {
    $contr = $rows['pass'];
    $diri = $rows['Id_Tipo'];
    $nobreU = $rows["nombre"];
    $solinoti = $rows['Id_Usuario'];
  }
  #se obtiene la fecha actual de la sona mexico
  date_default_timezone_set("America/Mexico_City");
  $fecha_Actual = date("Y-m-d");
  #Se crea el nombre para la cookie que bloqueare el proceso de sesion
  $bloquear = str_replace(' ', '', $nobreU);
  #bloqueado por 1 min
  if (isset($_COOKIE["block" . $bloquear])) {
    notificacionComun("warning", "TU CUENTA SE A BLOQUEADO DURANTE 1 MIN", "$correo INICIA SESION DESPUES DE 1 MIN", "../index.php");
  }else{
    if (password_verify($password, $contr)) {
      $_SESSION['usuario'] = $datos;
      #Datos Sin pedidos
      notifiDobleDireccion("$nobreU", "BIENVENIDO PUEDES VISUALIZAR ENTRE LA GRAN VARIEDAD DE LIBROS DISPONIBLES", "$diri", "../admin/index.php", "../php/index.php");
    } else {
     notificacionComun("error", "$nobreU", "LA CONTRASEÑA ES INCORRECTA PARA PODER INICIAR SESIÓN INTRODUCE TU CONTRASEÑA", "../index.php");
     if (isset($_COOKIE["$bloquear"])) {
      $cont = $_COOKIE["$bloquear"];
      $cont++;
      setcookie($bloquear, $cont, time() + 120);
      if ($cont >= 3) {
        setcookie("block" . $bloquear, $cont, time() + 60);
        notificacionComun("warning", "HAS FALLADO 3 INTENTOS DE CONTRASEÑA ", "$correo TU CUENTA SE BLOQUEARA DURANTE 1 MIN", "../index.php");
      }
    } else {
      setcookie($bloquear, 1, time() + 120);
    }
    }
  }
} else {
  $correom = strtoupper($correo);
  notificacionComun("question", "LO SENTIMOS USTED DEBE REGISTRARSE", "$correom", "../index.php");
}
?>
<script src="../sweetalert/dist/sweetalert2.all.min.js"></script>