
<?php include 'cabecera.php' ?>

<?php

echo "<div class='ch-container'>		
<div id='content' class='col-lg-10 col-sm-10'>     
<div class=' row'>

        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <div class='modal-title' > Usuario</div>
            </div>
            <form role='form' action='' name='frmClientes'>
              <div class='col-lg-12'>
                <div class='form-group'><br>
                  <label>Nombres</label>
                  <input name='nombres' class='form-control' required>
                </div>

                <div class='form-group'>
                  <label>ocupacion</label>
                  <input name='ocupacion' class='form-control' required>
                </div>

                <div class='form-group'>
                  <label>Teléfono</label>
                  <input name='telefono' class='form-control' required>
                </div>

                <div class='form-group'>
                  <label>Sitio Web</label>
                  <input name='sitioweb' class='form-control' required>
                </div>
              </div>
              
            </form>
            <div class='modal-footer'>
              <button type='button' class='btn btn-info' onClick='Registrar(idP,accion); return false'>
                  <span class='glyphicon glyphicon-save' aria-hidden='true'></span> Grabar
              </button>
                <button type='button' class='btn btn-danger' data-dismiss='modal'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span> Cancel</button>
            </div>
          </div>
        </div>
</div>
</div><!--/fluid-row-->
</div><!--/.fluid-container-->";

?>
