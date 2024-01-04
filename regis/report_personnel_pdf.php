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
if($_SESSION['university_id']!="0"){
  header("location: home.php");
 	exit(0);
}
$sql2 = "select * from university where id_university = '".$_GET['u_id']."' ";
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
$strDate= date("Y-m-d");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>

</head>

<body>

<table width="100%" border="0">
  <tbody>
    <tr>
      <td align="center" width="10%"><img class="brand-logo" alt="modern admin logo" src="piclogo/logo.jpg" width="100"></td>
      <td align="center" width="80%">
      <b style="font-family: thsarabun;  font-size: 19pt;">
		กีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ครั้งที่ 37 <br>
    ณ มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย <br>
    วันที่ 6 - 10 กุมภาพันธ์ 2566 <br>
    รายชื่อลงทะเบียน - บุคลากร </b>
      </td>
      <td align="center" width="10%"><img class="brand-logo" alt="modern admin logo" src="piclogo/logo.jpg" width="100"></td>
    </tr>
  </tbody>
</table>

	<p style="font-family: thsarabun; font-size: 16pt;">
		<?php echo $arr2['name_university']; ?> <br>
        ข้อมูล ณ วันที่ <?php echo DateThai($strDate); ?>
	</p>

    	
<table width="100%" height="100%" border="0"  cellspacing="0" cellpadding="0">
  <thead>
    <tr bgcolor="#FDB913" class="mt-3">
      <th width="10%" align="center">
      	<b style="font-family: thsarabun;  font-size: 16pt;">ลำดับ</b>
      </th>
      
      </th>
      <th width="30%" align="left">
      	<b style="font-family: thsarabun;  font-size: 16pt;">
        ชื่อ
      </b>
      </th>
      <th width="30%" align="left">
      	<b style="font-family: thsarabun;  font-size: 16pt;">
        สกุล
      </b>
      </th>
      <th width="30%" align="left">
      	<b style="font-family: thsarabun;  font-size: 16pt;">
      ประเภทบุคลากร
      </b>
    </tr>
  <tbody>
    <?php
    $sqlsport_type2 =  "SELECT * from personnel p 
    left join type_user t ON  p.type_user = t.id_type_user
    where p.id_university = '$_GET[u_id]'
    and p.personnel_st = '0'
    order by p.personnel_name, p.personnel_lastname ASC";
    $i = 0;
    $querysport_type2 = mysql_query($sqlsport_type2,$conn) or die(mysql_error());
    $i = 0;
    while($arrsport_type2 = mysql_fetch_array($querysport_type2))
    {
      $i++;
     ?>
    <tr bgcolor="#ffffff">
      <td align="center">
      	<p style="font-family: thsarabun;  font-size: 16pt;"><?php echo $i; ?></p>
      </td>
     
      <td>
      	<p style="font-family: thsarabun;  font-size: 16pt;">
        <?php echo $arrsport_type2['personnel_title'].''.$arrsport_type2['personnel_name']; ?></p>
      </td>
      <td>
      	<p style="font-family: thsarabun;  font-size: 16pt;">
        <?php echo $arrsport_type2['personnel_lastname']; ?></p>
      </td>
      <td>
      	<p style="font-family: thsarabun;  font-size: 16pt;">
        <?php echo $arrsport_type2['name_type_user']; ?></p>
      </td>
    </tr>
    
   
  <?php } 
  ?>
  </tbody>
</table>

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
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF();
$pdf->AddPage();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$file_name_export = 'F2-'.$_GET['sport_name'].'-'.$arr2['subname_university'].'.pdf';
$pdf->Output($file_name_export,'I');
?>
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>
