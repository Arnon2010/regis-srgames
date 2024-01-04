<?php
 //include("connect_db.php");
 date_default_timezone_set("Asia/Bangkok");
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="กีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ครั้งที่ 37 ศรีวิชัยเกมส์ กีฬา 9 ราชมงคล SRIVICHAIGAME  37th เจ้าภาพ มทร.9 ศรีวิชัย" />
			 <meta name="keywords" content="ศรีวิชัยเกมส์, กีฬามหาวิทยาลัยเทคโนโลยีราชมงคล, กีฬา 9 มทร., กีฬามหาวิทยาลัย, เทคโนโลยีราชมงคล, กีฬาราชมงคล, กีฬาราชมงคลตะวันออก, มทร., กีฬา ตะวันออก,กีฬา 9 ราชมงคล, ชลบุรี, มหาวิทยาลัยจังหวัดเชลบุรี, เทคโน, เทคโน, ม.เกษตร, RMUTTO, Chonburee" />
			 <meta name="author" content="กีฬา มทร. ครั้งที่ 37" />
  <title>SCORE SRIVIJAYAGAMES</title>
  <link href="http://tawanokgame.rmutto.ac.th/wp-content/uploads/2020/01/logo_W.png" rel="shortcut icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <!-- END Custom CSS-->
  <!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
<!-- END MODERN CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- END Custom CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/line-awesome/css/line-awesome.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/fonts/meteocons/style.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
</head>
<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="2-columns">
  <?php if($_GET['action'] != 'view') {?>
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="https://srivijayagames.rmutsv.ac.th/">
              <img class="brand-logo" alt="modern admin logo" src="piclogo/logo.jpg">
              <h3 class="brand-text">ศรีวิชัยเกมส์</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">ผู้สนับสนุน</a>
              <ul class="mega-dropdown-menu dropdown-menu row">

                <li class="col-md-4">
                  <h6 class="dropdown-menu-header text-uppercase"><font color="#e3bb1c" face="chewy">GOLD PARTNERS</font></h6>

                </li>
                <li class="col-md-4">
                  <h6 class="dropdown-menu-header text-uppercase"></i><font color="#adadad">SILVER PARTNERS</font></h6>

                </li>
                <li class="col-md-4">
                  <h6 class="dropdown-menu-header text-uppercase"><font color="#c68a2b">BRONZE PARTNERS</font></h6>

                </li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">

          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

  <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li >
          <a class="nav-link" href="index.php"><i class="la la-home"></i>
            <span>หน้าหลัก</span>
          </a>
        </li>

        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la ft-layout"></i><span>ตารางการแข่งขัน</span></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?menu=showfixture" >ตารางการแข่งขัน</a></li>
                <li><a class="dropdown-item" href="http://tawanokgame.rmutto.ac.th/?wpdmpro=%e0%b8%95%e0%b8%b2%e0%b8%a3%e0%b8%b2%e0%b8%87%e0%b8%81%e0%b8%b2%e0%b8%a3%e0%b9%81%e0%b8%82%e0%b9%88%e0%b8%87%e0%b8%82%e0%b8%b1%e0%b8%99" >โปรแกรมการแข่งขัน</a></li>
              <!--<li><a class="dropdown-item" href="#" >สรุปเหรียญตามชนิดกีฬา</a></li>-->
            </ul>

          </a>
        </li>

        <li >
          <a class="nav-link" href="index.php?menu=showscore1"><i class="la la-clipboard"></i>
            <span>ผลการแข่งขัน</span>
          </a>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la ft-award"></i><span>สรุปเหรียญรางวัล</span></a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?menu=medal" >สรุปเหรียญตามสังกัด</a></li>
            <li><a class="dropdown-item" href="index.php?menu=medal_type" >สรุปเหรียญตามชนิดกีฬา</a></li>
          </ul>
        </li>
        <li class="dropdown nav-item">
          <a class="nav-link" href="index.php?menu=student"><i class="la ft-user"></i>
            <span>รายชื่อนักกีฬา</span>
          </a>
        </li>
        <li class="dropdown nav-item">
          <a class="nav-link" href="https://srivijayagames.rmutsv.ac.th/?page_id=376"><i class="la ft-map-pin"></i>
            <span>สนามแข่งขัน</span>
          </a>
        </li>
        <li class="dropdown nav-item">
          <a class="nav-link" href="https://srivijayagames.rmutsv.ac.th/">
            <span>Website ศรีวิชัยเกมส์</span>
          </a>
        </li>

      </ul>
    </div>
  </div>
  <?php } //end action?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <?php

    if($_GET['menu']=="")
    {
      include("main.php");
    }
		else if($_GET['menu']=="fixture")
    {
      include("fixture.php");
    }
	else if($_GET['menu']=="MatchDay")
    {
      include("Match_day.php");
    }
	else if($_GET['menu']=="student")
    {
      include("student.php");
    }
	else if($_GET['menu']=="studentdetail")
    {
      include("studentdetail.php");
    }
    else if($_GET['menu']=="fixture1")
    {
      include("fixture1.php");
    }
    else if($_GET['menu']=="fixture2")
    {
      include("fixture2.php");
    }
	    else if($_GET['menu']=="score")
    {
      include("score.php");
    }
	else if($_GET['menu']=="score1")
    {
      include("score1.php");
    }
	else if($_GET['menu']=="score2")
    {
      include("score2.php");
    }
	else if($_GET['menu']=="medal")
    {
      include("medal.php");
    }
  	else if($_GET['menu']=="medal_type")
    {
      include("medal_type.php");
    }
    else if($_GET['menu']=="medal_type_detail")
    {
      include("medal_type_detail.php");
    }
    else if($_GET['menu']=="result_team")
      {
        include("result_team.php");
      }
	  else if($_GET['menu']=="result_team1")
      {
        include("result_team1.php");
      }
	  else if($_GET['menu']=="result_team2")
      {
        include("result_team2.php");
      }
	else if($_GET['menu']=="medal_detail")
    {
      include("medal_detail.php");
    }
	else if($_GET['menu']=="showfixture")
    {
      include("showfixture.php");
    }
	else if($_GET['menu']=="showscore1")
    {
      include("showscore1.php");
    }
  ?>

<?php if($_GET['action'] != 'view') {?>

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-dark navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="http://www.rmutto.ac.th/"
        target="_blank">RMUTTO</a>, 2022 <a class="text-bold-800 grey darken-2" href="http://www.rmutsv.ac.th/"
        target="_blank">RUTS</a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"><i class="ft-heart pink"></i></span>
    </p>
  </footer>
<?php }?>
</body>
</html>
