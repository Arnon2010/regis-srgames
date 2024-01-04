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
  <b style="font-family: thsarabun;  font-size: 22pt;">ใบรายชื่อนักกีฬา</b>
</div>
<div>
  <b style="font-family: thsarabun;  font-size: 18pt;">ข้อมูลนักกีฬาเซปักตะกร้อ ทีมเดี่ยวชาย</b>
</div>
<div>
  <b style="font-family: thsarabun;  font-size: 14pt;">มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก</b>
</div>
<br>
<!------------------1----------------->
            
<table width="100%" border="0" cellspacing="0" cellpadding="2">
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
    <tr>
      <td width="7%" align="center">
  		<p style="font-family: thsarabun;  font-size: 16pt;">1</p>
      </td>
      <td width="20%" align="center">
      	<img class="brand-logo" alt="modern admin logo" src="piclogo/logo.jpg" width="90" height="110">
      </td>
      <td width="33%">
  		<p style="font-family: thsarabun;  font-size: 16pt;">นายสมมุติ&nbsp;ตั้งเอง</p>    
      	<p style="font-family: thsarabun;  font-size: 14pt;">
        คณะสัตวแพทยศาสตร์
        <br>
        ชั้นปี 1
        </p>
      </td>
      <td width="6%" align="center">      
  		<p style="font-family: thsarabun;  font-size: 16pt;">ไม่ครบ</p>
      </td>
      <td width="17%" align="center">      
  		<p style="font-family: thsarabun;  font-size: 16pt;">ผู้เล่นหลัก</p>
      </td>
      <td width="19%" align="center">
            
  		<p style="font-family: thsarabun;  font-size: 16pt;">ขาดรูป</p>
      </td>
    </tr>
    
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
	
    
 
