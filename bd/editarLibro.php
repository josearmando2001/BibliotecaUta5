<?php
require_once("conexion.php");
$categoria = mysqli_real_escape_string($conex, $_POST["categoria"]);
$idLibro = mysqli_real_escape_string($conex,$_POST["idLibro"]); 
$eventoId = mysqli_real_escape_string($conex,$_POST["eventoId"]); 
$nombre = mysqli_real_escape_string($conex, ucwords($_POST["nombreLibro"]));
$autor = mysqli_real_escape_string($conex, ucwords($_POST["autor"]));
$editorial =  mysqli_real_escape_string($conex, ucwords($_POST["editorial"]));
$paginas = mysqli_real_escape_string($conex, $_POST["numeroPaginas"]);
$descripcion = mysqli_real_escape_string($conex, $_POST["descripcion"]);
$ano = mysqli_real_escape_string($conex, $_POST["Publicacion"]);
$editImg = mysqli_real_escape_string($conex, $_POST["nombreImg"]);
$editPdf = mysqli_real_escape_string($conex, $_POST["nombrepdf"]);
$img = $_FILES["imgPortada"];
$doc = $_FILES["pdf"];

if (empty($categoria) && empty($nombre) && empty($autor) && empty($editorial) && empty($paginas) && empty($descripcion)) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
if ($categoria == 0) {
    $respuesta = array(
        "respuesta" => "catvacio",
    );
} else {
    #verificacion de la carpeta existe
    $carpetaImg = '../docs/imagenes/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetaImg)) {
        mkdir($carpetaImg);
    }
    if ($img["name"]) {
        unlink($carpetaImg . $editImg);
        // crear nombre de la imagen 
        $nombreImg = md5(uniqid(rand(), true)) . ".jpg";
        move_uploaded_file($img["tmp_name"], $carpetaImg . $nombreImg);
    } else {
        $nombreImg = $editImg;
    }

    #verificacion de la carpeta existe
    $carpetapdf = '../docs/pdf/';
    #creacion de carpeta en caso de no existir
    if (!is_dir($carpetapdf)) {
        mkdir($carpetapdf);
    }
    if ($doc["name"]) {
        unlink($carpetapdf . $editPdf);
       // crear nombre para el documento
        $nombrepdf = md5(uniqid(rand(), true)) . ".pdf";
        move_uploaded_file($doc["tmp_name"], $carpetapdf . $nombrepdf);
    } else {
        $nombrepdf = $editPdf;
    }

    try {
        $stmt = $conex->prepare("UPDATE libro SET Id_Subcategoria=?,autor=?,titulo=?,editorial=?,edicion=?,paginas=?,descripcion=?,img=?,pdf=? WHERE Id_Libro=?");
        $stmt->bind_param("issssisssi", $categoria, $autor, $nombre, $editorial, $ano, $paginas, $descripcion, $nombreImg, $nombrepdf, $idLibro);
        $stmt->execute();
        if ($stmt -> affected_rows == 1) {
            // include("funcioneseventos.php");
            // $eventoinf = $conex->query("SELECT * from usuario where Id_Usuario='$eventoId'");
            // while ($rowseve = $eventoinf->fetch_assoc()) {
            //     $correoeve = $rowseve['correo'];
            //     $nombreeve = $rowseve['nombre'];
            // }
            // // 1. Insertar 2.Actutualizar 3.Eliminar
            // inserteven($eventoId,$nombre,$nombreeve,$correoeve,2);
            $respuesta = array(
                "respuesta" => "correcto",
                "libro" => "$nombre"
            );
        } else {
            $respuesta = array(
                "respuesta" => "error",
                "libro" => "$nombre"
            );
        }
        $stmt->close();
        $conex->close();
    } catch (Exception $e) {
        $respuesta = array(
            "respuesta" => "errorcatch",
            "libro" => "$e->getMessage()"
        );
    }
}

echo json_encode($respuesta);
