<?php

$aer_id = $_POST['aer_id'];

$aer_nombre = $_POST['aer_nombre'];

$aer_ciudad = $_POST['aer_ciudad'];


require('Conexion.php');

$con = Conectar();
$sql = 'UPDATE aeropuerto SET aer_nombre=:nombre, aer_ciudad=:ciudad WHERE aer_id=:id';
$q = $con->prepare($sql);

$q->execute(array(':nombre'=>$aer_nombre, ':ciudad'=>$aer_ciudad, ':id'=>$aer_id));

?>
