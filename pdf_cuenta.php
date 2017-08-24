<?php
	session_start();
	include 'conexion.php'; 
    $id=$_POST['id'];
    $st = $conn->prepare("SELECT id,date(date_time_start) as fecha,time(date_time_start) as tiempo FROM comand WHERE id=?");
    $st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute(array($id));
    $num= $st->fetch();
    $st = $conn->prepare("SELECT * FROM products_comands WHERE comand_id=?");
    $st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute(array($id));
    $num2= $st->fetchAll();
	require('frameworks/fpdf/fpdf.php');
	$pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(82,32,"Rincon Huasteco");
    $pdf->Image('images/logo2.png' , 80 ,30, 55 , 45,'PNG');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(20,10,"No. Comanda: ".$id,0,1,'L');
    $pdf->Ln();
    $pdf->Cell(20,10,"Fecha: ".$num->fecha,0,1,'L');
    $pdf->Cell(20,10,"Hora: ".$num->tiempo,0,1,'L');
    $pdf->Ln();
    $pdf->Cell(20,10,"Productos:",0,1,'L');
    $total=0;
    foreach ($num2 as $v) {
        $st = $conn->prepare("SELECT * FROM products WHERE id=?");
        $st->setFetchMode(PDO::FETCH_OBJ);
        $st->execute(array($v->product_id));
        $num3= $st->fetch();
        $pdf->Cell(20,10,$num3->name,0,1,'L');
        $pdf->Cell(20,10,"                                                          ".$num3->cost,0,1);
        $total+=$num3->cost;
    }
    $pdf->Ln();
    $pdf->Cell(20,10,"Total:                                                ".$total,0,1,'L');
    $pdf->Output('Cuenta.pdf','I');
 ?>