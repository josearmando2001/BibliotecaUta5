<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/registroDatos.css">
    <script type="text/javascript">
</script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
require_once("navResto.php");
?>


    <center>
        <div class="row">
            <div class="col-sm-4">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">Registrar Tipo de Usuario</h5>
                        <form action="#" id="formTipo">
                            <input type="text" placeholder="Ingrese el Nombre" name="tipo" id="tipo" required><br><br>
                            <input type="submit" value="Enviar" id="registroTipo" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>

    <div class="tabla-1">
        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th class="table-dark">Tipo de Usuario</th>
                    <th class="table-dark">Editar</th>
                    <th class="table-dark">Eliminar</th>
                </tr>
            </thead>
            <tbody id="tbtipo">

            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="ModalTipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Nombre Tipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <center>
                <div class="modal-body">
                    <form action="#" id="forEditTipo" onKeyPress="if(event.keyCode == 13) event.returnValue = false;">
                        <input type="hidden" name="idTipo" id="idTipo">
                        <input type="text" placeholder="Nombre Tipo" name="editartiponame" id="editartiponame" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cerrarmodal" class="btn btn-danger"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="EditTipo">Guardar cambio</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/funtionTipo.js"></script>
    <script>
        listarTipo();
    </script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
   
</body>

</html>