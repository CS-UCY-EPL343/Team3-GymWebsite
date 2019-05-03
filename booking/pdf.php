<?php
session_start();
include("../announcements/connect1.php");
include("../announcements/GeneralAuth.php");



$res=mysqli_query($conn,"SELECT * FROM book");
           
     require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
 $this->Image('../img/logo-test.png',10,10,30);
}
// Page footer
function Footer()
{
 $this->SetY(-20);
 $this->Image('images/pdf-footer.jpg');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->SetMargins(10,60,10);
$pdf->AliasNbPages();
$pdf->AddPage();
















//require('fpdf/fpdf.php');
//$pdf = new FPDF();
//$pdf->AddPage();




$pdf->SetFont('Arial','B',12);	

//$pdf->Image('../img/logo-test.png',10,10,30);


 $pdf->Ln();


$pdf->SetFillColor(193,229,252);

 $pdf-> Cell(30,20," ID",1,0,C,true);
 $pdf-> Cell(30,20," Username",1,0,C,true);
 $pdf-> Cell(30,20," Service",1,0,C,true);
 $pdf-> Cell(30,20," Date",1,0,C,true);
 $pdf-> Cell(30,20," Time",1,0,C,true);
 $pdf-> Cell(30,20," Cancelled",1,0,C,true);
 $pdf->Ln();


 while($row=mysqli_fetch_array($res))
    {
     $pdf-> Cell(30,10," ".$row['id'],1,0,C,false);
     $pdf-> Cell(30,10," ".$row['username'],1,0,C,false);
     $pdf-> Cell(30,10," ".$row['service'],1,0,C,false);
     $pdf-> Cell(30,10," ".date('m/d/Y',$row["day"]),1,0,C,false);
     $pdf-> Cell(30,10," ".$row['time'],1,0,C,false);
     if ($row["canceled"]==1){
        $pdf-> Cell(30,10," Cancelled",1,1,C,false); 
     }else{
         $pdf-> Cell(30,10," ",1,1,C,false);  
     }
     
    }

$pdf->Output();
?>