<?php include 'cabecera.php' ?>

<div class="panel panel-info col-lg-10 col-sm-10">

      <div class="starter-template">
        <p class="lead">Clientes</p>
      </div>

        <div class="panel-heading">Lista de Clientes</div>
        <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Correo</th>
              <th>Clave</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require("../baseDatos/Conexion.php");
            $con = Conectar();
            $sql = "SELECT * FROM cliente";
            $stmt = $con->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows as $row){
              ?>
              <tr>
                <td><?php print($row->cli_cedula); ?></td>
                <td><?php print($row->cli_nombre); ?></td>
                <td><?php print($row->cli_apellido); ?></td>
                <td><?php print($row->cli_direccion); ?></td>
                <td><?php print($row->cli_telefono); ?></td>
                <td><?php print($row->cli_correo); ?></td>
                <td><?php print($row->cli_contrasena); ?></td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
