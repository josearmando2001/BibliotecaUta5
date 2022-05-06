<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'figologa@gmail.com';                     //SMTP username
    $mail->Password   = '14ObedLoga99';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('figologa@gmail.com', 'Biblioteca Universidad Tecnologica De Acapulco');
    $mail->addAddress('juarezaraujo.pedrojesus@utacapulco.edu.mx', 'Pedro Jesus Juarez Araujo');     //Add a recipient
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Validacion Al Enviar Correos';
    $mail->Body    = '<p>Visualziacion del funcionamiento para el cambio de contraseña</p> <br> <a href="https://www.xvideos.com/video30217107/anal_con_mi_cunada">Verificacion de funcion</a>';
    $mail->send();
    echo 'El mensaje se envio';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>