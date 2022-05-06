<head>
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <title>Registrar Alumnos</title>
    <link rel="shortcut icon" href="../img/uta.png">
</head>
<?php
include("../bd/conexion.php");
$url = "http://localhost/xampp/bibliotecaUta5/admin/alumnos.json";
$Json = json_decode(file_get_contents($url), true);
echo "<h1> NUEVOS REGISTROS </h1>";
foreach ($Json as $datos) {
    $nombre = $conex->real_escape_string(filter_var(ucwords($datos["Nombre"]), FILTER_SANITIZE_STRING));
    $correo = $conex->real_escape_string(filter_var(strtolower($datos["Correo"]), FILTER_SANITIZE_EMAIL));
    $consulta = $conex->query("SELECT * FROM registro WHERE preCorreo='$correo'");
    if ($consulta->num_rows == 0) {
        $stmt = $conex->prepare("INSERT INTO registro(preNombre,preCorreo) VALUE  (?,?)");
        $stmt->bind_param("ss", $nombre, $correo);
        $stmt->execute();
        echo "<li>";
        echo "Registrado " . $nombre;
        echo "</li>";
    }
}
$stmt->close();
$conex->close();
echo "<script languaje='javascript'>
window.onload = function alerta(){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Actualizado Correctamente',
        showConfirmButton: false,
        timer: 2500    
    }).then(function() {
    window.location = 'index.php';
});
}
</script>";
?>
<br>
<a href="cerrar.php">cerrar</a>
<script src="../sweetalert/dist/sweetalert2.all.min.js"></script>