<?php
require_once('mpdf/mpdf.php');
// เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสดง
ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>

</head>

<body>
<div style="background:url(piclogo/logo.jpg)"></div>


<!------------------1----------------->

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th','A6','0','THSaraban');
$pdf->AddPage();
//$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>     
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>
	
    
 
