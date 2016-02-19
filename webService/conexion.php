<?php

function Conectar(){//creamos una funcion para que sea llamada desde otros archivos
	$conn=null;//enceramos la variable conn
  $host = '127.0.0.1';
  $db = 'registro_civil';
  $user = 'root';
  $pwd = '';
  try {
    $conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
  }catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
    
  }
  return $conn;// en la cual esta funcion nos retornara  la conexion pdo
}
?>
