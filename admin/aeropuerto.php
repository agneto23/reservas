
<?php include 'cabecera.php' ?>

<div class="panel panel-info col-lg-10 col-sm-10">

      <div class="starter-template">
        <p class="lead"> Gestion de Aeropuertos</p>
        <button type="button" onclick="Nuevo();" class="btn btn-primary btn-lg" >
          <span class="glyphicon glyphicon-plus"></span> Nuevo
        </button>
      </div>

        <div class="panel-heading">Lista de Aeropuertos</div>
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
            require("../baseDatos/Conexion.php");
            $con = Conectar();
            $sql = "SELECT aer_id, aer_nombre, aer_ciudad FROM aeropuerto";
            $stmt = $con->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows as $row){
              ?>
              <tr>
                <td><?php print($row->aer_id); ?></td>
                <td><?php print($row->aer_nombre); ?></td>
                <td><?php print($row->aer_ciudad); ?></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger btn-xs">Seleccione</button>
                    <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a onclick="Eliminar_Aeropuerto('<?php print($row->aer_id); ?>');">Eliminar</a></li>
                      <li><a onclick="Editar('<?php print($row->aer_id); ?>','<?php print($row->aer_nombre); ?>','<?php print($row->aer_ciudad);?>');">Actualizar</a></li>
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
              <div class="modal-title" > Aeropuerto</div>
            </div>
            <form role="form" action="" name="frmAeropuerto">
              <div class="col-lg-12">
                <div class="form-group"><br>
                  <label>Nombre</label>
                  <input name="nombre" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Ciudad</label>
                  <input name="ciudad" class="form-control" required>
                </div>
                
              </div>
              
            </form>
            <div class="modal-footer">s
              <button type="button" class="btn btn-info" onClick="Registrar_Aeropuerto(aer_id,accion); return false">
                  <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Grabar
              </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Cancel</button>
            </div>
          </div>
        </div>
      </div>

    </div>


    <script type="text/javascript">
    var accion;
    function Nuevo(){
      accion = 'N';
      document.frmAeropuerto.nombre.value = "";
      document.frmAeropuerto.ciudad.value = "";
      $('#modal').modal('show');
    }
    function Editar(id, nombre, ciudad){
      accion = 'E';
      document.frmAeropuerto.nombre.value = nombre;
      document.frmAeropuerto.ciudad.value = ciudad;
      $('#modal').modal('show');
    }

    </script>