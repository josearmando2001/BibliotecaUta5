<?php
require_once("conexion.php");
$categoria =$conex->real_escape_string(filter_var(ucwords($_POST["categoria"]), FILTER_SANITIZE_STRING));
if (empty($categoria)) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
$consulta = $conex->query("SELECT * FROM categoria WHERE nombre_categoria='$categoria'");
if ($consulta->num_rows == 0) {
    try {
        $stmt = $conex->prepare("INSERT INTO categoria(nombre_categoria) value (?)");
        $stmt->bind_param("s", $categoria);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $respuestra = array(
                "respuesta"=> "correcto",
                "NombreCategoria"=>"$categoria"
            ); 
        }
        $stmt->close();
        $conex->close();
    } catch (Exception $e) {
        $respuestra= array ($e->getMessage());
    }
} else {
    $respuestra = array(
        "respuesta"=>"existe",
        "NombreCategoria"=>"$categoria"
    ); 
}
echo json_encode($respuestra);
?>