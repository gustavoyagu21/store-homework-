<?php
require('ftpdf/fpdf.php');
class PDF extends FPDF
{

function Header()
{
    
    $this->Image('img/productos/eliminar.png',10,8,33);
    
    $this->SetFont('Arial','B',15);
    
    $this->Cell(80);
   
    $this->Cell(30,10,'ESTE ES UNA PRUEBA ');

    $this->Ln(30);
}


function Footer()
{
   
    $this->SetY(-15);
  
    $this->SetFont('Arial','I',8);

    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//$pdf = new FPDF(/*"L","mm","A5"*/);
//$pdf->AliasNbPages();
//$pdf->AddPage();
//$pdf->SetFont('Arial','',25);
//$pdf->SetTextColor(20,200,20);
//$pdf->Text(25,10,"INFORME FINAL PRUEBAS");
///$pdf->Image('img/productos/eliminar.png' , 80 ,22, 35 , 38,);
//$pdf->Ln(50);
//for($i=0;$i<10;$i++)
  //  $pdf->SetTextColor(10,10,10);
//    $pdf->Cell(40,10,'Hola Prueba',0,1);
 //   $pdf->Ln(20);

//$pdf->Output();
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'HOLA PRUEBA '.$i,0,1);
$pdf->Output();
?>