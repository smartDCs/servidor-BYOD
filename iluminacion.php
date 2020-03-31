<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    	<title>Control de Iluminación</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/tooplate-style.css">
        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
           <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
           <script src="funciones.js" type="text/javascript"></script>
     
    </head>

<body >
 <?php
 include("conexionBD.php");
 $conexionBD=new conexionBD();
$con=$conexionBD->conectar();
$destino=$conexionBD->leerServidor($con);
 //include("conexionBD.php");
 include("UDPsocket.php");
 
   ?>
     <section class="page-luces" id="top">
        <div class="container">
            <div class="row">
               
                <div class="col-md-6">
                    <div class="page-direction-button">
                        <a href="index.php"><i class="fa fa-home"></i>Regresar al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
     <section >
            <div class= "col-md-1" id="botones">
                <?php
               $result=$conexionBD->leerRele($con);
                 //$result=leerRele($con);
                 
                 $conexionBD->crearRele($result);
                 ?>
              
                  <!-- aquí se crean los botones correspondientes a las luces -->
             </div>
      </section>
    <section>
        <div class= "col-md-1" id="dimmers">
            <br>
           <?php
                 $result=$conexionBD->leerDimmer($con);
                 
                 $conexionBD->crearDimmer($result);
          ?>
          
        </div>
    </section>
    <section>
    <div id="datosUDP">
       
    </div>
    </section>
</body>
</html>