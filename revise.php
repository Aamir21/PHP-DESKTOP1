<?php 
  
require('fpdf.php'); 
if(isset($_POST['submit'])){
    $sn=1;
    $item= "apple";
    $weight= "kilogram";
    $rate=100;
    $qty= 12;
    $price= 120;
  
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
    $pdf->Ln(); 
$pdf->Cell(10, 10, $sn, 1, 0, 'C'); 
$pdf->Cell(40, 10, $item, 1, 0, 'C'); 
$pdf->Cell(20, 10, $weight, 1, 0, 'C'); 
$pdf->Cell(20, 10, $rate, 1, 0, 'C'); 
$pdf->Cell(20, 10, $qty, 1, 0, 'C'); 
$pdf->Cell(20, 10, $price, 1, 0, 'C'); 
    $pdf->Ln();     
  
// Close document and sent to the browser 
$pdf->Output(); 
}
  
?> 
<!doctype html>
<html>
    <head>
    </head>
    <body>
        <form action="#" method="post">
            <input type="text" name="name">
            <input type="submit" name="submit">
             <button type="submit" value="Submit">Submit</button>
                <button type="reset" value="Reset">Reset</button>
        </form>
        <button type="submit" value="Submit">Submit</button>
                <button type="reset" value="Reset">Reset</button>
        
    </body>
</html>




