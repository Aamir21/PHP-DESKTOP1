<?php 
  
require('fpdf.php'); 
// New object created and constructor invoked 
$pdf = new FPDF(); 
  
// Add new pages. By default no pages available. 
$pdf->AddPage(); 
  
// Set font format and font-size 
$pdf->SetFont('Times', 'B', 20); 
  
// Framed rectangular area 
$pdf->Cell(176, 5, 'Welcome to GeeksforGeeks!', 0, 0, 'C'); 
  
// Set it new line 
$pdf->Ln(); 
  
// Set font format and font-size 
$pdf->SetFont('Times', 'B', 12); 
  
// Framed rectangular area 
$pdf->Cell(176, 10, 'A Computer Science Portal for geek!', 0, 1, 'C');
$pdf->Cell(10, 10, 'S/N', 1, 0, 'C'); 
$pdf->Cell(40, 10, 'Item', 1, 0, 'C'); 
$pdf->Cell(20, 10, 'Weight', 1, 0, 'C'); 
$pdf->Cell(20, 10, 'Rate', 1, 0, 'C'); 
$pdf->Cell(20, 10, 'QTY', 1, 0, 'C'); 
$pdf->Cell(20, 10, 'Price', 1, 0, 'C'); 
 
$pdf->Output(); 

  
?> 