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
        alert("Usted no tiene acceso al contenido");
        window.location="../index.php";
        </script>';
    die();
  }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/validarlibro.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Registrar Libro</title>
    <link rel="shortcut icon" href="../img/uta.png">
</head>
<header>
    <?php require_once("navResto.php"); ?>
</header>

<body style="background: linear-gradient(to right, #5DADE2, #D7DBDD);"><br>
    <center>
        <h1 class="mb-3" style=top:100px;>Registra Un Libro</h1>
    </center>
    <div class="container" style="width : 80%;">
        <form action="#" method="post" id="formLibro" enctype="multipart/form-data">
            <?php $IdUseve = $_SESSION['usuario']['Id_Usuario']?>
            <input type="hidden" name="eventoId" value="<?php echo $IdUseve ?>">
            <div class="mb-3" style="margin:20px;">
                <div class="mb-3">
                    <label class="font-weight-bold"><b>Categoría</b><span class="text-danger">*</span></label><br>
                    <!-- Lista de opciones -->
                    <select id="items" name="categoria" class="form-control" required>
                        <?php
                        $opcionesCategoria = $conex->query("SELECT * FROM subcategoria");
                        while ($rows = $opcionesCategoria->fetch_assoc()) { ?>
                        <option value="<?php echo $rows["Id_Subcategoria"] ?>">
                            <?php echo $rows["nombre"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label class="formulario__label font-weight-bold">Nombre del libro <span
                                class="text-danger">*</span></label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input form-control" id="nombreLibro"
                                name="nombreLibro" placeholder="Ingresa el nombre del libro" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">El nombre del libro requiere de 8 a 25 letras y puede
                            utilizar numeros.</p>
                    </div>
                    <div class="mb-3">
                        <div class="formulario__grupo" id="grupo__autor">
                            <label class="formulario__label font-weight-bold">Nombre del autor <span
                                    class="text-danger">*</span></label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input form-control" id="autor" name="autor"
                                    placeholder="Ingresa el nombre del autor" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El nombre del autor o autores requiere de 4 a 25
                                letras.</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="formulario__grupo" id="grupo__img">
                            <label for="formFile" class="font-weight-bold formulario__label">Selecciona una imagen <span
                                    class="text-danger">*</span></label>
                            <div class="formulario__grupo-input">
                                <input class="form-control" id="imgPortada" name="imgPortada" type="file" onchange="return validarimg();" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Los fotmatos permitidos para imagenes son PNG y JPG</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="formulario__grupo" id="grupo__pdf">
                            <label for="formFile" class="font-weight-bold formulario__label">Selecciona un documento
                                <span class="text-danger">*</span></label>
                            <div class="formulario__grupo-input">
                                <input class="form-control" name="pdf" type="file" id="pdf"
                                    onchange="return validarpdf();" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El archivo seleccionado no es PDF</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="formulario__grupo" id="grupo__editorial">
                            <label class="formulario__label font-weight-bold">Nombre de la editorial <span
                                    class="text-danger">*</span></label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input form-control" id="editorial"
                                    name="editorial" placeholder="Ingresa el nombre de la editorial" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El nombre de la editorial requiere de 4 a 20 letras,
                                numeros y (- _ ,)</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="formulario__grupo" id="grupo__descripcion">
                            <label class="formulario__label font-weight-bold">Descripción<span
                                    class="text-danger">*</span></label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input form-control" id="descripcion"
                                    name="descripcion" placeholder="Ingresa una descripcion" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">La descripción requiere de 40 a 50 letras, números y
                                (- _ , .).</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="formulario__grupo" id="grupo__numeroPaginas">
                            <label class="formulario__label font-weight-bold">Número de páginas<span
                                    class="text-danger">*</span></label>
                            <div class="formulario__grupo-input">
                                <input type="number" class="formulario__input form-control" id="numeroPaginas"
                                    name="numeroPaginas" placeholder="Ingresa numero de paginas libro" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El numero de páginas requiere de 1 a 4 dígitos</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="font-weight-bold formulario__label">Año de Publicación<span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="Publicacion" name="Publicacion"
                            placeholder="Ingresa el nombre de la editorial" required>
                    </div>

                    <center><button class="btn btn-primary width-100" id="registraLibro">Registrar Libro</button>
                    </center>
                    <br>
        </form>
        <center>
            <small>Todos los derechos reservados | © 2021 UTA</small>
        </center>
    </div>
    <script src="../js/funcionesLibro.js"></script>
    <script src="../js/validarForm.js"></script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
</body>

</html>