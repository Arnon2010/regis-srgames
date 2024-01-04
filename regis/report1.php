<?php
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

<table width="100%" border="0">
  <tbody>
    <tr>
      <td align="center" width="10%"><img class="brand-logo" alt="modern admin logo" src="piclogo/logo.jpg" width="100"></td>
      <td align="center" width="80%">
      <b style="font-family: thsarabun;  font-size: 19pt;">
		กีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ครั้งที่ 36 <br>
ณ มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก <br>
วันที่ 31 มกราคม - 8 กุมภาพันธ์ 2563 <br>
แบบแจ้งความจำนง - ประเภทกีฬา (F1) </b>

      </td>
      <td align="center" width="10%"><img class="brand-logo" alt="modern admin logo" src="piclogo/logo.jpg" width="100"></td>
    </tr>
  </tbody>
</table>

	<p style="font-family: thsarabun; font-size: 16pt;">
		มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก <br>
        ข้อมูล ณ วันที่ 23 กันยายน 2562
	</p>

    		<!------------------1-------------------->

<table width="100%" height="100%" border="0"  cellspacing="0" cellpadding="0">
  <tbody>
    <tr bgcolor="#10bfd2">
      <td width="70%">
      	<b style="font-family: thsarabun;  font-size: 15pt;">กรีฑา</b>
      </td>
      <td align="center" width="15%">
      <b style="font-family: thsarabun;  font-size: 15pt;">ชาย</b>
      </td>
      <td align="center" width="15%">
      <b style="font-family: thsarabun;  font-size: 15pt;">หญิง</b>

      </td>
    </tr>

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
    </tr>
    <tr bgcolor="#10bfd2">
      <td width="70%">
      	<b style="font-family: thsarabun;  font-size: 15pt;">บาสเกตบอล</b>
      </td>
      <td align="center" width="15%">
      <b style="font-family: thsarabun;  font-size: 15pt;">ชาย</b>
      </td>
      <td align="center" width="15%">
      <b style="font-family: thsarabun;  font-size: 15pt;">หญิง</b>

      </td>
    </tr>

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
    </tr>
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
    </tr>


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
$pdf->Output('F1.pdf','I');
?>
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>
