<?php
session_start();
include "conexion.php";
//print_r($_SESSION['user']->id);
$st = $conn->prepare("SELECT * FROM usuario WHERE id_user=?");
$st->setFetchMode(PDO::FETCH_OBJ);
$st->execute(array($_SESSION['user']->id));
$num= $st->fetch();
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HOME</title>
        <!-- Bootstrap Core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome CSS -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
    	<!-- Custom CSS -->
        <link href="css/animate.css" rel="stylesheet"> 
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/sty.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="images/logo.png">
        <!-- Template js -->
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.appear.js"></script>
        <script src="js/contact_me.js"></script>
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/script.js"></script>
        <link rel="stylesheet" href="css/estilos.css">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    
    <body class="fondo">
        
        <!-- Start Logo Section -->
        <section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <div >
                            <h1 class="nombre">SOFTREFECTORY</h1>
                            <span>Procesos mas rapidos</span></br>
                            <?php
                                switch($num->tipo){
                                    case 1:
                                    echo "<span>Mesero</span>";
                                    break;
                                    case 2:
                                    echo "<span>Chef</span>";
                                    break;
                                    case 3:
                                    echo "<span>Cajero</span>";
                                    break;
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="index.php">Salir</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Logo Section -->
        
        <!-- Start Main Body Section -->
        <div class="mainbody-section text-center">
            <div class="container">
            <?php  
            //var_dump($_SESSION['user']);
            switch($num->tipo){
                case 2:
                    echo "<div class=\"row\">
                    <div class=\"col-md-3\">
                        <div class=\"menu-item red\">
                            <a href=\"elegirComanda.php\">
                                <img src=\"images/elegir.png\">
                                <p>Elegir Comanda</p>
                            </a>
                        </div>
                    </div>
                    
                    <div class=\"col-md-6\">
                        
                        <!-- Start Carousel Section -->
                        <div class=\"home-slider\">
                            <div id=\"carousel-example-generic\" class=\"carousel slide\" data-ride=\"carousel\" style=\"padding-bottom: 30px;\">
                                <!-- Indicators -->
                                <ol class=\"carousel-indicators\">
                                    <li data-target=\"#carousel-example-generic\" data-slide-to=\"0\" class=\"active\"></li>
                                    <li data-target=\"#carousel-example-generic\" data-slide-to=\"1\"></li>
                                    <li data-target=\"#carousel-example-generic\" data-slide-to=\"2\"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class=\"carousel-inner\">
                                    <div class=\"item active\">
                                        <img src=\"images/platillo1.png\" class=\"img-responsive\" alt=\"\">
                                    </div>
                                    <div class=\"item\">
                                        <img src=\"images/platillo2.png\" class=\"img-responsive\" alt=\"\">
                                    </div>
                                    <div class=\"item\">
                                        <img src=\"images/platillo3.png\" class=\"img-responsive\" alt=\"\">
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- Start Carousel Section -->
                        
                    </div>
                    
                    <div class=\"col-md-3\">
                        
                        <div class=\"menu-item red\">
                            <a href=\"verComandas.php\">
                                <img src=\"images/ojo.png\" class=\"img-responsive\"> 
                                <p>Ver Comandas</p>
                            </a>
                        </div>
                        
                    </div>
                </div>";
                    break;
                case 3:
                    echo "<div class=\"row\">
                    <div class=\"col-md-3\">
                        <div class=\"menu-item red\">
                            <a href=\"notificacionCajero.php\">
                                <div class=\"row\">
                                    <div class=\"\">
                                        &nbsp;<img src=\"images/notificacion.png\"> <br><br>
                                    </div>
                                </div>
                                <p class=\"centrado\">Notificaciones</p>
                            </a>
                        </div>
                        <div class=\"menu-item red\">
                            <a href=\"factura.php\">
                                <img src=\"images/factura.png\">
                                <p>Facturar</p><br>
                            </a>
                        </div>
                    </div>
                    
                    <div class=\"col-md-6\">
                        
                        <!-- Start Carousel Section -->
                        <div class=\"home-slider\">
                            <div id=\"carousel-example-generic\" class=\"carousel slide\" data-ride=\"carousel\" style=\"padding-bottom: 30px;\">
                                <!-- Indicators -->
                                <ol class=\"carousel-indicators\">
                                    <li data-target=\"#carousel-example-generic\" data-slide-to=\"0\" class=\"active\"></li>
                                    <li data-target=\"#carousel-example-generic\" data-slide-to=\"1\"></li>
                                    <li data-target=\"#carousel-example-generic\" data-slide-to=\"2\"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class=\"carousel-inner\">
                                    <div class=\"item active\">
                                        <img src=\"images/platillo1.png\" class=\"img-responsive\" alt=\"\">
                                    </div>
                                    <div class=\"item\">
                                        <img src=\"images/platillo2.png\" class=\"img-responsive\" alt=\"\">
                                    </div>
                                    <div class=\"item\">
                                        <img src=\"images/platillo3.png\" class=\"img-responsive\" alt=\"\">
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- Start Carousel Section -->
                        
                        
                    </div>
                    
                    <div class=\"col-md-3\">
                        
                        <div class=\"menu-item red\">
                            <a href=\"historial.php\">
                                <img src=\"images/history.png\">
                                <p>Historial</p>
                            </a>
                        </div>
                        
                    </div>
                </div>";
                    break;
                case 1:
                    echo "<div class=\"row\">
                    <div class=\"col-md-3\">
                        <div class=\"menu-item red\">
                            <a href=\"realizar.php\">
                                <img src=\"images/comanda2.png\">
                                <p>Realizar Comanda</p>
                            </a>
                        </div>
                    </div>
                    
                    <div class=\"col-md-6\">
                        
                        <!-- Start Carousel Section -->
                        <div class=\"home-slider\">
                            <div id=\"carousel-example-generic\" class=\"carousel slide\" data-ride=\"carousel\" style=\"padding-bottom: 30px;\">
                                <!-- Indicators -->
                                <ol class=\"carousel-indicators\">
                                    <li data-target=\"#carousel-example-generic\" data-slide-to=\"0\" class=\"active\"></li>
                                    <li data-target=\"#carousel-example-generic\" data-slide-to=\"1\"></li>
                                    <li data-target=\"#carousel-example-generic\" data-slide-to=\"2\"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class=\"carousel-inner\">
                                    <div class=\"item active\">
                                        <img src=\"images/platillo1.png\" class=\"img-responsive\" alt=\"\">
                                    </div>
                                    <div class=\"item\">
                                        <img src=\"images/platillo2.png\" class=\"img-responsive\" alt=\"\">
                                    </div>
                                    <div class=\"item\">
                                        <img src=\"images/platillo3.png\" class=\"img-responsive\" alt=\"\">
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- Start Carousel Section -->
                        
                        <div class=\"row\">
                            <div class=\"menu-item red\">
                            <a href=\"notificacionMesero.php\">
                            <div class=\"row\">
                                <div class=\"col-md-offset-5 col-md-2\">
                                        &nbsp;<img src=\"images/notificacion.png\" class=\"img-responsive\"> 
                                </div>
                            </div>
                                
                                <p class=\"centrado\">Notificaciones</p>
                            </a>
                        </div>
                        </div>
                        
                    </div>
                    
                    <div class=\"col-md-3\">
                        
                        <div class=\"menu-item red\">
                            <a href=\"enviarCajero.php\">
                                <img src=\"images/calculadora.png\" class=\"img-responsive\"> 
                                <p>Pedir Cuenta</p>
                            </a>
                        </div>
                        
                    </div>
                </div>";
                    break;
                default:
                    break;
            }
        ?>    
            </div>
        </div>
        <!-- End Main Body Section -->
        
        <!-- Start Copyright Section -->
        <div class="copyright text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div>SofRefectory</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Section -->
        
        <!-- End Testimonial Section -->
        
    </body>
    
</html>