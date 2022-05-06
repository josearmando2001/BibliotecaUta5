<?php
require_once("../bd/conexion.php");

?>
<!-- 
session_start(); 
$existe= $_SESSION['usuario'];
if($existe == null || $existe = ''){
echo '<script>
alert("Usted no tiene acceso al contenido");
window.location="../index.php";
</script>';
die();
}
 -->
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
</head>

<body style="background-color: #F2F3F4;">
    <?php
    include_once("navresto.php");
    ?>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/diseño4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../img/diseño2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../img/diseño1.jpg" class="d-block w-100" alt="...">
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
        <h1>Libros</h1><br>
    </center>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $consulta = $conex->query("SELECT * FROM libro LEFT JOIN categoria ON libro.Id_Categoria = categoria.Id_Categoria");
            while ($row = $consulta->fetch_assoc()) {
            ?>
            <div class="col">
                <div class="card">
                    <img src="../docs/imagenes/<?php echo $row["img"]; ?>" class=" img-bg card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["titulo"]; ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Autor: <?php echo $row["autor"]; ?></li>
                            <li class="list-group-item">Editorial: <?php echo $row["editorial"]; ?></li>
                            <li class="list-group-item">Número de páginas: <?php echo $row["paginas"]; ?></li>
                            <li class="list-group-item">Año de publicación: <?php echo $row["edicion"]; ?></li>
                            <li class="list-group-item">Categoría: <?php echo $row["nombre_categoria"]; ?></li>
                        </ul>
                    </div>
                    <div class="card-footer text-muted">
                        <?php $disparador = str_replace(' ', '', $row["titulo"]); ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#<?php echo $disparador ?>">
                            Ver libro
                        </button>

                        <a href="archivospdf.php?nombreLibro=<?php echo $row["pdf"] ?>" class="btn btn-primary">Leer libro</a>

                    </div>
                </div><br>
            </div>
            <!-- modal accion -->


            <div class="modal fade" id="<?php echo $disparador ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> <?php echo $row["titulo"]; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe src="../ViewerJS/#../docs/pdf/<?php echo $row["pdf"] ?>" style="width:100%; height: 620px;"
                                frameborder="0"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>


    <footer>

        <div class="container-footer-all">

            <div class="container-body">

                <div class="colum1">
                    <h1>Mas informacion de la Universidad</h1>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus eaque accusamus amet iste ipsam
                        explicabo
                        animi quod. Ex in totam vel debitis distinctio ratione veniam vitae ullam enim, esse modi.</p>

                </div>

                <div class="colum2">

                    <h1>Redes Sociales</h1>

                    <div class="row">
                        </ /img src="../img/facebook.png">
                        <label>Siguenos en Facebook</label>
                    </div>
                    <div class="row">
                        </ /img class="footer" src="../img/twitter.png">
                        <label>Siguenos en Twitter</label>
                    </div>
                    <div class="row">
                        </ /img src="../img/instagram.png">
                        <label>Siguenos en Instagram</label>
                    </div>
                    <div class="row">
                        </ /img src="../img/google-plus.png">
                        <label>Siguenos en Google Plus</label>
                    </div>

                </div>

                <div class="colum3">

                    <h1 style="  text-align: center;">Contacto</h1>

                    <div class="row2">
                        <img src="../img/house.png">
                        <label>Av. Comandante Bouganville L-05, Fracc Costa Azul, Lomas de Costa Azul, 39830 Acapulco de
                            Juárez,
                            Gro.</label>
                    </div>

                    <div class="row2">
                        <img src="../img/smartphone.png">
                        <label>744 688 6415</label>
                    </div>

                    <div class="row2">
                        <img src="../img/contact.png">
                        <label>universidad@gmail.com</label>
                    </div>

                </div>

            </div>

        </div>

        <div class="container-footer">
            <div class="footer">
                <div class="copyright">
                    Todos los derechos reservados | © 2021 | <a href="">Loeza Chavez</a>
                </div>

                <div class="information">
                    <a href="">Informacion Compañia</a> | <a href="">Privacion y Politica</a> | <a href="">Terminos y
                        Condiciones</a>
                </div>
            </div>

        </div>

    </footer>

    <script>
    $('modal-body').on('click', function(){
  $('#modal5').modal('show');
});
</script>

    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>