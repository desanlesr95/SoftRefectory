<?php
    $usuario="root";
    $contra="";
    try {
        $conn = new PDO('mysql:host=localhost;dbname=restaurant', $usuario, $contra);
    } catch (PDOException $e) {
    	print "¡Error!: " . $e->getMessage() . "<br/>";
   	 die();
}
?>