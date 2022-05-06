<?php
require_once("conexion.php");
$categoria = mysqli_real_escape_string($conex, filter_var($_POST["selec"], FILTER_SANITIZE_NUMBER_INT));
$Subcategoria = mysqli_real_escape_string($conex, filter_var(ucwords($_POST["subcategoria"]), FILTER_SANITIZE_STRING));
if (empty($Subcategoria)) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}

if($categoria == 0){
    $respuestra = array(
        "respuesta"=> "vaciocat"
    ); 
}else{
    $consulta = $conex->query("SELECT * FROM subcategoria WHERE nombre ='$Subcategoria'");
    if ($consulta->num_rows == 0) {
        try {
            $stmt = $conex->prepare("INSERT INTO subcategoria(Id_Categoria,nombre) value (?,?)");
            $stmt->bind_param("is", $categoria ,$Subcategoria);
            $stmt->execute();
            if ($stmt->affected_rows == 1) {
                $respuestra = array(
                    "respuesta"=> "correcto",
                    "NombreCategoria"=>"$Subcategoria"
                ); 
            } else {
                $respuestra = array(
                    "respuesta"=> "error",
                    "NombreCategoria"=>"$Subcategoria"
                ); 
            }
            $stmt->close();
            $conex->close();
        } catch (Exception $e) {
            $respuestra= array ($e->getMessage());
        }
    } else {
        $respuestra = array(
            "respuesta"=> "existe",
            "NombreCategoria"=>"$Subcategoria"
        ); 
    }
}
echo json_encode($respuestra);
?>