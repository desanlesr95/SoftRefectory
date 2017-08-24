<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Realizar Comanda</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sty.css" rel="stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="images/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
		<div class="navbar navbar-default">
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a id="home" href="home.php?user=cajero">HOME</a>
            </li>
           </ul>
        </div>
    </div>
    <br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
            <form role="form" method="post" target="_blank" action="historialfecha.php">
              <div class="form-group">
                <label for="ejemplo_email_1">Fecha inicio</label>
                <input type="date" class="form-control" id="fechaI" name="fechaI">
              </div>
              <div class="form-group">
                <label for="ejemplo_email_1">Fecha termino</label>
                <input type="date" class="form-control" id="fechaT" name="fechaT">
              </div>
              <button type="submit" class="btn btn-default" id="aceptarFecha">Aceptar</button>
            </form>
        </div>
        <div class="col-md-offset-3 col-md-6">
            <form role="form" method="post" target="_blank" action="historialPdf.php">
              <div class="checkbox">
                <label>
                  <input type="radio" name="fecha" value="hoy"> Hoy
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="radio" name="fecha" value="ayer"> Ayer
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="radio" name="fecha" value="mes"> Este mes
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="radio" name="fecha" value="year"> Este año
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="radio" name="fecha" value="ayer"> Todo
                </label>
              </div>
              <button type="submit" class="btn btn-default" id="aceptar">Aceptar</button>
            </form>
        </div>
      </div>  
    </div>
</body>
</html>