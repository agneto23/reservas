<?php

$avi_id = $_POST['avi_id'];

$avi_nombre = $_POST['avi_nombre'];

$avi_asientos = $_POST['avi_asientos'];

$avi_aerolinea = $_POST['avi_aerolinea'];

$avi_estadoLog = $_POST['avi_estadoLog'];

$aer_id = $_POST['aer_id'];


require('Conexion.php');

$con = Conectar();
$sql = 'INSERT INTO avion (avi_nombre, avi_asientos, avi_aerolinea,avi_estadoLog,aer_id) VALUES (:nombre, :asiento, :aerolinea,:estado,:aeropuerto)';
$q = $con->prepare($sql);

$q->execute(array(':nombre'=>$avi_nombre, ':asiento'=>$avi_asientos, ':aerolinea'=>$avi_aerolinea, ':estado'=>$avi_estadoLog, ':aeropuerto'=>$aer_id));

?>
