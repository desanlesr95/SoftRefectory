<?php 
    session_start();
    include 'conexion.php'; 
    require('frameworks/fpdf/fpdf.php');
    $fi=$_POST['fechaI'];
    $ft=$_POST['fechaT'];
    $st = $conn->prepare("SELECT id,date(date_time_start) as fecha,time(date_time_start) as tiempo FROM comand WHERE cashier_id=? and date(date_time_start) between ? and ? order by fecha");
    $st->setFetchMode(PDO::FETCH_OBJ);
    $st->execute(array($_SESSION['user']->id,$fi,$ft));
    $num= $st->fetchAll();
    $pdf=new FPDF();
    $todo=0;
    $i=0;
    foreach ($num as $v) {
        $st = $conn->prepare("SELECT * FROM products_comands WHERE comand_id=?");
        $st->setFetchMode(PDO::FETCH_OBJ);
        $st->execute(array($v->id));
        $num2= $st->fetchAll();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(82,32,"Rincon Huasteco");
        $pdf->Image('images/logo2.png' , 80 ,30, 55 , 45,'PNG');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(20,10,"No. Comanda: ".$v->id,0,1,'L');
        $pdf->Ln();
        $pdf->Cell(20,10,"Fecha: ".$v->fecha,0,1,'L');
        $pdf->Cell(20,10,"Hora: ".$v->tiempo,0,1,'L');
        $pdf->Ln();
        $pdf->Cell(20,10,"Productos:",0,1,'L');
        $total=0;
        foreach ($num2 as $k) {
            $st = $conn->prepare("SELECT * FROM products WHERE id=?");
            $st->setFetchMode(PDO::FETCH_OBJ);
            $st->execute(array($k->product_id));
            $num3= $st->fetch();
            $pdf->Cell(20,10,$num3->name,0,1,'L');
            $pdf->Cell(20,10,"                                                          ".$num3->cost,0,1);
            $total+=$num3->cost;
        }
        $pdf->Ln();
        $pdf->Cell(20,10,"Total:                                                ".$total,0,1,'L');
        $i++;
        $todo+=$total;
    }
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(82,32,"Rincon Huasteco");
    $pdf->Image('images/logo2.png' , 80 ,30, 55 , 45,'PNG');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(20,10,"Total de comandas:                                                                 ".$i,0,1,'L');
    $pdf->Cell(20,10,"Promedio de ventas:                                                               ".($todo/$i),0,1,'L');
    $pdf->Cell(20,10,"Total:                                                                                         ".$todo,0,1,'L');
    $pdf->Output('Cuenta.pdf','I');
 ?>