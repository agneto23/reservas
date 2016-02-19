
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
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Ciudad</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require("../baseDatos/Conexion.php");
            $con = Conectar();
            $sql = "SELECT * FROM aeropuerto";
            $stmt = $con->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows as $row){
              ?>
              <tr>
                <td><?php print($row->aer_id); ?></td>
                <td><?php print($row->aer_nombre); ?></td>
                <td><?php print($row->aer_ciudad); ?></td>
                <td><?php print($row->aer_estadoLog); ?></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-xs" onclick="Editar('<?php print($row->aer_id); ?>','<?php print($row->aer_nombre); ?>','<?php print($row->aer_ciudad);?>','<?php print($row->aer_estadoLog);?>');">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Actualizar
                    </button> 
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

                <div class="form-group">
                  <label>Estado</label>
                  <SELECT NAME="estado" class="form-control"> 
                  <OPTION VALUE="T">Activo</OPTION>
                  <OPTION VALUE="F">Inactivo</OPTION>
                  </SELECT>
                </div>
                
              </div>
              
            </form>
            <div class="modal-footer">
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
    var aer_id;
    function Nuevo(){
      accion = 'N';
      document.frmAeropuerto.nombre.value = "";
      document.frmAeropuerto.ciudad.value = "";
      document.frmAeropuerto.estado.value = "";
      $('#modal').modal('show');
    }
    function Editar(id, nombre, ciudad,estado){
      accion = 'E';
      aer_id = id;
      document.frmAeropuerto.nombre.value = nombre;
      document.frmAeropuerto.ciudad.value = ciudad;
      document.frmAeropuerto.estado.value = estado;
      $('#modal').modal('show');
    }

    </script>