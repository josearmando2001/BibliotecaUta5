<?php
require_once '../vendor/autoload.php';
require_once '../config.php';
require_once("../bd/conexion.php");
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  $namef =  $google_account_info->family_name;
  $pict =  $google_account_info->picture;
   $obed = array(
       "correo"=>"$email",
       "name"=>"$name",
       "namef"=>"$namef",
       "pict"=>"$pict"
   );
   $usuario = $conex->query("SELECT * from usuario where correo='$email'");
   //hacemo un arreglo asociativo con los dats que sean del correo 
   if ($usuario->num_rows == 1) {
     $datos = $usuario->fetch_assoc();
     session_start();
     $_SESSION['usuario'] = $datos;
     header("Location:../admin/index.php");
     die();
   }else if($usuario->num_rows == 2){
    $datos = $usuario->fetch_assoc();
    session_start();
    $_SESSION['usuario'] = $datos;
       header("Location:../php/index.php");
        die();
   }else{
    echo '<script>
    alert("no tienes acceso");
    window.location="../index.php";
    </script>';
   }
}else{
  echo '<script>
       alert("no tienes acceso");
       window.location="../index.php";
       </script>';
}
?>

