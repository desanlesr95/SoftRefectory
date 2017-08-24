<?php
session_start();
include 'conexion.php'; 
$id=$_POST['id'];
$st = $conn->prepare("update comand set status='FINISH' WHERE id=?");
$st->setFetchMode(PDO::FETCH_OBJ);
$st->execute(array($id));
?>