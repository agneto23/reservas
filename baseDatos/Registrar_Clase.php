<?php

$cla_id = $_POST['cla_id'];

$cla_tipo = $_POST['cla_tipo'];

$cla_asientoInicio = $_POST['cla_asientoInicio'];

$cla_asientoFin = $_POST['cla_asientoFin'];

$cla_estadoLog = $_POST['cla_estadoLog'];

$avi_id = $_POST['avi_id'];


require('Conexion.php');

$con = Conectar();
$sql = 'INSERT INTO Clase (cla_tipo, cla_asientoInicio, cla_asientoFin,cla_estadoLog,avi_id) VALUES (:cla_tpo, :cla_asientosInicio, :cla_asientosFin,:cla_estadoLog,:avi_id)';
$q = $con->prepare($sql);

$q->execute(array(':cla_tpo'=>$cla_tipo, ':cla_asientosInicio'=>$cla_asientoInicio, ':cla_asientosFin'=>$cla_asientoFin, ':cla_estadoLog'=>$cla_estadoLog, ':avi_id'=>$avi_id));

?>
