<?php
session_start();
if(isset($_SESSION['usuario'])){
    if($_SESSION['usuario']['Id_Tipo']===1){

    }else if($_SESSION['usuario']['Id_Tipo']===2){
        header("Location: ../php/index.php");
    }
  }else{
    echo '<script>
        alert("Usted no tiene acceso al contenido");
        window.location="../index.php";
        </script>';
    die();
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
<?php require_once("navResto.php"); ?>
</header>
<body>
    <h1>admin</h1>
    <a href="../bd/cerrar.php">Cerrar</a>
    <h1>hola</h1>
    <h1>hola</h1>
    <?php
    date_default_timezone_set("America/Mexico_City");
    $fecha_actual = date("d-m-Y");
    //sumo 1 día
    echo "Dia de prestamo" . $fecha_actual . "<br>";
    echo "Dia de entrega" . date("d-m-Y", strtotime($fecha_actual . "+ 3 days"));
    ?>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>