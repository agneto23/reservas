<?php


$avi_id = $_POST['avi_id'];

$avi_nombre = $_POST['avi_nombre'];

$avi_asientos = $_POST['avi_asientos'];

$avi_aerolinea = $_POST['avi_aerolinea'];

$avi_estadoLog = $_POST['avi_estadoLog'];

$aer_id = $_POST['aer_id'];


require('Conexion.php');

$con = Conectar();
$sql = 'UPDATE avion SET avi_nombre=:nombre, avi_estadoLog=:estado, avi_asientos=:asientos, avi_aerolinea=:aerolinea, aer_id=:aeropuerto WHERE avi_id=:id';
$q = $con->prepare($sql);

$q->execute(array(':nombre'=>$avi_nombre, ':asientos'=>$avi_asientos, ':aerolinea'=>$avi_aerolinea, ':id'=>$avi_id, ':estado'=>$avi_estadoLog, ':aeropuerto'=>$aer_id));

?>
