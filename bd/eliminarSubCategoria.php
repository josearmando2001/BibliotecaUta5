<?php
require_once("conexion.php");
$eliminarCat = filter_var(file_get_contents("php://input"),FILTER_SANITIZE_NUMBER_INT);
if (empty($eliminarCat)) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
$buscar=$conex->query("SELECT * FROM subcategoria WHERE Id_Subcategoria='$eliminarCat'");
while($row = $buscar->fetch_assoc()){ $dato =$row["nombre"];};
$eliminar=$conex->query("DELETE FROM subcategoria WHERE Id_Subcategoria='$eliminarCat'");
if($eliminar){
    $respuesta = array(
        "respuesta"=>"correcto",
        "iforma"=>"$dato"
    );
}else{
    $respuesta = array(
        "respuesta"=>"error",
        "iforma"=>"$dato"
    );
}

$conex->close();

echo json_encode($respuesta);

?>