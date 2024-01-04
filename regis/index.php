<?php
ob_start();
session_start();
include("connect_db.php");
$a = "";
if ($_GET['login'] == "check") {
  if ($_SESSION['admin_id'] == "") {
    $username = $_POST['username'];
    echo $password = md5(md5(md5($_POST['password'])));

    $sql = "SELECT * FROM user_admin 
        WHERE username_user_admin = '$username' 
        AND password_user_admin = '$password' 
        AND st='0'";
    $query = mysql_query($sql, $conn) or die(mysql_error());
    $arr = mysql_fetch_array($query);
    if ($username == $arr['username_user_admin'] && $password == $arr['password_user_admin']) {
      $_SESSION['admin_id'] = $arr['id_user_admin'];
      $_SESSION['admin_username'] = $arr['username_user_admin'];
      $_SESSION['admin_type_id'] = $arr['id_Type_admin'];
      $_SESSION['university_id'] = $arr['id_university'];
      $_SESSION['phone_user_admin'] = $arr['phone_user_admin'];
      $_SESSION['email_user_admin'] = $arr['email_user_admin'];
      $_SESSION['admin_st'] = $arr['st_User_admin'];


      $ipaddress = $_SERVER['REMOTE_ADDR'];
      $datelog = date("d-m-Y");
      $timelog = date("H:i:s");

      $strSQL = "INSERT INTO log_login_tb VALUES ('','$username',' $ipaddress','$datelog','$timelog')";
      $objQuery = mysql_query($strSQL);
      if ($_POST['check'] == 0) {
        @setcookie("chant_id", $_SESSION['admin_id'], time() + 259200);
        @setcookie("chant_id2", $_SESSION['admin_username'], time() + 259200);
        @setcookie("chant_id3", $_SESSION['admin_type_id'], time() + 259200);
        @setcookie("chant_id3", $_SESSION['university_id'], time() + 259200);
        @setcookie("chant_id3", $_SESSION['phone_user_admin'], time() + 259200);
        @setcookie("chant_id3", $_SESSION['email_user_admin'], time() + 259200);
        @setcookie("chant_id3", $_SESSION['admin_st'], time() + 259200);

        header("location: home.php");
        exit(0);
      }
    } else {
      $a = "username หรือ password ผิด";
    }
  } else {
    header("location: home.php");
    exit(0);
  }
} else if ($_SESSION['admin_id'] != "") {
  header("location: home.php");
  exit(0);
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="กีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ครั้งที่ 37 ศรีวิชัยเกมส์ กีฬา 9 ราชมงคล SRIVICHAIGAME  37th เจ้าภาพ มทร.9 ศรีวิชัย" />
  <meta name="keywords" content="ศรีวิชัยเกมส์, กีฬามหาวิทยาลัยเทคโนโลยีราชมงคล, กีฬา 9 มทร., กีฬามหาวิทยาลัย, เทคโนโลยีราชมงคล, กีฬาราชมงคล, กีฬาราชมงคลตะวันออก, มทร., กีฬา ตะวันออก,กีฬา 9 ราชมงคล, ชลบุรี, มหาวิทยาลัยจังหวัดเชลบุรี, เทคโน, เทคโน, ม.เกษตร, RMUTTO, Chonburee" />
  <meta name="author" content="กีฬา มทร. ครั้งที่ 37" />
  <title>Login - SRIVICHAIGAME
  </title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
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
</head>

<body class="horizontal-layout horizontal-menu 1-column menu-expanded fixed-navbar" data-open="hover" data-menu="horizontal-menu" data-col="1-column" style="background-color:#FFDD00;">
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
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img src="piclogo/logo.jpg" alt="branding logo" width="30%">
                    <img src="piclogo/logo2.png" alt="branding logo" width="40%">

                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>เข้าสู่ระบบศรีวิชัยเกมส์</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" action="index.php?login=check" method="post" novalidate>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg" id="username" name="username" placeholder="ชื่อผู้ใช้งาน" tabindex="1" required data-validation-required-message=กรุณากรอกชื่อผู้ใช้>
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control input-lg" id="password" name="password" placeholder="รหัสผ่าน" tabindex="2" required data-validation-required-message="กรุณากรอกรหัสผ่าน">
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-md-left">
                          <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember" name="check">
                            <label for="remember-me"> จำรหัสผ่าน</label>
                          </fieldset>
                          <font color="red"><?php echo $a; ?></font>
                        </div>
                        <div class="col-md-6 col-12 text-center text-md-right"><a href="recoverpassword.php" class="card-link">ลืมรหัสผ่าน?</a></div>
                      </div>
                      <button type="submit" class="btn btn-ruts btn-block btn-lg"><i class="ft-unlock"></i> เข้าสู่ระบบ</button>
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
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="https://www.rmutto.ac.th/" target="_blank">RMUTTO</a>, 2022 <a class="text-bold-800 grey darken-2" href="https://www.rmutsv.ac.th/" target="_blank">RUTS</a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"><i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
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

</html>