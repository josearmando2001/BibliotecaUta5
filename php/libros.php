<?php
require_once("../bd/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <title>Biblioteca</title>
</head>

<body>
  <div class="principal">
    <?php
    $consulta = $conex->query("SELECT * FROM libro LEFT JOIN categoria ON libro.Id_Categoria = categoria.Id_Categoria");
    while ($row = $consulta->fetch_assoc()) {
    ?>
      <!-- flip-card-container -->
      <div class="flip-card-container" style="--hue: 220">
        <div class="flip-card">

          <div class="card-front">
            <figure>
              <div class="img-bg"></div>
              <img src="../docs/imagenes/<?php echo $row["img"]; ?>" alt="La Reina Sola">
              <figcaption><?php echo $row["titulo"]; ?></figcaption>
            </figure>

            <ul class="ul">
              <div class="li">
                <li class="li">Autor: <?php echo $row["titulo"]; ?></li>
                <li class="li">Editorial: <?php echo $row["editorial"]; ?></li>
                <li class="li">Número de páginas: <?php echo $row["paginas"]; ?></li>
                <li class="li">Año de publicación: <?php echo $row["edicion"]; ?></li>
                <li class="li">Categoría: <?php echo $row["nombre_categoria"]; ?></li>
              </div>
            </ul>
          </div>

          <div class="card-back">
            <figure>
              <div class="img-bg"></div>
              <img src="../docs/imagenes/<?php echo $row["img"]; ?>" alt="">
            </figure>
            <?php $disparador = str_replace(' ', '', $row["titulo"]); ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $disparador ?>">
              Ver libro
            </button>

            <a href="archivospdf.php?nombreLibro=<?php echo $row["pdf"] ?>" class="btn btn-primary">Leer libro</a>

          </div>

        </div>
      </div>

      <!-- modal accion -->


      <div class="modal fade" id="<?php echo $disparador ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> <?php echo $row["titulo"]; ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <iframe src="../docs/pdf/<?php echo $row["pdf"]?>" style="width:100%; height: 480px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /flip-card-container
    <div class="modal-dialog modal-fullscreen-sm-down">
  ...
</div>
     -->



    <?php
    }
    ?>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
      myInput.focus()
    })
  </script>
</body>

</html>