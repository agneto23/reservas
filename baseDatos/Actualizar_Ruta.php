<?php


$rut_id = $_POST['rut_id'];

$rut_estadoLog = $_POST['rut_estadoLog'];

$aer_id_origen = $_POST['aer_id_origen'];

$aer_id_destino = $_POST['aer_id_destino'];


require('Conexion.php');

$con = Conectar();
$sql = 'UPDATE ruta SET rut_estadoLog=:estado, aer_id_origen=:origen, aer_id_destino=:destino WHERE rut_id=:id';
$q = $con->prepare($sql);

$q->execute(array(':estado'=>$rut_estadoLog,':origen'=>$aer_id_origen, ':destino'=>$aer_id_destino, ':id'=>$rut_id));

?>
