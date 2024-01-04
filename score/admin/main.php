<?php
ob_start();
session_start();
include("connect_db.php");
if ($_SESSION['admin_id'] == "") {
  //header("location: index.php");
  //exit(0);	
}
$sqladmin = "select * from admin where admin_id = '" . $_SESSION['admin_id'] . "'";
$queryadmin = mysql_query($sqladmin, $conn) or die(mysql_error());
$arradmin = mysql_fetch_array($queryadmin);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ระบบจัดการงานกีฬา admin</title>
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

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="main.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>RUTS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>RUTS</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="navbar-custom-menu">

          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <img src="no-profile-img.gif" width="15" class="user-image" alt="User Image" />


                <span class="hidden-xs"><?php
                
                $sql = "SELECT * from admin_type where admin_type_id = '" . $_SESSION['admin_type_id'] . "' ";
                $query = mysql_query($sql, $conn) or die(mysql_error());
                $arr = mysql_fetch_array($query);

                ?> 
                <?php echo $arr['admin_type_name'] . " " . $arradmin['f_name'] . " " . $arradmin['s_name']; ?> </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">


                  <img src="no-profile-img.gif" class="img-circle" alt="User Image" />


                  <p>
                    <?php echo $arr['admin_type_name'] . "<BR> " . $arradmin['f_name'] . " " . $arradmin['s_name']; ?>
                    <small>online</small>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">

                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less --><!-- Tasks: style can be found in dropdown.less -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">




              <img src="no-profile-img.gif"  width="50" class="img-circle" alt="User Image"/>  



          </div>
          <div class="pull-left info">
            <p><?php echo $arr['admin_type_name'] . "<BR> " . $arradmin['f_name'] . " " . $arradmin['s_name']; ?> </a><BR>
              <a href="#">online</a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <?php if ($_SESSION['admin_type_id'] == "1") { ?> <li class="header">จัดการ ช้อมูลผู้ใช้งานระบบ</li>
            <li class="<?php if ($_GET['menu'] == "admin_user" ||  $_GET['menu'] == "admin_user_edit") { ?>active <?php  } ?>treeview">
              <a href="main.php?menu=admin_user">
                <i class="glyphicon glyphicon-user"></i> <span>จัดการ ช้อมูลผู้ใช้งานระบบ</span></a>
            </li>
          <?php } ?>


          <li class="header">จัดการ ข้อมูลนักกีฬา</li>
          <li class="<?php if ($_GET['menu'] == "addteam_add" || $_GET['menu'] == "addteam_team" || $_GET['menu'] == "addteam_team_edit" || $_GET['menu'] == "addteam_teamr_detail") { ?>active <?php  } ?>treeview">
            <a href="main.php?menu=addteam_add">
              <i class="fa fa-edit"></i> <span>จัดการทีมการแข่งขันแบบ VS2</span></a>
          </li>


          <li class="header">จัดการข้อมูลการแข่งขัน</li>
            <?php
            $sqlMenu = "SELECT t.id_Sport_type, t.name_Sport_type FROM admin_permis p 
            INNER JOIN sport_type t ON p.id_Sport_type = t.id_Sport_type 
            WHERE p.admin_id = '$_SESSION[admin_id]'";
            $resMenu = mysql_query($sqlMenu);
            while($dataMenu = mysql_fetch_array($resMenu)) {
            ?>
          <li class="<?php if ($_GET['menu'] == "score" || $_GET['menu'] == "score_vs_add" || $_GET['menu'] == "score_vs_edit" || $_GET['menu'] == "score_all_add" || $_GET['menu'] == "score_all_edit") { ?>active <?php  } ?>treeview">
            <a href="main.php?menu=score&sport_type=<?php echo $dataMenu['id_Sport_type']?>&sport_name=<?php echo $dataMenu['name_Sport_type']?>">
              <i class="fa fa-edit"></i> <span><?php echo $dataMenu['name_Sport_type'];?></span></a>
          </li>
          <?php }?>

          <li class="header">บันทึกผลการแข่งขัน</li>
            <?php
            $sqlMenu = "SELECT t.id_Sport_type, t.name_Sport_type FROM admin_permis p 
            INNER JOIN sport_type t ON p.id_Sport_type = t.id_Sport_type 
            WHERE p.admin_id = '$_SESSION[admin_id]'";
            $resMenu = mysql_query($sqlMenu);
            while($dataMenu = mysql_fetch_array($resMenu)) {
            ?>
          <li class="<?php if ($_GET['menu'] == "score" || $_GET['menu'] == "score_vs_add" || $_GET['menu'] == "score_vs_edit" || $_GET['menu'] == "score_all_add" || $_GET['menu'] == "score_all_edit") { ?>active <?php  } ?>treeview">
            <a href="main.php?menu=score_add&sport_type=<?php echo $dataMenu['id_Sport_type']?>&sport_name=<?php echo $dataMenu['name_Sport_type']?>">
              <i class="fa fa-edit"></i> <span><?php echo $dataMenu['name_Sport_type'];?></span></a>
          </li>
          <?php }?>

          <li class="header">จัดการเหรียญการแข่งขัน</li>
          <li class="<?php if ($_GET['menu'] == "score_add" || $_GET['menu'] == "score_all_detail" || $_GET['menu'] == "score_vs_detail" || $_GET['menu'] == "score_add") { ?>active <?php  } ?>treeview">
            <a href="main.php?menu=medal_add">
              <i class="fa fa-edit"></i> <span>บันทึกเหรียญการแข่งขัน</span></a>
          </li>
          <br>
          <br>
          <li class="treeview">
            <a href="logout.php">
              <i class="fa  fa-key"></i> <span>ออกจากระบบ</span></a>
          </li>


        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <?php
      //print_r($_SESSION);

      if ($_GET['menu'] == "") {
        include("home.php");
      } else if ($_GET['menu'] == "home") {
        include("home.php");
      } else if ($_GET['menu'] == "addteam_add") {
        include("addteam_add.php");
      } else if ($_GET['menu'] == "addteam_team") {
        include("addteam_team.php");
      } else if ($_GET['menu'] == "std_user") {
        include("std_user.php");
      } else if ($_GET['menu'] == "std_regis") {
        include("std_regis.php");
      } else if ($_GET['menu'] == "std_user_add") {
        include("std_user_add.php");
      } else if ($_GET['menu'] == "std_user_edit") {
        include("std_user_edit.php");
      } else if ($_GET['menu'] == "std_user_detail") {
        include("std_user_detail.php");
      } else if ($_GET['menu'] == "sports") {
        include("sports.php");
      } else if ($_GET['menu'] == "pages") {
        include("pages.php");
      } else if ($_GET['menu'] == "pages_add") {
        include("pages_add.php");
      } else if ($_GET['menu'] == "pages_edit") {
        include("pages_edit.php");
      } else if ($_GET['menu'] == "pages_detail") {
        include("pages_detail.php");
      } else if ($_GET['menu'] == "file_upload") {
        include("file_upload.php");
      } else if ($_GET['menu'] == "file_upload_add") {
        include("file_upload_add.php");
      } else if ($_GET['menu'] == "stadium") {
        include("stadium.php");
      } else if ($_GET['menu'] == "stadium_add") {
        include("stadium_add.php");
      } else if ($_GET['menu'] == "stadium_detail") {
        include("stadium_detail.php");
      } else if ($_GET['menu'] == "stadium_edit") {
        include("stadium_edit.php");
      } else if ($_GET['menu'] == "stadium_location_add") {
        include("stadium_location_add.php");
      } else if ($_GET['menu'] == "sport_type") {
        include("sport_type.php");
      } else if ($_GET['menu'] == "sport_type_add") {
        include("sport_type_add.php");
      } else if ($_GET['menu'] == "sport_type_edit") {
        include("sport_type_edit.php");
      } else if ($_GET['menu'] == "sport_type_detail") {
        include("sport_type_detail.php");
      } else if ($_GET['menu'] == "score") {
        include("score.php");
      } else if ($_GET['menu'] == "score_vs_add") {
        include("score_vs_add.php");
      } else if ($_GET['menu'] == "score_vs2_add") {
        include("score_vs2_add.php");
      } else if ($_GET['menu'] == "score_vs_edit") {
        include("score_vs_edit.php");
      } else if ($_GET['menu'] == "score_vs2_edit") {
        include("score_vs2_edit.php");
      } else if ($_GET['menu'] == "score_vs_detail") {
        include("score_vs_detail.php");
      } else if ($_GET['menu'] == "score_vs2_detail") {
        include("score_vs2_detail.php");
      } else if ($_GET['menu'] == "score_all_add") {
        include("score_all_add.php");
      } else if ($_GET['menu'] == "score_all_edit") {
        include("score_all_edit.php");
      } else if ($_GET['menu'] == "score_all_detail") {
        include("score_all_detail.php");
      } else if ($_GET['menu'] == "score_add") {
        include("score_add.php");
      } else if ($_GET['menu'] == "std_user_detail1") {
        include("std_user_detail1.php");
      } else if ($_GET['menu'] == "std_report") {
        include("std_report.php");
      } else if ($_GET['menu'] == "admin_user") {
        include("admin_user.php");
      } else if ($_GET['menu'] == "std_regis_report") {
        include("std_regis_report.php");
      } else if ($_GET['menu'] == "std_regis_report_detail") {
        include("std_regis_report_detail.php");
      } else if ($_GET['menu'] == "sport_type_regis") {
        include("sport_type_regis.php");
      } else if ($_GET['menu'] == "st_add_sport") {
        include("st_add_sport.php");
      } else if ($_GET['menu'] == "addteam_user") {
        include("addteam_user.php");
      } else if ($_GET['menu'] == "medal_add") {
        include("medal_add.php");
      } else if ($_GET['menu'] == "medal_add_type") {
        include("medal_add_type.php");
      }
      ?>

      <!-- Main content -->

    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2016 <a href="http://arit.rmutto.ac.th">arit rmutto</a>, 2022 <a href="http://arit.rmutsv.ac.th">arit ruts</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-user bg-yellow"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul><!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul><!-- /.control-sidebar-menu -->

        </div><!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>
            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Some information about this general settings option
              </p>
            </div><!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Other sets of options are available
              </p>
            </div><!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Allow the user to show his name in blog posts
              </p>
            </div><!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div><!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div><!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div><!-- /.form-group -->
          </form>
        </div><!-- /.tab-pane -->
      </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

</body>

</html>