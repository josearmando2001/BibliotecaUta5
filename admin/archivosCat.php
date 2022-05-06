<?php
require_once("../bd/conexion.php");

session_start();
if(isset($_SESSION['usuario'])){
    if($_SESSION['usuario']['Id_Tipo']==1){
      
    }else if($_SESSION['usuario']['Id_Tipo']==2){
        header("Location: ../php/index.php");
    }
  }else{
    echo '<script>
        alert("Usted debe iniciar sesion");
        window.location="../index.php";
        </script>';
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="../css/principal.css" rel="stylesheet">
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro</title>
    <link rel="shortcut icon" href="../img/uta.png">
</head>
<header>
    <?php require_once("navResto.php"); ?>
</header>

<body style="background: linear-gradient(to right, #F8F9F9, #D7DBDD);">
    <?php
    if (!empty($_GET["idCat"]) && (filter_var($_GET["idCat"], FILTER_VALIDATE_INT))) {
        $datPeti = $_GET["idCat"];
        $peticion = "SELECT * FROM libro WHERE Id_Subcategoria='$datPeti'";
        $peticiona = "SELECT * FROM subcategoria WHERE Id_Subcategoria='$datPeti'";
        $consulta2 = $conex->query($peticiona);
        if ($consulta2->num_rows == 0) {
            echo '<script>
                alert("Usted no debe manupular las direcciones");
                window.location="../index.php";
                </script>';
        }
        while ($row1 = $consulta2->fetch_assoc()) {
            $nombreCatT =  $row1["nombre"];
        }
    } else {
        echo '<script>
                    alert("El uso inadecuado en la url podría bloquear su direccion ip");
                    window.location="../index.php";
                    </script>';
        die();
    }
    ?>
    <center>
        <br>
        <h1>Libros De <?php echo $nombreCatT ?> </h1><br>
    </center>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php
            $consulta = $conex->query($peticion);
            while ($row = $consulta->fetch_assoc()) {
            ?>
                <div class="col">
                    <div class="card">
                        <img src="../docs/imagenes/<?php echo $row["img"]; ?>" class=" img-bg card-img-top" alt="...">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <h5 class="list-group-item"><?php echo $row["titulo"]; ?></h5>
                                <li class="list-group-item">Autor: <?php echo $row["autor"]; ?></li>
                                <li class="list-group-item">Editorial: <?php echo $row["editorial"]; ?></li>
                                <li class="list-group-item">Número de páginas: <?php echo $row["paginas"]; ?></li>
                                <li class="list-group-item">Año de publicación: <?php echo $row["edicion"]; ?></li>
                                <li class="list-group-item">Categoria: <?php echo $nombreCatT ?></li>
                                <li class="list-group-item">Descripción: <?php echo $row["descripcion"]; ?></li>
                            </ul>
                        </div>

                        <div class="card-footer text-muted">
                            <a target="_blank" href="archivospdf.php?nombreLibro=<?php echo $row["pdf"] ?>" class="btn btn-primary">Leer
                                libro</a>
                            <input type='submit' value='Eliminar' onclick='eliminarlib(<?php echo $row["Id_Libro"] ?>)' class='btn btn-danger'>
                            <a onclick="abrir('editarchivo.php?idLibro=<?php echo $row['Id_Libro'] ?>');"  class="btn btn-success"> Editar</a>
                        </div>
                    </div><br>
                </div>
            <?php
            }
            $conex->close();
            ?>
        </div>
    </div>

    <?php require_once("footer.php"); ?>
    <script src="../js/libros.js"></script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>

</body>

</html>