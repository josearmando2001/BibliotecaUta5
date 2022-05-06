<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <title>Biblioteca</title>
</head>

<body>
    <section class="contact-box">
        <div class="row no-gutters bg-dark">
            <div class="col-lg-12 d-flex">
                <div class="container align-self-center p-6">
                    <center>
                        <h1 class="font-weight-bold mb-3">Registra Un Libro</h1>
                    </center>
                    <form>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Categoría <span class="text-danger">*</span></label><br>
                            <input type="text" list="items" class="form-control" required>
                            <!-- Lista de opciones -->
                            <datalist id="items">
                                <option value="Opcion 1"></option>
                                <option value="Opción 2"></option>
                                <option value="Opción 3"></option>
                            </datalist>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nombre del libro <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Ingresa el nombre del libro" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="formFile" class="form-label text-light font-weight-bold">Selecciona una
                                imagen</label>
                            <input class="form-control" name="portada" type="file" id="formFile" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nombre del autor <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Ingresa el nombre del autor" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nombre de la editorial <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Ingresa el nombre de la editorial"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Numero de páginas <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="Ingresa el nombre del libro"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Año de publicación <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="Ingresa el nombre del libro"
                                required>
                        </div>






                        <center><button class="btn btn-primary width-100">Registrar Libro</button><br>
                    </form>
                    <small class="d-inline-block text-muted mt-5">Todos los derechos reservados | © 2021 Loeza
                        Chavez</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>