<?php include 'usuario/cabecera.php' ?>

            

<div class="main">
<!-- content -->
	<section id="content">
		
		<article  class="col2 pad_left1">
			<h2>Selecciona tu Destino</h2>
			<form id="ContactForm" name="ContactForm" action='vuelos1.php' method='POST' >
				<div>
					<div class="wrapper">
						<div class="bg">


							<input type="text" class="input" name="ciudadOrigenC" placeholder="Ciudad Origen" id="ciudadOrigenC" autocomplete="off" onKeyUp="buscar('1');" />
                   <ul id="resultadoBusquedaOrigen" class="list-unstyled press"></ul>
                   <input type="hidden" name="ciudadOrigenC1"  id="ciudadOrigenC1" />	



						</div>




						Origen:<br />
					</div>
					<div class="wrapper">
						<div class="bg">

							<input type="text" class="input" name="ciudadDestinoC" placeholder="Ciudad Destino" id="ciudadDestinoC" autocomplete="off" onKeyUp="buscar('2');" />
                   <ul id="resultadoBusquedaDestino" class="list-unstyled press"></ul>
                   <input type="hidden" name="ciudadDestinoC1"  id="ciudadDestinoC1" />	


						</div>
						Destino:<br />
					</div>
					
					
					<input name="cedulaval" class="hidden" /></div>
					<button type="submit" class="button1">
                  		<span class="glyphicon glyphicon-save" aria-hidden="true"></span> Encuentra tu Vuelo
             		</button>
	
				</div>
			</form>
		</article>
	</section>
<!-- / content -->
</div>
        
          
<br>              
           
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
    function Editar(id, idciudadOrigen,ciudadOrigen, idciudadDestino,ciudadDestino,estado){
      accion = 'E';
      rut_id = id;
      document.frmRuta.ciudadOrigenC.value = ciudadOrigen;
      document.frmRuta.ciudadDestinoC.value = ciudadDestino;
      document.frmRuta.ciudadOrigenC1.value = idciudadOrigen;
      document.frmRuta.ciudadDestinoC1.value = idciudadDestino;
      document.frmRuta.estado.value = estado;
      $("#resultadoBusquedaOrigen").html("");
      $("#resultadoBusquedaDestino").html("");
      $('#modal').modal('show');
    }

    function buscar(OD) 
    {
      var textoBusqueda;
        OrigenDestino=OD;
        if(OrigenDestino=="1"){
        textoBusqueda = $("input#ciudadOrigenC").val();
        textoCiudad = $("input#ciudadDestinoC").val();
        if (textoBusqueda != "") {
            $.post("admin/buscarCiudadRuta.php", {valorBusqueda: textoBusqueda, valorBusquedaO: textoCiudad}, function(mensaje) {
              $("#resultadoBusquedaOrigen").html(mensaje);
            }); 
        } else { 
            $("#resultadoBusquedaOrigen").html("");
      };
    };

    if(OrigenDestino=="2"){
        textoBusqueda = $("input#ciudadDestinoC").val();
        textoCiudad = $("input#ciudadOrigenC").val();
        if (textoBusqueda != "") {
            $.post("admin/buscarCiudadRuta.php", {valorBusqueda: textoBusqueda,  valorBusquedaO: textoCiudad}, function(mensaje) {
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
        document.ContactForm.ciudadOrigenC.value = valor.id;
        document.ContactForm.ciudadOrigenC1.value = valor.value;
        $("#resultadoBusquedaOrigen").html("");
        }
        if(OrigenDestino=="2"){
        document.ContactForm.ciudadDestinoC.value = valor.id;
        document.ContactForm.ciudadDestinoC1.value = valor.value;
        $("#resultadoBusquedaDestino").html("");
        }
    }
    </script>

<?php include 'usuario/piepagina.php' ?>