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
$sql = 'UPDATE vuelo SET vue_fechaVLlegada=:fllegada, vue_fechaVSalida=:fsalida, vue_horaVLlegada=:hllegada, vue_fechaVSalida=:hsalida, vue_tipo=:vtipo, vue_visa=:vvisa, vue_estadoLog=:vestado, rut_id=:ruta, avi_id=:avion WHERE vue_id=:id';
$q = $con->prepare($sql);

$q->execute(array(':fllegada'=>$vue_fechaVLlegada, ':fsalida'=>$vue_fechaVSalida, ':hllegada'=>$vue_horaVLlegada, ':hsalida'=>$vue_horaVSalida, ':vtipo'=>$vue_tipo, ':vvisa'=>$vue_visa, ':vestado'=>$vue_estadoLog, ':ruta'=>$rut_id, ':avion'=>$avi_id, ':id'=>$vue_id));

?>

