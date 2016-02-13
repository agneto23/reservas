
<?php include 'cabecera.php' ?>

<div class="panel panel-info col-lg-10 col-sm-10">

      <div class="starter-template">
        <p class="lead"> Gestion de Avion</p>
        <button type="button" onclick="Nuevo();" class="btn btn-primary btn-lg">
          <span class="glyphicon glyphicon-plus"></span> Nuevo
        </button>
      </div>

        <div class="panel-heading">Lista de Aviones</div>
        <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Fecha Llegada</th>
              <th>Fecha Salida</th>
              <th>Hora Llegada</th>
              <th>Hora Salida</th>
              <th>Tipo</th>
              <th>Visa</th>
              <th>Estado</th>
              <th>Ruta</th>
              <th>Avion</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require("../baseDatos/Conexion.php");
            $con = Conectar();
            $sql = "SELECT * FROM vuelo";
            $stmt = $con->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows as $row){
              ?>
              <tr>
                <td><?php print($row->vue_id); ?></td>
                <td><?php print($row->vue_fechaVLlegada); ?></td>
                <td><?php print($row->vue_fechaVSalida); ?></td>
                <td><?php print($row->vue_horaVLlegada); ?></td>
                <td><?php print($row->vue_horaVSalida); ?></td>
                <td><?php print($row->vue_tipo); ?></td>
                <td><?php print($row->vue_visa); ?></td>
                <td><?php print($row->vue_estadoLog); ?></td>
                <td><?php print($row->rut_id); ?></td>
                <td><?php print($row->avi_id); ?></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger btn-xs">Seleccione</button>
                    <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a onclick="Editar('<?php print($row->vue_id); ?>','<?php print($row->vue_fechaVLlegada); ?>','<?php print($row->vue_fechaVSalida);?>','<?php print($row->vue_horaVLlegada);?>','<?php print($row->vue_horaVSalida);?>','<?php print($row->vue_tipo);?>','<?php print($row->vue_visa);?>','<?php print($row->vue_estadoLog);?>','<?php print($row->rut_id);?>','<?php print($row->avi_id);?>');">Actualizar</a></li>
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
              <div class="modal-title">Vuelo</div>
            </div>
            <form role="form" action="" name="frmAeropuerto">
              <div class="col-lg-12">
                <div class="form-group"><br>
                  <label>Fecha Llegada</label>
                 <input type="date" name="fllegada" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Fecha Salida</label>
                  <input type="time" name="fsalida" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Estado</label>
                  <input name="abre" type="text" class="form-control" id="datetimepicker2">
                </div>

                <div class="form-group">
                  <label>Aeropuerto</label>
                  <!--<SELECT NAME="aeropuerto" class="form-control"> 
                  <?php
                
                  $con1 = Conectar();
                  $sql1 = "SELECT aer_id,aer_nombre FROM aeropuerto";
                  $stmt1 = $con->prepare($sql1);
                  $result1 = $stmt1->execute();
                  $rows1 = $stmt1->fetchAll(\PDO::FETCH_OBJ);
                  foreach($rows1 as $row){
                    ?>  
                  <OPTION VALUE="<?php print($row->aer_id); ?>"><?php print($row->aer_nombre); ?></OPTION>
                 
                  <?php
                  }
                  ?>
                  </SELECT>-->

                  <input type="text" class="input-medium search-query form-control" name="aeropuerto" placeholder="Aeropuerto" id="aeropuerto" autocomplete="off" onKeyUp="buscar();" />
                   <ul id="resultadoBusqueda" class="list-unstyled press"></ul>
                   <input type="hidden" name="aeropuerto1"  id="aeropuerto1" />

                </div>
                
              </div>
              
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" onClick="Registrar_Avion(avi_id,accion); return false">
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
    var avi_id;
    function Nuevo(){
      accion = 'N';
      
      $("#resultadoBusqueda").html("");

      $('#modal').modal('show');
    }
    function Editar(id, asiento, aerolinea,estado,aeropuerto){
      accion = 'E';
      avi_id = id;
      document.frmAeropuerto.asiento.value = asiento;
      document.frmAeropuerto.aerolinea.value = aerolinea;
      document.frmAeropuerto.estado.value = estado;
      document.frmAeropuerto.aeropuerto.value = aeropuerto;
      $('#modal').modal('show');
    }



    function buscar() 
    {
        var textoBusqueda = $("input#aeropuerto").val();

        if (textoBusqueda != "") {
            $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
              $("#resultadoBusqueda").html(mensaje);
            }); 
        } else { 
            $("#resultadoBusqueda").html("");
      };
    };

    function valor(valor) 
    {
        document.frmAeropuerto.aeropuerto.value = valor;
        document.frmAeropuerto.aeropuerto1.value = $("#"+valor).val();
        $("#resultadoBusqueda").html("");
        
    }


    $(function() {
    $('#datetimepicker2').datetimepicker({
     format: 'hh:ii',
     startView: 'hour'

    });
    
    $('#datetimepicker3').datetimepicker({
     format: 'hh:ii'
    });
    
    
    });

    </script>