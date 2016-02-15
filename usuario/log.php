<?php


if(isset($_POST['txtusuario'])){
$nombre= $_POST["txtusuario"];
$pass= $_POST["txtpassword"];


 if ($nombre=='huecas' && $pass=='eloro') { 
 	session_start();
 	$_SESSION['admin']=$nombre;
 	echo "<script language='javascript'>alert('aqui si');</script>";
 	echo '
		<meta http-equiv="refresh" content="1; url=../index.php">';

	
  }else{

  	echo "<meta http-equiv='Refresh' content='1;url=../index.php'>";

 }   
}else{
	echo '
		<meta http-equiv="refresh" content="1; url=../index.php"> 
	';
	}
?>