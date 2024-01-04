<?php
ob_start();
session_start();
//print_r($_SESSION);

include("connect_db.php");

if ($_SESSION['admin_id'] == "") {
  header("location: index.php");
  exit(0);
}

function check_permis_navbar($id)
{
  global $conn;
  $sql = "SELECT * FROM nav_permis WHERE nav_permis_id = '$id'";
  $query = mysql_query($sql, $conn) or die(mysql_error());
  $data = mysql_fetch_array($query);
  return $data['nav_permis_active'];
}

$sql = "SELECT * FROM user_admin where id_user_admin = '" . $_SESSION['admin_id'] . "' ";
$query = mysql_query($sql, $conn) or die(mysql_error());
$arr = mysql_fetch_array($query);
$sql2 = "select * from university where id_university = '" . $_SESSION['university_id'] . "' ";
$query2 = mysql_query($sql2, $conn) or die(mysql_error());
$arr2 = mysql_fetch_array($query2);

$sql33 = "select * from type_admin where id_Type_admin = '" . $_SESSION['admin_type_id'] . "' ";
$query33 = mysql_query($sql33, $conn) or die(mysql_error());
$arr33 = mysql_fetch_array($query33);

$sql44 = "select * from sport_type where id_Sport_type = '" . $_SESSION['admin_st'] . "' ";
$query44 = mysql_query($sql44, $conn) or die(mysql_error());
$arr44 = mysql_fetch_array($query44);
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
  <title>Dashboard - SRIVICHAIGAME
  </title>

  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="piclogo/logo.png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">

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
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
</head>

<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.php">
              <img class="brand-logo" alt="modern admin logo" src="piclogo/logo.jpg">
              <h3 class="brand-text">ศรีวิชัยเกมส์</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="ft-menu"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
          </ul>
          </li>

          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1"><?php echo $arr33['name_Type_admin'] . "  " . $arr44['name_Sport_type'] . " "; ?><?php echo $arr2['subname_university']; ?>
                </span>
                <span class="avatar avatar-online">
                  <img src="app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i><?php echo $arr['name_user_admin']; ?></a>

                <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="ft-power"></i>ออกจากระบบ</a>
              </div>
            </li>

            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <?php $countst = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM message_tb WHERE id_user_admin = '" . $_SESSION['admin_id'] . "' and st ='0' ")); ?>
                <?php if ($countst['total'] != "0") { ?> <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow"><?php echo $countst['total'];   ?></span><?php } ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-danger float-right m-0"><?php echo $countst['total'];   ?></span>
                </li>
                <li class="scrollable-container media-list w-100">
                  <?php $sql2 = "SELECT * FROM message_tb WHERE id_user_admin = '" . $_SESSION['admin_id'] . "' and st ='0'  ";
                  $query2 = mysql_query($sql2, $conn) or die(mysql_error());
                  while ($arr2 = mysql_fetch_array($query2)) { ?>
                    <a href="check_read.php?idread=<?php echo $arr2['message_id']; ?>">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                        <div class="media-body">

                          <p class="notification-text font-small-3 text-muted"><?php echo $arr2['message_detail']; ?></p>
                          <small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00"><?php echo $arr2['date']; ?></time>
                          </small>
                        </div>
                      </div>
                    </a>
                  <?php } ?>
                </li>

              </ul>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-write bg-menu-ruts navbar-without-dd-arrow navbar-shadow" style="background-color:#001C54; color:azure;" role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="dropdown nav-item">
          <a class=" nav-link" href="home.php"><i class="la la-home"></i>
            <span>หน้าหลัก</span>
          </a>

        </li>

        <?php if ($_SESSION['admin_type_id'] == "4") { ?>
          <li class="dropdown nav-item"><a class="nav-link" href="home.php?menu=admin" is-active><i class="la icon-bag"></i><span>จัดการผู้ดูแลระบบ</span></a>

          </li>
          <li class="dropdown nav-item"><a class="nav-link" href="home.php?menu=playeradmin" is-active><i class="la icon-bag"></i><span>เพิ่มเติมนักกีฬา</span></a>

          </li>
        <?php } ?>

        <?php
        //$checkPermis1 = check_permis_navbar('1');
        if ($_SESSION['admin_type_id'] == "1" && check_permis_navbar('1') == '1') { ?>
          <li class="dropdown nav-item"><a class="nav-link" href="home.php?menu=sportadmin" is-active><i class="ft-aperture"></i><span>จัดการผู้ดูแลชนิดกีฬา</span></a>

          </li>
        <?php } ?>


        <? if (($_SESSION['admin_type_id'] == "1" or $_SESSION['admin_type_id'] == "4") && check_permis_navbar('2') == '1') { ?>
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="ft-user"></i><span>จัดการบุคลากร</span></a>
            <ul class="dropdown-menu">


              <li data-menu="">
                <a class="dropdown-item" href="home.php?menu=manager" data-toggle="dropdown"><i class="ft-user-plus"></i>ลงทะเบียนผู้บริหาร</a>
              </li>
              <li data-menu="">
                <a class="dropdown-item" href="home.php?menu=staff" data-toggle="dropdown"><i class="ft-user-plus"></i>ลงทะเบียนเจ้าหน้าที่ทีม</a>
              </li>
              <li class="disabled" data-menu=""><a class="dropdown-item" href="home.php?menu=personnel" data-toggle="dropdown"><i class="ft-users"></i>ลงทะเบียนบุคลากร</a>
              </li>

            </ul>
          </li>
        <? } ?>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="icon-social-facebook"></i><span>จัดการข้อมูล F1</span></a>
          <ul class="dropdown-menu">

            <?php if ($_SESSION['university_id'] > "0" and $_SESSION['admin_type_id'] == "1") { ?>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=F1" data-toggle="dropdown"><i class="ft-plus-circle"></i>ลงทะเบียน F1</a>
                </li>
            <?php 
            } ?>
            <li class="disabled" data-menu=""><a class="dropdown-item" href="home.php?menu=f1dashborad" data-toggle="dropdown"><i class="ft-server"></i>รายการข้อมูล F1</a>
            </li>
            <?php if ($_SESSION['university_id'] == "0") { ?>
              <li class="disabled" data-menu=""><a class="dropdown-item" href="home.php?menu=f1admin" data-toggle="dropdown"><i class="ft-server"></i>ปริ้นข้อมูล F1</a>
              </li>
            <?php } ?>
          </ul>
        </li>

        <?php if (check_permis_navbar('4') == '1') { ?>
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-male"></i><span>จัดการนักกีฬา</span></a>
            <ul class="dropdown-menu">

              <?php if ($_SESSION['university_id'] > "0") { ?>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=player" data-toggle="dropdown"><i class="ft-user-plus"></i>ลงทะเบียนนักกีฬา</a>
                </li>
              <?php  } ?>
              <?php if ($_SESSION['admin_type_id'] == "4" || $_SESSION['admin_type_id'] == "3" || $_SESSION['university_id'] == "0") { ?>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=verify" data-toggle="dropdown"><i class="ft-users"></i>รายการข้อมูลนักกีฬา</a>
                </li>
              <?php  } ?>
            </ul>
          </li>
        <?php } ?>

        <?php if ($_SESSION['university_id'] > "0" && check_permis_navbar('5') == '1') { ?>
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-soccer-ball-o"></i>
              <span>จัดการทีมการแข่งขัน F2 </span></a>
            <ul class="dropdown-menu">
              <?php if ($_SESSION['admin_st'] > "0") {
              ?>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=regissport" data-toggle="dropdown"><i class="ft-external-link"></i>ลงทะเบียนทีมการแข่งขัน F2</a>
                </li>
              <?php } else {

              ?>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=showF2" data-toggle="dropdown"><i class="ft-external-link"></i>ลงทะเบียนทีมการแข่งขัน F2</a>
                </li>
              <?php
              } ?>
              <li data-menu="">
                <a class="dropdown-item" href="home.php?menu=regisdetail" data-toggle="dropdown"><i class="ft-file-minus"></i>รายการทีมการแข่งขัน</a>
              </li>
            </ul>
          </li>
          <?php if (check_permis_navbar('6') == '1') { ?>
            <li class="dropdown nav-item"><a class="nav-link" href="home.php?menu=regisview" is-active><i class="ft-file-minus"></i><span>ใบส่งตัวนักกีฬา</span></a></li>
          <?php } ?>

          <?php if ($_SESSION['admin_username'] == 'RUTS' || $_SESSION['admin_username'] == 'admin') { ?>
            <li class="dropdown nav-item"><a class="nav-link" href="home.php?menu=regisview_all" is-active><i class="ft-file-minus"></i><span>ใบส่งตัวนักกีฬาทั้งหมด</span></a></li>
          <?php } ?>

          <?php if (check_permis_navbar('7') == '1' || $_SESSION['admin_username'] != 'RUTS') { ?>
            <li class="dropdown nav-item"><a class="nav-link" href="home.php?menu=std_0" is-active><i class="ft-file-minus"></i><span>เกียรติบัตรออนไลน์</span></a></li>
          <?php } ?>
        <?php  } ?>
        <?php if ($_SESSION['admin_st'] == "4") { ?>
          <li class="dropdown nav-item"><a class="nav-link" href="home.php?menu=regisviewadmin" is-active><i class="ft-file-minus"></i><span>ใบส่งตัวนักกีฬา</span></a></li>
        <?php } ?>

        <?php if ($_SESSION['admin_st'] == "1") { ?>
          <li class="dropdown nav-item"><a class="nav-link" href="home.php?menu=show_regis" is-active><i class="ft-file-minus"></i><span>รายชื่อนักศึกษาลงทะเบียนแข่งขัน</span></a></li>
        <?php } ?>

        <?php if ($_SESSION['admin_type_id'] == "3" or $_SESSION['admin_type_id'] == "4") { ?>
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-male"></i><span>Id card</span></a>
            <ul class="dropdown-menu">

              <?php if ($_SESSION['admin_type_id'] == "3" or $_SESSION['admin_type_id'] == "4") { ?>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=idcard_student" data-toggle="dropdown"><i class="ft-server"></i>Id card นักกีฬา</a>
                </li>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=idcard_manager" data-toggle="dropdown"><i class="ft-server"></i>Id card ผู้บริหาร</a>
                </li>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=idcard_staff" data-toggle="dropdown"><i class="ft-server"></i>Id card เจ้าหน้าที่ทีม</a>
                </li>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=idcard_personnel" data-toggle="dropdown"><i class="ft-server"></i>Id card บุคลากร</a>
                </li>
              <?php  } ?>
              
            </ul>
          </li>
        <?php } ?>

        <?php if ($_SESSION['admin_type_id'] == "3" or $_SESSION['admin_type_id'] == "4") { ?>
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-male"></i><span>รายงาน</span></a>
            <ul class="dropdown-menu">

              <?php if ($_SESSION['admin_type_id'] == "3" or $_SESSION['admin_type_id'] == "4") { ?>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=show_regis" data-toggle="dropdown"><i class="ft-server"></i>รายชื่อลงทะเบียนแข่งขัน</a>
                </li>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=report_manager" data-toggle="dropdown"><i class="ft-server"></i>รายชื่อผู้บริหาร</a>
                </li>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=report_staff" data-toggle="dropdown"><i class="ft-server"></i>รายชื่อเจ้าหน้าที่ทีม</a>
                </li>
                <li data-menu="">
                  <a class="dropdown-item" href="home.php?menu=report_personnel" data-toggle="dropdown"><i class="ft-server"></i>รายชื่อบุคลากร</a>
                </li>
              <?php  } ?>
              
            </ul>
          </li>
        <?php } ?>

        <?php if (check_permis_navbar('8') == '1') { ?>
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-file-text"></i><span>คู่มือการใช้งาน</span></a>
            <ul class="dropdown-menu">
              <li data-menu="">
                <a class="dropdown-item" target="_bank" href="PDF/คู่มือการลงทะเบียน-37.pdf" data-toggle="dropdown"><i class="ft-file-minus"></i>การใช้งานระบบ</a>
              </li>
              <?php if (check_permis_navbar('8') == '0') { ?>
                <li data-menu="">
                  <a class="dropdown-item" target="_bank" href="PDF/58252_F2.pdf" data-toggle="dropdown"><i class="ft-file-minus"></i>คู่มือการลงทะเบียน F2</a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <?php
  //print_r($_SESSION);
  //check date deatline

  // ลงทะเบียน F2 ..

  // if($_GET['menu'] == 'showF2' || $_GET['menu'] == 'manager' || $_GET['menu'] == 'staff' || $_GET['menu'] == 'personnel') {
  //   if(date("Y-m-d") > "2022-12-24" ){
  //     include("main.php");
  //     exit();
  //   }
  // }


  if ($_GET['menu'] == "") {
    include("main.php");
  } else if ($_GET['menu'] == "admin") {
    include("add_user_admin.php");
  } else if ($_GET['menu'] == "F1") {
    include("add_F1.php");
  } else if ($_GET['menu'] == "f1dashborad") {
    include("F1D.php");
  } else if ($_GET['menu'] == "sportadmin") {
    include("add_sport_admin.php");
  } else if ($_GET['menu'] == "player") {
    include("player.php");
  } else if ($_GET['menu'] == "playeradmin") {
    include("playeradmin.php");
  } else if ($_GET['menu'] == "player2") {
    include("player2.php");
  } else if ($_GET['menu'] == "staff") {
    include("staff.php");
  } else if ($_GET['menu'] == "manager") {
    include("manager.php");
  } else if ($_GET['menu'] == "regissport") {
    include("regis.php");
  } else if ($_GET['menu'] == "verify") {
    include("verify.php");
  } else if ($_GET['menu'] == "regisdetail") {
    include("detail_regis.php");
  } else if ($_GET['menu'] == "regisview") {
    include("regisview.php");
  } else if ($_GET['menu'] == "personnel") {
    include("personnel.php");
  } else if ($_GET['menu'] == "view") {
    include("view.php");
  } else if ($_GET['menu'] == "regisviewadmin") {
    include("regisviewadmin.php");
  } else if ($_GET['menu'] == "f1admin") {
    include("f1admin.php");
  } else if ($_GET['menu'] == "showF2") {
    include("showf2.php");
  } else if ($_GET['menu'] == "regis2") {
    include("regis2.php");
  } else if ($_GET['menu'] == "std_0") {
    include("std_0.php");
  } 
  else if ($_GET['menu'] == "show_regis") {
    include("show_regis.php");
  }
  else if ($_GET['menu'] == "show_regis2") {
    include("show_regis2.php");
  }
  else if ($_GET['menu'] == "show_regis_all") {
    include("show_regis_all.php");
  }
  else if ($_GET['menu'] == "idcard_student") {
    include("idcard_student.php");
  }
  else if ($_GET['menu'] == "idcard_student_all") {
    include("idcard_student_all.php");
  }

  else if ($_GET['menu'] == "idcard_manager") {
    include("idcard_manager.php");
  }
  else if ($_GET['menu'] == "idcard_manager_all") {
    include("idcard_manager_all.php");
  }
  else if ($_GET['menu'] == "idcard_staff") {
    include("idcard_staff.php");
  }
  else if ($_GET['menu'] == "idcard_staff_all") {
    include("idcard_staff_all.php");
  }
  else if ($_GET['menu'] == "idcard_personnel") {
    include("idcard_personnel.php");
  }
  else if ($_GET['menu'] == "idcard_personnel_all") {
    include("idcard_personnel_all.php");
  }
  else if ($_GET['menu'] == "report_manager") {
    include("report_manager.php");
  }
  else if ($_GET['menu'] == "report_staff") {
    include("report_staff.php");
  }
  else if ($_GET['menu'] == "report_personnel") {
    include("report_personnel.php");
  }
  else if ($_GET['menu'] == "regisview_all") {
    include("regisview_all.php");
  }

  ?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-dark navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="https://www.rmutto.ac.th/" target="_blank">RMUTTO</a>, 2022 <a class="text-bold-800 grey darken-2" href="https://www.rmutsv.ac.th/" target="_blank">RUTS</a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"><i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->




</body>

</html>