<?php 
session_start();
include 'conexion.php';
$product=$_POST['id'];
$id=rand(1,10000000);
$comand_id=$_POST['comand_id'];
$st = $conn->prepare("INSERT INTO products_comands(id,product_id,comand_id) VALUES(?,?,?)");
$st->execute(array($id,$product,$comand_id));
?>