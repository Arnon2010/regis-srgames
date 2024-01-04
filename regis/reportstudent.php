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
$sql2 = "select * from student_sports where id_student = '".$_GET['student']."' ";
$query2 = mysql_query($sql2,$conn) or die(mysql_error());
$arr2 = mysql_fetch_array($query2);
if($arr2['id_university']!=$_SESSION['university_id'] or $_SESSION['university_id']=="0")
{
	if($_SESSION['university_id']!="0")
	{
	header("location: index.php");
 	exit(0);
	}
}
if($arr2['st']!="9")
{
	header("location: index.php");
 	exit(0);
}
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

<body>
<table width="100%" border="0" >
        <tbody>
            <tr>
              <td align="center" width="10%"><img class="brand-logo" alt="modern admin logo" src="piclogo/ruts-logo.png" width="100"></td>
              <td align="center" width="80%">
              <b style="font-family: thsarabun;  font-size: 19pt;">
              กีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ครั้งที่ 37 <br>
              ณ มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย <br>
              วันที่ 6 - 10 กุมภาพันธ์ 2566 <br>
              </td>
              <td align="center" width="10%"><img class="brand-logo" alt="modern admin logo" src="piclogo/logo.jpg" width="120"></td>
            </tr>
          </tbody>
            </table>
<div align="center">
  <b style="font-family: thsarabun;  font-size: 22pt;">ใบสมัครการแข่งขัน</b>
</div>

    		<!------------------1----------------->

<table width="100%" border="0" cellpadding="3" cellspacing="0">
  <tbody>
    <tr>
      <td width="20%" rowspan="4" align="center"><img class="brand-logo" alt="modern admin logo" src="filesutdent/<?php echo $arr2['pic_student']; ?>" width="120" height="160"></td>
      <td width="80%" colspan="8"  bgcolor="#ffdd00">
      	<b style="font-family: thsarabun;  font-size: 20pt;">ประวัติ</b>
      </td>
    </tr>
    <tr>
      <td width="10%" >
      	<b style="font-family: thsarabun;  font-size: 18pt;">ชื่อ-สกุล</b>
      </td>
      <td width="10%" align="right">
      	<p style="font-family: thsarabun;  font-size: 18pt;"><?php echo $arr2['title_name']; ?></p>
      </td>
      <td width="20%">
      	<p style="font-family: thsarabun;  font-size: 18pt;"><?php echo $arr2['f_name'];?></p>
      </td>
      <td width="20%">
      	<p style="font-family: thsarabun;  font-size: 18pt;"><?php echo $arr2['l_name'];?></p>
      </td>
      <td width="10%" align="center">
      	<b style="font-family: thsarabun;  font-size: 18pt;">เพศ</b>
      </td>
      <td width="10%" align="center">
      	<p style="font-family: thsarabun;  font-size: 18pt;"><?php if( $arr2['title_name']=="นาย"){ echo "ชาย"; }else{ echo "หญิง";  } ?></p>
      </td>
      <td width="10%" align="center">
      	<b style="font-family: thsarabun;  font-size: 18pt;">สัญชาติ</b>
      </td>
      <td width="10%" align="center">
      	<p style="font-family: thsarabun;  font-size: 18pt;"><?php echo $arr2['nationality'];?></p>
      </td>
    </tr>
    <tr>
      <td width="10%">
      	<b style="font-family: thsarabun;  font-size: 18pt;">เชื้อชาติ</b>
      </td>
      <td width="10%" align="center">
      	<p style="font-family: thsarabun;  font-size: 18pt;"><?php echo $arr2['race'];?></p>
      </td>

      <td width="20%" align="center">
      	<b style="font-family: thsarabun;  font-size: 18pt;">เกิดวันที่</b>
      </td>
      <td width="10%" colspan="2">
      	<p style="font-family: thsarabun;  font-size: 18pt;"><?php echo DateThai($arr2['hbd']); ?></p>
      </td>
      <td width="10%" align="center">
      	<b style="font-family: thsarabun;  font-size: 18pt;">อายุ</b>
      </td>
      <td width="10%" align="center">
      	<p style="font-family: thsarabun;  font-size: 18pt;">
        <?php
                // กรณีวันเกิดที่เ็ก็บอยู่ในรูปแบบของ date แบบมาตรฐาน คือ ปี ค.ศ.- เดือน - วันที่
                // ตัวอย่าง 1990-02-14
                // ฟังก์ชันคำนวณหาอายุใช้ดังนี้
                function getAge($birthday) {
                $then = strtotime($birthday);
                return(floor((time()-$then)/31556926));
                }
                // การใช้งาน
                $dateB=$arr2['hbd']; // ตัวแปรเก็บวันเกิด
                echo getAge($dateB);
                // ผลลัพธ์จะได้ 19
        ?>
        </p>
      </td>
      <td width="10%" align="center">
      	<b style="font-family: thsarabun;  font-size: 18pt;">ปี</b>
      </td>
    </tr>
    <tr>
      <td width="30%" colspan="3">
      	<b style="font-family: thsarabun;  font-size: 18pt;">เลขประจำตัวประชาชน</b>
      </td>
      <td width="70%" colspan="5">
      	<p style="font-family: thsarabun;  font-size: 18pt;"><?php echo $arr2['CITIZEN_ID']; ?></p>
      </td>
    </tr>
  </tbody>
</table>
<br>
			<!------------------1----------------->
 <table width="100%" border="0" cellpadding="3" cellspacing="0">
  <tbody>
    <tr>
      <td width="100%" colspan="4" bgcolor="#ffdd00">
      	<b style="font-family: thsarabun;  font-size: 16pt;">สถานศึกษา</b>
      </td>
    </tr>
    <tr>
      <td width="20%">
      	<b style="font-family: thsarabun;  font-size: 15pt;">มหาวิทยาลัย</b>
      </td>
      <td width="80%" colspan="3">
      	<p style="font-family: thsarabun;  font-size: 15pt;"><?php $sql22 = "select * from university where id_university = '".$arr2['id_university']."' ";
				$query22 = mysql_query($sql22,$conn) or die(mysql_error());
				$arr22 = mysql_fetch_array($query22); echo $arr22['name_university'];  ?></p>
      </td>
    </tr>
    <tr>
     <td width="20%">
      	<b style="font-family: thsarabun;  font-size: 15pt;">คณะ</b>
      </td>
      <td width="80%" colspan="3">
      	<p style="font-family: thsarabun;  font-size: 15pt;"><?php echo $arr2['faculty']; ?></p>
      </td>
    </tr>
    <tr>
     <td width="20%">
      	<b style="font-family: thsarabun;  font-size: 15pt;">รหัสนักศึกษา</b>
      </td>
      <td width="80%" colspan="3">
      	<p style="font-family: thsarabun;  font-size: 15pt;"><?php echo $arr2['student_code']; ?></p>
      </td>
    </tr>
    <tr>
      <td width="20%">
      	<b style="font-family: thsarabun;  font-size: 15pt;">กำลังศึกษาในระดับ</b>
      </td>
      <td width="60%">
      	<p style="font-family: thsarabun;  font-size: 15pt;"><?php echo $arr2['education_level']; ?> </p>
      </td>
      <td width="10%">
      	<b style="font-family: thsarabun;  font-size: 15pt;">ชั้นปี</b>
      </td>
      <td width="10%">
      	<p style="font-family: thsarabun;  font-size: 15pt;"><?php echo $arr2['year_level']; ?> </p>
      </td>
    </tr>
  </tbody>
</table>
<br>
			<!------------------1----------------->
 <table width="100%" border="0" cellpadding="3" cellspacing="0">
  <tbody>
    <tr>
      <td width="100%" bgcolor="#ffdd00" colspan="4">
      	<b style="font-family: thsarabun;  font-size: 16pt;">การสมัครเข้าแข่งขัน</b>
      </td>
    </tr>
    <tr> <td width="100%" colspan="4">
      	<p style="font-family: thsarabun;  font-size: 15pt;">ข้าพเจ้าขอสมัครเข้าแข่งขันในชนิดกีฬา</p>
      </td>
    </tr>
		<?php
		$sqlsport_type = "SELECT * from sport_type  ";
		$querysport_type = mysql_query($sqlsport_type,$conn) or die(mysql_error());
		while($arrsport_type = mysql_fetch_array($querysport_type))
		{
			$countgs = mysql_fetch_array(mysql_query("SELECT * FROM sport_regis WHERE id_student = '".$arr2['id_student']."' and id_Sport_type = '".$arrsport_type['id_Sport_type']."' " ));
			if($countgs['id_student']!="")
			{
		?>
    <tr>
      <td width="10%"></td>
      <td width="90%" colspan="3">
      	<b style="font-family: thsarabun;  font-size: 15pt;"><?php echo $arrsport_type['name_Sport_type']; ?></b>
      </td>
    </tr>
		<?php
    $sqlsport_type2 = "SELECT * from sport_regis where id_Sport_type = '".$arrsport_type['id_Sport_type']."' and id_student = '".$arr2['id_student']."'  ";
    $querysport_type2 = mysql_query($sqlsport_type2,$conn) or die(mysql_error());
    while($arrsport_type2 = mysql_fetch_array($querysport_type2))
    {
			$cname = mysql_fetch_array(mysql_query("SELECT * FROM sports_category WHERE id_Sports_category = '".$arrsport_type2['id_Sports_category']."' " ));
     ?>
    <tr>
      <td width="10%"></td>
      <td width="10%" align="right">
      	<p style="font-family: thsarabun;  font-size: 15pt;">-</p>
      </td>
      <td width="70%"  colspan="2">
      	<p style="font-family: thsarabun;  font-size: 15pt;"><?php echo $cname['name_Sports_category']; ?></p>
      </td>
    </tr>
	<?php } }} ?>

  </tbody>
</table>
<br>
<!------------------1----------------->
     <font style="font-family: thsarabun;" style="font-size:14pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;และขอรับรองว่าข้าพเจ้ามีคุณสมบัติในการเข้าแข่งขันกีฬาถูกต้องตามข้อบังคับคณะกรรมการบริหารกีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ว่าด้วยการจัดการแข่งขันกีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย พ.ศ.๒๕๕๑ หมวด ๖ ข้อ ๑๗</font>
<br><br><br>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tbody>
<tr>
<td width="40%" colspan="2">
  <p style="font-family: thsarabun;  font-size: 15pt;">ช่องเอกสารแนบ</p>
</td>
<td width="10%">&nbsp;</td>
<td width="50%" align="center">
  <p style="font-family: thsarabun;  font-size: 15pt;">ลงชื่อ............................................................................</p>
</td>
</tr>
<tr>
<td width="10%" align="right">
  <p style="font-family: thsarabun;  font-size: 15pt;">[&nbsp;&nbsp;]</p>
</td>
<td width="30%">
  <p style="font-family: thsarabun;  font-size: 15pt;">สำเนาบัตรประชาชน</p>
</td>
<td width="10%">&nbsp;</td>
<td width="50%" align="center">
  <p style="font-family: thsarabun;  font-size: 15pt;">( <?php echo $arr2['title_name'].$arr2['f_name']." ".$arr2['l_name']; ?> )<br>
  </p>
</td>
</tr>
<tr>
<td width="10%" align="right">
  <p style="font-family: thsarabun;  font-size: 15pt;">[&nbsp;&nbsp;]</p>
</td>
<td width="30%">
  <p style="font-family: thsarabun;  font-size: 15pt;">สำเนาบัตรนักศึกษา</p>
</td>
<td width="10%">&nbsp;</td>
<td width="50%" align="center">
  <p style="font-family: thsarabun;  font-size: 15pt;">ผู้สมัครเข้าแข่งขัน<br>
  </p>
</td>
</tr>
<tr>
<td width="10%" align="right">
  <p style="font-family: thsarabun;  font-size: 15pt;">[&nbsp;&nbsp;]</p>
</td>
<td width="30%">
  <p style="font-family: thsarabun;  font-size: 15pt;">ใบลงทะเบียนภาคเรียนที่ 2/2561</p>
</td>
<td width="10%">&nbsp;</td>
<td width="50%" align="center"></td>
</tr>
<tr>
<td width="10%" align="right">
  <p style="font-family: thsarabun;  font-size: 15pt;">[&nbsp;&nbsp;]</p>
</td>
<td width="30%">
  <p style="font-family: thsarabun;  font-size: 15pt;">ใบผลการเรียนภาคเรียนที่ 1/2561</p>
</td>
<td width="10%">&nbsp;</td>
<td width="50%" align="center">
  <p style="font-family: thsarabun;  font-size: 15pt;">ลงชื่อ............................................................................<br>
  </p>
</td>
</tr>
<tr>
<td width="10%" align="right"></td>
<td width="30%">&nbsp;</td>
<td width="10%">&nbsp;</td>
<td width="50%" align="center">
  <p style="font-family: thsarabun;  font-size: 15pt;">(..................................................................................)<br>
  </p>
</td>
</tr>
<tr>
<td width="10%" align="right"></td>
<td width="30%">&nbsp;</td>
<td width="10%">&nbsp;</td>
<td width="50%" align="center">
  <p style="font-family: thsarabun;  font-size: 15pt;">อธิการบดีหรือผู้ที่ได้รับมอบหมาย
  </p>
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
$pdf->AddPage();
//$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output($arr2['CITIZEN_ID'].'student.pdf','I');
?>
