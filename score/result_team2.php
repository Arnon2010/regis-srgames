<?php
include("connect_db.php");
$date = $_GET['date'];
$sqlsport_type = "SELECT * from sports_category c 
left join score_vs2 s ON c.id_Sports_category = s.sport_type_id 
where 	score_vs_id = '" . $_GET['SVID'] . "' ";
$querysport_type = mysql_query($sqlsport_type, $conn) or die(mysql_error());

$uni = mysql_fetch_array(mysql_query("SELECT * from teamvs2 where id_team = '" . $_GET['FID'] . "'"));

$arrsport_type = mysql_fetch_array($querysport_type);
$sqlf = "SELECT * from university where id_university = '" . $uni['id_university'] . "'";
$qrf = mysql_query($sqlf);
$arrf = mysql_fetch_array($qrf);
$te = mysql_fetch_array(mysql_query("SELECT teamvs2.id_team,teamvs2.id_university,teamvs2.hand_ranks,university.subname_university,university.id_university 
  from teamvs2 INNER JOIN university on teamvs2.id_university = university.id_university  
  where teamvs2.id_team = '" . $_GET['FID'] . "'"));

if ($arrsport_type['sex'] == "หญิง") {
  $sex = "หญิง";
} else if ($arrsport_type['sex'] == "ชาย") {
  $sex = "ชาย";
} else if ($arrsport_type['sex'] == "คู่ผสม") {
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
        <h3 class="content-header-title">รายละเอียด:<?php echo $arrsport_type['name_Sports_category'] . " " . $sex . " " . "มือ" . " " . $te['hand_ranks'] . " " . $arrf['name_university']; ?></h3>
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
          <h4 class="card-title">ตารางการแข่งขัน:<?php echo $arrsport_type['name_Sports_category'] . " " . $sex . " " . "มือ" . " " . $te['hand_ranks'] . " " . $arrf['name_university']; ?></h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="card-content">
              <div class="card-body  px-0 py-0">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>รอบ</th>
                        <th>สาย</th>
                        <th>ทีมที่1</th>
                        <th>ผลการแข่งขัน</th>
                        <th>ทีมที่2</th>
                        <th>เวลา</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $sql2 = "SELECT * from score_vs2  where sport_type_id='" . $arrsport_type['id_Sports_category'] . "' 
                        and sex='$sex'  and (faculty_id1 = '" . $_GET['FID'] . "' or faculty_id2 = '" . $_GET['FID'] . "') 
                        order by date , times asc";
                      $qr2 = mysql_query($sql2);
                      $i = 0;
                      $ii = 1;
                      $num = 1;
                      while ($arr2 = mysql_fetch_array($qr2)) {

                        if ($arr2['unit'] == "1") {
                          $unit = "เซต";
                        } else if ($arr2['unit'] == "2") {
                          $unit = "ประตู";
                        } else if ($arr2['unit'] == "3") {
                          $unit = "แต้ม";
                        } else if ($arr2['unit'] == "4") {
                          $unit = "วินาที";
                        } else if ($arr2['unit'] == "5") {
                          $unit = "คะแนน";
                        } else if ($arr2['unit'] == "6") {
                          $unit = "เมตร";
                        }
                        $sports_category = mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '" . $arr2['sport_type_id'] . "'"));
                        $round = mysql_fetch_array(mysql_query("select * from round where round_id = '" . $arr2['round_id'] . "'"));
                        $faculty1 = mysql_fetch_array(mysql_query("select teamvs2.id_team,teamvs2.id_university,teamvs2.hand_ranks,university.subname_university,university.id_university from teamvs2 INNER JOIN university on teamvs2.id_university = university.id_university  where teamvs2.id_team = '" . $arr2['faculty_id1'] . "'"));
                        $faculty2 = mysql_fetch_array(mysql_query("select teamvs2.id_team,teamvs2.id_university,teamvs2.hand_ranks,university.subname_university,university.id_university from teamvs2 INNER JOIN university on teamvs2.id_university = university.id_university  where teamvs2.id_team = '" . $arr2['faculty_id2'] . "'"));
                        $temporary1 = mysql_fetch_array(mysql_query("select * from temporary where temporary_name = '" . $arr2['temporary1'] . "'"));
                        $temporary2 = mysql_fetch_array(mysql_query("select * from temporary where temporary_name = '" . $arr2['temporary2'] . "'"));

                        $line = mysql_fetch_array(mysql_query("select * from line where line_id = '" . $arr2['line_id'] . "'"));
                        $value_date = explode("-", $arr2['date']);
                        $dd = ($value_date[2]) . "/" . $value_date[1] . "/" . ($value_date[0] + 543);
                        $value_date1 = explode(":", $arr2['times']);
                        $times = $value_date1[0] . "." . $value_date1[1] . " น";
                        $datec = date('Y-m-d');
                      ?>

                        <tr>


                          <td>
                            <?php echo $round['round_name']; ?>
                          </td>
                          <td>
                            <?php echo $line['line_name']; ?>
                          </td>
                          <td>

                            <?php if ($arr2['faculty_id1'] != "0") { ?><a href="index.php?menu=result_team2&action=view&ID=<?php echo $_GET['ID']; ?>&SVID=<?php echo $_GET['SVID'];?>&FID=<?php echo $arr2['faculty_id1']; ?>&STID=<?php echo $arrsport_type['id_Sports_category']; ?>&go=fixture&sex=<?php echo $_GET['sex']; ?>"><?php echo $faculty1['subname_university'] . " " . "มือ" . " " . $faculty1['hand_ranks'];
                                                                                                                                                                                                                                                                                if ($arr2['temporary1'] != "ว่าง") {
                                                                                                                                                                                                                                                                                  echo " (" . $arr2['temporary1'] . " สาย" . $line['line_name'] . ")";
                                                                                                                                                                                                                                                                                } ?></a><?php } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                      echo $arr2['temporary1'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } ?>
                          </td>
                          <td align="center">
                            <?php if ($arr2['score1'] == "0" && $arr2['score2'] == "0" && $arr2['date'] > $datec) {
                              echo "ยังไม่ได้เริ่มแข่งขัน";
                            } else { ?><a href="#" class="btn btn-outline-primary block btn-lg" data-toggle="modal" data-target="#<?php echo $arr2['score_vs_id'];  ?>"><?php echo $unit . " " . $arr2['score1'] . " : " . $arr2['score2'] . " " . $unit;
                                                                                                                                                                                                                                                                                    } ?></a><br>
                              <div class="col-lg-4 col-md-6 col-sm-12">



                                <!-- Modal -->
                                <div class="modal fade text-left" id="<?php echo $arr2['score_vs_id'];  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
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
                                            <td></td>
                                            <td>

                                              <?php if ($arr2['faculty_id1'] != "0") { ?><a href="index.php?menu=result_team2&action=view&ID=<?php echo $_GET['ID']; ?>&SVID=<?php echo $_GET['SVID'];?>&FID=<?php echo $arr2['faculty_id1']; ?>&STID=<?php echo $arrsport_type['id_Sports_category']; ?>&go=fixture&sex=<?php echo $_GET['sex']; ?>"><?php echo $faculty1['subname_university'] . " " . "มือ" . " " . $faculty1['hand_ranks'];
                                                                                                                                                                                                                                                                                                  if ($arr2['temporary1'] != "ว่าง") {
                                                                                                                                                                                                                                                                                                    echo " (" . $arr2['temporary1'] . " สาย" . $line['line_name'] . ")";
                                                                                                                                                                                                                                                                                                  } ?></a><?php } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo $arr2['temporary1'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      } ?>
                                            </td>
                                            <td><?php echo $arr2['score1']; ?>:<?php echo $arr2['score2']; ?></td>

                                            <td><?php


                                                if ($arr2['faculty_id2'] != "0") { ?><a href="index.php?menu=result_team2&action=view&ID=<?php echo $_GET['ID']; ?>&SVID=<?php echo $_GET['SVID'];?>&FID=<?php echo $arr2['faculty_id2']; ?>&STID=<?php echo $arrsport_type['id_Sports_category']; ?>&go=fixture&sex=<?php echo $_GET['sex']; ?>"><?php echo $faculty2['subname_university'] . " " . "มือ" . " " . $faculty2['hand_ranks'];
                                                                                                                                                                                                                                                                              if ($arr2['temporary2'] != "ว่าง") {
                                                                                                                                                                                                                                                                                echo " (" . $arr2['temporary2'] . " สาย" . $line['line_name'] . ")";
                                                                                                                                                                                                                                                                              } ?></a><?php } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo $arr2['temporary2'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                  }


                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?></td>
                                          </tr>
                                          <?php
                                          if ($arrsport_type['unit'] == "1") {
                                            $sql3 = "select * from tb_set where score_vs_id = '" . $arr2['score_vs_id'] . "'";
                                            $qr3 = mysql_query($sql3);
                                            while ($arr3 = mysql_fetch_array($qr3)) { ?>
                                              <tr>
                                                <td width="15%"><?php echo "เซตที่ " . $arr3['num_set']; ?></td>
                                                <td align="right"><?php echo $arr3['score1']; ?></td>
                                                <td align="center">:</td>
                                                <td><?php echo $arr3['score2']; ?></td>

                                              </tr>
                                            <?php } ?>
                                            <tr>
                                              <td width="15%">สรุป</td>
                                              <td align="right"><?php if ($arr2['score1'] > $arr2['score2']) {
                                                                  echo "ชนะ";
                                                                } else {
                                                                  echo "";
                                                                } ?></td>
                                              <td align="center"><?php if ($arr2['score2'] == $arr2['score1']) {
                                                                    echo "เสมอ";
                                                                  } else {
                                                                    echo "";
                                                                  } ?></td>
                                              <td><?php if ($arr2['score2'] > $arr2['score1']) {
                                                    echo "ชนะ";
                                                  } else {
                                                    echo "";
                                                  } ?></td>
                                            </tr>
                                          <?php } ?>
                                        </table>


                                        </p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ปิด</button>

                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </div>
                          </td>

                          <td><?php


                              if ($arr2['faculty_id2'] != "0") { ?><a href="index.php?menu=result_team2&action=view&ID=<?php echo $_GET['ID']; ?>&SVID=<?php echo $_GET['SVID'];?>&FID=<?php echo $arr2['faculty_id2']; ?>&STID=<?php echo $arrsport_type['id_Sports_category']; ?>&go=fixture&sex=<?php echo $_GET['sex']; ?>"><?php echo $faculty2['subname_university'] . " " . "มือ" . " " . $faculty2['hand_ranks'];
                                                                                                                                                                                                                                                                              if ($arr2['temporary2'] != "ว่าง") {
                                                                                                                                                                                                                                                                                echo " (" . $arr2['temporary2'] . " สาย" . $line['line_name'] . ")";
                                                                                                                                                                                                                                                                              } ?></a><?php } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo $arr2['temporary2'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                  }


                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?></td>
                          <td>
                            <?php echo DateThai($arr2['date']) . " " . $times; ?>
                          </td>

                        </tr>

                      <?php $num++;
                      } ?>






                    </tbody>
                    <tfoot>
                      <tr>


                        <th>รอบ</th>
                        <th>สาย</th>
                        <th>ทีมที่1</th>
                        <th>ผลการแข่งขัน</th>
                        <th>ทีมที่2</th>
                        <th>เวลา</th>
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
          <h4 class="card-title">รายชื่อนักกีฬา:<?php echo $arrsport_type['name_Sports_category'] . " " . $sex . " " . "มือ" . " " . $te['hand_ranks'] . " " . $arrf['name_university']; ?></h4>
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

                      $sql24 = "select * from user_sportvs2 where id_team='" . $uni['id_team'] . "' ";

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