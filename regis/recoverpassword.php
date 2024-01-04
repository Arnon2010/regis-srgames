<?php
include("connect_db.php");
$a="";
$checkadd = 0;
$arrusername = mysql_fetch_array(mysql_query("SELECT * FROM user_admin WHERE username_user_admin = '".$_POST['username']."'"));

if($_GET['login']=="check")
{
  if ($arrusername['id_user_admin']!="") {


 $nameuser = $_POST['username'];
  $email = $arrusername['email_User_admin'];
 $str = '1234567890';
$shuffled = str_shuffle($str);
 $rdcode= base64_encode(substr($shuffled ,0,3));
$ipaddress = $_SERVER['REMOTE_ADDR'];
$datelog = date("d-m-Y");
$st = 0;
 $strSQL = "INSERT INTO log_pass_word_tb VALUES (null,'$nameuser','$email','$rdcode','$ipaddress','$datelog','$st')";
 $objQuery = mysql_query($strSQL);
 date_default_timezone_set('Asia/Bangkok');
 require 'PHPMailer/PHPMailerAutoload.php';
 $name2=$arrusername['name_university'];
 //Create a new PHPMailer instance
 $mail = new PHPMailer;
 //Tell PHPMailer to use SMTP
 $mail->isSMTP();
 //Enable SMTP debugging
 // 0 = off (for production use)
 // 1 = client messages
 // 2 = client and server messages
 $mail->SMTPDebug = 0;
 //Ask for HTML-friendly debug output
 $mail->Debugoutput = 'html';
 //Set the hostname of the mail server
 $mail->Host = "smtp.gmail.com";
 //Set the SMTP port number - likely to be 25, 465 or 587
 $mail->Port = 587;
 //Set the encryption system to use - ssl (deprecated) or tls
 $mail->SMTPSecure = 'tls';
 //Whether to use SMTP authentication
 $mail->SMTPAuth = true;
 //Username to use for SMTP authentication....................................................
 $mail->Username = "do-not-reply@rmutsv.ac.th";
 //Password to use for SMTP authentication....................................................
 $mail->Password = "074317100";
 //Set who the message is to be sent from
 $mail->setFrom('srivijayagames@rmutsv.ac.th', 'SrivijayaGames');
 //Set who the message is to be sent to
 $mail->addAddress($email, 'srivijayagames');
 //Set the subject line
 $mail->Subject = 'ระบบจัดการงานกีฬาศรีวิชัยเกมส์';

 $mail->CharSet = "utf-8";
 //Read an HTML message body from an external file, convert referenced images to embedded,
 //convert HTML into a basic plain-text alternative body
 //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
 $mail->msgHTML("ระบบแจ้งข้อความ อัตโนมัติ<br>
 ท่านได้ทำการขอเปลี่ยน Passwordของผู้ใช่งาน:$nameuser  <br>
 <br>
 <br>
 ท่านสามารถเปลี่ยนรหัสผ่านในการเข้าสู่ระบบ
 https://regissvg.rmutsv.ac.th/resetpassword.php?token=$rdcode
 <br>
 สอบถามรายละเอียดเพิ่มเติมได้ที่:
 <br>
 มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย
 <br>
 เบอโทรศัพท์ติดต่อ :0-7431-7146
 <br>
   srivijayagames@rmutsv.ac.th
 <br>");

 //send the message, check for errors
 if (!$mail->send()) {
     echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
  $checkadd = 1;
  }
$checkadd="1";
}
 else
 {
   $a="ชื่อผู้ใช้งานไม่ถูกต้อง";
 }
}


?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>เปลี่ยนรหัสผ่านระบบศรีวิชัยเกมส์
  </title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- END Custom CSS-->
  <link href="sweetalert/sweetalert.css" rel="stylesheet" />
 <script src="sweetalert/sweetalert.min.js"></script>
</head>
<body class="horizontal-layout horizontal-menu 1-column   menu-expanded blank-page blank-page"
data-open="hover" data-menu="horizontal-menu" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                    <img src="piclogo/logo.jpg" alt="branding logo" width="30%">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>กรุกรุณากรอกชื่อผู้ใช้ระบบจะส่งลิ้งในการเปลี่ยนรหัสผ่านไปที่ Email ของท่าน</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" action="recoverpassword.php?login=check" method="post" novalidate>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control form-control-lg input-lg" id="username" name="username"
                        placeholder="ชื่อผู้ใช้ของคุณ" required>
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>
                        <font color="red"><?php  echo $a; ?></font>
                      <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="ft-unlock"></i>ยืนยันการเปลี่ยนรหัสผ่าน</button>
                    </form>
                  </div>
                </div>
                <div class="card-footer border-0">
                  <p class="float-sm-left text-center"><a href="index.php" class="card-link">เข้าสู่ระบบ</a></p>

                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
  <script src="app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
<?php
if($checkadd=="1")
{
  ?>
  <script type="text/javascript">
  swal({
  title: "ดำเนินการเสร็จสิ้น",
  text: "ระบบได้ส่งลิ้งในการเปลี่ยนรหัสผ่านไปที่ email ของท่านแล้ว",
  type: "success",

  confirmButtonClass: "btn-danger",
  confirmButtonText: "ตกลง!",
  closeOnConfirm: false
 },
 function(){
  window.location.href="index.php";
  swal("Deleted!", "Your imaginary file has been deleted.", "success");
 });

      </script>
      <?php
}
?>
