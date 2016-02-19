<?php include 'usuario/cabecera.php' ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Carousel Theme</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!-- / header -->
<script type="text/javascript" src="js/jquery-1-4-2.min.js"></script> 
<!--script type="text/javascript" src="/jqueryui/js/jquery-ui-1.7.2.custom.min.js"></script--> 
<script type="text/javascript" src="js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="js/showhide.js"></script> 
<script type="text/JavaScript" src="js/jquery.mousewheel.js"></script> 

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script> 

<!-- Load the CloudCarousel JavaScript file -->
<script type="text/JavaScript" src="js/cloud-carousel.1.0.5.js"></script>
 
<script type="text/javascript">
$(document).ready(function(){
						   
	// This initialises carousels on the container elements specified, in this case, carousel1.
	$("#carousel1").CloudCarousel(		
		{			
			reflHeight: 40,
			reflGap: 2,
			titleBox: $('#da-vinci-title'),
			altBox: $('#da-vinci-alt'),
			buttonLeft: $('#slider-left-but'),
			buttonRight: $('#slider-right-but'),
			yRadius: 30,
			xPos: 480,
			yPos: 32,
			speed:0.15,
			autoRotate: "yes",
			autoRotateDelay: 1500
		}
	);
});
 
</script>

</head>

<body id="home">
     <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            
            
        </ul>
        
    </div> <!-- end of templatemo_menu -->
    <center>
</div>	<!-- END of templatemo_header_wrapper -->
<div id="templatemo_slider">
	<!-- This is the container for the carousel. -->
    <div id = "carousel1" style="width:960px; height:280px;background:none;overflow:scroll; margin-top: 20px">            
        <!-- All images with class of "cloudcarousel" will be turned into carousel items -->
        <!-- You can place links around these images -->
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/slider/01.jpg" alt="CSS Templates 1" title="Website Templates 1" /></a>
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/slider/02.jpg" alt="CSS Templates 2" title="Website Templates 2" /></a>
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/slider/03.jpg" alt="CSS Templates 3" title="Website Templates 3" /></a>
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/slider/04.jpg" alt="CSS Templates 4" title="Website Templates 4" /></a>
        <a  href="#" rel="lightbox"><img class="cloudcarousel" src="images/slider/05.jpg" alt="Flash Templates 1" title="Flash Templates 1" /></a>
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/slider/06.jpg" alt="Flash Templates 2" title="Flash Templates 2" /></a>
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/slider/07.jpg" alt="Flash Templates 3" title="Flash Templates 3" /></a>
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/slider/08.jpg" alt="Flash Templates 4" title="Flash Templates 4" /></a>
    </div>
    
    <!-- Define left and right buttons. -->
    <center>
    <input id="slider-left-but" type="button" value="" />
    <input id="slider-right-but" type="button" value="" />
    </center>
</div>
</center>
<center>

			<h2>Agencias de Viaje "Vuela Hoy"</h2>
			<p>El mejor ambiente para volar lo encuentra en Vuela Hoy, donde encontraras acojedores asientos y disfrutar de la mejor atención y sentirte en las nubes.</p>
			<p>Vive Hoy, Ama Hoy, Respeta Hoy, VUELA HOY!</p>
			
	</center>
<?php include 'usuario/piepagina.php' ?>