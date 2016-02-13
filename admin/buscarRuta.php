<?php
 
 	$conexion = mysqli_connect("127.0.0.1","root","","reserva");
	mysqli_set_charset($conexion, "utf8");
	$consultaBusqueda = $_POST['valorBusqueda'];

	//Filtro anti-XSS
	$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
	$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
	$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
	$mensaje="";


	if (isset($consultaBusqueda)) {

	$consulta = mysqli_query($conexion, "select * from aeropuerto where  aer_ciudad like '%$consultaBusqueda%' and aer_estadoLog = 'T'" );
	$filas = mysqli_num_rows($consulta);

	if ($filas === 0) {
		$mensaje = "<p>No se encontraron resultados</p>";
	} else {

		while($resultados = mysqli_fetch_array($consulta)) {

			$id = $resultados['aer_id'];

			/////////////////////////////////
			$consulta2 = mysqli_query($conexion, "select * from ruta where  aer_id_origen like '%$id%' or aer_id_destino like '%$id%' and rut_estadoLog = 'T'" );

			$filas = mysqli_num_rows($consulta2);

			if ($filas === 0) {
				$mensaje = "<p>No se encontraron resultados</p>";
			} else {

			while($resultados2 = mysqli_fetch_array($consulta2)) {
			$aer_id_origen = $resultados2['aer_id_origen'];
			$aer_id_destino = $resultados2['aer_id_destino'];			
			$id = $resultados2['rut_id'];

			$consulta3 = mysqli_query($conexion, "select * from aeropuerto where  aer_id = $aer_id_origen");
			while($resultados3 = mysqli_fetch_array($consulta3)) {
			$ciudadOrigen = $resultados3['aer_ciudad'];
			};

			$consulta3 = mysqli_query($conexion, "select * from aeropuerto where  aer_id = $aer_id_destino");
			while($resultados3 = mysqli_fetch_array($consulta3)) {
			$ciudadDestino = $resultados3['aer_ciudad'];
			};

			$mensaje .= "
  			<li onclick='valor2(this.id)' id='".$ciudadOrigen." - ".$ciudadDestino."' name='".$ciudadOrigen."' value='".$id."' class='list-group-item search-query'>".$ciudadOrigen." - ".$ciudadDestino."</li>";

			};
			};
			//////////////////////////////////////////
		};//Fin while $resultados
	}; //Fin else $filas
};//Fin isset $consultaBusqueda
echo $mensaje;
?>