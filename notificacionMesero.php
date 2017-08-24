<?php 
  session_start();
  //echo $_SESSION['user']->id;
  include "conexion.php";
  $st = $conn->prepare("SELECT * FROM comand WHERE status='OK' and waiter_id=?");
  $st->setFetchMode(PDO::FETCH_OBJ);
  $st->execute(array($_SESSION['user']->id));
  $num= $st->fetchAll();
  $st = $conn->prepare("SELECT * FROM comand WHERE status='Enviada' and waiter_id=?");
  $st->setFetchMode(PDO::FETCH_OBJ);
  $st->execute(array($_SESSION['user']->id));
  $num4= $st->fetchAll();
  $st = $conn->prepare("SELECT * FROM comand WHERE status='Procesada' and waiter_id=?");
  $st->setFetchMode(PDO::FETCH_OBJ);
  $st->execute(array($_SESSION['user']->id));
  $num7= $st->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Notificaciones</title>
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
              <a id="home" href="home.php?user=mesero">HOME</a>
            </li>
           </ul>
        </div>
    </div>
    <div class="container">
        <h3>Comandas listas</h3>
        <div class="row">
         <?php 
         if(empty($num)){
              echo "<p>No hay comandas listas</p>";
         }
         else{
            foreach ($num as $v) {
              $st = $conn->prepare("SELECT * FROM products_comands WHERE comand_id=?");
              $st->setFetchMode(PDO::FETCH_OBJ);
              $st->execute(array($v->id));
              $num2= $st->fetchAll();
              //print_r($num2);
              echo "
              <div class=\"row panel panel-default\">
                <br><div class=\"col-md-3\">
                  <strong><p class=\"centrado\">Indentificador</p></strong>
                  <p class=\"centrado\">Comanda#".$v->id."</p>  
                </div>
                <div class=\"col-md-3\">
                  <strong><p class=\"centrado\">Mesa</p></strong>
                  <p class=\"centrado\">Mesa #".$v->table_id."</p>
                </div>
                <div class=\"col-md-3 centrado\">
                  <strong><p class=\"centrado\">Productos:</p></strong>";           
              foreach ($num2 as $k) {
                    $st = $conn->prepare("SELECT * FROM products WHERE id=?");
                    $st->setFetchMode(PDO::FETCH_OBJ);
                    $st->execute(array($k->product_id));
                    $num3= $st->fetch();
                    echo $num3->name.",";
                    
              }
              echo "
                </div>
                <div class=\"col-md-3\">
                    <button type=\"submit\" class=\"btn btn-default\" onclick=\"actualizar(".$v->id.")\">Recibir</button>
                </div>
              </div>";
              
              //echo $v->id;
            }
         }
         
          ?>
    </div>  
  </div>
  <div class="container">
        <h3>Comandas en espera</h3>
        <div class="rlistasow">
         <?php 
         if(empty($num4)){
              echo "<p>No hay comandas en espera</p>";
         }
         else{
            foreach ($num4 as $v) {
              $st = $conn->prepare("SELECT * FROM products_comands WHERE comand_id=?");
              $st->setFetchMode(PDO::FETCH_OBJ);
              $st->execute(array($v->id));
              $num5= $st->fetchAll();
              //print_r($num2);
              echo "
              <div class=\"row panel panel-default\">
                <br>
                <div class=\"col-md-3\">
                  <strong><p class=\"centrado\">Indentificador</p></strong>
                  <p class=\"centrado\">Comanda#".$v->id."</p>  
                </div>
                <div class=\"col-md-3\">
                  <strong><p class=\"centrado\">Mesa</p></strong>
                  <p class=\"centrado\">Mesa #".$v->table_id."</p>
                </div>
                <div class=\"col-md-3 centrado\">
                  <strong><p class=\"centrado\">Productos:</p></strong>";           
              foreach ($num5 as $k) {
                    $st = $conn->prepare("SELECT * FROM products WHERE id=?");
                    $st->setFetchMode(PDO::FETCH_OBJ);
                    $st->execute(array($k->product_id));
                    $num6= $st->fetch();
                    echo $num6->name.",";
              }
              echo "
                </div>
              </div>";
              
              //echo $v->id;
            }
         }
         
          ?>
    </div>  
  </div>

  <div class="container">
        <h3>Comandas procesadas</h3>
        <div class="rlistasow">
         <?php 
         if(empty($num7)){
              echo "<p>No hay comandas en proceso</p>";
         }
         else{
            foreach ($num7 as $v) {
              $st = $conn->prepare("SELECT * FROM products_comands WHERE comand_id=?");
              $st->setFetchMode(PDO::FETCH_OBJ);
              $st->execute(array($v->id));
              $num8= $st->fetchAll();
              //print_r($num2);
              echo "
              <div class=\"row panel panel-default\">
                <br>
                <div class=\"col-md-3\">
                  <strong><p class=\"centrado\">Indentificador</p></strong>
                  <p class=\"centrado\">Comanda#".$v->id."</p>  
                </div>
                <div class=\"col-md-3\">
                  <strong><p class=\"centrado\">Mesa</p></strong>
                  <p class=\"centrado\">Mesa #".$v->table_id."</p>
                </div>
                <div class=\"col-md-3 centrado\">
                  <strong><p class=\"centrado\">Productos:</p></strong>";           
              foreach ($num8 as $k) {
                    $st = $conn->prepare("SELECT * FROM products WHERE id=?");
                    $st->setFetchMode(PDO::FETCH_OBJ);
                    $st->execute(array($k->product_id));
                    $num9= $st->fetch();
                    echo $num9->name.",";
              }
              echo "
                </div>
              </div>";
              
              //echo $v->id;
            }
         }
         
          ?>
    </div>  
  </div>
    
</body>
</html>
<script>
  function actualizar(id) {
    //alert(id);
    $.ajax({
          url: "updateRecibida.php",
          data: {id:id},
          type: 'post',
          beforeSend: function () {
          },
          success: function(){
            alert("Comanda recibida");
            location.href="notificacionMesero.php"; 
          },
          error: function(data){
            alert("Error al enviar la comanda");
          }
        });
  }
</script>