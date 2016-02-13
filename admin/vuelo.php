
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
                  <input type="date" name="fsalida" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Hora Llegada</label>
                  <input name="hllegada" type="time" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Hora Salida</label>
                  <input name="hsalida" type="time" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Tipo</label>
                  <SELECT NAME="estado" class="form-control"> 
                  <OPTION VALUE="D">Directo</OPTION>
                  <OPTION VALUE="E">Escala</OPTION>
                  </SELECT>
                </div>

                <div class="form-group">
                  <label>Visa</label>
                  <SELECT NAME="estado" class="form-control"> 
                  <OPTION VALUE="S">Si</OPTION>
                  <OPTION VALUE="N">No</OPTION>
                  </SELECT>
                </div>

                <div class="form-group">
                  <label>Estado</label>
                  <SELECT NAME="estado" class="form-control"> 
                  <OPTION VALUE="T">Activo</OPTION>
                  <OPTION VALUE="F">Inactivo</OPTION>
                  </SELECT>
                </div>

                <div class="form-group">
                  <label>Ruta</label>
                  <input type="text" class="input-medium search-query form-control" name="ruta" placeholder="Ruta" id="ruta" autocomplete="off" onKeyUp="buscar();" />
                   <ul id="resultadoBusqueda1" class="list-unstyled press"></ul>
                   <input type="hidden" name="ruta1"  id="ruta1"/>
                </div>

                <div class="form-group">
                  <label>Avion</label>
                  <input type="text" class="input-medium search-query form-control" name="avion" placeholder="Avion" id="avion" autocomplete="off" onKeyUp="buscar2();" />
                   <ul id="resultadoBusqueda2" class="list-unstyled press"></ul>
                   <input type="hidden" name="avion1"  id="avion1" />
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
        var textoBusqueda = $("input#ruta").val();

        if (textoBusqueda != "") {
            $.post("buscarCiudadRuta.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
              $("#resultadoBusqueda1").html(mensaje);
            }); 
        } else { 
            $("#resultadoBusqueda1").html("");
      };
    };


    function buscar2() 
    {
        var textoBusqueda = $("input#avion").val();

        if (textoBusqueda != "") {
            $.post("buscarAvion.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
              $("#resultadoBusqueda2").html(mensaje);
            }); 
        } else { 
            $("#resultadoBusqueda2").html("");
      };
    };

    function valor(valor) 
    {
        document.frmAeropuerto.ruta.value = valor;
        document.frmAeropuerto.ruta1.value = $("#"+valor).val();
        $("#resultadoBusqueda2").html("");
        
    }

    function valor2(valor) 
    {
        document.frmAeropuerto.avion.value = valor;
        document.frmAeropuerto.avion1.value = $("#"+valor).val();
        $("#resultadoBusqueda2").html("");
        
    }


    $(function() {
    $('#datetimepicker2').datetimepicker({
     format: 'hh:ii',
     startView: 'hour'

    });
    
   
    
    
    });

    </script>