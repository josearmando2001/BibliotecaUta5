<?php
include("../bd/conexion.php");
$salida= "";
if(isset($_POST["buscar"])){
    $q = $conex->real_escape_string($_POST["buscar"]);
    $query="SELECT Id_Libro,Id_Subcategoria,autor,titulo,editorial,edicion,paginas,descripcion,img,pdf FROM libro WHERE 
    autor LIKE '%".$q."' OR titulo LIKE '%".$q."%'";
}
$respuesta = $conex->query($query);
if($respuesta->num_rows > 0){
    while ($row = $respuesta->fetch_assoc()) {
        $salida = '  <div class="card">
<img src="../docs/imagenes/'.$row["img"].'" class=" img-bg card-img-top" alt="...">
<div class="card-body">
    <h5 class="card-title">'.$row["titulo"].'</h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Autor: '.$row["autor"].' ?></li>
        <li class="list-group-item">Editorial:'.$row["paginas"].' </li>
        <li class="list-group-item">Número de páginas: '.$row["paginas"].'</li>
        <li class="list-group-item">Año de publicación:'.$row["edicion"].'</li>
        <li class="list-group-item">Descripción:'.$row["descripcion"].'</li>

    </ul>
</div>
<div class="card-footer text-muted">
    <a href="archivospdf.php?nombreLibro='.$row["pdf"].'" class="btn btn-primary">Leer
        libro</a>
</div>
</div>';
}
echo $salida;
}
?>
