<?php 
include 'conexion.php';
$des=$_POST['tipo'];
$st = $conn->prepare("SELECT * FROM products WHERE type=?");
$st->setFetchMode(PDO::FETCH_OBJ);
$st->execute(array($des));
$num= $st->fetchAll();
$arr=[];
$i=0;
foreach ($num as $v) {
	$arr[$i]=$v->id;
	$i++;
	$arr[$i]=$v->name;
	$i++;
	$arr[$i]=$v->cost;
	$i++;
	$arr[$i]=$v->type;
	$i++;
	$arr[$i]=$v->image;
	$i++;
}
print_r(json_encode($arr));
?>