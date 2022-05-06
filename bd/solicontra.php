<?php
require("conexion.php");
$correo = $conex->real_escape_string(filter_var(mb_strtolower($_POST["correo"]), FILTER_SANITIZE_EMAIL));
if (empty($correo)) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require("conexion.php");
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$query = $conex->query("SELECT * from usuario where correo='$correo'");
if ($query->num_rows >= 1) {
    // $token = md5(uniqid(rand(), true));
    // if (!isset($_COOKIE["contratime"])) {
    //     setcookie("contratime", $token, time() + 60);
    // }
    //Create an instance; passing `true` enables exceptions
    while ($row = $query->fetch_assoc()) {
        $id_bd = $row["Id_Usuario"];
        $nombre_bd = $row["nombre"];
    }
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tucorreo_personal@gmail.com';                     //SMTP username
        $mail->Password   = 'tucontraseña';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        // informacion de servidor 
        date_default_timezone_set("America/Mexico_City");
        $fecha_Actual = date("Y-m-d G:i:s");
        $servidor = $_SERVER["SERVER_NAME"];
        $token = md5(uniqid(rand(), true));
        $url = "https://$servidor/dashboard/bibliotecaUta5/cambiocontra/nuevacontra.php?id_user=$id_bd&&token=$token";
        //Recipients
        $mail->setFrom('tucorreo_personal@gmail.com', 'Biblioteca Universidad Tecnologica De Acapulco');
        $mail->addAddress($correo, $nombre_bd);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Validacion Al Enviar Correos';
        $mail->Body    = '<p>Visualziacion del funcionamiento para el cambio de contraseña</p> <br> <a href="'.$url.'">Verificacion de funcion</a>';
        $mail->send();
        //respuestas
        $conex->query("INSERT INTO cambcontra(Id_Estadoctr,Id_Usuario,correoctr,fecha,token)  VALUES (1,'$id_bd','$correo','$fecha_Actual','$token')");
        $respuesta = array(
            "respuesta" => "correcto",
            "nombre" => "$nombre_bd",
            "url" => "$url",
            "mensaje" => "$correo",
        );
    } catch (Exception $e) {
        $respuesta = array(
            "respuesta" => "errorcorreo",
            "mensaje" => "$mail->ErrorInfo",
        );
    }
} else {
    $respuesta = array(
        "respuesta" => "error",
    );
}
echo json_encode($respuesta);
$conex->close();
