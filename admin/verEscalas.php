<?php
 
 	 require("../baseDatos/Conexion.php");
     $con = Conectar();
	$cod = $_POST['valorBusqueda'];

	//Filtro anti-XSS
	$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
	$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
	$cod = str_replace($caracteres_malos, $caracteres_buenos, $cod);
	$mensaje="";


	if (isset($cod)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	

		
            $sql3 = "SELECT * FROM  Escala where vue_id=:codigoA";
            $stmt3 = $con->prepare($sql3);
            $result3 = $stmt3->execute(array(':codigoA'=>($cod)));
            $rows3 = $stmt3->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows3 as $row3){

            $id = $row3->esc_id;
            $fsalida = $row3->esc_fechaESalida;
            $fllegada = $row3->esc_fechaELlegada;
            $hsalida = $row3->esc_horaESalida;
            $hllegada = $row3->esc_horaELlegada;
            $estado = $row3->esc_estadoLog;
            $ciudad = $row3->aer_id;	
            $mensaje .= "


         
              <tr>
                <td>".$id."</td>
                <td>".$fsalida."</td>
                <td>".$fllegada."</td>
                <td>".$hsalida."</td>
                <td>".$hllegada."</td>
                <td>".$estado."</td>
                <td>".$ciudad."</td>

                 
                <td>
                  <div class='btn-group'>
                    <button type='button' class='btn btn-info btn-xs')>
                    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span> Actualizar
                    </button>   
                  </div>
                </td>
              </tr>

            ";

              }
	

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>