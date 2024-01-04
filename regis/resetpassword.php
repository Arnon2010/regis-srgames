<?php
include("connect_db.php");
$a="";
$checkadd = 0;


if($_GET['action']=="check")
{
  $arrusername = mysql_fetch_array(mysql_query("SELECT * FROM log_pass_word_tb WHERE log_pass_token = '".$_GET['token']."' and st='0' order by id_log_pass desc"));
  if ($arrusername['id_log_pass']!="") {
    $password_user_admin = md5(md5(md5($_POST['password_confirmation'])));
    $strSQL = "UPDATE user_admin SET password_user_admin = '$password_user_admin' where username_user_admin = '".$arrusername['username_user_admin']."'";
    $objQuery = mysql_query($strSQL);
  $strSQL2 = "UPDATE log_pass_word_tb SET st = '1' where id_log_pass = '".$arrusername['id_log_pass']."'";
  $objQuery2 = mysql_query($strSQL2);



$checkadd = 1;
  }
  else {
  $checkadd = 2;
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
  <title>เปลี่ยนรหัสผ่านศรีวิชัยเกมส์
  </title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- END Custom CSS-->
  <link href="sweetalert/sweetalert.css" rel="stylesheet" />
 <script src="sweetalert/sweetalert.min.js"></script>
</head>
<body class="horizontal-layout horizontal-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
data-open="hover" data-menu="horizontal-menu" data-col="1-column">
  <!-- fixed-top-->

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                    <img src="piclogo/logo.jpg" alt="branding logo" width="40%">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>กรุณากรอกข้อมูลรหัสผ่าน</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" action="resetpassword.php?action=check&token=<?php echo $_GET['token']; ?>" method="post" novalidate>
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" name="password" id="password" class="form-control input-lg"
                            placeholder="Password" tabindex="5" required minlength="6" maxlength="10">
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                            <div class="help-block font-small-3"></div>
                          </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg"
                            placeholder="Confirm Password" tabindex="6" data-validation-matches-match="password"
                            data-validation-matches-message="รหัสผ่านยืนยันไม่ถูกต้อง">
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                            <div class="help-block font-small-3"></div>
                          </fieldset>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                          <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-user"></i>ยืนยัน</button>
                        </div>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer fixed-bottom footer-dark navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="http://www.rmutto.ac.th/"
        target="_blank">RMUTTO</a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"><i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
  <script src="app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html><?php
if($checkadd=="1")
{
 ?>
 <script type="text/javascript">
 swal({
 title: "คุณได้เปลี่ยนรหัสผ่านเสร็จสิ้นแล้ว",
 text: "กรุณาเข้าสู่ระบบ",
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
}else if($checkadd=="2")
{
     ?>
     <script type="text/javascript">
     swal({
     title: "ไม่สามารถเปลี่ยนรหัสผ่านได้?",
     text: "เนื่องจากลิ้งยืนยันไม่ถูกต้อง",
     type: "warning",

     confirmButtonClass: "btn-danger",
     confirmButtonText: "ตกลง!",
     closeOnConfirm: false
    },
    function(){
     window.location.href="recoverpassword.php";
     swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });

         </script>
         <?php
}

   ?>
