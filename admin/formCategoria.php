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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Categoria</title>
    <link rel="shortcut icon" href="../img/uta.png">
</head>

<body style="background: linear-gradient(to right, #CACFD2, #A6ACAF);">
    <?php
    require_once("navResto.php");
    ?>

    <div class="container" style="width: 95%;">
        <div class="row" style="justify-content: center;">
            <div class="col-sm-12 col-md-4" style="margin-top: 2%;">
             <div class="bg-white" style="padding: 2%;">
             <center>
                    <h5 class="card-title">Registrar Categoría</h5>
                </center>
                <form action="#" id="formCategoria">
                    <div>
                        <label for="categoria" class="font-weight-bold">Categoría<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Escriba el Nombre" name="categoria"
                            id="categoria" required>
                    </div>
                    <h1></h1>
                    <div>
                        <center>
                            <input type="submit" value="Enviar" id="registrocategoria" class="btn btn-primary">
                        </center>
                    </div>
                </form>
             </div>

            </div>

            <div class="col-sm-12 col-md-4" style="margin-top: 2%;">
                <div class="tabla-1">
                    <table>
                        <table class="table table-light table-striped">
                            <thead>
                                <tr>
                                    <th class="table-dark">Nombre</th>
                                    <th class="table-dark">Editar</th>
                                    <th class="table-dark">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="tbcate">

                            </tbody>
                        </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">Editar Nombre Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <center>
                    <div class="modal-body">
                        <form action="#" id="forEditCat"
                            onKeyPress="if(event.keyCode == 13) event.returnValue = false;">
                            <label class="font-weight-bold" for="">Nombre Categoría<span class="text-danger">*</span></label>
                            <input type="hidden" name="idcategoria" id="idcategoria">
                            <input type="text" placeholder="Nombre Cat" name="edcatenomgoria" id="edcatenomgoria"
                                required class="form-control">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cerrarmodal" class="btn btn-danger"
                            data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="EditCat">Guardar cambio</button>
                    </div>
            </div>
        </div>
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="../js/funcionesCategoria.js"></script>
</body>
</body>

</html>