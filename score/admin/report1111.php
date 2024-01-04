<?php
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ

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
          
            <tr>
                  <td width="70%">
                    <p style="font-family: thsarabun;  font-size: 15pt;">วิ่ง 100 เมตร</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
            
                  </td>
              </tr></br>
              <tr>
                  <td width="70%">
                    <p style="font-family: thsarabun;  font-size: 15pt;">วิ่ง 100 เมตร</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
            
                  </td>
              </tr></br>
              <tr>
                  <td width="70%">
                    <p style="font-family: thsarabun;  font-size: 15pt;">วิ่ง 100 เมตร</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
            
                  </td>
              </tr></br>
              <tr>
                  <td width="70%">
                    <p style="font-family: thsarabun;  font-size: 15pt;">วิ่ง 100 เมตร</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
            
                  </td>
              </tr></br>
              <tr>
                  <td width="70%">
                    <p style="font-family: thsarabun;  font-size: 15pt;">วิ่ง 100 เมตร</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
            
                  </td>
              </tr></br>
              <tr>
                  <td width="70%">
                    <p style="font-family: thsarabun;  font-size: 15pt;">วิ่ง 100 เมตร</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
                  </td>
                  <td align="center" width="15%">
                  <p style="font-family: thsarabun;  font-size: 15pt;">2</p>
            
                  </td>
              </tr></br>
             
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
