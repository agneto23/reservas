<meta charset="utf-8">
<?php

	$conexion = mysqli_connect("127.0.0.1","root","","reserva");
	mysqli_set_charset($conexion, "utf8");	

	$user ="";
	$pwd = "";
	$name = "";

if(isset($_POST['txtusuario'])){
	$nombre= $_POST["txtusuario"];
	$pass= $_POST["txtpassword"];

	$filas=0;
	if($consulta = mysqli_query($conexion, "select * from cliente where cli_id = $nombre and cli_contrasena = $pass")){
		$filas = mysqli_num_rows($consulta);
	}

	if ($filas === 0) {
		echo "<script language='javascript'>alert('Cedula o contraseña incorrectos');</script>";
		echo '
				<meta http-equiv="refresh" content="1; url=../index.php">';		
	} else {
		while($resultados = mysqli_fetch_array($consulta)) {
			$user = $resultados['cli_id'];
			$pwd = $resultados['cli_contrasena'];
			$c_name = $resultados['cli_nombre'];
			$c_ape = $resultados['cli_apellido'];

			$name = "Bienvenido ".$c_name." ".$c_ape;
 		} 

 		if ($nombre==$user && $pass==$pwd) { 
	 			session_start();
	 			$_SESSION['admin']=$user;
	 			echo "<script language='javascript'>alert('$name');</script>";
	 			echo '
				<meta http-equiv="refresh" content="1; url=../index.php">';		
			}else{
				echo "<meta http-equiv='Refresh' content='1;url=../index.php'>"; 

		};//Fin while $resultados

	}; //Fin else $filas

}else{
	echo '
		<meta http-equiv="refresh" content="1; url=../index.php"> 
	';
	}
?>