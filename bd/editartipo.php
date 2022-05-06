<?php
require_once("conexion.php");
$tipo = $conex->real_escape_string(filter_var($_POST["editartiponame"], FILTER_SANITIZE_STRING));
$id = $conex->real_escape_string(filter_var($_POST["idTipo"], FILTER_SANITIZE_NUMBER_INT));
if (empty($tipo) && empty($id)) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
$buscar = $conex->query("SELECT * FROM tipo WHERE nombre='$tipo'");
if ($buscar->num_rows == 0) {
    try {
        $stmt = $conex->prepare("UPDATE tipo SET nombre=? WHERE Id_Tipo=?");
        $stmt->bind_param("si", $tipo, $id);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $respueta = array(
                "respuesta" => "correcto",
                "nombre" => "$tipo"
            );
        }
        $conex->close();
        $stmt->close();
    } catch (Exception $e) {
        $respueta = array(
            "respuesta" => "error",
            "Error" => $e->getMessage()
        );
    };
} else {
    $respueta = array(
        "respuesta" => "existe",
        "nombre" => "$tipo"
    );
}
echo json_encode($respueta);
