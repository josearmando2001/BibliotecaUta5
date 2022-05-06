<?php
require_once("conexion.php");

#rescibimiento de tipo 
$tipo = mysqli_real_escape_string($conex, filter_var(ucwords(strtolower($_POST['tipo'])), FILTER_SANITIZE_STRING));
if(empty($tipo)){
  echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
if (isset($_POST)){
#consulta de verificacion para nombre
$verifica = $conex->query("SELECT * FROM tipo where nombre='$tipo'");
if ($verifica->num_rows == 0) {
    try {
        #solicitud la preparacion de los datos 
        $stmt = $conex->prepare("INSERT INTO tipo(nombre) VALUE (?)");
        $stmt->bind_param("s", $tipo);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $respuesta=  array(
                "respuesta"=>"correcto",
                "NombreTipo" => "$tipo"
            );
            #notifiUnaDireccion($tipo, "TIPO REGISTRADO CORRECTAMENTE", "../admin/formTipo.php");
        } else {
            $respuesta=  array(
                "respuesta"=>"error",
                "NombreTipo" => "$tipo"
            );
           # notifiUnaDireccion("ERROR", "EXISTIO UN PROBLEMA AL INSERTAR EL TIPO", "../admin/formTipo.php");
        }
    } catch (Exception $e) {
        $respuesta = array(
            $e->getMessage()
        );
    }
} else {
    $respuesta = array(
        "respuesta" => "existe",
        "NombreTipo" => "$tipo"
    );
}
}else{
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
echo json_encode($respuesta);