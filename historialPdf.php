<?php
	session_start();
	include 'conexion.php'; 
    $fe=$_POST['fecha'];
    require('frameworks/fpdf/fpdf.php');
    $fech = new DateTime();
    $fecha=$fech->format('Y-m-d');
    $date = strtotime($fecha);
    $year= date("Y", $date); // Year (2003)
    $mes =date("m", $date); // Month (12)
    $day= date("d", $date); // day (14)
    $division=explode("-", $fecha);
    switch ($fe) {
        case 'hoy':
            $st = $conn->prepare("SELECT id,date(date_time_start) as fecha,time(date_time_start) as tiempo FROM comand WHERE cashier_id=? and date(date_time_start)=? order by fecha");
            $st->setFetchMode(PDO::FETCH_OBJ);
            $st->execute(array($_SESSION['user']->id,$fecha));
            $num= $st->fetchAll();
            break;
        case 'ayer':
            $st = $conn->prepare("SELECT id,date(date_time_start) as fecha,time(date_time_start) as tiempo FROM comand WHERE cashier_id=? and day(date_time_start)=? and MONTH(date_time_start)=? order by fecha");
            $st->setFetchMode(PDO::FETCH_OBJ);
            $st->execute(array($_SESSION['user']->id,($day-1),$mes));
            $num= $st->fetchAll();
            break;
        case 'mes':
            $st = $conn->prepare("SELECT id,date(date_time_start) as fecha,time(date_time_start) as tiempo FROM comand WHERE cashier_id=? and MONTH(date_time_start)=? order by fecha");
            $st->setFetchMode(PDO::FETCH_OBJ);
            $st->execute(array($_SESSION['user']->id,$mes));
            $num= $st->fetchAll();
            break;
        case 'year':
            $st = $conn->prepare("SELECT id,date(date_time_start) as fecha,time(date_time_start) as tiempo FROM comand WHERE cashier_id=? and YEAR(date_time_start)=? order by fecha");
            $st->setFetchMode(PDO::FETCH_OBJ);
            $st->execute(array($_SESSION['user']->id,$year));
            $num= $st->fetchAll();
            break;
        case 'todo':
            $st = $conn->prepare("SELECT id,date(date_time_start) as fecha,time(date_time_start) as tiempo FROM comand WHERE cashier_id=? order by fecha");
            $st->setFetchMode(PDO::FETCH_OBJ);
            $st->execute(array($_SESSION['user']->id));
            $num= $st->fetchAll();
            break;
        default:
            break;
    }
    if($num==null){
        echo "No hay cuentas que mostrar";
    }
    else{
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
            $pdf->Image('images/logo3.png' , 80 ,30, 55 , 45,'PNG');
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
    }
 ?>