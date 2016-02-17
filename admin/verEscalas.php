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
	

		
            $sql3 = "SELECT * FROM  clase where avi_id=:codigoA";
            $stmt3 = $con->prepare($sql3);
            $result3 = $stmt3->execute(array(':codigoA'=>($cod)));
            $rows3 = $stmt3->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows3 as $row3){

            $id = $row3->cla_id;
            $tipo = $row3->cla_tipo;
            $asientoi = $row3->cla_asientoInicio;
            $asientof = $row3->cla_asientoFin;
            $estado = $row3->cla_estadoLog;	
            $mensaje .= "



           <table class='table'>
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Tipo</th>
              <th>Asiento Inicio</th>
              <th>Asiento Fin</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
           
              <tr>
                <td>".$id."</td>
                <td>".$tipo."</td>
                <td>".$asientoi."</td>
                <td>".$asientof."</td>
                <td>".$estado."</td>
                

                 
                <td>
                  <div class='btn-group'>
                    <button type='button' class='btn btn-info btn-xs'>
                    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span> Actualizar
                    </button>   
                  </div>
                </td>
              </tr>
              

              
            
          </tbody>
        </table>


            ";

              }
	

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>