<?php
require_once("conexion.php");
$categoria = mysqli_real_escape_string($conex, $_POST["categoria"]);
$eventoId = mysqli_real_escape_string($conex, $_POST["eventoId"]);
$nombre = mysqli_real_escape_string($conex, ucwords($_POST["nombreLibro"]));
$autor = mysqli_real_escape_string($conex, ucwords($_POST["autor"]));
$editorial =  mysqli_real_escape_string($conex, ucwords($_POST["editorial"]));
$paginas = mysqli_real_escape_string($conex, $_POST["numeroPaginas"]);
$descripcion = mysqli_real_escape_string($conex, $_POST["descripcion"]);
$ano = mysqli_real_escape_string($conex, $_POST["Publicacion"]);
$img = $_FILES["imgPortada"];
$doc = $_FILES["pdf"];
if (empty($categoria) && empty($doc) && empty($img)) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
#verificacion de registro
/*
  $verifica = $conex->query("SELECT * FROM libro WHERE  autor= '$autor' && titulo='$nombre' && editorial='$editorial' && edicion='$ano'");
    if ($verifica->num_rows == 0) {} else {
    notifiUnaDireccion($nombre,"ESTE LIBRO YA EXISTE","../admin/formLibro.php");
}
*/
#verificacion de la carpeta existe
$carpetaImg = '../docs/imagenes/';
#creacion de carpeta en caso de no existir
if (!is_dir($carpetaImg)) {
    mkdir($carpetaImg);
}
// crear nombre de la imagen 
$nombreImg = md5(uniqid(rand(), true)) . ".jpg";
move_uploaded_file($img["tmp_name"], $carpetaImg . $nombreImg);
#verificacion de la carpeta existe
$carpetapdf = '../docs/pdf/';
#creacion de carpeta en caso de no existir
if (!is_dir($carpetapdf)) {
    mkdir($carpetapdf);
}
// crear nombre para el documento
$nombrepdf = md5(uniqid(rand(), true)) . ".pdf";
move_uploaded_file($doc["tmp_name"], $carpetapdf . $nombrepdf);

try {
    $stmt = $conex->prepare("INSERT INTO libro(Id_Subcategoria,autor,titulo,editorial,edicion,paginas,descripcion,img,pdf) 
    VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("issssisss", $categoria, $autor, $nombre, $editorial, $ano, $paginas, $descripcion, $nombreImg, $nombrepdf);
    $stmt->execute();
    if ($stmt->affected_rows == 1) {
        // include("funcioneseventos.php");
        // $eventoinf = $conex->query("SELECT * from usuario where Id_Usuario='$eventoId'");
        // while ($rowseve = $eventoinf->fetch_assoc()) {
        //     $correoeve = $rowseve['correo'];
        //     $nombreeve = $rowseve['nombre'];
        // }
        // // 1. Insertar 2.Actutualizar 3.Eliminar
        // inserteven($eventoId,$nombre,$nombreeve,$correoeve,1);
        $respuesta = array(
            "respuesta"=>"correcto",
            "libro"=>"$nombre"
        );
        
    } else {
        $respuesta = array(
            "respuesta"=>"error",
            "libro"=>"$nombre"
        );
    }
    $stmt->close();
    $conex->close();
} catch (Exception $e) {
    $respuesta = array(
        "respuesta"=>"errorcatch",
        "libro"=>"$e->getMessage()"
    );
}
echo json_encode($respuesta);
?>