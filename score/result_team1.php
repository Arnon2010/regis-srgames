<?php
include("connect_db.php");
$date = $_GET['date'];
$sqlsport_type = "SELECT * from sports_category where 	id_Sports_category = '" . $_GET['STID'] . "' ";
$querysport_type = mysql_query($sqlsport_type, $conn) or die(mysql_error());

$arrsport_type = mysql_fetch_array($querysport_type);
$sqlf = "select * from university where id_university = '" . $_GET['FID'] . "'";
$qrf = mysql_query($sqlf);
$arrf = mysql_fetch_array($qrf);


if ($_GET['sex'] == "M") {
  $sex = "ชาย";
} else if ($_GET['sex'] == "F") {
  $sex = "หญิง";
} else if ($_GET['sex'] == "MF") {
  $sex = "คู่ผสม";
}
function DateThai($strDate)
{
  $strYear = date("Y", strtotime($strDate)) + 543;
  $strMonth = date("n", strtotime($strDate));
  $strDay = date("j", strtotime($strDate));

  $strMonthCut = array("", "มกราคม", "กุมภาพันธ์ ", "มีนาคม", "เมษายน.", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
  $strMonthThai = $strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear";
}

?>
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/toggle/switchery.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/selects/select2.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
<!-- END MODERN CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/pages/users.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/switch.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">

<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-callout.css">

<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- END Custom CSS-->
<link href="sweetalert/sweetalert.css" rel="stylesheet" />
<script src="sweetalert/sweetalert.min.js"></script>

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">รายละเอียด:<?php echo $arrsport_type['name_Sports_category'] . " " . $sex . " " . $arrf['name_university']; ?></h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <!-- <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
            </ol> -->
          </div>
        </div>
      </div>
      <div class="content-header-right col-md-6 col-12">
        <div class="text-right">
            <button class="btn btn-warning" onclick="history.back()">ย้อนกลับ</button>
        </div>
      </div>
    </div>
    <div class="col-xl-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">ตารางการแข่งขัน:<?php echo $arrsport_type['name_Sports_category'] . " " . $sex . " " . $arrf['name_university']; ?></h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="card-content">
              <div class="card-body  px-0 py-0">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col" width="10%">วันวลาที่แข่ง</th>
                        <th scope="col" width="25%">อันดับที่ 1</th>
                        <th scope="col" width="25%">อันดับที่ 2</th>
                        <th scope="col" width="25%">อันดับที่ 3</th>
                        <th scope="col" width="15%">ดูรายละเอียด</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $sql2 = "SELECT * from score_all where sport_type_id='" . $arrsport_type['id_Sports_category'] . "' 
                      and sex='$sex'   order by date , times asc";
                      $qr2 = mysql_query($sql2);
                      $i = 0;
                      $ii = 1;
                      $num = 1;
                      while ($arr2 = mysql_fetch_array($qr2)) {
                        if ($arrsport_type['unit'] == "1") {
                          $unit = "เซต";
                        } else if ($arrsport_type['unit'] == "2") {
                          $unit = "ลูก";
                        } else if ($arrsport_type['unit'] == "3") {
                          $unit = "แต้ม";
                        } else if ($arrsport_type['unit'] == "4") {
                          $unit = "วินาที";
                        } else if ($arrsport_type['unit'] == "5") {
                          $unit = "คะแนน";
                        } else if ($arrsport_type['unit'] == "6") {
                          $unit = "เมตร";
                        }
                        $sports_category = mysql_fetch_array(mysql_query("SELECT * from sports_category where id_Sports_category = '" . $arr2['sport_type_id'] . "'"));
                        $round = mysql_fetch_array(mysql_query("SELECT * from round where round_id = '" . $arr2['round_id'] . "'"));
                        $faculty1 = mysql_fetch_array(mysql_query("SELECT * from university where id_university = '" . $arr2['faculty_id1'] . "'"));
                        $faculty2 = mysql_fetch_array(mysql_query("SELECT * from university where id_university = '" . $arr2['faculty_id2'] . "'"));
                        $faculty3 = mysql_fetch_array(mysql_query("SELECT * from university where id_university = '" . $arr2['faculty_id3'] . "'"));

                        $line = mysql_fetch_array(mysql_query("SELECT * from line where line_id = '" . $arr2['line_id'] . "'"));
                        $value_date = explode("-", $arr2['date']);
                        $dd = ($value_date[2]) . "/" . $value_date[1] . "/" . ($value_date[0] + 543);
                        $value_date1 = explode(":", $arr2['times']);
                        $times = $value_date1[0] . "." . $value_date1[1] . " น";
                        $datec = date('Y-m-d');
                      ?>

                        <tr>
                          <td>
                            <?php echo DateThai($arr2['date']) . " " . $times; ?>
                          </td>
                          <td>
                            <?php echo $faculty1['name_university']; ?>
                          </td>
                          <td>
                            <?php echo $faculty2['name_university']; ?>
                          </td>
                          <td>
                            <?php echo $faculty3['name_university']; ?>
                          </td>
                          <td>
                            <?php if ($arr2['faculty_id1'] == "0" && $arr2['faculty_id2'] == "0" && $arr2['faculty_id3'] == "0") {
                              echo "ยังไม่เริ่มการแข่งขัน";
                            } else { ?>
                              <a href="#" class="btn btn-outline-primary block btn-lg" data-toggle="modal" data-target="#<?php echo $arr2['score_all_id'] . "M";  ?>">รายละเอียด</a>
                              <div class="modal fade text-left" id="<?php echo $arr2['score_all_id'] . "M";  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel1">ผลการแข่งขัน</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <table width="100%" border="0">
                                        <tr>
                                          <td>อันดับที่</td>
                                          <td>จาก</td>
                                          <td>สถิติ</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>อันดับที่ 1</td>
                                          <td><a href="index.php?menu=result_team1&action=view&ID=<?php echo $_GET['ID']; ?>&FID=<?php echo $arr2['faculty_id1']; ?>&STID=<?php echo $arr2['sport_type_id']; ?>&go=fixture1&sex=<?php echo $_GET['sex']; ?>"><?php if ($faculty2['color'] != "") { ?><img src="images/<?php echo $faculty1['color']; ?>.png" width="30" /><?php } ?><?php echo $faculty1['name_university']; ?></a></td>
                                          <td><?php echo $arr2['score1'] ?></td>
                                          <td><?php echo $unit; ?></td>
                                        </tr>
                                        <tr>
                                          <td>อันดับที่ 2</td>
                                          <td><a href="index.php?menu=result_team1&action=view&ID=<?php echo $_GET['ID']; ?>&FID=<?php echo $arr2['faculty_id2']; ?>&STID=<?php echo $arr2['sport_type_id']; ?>&go=fixture1&sex=<?php echo $_GET['sex']; ?>"><?php if ($faculty2['color'] != "") { ?><img src="images/<?php echo $faculty2['color']; ?>.png" width="30" /><?php } ?><?php echo $faculty2['name_university']; ?></a></td>
                                          <td><?php echo $arr2['score2'] ?></td>
                                          <td><?php echo $unit; ?></td>
                                        </tr>
                                        <tr>
                                          <td>อันดับที่ 3</td>
                                          <td><a href="index.php?menu=result_team1&action=view&ID=<?php echo $_GET['ID']; ?>&FID=<?php echo $arr2['faculty_id3']; ?>&STID=<?php echo $arr2['sport_type_id']; ?>&go=fixture1&sex=<?php echo $_GET['sex']; ?>"><?php if ($faculty3['color'] != "") { ?><img src="images/<?php echo $faculty3['color']; ?>.png" width="30" /><?php } ?><?php echo $faculty3['name_university']; ?></a></td>
                                          <td><?php echo $arr2['score3'] ?></td>
                                          <td><?php echo $unit; ?></td>
                                        </tr>
                                      </table>
                                      </p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ปิด</button>

                                    </div>
                                  </div>
                                </div>
                              </div><?php   } ?>
                          </td>
                        </tr>
                      <?php $num++;
                      } ?>
                    </tbody>
                    <tfoot>
                      <tr>

                        <th scope="col" width="10%">วันวลาที่แข่ง</th>
                        <th scope="col" width="25%">อันดับที่ 1</th>
                        <th scope="col" width="25%">อันดับที่ 2</th>
                        <th scope="col" width="25%">อันดับที่ 3</th>
                        <th scope="col" width="15%">ดูรายละเอียด</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">รายชื่อนักกีฬา:<?php echo $arrsport_type['name_Sports_category'] . " " . $sex . " " . $arrf['name_university']; ?></h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <?php
            if ($arrsport_type['unit'] == "1") {
              $unit = "เซต";
            } else if ($arrsport_type['unit'] == "2") {
              $unit = "ลูก";
            } else if ($arrsport_type['unit'] == "3") {
              $unit = "แต้ม";
            } else if ($arrsport_type['unit'] == "4") {
              $unit = "วินาที";
            } else if ($arrsport_type['unit'] == "5") {
              $unit = "คะแนน";
            } else if ($arrsport_type['unit'] == "6") {
              $unit = "เมตร";
            }
            ?>

            <div class="card-content">
              <div class="card-body  px-0 py-0">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ลำดับที่</th>
                        <th>ชื่อ - นามสกุล</th>
                        <th>เพศ</th>
                        <th>สังกัด</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($_GET['sex'] == "MF") {
                        $sql24 = "select * from sport_regis where id_Sports_category='" . $_GET['STID'] . "' and id_university='" . $_GET['FID'] . "'";
                      } else {
                        $sql24 = "select * from sport_regis where id_Sports_category='" . $_GET['STID'] . "' and sex='" . $_GET['sex'] . "' and id_university='" . $_GET['FID'] . "'";
                      }
                      $qr24 = mysql_query($sql24);

                      $num = 1;
                      while ($arr24 = mysql_fetch_array($qr24)) {

                        $user = mysql_fetch_array(mysql_query("select * from student_sports where id_student = '" . $arr24['id_student'] . "'"));
                      ?>

                        <tr>


                          <td>
                            <?php echo $num; ?>
                          </td>
                          <td>
                            <a href="index.php?menu=studentdetail&action=view&id=<?php echo $user['id_student'] ?>" target="_blank">
                              <div class="card-body">
                                <img src="https://regissvg.rmutsv.ac.th/filesutdent/<?php echo $user['pic_student']; ?>" class="height-150" alt="Card image">

                              </div>

                              <?php echo $user['title_name'] . $user['f_name'] . " " . $user['l_name']; ?>
                            </a>
                          </td>
                          <td>
                            <?php
                            if ($user['title_name'] == นาย) {
                              echo "ชาย";
                            } else if ($user['title_name'] == นาง || $user['title_name'] == นางสาว) {
                              echo "หญิง";
                            }
                            ?>
                          </td>
                          <td>
                            <?php echo $arrf['name_university'];  ?>
                          </td>

                        </tr>

                      <?php $num++;
                      } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ลำดับที่</th>
                        <th>ชื่อ - นามสกุล</th>
                        <th>เพศ</th>
                        <th>สังกัด</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


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
<script src="app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="https://www.google.com/jsapi" type="text/javascript"></script>
<script src="app-assets/vendors/js/charts/jquery.sparkline.min.js" type="text/javascript"></script>
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
<script src="app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
<script src="app-assets/js/scripts/tables/components/table-components.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<?php
if ($checkadd == "1") {
?>
  <script type="text/javascript">
    swal({
        title: "คุณได้เพิ่มนักกีฬาแล้ว?",
        text: "ดำเนินการเสร็จสิ้น",
        type: "success",

        confirmButtonClass: "btn-danger",
        confirmButtonText: "ตกลง!",
        closeOnConfirm: false
      },
      function() {
        window.location.href = "home.php?menu=regissport&tab=<?php echo $_GET['tab']; ?>&tab2=<?php echo $_GET['tab2']; ?>";

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
  function archiveFunction(id, id2, id3) {
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
          window.location.href = "home.php?menu=regissport&action=delect&checkdel=" + id + "&tab=" + id2 + "&tab2=" + id3;

        } else {
          swal("ยกเลิก", "คุณได้ยกเลิกข้อมูลแล้ว:)", "error");
        }
      });
  }
</script>