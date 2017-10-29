<?php
require('../fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

// Colored table
function FancyTable($header, $data)
{
	// Colors, line width and bold font
	$this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(100,10,'Student Attendance',1,0,'C',true);
	$this->Ln(20);
	$this->SetFillColor(210,210,210);
	$this->SetTextColor(0);
	$this->SetDrawColor(0,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	for($i=0;$i<count($header);$i++)
		$this->Cell(40,7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(255,255,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$this->Cell(40,6,'1',1,0,'',true);
	$this->Cell(40,6,'Nikhil',1,0,'',true);
	$this->Cell(40,6,'07120902714',1,0,'',true);
	$this->Cell(40,6,'Present',1,0,'',true);
	$this->Cell(40,6,'21',1,0,'',true);
	$this->Cell(40,6,'30',1,0,'',true);
	$this->Ln();
	
}
}

$pdf = new PDF('L','mm','A4');
// Column headings
$header = array('S.No.', 'Roll No.', 'Name', 'Attendance','Present Days','Total Days');
// Data loading
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>
