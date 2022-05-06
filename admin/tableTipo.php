<?php
require_once("../bd/conexion.php");
$infTipo = $conex->query("SELECT * FROM tipo");
while ($row = $infTipo->fetch_assoc()) {
      echo "
      <tr>
      <td>" . $row['nombre'] . "</td>";
      if ($row["Id_Tipo"] == 1 || $row["Id_Tipo"] == 2) {
            echo "
            <td><input type='submit' value='Editar' onclick=editarTipo('" . $row["Id_Tipo"] . "')  class='btn btn-success'></td>
            <td><input type='submit' disabled='disabled' value='Eliminar' onclick=eliminartipo('" . $row["Id_Tipo"] . "') class='btn btn-danger'></td>";
      } else {
            echo "
            <td><input type='submit' value='Editar' onclick=editarTipo('" . $row["Id_Tipo"] . "')  class='btn btn-success'></td>
            <td><input type='submit' value='Eliminar' onclick=eliminartipo('" . $row["Id_Tipo"] . "') class='btn btn-danger'></td>";
      }
      echo "</tr>";
}
$conex->close();