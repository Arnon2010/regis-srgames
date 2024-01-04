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
    รายชื่อลงทะเบียน - ประเภทกีฬา (F2) </b>
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
        $sport_type = $_GET['sport_type'];
        $sqlsport_type = "SELECT * from sport_type  WHERE id_Sport_type = '$sport_type'";
        $querysport_type = mysql_query($sqlsport_type,$conn) or die(mysql_error());
        while($arrsport_type = mysql_fetch_array($querysport_type))
        {
          $countgs = mysql_fetch_array(mysql_query("SELECT * FROM tb_f1 WHERE id_Sport_type = '".$arrsport_type['id_Sport_type']."' and id_unversity = '".$arr2['id_university']."' and (M='1' or F='1')"));
          if($countgs['id_f1']!="")
          {
        ?>
<table width="100%" height="100%" border="0"  cellspacing="0" cellpadding="0">
  <thead>
    <tr bgcolor="#FDB913" class="mt-3">
      <th width="70%" align="left">
      	<b style="font-family: thsarabun;  font-size: 15pt;"><?php echo  $arrsport_type['name_Sport_type'];?></b>
      </th>
    </tr>
  <tbody>
    <?php
    $sqlsport_type2 = "SELECT sports_category.id_Sports_category,sports_category.id_Sport_type,sports_category.name_Sports_category,sports_category.playerM,sports_category.playerF,tb_f1.M,tb_f1.F   
    from sports_category INNER JOIN tb_f1 ON sports_category.id_Sports_category = tb_f1.id_Sports_category  
    where (sports_category.id_Sport_type='".$arrsport_type['id_Sport_type']."' and tb_f1.id_unversity = '".$arr2['id_university']."') and (tb_f1.M='1' or tb_f1.F='1') ";
    $querysport_type2 = mysql_query($sqlsport_type2,$conn) or die(mysql_error());
    while($arrsport_type2 = mysql_fetch_array($querysport_type2))
    {
     ?>
    <tr bgcolor="#D3D3D3">
      <td width="70%">
      	<p style="font-family: thsarabun;  font-size: 16pt;"><?php echo $arrsport_type2['name_Sports_category']; ?></p>
      </td>
    </tr>
    <?php
    $u_id = $_GET['u_id'];
    $sql = "SELECT  r.id_student, s.title_name, s.f_name, s.l_name
        FROM sport_regis r
        INNER JOIN student_sports s ON r.id_student = s.id_student
        WHERE r.id_university = '$u_id' 
        AND r.id_Sports_category = '$arrsport_type2[id_Sports_category]'
        ";
        $result = mysql_query($sql);
        // $numrow = mysql_num_rows($result);
        // $i=0;
        while($row=mysql_fetch_array($result)){
    ?>
    <tr>
        <td colspan="3">&nbsp;&nbsp;&nbsp;
        <span style="font-family: thsarabun;  font-size: 15pt;"><?php echo $row['title_name'].''.$row['f_name'].' '.$row['l_name'];?></span></td>
    </tr>
  <?php } 
  }?>
  </tbody>
</table>
<?php  }
}?>
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
