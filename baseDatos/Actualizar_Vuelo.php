<?php

$vue_id = $_POST['vue_id'];

$vue_fechaVLlegada = $_POST['vue_fechaVLlegada'];

$vue_fechaVSalida = $_POST['vue_fechaVSalida'];

$vue_horaVLlegada = $_POST['vue_horaVLlegada'];

$vue_horaVSalida = $_POST['vue_horaVSalida'];

$vue_tipo = $_POST['vue_tipo'];

$vue_visa= $_POST['vue_visa'];

$vue_estadoLog = $_POST['vue_estadoLog'];

$rut_id = $_POST['rut_id'];

$avi_id = $_POST['avi_id'];

require('Conexion.php');

$con = Conectar();
$sql = 'UPDATE vuelo set vue_fechaVLlegada=:vue_fechaVLlegada, vue_fechaVSalida=:vue_fechaVSalida, vue_horaVLlegada=:vue_horaVLlegada, vue_horaVSalida=:vue_horaVSalida, vue_tipo=:vue_tipo, vue_visa=:vue_visa, vue_estadoLog=:vue_estadoLog, rut_id=:rut_id, avi_id=:avi_id where vue_id=:vue_id';
$q = $con->prepare($sql);

$q->execute(array(':vue_fechaVLlegada'=>$vue_fechaVLlegada, ':vue_fechaVSalida'=>$vue_fechaVSalida, ':vue_horaVLlegada'=>$vue_horaVLlegada, ':vue_horaVSalida'=>$vue_horaVSalida, ':vue_tipo'=>$vue_tipo, ':vue_visa'=>$vue_visa, ':vue_estadoLog'=>$vue_estadoLog, ':rut_id'=>$rut_id, ':avi_id'=>$avi_id), ':vue_id'=>$vue_id);

?>
