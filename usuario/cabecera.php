<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">


   <!-- jQuery -->
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>   
    <script type="text/javascript" src="js/script.js"></script> 
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
        
    <script type="text/javascript" src="js/jquery.countdown.js"></script>
   
    <script type="text/javascript" src="js/ajax.js"></script>

        
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css">
    <script type="text/javascript" src="js/bootbox.js"></script>
		  <script type="text/javascript" src="js/bootbox.min.js"></script>

 


<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script> 
<script type="text/javascript" src="js/Myriad_Pro_italic_600.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_italic_400.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>




<!--[if lt IE 9]>
	<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
	<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
</head>
<body id="page1">
<div class="body1">
	<div class="main">
<!-- header -->
	<header>
			<div class="wrapper">
				<h1>
					<a href="index.html" id="logo">Air Lines</a><span id="slogan">Viajes Internacionales</span>
				</h1>
				<div class="right">
					<nav>
						<ul id="top_nav">
							
							<?php

							   session_start();

								
								if (isset($_SESSION['admin'])) {

										echo "<form name='form' id='form' class='form-horizontal' enctype='multipart/form-data' action='usuario/destruir.php' method='POST'>

						    <label> <font color='white' face='Helvetica' size=5>  Usuario  </font></label>
						    <label> <font color='white' face='Helvetica' size=5>  Usuario  </font></label>
						    <label> <font color='white' face='Helvetica' size=5> &nbsp; &nbsp; </font></label>
						    
						     <input name='login'  class='button2' type='submit' value='Salir'>
							</form>  ";
									  
							?>	

							


							<?php


								}else{

									

									echo "<form name='form' id='form' class='form-horizontal' enctype='multipart/form-data' action='usuario/log.php' method='POST'>

						    <input name='login' class='button2' type='submit' value='Entrar'>
						    <input  type='text'  style=' width: 150px ; height: 22px ;color: black' class='form-control' name='txtusuario'  placeholder='Ingresa tu cédula'> 
						    <input  type='password' style=' width: 150px ; height: 22px ;color: black' class='form-control' name='txtpassword' placeholder='Ingresa tu contraseña'> <br>
						    
						    
						    <a href='index-1.html' style='color:white'>Registrate</a>

						    

							</form>  ";
								}
							?> 
						</ul>
					</nav>
					<nav>
						<ul id="menu">
							<li id="menu_active"><a href="index.html">Inicio</a></li>
							<li><a href="index-1.html">Vuelos</a></li>
							<li><a href="index-2.html">Destinos</a></li>
							<li><a href="index-3.html">Noticias</a></li>
							<li><a href="index-4.html">Contactos</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
	</div>
</div>
