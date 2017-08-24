<?php 
  session_start();
  include "conexion.php";
  $des="desayuno";
  $st = $conn->prepare("SELECT * FROM products WHERE type=?");
  $st->setFetchMode(PDO::FETCH_OBJ);
  $st->execute(array($des));
  $num= $st->fetchAll();
  $des="comida";
  $st = $conn->prepare("SELECT * FROM products WHERE type=?");
  $st->setFetchMode(PDO::FETCH_OBJ);
  $st->execute(array($des));
  $num2= $st->fetchAll(); 
  $des="cena";
  $st = $conn->prepare("SELECT * FROM products WHERE type=?");
  $st->setFetchMode(PDO::FETCH_OBJ);
  $st->execute(array($des));
  $num3= $st->fetchAll();
  $des="bebidas";
  $st = $conn->prepare("SELECT * FROM products WHERE type=?");
  $st->setFetchMode(PDO::FETCH_OBJ);
  $st->execute(array($des));
  $num4= $st->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Realizar Comanda</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sty.css" rel="stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="images/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<!--nav class="navbar navbar-default" role="navigation">
		<div class="navbar navbar-default navbar-fixed-top container">
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a id="home" href="home.php">HOME</a>
            </li>
            <li class="dropdown">
              <a href="#desayuno">Desayuno</a>
            </li>
            <li class="dropdown">
              <a href="#comida">Comida</a>
            </li>
            <li class="dropdown">
              <a href="#cena">Cena</a>
            </li>
            <li class="dropdown">
              <a href="#bebidas" >Bebidas</a>
            </li>
           </ul>
        </div>
    </div>
    </nav><br><br><br-->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="home.php">Home</a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="#desayuno">Desayuno</a></li>
          <li><a href="#comida">Comida</a></li>
          <li> <a href="#cena">Cena</a></li>
          <li class="divider"></li>
          <li><a href="#bebidas" >Bebidas</a></li>
      </li>
    </ul>
  </div>
</nav></br></br></br>
    
    	<div class="row">
		    <div class="col-xs-8 col-md-9" id="mostrar" >
        <a name="desayuno"></a>
			    <?php
              $n=0;
              $m=0;
              echo "<div class=\"container\">
              <p class=\"centrado\">DESAYUNO</p>";
              foreach ($num as $v) {
                if($n==3||$m==0){
                    if($m==0){
                      $m=1;
                      echo "<div class=\"row\">";
                      echo "
                      <div class=\"col-md-3 col-xs-6\">
                        <img src=\"".$v->image."\" class=\"img-responsive\">
                        <p class=\"centrado\">".$v->name."</p>
                        <p class=\"centrado \">".$v->cost."</p>
                        <p class=\"centrado \">".utf8_encode($v->description)."</p>
                        <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\">Agregar</button>
                      </div>";
                    }
                    else{
                      echo "</div><div class=\"row\">";
                      echo "
                      <div class=\"col-md-3 col-xs-6\">
                        <img src=\"".$v->image."\" class=\"img-responsive\">
                        <p class=\"centrado \">".$v->name."</p>
                        <p class=\"centrado \">".$v->cost."</p>
                        <p class=\"centrado \">".utf8_encode($v->description)."</p>
                        <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\">Agregar</button>
                      </div>";
                    }
                    $n=0;
              }
              else{
                  echo "
                  <div class=\"col-md-3 col-xs-6\">
                    <img src=\"".$v->image."\" class=\"img-responsive\">
                    <p class=\"centrado\">".$v->name."</p>
                    <p class=\"centrado \">".$v->cost."</p>
                    <p class=\"centrado \">".utf8_encode($v->description)."</p>
                    <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\" >Agregar</button>
                  </div>";
                  $n++;
                }
              }
              echo "</div></div>";
          ?>
		    </div>  
        <div class="col-md-2 col-xs-4" >

          <h4>¿Cuantos comensales?</h4>
           <select class="selectpicker form-control" id="ncomensal">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <button id="comensales">Aceptar</button>

          <div class="table-responsive">
              <table class="table table-striped" id="tabla">
          <caption class="centrado nombre">Comanda</caption>
            <tr>
              <td>Identificador</td>
              <td>Producto</td>
              <td>Costo</td>
          </tr>
          
          </table>
          </div>
          <h4>Numero de mesa</h4>
          <select class="selectpicker form-control" id="mesa">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
              <option value="32">32</option>
              <option value="33">33</option>
              <option value="34">34</option>
              <option value="35">35</option>
          </select>
          <br>
          <button id="comanda">Enviar</button>
		    </div>






      <div class="row">
        <div class="col-xs-7 col-md-9" id="mostrar">
        <a name="comida"></a>
          <?php
              $n=0;
              $m=0;
              echo "<div class=\"container-fluid\">
              <br><br><p class=\"centrado\">COMIDA</p>";
              foreach ($num2 as $v) {
                if($n==3||$m==0){
                    $n=0;
                    if($m==0){
                      $m=1;
                      echo "<div class=\"row\">";
                      echo "
                      <div class=\"col-md-3 col-xs-6\">
                        <img src=\"".$v->image."\" class=\"img-responsive\">
                        <p class=\"centrado\">".$v->name."</p>
                        <p class=\"centrado \">".$v->cost."</p>
                        <p class=\"centrado \">".utf8_encode($v->description)."</p>
                        <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\">Agregar</button>
                      </div>";
                    }
                    else{
                      echo "</div><br><div class=\"row\">";
                      echo "
                      <div class=\"col-md-3 col-xs-6\">
                        <img src=\"".$v->image."\" class=\"img-responsive\">
                        <p class=\"centrado \">".$v->name."</p>
                        <p class=\"centrado \">".$v->cost."</p>
                        <p class=\"centrado \">".utf8_encode($v->description)."</p>
                        <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\">Agregar</button>
                      </div>";
                    }
                }
                else{
                  echo "
                  <div class=\"col-md-3 col-xs-6\">
                    <img src=\"".$v->image."\" class=\"img-responsive\">
                    <p class=\"centrado\">".$v->name."</p>
                    <p class=\"centrado \">".$v->cost."</p>
                    <p class=\"centrado \">".utf8_encode($v->description)."</p>
                    <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\" >Agregar</button>
                  </div>";
                  $n++;
                }
              }
              echo "</div>";
          ?>
        </div>  
      </div>
        
      <div class="row">
        <div class="col-xs-7 col-md-9" id="mostrar">
          <a name="cena"></a>
          <?php
              $n=0;
              $m=0;
              echo "<div class=\"container\">
              <br><br><p class=\"centrado\">CENA</p>";
              foreach ($num3 as $v) {
                if($n==3||$m==0){
                    $n=0;
                    if($m==0){
                      $m=1;
                      echo "<div class=\"row\">";
                      echo "
                      <div class=\"col-md-3 col-xs-6\">
                        <img src=\"".$v->image."\" class=\"img-responsive\">
                        <p class=\"centrado\">".$v->name."</p>
                        <p class=\"centrado \">".$v->cost."</p>
                        <p class=\"centrado \">".utf8_encode($v->description)."</p>
                        <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\">Agregar</button>
                      </div>";
                    }
                    else{
                      echo "</div><br><div class=\"row\">";
                      echo "
                      <div class=\"col-md-3 col-xs-6\">
                        <img src=\"".$v->image."\" class=\"img-responsive\">
                        <p class=\"centrado \">".$v->name."</p>
                        <p class=\"centrado \">".$v->cost."</p>
                        <p class=\"centrado \">".utf8_encode($v->description)."</p>
                        <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\">Agregar</button>
                      </div>";
                    }
                }
                else{
                  echo "
                  <div class=\"col-md-3 col-xs-6\">
                    <img src=\"".$v->image."\" class=\"img-responsive\">
                    <p class=\"centrado\">".$v->name."</p>
                    <p class=\"centrado \">".$v->cost."</p>
                    <p class=\"centrado \">".utf8_encode($v->description)."</p>
                    <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\" >Agregar</button>
                  </div>";
                  $n++;
                }
              }
              echo "</div>";
          ?>
        </div>
       </div>
    </div>

    <div class="row">
        <div class="col-xs-7 col-md-9" id="mostrar">
          <a name="bebidas"></a>
          <?php
              $n=0;
              $m=0;
              echo "<div class=\"container\">
              <br><br><p class=\"centrado\">Bebidas</p>";
              foreach ($num4 as $v) {
                if($n==3){
                    $n=0;
                    if($m==0){
                      $m=1;
                      echo "<div class=\"row\">";
                      echo "
                      <div class=\"col-md-3 col-xs-6\">
                        <img src=\"".$v->image."\" class=\"img-responsive\">
                        <p class=\"centrado\">".$v->name."</p>
                        <p class=\"centrado \">".$v->cost."</p>
                        <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\">Agregar</button>
                      </div>";
                    }
                    else{
                      echo "</div><br><div class=\"row\">";
                      echo "
                      <div class=\"col-md-3 col-xs-6\">
                        <img src=\"".$v->image."\" class=\"img-responsive\">
                        <p class=\"centrado \">".$v->name."</p>
                        <p class=\"centrado \">".$v->cost."</p>
                        <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\">Agregar</button>
                      </div>";
                    }
                }
                else{
                  echo "
                  <div class=\"col-md-3 col-xs-6\">
                    <img src=\"".$v->image."\" class=\"img-responsive\">
                    <p class=\"centrado\">".$v->name."</p>
                    <p class=\"centrado \">".$v->cost."</p>
                    <button class=\"btn btn-default btn-lg btn-block\" onclick=\"selecionado('".$v->name."',".$v->cost.",".$v->id.")\" >Agregar</button>
                  </div>";
                  $n++;
                }
              }
              echo "</div>";
          ?>
        </div>
       </div>
    </div>


</body>
</html>
<script>
   function selecionado(name,cost,id){
      var tds=$("#tabla tr:first td").length;
      // Obtenemos el total de columnas (tr) del id "tabla"
      var trs=$("#tabla tr").length;
      var nuevaFila="<tr>";
      var comensal=prompt("¿Numero de comensal?");
      nuevaFila+="<td>"+id+"</td>";
      nuevaFila+="<td>"+name+"</td>";
      nuevaFila+="<td>"+cost+"</td>";
      //nuevaFila+="<td>"+cost+"</td>";
      // Añadimos una columna con el numero total de columnas.
      // Añadimos uno al total, ya que cuando cargamos los valores para la
      // columna, todavia no esta añadida
      nuevaFila+="</tr>";
      $("#tabla").append(nuevaFila);
  }
  $("#comanda").click(function(event) {
      var tbl = $('#tabla tr').get().map(function(row) { return $(row).find('td').get().map(function(cell) { return $(cell).html(); }); });
      var id=[];
      for(var i=1;i<tbl.length;i++){
        id[i]=tbl[i][0];
      }
      var mesa=$("#mesa").val();
      //alert(id); 
      var comand=Math.floor(Math.random()*1898127318)
      $.ajax({
          url: "comandasend.php",
          data: {mesa:mesa,id: comand},
          type: 'post',
        beforeSend: function () {
        },
        success: function(data){
          //alert("Comanda realizada con exito")
        },
        error: function(data){
          //alert("Error al enviar la comanda");
        }
      });
      console.log(id);
      for(var i=1;i<id.length;i++){
        $.ajax({
          url: "comandProducts.php",
          data: {id:id[i],comand_id:comand},
          type: 'post',
          beforeSend: function () {
          },
          success: function(data){
            
          },
          error: function(data){
            //alert("Error al enviar la comanda");
          }
        });
      }
      alert("Comanda realizada con exito");
      location.href="home.php";
  });
  $('#comensales').click(function(event){
      var numero=$('#ncomensal').val();
      alert(numero);
  });

</script>