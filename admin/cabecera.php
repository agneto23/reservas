<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <title>Reservas</title>
    

    <!-- The styles -->
    <link id="bs-css" href="../css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="../css/charisma-app.css" rel="stylesheet">
   
    <link href='../css/jquery.noty.css' rel='stylesheet'>
    <link href='../css/noty_theme_default.css' rel='stylesheet'>
    <link href='../css/elfinder.min.css' rel='stylesheet'>
    <link href='../css/elfinder.theme.css' rel='stylesheet'>
    <link href='../css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='../css/uploadify.css' rel='stylesheet'>
    <link href='../css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>   
    <script type="text/javascript" src="../js/script.js"></script> 
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
        
    <script type="text/javascript" src="../js/jquery.countdown.js"></script>
   
    <script type="text/javascript" src="../js/ajax.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
        
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datetimepicker.css">
    <script type="text/javascript" src="../js/bootbox.js"></script>
          <script type="text/javascript" src="../js/bootbox.min.js"></script>

    <!-- The fav icon -->
    <link rel="shortcut icon" href="../img/favicon.ico">
	
	

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo"  class="hidden-xs"/>
                <span>Reservas</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul>

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Menu</li>
                        <li><a class="ajax-link" href="index.html"><i class="glyphicon glyphicon-home"></i><span> Reservas</span></a>
                        </li>
                        <li><a class="ajax-link" href="ui.html"><i class="glyphicon glyphicon-user"></i><span> Clientes</span></a>
                        </li>
                        <li><a class="ajax-link" href="vuelo.php"><i class="glyphicon glyphicon-send"></i><span> Vuelo</span></a>
                        </li>
                        <li><a class="ajax-link" href="avion.php"><i class="glyphicon glyphicon-plane"></i><span> Avion</span></a>
                        </li>
                        <li><a class="ajax-link" href="ruta.php"><i class="glyphicon glyphicon-transfer"></i><span> Ruta</span></a>
                        </li>
                        </li>
                        </li>
                        <li><a class="ajax-link" href="aeropuerto.php"><i class="glyphicon glyphicon-picture"></i><span> Aeropuerto</span></a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

      

</body>
</html>
