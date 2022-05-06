<?php 
      require_once("../bd/conexion.php");
      $editar = filter_var(file_get_contents("php://input"),FILTER_SANITIZE_NUMBER_INT);
      $infTipo=$conex->query("SELECT * FROM subcategoria WHERE Id_Subcategoria='$editar'");
      if($infTipo){
            while ($row = $infTipo->fetch_assoc()) {
                $id =  $row["Id_Subcategoria"];
                $nombre =  $row["nombre"];
                $cact = $row["Id_Categoria"];
       }
       $selcnomCat = $conex->query("SELECT * FROM categoria WHERE Id_Categoria = '$cact'");
       while($row2 = $selcnomCat->fetch_assoc()){
            $nombrcact = $row2["nombre_categoria"];
       }
       $respuesta=array(
             "Id"=>"$id",
             "Nombre"=>"$nombre",
             "Cat"=>"$nombrcact"
            );
      }
       echo json_encode($respuesta);
 $conex->close();
?>
