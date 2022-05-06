<?php 
      require_once("../bd/conexion.php");
      $editar = filter_var(file_get_contents("php://input"),FILTER_SANITIZE_NUMBER_INT);
      $infTipo=$conex->query("SELECT * FROM tipo WHERE Id_Tipo='$editar'");
      while ($row = $infTipo->fetch_assoc()) {
            $nombre=$row["nombre"];
      }
      if($infTipo){
            $respuesta=array(
                  "id"=>"$editar",
                  "nombre"=>"$nombre"
            );
      }
      echo json_encode($respuesta);
      $conex->close();
?>
