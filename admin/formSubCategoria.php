<?php
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Sub-Categoria</title>
    <link rel="shortcut icon" href="../img/uta.png">
</head>

<body style="background: linear-gradient(to right, #CACFD2, #A6ACAF);">
    <?php
    require_once("../bd/conexion.php");
    require_once("navResto.php");
    ?>


    <div class="container" style="width: 90%;">
        <div class="row" style="justify-content: center;">

            <div class="col-sm-12 col-md-4 " style="margin-top: 2%;">
                <div class="bg-white" style="padding: 2%;">
                    <center>
                        <h5 class="card-title">Registrar Sub-Categoría</h5>
                    </center>
                    <form action="#" id="formSubCategoria">
                        <div class="">
                            <label class="font-weight-bold" for="">Categoría<span class="text-danger">*</span></label>
                            <select id="items" name="selec" id="selec" class="form-control" required>
                                <option value="0">Selecciona una categoría</option>
                                <?php
                                $opcionesSubCategoria = $conex->query("SELECT * FROM categoria");
                                while ($rows = $opcionesSubCategoria->fetch_assoc()) { ?>
                                    <option value="<?php echo $rows["Id_Categoria"] ?>">
                                        <?php echo $rows["nombre_categoria"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="">
                            <label class="font-weight-bold">Nombre sub-categoría <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Escriba el Nombre" class="form-control" name="subcategoria" id="subcategoria" required>
                        </div>
                        <h1></h1>
                        <div class="">
                            <center>
                                <input type="submit" value="Enviar" id="registrosubcategoria" class="btn btn-primary">
                            </center>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-12 col-md-5" style="margin-top: 2%;">
                <div class="table-responsive-sm">
                    <table class="table table-light table-striped">
                        <thead>
                            <tr>
                                <th class="table-dark">Nombre</th>
                                <th class="table-dark">categoría</th>
                                <th class="table-dark">Editar</th>
                                <th class="table-dark">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tbcate">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Nombre Sub-Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <center>
                    <div class="modal-body">
                        <form action="#" id="forEditSubCat" onKeyPress="if(event.keyCode == 13) event.returnValue = false;">
                            <div class="">
                                <label class="font-weight-bold" for=""><span class="text-danger" id="nomseje" name="nomseje"></span></label>
                                <select name="selecEdit" id="selecEdit" class="form-control" required>
                                    <option value="0">Selecciona una categoría</option>
                                    <?php
                                    $opcionesSubCategoria = $conex->query("SELECT * FROM categoria");
                                    while ($rows = $opcionesSubCategoria->fetch_assoc()) { ?>
                                        <option value="<?php echo $rows["Id_Categoria"] ?>">
                                            <?php echo $rows["nombre_categoria"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <input type="hidden" name="idSubcategoria" id="idSubcategoria">
                                <label class="font-weight-bold" for="">Nombre sub-categoría<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Nombre Programación" name="edSubcatenomgoria" id="edSubcatenomgoria" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cerrarmodal" class="btn btn-danger" data-bs-dismiss="modal">
                            Cerrar
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                            <button type="button" class="btn btn-primary" id="EditSubCat">
                                Guardar cambio
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg>
                            </button>
                    </div>
            </div>
        </div>
    </div>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="../js/funcionesSubCategoria.js"></script>
</body>
</body>

</html>