<?php
session_start();
require_once("conexion.php");
$eliminarLib = filter_var(file_get_contents("php://input"),FILTER_SANITIZE_NUMBER_INT);
$existe=$conex->query("SELECT * FROM libro WHERE Id_Libro='$eliminarLib' ");
if (empty($eliminarLib)) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
while($rows = $existe->fetch_array()){
    $nombre= $rows["titulo"];
    $img = $rows["img"];
    $carpetaimg = '../docs/imagenes/';
    unlink($carpetaimg . $img);
    $pdf = $rows["pdf"];
    $carpetapdf = '../docs/pdf/';
    unlink($carpetapdf . $pdf);
}
$eliminar=$conex->query("DELETE FROM libro WHERE Id_Libro='$eliminarLib'");
if($eliminar){
    // include("funcioneseventos.php");
    // $eventoId = $_SESSION['usuario']['Id_Usuario'];
    // $eventoinf = $conex->query("SELECT * from usuario where Id_Usuario='$eventoId'");
    // while ($rowseve = $eventoinf->fetch_assoc()) {
    //     $correoeve = $rowseve['correo'];
    //     $nombreeve = $rowseve['nombre'];
    // }
    // // 1. Insertar 2.Actutualizar 3.Eliminar
    // inserteven($eventoId,$nombre,$nombreeve,$correoeve,3);
    $respuesta = array(
        "respuesta"=>"correcto"
    );
}else{
    $respuesta = array(
        "respuesta"=>"error"
    );
}

$conex->close();
echo json_encode($respuesta);
?>