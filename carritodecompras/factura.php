<?php
require("ftpdf/fpdf.php");
session_start();
include("Admin/conexion.php");

$sql="Select * from productos;";
$result=$conn->query($sql);
$sql="Select * from clientes where idc=1;";
$result1=$conn->query($sql);
$numero_aleatorio = rand(1,100); 
$fecha=  date("d") ."/". date("m") ."/". date("Y");
$suma=0;
//$sql="Select * from ;";
//$result=$conn->query($sql);

$Fpdf = new FPDF('L','mm','A4');

$Fpdf->AddPage();
$Fpdf->SetFont("Arial","B",16);
$Fpdf->Image("img/productos/shop1.png",270,5,25,25);
$Fpdf->Cell(100,10,"REPORTE DE LOS PRODUCTOS");
$Fpdf->SetFont('Arial','B',20);    
$textypos = 5;
$Fpdf->setY(12);
$Fpdf->setX(10); 
$Fpdf->SetFont('Arial','B',10); 
$Fpdf->setY(30);$Fpdf->setX(10);
$Fpdf->Cell(5,$textypos,"Datos de empresa:");
$Fpdf->SetFont('Arial','',10);    
$Fpdf->setY(35);$Fpdf->setX(10);
$Fpdf->Cell(5,$textypos,"Tienda verano");
$Fpdf->setY(40);$Fpdf->setX(10);
$Fpdf->Cell(5,$textypos,"Direccion:Villaflora");
$Fpdf->setY(45);$Fpdf->setX(10);
$Fpdf->Cell(5,$textypos,"Telefono:3067895");
$Fpdf->setY(50);$Fpdf->setX(10);
$Fpdf->Cell(5,$textypos,"Email:verano@gmail.com");
$Fpdf->SetFont('Arial','B',10);    
$Fpdf->setY(30);$Fpdf->setX(75);
$Fpdf->Cell(5,$textypos,"Datos clientes:");
 while ($r = $result1->fetch_assoc()){  
$Fpdf->SetFont('Arial','',10);    
$Fpdf->setY(35);$Fpdf->setX(75);
$Fpdf->Cell(5,$textypos,"Nombre del cliente:".$r["nombre"]." ".$r["apellido"]);
$Fpdf->setY(40);$Fpdf->setX(75);
$Fpdf->Cell(5,$textypos,"Fecha de nacimiento:".$r["fnacimiento"]);
$Fpdf->setY(45);$Fpdf->setX(75);
$Fpdf->Cell(5,$textypos,"Descripcion :".$r["detalle"]);
$Fpdf->setY(50);$Fpdf->setX(75);
}
$Fpdf->SetFont('Arial','B',10);    
$Fpdf->setY(30);$Fpdf->setX(135);
$Fpdf->Cell(5,$textypos,"FACTURA :".$numero_aleatorio );
$Fpdf->SetFont('Arial','',10);    
$Fpdf->setY(35);$Fpdf->setX(135);
$Fpdf->Cell(5,$textypos,"Fecha:".$fecha);
$Fpdf->setY(40);$Fpdf->setX(135);
    $Fpdf->Ln(10);
$Fpdf->Ln();
$Fpdf->Ln();
$Fpdf->Ln();
$Fpdf->SetFont("Arial","I",10);
// factura elements
$Fpdf->Cell(30,10,"Producto",true);
$Fpdf->Cell(80,10,"Cantidad",true);
$Fpdf->Cell(20,10,"precio",true);
$Fpdf->Cell(20,10,"total a pagar",true);
$Fpdf->Ln();
foreach ($_SESSION["Carrito"] as $obj) {
    $id = $obj["nombre"];
    $cantidad = $obj["cantidad"];
    $precio = $obj["precio"];
    $importe = $obj["importe"];
    
        $Fpdf->Cell(30,10,$id,true);
        $Fpdf->Cell(80,10,$cantidad,true);
        $Fpdf->Cell(20,10,$precio,true);
        $Fpdf->Cell(20,10,$importe,true);
        $Fpdf->Ln();
    
}

$Fpdf->Ln();
$Fpdf->SetFillColor(224,235,255);
$Fpdf->SetTextColor(0);
$Fpdf->SetFont("Arial","B",16);
$Fpdf->SetDrawColor(89, 154, 184);

        $subtotal = 0;
        $iva = 0;
        $aPagar = 0;
        foreach ($_SESSION["Carrito"] as $elemento) {
            $subtotal += $elemento["importe"];
        }
        $iva = $subtotal * 0.12;
        $apagar = $subtotal + $iva;
        $Fpdf->Cell(110,10,"SUBTOTAL:",true,);
        $Fpdf->Cell(40,10,$subtotal,true,);
        $Fpdf->Ln();
        $Fpdf->Cell(110,10,"IVA",true);
        $Fpdf->Cell(40,10,$iva,true);
        $Fpdf->Ln();
        $Fpdf->Cell(110,10,"TOTAL",true);
        $Fpdf->Cell(40,10,$apagar,true);

        $Fpdf->Output();
        session_destroy();