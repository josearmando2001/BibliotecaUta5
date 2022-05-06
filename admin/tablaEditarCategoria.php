<?php 
      require_once("../bd/conexion.php");
      $editar = filter_var(file_get_contents("php://input"),FILTER_SANITIZE_NUMBER_INT);
      $infTipo=$conex->query("SELECT * FROM categoria WHERE Id_Categoria='$editar'");
      if($infTipo){
            while ($row = $infTipo->fetch_assoc()) {
      
                $id =  $row["Id_Categoria"];
                $nombre =  $row["nombre_categoria"];
       }
       $respuesta=array(
             "Id"=>"$id",
             "Nombre"=>"$nombre"
       );
      }
       echo json_encode($respuesta);
 $conex->close();
?>
