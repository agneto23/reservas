
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
                     <button type="button" class="btn btn-info" onclick="Editar('<?php print($row->vue_id); ?>','<?php print($row->vue_fechaVLlegada); ?>','<?php print($row->vue_fechaVSalida);?>','<?php print($row->vue_horaVLlegada);?>','<?php print($row->vue_horaVSalida);?>','<?php print($row->vue_tipo);?>','<?php print($row->vue_visa);?>','<?php print($row->vue_estadoLog);?>','<?php print($row->rut_id);?>','<?php print($row->avi_id);?>');">
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
              <div class="modal-title">Vuelo</div>
            </div>
            <form role="form" action="" name="frmVuelo">
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
                  <SELECT NAME="tipo" class="form-control"> 
                  <OPTION VALUE="D">Directo</OPTION>
                  <OPTION VALUE="E">Escala</OPTION>
                  </SELECT>
                </div>

                <div class="form-group">
                  <label>Visa</label>
                  <SELECT NAME="visa" class="form-control"> 
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
              <button type="button" class="btn btn-info" onClick="Registrar_Vuelo(vue_id,accion); return false">
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
    var vue_id;
    function Nuevo(){
      accion = 'N';
      
      document.frmVuelo.fllegada.value="";
      document.frmVuelo.fsalida.value="";
      document.frmVuelo.hllegada.value="";
      document.frmVuelo.hsalida.value="";
      document.frmVuelo.tipo.value="";
      document.frmVuelo.visa.value="";
      document.frmVuelo.estado.value="";
      document.frmVuelo.ruta.value="";
      document.frmVuelo.avion.value="";
      $("#resultadoBusqueda1").html("");
      $("#resultadoBusqueda2").html("");

      $('#modal').modal('show');
    }
    function Editar(id, fechallegada,fechasalida,horallegada,horasalida,tipovuelo,visavuelo, estado, idruta, idavion){
      accion = 'E';
      vue_id = id;

      document.frmVuelo.fllegada.value=fechallegada;
      document.frmVuelo.fsalida.value=fechasalida;
      document.frmVuelo.hllegada.value=horallegada;
      document.frmVuelo.hsalida.value=horasalida;
      document.frmVuelo.tipo.value=tipovuelo;
      document.frmVuelo.visa.value=visavuelo;
      document.frmVuelo.estado.value=estado;
      document.frmVuelo.ruta.value=idruta;
      document.frmVuelo.avion.value=idavion;
      $("#resultadoBusqueda1").html("");
      $("#resultadoBusqueda2").html("");
      $('#modal').modal('show');
    }



    function buscar() 
    {
        var textoBusqueda = $("input#ruta").val();

        if (textoBusqueda != "") {
            $.post("buscarRuta.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
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

    function valor2(valor) 
    {
        alert($("#"+valor).val());
        document.frmVuelo.ruta.value = valor;
        document.frmVuelo.ruta1.value = $("#"+valor).val();
        $("#resultadoBusqueda1").html("");
        
    }

    function valor(valor) 
    {
        alert($("#"+valor).val());
        document.frmVuelo.avion.value = valor;
        document.frmVuelo.avion1.value = $("#"+valor).val();
        $("#resultadoBusqueda2").html("");
        
    }


    $(function() {
    $('#datetimepicker2').datetimepicker({
     format: 'hh:ii',
     startView: 'hour'

    });
    
   
    
    
    });

    </script>