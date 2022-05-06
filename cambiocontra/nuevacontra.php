<?php
if (empty($_GET["token"]) && empty($_GET["id_user"]) ) {
    echo "<script>
    alert('USTED NO TIENE ACCESO A ESTE CONTENIDO');
    window.location = '../index.php';
    </script>";
    die();
}
echo $id = $_GET["id_user"];
echo $token=$_GET["token"];
