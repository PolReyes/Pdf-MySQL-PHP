<?php
require('./fpdf/fpdf.php');
//date_default_timezone_set('UTC');
date_default_timezone_set('America/Lima');
$name_file='User-list-'.(date('d-m-Y-H:i:s')).'.pdf';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Logo
    $this->Image('./img/user.png',125,5,20);
    // Arial bold 15
    $this->SetFont('Arial','B',13);
    // Movernos a la derecha
    $this->Cell(135);
    // Título
    $this->Cell(30,10,'USER LIST',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    
    $this->Cell(10,10,'#',1,0,'C',0);
    $this->Cell(45,10,'Name',1,0,'C',0);
    $this->Cell(60,10,'City',1,0,'C',0);
    $this->Cell(95,10,'Email',1,0,'C',0);
    $this->Cell(35,10,'Phone',1,0,'C',0);
    $this->Cell(30,10,'Date',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada 'L'=hoja horizontal 'P'=hoja vertical
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
include_once './db/mysql_libreria.php';
$sql = "SELECT * FROM users" ;
bd_connectar();
$registros = bd_consultar($sql);
bd_desconectar();
foreach ($registros as $vista) {
    $pdf->Cell(10,10,$vista['id'],1,0,'C',0);
    $pdf->Cell(45,10, utf8_decode($vista['name']),1,0,'C',0);
    $pdf->Cell(60,10, utf8_decode($vista['city']),1,0,'C',0);
    $pdf->Cell(95,10, utf8_decode(strtolower($vista['email'])),1,0,'C',0);
    $pdf->Cell(35,10,$vista['phone'],1,0,'C',0);
    $pdf->Cell(30,10,$vista['date'],1,1,'C',0);
} 

$pdf->Output('I',$name_file);
?>*/

