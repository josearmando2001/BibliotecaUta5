<?php
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Libro</title>
    <link rel="shortcut icon" href="../img/uta.png">

</head>

<body>
<?php
require_once("navResto.php");
$nombreLibro = $_GET["nombreLibro"];?>

<div class="container" >
<iframe src="../ViewerJS/#../docs/pdf/<?php echo $nombreLibro; ?>" style="margin-top:1%; width:100%; height: 610px;" frameborder="0"></iframe>
</div>
<?php require_once("../admin/footer.php"); ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>