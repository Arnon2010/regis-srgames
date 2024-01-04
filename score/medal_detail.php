<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
</head>
<style>
  .simply {
    font: 14px Trebuchet MS, Tahoma;
    /*margin: 45px;*/
    width: 100%;
    border-collapse: collapse;
    text-align: left;
  }

  .simply th {
    font: normal 16px Trebuchet MS, Tahoma;
    color: #222;
    background: #cccccc;
    padding: 10px 8px;
    border-bottom: 2px solid #ccc;
  }

  .simply td {
    border-bottom: 1px solid #ccc;
    color: #666;
    background: #fff;
    padding: 5px;
  }

  .simply tbody tr:hover td {
    color: #222;
    background: #eee;
  }
</style>
<link rel="stylesheet" href="dist/css/lightbox.min.css">

<!-- Attach our CSS -->
<link rel="stylesheet" href="reveal.css">

<!-- Attach necessary scripts -->
<!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="jquery.reveal.js"></script>

<body class="hold-transition skin-blue sidebar-mini">
  <br />
  <section class="container gridgallery">
    <?php
    include("connect_db.php");
    $sql = "select * from sport_type where sport_type_id = '" . $_GET['STID'] . "'";
    $qr = mysql_query($sql);
    $arr = mysql_fetch_array($qr);
    $sqlf = "select * from university where id_university = '" . $_GET['FID'] . "'";
    $qrf = mysql_query($sqlf);
    $arrf = mysql_fetch_array($qrf);
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <!-- Portfolio Item -->
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                  <div class="form-group">
                    <center><button type="button" class="btn btn-primary" onclick="javascript:window.location='index.php?menu=medal&action=view'" />ย้อนกลับ</button><br /><br />
                      <h3></h3>
                    </center>


                    <center><br />
                      <h3>รายการเหรียญรางวัล<?php echo $arr['sport_type_name']; ?> ของ<?php echo $arrf['name_university']; ?></h3>
                    </center>
                    <?php

                    $medal = mysql_fetch_array(mysql_query("select * from medal where faculty_id = '" . $_GET['FID'] . "'"));
                    ?>
                    <table width="50%" border="0" align="center">
                      <tbody>
                        <tr>
                          <td><img src="admin/img/1.png" width="36" alt="" />: <strong><?php echo $medal['faculty_1']; ?></strong></td>
                          <td><img src="admin/img/2.png" width="36" alt="" />: <strong><?php echo $medal['faculty_2']; ?></strong></td>
                          <td><img src="admin/img/3.png" width="36" alt="" />: <strong><?php echo $medal['faculty_3']; ?></strong></td>
                          <td>รวม: <strong><?php echo $medal['faculty_1'] + $medal['faculty_2'] + $medal['faculty_3']; ?></strong></td>
                        </tr>
                      </tbody>
                    </table>

                    <table width="100%" border="0" class="simply" summary="PremierShip Top5">
                      <thead>
                        <tr>
                          <th scope="col" width="8%">&nbsp;<strong>ลำดับที่</strong></th>
                          <th scope="col">ประเภทเหรียญที่ได้<strong></strong></th>
                          <th scope="col">&nbsp;<strong>ประเภทกีฬา</strong></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 0;
                        $aa = 1;

                        $sql2 = "SELECT * from medal_detail where id_university='" . $_GET['FID'] . "'";
                        $qr2 = mysql_query($sql2);

                        while ($arr2 = mysql_fetch_array($qr2)) {
                          $sql22 = "SELECT * from sports_category where id_Sports_category='" . $arr2['id_Sports_category'] . "'";
                          $qr22 = mysql_query($sql22);
                          $arr22 = mysql_fetch_array($qr22);
                        ?>

                          <tr>

                            <td align="center"><?php echo $aa; ?></td>
                            <td>
                              <?php if ($arr2['ranks_medal'] == 1) { ?>
                                <img src="admin/img/1.png" width="50" alt="" />

                              <?php } else if ($arr2['ranks_medal'] == 2) { ?>
                                <img src="admin/img/2.png" width="50" alt="" />

                              <?php } else if ($arr2['ranks_medal'] == 3) { ?>

                                <img src="admin/img/3.png" width="50"" alt="" />
                              <?php } ?>

                            </td>
                            <td><?php 
                            if($arr2['chackio'] == '1') {
                              echo $arr22['name_Sports_category'] . $arr2['sex']; 
                            }else {
                              echo $arr22['name_Sports_category'] . $arr2['sex']. ' <small>[หมายเหตุ: ไม่นับเหรียญ</small>]'; 
                            }
                            ?>
                            <br /><br />

                              <?php if ($arr22['status'] == 1) { ?>
                                <?php
                                $sql221 = "SELECT * from sport_regis 
                                where id_university='" . $_GET['FID'] . "' && id_Sports_category = '" . $arr2['id_Sports_category'] . "'";
                                $qr221 = mysql_query($sql221);
                                while ($arr221 = mysql_fetch_array($qr221)) {

                                  $sql2212 = "SELECT * from student_sports where id_student='" . $arr221['id_student'] . "'";
                                  $qr2212 = mysql_query($sql2212);
                                  $arr2212 = mysql_fetch_array($qr2212);
                                  if ($arr2['sex'] == "ชาย" && $arr2212['title_name'] == "นาย") {
                                    echo "- " . $arr2212['title_name'] . $arr2212['f_name'] . " " . $arr2212['l_name']; ?><br /><?php
                                  }

                                  if (($arr2['sex'] == "หญิง" && $arr2212['title_name'] == "นาง") || ($arr2['sex'] == "หญิง" && $arr2212['title_name'] == "นางสาว")) {
                                    echo "- " . $arr2212['title_name'] . $arr2212['f_name'] . " " . $arr2212['l_name']; ?><br /><?php
                                  }

                                  if ($arr2['sex'] == "คู่ผสม") {
                                    echo "- " . $arr2212['title_name'] . $arr2212['f_name'] . " " . $arr2212['l_name']; ?><br /><?php
                                  }

                                    ?>
                                <?php                                                                           
                                }
                                ?>

                              <?php } else if ($arr22['status'] == 2) { ?>

                                <?php
                                $idsut = 0;
                                $sqloi = "select * from user_sportall";
                                $qroi = mysql_query($sqloi);
                                while ($arroi = mysql_fetch_array($qroi)) {

                                  $sqloiu = "select * from student_sports where id_student = '" . $arroi['id_student'] . "'";
                                  $qroiu = mysql_query($sqloiu);
                                  $arroiu = mysql_fetch_array($qroiu);


                                  $sqlsc = "select * from score_all where score_all_id = '" . $arroi['score_all_id'] . "'";
                                  $qrsc = mysql_query($sqlsc);
                                  $arrsc = mysql_fetch_array($qrsc);


                                  if ($arr22['id_Sports_category'] == $arrsc['sport_type_id'] and $arr2['sex'] == $arrsc['sex'] and $arroi['university_ranking'] == $arr2['ranks_medal'] and $arroiu['id_university'] == $_GET['FID']) {
                                    if ($arr22['id_Sports_category'] == 31 and $arr2['id_medal_detail'] == 320) {
                                      if ($arroiu['id_student'] == 1283) {
                                        echo "- " . "นายวีรภัทร แสนนา";
                                      }
                                    } else if ($arr22['id_Sports_category'] == 31 and $arr2['id_medal_detail'] == 322) {
                                      if ($arroiu['id_student'] == 1122) {
                                        echo "- " . "นายนภดล วงศ์สุทธาวาส";
                                      }
                                    } else {
                                      echo "- " . $arroiu['title_name'] . $arroiu['f_name'] . " " . $arroiu['l_name'];
                                    }
                                ?><br /><?php

                                  }
                                }
                              ?>

                              <?php } else if ($arr22['status'] == 3) { ?>
                                <?php
                                $sql223 = "SELECT * from teamvs2 where id_university='" . $_GET['FID'] . "' 
                                and id_Sports_category = '" . $arr2['id_Sports_category'] . "' 
                                and hand_ranks = '" . $arr2['hand_ranks'] . "'";
                                $qr223 = mysql_query($sql223);
                                while ($arr223 = mysql_fetch_array($qr223)) {
                                  $sql2231 = "select * from user_sportvs2 where id_team='" . $arr223['id_team'] . "'";
                                  $qr2231 = mysql_query($sql2231);
                                  while ($arr2231 = mysql_fetch_array($qr2231)) {

                                    $sql2232 = "select * from student_sports where id_student='" . $arr2231['id_student'] . "'";
                                    $qr2232 = mysql_query($sql2232);
                                    $arr2232 = mysql_fetch_array($qr2232);

                                    if ($arr2['sex'] == "ชาย" && $arr2232['title_name'] == "นาย") {
                                      echo "- " . $arr2232['title_name'] . $arr2232['f_name'] . " " . $arr2232['l_name']; ?><br /><?php
                                    }
                                    if (($arr2['sex'] == "หญิง" && $arr2232['title_name'] == "นาง") || ($arr2['sex'] == "หญิง" && $arr2232['title_name'] == "นางสาว")) {
                                      echo "- " . $arr2232['title_name'] . $arr2232['f_name'] . " " . $arr2232['l_name']; ?><br /><?php
                                    }

                                    if ($arr2['sex'] == "คู่ผสม") {
                                      echo "- " . $arr2232['title_name'] . $arr2232['f_name'] . " " . $arr2232['l_name']; ?><br /><?php
                                    }

                                    ?>

                                <?php
                                  }
                                }
                                ?>


                              <?php } ?>


                              <br />
                            </td>

                          </tr>

                        <?php
                          $aa++;
                        } ?>


                      </tbody>
                    </table>
                    <br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div><!-- /.form-group -->
                </div>
              </div>
            </div>
            <!-- //Portfolio Item// -->
            <div class="clearfix"></div>
          </div><!-- /.box -->
        </div>
      </div><!-- /.col -->
    </div><!-- ./row -->
  </section>
  <!-- End Portfolio Images -->

  <br />
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
  <script type="text/javascript">
    $(function() {
      setInterval(function() { // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData = $.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
          url: "gdata2.php?menu=show_medal",
          data: "rev=1",
          async: false,
          success: function(getData) {
            $("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
          }
        }).responseText;
      }, 1000);
    });
  </script>
</body>

</html>