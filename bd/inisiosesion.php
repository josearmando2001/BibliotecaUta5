<?php
include("conexion.php");
$correo = $conex->real_escape_string(filter_var(mb_strtolower($_POST["correo"]), FILTER_SANITIZE_EMAIL));
$password =$conex->real_escape_string(filter_var($_POST["password"], FILTER_SANITIZE_STRING));
if (empty($correo) && empty($password)) {
  echo "<script>
  alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
  window.location = '../index.php';
  </script>";
  die();
}
$usuario = $conex->query("SELECT * from usuario where correo='$correo'");
//hacemo un arreglo asociativo con los dats que sean del correo 
if ($usuario->num_rows == 1) {
  $datos = $usuario->fetch_assoc();
}
$query =$conex->query("SELECT * from usuario where correo='$correo'");
#se crea una variable con el numero de filas para arrogar que existe el usuario
if ($query->num_rows > 0) {
#se recorre la solicitud a los datoa del usuario obteniendo contraseña, nombre,Id del tipo, Id del usuario
while ($rows = $query->fetch_assoc()) {
    $contr = $rows['pass'];
    $diri = $rows['Id_Tipo'];
    $nobreU = $rows["nombre"];
    $solinoti = $rows['Id_Usuario'];
  }
  #Se crea el nombre para la cookie que bloqueare el proceso de sesion
  $bloquear = str_replace(' ', '', $nobreU);
  #bloqueado por 1 min
  if (isset($_COOKIE["block" . $bloquear])) {
    $respuesta = array(
        "respuesta" => "bloquenoti",
        "titulo" => "TU CUENTA SE A BLOQUEADO DURANTE 1 MIN",
        "cuerpo" => "$correo INICIA SESIÓN DESPUES DE 1 MIN",
        "alerta" => "warning"
     );
}else{
    if (password_verify($password, $contr)) {
      session_start();
      $_SESSION['usuario'] = $datos;
      #Datos Sin pedidos
        $respuesta = array(
            "respuesta" => "contraBien",
            "titulo" => "$nobreU",
            "cuerpo" => "BIENVENIDO PUEDES VISUALIZAR ENTRE LA GRAN VARIEDAD DE LIBROS DISPONIBLES",
            "direccion" => "$diri",
            "alerta" => "succsses"
        );
    } else {
        $respuesta = array(
            "respuesta" => "contraMal",
            "titulo" => "$nobreU",
            "cuerpo" => "LA CONTRASEÑA ES INCORRECTA, PARA PODER INCIAR SESIÓN INTRODUCE TU CONTRASEÑA",
            "alerta" => "question"
         );
     if (isset($_COOKIE["$bloquear"])) {
      $cont = $_COOKIE["$bloquear"];
      $cont++;
      setcookie($bloquear, $cont, time() + 120);
      if ($cont >= 3) {
        setcookie("block" . $bloquear, $cont, time() + 60);
        $respuesta = array(
            "respuesta" => "bloqueo",
            "titulo" => "HAS FALLADO 3 INTENTOS DE CONTRASEÑA ",
            "cuerpo" => "$correo TU CUENTA SE BLOQUEARA DURANTE 1 MIN",
            "alerta" => "warning"
         );
        }
    } else {
      setcookie($bloquear, 1, time() + 120);
    }
    }
  }
}else {
  $correom = strtoupper($correo);
  $respuesta = array(
    "respuesta" => "NoExiste",
    "titulo" => "LO SENTIMOS USTED DEBE REGISTRARSE",
    "cuerpo" => "$correo NO EXISTE",
    "alerta" => "error"
);

}
$conex->close();
echo json_encode($respuesta);


//  se obtiene la fecha actual de la sona mexico
//   date_default_timezone_set("America/Mexico_City");
//   $fecha_Actual = date("Y-m-d");