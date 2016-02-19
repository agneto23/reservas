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

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	




	$consulta = mysqli_query($conexion, "select * from avion where  avi_aerolinea like '%$consultaBusqueda%' or avi_nombre like '%$consultaBusqueda%' and avi_EstadoLog = 'T'");

		//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p>No se encontraron resultados</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle

		while($resultados = mysqli_fetch_array($consulta)) {
			$avi_nombre = $resultados['avi_nombre'];
			$avi_aerolinea = $resultados['avi_aerolinea'];
			$id = $resultados['avi_id'];
			//Output
			$mensaje .= "
  			<li onclick='valor(this)' id='".$avi_nombre."' name='".$avi_nombre."' value='".$id."' class='list-group-item search-query'>".$avi_nombre."  -->  ".$avi_aerolinea."</li>";
  			

		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>