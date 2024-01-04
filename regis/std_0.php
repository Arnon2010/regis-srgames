<?php
ob_start();
session_start();
include("connect_db.php");
$checkadd = 0;
if ($_SESSION['admin_id'] == "") {
  header("location: index.php");
  exit(0);
}


?>
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">

<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
<!-- END MODERN CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/pages/users.css">

<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">

<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- END Custom CSS-->
<link href="sweetalert/sweetalert.css" rel="stylesheet" />
<script src="sweetalert/sweetalert.min.js"></script>


<section class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-head">
        <div class="card-header">
          <h4 class="card-title">ข้อมูลกีฬาทั้งหมด</h4>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

        </div>
      </div>
      <div class="card-content">
        <div class="card-body">
          <!-- Task List table -->
          <div class="table-responsive">
            <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
              <thead>
                <tr>
                  <th width="8%">ลำดับ</th>
                  <th width="27%">ชื่อ-สกุล</th>
                  <th width="17%">สาขา</th>
                  <th width="12%">เกียรติบัตร</th>
                  <th width="36%">เกียรติบัตรกีฬา</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $aa = 1;
                echo $sqladmin = "select * from student_sports where id_university='" . $_SESSION['university_id'] . "' ";
                $queryadmin = mysql_query($sqladmin, $conn) or die(mysql_error());
                while ($arradmin = mysql_fetch_array($queryadmin)) {
                ?>
                  <tr>
                    <td>
                      <?php echo $aa; ?>
                    </td>
                    <td>
                      <?php echo $arradmin['title_name'] . $arradmin['f_name'] . " " . $arradmin['l_name']; ?>
                    </td>
                    <td>
                      <?php echo $arradmin['faculty']; ?>
                    </td>
                    <td>
                      <a href="certificate1.php?student=<?php echo $arradmin['id_student'] ?>" target="_blank">
                        <button class="btn btn-success">พิมพ์การเข้าร่วม</button></a>
                    </td>
                    <td>
                      <?php

                      $sql2 = "SELECT * from medal_detail where id_university='" . $_SESSION['university_id'] . "'";
                      $qr2 = mysql_query($sql2);
                      while ($arr2 = mysql_fetch_array($qr2)) {

                        $sql22 = "SELECT * from sports_category where id_Sports_category='" . $arr2['id_Sports_category'] . "'";
                        $qr22 = mysql_query($sql22);
                        $arr22 = mysql_fetch_array($qr22);
                        if ($arr2['sex'] == "ชาย") {
                          $checkdex = "M";
                        } else if ($arr2['sex'] == "หญิง") {
                          $checkdex = "F";
                        }
                        if ($arr22['status'] == 1) { ?>
                          <?php
                          if ($arr2['sex'] == "คู่ผสม") {
                            $sql221 = "SELECT * from sport_regis where id_university='" . $_SESSION['university_id'] . "' 
                              and  id_Sports_category = '" . $arr2['id_Sports_category'] . "'  
                              and  id_student ='" . $arradmin['id_student'] . "'";
                          } else {
                            $sql221 = "SELECT * from sport_regis where id_university='" . $_SESSION['university_id'] . "' 
                              and  id_Sports_category = '" . $arr2['id_Sports_category'] . "'  
                              and  id_student ='" . $arradmin['id_student'] . "' and sex='$checkdex' ";
                          }

                          $qr221 = mysql_query($sql221);
                          while ($arr221 = mysql_fetch_array($qr221)) {
                          ?><a href="certificate2.php?student=<?php echo $arradmin['id_student'] ?>&id=<?php echo $arr22['id_Sports_category'] ?>" target="_blank">
                              <button class="btn btn-success">พิมพ์<?php echo $arr22['name_Sports_category']; ?></button>
                              <br /><br /></a>
                          <?php
                          }
                          ?>

                        <?php } else if ($arr22['status'] == 2) { ?>
                          <?php

                          $sql222 = "SELECT * from score_all where sport_type_id = '" . $arr2['id_Sports_category'] . "' and sex='" . $arr2['sex'] . "'";
                          $qr222 = mysql_query($sql222);
                          $arr222 = mysql_fetch_array($qr222);


                          $sql2221 = "SELECT * from user_sportall where score_all_id = '" . $arr222['score_all_id'] . "' and id_student = '" . $arradmin['id_student'] . " '
												 ";
                          $qr2221 = mysql_query($sql2221);
                          while ($arr2221 = mysql_fetch_array($qr2221)) {


                          ?><a href="certificate2.php?student=<?php echo $arradmin['id_student'] ?>&id=<?php echo $arr22['id_Sports_category'] ?>" target="_blank">
                              <button class="btn btn-success">พิมพ์<?php echo $arr22['name_Sports_category']; ?></button>
                              <br /><br /></a><?php
                          } ?>
                        <?php } else if ($arr22['status'] == 3) { ?>
                          <?php
                          $sql223 = "SELECT * from teamvs2 where id_university='" . $_SESSION['university_id'] . "' and id_Sports_category = '" . $arr2['id_Sports_category'] . "' and hand_ranks = '" . $arr2['hand_ranks'] . "' and sex ='" . $arr2['sex'] . "'";
                          $qr223 = mysql_query($sql223);
                          $arr223 = mysql_fetch_array($qr223);
                          $sql2231 = "SELECT * from user_sportvs2 where id_team='" . $arr223['id_team'] . "'";
                          $qr2231 = mysql_query($sql2231);
                          while ($arr2231 = mysql_fetch_array($qr2231)) {

                            $sql2232 = "SELECT * from student_sports where id_student='" . $arr2231['id_student'] . "'";
                            $qr2232 = mysql_query($sql2232);
                            $arr2232 = mysql_fetch_array($qr2232);

                            if ($arradmin['id_student'] == $arr2232['id_student']) {
                          ?><a href="certificate2.php?student=<?php echo $arradmin['id_student'] ?>&id=<?php echo $arr22['id_Sports_category'] ?>" target="_blank">
                                <button class="btn btn-success">พิมพ์<?php echo $arr22['name_Sports_category']; ?></button>
                                <br /><br /></a>
                            <?php
                             }
                            ?>
                      <?php
                          }
                        }
                      }
                      ?>


                    </td>
                  </tr>

                <?php $aa++;
                } ?>

              </tbody>
              <tfoot>
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อ-สกุล</th>
                  <th>สาขา</th>
                  <th>เกียรติบัตร</th>
                  <th>เกียรติบัตรกีฬา</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BEGIN VENDOR JS-->
<script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
<script src="app-assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>


<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
<script src="app-assets/js/scripts/pages/users-contacts.js" type="text/javascript"></script>
<script src="app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>

<!-- END PAGE LEVEL JS-->
<?php
if ($checkadd == "1") {
?>
  <script type="text/javascript">
    swal({
        title: "คุณได้เพิ่มข้อมูลผู้ดูแลระบบชนิดกีฬาแล้ว?",
        text: "ดำเนินการเสร็จสิ้น",
        type: "success",

        confirmButtonClass: "btn-danger",
        confirmButtonText: "ตกลง!",
        closeOnConfirm: false
      },
      function() {
        window.location.href = "home.php?menu=sportadmin";
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      });
  </script>
<?php
} else if ($checkadd == "3") {
?>
  <script type="text/javascript">
    swal({
        title: "ไม่สามารถเพิ่มข้อมูลผู้ดูแลระบบชนิดกีฬา?",
        text: "เนื่องจากมีชื่อผู้ใช้นี้ในระบบแล้ว",
        type: "warning",

        confirmButtonClass: "btn-danger",
        confirmButtonText: "ตกลง!",
        closeOnConfirm: false
      },
      function() {
        window.location.href = "home.php?menu=sportadmin";
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      });
  </script>
<?php
}

?>
<script type="text/javascript">
  function archiveFunction(id) {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
    swal({
        title: "คุณต้องการลบข้อมูลใช่หรือไม่?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "ไม่, ยกเลิกการลบข้อมูล!",
        confirmButtonText: "ตกลง, คุณต้องการลบข้อมูล!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          window.location.href = "home.php?menu=sportadmin&action=delect&checkdel=" + id;

        } else {
          swal("ยกเลิก", "คุณได้ยกเลิกข้อมูลแล้ว:)", "error");
        }
      });
  }
</script>