<?php
ob_start();
session_start();
include("connect_db.php");
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
  <b style="font-family: thsarabun;  font-size: 22pt;">ใบส่งตัวนักกีฬา</b>
</div>
<?php
$sql1 = "select * from sports_category where id_Sports_category = '".$_GET['idc']."'";
$query1 = mysql_query($sql1,$conn) or die(mysql_error());
$arr1 = mysql_fetch_array($query1);

$sql2 = "select * from sport_regis where id_Sports_category = '".$_GET['idc']."' and sex = '".$_GET['sex']."'";
$query2 = mysql_query($sql2,$conn) or die(mysql_error());
$arr2 = mysql_fetch_array($query2);
?>
<div>
  <b style="font-family: thsarabun;  font-size: 18pt;">ข้อมูลนักกีฬา<?php echo $arr1['name_Sports_category'];?><?php if($arr1['st']==0){if($_GET['sex']=='M'){echo " "."ชาย";}else{echo " "."หญิง";}}?></b>
</div>
<?php
$sql3 = "select * from university where id_university = '".$_SESSION['university_id']."'";
$query3 = mysql_query($sql3,$conn) or die(mysql_error());
$arr3 = mysql_fetch_array($query3);
?>
<div>
  <b style="font-family: thsarabun;  font-size: 14pt;"><?php echo $arr3['name_university'];?></b>
</div>
<br>
<!------------------1----------------->
            
<table width="100%" border="1" cellspacing="0" cellpadding="2">
  <tbody>
    <tr  bgcolor="#53cddc">
      <td width="7%" align="center">
  		<b style="font-family: thsarabun;  font-size: 16pt;">ลำดับ</b>
      </td>
      <td width="20%" align="center">
  		<b style="font-family: thsarabun;  font-size: 16pt;">รูป</b>
      </td>
      <td width="33%" align="center">
  		<b style="font-family: thsarabun;  font-size: 16pt;">ชื่อ-สกุล/คณะ/ชั้นปี</b>
      </td>
      <td width="6%" align="center">
  		<b style="font-family: thsarabun;  font-size: 16pt;">เอกสาร</b>
      </td>
      <td width="17%" align="center">
  		<b style="font-family: thsarabun;  font-size: 16pt;">ตำแหน่ง</b>
      </td>
      <td width="19%" align="center">
  		<b style="font-family: thsarabun;  font-size: 16pt;">หมายเหตุ</b>
      </td>
    </tr>
    
    
    <?php
	$xi=1;
	if($arr1['st']==0){
$sql4 = "SELECT * from sport_regis 
  WHERE id_Sports_category = '".$_GET['idc']."' 
  AND id_university = '".$_SESSION['university_id']."' 
  AND sex = '".$_GET['sex']."'";
$query4 = mysql_query($sql4,$conn) or die(mysql_error());

	}else{
$sql4 = "SELECT * from sport_regis 
  where id_Sports_category = '".$_GET['idc']."' 
  AND id_university = '".$_SESSION['university_id']."'";
$query4 = mysql_query($sql4,$conn) or die(mysql_error());

	}
	while($arr4 = mysql_fetch_array($query4)){
	?>
    <tr>
      <td width="7%" align="center">
  		<p style="font-family: thsarabun;  font-size: 16pt;"><?php echo $xi;?></p>
      </td>
      
      <?php
$sql5 = "SELECT * from student_sports where id_student = '".$arr4['id_student']."'";
$query5 = mysql_query($sql5,$conn) or die(mysql_error());
$arr5 = mysql_fetch_array($query5); 
	  ?>
      
      <td width="20%" align="center">
      	<img class="brand-logo" alt="modern admin logo" src="filesutdent/<?php echo $arr5['pic_student'];?>" width="90" height="110">
      </td>
      <td width="33%">
  		<p style="font-family: thsarabun;  font-size: 16pt;"><?php echo $arr5['title_name'].$arr5['f_name']." ".$arr5['l_name']; ?></p>    
      	<p style="font-family: thsarabun;  font-size: 14pt;">
        <?php echo $arr5['faculty'];?>
        <br>
        <?php echo "ชั้นปี"." ".$arr5['year_level'];?>
        </p>
      </td>
      <td width="6%" align="center">      
  		<p style="font-family: thsarabun;  font-size: 16pt;"><?php if($arr5['st']==9){?><font color="#00A618">ผ่าน</font><?php }else{?><font color="#D30003">ไม่ผ่าน</font><?php }?></p>
      </td>
      <td width="17%" align="center">      
  		<p style="font-family: thsarabun;  font-size: 16pt;"></p>
      </td>
      <td width="19%" align="center">
            
  		<p style="font-family: thsarabun;  font-size: 16pt;"></p>
      </td>
    
    </tr>
    <?php $xi++; }?>
  </tbody>
</table>

<!------------------1----------------->
<br><br>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="50%"></td>
      <td align="right" width="50%">
      <p style="font-family: thsarabun;  font-size: 16pt;">
      ลงชื่อ...........................................................................</p>
      <p style="font-family: thsarabun;  font-size: 16pt;">
      (..............................................................................)</p>
      
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
$pdf->Output();
?>     
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>
	
    
 
