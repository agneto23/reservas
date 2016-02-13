
<?php include 'cabecera.php' ?>

<div class="panel panel-info col-lg-10 col-sm-10">

      <div class="starter-template">
        <p class="lead"> Gestion de Rutas</p>
        <button type="button" onclick="Nuevo();" class="btn btn-primary btn-lg" >
          <span class="glyphicon glyphicon-plus"></span> Nuevo
        </button>
      </div>

        <div class="panel-heading">Lista de Rutas</div>
        <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Ciudad Origen</th>
              <th>Ciudad Destino</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require("../baseDatos/Conexion.php");
            $con = Conectar();
            $sql = "SELECT * FROM Ruta";
            $stmt = $con->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows as $row){
              ?>
              
              <tr>
                <td><?php print($row->rut_id); ?></td>
               
                <?php
                $sql2 = "SELECT * FROM Aeropuerto where aer_id=:aer_ids";
                $stmt2 = $con->prepare($sql2);
                $result2 = $stmt2->execute(array(':aer_ids'=>($row->aer_id_origen)));
                $rows2 = $stmt2->fetchAll(\PDO::FETCH_OBJ);
                foreach($rows2 as $row2){
                ?>
                <td><?php print($row2->aer_ciudad); ?></td>
                <?php
                }
                ?>

                <?php
                $sql2 = "SELECT * FROM Aeropuerto where aer_id=:aer_ids";
                $stmt2 = $con->prepare($sql2);
                $result2 = $stmt2->execute(array(':aer_ids'=>($row->aer_id_destino)));
                $rows2 = $stmt2->fetchAll(\PDO::FETCH_OBJ);
                foreach($rows2 as $row2){
                ?>
                <td><?php print($row2->aer_ciudad); ?></td>
                <?php
                }
                ?>

                <td><?php print($row->rut_estadoLog); ?></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info" onClick="Editar('<?php print($row->rut_id); ?>','<?php print($row->aer_id_origen); ?>','<?php print($row->aer_id_destino); ?>','<?php print($row->rut_estadoLog);?>');">
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
              <div class="modal-title" > Ruta</div>
            </div>
            <form role="form" action="" name="frmRuta">
              <div class="col-lg-12">
                <div class="form-group"><br>
                  <label>Ciudad De Origen</label>
                  <input type="text" class="input-medium search-query form-control" name="ciudadOrigenC" placeholder="Ciudad Origen" id="ciudadOrigenC" autocomplete="off" onKeyUp="buscar('1');" />
                   <ul id="resultadoBusquedaOrigen" class="list-unstyled press"></ul>
                   <input type="hidden" name="ciudadOrigenC1"  id="ciudadOrigenC1" />
                </div>

                <div class="form-group">
                  <label>Ciudad de Destino</label>
                   <input type="text" class="input-medium search-query form-control" name="ciudadDestinoC" placeholder="Ciudad Destino" id="ciudadDestinoC" autocomplete="off" onKeyUp="buscar('2');" />
                   <ul id="resultadoBusquedaDestino" class="list-unstyled press"></ul>
                   <input type="hidden" name="ciudadDestinoC1"  id="ciudadDestinoC1" />
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
              <button type="button" class="btn btn-info" onClick="Registrar_Ruta(rut_id,accion); return false">
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
    var rut_id;
    var OrigenDestino;
    function Nuevo(){
      accion = 'N';
      
      document.frmRuta.ciudadOrigenC.value = "";
      document.frmRuta.ciudadOrigenC1.value = "";
      document.frmRuta.ciudadDestinoC.value = "";
      document.frmRuta.ciudadDestinoC1.value = "";
      document.frmRuta.estado.value = "";
      $("#resultadoBusquedaOrigen").html("");
      $("#resultadoBusquedaDestino").html("");
      $('#modal').modal('show');
    }
    function Editar(id, ciudadOrigen, ciudadDestino,estado){
      accion = 'E';
      rut_id = id;
      document.frmRuta.ciudadOrigenC.value = ciudadOrigen;
      document.frmRuta.ciudadDestinoC.value = ciudadDestino;
      document.frmRuta.ciudadOrigenC1.value = ciudadOrigen;
      document.frmRuta.ciudadDestinoC1.value = ciudadDestino;
      document.frmRuta.estado.value = estado;
      $("#resultadoBusquedaOrigen").html("");
      $("#resultadoBusquedaDestino").html("");
      $('#modal').modal('show');
    }

    function buscar(OD) 
    {
        OrigenDestino=OD;
        if(OrigenDestino=="1"){
        var textoBusqueda = $("input#ciudadOrigenC").val();

        if (textoBusqueda != "") {
            $.post("buscarCiudadRuta.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
              $("#resultadoBusquedaOrigen").html(mensaje);
            }); 
        } else { 
            $("#resultadoBusquedaOrigen").html("");
      };
    };

    if(OrigenDestino=="2"){
        var textoBusqueda = $("input#ciudadDestinoC").val();

        if (textoBusqueda != "") {
            $.post("buscarCiudadRuta.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
              $("#resultadoBusquedaDestino").html(mensaje);
            }); 
        } else { 
            $("#resultadoBusquedaDestino").html("");
      };
    };
  };
    function valor(valor) 
    {

      if(OrigenDestino=="1"){
        document.frmRuta.ciudadOrigenC.value = valor;
        document.frmRuta.ciudadOrigenC1.value = $("#"+valor).val();
        $("#resultadoBusquedaOrigen").html("");
        }
        if(OrigenDestino=="2"){
        document.frmRuta.ciudadDestinoC.value = valor;
        document.frmRuta.ciudadDestinoC1.value = $("#"+valor).val();
        $("#resultadoBusquedaDestino").html("");
        }
    }
    </script>