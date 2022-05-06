<?php
$cerrar = filter_var(file_get_contents("php://input"), FILTER_SANITIZE_NUMBER_INT);
if (isset($cerrar)) {
    session_start();
    if (isset($_SESSION['usuario'])) {
        $nombre = $_SESSION['usuario']['nombre'];
        session_destroy();
        $respuesta = array(
            "id" => "$cerrar",
            "nombre" => "$nombre",
            "sesion" => "cerrada"
        );
    } else {
        $respuesta = array(
            "sesion" => "noexiste"
        );
    }

    echo json_encode($respuesta);
}
