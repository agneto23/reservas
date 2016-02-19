<?php
require_once('lib/nusoap.php');
require("conexion.php");
$server = new nusoap_server;
$server->configureWSDL('PHPCentral', 'urn:phpcentral');
$server->wsdl->schemaTargetNamespace = 'urn:phpcentral';

//register a function that works on server
 //$server->register('consulta_nombres');
$server->register('consulta_nombres', array('cedula' => 'xsd:string'), array('return' => 'xsd:string'));

 // create age calculation function


 // create the function 
 function consulta_nombres($cedula)
 {
  	//$result['status'] = "Test goes here";
   	if(!$cedula){
    		return new soap_fault('Client','','Sanjoy Dey!');
   	}  
   	
	$con = Conectar();
	$sql = $con->prepare("SELECT * FROM personas where cedula='".$cedula."'");//preparamos nuestra sentencia SQL
	$sql->execute();//EJECUTAMOS LA SENTENCIA
	$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);//fetchAll Devuelve un array que contiene todas las filas del conjunto de resultados
	
	foreach ($resultado as $row) {// FOREACH RECORRE ARRAYS, $resultado contiene un array de la consulta
	
		
		$result = array('nombres'=>$row['nombres'],'apellidos'=>$row['apellidos'],'direccion'=>$row['direccion'],'telefono'=>$row['telefono']);
	}

  	return json_encode($result);

 }

$HTTP_RAW_POST_DATA = (isset($HTTP_RAW_POST_DATA)) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
exit();

?>
