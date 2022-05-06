<?php
require_once("conexion.php");
$eliminarTipo = filter_var(file_get_contents("php://input"),FILTER_SANITIZE_NUMBER_INT);
if (empty($eliminarTipo)) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
$eliminar=$conex->query("DELETE FROM tipo WHERE Id_Tipo='$eliminarTipo'");
if($eliminar){
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