<?php include 'usuario/cabecera.php' ?>

            

<div class="main">
<!-- content -->
	<section id="content">
		
		<article  class="col2 pad_left1">
    <div >
			<h2>Selecciona tu Vuelo</h2>
			<form id="ContactForm" name="ContactForm" action='vuelos2.php' method='POST'>
				
        <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th>Fecha de Salida</th>
              <th>Fecha de LLegada</th>
              <th>Hora de Salida</th>
              <th>Hora de Llegada</th>
              <th>Costo</th>
              <th>Seleccion</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $conexion = mysqli_connect("127.0.0.1","root","","reserva");
            mysqli_set_charset($conexion, "utf8");
            $var = $_POST['ciudadOrigenC1'];
            $var1 = $_POST['ciudadDestinoC1'];

            $rutaaaa = "";
            $consulta = mysqli_query($conexion, "select * from ruta where aer_id_origen = $var and aer_id_destino = $var1");

            while($resultado = mysqli_fetch_array($consulta)) {
             $rutaaaa =  $resultado['rut_id'];

            }
            $consulta1 = mysqli_query($conexion, "select * from vuelo where rut_id = $rutaaaa");


           
             while($resultado2 = mysqli_fetch_array($consulta1)) {
              ?>
              <tr>
                
                <td><?php print($resultado2['vue_fechaVSalida']); ?></td>
                <td><?php print($resultado2['vue_fechaVLlegada']); ?></td>
                <td><?php print($resultado2['vue_horaVSalida']); ?></td>
                <td><?php print($resultado2['vue_horaVLlegada']); ?></td>
                <td><?php print($resultado2['vue_costo']); ?></td>

                
                  <td>  <input type="radio" name="gender" value=<?php print($resultado2['vue_id']); ?>> </td>
                
                
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
        <br>
        <button type="submit" class="button1">
                      <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Encuentra tu Vuelo
                </button>
      </div>
			</form>
      </div>
		</article>
	</section>
<!-- / content -->
</div>
        
          
<br>              
           
<script type="text/javascript">
 
    
    </script>

<?php include 'usuario/piepagina.php' ?>