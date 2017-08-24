<?php 
  session_start();
  //echo $_SESSION['user']->id;
  include "conexion.php";
  $st = $conn->prepare("SELECT * FROM comand WHERE status='Enviada' and waiter_id=?");
  $st->setFetchMode(PDO::FETCH_OBJ);
  $st->execute(array($_SESSION['user']->id));
  $num= $st->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Elegir Comanda</title>
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
              <a id="home" href="home.php?user=chef">HOME</a>
            </li>
           </ul>
        </div>
    </div>
    <div class="container">
        <h3>Comandas disponibles</h3>
        <div class="row">
         <?php 
         if(empty($num)){
              echo "<p>No hay comandas</p>";
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
                      <button type=\"submit\" class=\"btn btn-default\" onclick=\"actualizar(".$v->id.")\">Elegir</button>
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
    $.ajax({
          url: "updateelegida.php",
          data: {id:id},
          type: 'post',
          beforeSend: function () {
          },
          success: function(){
            alert("Comanda elegida");
            location.href="elegirComanda.php";
          },
          error: function(data){
            alert("Error al enviar la comanda");
          }
    });
  }
</script>
