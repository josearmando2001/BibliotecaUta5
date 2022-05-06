<?php
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/principal.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/validarlibro.css">
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Editar Libro</title>
    <link rel="shortcut icon" href="../img/uta.png">

</head>

<body style="background: linear-gradient(to right, #F8F9F9, #D7DBDD);">
    <header>
        <?php require_once("navResto.php"); ?>
    </header>
    <?php
    require_once("../bd/conexion.php");
    if (!empty($_GET["idLibro"]) && filter_var($_GET["idLibro"], FILTER_VALIDATE_INT)) {
        $idLibro = $_GET["idLibro"];

    ?>
        <center><br>
            <h1>Editar Libro</h1><br>
        </center>

        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-4 " style="justify-content: center;">
                <?php
                $consulta = $conex->query("SELECT * FROM libro LEFT JOIN subcategoria ON libro.Id_Subcategoria = subcategoria.Id_Subcategoria WHERE Id_Libro = '$idLibro'");
                if ($consulta->num_rows == 0) {
                    echo '<script>
                    window.location="index.php";
                    </script>';
                    die();
                }
                while ($row = $consulta->fetch_assoc()) {
                ?>

                    <div class="col">
                        <form action="#" method="post" id="formEditLibro" enctype="multipart/form-data" style="-webkit-box-shadow: 0px 0px 15px 11px rgba(0,0,0,0.45);  box-shadow: 0px 0px 15px 11px rgba(0,0,0,0.45);">
                            <?php $IdUseve = $_SESSION['usuario']['Id_Usuario'] ?>
                            <input type="hidden" name="eventoId" value="<?php echo $IdUseve ?>">
                            <div class="card bg-gray" style="background-color: rgba(0,0,0,0.03);">
                                <img src="../docs/imagenes/<?php echo $row["img"]; ?>" class=" img-bg card-img-top" alt="...">
                                <input type="hidden" name="idLibro" id="idLibro" value="<?php echo $row["Id_Libro"]; ?>">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <div class="mb-3">
                                            <li class="list-group-item">
                                                <label class="font-weight-bold text-dark">La Sub-Categoria por defecto de su
                                                    libro es :
                                                    <span class="text-danger"> <?php echo $row["nombre"]; ?>
                                                        *</span></label><br>
                                                <!-- Lista de opciones -->
                                                <select id="items" name="categoria" class="form-control" required>
                                                    <option value="0" selected>Selecciona una sub-categoría
                                                    </option>
                                                    <?php
                                                    $opcionesCategoria = $conex->query("SELECT * FROM subcategoria");
                                                    while ($rows = $opcionesCategoria->fetch_assoc()) { ?>
                                                        <option value="<?php echo $rows["Id_Subcategoria"] ?>">
                                                            <?php echo $rows["nombre"] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </li>
                                        </div>
                                        <div class="mb-3">
                                            <li class="list-group-item">
                                                <label for="formFile" class="font-weight-bold formulario__label">Selecciona una imagen</label>
                                                <input class="form-control" id="imgPortada" name="imgPortada" type="file">
                                                <input type="hidden" name="nombreImg" id="nombreImg" value="<?php echo $row["img"]; ?>">
                                            </li>
                                        </div>
                                        <div class="mb-3">
                                            <li class="list-group-item">
                                                <label for="formFile" class="font-weight-bold formulario__label">Selecciona un documento</label>
                                                <input class="form-control" name="pdf" type="file" id="pdf">
                                                <input type="hidden" name="nombrepdf" id="nombrepdf" value="<?php echo $row["pdf"]; ?>">
                                            </li>
                                        </div>
                                        <div class="formulario__grupo mb-3" id="grupo__nombre">
                                            <li class="list-group-item">
                                                <label class="formulario__label font-weight-bold text-dark">Nombre del libro
                                                    <span class="text-danger">*</span></label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input form-control" id="nombreLibro" name="nombreLibro" placeholder="Ingresa el nombre del libro" value="<?php echo $row["titulo"]; ?>" required>
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El nombre del libro requiere de 8 a 25
                                                    letras y puede utilizar numeros.</p>
                                            </li>
                                        </div>
                                        <div class="formulario__grupo mb-3" id="grupo__autor">
                                            <li class="list-group-item">
                                                <label class="formulario__label font-weight-bold text-dark">Nombre del autor
                                                    <span class="text-danger">*</span></label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input form-control" id="autor" name="autor" placeholder="Ingresa el nombre del libro" value="<?php echo $row["autor"]; ?>" required>
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El nombre del autor o autores requiere
                                                    de 4 a 25
                                                    letras.</p>
                                            </li>
                                        </div>
                                        <div class="formulario__grupo mb-3" id="grupo__editorial">
                                            <li class="list-group-item">
                                                <label class="formulario__label font-weight-bold text-dark">Nombre de la
                                                    editorial
                                                    <span class="text-danger">*</span></label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input form-control" value="<?php echo $row["editorial"]; ?>" id="editorial" name="editorial" placeholder="Ingresa el nombre de la editorial" required>
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El nombre de la editorial requiere de 4 a 20 letras, numeros y (- _ ,)</p>
                                            </li>
                                        </div>
                                        <div class="formulario__grupo mb-3" id="grupo__descripcion">
                                            <li class="list-group-item">
                                                <label class="formulario__label font-weight-bold text-dark">Descripción <span class="text-danger">*</span></label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" id="descripcion" class="formulario__input form-control" value="<?php echo $row["descripcion"]; ?>" name="descripcion" placeholder="Ingresa el nombre de la editorial" required>
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">La descripción requiere de 40 a 50
                                                    letras, numeros y
                                                    (- _ , .).</p>
                                            </li>
                                        </div>
                                        <div class="formulario__grupo mb-3" id="grupo__numeroPaginas">
                                            <li class="list-group-item">
                                                <label class="formulario__label font-weight-bold text-dark">Número de paginas
                                                    <span class="text-danger">*</span></label>
                                                <div class="formulario__grupo-input">
                                                    <input type="number" class="formulario__input form-control" name="numeroPaginas" id="numeroPaginas" placeholder="Ingresa numero de paginas libro" value="<?php echo $row["paginas"]; ?>" required>
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El número de paginas requiere de 1 a 4
                                                    digitos</p>
                                            </li>
                                        </div>
                                        <div class="mb-3">
                                            <li class="list-group-item">
                                                <label class="font-weight-bold text-dark"><b>Año de Publicación</b><span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="Publicacion" name="Publicacion" value="<?php echo $row["edicion"]; ?>" required>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                                <center>
                                    <button class="btn btn-primary width-100" id="editarLibro">Registrar Libro</button>
                                </center><br>
                            </div>
                        </form>
                    </div><br>
            </div>
    <?php
                }
            } else {
                echo '<script>
                alert("Usted no tiene acceso al contenido");
                window.location="index.php";
                </script>';
            }
    ?>
        </div>
        </div>
</body>

<script src="../js/funcioneseditarlibro.js"></script>
<script src="../js/validarForm.js"></script>
<script src="../sweetalert/dist/sweetalert2.all.min.js"></script>

</html>