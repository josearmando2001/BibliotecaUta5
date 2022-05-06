<?php
require_once("conexion.php");
$id = $conex->real_escape_string(filter_var($_POST["idSubcategoria"], FILTER_SANITIZE_NUMBER_INT));
$categoria = $conex->real_escape_string(filter_var($_POST["selecEdit"], FILTER_SANITIZE_NUMBER_INT));
$Subcategoria = $conex->real_escape_string(filter_var($_POST["edSubcatenomgoria"], FILTER_SANITIZE_STRING));
// $buscar=$conex->query("SELECT * FROM categoria LEFT JOIN subcategoria ON categoria.Id_Categoria = subcategoria.Id_Categoria WHERE nombre=''");
// if($buscar->num_rows == 0){}else{
//     $respueta = array(
//         "respuesta"=> "existe",
//         "nombre"=>"$Subcategoria"
//     );
// }
if (empty($categoria) && empty($id) && empty($Subcategoria)) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
if ($categoria == 0) {
    $respueta = array(
        "respuesta" => "vaciocat"
    );
} else {
    try {
        $stmt = $conex->prepare("UPDATE subcategoria SET Id_Categoria=?,nombre=?  WHERE Id_Subcategoria=?");
        $stmt->bind_param("isi", $categoria, $Subcategoria, $id);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $respueta = array(
                "respuesta" => "correcto",
                "nombre" => "$Subcategoria"
            );
        } else {
            $respueta = array(
                "respuesta" => "error",
                "nombre" => "$Subcategoria"
            );
        }
        $stmt->close();
        $conex->close();
    } catch (Exception $e) {
        $respueta = array(
            $e->getMessage()
        );
    };
}
echo json_encode($respueta);
