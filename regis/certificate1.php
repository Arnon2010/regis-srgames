<?php
ob_start();
session_start();
include("connect_db.php");
require_once('mpdf/mpdf.php');
if($_SESSION['admin_id']=="")
{
	header("location: index.php");
 	exit(0);
}
$sql2 = "SELECT *
  FROM student_sports WHERE id_student = '".$_GET['student']."' ";
$query2 = mysql_query($sql2,$conn) or die(mysql_error());
$arr2 = mysql_fetch_array($query2);
function DateThai($strDate)
{
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));

  $strMonthCut = Array("","มกราคม","กุมภาพันธ์ ","มีนาคม","เมษายน.","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>

</head>

<body><br><br><br><br><br><br><br>
<table width="100%" border="0">
              <tbody>
                <tr>
                  <td align="center" width="10%"></td>
                  <td align="center" width="80%">

                    <font color="#140958">
                            <b style="font-family: thsarabun;  font-size: 36pt;">
                              มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย</b>
                          </font>
                  <font color="#744C00">
                      <p style="font-family: thsarabun;  font-size: 24pt;">
                              มอบเกียรติบัตรฉบับนี้ให้ไว้เพื่อแสดงว่า</p>
                      </font>
                  </td>
                  <td align="center" width="10%"></td>
                </tr>
              </tbody>
 </table>

<!------------------1----------------->
 <table width="100%" border="0">
  <tbody>
    <tr>
      <td align="center">
      <b style="font-family: thsarabun;  font-size: 28pt;">
      <?php echo $arr2['title_name']; ?><?php echo $arr2['f_name'];?> <?php echo $arr2['l_name'];?></b>
      <p style="font-family: thsarabun;  font-size: 24pt;">
      <?php
	    $sqluni = "select * from university where id_university = '".$arr2['id_university']."' ";
		$queryuni = mysql_query($sqluni,$conn) or die(mysql_error());
		$arruni = mysql_fetch_array($queryuni);
		echo $arruni['name_university'];
	  ?>
      
      
      </p>
      </td>
    </tr>
  </tbody>
</table>

<!------------------1----------------->
<table width="100%" border="0">
  <tbody>
    <tr>
      <td align="center" style="color:#744C00">
      <b style="font-family: thsarabun;  font-size: 24pt;">
      ได้ผ่านการเข้าร่วม</b><br>
      <b style="font-family: thsarabun;  font-size: 25pt;">
      การแข่งขันกีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ครั้งที่ 37  "ศรีวิชัยเกมส์"</b>
      </td>
    </tr>
  </tbody>
</table>

<!------------------1----------------->
<table width="100%" border="0">
  <tbody>
    <tr>
      <td align="center" style="color:#140958">
      <p style="font-family: thsarabun;  font-size: 22pt;">
      ระหว่างวันที่ 6 - 10 กุมภาพันธ์ พ.ศ. 2566</p>
      </td>
    </tr>
  </tbody>
</table>
 <table width="100%" border="0">
  <tbody>
    <tr>
      <td align="center" style="color:#140958">
      <p style="font-family: thsarabun;  font-size: 22pt;">
      ณ มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย ต.บ่อยาง อ.เมือง จ.สงขลา</p>
      </td>
    </tr>
  </tbody>
</table>

<!------------------1----------------->
<table width="100%" border="0">
  <tbody>
    <tr>
      <td align="center">
		<img class="brand-logo" alt="modern admin logo" src="piclogo/ruts-athikarn.png" width="110">
      </td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td align="center" style="color:#050E6F">
      <p style="font-family: thsarabun;  font-size: 20pt;">
      ศาสตราจารย์ ดร.สุวัจน์  ธัญรส</p>
      <p style="font-family: thsarabun;  font-size: 16pt;">
      อธิการบดีมหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย</p>
      <p style="font-family: thsarabun;  font-size: 16pt;">
      ประธานคณะกรรมการจัดการแข่งขัน</p>
      <p style="font-family: thsarabun;  font-size: 16pt;">
      กีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ครั้งที่ 37</p>

      </td>
    </tr>
  </tbody>
</table>
<!------------------1----------------->

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th','A4','0','THSaraban');
$pdf->AddPage('L');
//$pdf->SetAutoFont();
$pdf->SetDefaultBodyCSS('background', "url('piclogo/sirvijayagame-card-2566.png')");
$pdf->SetDefaultBodyCSS('background-image-resize', 1);
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$fileName = $arr2['title_name'].$arr2['f_name'].' '.$arr2['l_name'];
$pdf->Output($fileName.'-'.'เกียรติบัตรเข้าร่วม.pdf','I');
$pdf->Output();
?>
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>
