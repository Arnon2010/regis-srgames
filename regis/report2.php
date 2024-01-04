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
  <b style="font-family: thsarabun;  font-size: 22pt;">ใบสมัครการแข่งขัน</b>
</div>
	    
    		<!------------------1----------------->
            
<table width="100%" border="0" cellpadding="3" cellspacing="0">
  <tbody>
    <tr>
      <td width="20%" rowspan="4" align="center"><img class="brand-logo" alt="modern admin logo" src="piclogo/logo.jpg" width="120" height="160"></td>
      <td width="80%" colspan="8"  bgcolor="#53cddc">
      	<b style="font-family: thsarabun;  font-size: 20pt;">ประวัติ</b>
      </td>
    </tr>
    <tr>
      <td width="10%" >
      	<b style="font-family: thsarabun;  font-size: 18pt;">ชื่อ-สกุล</b>
      </td>
      <td width="10%" align="right">
      	<p style="font-family: thsarabun;  font-size: 18pt;">นางสาว</p>
      </td>
      <td width="20%">
      	<p style="font-family: thsarabun;  font-size: 18pt;">สมมุติ</p>
      </td>
      <td width="20%">
      	<p style="font-family: thsarabun;  font-size: 18pt;">ตั้งเอง</p>
      </td>      
      <td width="10%" align="center">
      	<b style="font-family: thsarabun;  font-size: 18pt;">เพศ</b>
      </td>
      <td width="10%" align="center">
      	<p style="font-family: thsarabun;  font-size: 18pt;">หญิง</p>
      </td>
      <td width="10%" align="center">
      	<b style="font-family: thsarabun;  font-size: 18pt;">สัญชาติ</b>
      </td>
      <td width="10%" align="center">
      	<p style="font-family: thsarabun;  font-size: 18pt;">ไทย</p>
      </td>
    </tr>
    <tr>
      <td width="10%">
      	<b style="font-family: thsarabun;  font-size: 18pt;">เชื้อชาติ</b>
      </td>
      <td width="10%" align="center">
      	<p style="font-family: thsarabun;  font-size: 18pt;">ไทย</p>
      </td>

      <td width="20%" align="center">
      	<b style="font-family: thsarabun;  font-size: 18pt;">เกิดวันที่</b>
      </td>
      <td width="10%" colspan="2">
      	<p style="font-family: thsarabun;  font-size: 18pt;">ไทย</p>
      </td>
      <td width="10%" align="center">
      	<b style="font-family: thsarabun;  font-size: 18pt;">อายุ</b>
      </td>
      <td width="10%" align="center">
      	<p style="font-family: thsarabun;  font-size: 18pt;">22</p>
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
      	<p style="font-family: thsarabun;  font-size: 18pt;">1719900396121</p>
      </td>
    </tr>
  </tbody>
</table>
<br>
			<!------------------1----------------->
<table width="100%" border="0" cellpadding="3" cellspacing="0">
  <tbody>
    <tr>
      <td width="100%" colspan="4" bgcolor="#53cddc">
      	<b style="font-family: thsarabun;  font-size: 16pt;">สถานศึกษา</b>
      </td>
    </tr>
    <tr>
      <td width="20%">
      	<b style="font-family: thsarabun;  font-size: 15pt;">มหาวิทยาลัย</b>
      </td>
      <td width="80%" colspan="3">
      	<p style="font-family: thsarabun;  font-size: 15pt;">มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก</p>
      </td>
    </tr>
    <tr>
     <td width="20%">
      	<b style="font-family: thsarabun;  font-size: 15pt;">คณะ</b>
      </td>
      <td width="80%" colspan="3">
      	<p style="font-family: thsarabun;  font-size: 15pt;">เทคโนโลยีอุตสาหกรรมการเกษตร</p>
      </td>
    </tr>
    <tr>
     <td width="20%">
      	<b style="font-family: thsarabun;  font-size: 15pt;">รหัสนักศึกษา</b>
      </td>
      <td width="80%" colspan="3">
      	<p style="font-family: thsarabun;  font-size: 15pt;">036040331003-8</p>
      </td>
    </tr>
    <tr>
      <td width="20%">
      	<b style="font-family: thsarabun;  font-size: 15pt;">กำลังศึกษาในระดับ</b>
      </td>
      <td width="60%">
      	<p style="font-family: thsarabun;  font-size: 15pt;">ปริญญาตรี </p>
      </td>
      <td width="10%">      	
      	<b style="font-family: thsarabun;  font-size: 15pt;">ชั้นปี</b>
      </td>
      <td width="10%">
      	<p style="font-family: thsarabun;  font-size: 15pt;">1</p>
      </td>
    </tr>
  </tbody>
</table>
<br>
			<!------------------1----------------->
<table width="100%" border="0" cellpadding="3" cellspacing="0">
  <tbody>
    <tr>
      <td width="100%" bgcolor="#53cddc" colspan="4">
      	<b style="font-family: thsarabun;  font-size: 16pt;">การสมัครเข้าแข่งขัน</b>
      </td>
    </tr>
    <tr> <td width="100%" colspan="4">
      	<p style="font-family: thsarabun;  font-size: 15pt;">ข้าพเจ้าขอสมัครเข้าแข่งขันในชนิดกีฬา</p>
      </td>
    </tr>
    <tr>
      <td width="10%"></td>
      <td width="90%" colspan="3">
      	<b style="font-family: thsarabun;  font-size: 15pt;">กีฑา</b>
      </td>
    </tr>
    <tr>
      <td width="10%"></td>
      <td width="10%" align="right">
      	<p style="font-family: thsarabun;  font-size: 15pt;">-</p>
      </td>
      <td width="70%"  colspan="2">
      	<p style="font-family: thsarabun;  font-size: 15pt;">วิ่ง 10,000 เมตร</p>
      </td>
    </tr>
    <tr>
      <td width="10%"></td>
      <td width="10%" align="right">
      	<p style="font-family: thsarabun;  font-size: 15pt;">-</p>
      </td>
      <td width="70%"  colspan="2">
      	<p style="font-family: thsarabun;  font-size: 15pt;">วิ่ง 5,000 เมตร</p>
      </td>
    </tr>
  </tbody>
</table>
<br>
			<!------------------1----------------->
           <font style="font-family: thsarabun;" style="font-size:14pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;และขอรับรองว่าข้าพเจ้ามีคุณสมบัติในการเข้าแข่งขันกีฬาถูกต้องตามข้อบังคับคณะกรรมการบริหารก๊ฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ว่าด้วยการจัดการแข่งขันกีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย พ.ศ.๒๕๕๑ หมวด ๖ ข้อ ๑๗</font>
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
      	<p style="font-family: thsarabun;  font-size: 15pt;">( นางสาวสมมุติ ตั้งเอง )<br>
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
$pdf->Output();
?>     
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>
	
    
 
