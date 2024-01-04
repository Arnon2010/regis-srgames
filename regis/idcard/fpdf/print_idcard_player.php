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

$u_id = $_GET['u_id'];
$sql = "SELECT  r.id_student, s.title_name, s.f_name, s.l_name, s.pic_student, u.subname_university
	FROM sport_regis r
    INNER JOIN student_sports s ON r.id_student = s.id_student
    INNER JOIN university u ON s.id_university = u.id_university
	WHERE r.id_university = '$u_id' AND s.st = '9'
    GROUP BY r.id_student 
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
    if($row['pic_student'] != '') {
        if(file_exists('../../filesutdent/'.$row['pic_student'])){
            $pdf->Image('../../filesutdent/'.$row['pic_student'],$xphoto,$yphoto,2.6,3.2,'','');
        } 
    }

    //$pdf->Image('../../filesutdent/374pic_student.jpeg',$xphoto,$yphoto,2.6,3.2,'','');

    // ชื่อ สกุล
    $pdf->SetXY($xName,$yName);
    $fullname = $row['title_name'].$row['f_name'].' '.$row['l_name'];
    //$fullname = 'นายทดสอบ ระบบ';
    $pdf->SetFont('THSarabunNew','B',16);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell( 5 , 0.5 , iconv('UTF-8','CP874',$fullname),0,1,'L');

    // ประเภทกีฬา
    $pdf->SetXY($xSport,$ySport);
    $sport_name = '';

    $std_id = $row['id_student'];
    $sqlstd = "SELECT  t.name_Sport_type
        FROM sport_regis r
        LEFT JOIN sport_type t ON r.id_Sport_type = t.id_Sport_type
        WHERE r.id_student = '$std_id' GROUP BY r.id_Sport_type
        ";
    $result_std = mysql_query($sqlstd);
    while($rowstd = mysql_fetch_array($result_std)) {
       $sport_name.= $rowstd['name_Sport_type'];
       $sport_name.= ' ';
    }
    //$sport_name = $row['title_name'];
    //$sport_name = 'นักกีฬาฟุตบอล';
    $pdf->SetFont('THSarabunNew','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell( 1 , 0.5 , iconv('UTF-8','CP874','นักกีฬา'.$sport_name),0,1,'L');

    // มหาลัย
    $pdf->SetXY($xFac,$yFac);
	$pdf->SetFont('THSarabunNew','B',14);
    $pdf->Cell( 1 , 0.5 , iconv('UTF-8','CP874',$row['subname_university']),0,1,'L');

    // ประเภท
	//$pdf->Image('pictype/F.png',$xType,$yType,2.6,2.6,'','');
    
    // $pdf->SetXY($xSport,$ySport);
    // $pdf->SetTextColor(0,0,255);
    // $pdf->SetFont('THSarabunNew','B',14);
    // $s_event = "SELECT sporttype.spt_name
	// 	FROM player_events
	// 	inner join subsporttype on subsporttype.sub_id = player_events.sub_id
	// 	inner join sporttype on sporttype.spt_id = subsporttype.spt_id
	// 	WHERE player_events.std_id = '$row[std_id]'
    //     GROUP BY sporttype.spt_name";
	// $q_event = mysql_query($s_event);
	// $no=0;
    // while($r_event = mysql_fetch_array($q_event)){
    //     $no++;
	// 	if($no == 1) $title = 'นักกีฬา ';
	// 	else $title = '';
    //     $pdf->Cell( 15 , 7 , iconv('UTF-8','CP874', $title),0,0,'');
    //     $pdf->Cell( 50 , 7 , ': '.iconv('UTF-8','CP874',$r_event[spt_name]),0,1,'');
    //     $ySport = $ySport+4;
    //     $pdf->SetXY($xSport,$ySport);
    // }
    
    
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