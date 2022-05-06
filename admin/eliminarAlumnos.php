<head>
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <title>Eliminar Alumnos</title>
    <link rel="shortcut icon" href="../img/uta.png">

</head>
<?php
include("../bd/conexion.php");
$url = "http://localhost/xampp/bibliotecaUta5/admin/alumnos.json";
$Json = json_decode(file_get_contents($url), true);
echo "<h1> ALUMNOS ELIMINADOS</h1>";
foreach ($Json as $datos) {
    $nombre = mysqli_real_escape_string($conex, filter_var(ucwords($datos["Nombre"]), FILTER_SANITIZE_STRING));
    $correo = mysqli_real_escape_string($conex, filter_var(strtolower($datos["Correo"]), FILTER_SANITIZE_EMAIL));
    echo $correo;
    echo $nombre;
    $consulta = $conex->query("SELECT * FROM registro WHERE preCorreo='$correo'");
    if ($consulta->num_rows == 1) {
        //ELIMINAR
        mysqli_query($conex, "DELETE FROM registro WHERE preCorreo='$correo'");
        //mysqli_query($conex, "DELETE FROM usuario WHERE correo='$correo'");
        echo "<li>";
        echo "Eliminado " . $nombre;
        echo "</li>";
    }
}
echo "<script languaje='javascript'>
window.onload = function alerta(){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Eliminados alumnos exitosamente',
        showConfirmButton: false,
        timer: 2500    
    }).then(function() {
    window.location = '../index.php';
});
}
</script>";
?>
<br>
<a href="cerrar.php">cerrar</a>
<script src="../sweetalert/dist/sweetalert2.all.min.js"></script>