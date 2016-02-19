<?php
 
$esc_id = $_POST['esc_id'];

$esc_fechaELlegada = $_POST['esc_fechaELlegada'];

$esc_fechaESalida = $_POST['esc_fechaESalida'];

$esc_horaELlegada = $_POST['esc_horaELlegada'];

$esc_horaESalida = $_POST['esc_horaESalida'];

$esc_estadoLog = $_POST['esc_estadoLog'];

$vue_id = $_POST['vue_id'];

$aer_id = $_POST['aer_id'];


require('Conexion.php');

$con = Conectar();
$sql = 'INSERT INTO escala (esc_fechaELlegada, esc_fechaESalida, esc_horaELlegada, esc_horaESalida, esc_estadoLog, aer_id, vue_id) VALUES (:esc_fechaELlegada,:esc_fechaESalida,:esc_horaELlegada,:esc_horaESalida, :esc_estadoLog, :aer_id, :vue_id)';
$q = $con->prepare($sql);

$q->execute(array(':esc_fechaELlegada'=>$esc_fechaELlegada, ':esc_fechaESalida'=>$esc_fechaESalida, ':esc_horaELlegada'=>$esc_horaELlegada, ':esc_horaESalida'=>$esc_horaESalida, ':esc_estadoLog'=>$esc_estadoLog, ':aer_id'=>$aer_id, ':vue_id'=>$vue_id));

?>
