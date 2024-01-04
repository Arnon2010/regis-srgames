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
    แบบแจ้งความจำนง - ประเภทกีฬา (F1) </b>
      </td>
      <td align="center" width="10%"><img class="brand-logo" alt="modern admin logo" src="piclogo/logo.jpg" width="100"></td>
    </tr>
  </tbody>
</table>

	<p style="font-family: thsarabun; font-size: 16pt;">
		<?php echo $arr2['name_university']; ?> <br>
        ข้อมูล ณ วันที่ <?php echo DateThai($strDate); ?>
	</p>

    		<!------------------1-------------------->
        <?php
        $sqlsport_type = "SELECT * from sport_type  ";
        $querysport_type = mysql_query($sqlsport_type,$conn) or die(mysql_error());
        while($arrsport_type = mysql_fetch_array($querysport_type))
        {
          $countgs = mysql_fetch_array(mysql_query("SELECT * FROM tb_f1 WHERE id_Sport_type = '".$arrsport_type['id_Sport_type']."' and id_unversity = '".$arr2['id_university']."' and (M='1' or F='1')"));
          if($countgs['id_f1']!="")
          {
        ?>
<table width="100%" height="100%" border="0"  cellspacing="0" cellpadding="0">
  <thead>
    <tr bgcolor="#FDB913">
      <th width="70%" align="left">
      	<b style="font-family: thsarabun;  font-size: 15pt;"><?php echo  $arrsport_type['name_Sport_type'];?></b>
      </th>
      <th align="center" width="15%">
      <b style="font-family: thsarabun;  font-size: 15pt;">ชาย</b>
    </th>
      <th align="center" width="15%">
      <b style="font-family: thsarabun;  font-size: 15pt;">หญิง</b>

    </th>
    </tr>
  <tbody>
    <?php
    $sqlsport_type2 = "SELECT sports_category.id_Sports_category,sports_category.id_Sport_type,sports_category.name_Sports_category,sports_category.playerM,sports_category.playerF,tb_f1.M,tb_f1.F   from sports_category INNER JOIN tb_f1 ON sports_category.id_Sports_category = tb_f1.id_Sports_category  where (sports_category.id_Sport_type='".$arrsport_type['id_Sport_type']."' and tb_f1.id_unversity = '".$arr2['id_university']."') and (tb_f1.M='1' or tb_f1.F='1') ";
    $querysport_type2 = mysql_query($sqlsport_type2,$conn) or die(mysql_error());
    while($arrsport_type2 = mysql_fetch_array($querysport_type2))
    {
     ?>
    <tr>
      <td width="70%">
      	<p style="font-family: thsarabun;  font-size: 15pt;"><?php echo $arrsport_type2['name_Sports_category']; ?></p>
      </td>
      <td align="center" width="15%">
      <p style="font-family: thsarabun;  font-size: 15pt;"><?php  if( $arrsport_type2['M']==1){ echo $arrsport_type2['playerM'];}else{ echo "-";} ?></p>
      </td>
      <td align="center" width="15%">
      <p style="font-family: thsarabun;  font-size: 15pt;"><?php  if( $arrsport_type2['F']==1){ echo $arrsport_type2['playerF'];}else{ echo "-";} ?></p>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<?php  }}?>
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
$pdf->Output('F1.pdf','I');
?>
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>
