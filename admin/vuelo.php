
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
              <th>Avion</th>
              <th>Fecha Salida</th>
              <th>Fecha Llegada</th>
              <th>Hora Salida</th>
              <th>Hora Llegada</th>
              <th>Tipo</th>
              <th>Visa</th>
              <th>Costo</th>
              <th>Estado</th>
              <th>Ruta</th>
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

                <?php
                $sql2 = "SELECT * FROM avion where avi_id=:avi_ids";
                $stmt2 = $con->prepare($sql2);
                $result2 = $stmt2->execute(array(':avi_ids'=>($row->avi_id)));
                $rows2 = $stmt2->fetchAll(\PDO::FETCH_OBJ);
                foreach($rows2 as $row2){
                ?>
                <td><?php print($row2->avi_nombre); $nombreavion=$row2->avi_nombre; ?></td>
                <?php
                }
                ?>

                <td><?php print($row->vue_fechaVSalida); ?></td>
                <td><?php print($row->vue_fechaVLlegada); ?></td>
                <td><?php print($row->vue_horaVSalida); ?></td>
                <td><?php print($row->vue_horaVLlegada); ?></td>
                <td><?php 
                  if(($row->vue_tipo)=="D")
                  {print("Directo");}
                  if(($row->vue_tipo)=="E")
                  {print("Escala");}
                ?></td>
                <td><?php print($row->vue_visa); ?></td>
                <td><?php print($row->vue_costo); ?></td>
                <td><?php print($row->vue_estadoLog); ?></td>
                
                <?php
                $sql2 = "SELECT * FROM ruta where rut_id=:rut_ids";
                $stmt2 = $con->prepare($sql2);
                $result2 = $stmt2->execute(array(':rut_ids'=>($row->rut_id)));
                $rows2 = $stmt2->fetchAll(\PDO::FETCH_OBJ);
                foreach($rows2 as $row2){
                  $rutaOrigen=$row2->aer_id_origen;
                  $rutaDestino=$row2->aer_id_destino;
                }
                ?>

                <?php
                $sql2 = "SELECT * FROM aeropuerto where aer_id=:aer_ids";
                $stmt2 = $con->prepare($sql2);
                $result2 = $stmt2->execute(array(':aer_ids'=>($rutaOrigen)));
                $rows2 = $stmt2->fetchAll(\PDO::FETCH_OBJ);
                foreach($rows2 as $row2){
                  $rutaOrigenNombre=$row2->aer_ciudad;
                }
                ?>
                <?php
                $sql2 = "SELECT * FROM aeropuerto where aer_id=:aer_ids";
                $stmt2 = $con->prepare($sql2);
                $result2 = $stmt2->execute(array(':aer_ids'=>($rutaDestino)));
                $rows2 = $stmt2->fetchAll(\PDO::FETCH_OBJ);
                foreach($rows2 as $row2){
                  $rutaDestinoNombre=$row2->aer_ciudad;
                }
                ?>

                <td><?php print($rutaOrigenNombre." - ".$rutaDestinoNombre); ?></td>           
               
                <td>
                  <div class="btn-group">
                    
                    <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Escala
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li onclick="NuevaEscala('<?php print($row->vue_id); ?>');"><a >Agregar Escala</a></li>
                      <li class="divider"></li>
                      <li onclick="VerEscala('<?php print($row->vue_id); ?>');"><a >Ver Escalas</a></li>
                    </ul>
                  </div>
                </td>
                 <td>
                  <div class="btn-group">
                     <button type="button" class="btn btn-info btn-xs" onclick="Editar('<?php print($row->vue_id); ?>','<?php print($row->vue_fechaVLlegada); ?>','<?php print($row->vue_fechaVSalida);?>','<?php print($row->vue_horaVLlegada);?>','<?php print($row->vue_horaVSalida);?>','<?php print($row->vue_tipo);?>','<?php print($row->vue_visa);?>','<?php print($row->vue_costo);?>','<?php print($row->vue_estadoLog);?>','<?php print($row->rut_id);?>','<?php print($rutaOrigenNombre." - ".$rutaDestinoNombre);?>','<?php print($row->avi_id);?>','<?php print($nombreavion);?>');">
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

              <div class="form-group">
                  <label>Fecha Salida</label>
                  <input type="date" name="fsalida" class="form-control" required>
                </div>
                <div class="form-group"><br>
                  <label>Fecha Llegada</label>
                 <input type="date" name="fllegada" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Hora Salida</label>
                  <input name="hsalida" type="time" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Hora Llegada</label>
                  <input name="hllegada" type="time" class="form-control" required>
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
                  <OPTION VALUE="SI">SI</OPTION>
                  <OPTION VALUE="NO">NO</OPTION>
                  </SELECT>
                </div>

                <div class="form-group">
                  <label>Costo</label>
                  <input name="costo" type="text" class="form-control" required>
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


      <div class="modal fade" id="escalas" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="modal-title" > Escala del Vuelo</div>
            </div>
            <form role="form" action="" name="frmEscala">
              <div class="col-lg-12">
                
                 <div class="form-group">
                  <label>Fecha Salida</label>
                  <input type="date" name="fsalida" class="form-control" required>
                </div>
                <div class="form-group"><br>
                  <label>Fecha Llegada</label>
                 <input type="date" name="fllegada" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Hora Salida</label>
                  <input name="hsalida" type="time" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Hora Llegada</label>
                  <input name="hllegada" type="time" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Estado</label>
                  <SELECT NAME="estado" class="form-control"> 
                  <OPTION VALUE="T">Activo</OPTION>
                  <OPTION VALUE="F">Inactivo</OPTION>
                  </SELECT>
                </div>

                <div class="form-group">
                  <label>Ciudad</label>
                  <input name="ciudad" type="text" class="form-control" required>
                  <input type="hidden" name="ciudad1"  id="ciudad1"/>
                </div>
                
              </div>
              
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" onClick="Registrar_Escala(esc_id,codigoV,accion); return false">
                  <span class="glyphicon glyphicon-save" aria-hidden="true" ></span> Guardar
              </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Cancelar</button>
            </div>
          </div>
        </div>
      </div>

   
      <div class="modal fade" id="VerEscala" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="modal-title" > Lista de Escalas</div>
            </div>
             <form role="form" action="" name="frmListaEscala">
             <input type="hidden" name="codigoVuelo"  id="codigoVuelo" />
            
             <table class='table'>
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Fecha Salida</th>
              <th>Fecha Llegada</th>
              <th>Hora Salida</th>
              <th>Hora Llegada</th>
              <th>Estado</th>
              <th>Ciudad</th>
            </tr>
          </thead>
          <tbody  id="resultadoEscala">
          </tbody>
        </table>      
      </div>
    </form>
          </div>
        </div>
      </div>


    </div>


    <script type="text/javascript">
    var accion;
    var vue_id;
    var esc_id;
    var aer_id;
    var codigoV;
    function NuevaEscala(code){
      accion = 'N';
      codigoV=code;
      document.frmEscala.fllegada.value="";
      document.frmEscala.fsalida.value="";
      document.frmEscala.hllegada.value="";
      document.frmEscala.hsalida.value="";
      document.frmEscala.estado.value="";
      document.frmEscala.ciudad.value="";
      document.frmEscala.ciudad1.value="";

      $('#escalas').modal('show');
    }

 /*     function EditarEscala(idescala, fechallegada,fechasalida,horallegada,horasalida, estado, ciudad){
      accion = 'E';
      esc_id = idescala;

      document.frmEscala.fllegada.value=fechallegada;
      document.frmEscala.fsalida.value=fechasalida;
      document.frmEscala.hllegada.value=horallegada;
      document.frmEscala.hsalida.value=horasalida;
      document.frmEscala.estado.value=estado;

      $('#escalas').modal('show');
    }
*/
    function VerEscala(codigo){

      var textoBusqueda = codigo;

        if (textoBusqueda != "") {
            $.post("verEscalas.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
              $("#resultadoEscala").html(mensaje);
            }); 
        } else { 
            $("#resultadoEscala").html("");
      };

      $('#VerEscala').modal('show');
    };
    

    function Nuevo(){
      accion = 'N';
      
      document.frmVuelo.fllegada.value="";
      document.frmVuelo.fsalida.value="";
      document.frmVuelo.hllegada.value="";
      document.frmVuelo.hsalida.value="";
      document.frmVuelo.tipo.value="";
      document.frmVuelo.visa.value="";
      document.frmVuelo.costo.value="";
      document.frmVuelo.estado.value="";
      document.frmVuelo.ruta.value="";
      document.frmVuelo.ruta1.value="";
      document.frmVuelo.avion.value="";
      document.frmVuelo.avion1.value="";
      $("#resultadoBusqueda1").html("");
      $("#resultadoBusqueda2").html("");

      $('#modal').modal('show');
    }
    function Editar(idvuelo, fechallegada,fechasalida,horallegada,horasalida,tipovuelo,visavuelo, costovuelo, estado, idruta,ruta, idavion,nombreAvion){
      accion = 'E';
      vue_id = idvuelo;

      document.frmVuelo.fllegada.value=fechallegada;
      document.frmVuelo.fsalida.value=fechasalida;
      document.frmVuelo.hllegada.value=horallegada;
      document.frmVuelo.hsalida.value=horasalida;
      document.frmVuelo.tipo.value=tipovuelo;
      document.frmVuelo.visa.value=visavuelo;
      document.frmVuelo.costo.value=costovuelo;
      document.frmVuelo.estado.value=estado;
      document.frmVuelo.ruta.value=ruta;
      document.frmVuelo.avion.value=nombreAvion;
      document.frmVuelo.ruta1.value=idruta;
      document.frmVuelo.avion1.value=idavion;
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
        
        document.frmVuelo.ruta.value = valor.id;
        document.frmVuelo.ruta1.value = valor.value;
        $("#resultadoBusqueda1").html("");
        
    }

    function valor(valor) 
    {
        
        document.frmVuelo.avion.value = valor.id;
        document.frmVuelo.avion1.value = valor.value;
        $("#resultadoBusqueda2").html("");
        
    }


    $(function() {
    $('#datetimepicker2').datetimepicker({
     format: 'hh:ii',
     startView: 'hour'

    });
    
   
    
    
    });

    </script>