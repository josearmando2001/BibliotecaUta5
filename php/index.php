<?php
require_once("../bd/conexion.php");
session_start();
if(isset($_SESSION['usuario'])){
    if($_SESSION['usuario']['Id_Tipo']==1){
        header("Location: ../admin/index.php");
    }else if($_SESSION['usuario']['Id_Tipo']==2){
    }
  }else{
    echo '<script>
        alert("Usted debe inciar sesion");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="shortcut icon" href="../img/uta.png">

</head>
<header>
    <?php require_once("navResto.php"); ?>
</header>

<body style="background: linear-gradient(to right, #F8F9F9, #D7DBDD);">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
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
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>


    <center>
        <br>
        <h1> Libros</h1>
        <br>
    </center>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $filcat="SELECT * FROM libro LEFT JOIN subcategoria ON libro.Id_Subcategoria = subcategoria.Id_Subcategoria";
            $consulta = $conex->query($filcat);
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
                            <li class="list-group-item">N??mero de p??ginas: <?php echo $row["paginas"]; ?></li>
                            <li class="list-group-item">A??o de publicaci??n: <?php echo $row["edicion"]; ?></li>
                            <li class="list-group-item">Categor??a: <?php echo $row["nombre"]; ?></li>
                            <li class="list-group-item">Descripci??n: <?php echo $row["descripcion"]; ?></li>
                        </ul>                    </div>
                        <div class="card-footer text-muted">
                        <a target="_blank" href="archivospdf.php?nombreLibro=<?php echo $row["pdf"] ?>" class="btn btn-primary">Leer
                            libro</a>

                    </div>
                </div><br>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <?php require_once("../admin/footer.php"); ?>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>