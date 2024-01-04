<?php
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start();
session_start();
include("connect_db.php");
if( $_SESSION['admin_id']=="")
{
	header("location: index.php");
 	exit(0);	
}
$sqladmin = "select * from admin where admin_id = '".$_SESSION['admin_id']."'";
			$queryadmin = mysql_query($sqladmin,$conn) or die(mysql_error());
			$arradmin = mysql_fetch_array($queryadmin);
			
$sqlfaculty = "select * from faculty where faculty_id='".$_SESSION['faculty_id']."' ";
					
					 $qrfaculty = mysql_query($sqlfaculty);
					$arrfaculty = mysql_fetch_array($qrfaculty);
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
      <td width="9%">&nbsp;</td>
      <td width="80%"  align="center"><img src="http://template.rmutto.ac.th/Payom_Game59/2559/admin/images/logo_game.png" width="107" height="124" align="bottom"></td>
      <td width="11%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center"><p>กีฬาภายในมหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก &ldquo;พะยอมเกมส์&rdquo; ครั้งที่ 13</p>
      <p>ณ มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก</p>
      <p>วันที่ 20 - 25 พฤษจิกายน 2561</p>
      <p>รายงานประเภทกีฬาที่เข้าร่วมการแข้งขัน (F1)</p></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<br>
<tr>
      <td>&nbsp;</td>
      <td><?php echo $arrfaculty['faculty_name']; ?>&nbsp;&nbsp;&nbsp;มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก 
        <table width="100%" border="0">
          <tbody>
          <?php  $sqlft = "select * from sport_type_regis where faculty_id ='".$_SESSION['faculty_id']."' GROUP BY sport_id order by sport_type_regis_id asc ";
					  $qrft = mysql_query($sqlft);
					  while($arrft = mysql_fetch_array($qrft))
					  {
					  ?>
            <tr   bgcolor="#ABDCF7">
              <td><?php $sport = mysql_fetch_array(mysql_query("select * from sport where sport_id = '".$arrft['sport_id']."'"));echo $sport['sport_name'];?></td>
            </tr>
             <?php  $sqlft2 = "select * from sport_type_regis where faculty_id ='".$_SESSION['faculty_id']."' and sport_id='".$arrft['sport_id']."' order by sport_type_regis_id asc ";
					  $qrft2 = mysql_query($sqlft2);
					  while($arrft2 = mysql_fetch_array($qrft2))
					  {
					  ?>
            <tr>
              <td><font size="-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $arrft['sport_id']."-".$arrft2['sport_type_id']."-".$_SESSION['faculty_id']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php $sport_type = mysql_fetch_array(mysql_query("select * from sport_type where sport_type_id = '".$arrft2['sport_type_id']."'"));echo $sport_type['sport_type_name'];?></font></td>
            </tr>
            <?php }?> </br>
			<?php } ?>
          </tbody>
        </table>
      <p>&nbsp;</p></td>
      <td>&nbsp;</td>
    </tr>

<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="60%">&nbsp;</td>
      <td width="29%" align="center"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>(........................................................................)</p>
      <p>คณะบดี/ผู้อำนวยการ</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>_______________________________</p>
      <p>&nbsp;</p></td>
      <td width="11%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">
      <p>*** หมายเหตุ ใช้ในการรายงานประเภทกีฬาที่เข้าร่วมการแข้งขันเท่านั้น ณ มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก</p>
      </td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>


</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'garuda');

$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>     
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>
