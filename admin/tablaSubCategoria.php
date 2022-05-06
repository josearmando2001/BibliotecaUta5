<?php
require_once("../bd/conexion.php");
$infTipo = $conex->query("SELECT * FROM subcategoria");
while ($row = $infTipo->fetch_assoc()) {
      echo "<tr>
       <td>" . $row['nombre'] . "</td>";
      //busqueda de categoria por el primer ciclo
       $catperte = $row["Id_Categoria"];
      $catpert=$conex->query("SELECT * FROM categoria WHERE Id_Categoria = '$catperte'");
      while($row1 = $catpert->fetch_assoc()){
            echo "<td>".$row1["nombre_categoria"]."</td>";
      }
      // inpresiond el boton editar
      echo "<td><input type='submit' value='Editar' onclick=editarSubcategoria('" . $row["Id_Subcategoria"] . "')  class='btn btn-success'></td>";
      //busqueda del si esta usado en un libro 
      $idbs = $row["Id_Subcategoria"];
      $consulta = $conex->query("SELECT * FROM libro WHERE Id_Subcategoria = '$idbs'");
      if ($consulta->num_rows >= 1) {
            echo "
            <td><input type='submit' disabled='disabled' value='Eliminar' onclick=eliminarSubcategoria('" . $row["Id_Subcategoria"] . "') class='btn btn-danger'></td>";
      } else {
            echo "
            <td><input type='submit' value='Eliminar' onclick=eliminarSubcategoria('" . $row["Id_Subcategoria"] . "') class='btn btn-danger'></td>";
      }
    
      echo "</tr>";
}
$conex->close();
