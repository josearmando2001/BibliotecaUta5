<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .navegacion {
        background-image: linear-gradient(-45deg, #4481eb 0%, #04befe 100%);
        width: 100%;

    }

    .navbar {
      padding: 5px 0px;
   }

   .navbar-nav li:hover>ul.dropdown-menu {
      display: block;
   }

   .dropdown-submenu {
      position: relative;
   }

   .dropdown-submenu>.dropdown-menu {
      top: 0;
      margin-top: -5px;
      left: 100%;
   }

    @media screen and (max-width: 400px) {
        .logo {
            margin: 10px auto;
            display: block;

        }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
<div class="navegacion">
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">UTA</a>
            <img id="logo" class="logo" href="principal.php" src="../img/uta.png" width="50" height="50">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Libros Categorías
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <?php
                     require_once("../bd/conexion.php");
                     $selecionar = $conex->query("SELECT * FROM categoria");
                     while ($row = $selecionar->fetch_assoc()) {

                     ?>
                        <li class="dropdown-submenu">

                           <a class="dropdown-item dropdown-toggle" href="#"><?php echo $row["nombre_categoria"]; ?></a>
                           <ul class="dropdown-menu">
                              <?php
                              $selecCat = $row["Id_Categoria"];
                              $selecionar2 = $conex->query("SELECT * FROM subcategoria WHERE Id_Categoria ='$selecCat'");
                              while ($row2 = $selecionar2->fetch_assoc()) {
                                 $menusid = $row2["Id_Subcategoria"];
                                 $menuDis = $conex->query("SELECT * FROM libro WHERE Id_Subcategoria = '$menusid'");
                                 if ($menuDis->num_rows >= 1) {
                              ?>
                                    <li><a class="dropdown-item" href="archivosCat.php?idCat=<?php echo $row2["Id_Subcategoria"] ?>"><?php echo $row2["nombre"]; ?></a></li>
                                    <hr class="dropdown-divider">
                                 <?php
                                 } else {
                                 ?>
                                    <li><a class="dropdown-item disabled" href="archivosCat.php?idCat=<?php echo $row2["Id_Subcategoria"] ?>"><?php echo $row2["nombre"]; ?></a></li>
                                    <hr class="dropdown-divider">
                              <?php
                                 }
                              }
                              ?>
                           </ul>
                        </li>
                     <?php
                     }
                     ?>
                  </ul>
               </li>
               <?php $nombrecerrar = $_SESSION['usuario']['Id_Usuario'] ?>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" id="cerrarsesion" onclick="cerrarsesionus(<?php echo $nombrecerrar ?>);" href="#" style="color:red">Cerrar Sesión</a>
               </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pdfcel.php" id=""></a>
                    </li>
                </ul>
                <form class="d-flex">
                <a class="nav-link active" href="../php/busca.php" aria-current="page" id="" style="color:white">Buscar</a>
                </form>
            </div>
        </div>
    </nav>
</div>
</div>
<script src="../js/cerrarSesion.js"></script>
<script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>