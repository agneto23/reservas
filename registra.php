<?php include 'usuario/cabecera.php' ?>

            

<div class="main">
<!-- content -->
	<section id="content">
		
		<article  class="col2 pad_left1">
			<h2>Ingresa tu informacion</h2>
			<form id="ContactForm" name="ContactForm" >
				<div>
					<div class="wrapper">
						<div class="bg"><input name="cedula" class="input" /></div>
						Cedula:<br />
					</div>
					<div class="wrapper">
						<div class="bg"><input name="nombre" class="input" /></div>
						Nombre:<br />
					</div>
					<div class="wrapper">
						<div class="bg"><input name="apellido" class="input" /></div>
						Apellido:<br />
					</div>
					<div class="wrapper">
						<div class="bg"><input name="direccion" class="input" /></div>
						Direccion:<br />
					</div>
					<div class="wrapper">
						<div class="bg"><input name="telefono" class="input" /></div>
						Telefono:<br />
					</div>
					<div class="wrapper">
						<div class="bg"><input name="correo" class="input" /></div>
						Correo:<br />
					</div>
					<div class="wrapper">
						<div class="bg"><input name="contra" class="input" /></div>
						Contraseña:<br />
					</div>
					<div class="wrapper">
						<div class="bg"><input name="c_contra" class="input" /></div>
						Confirmar Contraseña:<br />
					</div>
					<input name="cedulaval" class="hidden" /></div>
					<button type="button" class="button1" onClick="Registrar_Cliente(); return false">
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