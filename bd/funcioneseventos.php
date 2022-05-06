<?php
// 1. Insertar 2.Actutualizar 3.Eliminar un libro 
function inserteven($Id_usuario,$Nombre_Libro,$NombreUsuario,$Correo,$IdTipo_eventos){
    $servidor = 'localhost';
    $usuario = 'root';
    $password = 'password';
    $bd = 'registro_eventos';
    $conexiones = mysqli_connect("$servidor", "$usuario", "$password", "$bd") or die("Error");
    date_default_timezone_set("America/Mexico_City");
    $fecha_Actual = date("Y-m-d G:i:s");
    $insetar = $conexiones->query("INSERT INTO eventos(Id_usuario, Nombre_Libro, Fecha_y_Hora, NombreUsuario, Correo, IdTipo_eventos) VALUES ('$Id_usuario','$Nombre_Libro','$fecha_Actual','$NombreUsuario','$Correo','$IdTipo_eventos')");
    // $Id_Eventos;
    // $Fecha_y_Hora;
}

?>