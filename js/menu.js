$(document).ready(function() {
	
	function seleccionado(){
		alert('name');
		//alert(cost);
	}
	/*inicio();
	$("#desayuno").click(desayuno);
	$("#comida").click(comida);
	$("#cena").click(cena);
	$("#bebidas").click(bebidas);
	function inicio(){
		$.ajax({
	      	url: "productos.php",
	      	data:{tipo:"desayuno"},
	     	type: 'POST',
	     	dataType: 'json',
	      beforeSend: function () {
	      },
	      success: function(data){
	        //console.log(data);
	      },
	      error: function(data){
	        alert("No hay respuesta del servidor");
	      }
	    });
	}
	function desayuno(){
		$.ajax({
	      	url: "productos.php",
	      	data:{tipo:"desayuno"},
	     	type: 'POST',
	     	dataType: 'json',
	      beforeSend: function () {
	      },
	      success: function(data){
	        console.log(data.lenght);
	        $("#mostrar").empty();
	        var m=0,n=0;
	        var j=0;
	        var id=[];
	        var name=[];
	        var cost=[];
	        var type=[];
	        var image=[];
	        for (var i =0; i<data.lenght; i+4) {
	        	id[j]=data[i];
	        	name[j]=data[i+1];
	        	cost[j]=data[i+2];
	        	type[j]=data[i+3];
	        	image[j]=data[i+4];
	        	j++;
	        }
	        console.log(name);
	        for (var i =0; i<1; i++) {
	        	if(n==2||m==0){
	        		$("#mostrar").append('<div class=\"row\ id=\"id_2\">');
	        		m++;
	        	}
	        	else{
	        		n++;
	        		$("#id_2").append('<div class=\"col-md-4\" id=\"id_3\"> <img src="images/background.jpg" /> </div>');
	        	}
	        }
	        /*
	        div = $("<div>").prepend('<img id="theImg" src="images/background.jpg" />');
	        div.addClass('col-md-4');
			$("#mostrar").prepend(div);


	      },
	      error: function(data){
	        alert("No hay respuesta del servidor");
	      }
	    });
	}

	function comida(){
		$.ajax({
	      	url: "productos.php",
	      	data:{tipo:"comida"},
	     	type: 'POST',
	      beforeSend: function () {
	      },
	      success: function(data){
	        console.log(data);
	      },
	      error: function(data){
	        alert("No hay respuesta del servidor");
	      }
	    });
	}
	function cena(){
		$.ajax({
	      	url: "productos.php",
	      	data:{tipo:"cena"},
	     	type: 'POST',
	      beforeSend: function () {
	      },
	      success: function(data){
	        console.log(data);
	      },
	      error: function(data){
	        alert("No hay respuesta del servidor");
	      }
	    });
	}
	function bebidas(){
		$.ajax({
	      	url: "productos.php",
	      	data:{tipo:"bebidas"},
	     	type: 'POST',
	      beforeSend: function () {
	      },
	      success: function(data){
	        console.log(data);
	      },
	      error: function(data){
	        alert("No hay respuesta del servidor");
	      }
	    });
	}*/
});