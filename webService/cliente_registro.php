<?php

require_once('lib/nusoap.php');
header('Content-type: text/html');

//$client = new nusoap_client('http://localhost/webservice/server_registro.php');
$urlWebService = 'http://localhost/webservice/server_registro.php';
$urlWSDL = $urlWebService . '?wsdl';

// Creo el objeto soapclient
$client = new nusoap_client($urlWSDL, 'wsdl');


//$response=array();
$response = $client->call('consulta_nombres',array('cedula' => '0703522078'));
$response1=json_decode($response,true);
echo "<pre>";

//print_r(json_decode($response));


print_r($response1['nombres']." ".$response1['apellidos']." ".$response1['direccion']." ".$response1['telefono']);


//$myVar = json_decode($response['nombres']);
//print_r($myVar);
?>
