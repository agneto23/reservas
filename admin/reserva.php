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
              <th>Id</th>
              <th>Codigo</th>
              <th>Precio Total</th>
              <th>Estado</th>
              <th>Vuelo</th>
              <th>Cliente</th>

            </tr>
          </thead>
          <tbody>
            <?php
            require("../baseDatos/Conexion.php");
            $con = Conectar();
            $sql = "SELECT * FROM reserva";
            $stmt = $con->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows as $row){
              ?>
              <tr>
                <td><?php print($row->res_id); ?></td>
                <td><?php print($row->res_codigo); ?></td>
                <td><?php print($row->res_precioTotal); ?></td>
                <td><?php print($row->res_estadoLog); ?></td>
                <td><?php print($row->vue_id); ?></td>
                <td><?php print($row->cli_id); ?></td>
               
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
