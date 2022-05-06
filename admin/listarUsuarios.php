<div class="container">
<table class="table" style="background: #ECF0F1">
    <thead>
        <th class="">Nombre</th>
        <th class="">Seleccionar</th>
    </thead>
    <?php
    require_once("../bd/conexion.php");
    $consult = $conex->query("SELECT * FROM registro");
    while ($row = $consult->fetch_assoc()) {

    ?>
        <tbody>
            <tr>
                <td><?php echo $row["preNombre"]; ?></td>
                <td>
                  <!-- Se envia el id de cada apartado -->
                <a href="formCorreo.php?Id_User=<?php echo $row["Id_Registro"]?>"
                  class=""><input type="submit"class="btn btn-primary"  value="Select"></a>
              </td>
            </tr>

        </tbody>
    <?php
    }
    ?>
</table>
</div>