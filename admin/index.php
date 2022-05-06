<?php
require_once("../bd/conexion.php");
session_start();
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['Id_Tipo'] == 1) {
    } else if ($_SESSION['usuario']['Id_Tipo'] == 2) {
        header("Location: ../php/index.php");
    }
} else {
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
    <link href="../css/principal.css" rel="stylesheet">
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="shortcut icon" href="../img/uta.png">
</head>
<header>
    <?php
     require_once("navResto.php");
     ?>

</header>

<body style="background: linear-gradient(to right, #F8F9F9, #D7DBDD);">
    <div class="container">
        <!-- Aquí puedes escribir tu comentario

        <img src="../img/uta_img.jpeg" class="img-fluid" alt="..." style="width:100%;height:400px"> -->


        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/tics.jpeg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../img/desarrollo.jpeg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../img/manto.jpeg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../img/gastro.jpeg" class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <center>
        <br>
        <h1>Libros</h1><br>
    </center>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $consulta = $conex->query("SELECT * FROM libro LEFT JOIN subcategoria ON libro.Id_Subcategoria = subcategoria.Id_Subcategoria");
            while ($row = $consulta->fetch_assoc()) {
            ?>
                <div class="col">
                    <div class="card">
                        <img src="../docs/imagenes/<?php echo $row["img"]; ?>" class=" img-bg card-img-top" alt="...">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <h5 style="text-transform: capitalize;" class="list-group-item">
                                    <?php echo $row["titulo"]; ?></h5>
                                <li class="list-group-item">Autor: <?php echo $row["autor"]; ?></li>
                                <li class="list-group-item">Editorial: <?php echo $row["editorial"]; ?></li>
                                <li class="list-group-item">Número de páginas: <?php echo $row["paginas"]; ?></li>
                                <li class="list-group-item">Año de publicación: <?php echo $row["edicion"]; ?></li>
                                <li class="list-group-item">Categoría: <?php echo $row["nombre"]; ?></li>
                                <li class="list-group-item">Descripción: <?php echo $row["descripcion"]; ?></li>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="archivospdf.php?nombreLibro=<?php echo $row["pdf"] ?>" target="_blank" class="btn btn-primary">Leer
                                libro</a>
                            <a onclick="abrir('editarchivo.php?idLibro=<?php echo $row['Id_Libro'] ?>');"  class="btn btn-success"> Editar</a>
                            <input type='submit' value='Eliminar' onclick='eliminarlib(<?php echo $row["Id_Libro"] ?>);' class='btn btn-danger'>
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