<?php
define('FPDF_FONTPATH','font/');
include("connect.php");
require('fpdf.php');
class PDF extends FPDF
{
	function Footer()
	{
		// Go to 1.5 cm from bottom
		$this->SetY(0);
		// Select Arial italic 8
		$this->SetFont('Arial','I',8);
		// Print centered page number
		//$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	}
}

//$pdf=new FPDF();
$pdf=new PDF('P','mm','A4');
$pdf->SetLeftMargin( 10 );
$pdf->AddFont('angsana',"B","angsab.php");
$pdf->AddFont('angsana',"I","angsab.php");
$pdf->AddFont('angsana',"IB","angsab.php");
$pdf->AddFont('angsa','','angsa.php');
$pdf->AddFont('angsa','BI','angsa.php');
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
$pdf->AddPage();

$std_id = $_GET[std_id];
$sql = "SELECT * FROM player_document 
	WHERE std_id = '$std_id'";
$result = mysql_query($sql);
$i=0;
while($row=mysql_fetch_array($result)){
	$i++;
	//$pdf->SetXY($xphoto,$yphoto);
	if(file_exists('../../document/'.$row['doc_file'])){
		//if($row[handler_pic] != '1531813656.jpg'){
			$pdf->Image('../../document/'.$row['doc_file'],5,10,200,270,'','');
		//}
		//$pdf->Cell( 80 , 7 , $row['handler_pic'],0,1,'C');
	}
	if($i == 1)
		$pdf->AddPage();
}

//$pdf->Ln();
//$pdf->Cell( 50 , 10 , 'Any sinner is bound to suffer as a result of his own wrong-doing.');
$pdf->Output();
?>
?>