<?php

	$conexion = mysqli_connect("127.0.0.1","root","","reserva");
	mysqli_set_charset($conexion, "utf8");	

	$user ="";
	$pwd = "";
	$name = "";

if(isset($_POST['txtusuario'])){
	$nombre= $_POST["txtusuario"];
	$pass= $_POST["txtpassword"];

	$consulta = mysqli_query($conexion, "select * from cliente where cli_id = $nombre and cli_contrasena = $pass");

		//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p>No se encontraron resultados</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle

		while($resultados = mysqli_fetch_array($consulta)) {
			$user = $resultados['cli_id'];
			$pwd = $resultados['cli_contrasena'];
			
			$name = $resultados['cli_nombre'];
			//Output
			if ($nombre==$user && $pass==$pwd) { 
	 	session_start();
	 	$_SESSION['admin']=$user;
	 	echo "<script language='javascript'>alert('aqui si');</script>";
	 	echo '
			<meta http-equiv="refresh" content="1; url=../index.php">';

		
	}else{

		echo "<meta http-equiv='Refresh' content='1;url=../index.php'>";

 	}  

		};//Fin while $resultados

	}; //Fin else $filas


	 
}else{
	echo '
		<meta http-equiv="refresh" content="1; url=../index.php"> 
	';
	}
?>