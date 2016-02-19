
<?php

$cedula = $_POST['cedula'];

$nombres = $_POST['nombre'];

$apellidos = $_POST['apellido'];

$direccion = $_POST['direccion'];

$telefono = $_POST['telefono'];

$correo = $_POST['correo'];

$contra= $_POST['contra'];


$conexion = mysqli_connect("127.0.0.1","root","","reserva");
mysqli_set_charset($conexion, "utf8");

$sql = "INSERT INTO cliente (cli_id,cli_nombre, cli_apellido, cli_direccion, cli_telefono,cli_correo, cli_contrasena) VALUES ('".$cedula."','".$nombres."','".$apellidos."','".$direccion."','".$telefono."','".$correo."','".$contra."')";
mysqli_query($conexion, $sql);

?>
