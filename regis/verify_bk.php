<?php
    ob_start();
    session_start();
    include("connect_db.php");
    $checkadd = 0;
    if ($_SESSION['admin_id'] == "" and $_SESSION['admin_type_id'] != '0') {
      header("location: index.php");
      exit(0);
    }
    if ($_SESSION['university_id'] != "0") {
      header("location: index.php");
      exit(0);
    }
    if ($_GET['chack'] != "") {


      $id = $_POST['inputradio']; ?><br /><?php
                                      $detail = $_POST['detail']; ?><br /><?php

                                      $date = date('Y-m-d');
                                      $time = date('H:i:s');

                                      $sqlsport111 = "UPDATE  student_sports set st = '$id', detail = '$detail' where id_student = '" . $_GET['chack'] . "'";
                                      $querysport111 = mysql_query($sqlsport111, $conn) or die(mysql_error());

                                      $sqlsport111pass = "INSERT INTO log_pass VALUES (null,'" . $_SESSION['admin_id'] . "','" . $_GET['chack'] . "','$date','$time')";
                                      $querysport111pass = mysql_query($sqlsport111pass, $conn) or die(mysql_error());

                                      if ($id == "1") {
                                        $message_url = "home.php?menu=view&id=" . $_GET['chack'];
                                        $message_detail = "นักกีฬาของท่านไม่ผ่านการตรวจสอบ <br /> กรุณาแก้ไขข้อมูลให้ถูกต้อง";
                                        $arruserst = mysql_fetch_array(mysql_query("SELECT * FROM student_sports WHERE id_student = '" . $_GET['chack'] . "'"));
                                        $id_user_admin = $arruserst['id_user_admin'];
                                        $strSQL = "INSERT INTO message_tb VALUES (null,'$message_url','$message_detail','$id_user_admin','$date','0')";
                                        $objQuery = mysql_query($strSQL);
                                      }
                                    }

                                      ?>
   <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
   <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
   <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
   <!-- BEGIN VENDOR CSS-->
   <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
   <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
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

   <div class="app-content content">
     <div class="content-wrapper">
       <div class="content-header row">
         <div class="content-header-left col-md-6 col-12 mb-2">
           <h3 class="content-header-title">รายการข้อมูลนักกีฬาทั้งหมด</h3>
           <div class="row breadcrumbs-top">
             <div class="breadcrumb-wrapper col-12">
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
                 </li>
                 <li class="breadcrumb-item"><a href="#">จัดการนักกีฬา</a>
                 </li>
                 <li class="breadcrumb-item active">รายการข้อมูลนักกีฬา
                 </li>
               </ol>
             </div>
           </div>
         </div>
         <div class="content-header-right col-md-6 col-12">

         </div>
       </div>
       <!-- Row grouping -->
       <section id="row-grouping">
         <div class="row">
           <div class="col-12">
             <div class="card">
               <div class="card-header">
                 <h4 class="card-title">รายการข้อมูลนักกีฬา</h4>
                 <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                 <div class="heading-elements">
                   <ul class="list-inline mb-0">
                     <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                     <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                     <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                     <li><a data-action="close"><i class="ft-x"></i></a></li>
                   </ul>
                 </div>
               </div>
               <div class="card-content collapse show">
                 <div class="card-body card-dashboard">
                   <p class="card-text">ใช้ตรวจสอบข้อมูลนักศึกษา</p>
                   <div class="breadcrumb-wrapper col-12">
                     <table class="table table-striped table-bordered row-grouping" width="100%">

                       <thead>
                         <tr>
                           <th>ชื่อ-สกุล</th>
                           <th>สถานะการตรวจสอบ</th>
                           <th>มหาวิทยาลัย</th>
                           <th>รูปนักศึกษา</th>
                           <th>หมายเหตุ</th>
                         </tr>
                       </thead>
                       <tbody>
                         <?php
                          $sqladmin = "SELECT * from student_sports 
            where st='0'";
                          $queryadmin = mysql_query($sqladmin, $conn) or die(mysql_error());
                          while ($arradmin = mysql_fetch_array($queryadmin)) {
                          ?>
                           <tr>
                             <td>
                               <a href="home.php?menu=view&id=<?php echo $arradmin['id_student']; ?>" target="_blank"><?php echo $arradmin['title_name'] . $arradmin['f_name'] . " " . $arradmin['l_name']; ?></a><br />
                               <?php echo $arradmin['education_level'] . "/ ชั้นปี" . $arradmin['year_level']; ?>
                             </td>
                             <td>
                               <?php
                                if ($arradmin['st'] == 9) { ?><p class="text-success">ผ่านการตรวจสอบแล้ว</p>
                               <?php
                                } else if ($arradmin['st'] == 1) { ?><p class="text-warning">รอการแก้ไขข้อมูล</p>
                                 <?php
                                } else if ($arradmin['st'] == 0) {
                                  if ($arradmin['pic_cardstudent'] == "" || $arradmin['pic_card'] == "" || $arradmin['evidence'] == "" || $arradmin['evidence1'] == "") {
                                  ?>
                                   <p class="text-danger">ข้อมูลไม่ครบถ้วน</p>

                                 <?php } else { ?>
                                   <p class="text-warning">สถานะ : รอการตรวจสอบ</p>
                                 <?php } ?>
                               <?php } ?>
                             </td>
                             <td>
                               <?php
                                $sql3 = "select * from  university where id_university = '" . $arradmin['id_university'] . "'  ";
                                $query3 = mysql_query($sql3, $conn) or die(mysql_error());
                                $arr3 = mysql_fetch_array($query3);
                                echo $arr3['subname_university'];
                                ?>
                             </td>

                             <td>
                               <?php if ($arradmin['pic_student'] != "") { ?>
                                 <img src="filesutdent/<?php echo $arradmin['pic_student']; ?>" height="70" width="55" alt="Holi" class="rounded img-fluid float-left mr-2 mb-1" data-action="zoom">
                               <?php  } ?>
                             </td>


                             <td>
                               <?php
                                if ($arradmin['st'] == 9) { ?><p class="text-success">ผ่านการตรวจสอบแล้ว</p>
                                 <button type="button" class="btn btn-block btn-outline-success mb-2" onclick="window.open('reportstudent.php?student=<?php echo $arradmin['id_student']; ?>','_blank')"><i class="ft-printer"></i> พิมพ์</button>
                               <?php
                                } else if ($arradmin['st'] == 1) { ?><p class="text-warning">รอการแก้ไขข้อมูล</p>
                                 <?php
                                } else if ($arradmin['st'] == 0) {
                                  if ($arradmin['pic_cardstudent'] == "" || $arradmin['pic_card'] == "" || $arradmin['evidence'] == "" || $arradmin['evidence1'] == "") {
                                  ?>
                                   <p class="text-danger">ข้อมูลไม่ครบถ้วน</p>

                                 <?php } else { ?>

                                   <form class="form-horizontal" method="post" action="home.php?menu=verify&chack=<?php echo $arradmin['id_student'] ?>" enctype="multipart/form-data" novalidate>
                                     <fieldset>
                                       <input type="radio" name="inputradio" id="input-radio-11" value="9" required>
                                       <label class="text-success">ผ่าน</label>

                                     </fieldset>
                                     <fieldset>
                                       <input type="radio" name="inputradio" id="input-radio-12" value="1" required>
                                       <label class="text-danger">ไม่ผ่าน</label>
                                       <div class="controls">
                                         <input type="text" name="detail" id="detail" class="form-control">
                                       </div>
                                     </fieldset>
                                     <div class="text-center">
                                       <button type="submit" class="btn btn-success">บันทึก <i class="la la-check-square-o position-right"></i></button>
                                     </div>
                                   </form>
                                 <?php } ?>
                               <?php } ?>
                             </td>
                           </tr>
                         <?php } ?>
                         </tfoot>
                     </table>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </section>
       <!-- Row grouping -->
     </div>
   </div>

   <!-- BEGIN VENDOR JS-->
   <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
   <!-- BEGIN VENDOR JS-->
   <!-- BEGIN PAGE VENDOR JS-->
   <script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
   <script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
   <script src="app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/tables/buttons.flash.min.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
   <!-- END PAGE VENDOR JS-->
   <!-- BEGIN MODERN JS-->
   <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
   <script src="app-assets/js/core/app.js" type="text/javascript"></script>
   <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/extensions/transition.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/extensions/zoom.min.js" type="text/javascript"></script>
   <!-- END MODERN JS-->
   <!-- BEGIN PAGE LEVEL JS-->
   <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
   <script src="app-assets/js/scripts/tables/datatables/datatable-advanced.js" type="text/javascript"></script>
   <!-- END PAGE LEVEL JS-->