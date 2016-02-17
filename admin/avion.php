
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
              <th>Nombre</th>
              <th>Asientos</th>
              <th>Aerolinea</th>
              <th>Estado</th>
              <th>Aeropuerto</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require("../baseDatos/Conexion.php");
            $con = Conectar();
            $sql = "SELECT * FROM avion";
            $stmt = $con->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows as $row){
              ?>
              <tr>
                <td><?php print($row->avi_id); ?></td>
                <td><?php print($row->avi_nombre); ?></td>
                <td><?php print($row->avi_asientos); ?></td>
                <td><?php print($row->avi_aerolinea); ?></td>
                <td><?php print($row->avi_estadoLog); ?></td>

                 <?php
                $sql2 = "SELECT * FROM Aeropuerto where aer_id=:aer_ids";
                $stmt2 = $con->prepare($sql2);
                $result2 = $stmt2->execute(array(':aer_ids'=>($row->aer_id)));
                $rows2 = $stmt2->fetchAll(\PDO::FETCH_OBJ);
                foreach($rows2 as $row2){
                ?>
                <td><?php print($row2->aer_nombre); $nombre_aeropuero=$row2->aer_nombre; ?></td>
                <?php
                }
                ?>

                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-xs" onclick="Editar('<?php print($row->avi_id); ?>','<?php print($row->avi_nombre); ?>','<?php print($row->avi_asientos); ?>','<?php print($row->avi_aerolinea);?>','<?php print($row->avi_estadoLog);?>','<?php print($nombre_aeropuero);?>','<?php print($row->aer_id);?>','<?php print($nombre_aeropuero);?>');">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Actualizar
                    </button>   
                  </div>
                </td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-xs">Clases</button>
                    <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li onclick="NuevaClase('<?php print($row->avi_id); ?>');"><a >Agregar Clase</a></li>
                      <li class="divider"></li>
                      <li onclick="verclases('<?php print($row->avi_id); ?>');"><a >Ver Clases</a></li>
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
              <div class="modal-title" > Avion</div>
            </div>
            <form role="form" action="" name="frmAeropuerto">
              <div class="col-lg-12">
                
                <div class="form-group"><br>
                  <label>Nombre</label>
                  <input name="nombre" class="form-control" required>
                </div>

                <div class="form-group"><br>
                  <label>Asientos</label>
                  <input name="asiento" class="form-control" required>
                </div>
                
                <div class="form-group">
                  <label>Aerolinea</label>
                  <SELECT NAME="aerolinea" class="form-control"> 
                  <OPTION VALUE="Tame">Tame</OPTION>
                  <OPTION VALUE="Avianca">Avianca</OPTION>
                  <OPTION VALUE="LAN">LAN</OPTION>
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
                  <label>Aeropuerto</label>
                
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



      <div class="modal fade" id="clases" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="modal-title" > Clase del Avion</div>
            </div>
            <form role="form" action="" name="frmClase">
              <div class="col-lg-12">
                
                <div class="form-group"><br>
                  <label>Tipo de Clase</label>
                  <input name="tipo" class="form-control" required>
                </div>

                <div class="form-group"><br>
                  <label>Rango de Asientos - Inicio</label>
                  <input name="asientoInicio" class="form-control" required>
                </div>

                <div class="form-group"><br>
                  <label>Rango de Asientos - Fin</label>
                  <input name="asientoFin" class="form-control" required>
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
              <button type="button" class="btn btn-info" onClick="Registrar_Clase(cla_id, avionIDClase, accion); return false">
                  <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Guardar
              </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Cancelar</button>
            </div>
          </div>
        </div>
      </div>


   

         <div class="modal fade" id="VerClases" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <div class="modal-title" > Lista de Clases</div>
            </div>
             <form role="form" action="" name="frmListaClase">
             <input type="hidden" name="codigoAvion"  id="codigoAvion" />
            
             <table class='table'>
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Tipo</th>
              <th>Asiento Inicio</th>
              <th>Asiento Fin</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody  id="resultadoclases">
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
    var avi_id;
    var avionIDClase;
    var cla_id;
    function Nuevo(){
      accion = 'N';
      document.frmAeropuerto.nombre.value = "";
      document.frmAeropuerto.asiento.value = "";
      document.frmAeropuerto.aerolinea.value = "";
      document.frmAeropuerto.estado.value = "";
      document.frmAeropuerto.aeropuerto.value = "";
      document.frmAeropuerto.aeropuerto1.value = "";
      $("#resultadoBusqueda").html("");

      $('#modal').modal('show');
    }

    function NuevaClase(idavion){
      accion = 'N';
      avionIDClase=idavion;
      document.frmClase.tipo.value="";
      document.frmClase.asientoInicio.value = "";
      document.frmClase.asientoFin.value = "";
      document.frmClase.estado.value = "";
      $('#clases').modal('show');
    }

    

    function Editar(id, nombre, asiento, aerolinea,estado,idaeropuerto,aeropuerto){
      accion = 'E';
      avi_id = id;
      document.frmAeropuerto.nombre.value = nombre;
      document.frmAeropuerto.asiento.value = asiento;
      document.frmAeropuerto.aerolinea.value = aerolinea;
      document.frmAeropuerto.estado.value = estado;
      document.frmAeropuerto.aeropuerto.value = idaeropuerto;
      document.frmAeropuerto.aeropuerto1.value = aeropuerto;
      $('#modal').modal('show');
      $("#resultadoBusqueda").html("");
    }

      function EditarClase(id, tipo, asientoInicio, asientoFin,estado){
      alert("si");
      accion = 'E';
      cla_id = id;
      document.frmClase.tipo.value = tipo;
      document.frmClase.asientoInicio.value = asientoInicio;
      document.frmClase.asientoFin.value = asientoFin;
      document.frmClase.estado.value = estado;
      $('#clases').modal('show');
    }

    function EditarClase(hola){
      accion = 'N';
      document.frmClase.tipo.value="";
      document.frmClase.asientoInicio.value = "";
      document.frmClase.asientoFin.value = "";
      document.frmClase.estado.value = "";
      $('#clases').modal('show');
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


    function verclases(codigo) 
    {
        var textoBusqueda = codigo;

        if (textoBusqueda != "") {
            $.post("VerClases.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
              $("#resultadoclases").html(mensaje);
            }); 
        } else { 
            $("#resultadoclases").html("");
      };

      $('#VerClases').modal('show');
    };

    function valor(valor) 
    {

        document.frmAeropuerto.aeropuerto.value = valor.id;
        document.frmAeropuerto.aeropuerto1.value = valor.value;
        $("#resultadoBusqueda").html("");
        
    }


    </script>