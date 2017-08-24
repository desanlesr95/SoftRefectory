<?php 
session_start();
include 'conexion.php';
$mesa=$_POST['mesa'];
$id=$_POST['id'];
$fech = new DateTime();
$fecha=$fech->format('Y-m-d H:i:s');
$st = $conn->prepare("INSERT INTO comand(id,date_time_start,waiter_id,table_id,coment,status) VALUES(?,?,?,?,?,?)");
$st->execute(array($id,$fecha,$_SESSION['user']->id,$mesa,"comentario","Enviada"));
?>