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
$sport_type = mysql_fetch_array(mysql_query("select * from sport_type where sport_type_id = '".$_GET['sport_type_id']."'"));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
      <p>ใบรายชื่อนักกีฬา</p></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<br>

      <h3 class="box-title">ข้อมูลนักกีฬา<?php echo $sport_type['sport_type_name']; ?></h3>
      <h4><?php echo $arrfaculty['faculty_name']; ?>&nbsp;&nbsp;&nbsp;มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก </h4>
        <table width="100%" border="1">
          <thead>
                      <tr bgcolor="#68E4F8">
                        <th width="10%">ลำดับ</th>
                        <th width="20%">เลขประจำนักศึกษา</th>
                        <th width="35%">ชื่อนักกีฬา</th>
                        <th width="15%">รูปนักกีฬา</th>
                        <th width="20%">หมายเหตุ</th>
                      </tr>
          </thead>
          <tbody>
                    <?php
					include ("connect_db.php");
					$i=1;
						$sql = "select * from std_regis where faculty_id = '".$_GET['faculty_id']."' and sport_type_id='".$_GET['sport_type_id']."' ";
					
					
					 $qr = mysql_query($sql);
					 while($arr = mysql_fetch_array($qr))
					 {
						 $user = mysql_fetch_array(mysql_query("select * from std_user where iduser = '".$arr['iduser']."'"));
					?>
                    
                      <tr bgcolor="#B5EDF7">
                        <td align="center"><?php  echo $i; ?></td>
                        <td><?php  echo $user['id_std']; ?></td>
                        <td><?php echo $user['title']." ".$user['name']." ".$user['surname']; ?></td>
                        <td align="center">
                        	<?php 
						   if( file_exists("pic_std/".$user['picture']) && $user['picture']!="")
							{
							?>
								<p><font color="#12B500">มีรูป</font></p>
							<?php 
							}
							else if($user['picture']=="")
							{ 
							?>
                            	<p><font color="#FF0004">ไม่มีรูป</font></p>
							<?php
							}
							else
							{ 
							?>
                            	<p><font color="#FF0004">ไม่มีรูป</font></p>
							<?php
							}
						   ?>
                        </td>
                        <td></td>
                      </tr>
                      <?php $i++;} ?>
          </tbody>
        </table>



              <h3 class="box-title">รูปนักกีฬา<?php echo $sport_type['sport_type_name']; ?></h3>
                    
<table width="100%" border="0">
  <tbody>
    <tr align="center">
					<?php
					include ("connect_db.php");
					$i=1;
						$sql = "select * from std_regis where faculty_id = '".$_GET['faculty_id']."' and sport_type_id='".$_GET['sport_type_id']."' ";
					
					
					 $qr = mysql_query($sql);
					 while($arr = mysql_fetch_array($qr))
					 {
						 $user = mysql_fetch_array(mysql_query("select * from std_user where iduser = '".$arr['iduser']."'"));
					?>
                    

						<td align="center">
						<?php 
						   if( file_exists("pic_std/".$user['picture']) && $user['picture']!="" )
							{
								?>
							<img src="pic_std/<?php echo $user['picture'];?>" height="150" />
                           <p>
                           <?php echo $user['title']." ".$user['name']." ".$user['surname']; ?>
                           </p>
                           <?php
							}
							else if( $user['picture']=="" )
							{ 
							?>
                            <img src="no-profile-img.gif" height="150" />
							</br>
                           <font color="#FF0004"><?php echo $user['title']." ".$user['name']." ".$user['surname'];?></font><?php
							}
							else
							{ 
							?>
                            <img src="no-profile-img.gif" height="150" />
							</br>
                           <font color="#FF0004"><?php echo $user['title']." ".$user['name']." ".$user['surname'];?></font><?php
							}?>
							</td><?php
						if($i==3)
						{
							?></tr><tr align="center"><?php
							$i=0;
						}	
						?>
                        
                        
                           
                           
                      <?php $i++;} ?>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="60%">&nbsp;</td>
      <td width="29%" align="center"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>(........................................................................)</p>
      <p>ผู้จัดการทีม</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>_______________________________</p>
      <p>&nbsp;</p></td>
      <td width="11%">&nbsp;</td>
    </tr>
  </tbody>
</table>

                           
                


 <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    

</body>
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'garuda');

$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?> 
<?php

 
$pdf=new MPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Text( 10 , 10 , 'The person who gives is much loved');
$pdf->Output();
?>

</html>
 
