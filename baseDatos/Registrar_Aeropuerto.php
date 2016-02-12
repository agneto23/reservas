<?php

$aer_id = $_POST['aer_id'];

$aer_nombre = $_POST['aer_nombre'];

$aer_ciudad = $_POST['aer_ciudad'];

$aer_estadoLog = $_POST['aer_estadoLog'];


require('Conexion.php');

$con = Conectar();
$sql = 'INSERT INTO aeropuerto (aer_nombre, aer_ciudad,aer_estadoLog) VALUES (:nombre, :ciudad,:estado)';
$q = $con->prepare($sql);

$q->execute(array(':nombre'=>$aer_nombre, ':ciudad'=>$aer_ciudad, ':estado'=>$aer_estadoLog));

?>
