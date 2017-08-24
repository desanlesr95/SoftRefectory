<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Registro</title>

  <!-- CSS  -->
  <link rel="stylesheet" href="frameworks/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/sty.css">
  <link rel="shortcut icon" href="images/logo.png">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <!-- Font Awesome CSS -->
   
</head>

<body>
    <section id="logo-section" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1 class="nombre">SOFTREFECTORY</h1>
                            <span>Procesos mas rapidos</span>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="container">
        <div class="row">
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <div class="col-md-4">
                      <img src="images/r1.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-3">
                        <label for="password">Tipo de Usuario</label><br>
                        <input type="radio" id="matutino" name="tipo" value="Mesero" checked>Mesero
                        <input type="radio" id="matutino" name="tipo" value="Chef" checked>Chef
                        <input type="radio" id="matutino" name="tipo" value="Cajero" checked>Cajero<br>
                        <label for="user">Usuario</label>
                        <input class="form-control2" type="text" id="user" name="user" placeholder="Introduce tu usuario"> 
                        <label for="password">Contraseña</label>
                        <input class="form-control2" type="password" id="password" name="password" placeholder="Introduce tu contraseña"><br>
                        <label for="password">Correo</label>
                        <input class="form-control2" type="mail" id="mail" name="mail" placeholder="Introduce tu correo electronico"><br>
                        <label for="password">Nombre</label>
                        <input class="form-control2" type="text" id="name" name="name" placeholder="Introduce tu nombre"><br>
                    </div>
                    <div class="col-md-3">
                        <label for="password">Apellidos</label>
                        <input class="form-control2" type="text" id="lastname" name="lastname" placeholder="Introduce tus apellidos"><br>
                        <label for="password">Fecha de nacimiento</label>
                        <input class="form-control2" type="date" id="birthdate" name="birthdate"><br>
                        <label for="password">Turno</label><br>
                        <input type="radio" id="matutino" name="turno" value="Matutino" checked>Matutino
                        <input type="radio" id="matutino" name="turno" value="Vespertino" checked>Vespertino<br>
                        <label for="password">Telefono</label>
                        <input class="form-control2" type="text" id="telephone" name="telephone" placeholder="Introduce tu contraseña"><br>
                        <input type="submit" name="registar" id="registar">
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-offset-6 col-md-5">
              <img src="images/tenedores.jpg" class="img-responsive">
            </div>
        </div>
    </div>
</body>
</html>
<?php
  include "conexion.php"; 
  if(isset($_POST['registar'])){
    $tipo=$_POST['tipo'];
    //////////////////////
    $id=md5(uniqid(rand()));;
    $id2=md5(uniqid(rand()));
    $user=$_POST['user'];
    $password=$_POST['password'];
    $mail=$_POST['mail'];
    $name=$_POST['name'];
    $lastname=$_POST['lastname'];
    $birthdate=$_POST['birthdate'];
    $turno=$_POST['turno'];
    $telephone=$_POST['telephone'];
    switch ($tipo) {
      case 'Mesero':
        $st = $conn->prepare("INSERT INTO waiter VALUES(?,?,?,?,?,?,?)");
        $st->execute(array($id2,$mail,$name,$lastname,$birthdate,$turno,$telephone));
        $st = $conn->prepare("INSERT INTO usuario VALUES(?,?,?,?,?)");
        $st->execute(array($id,$user,$password,1,$id2));
        header("Location: index.php");
        break;
      case 'Chef':
        $st = $conn->prepare("INSERT INTO chef VALUES(?,?,?,?,?,?,?)");
        $st->execute(array($id2,$mail,$name,$lastname,$birthdate,$turno,$telephone));
        $st = $conn->prepare("INSERT INTO usuario VALUES(?,?,?,?,?)");
        $st->execute(array($id,$user,$password,2,$id2));
        header("Location: index.php");
        break;
      case 'Cajero':
        $st = $conn->prepare("INSERT INTO cashier VALUES(?,?,?,?,?,?,?)");
        $st->execute(array($id2,$mail,$name,$lastname,$birthdate,$turno,$telephone));
        $st2 = $conn->prepare("INSERT INTO usuario VALUES(?,?,?,?,?)");
        $st2->execute(array($id,$user,$password,3,$id2));
        header("Location: index.php");
        break;
      default:
        break;
    }
  }
?>