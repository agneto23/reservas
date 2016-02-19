<?php include 'usuario/cabecera.php' ?>

            

<div class="main">
<!-- content -->
  <section id="content">
    
    <article  class="col2 pad_left1">
      <h2>Confirmar Reserva</h2>
      <form id="ContactForm" name="ContactForm" >
        <div>
          <div class="wrapper">
            
            <?php
            $conexion = mysqli_connect("127.0.0.1","root","","reserva");
            mysqli_set_charset($conexion, "utf8");
            $var = $_POST['gender'];
           

            $rutaaaa = "";
            $consulta = mysqli_query($conexion, "select * from vuelo where vue_id = $var");

            while($resultado = mysqli_fetch_array($consulta)) {
             $rutaaaa =  $resultado['vue_costo'];

            }
            echo "<div class='bg'><input name='cedula' class='input' value='$rutaaaa' /></div>
            Costo:<br />";
            
           
            ?>

            
          </div>
          <div class="wrapper">
            <div class="bg"><input name="nombre" class="input" /></div>
            Nombre:<br />
          </div>
          <div class="wrapper">
            <div class="bg"><input name="apellido" class="input" /></div>
            Apellido:<br />
          </div>
          
          <input name="cedulaval" class="hidden" /></div>
          <button type="button" class="button1" onClick="Registrar_Reserva(); return false">
                      <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Guardar
                </button>
          
        </div>
      </form>
    </article>
  </section>
<!-- / content -->
</div>
        
          
<br>              
           


<?php include 'usuario/piepagina.php' ?>