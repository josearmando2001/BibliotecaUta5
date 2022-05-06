<?php
require_once("conexion.php");
$nombre = filter_var(ucwords(strtolower($_POST["nombre"])), FILTER_SANITIZE_STRING);
$correo = filter_var(mb_strtolower($_POST["correo"]), FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
$password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
$tipo = filter_var($_POST["Tipo"], FILTER_SANITIZE_NUMBER_INT);
//verificacion Si un post esta vacio
if (empty($correo) || empty($nombre) || empty($password) || empty($password2) || empty($tipo)) {
  echo "<script>
alert('USTED NO TIENE ACCESO DEBE LLENAR EL FORMULARIO PARA LOGRAR ACCEDER');
window.location = '../index.php';
</script>";
  exit;
}
//verificacion de correo esta registrado
$verificacionCorreo = $conex->query("SELECT * from usuario where correo='$correo'");
if ($verificacionCorreo->num_rows >= 1) {
  $respuesta = array(
    "respuesta" => "existe",
    "tipo" => "$nombre"
  );
} else {
  //vrificacion si las contraseñas coinciden
  if ($password === $password2) {
    //incriptar contraseña
    $incriptaPass = password_hash($password, PASSWORD_BCRYPT);
    /*
  //FECHA ACTUAL
  date_default_timezone_set("America/Mexico_City");
  $fecha_Actual = date("Y-m-d");
  //INSERTAR
 */
    $insertar = $conex->query("INSERT INTO usuario (Id_Tipo,nombre,correo,pass) VALUES ('$tipo','$nombre','$correo','$incriptaPass')");
    if ($insertar) {
      $respuesta = array(
        "respuesta" => "correcto",
        "tipo" => "$nombre"
      );
    } else {
      //error al registrar usuario
      $respuesta = array(
        "respuesta" => "error",
        "tipo" => "$nombre"
      );
    }
  } else {
    $respuesta = array(
      "respuesta" => "errorpas",
      "tipo" => "$nombre"
    );
  }
}
echo json_encode($respuesta);
$conex->close();
