<?php
require_once("../bd/conexion.php");
$infTipo = $conex->query("SELECT * FROM categoria");
while ($row = $infTipo->fetch_assoc()) {
      echo "
      <tr>
      <td>" . $row['nombre_categoria'] . "</td>
      <td><input type='submit' value='Editar' onclick=editarcategoria('" . $row["Id_Categoria"] . "')  class='btn btn-success'></td>
      ";
      $idbs = $row["Id_Categoria"];
      $consulta = $conex->query("SELECT * FROM subcategoria WHERE Id_Categoria = '$idbs'");
      if ($consulta->num_rows >= 1) {
            echo "
            <td><input type='submit' disabled='disabled' value='Eliminar' onclick=eliminarcategoria('" . $row["Id_Categoria"] . "') class='btn btn-danger'></td>";
      } else {
            echo "
            <td><input type='submit' value='Eliminar' onclick=eliminarcategoria('" . $row["Id_Categoria"] . "') class='btn btn-danger'></td>";
      }

      echo "</tr>";
}
$conex->close();
