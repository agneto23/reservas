
<?php include 'cabecera.php' ?>

<div class="panel panel-info col-lg-10 col-sm-10">
        <div class="panel-heading">Lista de Usuarios</div>
        <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th>id</th>
              <th>Nombre</th>
              <th>Ciudad</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require("baseDatos/Conexion.php");
            $con = Conectar();
            $sql = "SELECT aer_id, aer_nombre, aer_cuidad FROM aeropuerto";
            $stmt = $con->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows as $row){
              ?>
              <tr>
                <td><?php print($row->aer_id); ?></td>
                <td><?php print($row->aer_nombre); ?></td>
                <td><?php print($row->aer_cuidad); ?></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger btn-xs">Seleccione</button>
                    <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a onclick="Eliminar('<?php print($row->aer_id); ?>');">Eliminar</a></li>
                      <li><a onclick="Editar('<?php print($row->aer_id); ?>','<?php print($row->aer_nombre); ?>','<?php print($row->aer_cuidad); ?>');">Actualizar</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="modal-title" > Usuario</div>
            </div>
            <form role="form" action="" name="frmClientes">
              <div class="col-lg-12">
                <div class="form-group"><br>
                  <label>Nombres</label>
                  <input name="nombres" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>ocupacion</label>
                  <input name="ocupacion" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Teléfono</label>
                  <input name="telefono" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Sitio Web</label>
                  <input name="sitioweb" class="form-control" required>
                </div>

                
              </div>
              
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" onClick="registrar_aeropuerto(aer_id,accion); return false">
                  <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Grabar
              </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Cancel</button>
            </div>
          </div>
        </div>
      </div>

    </div>