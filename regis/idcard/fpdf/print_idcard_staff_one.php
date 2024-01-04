<?php
define('FPDF_FONTPATH','font/');
include("../../connect_db.php");
require('fpdf.php');

//$pdf=new FPDF();
$pdf = new FPDF('P','cm',array(9.5,13.5));
$pdf->SetLeftMargin( 10 );
$pdf->AddFont('angsana',"B","angsab.php");
$pdf->AddFont('angsana',"I","angsab.php");
$pdf->AddFont('angsana',"IB","angsab.php");
$pdf->AddFont('angsa','','angsa.php');
$pdf->AddFont('angsa','BI','angsa.php');
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
$pdf->AddPage();

$staff_name = $_GET['s_name'];
$staff_lastname = $_GET['s_lname'];
$sql = "SELECT  s.staff_id, s.staff_title, s.staff_name, s.staff_lastname, s.staff_cposition, s.staff_pic, u.subname_university
	FROM staff s
    INNER JOIN university u ON s.id_university = u.id_university
	WHERE s.staff_name = '$staff_name' AND s.staff_lastname = '$staff_lastname'
    GROUP BY s.staff_name, s.staff_lastname
    ";
$result = mysql_query($sql);
$numrow = mysql_num_rows($result);
$i=0;
while($row=mysql_fetch_array($result)){

	$i++;
    $x = 0;
    $y = 0;
    $xphoto = 0.25;
    $yphoto = 5.2;
    $xName = 3.3;
    $yName = 5.6;
    $xFac = 3.3;
    $yFac = 7.6;
    $xSport = 3.3;
    $ySport = 6.6;
    $xType = 0.4;
    $yType = 8;
    
    //$pdf->Image('idcard/idcard-37-12.jpg',$x,$y,9.5,13.5,'','');

    //รูปถ่าย
    if($row['staff_pic'] != '') {
        if(file_exists('../../filestaff/'.$row['staff_pic'])){
            $pdf->Image('../../filestaff/'.$row['staff_pic'],$xphoto,$yphoto,2.6,3.2,'','');
        } 
    }

    //$pdf->Image('../../filesutdent/374pic_student.jpeg',$xphoto,$yphoto,2.6,3.2,'','');

    // ชื่อ สกุล
    $pdf->SetXY($xName,$yName);
    $fullname = $row['staff_title'].$row['staff_name'].' '.$row['staff_lastname'];
    //$fullname = 'นายทดสอบ ระบบ';
    $pdf->SetFont('THSarabunNew','B',16);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell( 5 , 0.5 , iconv('UTF-8','CP874',$fullname),0,1,'L');

    // ประเภทกีฬา
    $position_name = '';
    $sqlstaff = "SELECT  staff_cposition
        FROM staff
        WHERE staff_name = '$row[staff_name]' 
        AND staff_lastname = '$row[staff_lastname]' 
        GROUP BY staff_cposition
        ";
    $result_staff = mysql_query($sqlstaff);
    while($rowsstaff = mysql_fetch_array($result_staff)) {
       $position_name.= $rowsstaff['staff_cposition'];
       $position_name.= ' ';
    }

    $pdf->SetXY($xSport,$ySport);
    $pdf->SetFont('THSarabunNew','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell( 1 , 0.5 , iconv('UTF-8','CP874', $position_name),0,1,'L');

    // มหาลัย
    $pdf->SetXY($xFac,$yFac);
	$pdf->SetFont('THSarabunNew','B',14);
    $pdf->Cell( 1 , 0.5 , iconv('UTF-8','CP874',$row['subname_university']),0,1,'L');

    if($i < $numrow){
        //$i = 0;
        $pdf->AddPage();
    }
}

//$pdf->SetFont('Arial','B',16);
//$pdf->Cell( 50 , 10 , $fac_id);
//คำสั่งสำหรับขึ้นบรรทัดใหม่
$pdf->Ln();
//$pdf->Cell( 50 , 10 , 'Any sinner is bound to suffer as a result of his own wrong-doing.');
$pdf->Output();
?>
?>