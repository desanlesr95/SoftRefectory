<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Login</title>

  <!-- CSS  -->
  <link rel="stylesheet" href="frameworks/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="shortcut icon" href="images/logo.png">
</head>
<body>
    <div class="row">
        <div class="col-md-offset-10">
            <a href="creditos.php">Creditos</a>   
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-xs-6">
        <img src="images/logo.png" class="img-resposive">
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-offset-5 col-md-2">
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="user" class="control-label">Usuario</label>
                    <input class="form-control2" type="text" id="user" name="user" placeholder="Introduce tu usuario"> 
                    <label for="password" class="control-label">Contraseña</label>
                    <input class="form-control2" type="password" id="password" name="password" placeholder="Introduce tu contraseña"><br>
                    <input type="submit" name="boton" id="boton" value="Entrar">
                    <a href="registro.php">Registrarse</a>
                    
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
<?php
include "conexion.php";
    if(isset($_POST['boton'])){
        $user=$_POST['user'];
        $password=$_POST['password'];
        $st = $conn->prepare("SELECT * FROM usuario WHERE user=? and password=?");
        $st->setFetchMode(PDO::FETCH_OBJ);
        $st->execute(array($user,$password));
        $num= $st->fetch();
        if(isset($num)){
            switch ($num->tipo) {
                case 1:
                    $st = $conn->prepare("SELECT * FROM waiter WHERE id=?");
                    $st->setFetchMode(PDO::FETCH_OBJ);
                    $st->execute(array($num->id_user));
                    $num2=$st->fetchAll();
                    $_SESSION['user']=$num2;
                    header("Location: home.php");
                    break;
                case 2:
                    $st = $conn->prepare("SELECT * FROM chef WHERE id=?");
                    $st->setFetchMode(PDO::FETCH_OBJ);
                    $st->execute(array($num->id_user));
                    $num2=$st->fetch();
                    $_SESSION['user']=$num2;
                    header("Location: home.php");
                    break;
                case 3:
                    $st = $conn->prepare("SELECT * FROM cashier WHERE id=?");
                    $st->setFetchMode(PDO::FETCH_OBJ);
                    $st->execute(array($num->id_user));
                    $num2=$st->fetch();
                    $_SESSION['user']=$num2;
                    header("Location: home.php");
                    break;
                default:
                    # code...
                    break;
            }
        }
    }
?>