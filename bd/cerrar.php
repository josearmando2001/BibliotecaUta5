<head>
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <title>Cerrar Sesión</title>
    <link rel="shortcut icon" href="../img/uta.png">

</head>
<?php
require_once("funciones.php");
session_start();
session_destroy();
error_reporting(0);
$existe = $_SESSION['usuario'];
if ($existe == null || $existe = '') {
    // window.location diregue al lugar deseado
    echo '<script>
    alert("Usted no tiene acceso al contenido");
    window.location = "../index.php"; 
    </script>';
    die();
}
$nombre = $_SESSION['usuario']['nombre'];
notificacionComun("success", "$nombre", "SU SESIÓN FUE CERRADA, INICIE SESIÓN NUEVAMENTE PARA PODER REALIZAR NUEVOS CAMBIOS", "../index.php");
?>
<script src="../sweetalert/dist/sweetalert2.all.min.js"></script>