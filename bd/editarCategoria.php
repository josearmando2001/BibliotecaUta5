<?php
require_once("conexion.php");
$categoria = mysqli_real_escape_string($conex, filter_var(ucwords(strtolower($_POST["edcatenomgoria"])), FILTER_SANITIZE_STRING));
$id = mysqli_real_escape_string($conex, filter_var($_POST["idcategoria"], FILTER_SANITIZE_NUMBER_INT));
if (empty($categoria) && empty($id) ) {
    
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
$buscar = $conex->query("SELECT * FROM categoria WHERE nombre_categoria='$categoria'");
if ($buscar->num_rows == 0) {
    try {
        $stmt = $conex->prepare("UPDATE categoria SET nombre_categoria=? WHERE Id_Categoria=?");
        $stmt->bind_param("si", $categoria, $id);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $respueta = array(
                "respuesta" => "correcto",
                "nombre" => "$categoria"
            );
        } else {
            $respueta = array(
                "respuesta" => "error",
                "nombre" => "$categoria"
            );
        }
        $stmt->close();
        $conex->close();
    } catch (Exception $e) {
        $respueta = array(
            $e->getMessage()
        );
    };
} else {
    $respueta = array(
        "respuesta" => "existe",
        "nombre" => "$categoria"
    );
}
echo json_encode($respueta);
