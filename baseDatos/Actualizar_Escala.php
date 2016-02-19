<?php

$cla_id = $_POST['cla_id'];

$cla_tipo = $_POST['cla_tipo'];

$cla_asientoInicio = $_POST['cla_asientoInicio'];

$cla_asientoFin = $_POST['cla_asientoFin'];

$cla_estadoLog = $_POST['cla_estadoLog'];

$avi_id = $_POST['avi_id'];

require('Conexion.php');

$con = Conectar();
$sql = 'UPDATE Clase SET cla_tipo=:cla_tipo, cla_asientoInicio=:cla_asientoInicio, cla_asientoFin=:cla_asientoFin, cla_estadoLog=:cla_estadoLog WHERE cla_id=:cla_id';
$q = $con->prepare($sql);

$q->execute(array(':cla_tipo'=>$cla_tipo, ':cla_asientoInicio'=>$cla_asientoInicio, ':cla_asientoFin'=>$cla_asientoFin, ':cla_estadoLog'=>$cla_estadoLog, ':cla_id'=>$cla_id));

?>
