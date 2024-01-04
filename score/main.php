<?php
include("connect_db.php");
$date = date('Y-m-d');
?>
<link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/weather-icons/climacons.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/fonts/meteocons/style.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist-plugin-tooltip.css">

<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
<!-- END MODERN CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- END Custom CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">



<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-body">
      <section id="invoice-summary">

        <div class="row">
          <!-- Your Top Expenses -->
          <div class="col-lg-7 col-md-12">
            <div class="card">
              <div class="card-header">

                <div class="form-group">
                  <h4>โปรแกรมการแข่งขันรายวัน:</h4>
                  <button class="ui-button ui-widget ui-corner-all btn-<?php if ($date == "2020-02-01") {
                                                                          echo "danger";
                                                                        } else {
                                                                          echo "info";
                                                                        } ?> mb-2" onclick="window.open('index.php?menu=MatchDay&date=2020-02-01','_self')">01</button>
                  <button class="ui-button ui-widget ui-corner-all btn-<?php if ($date == "2020-02-02") {
                                                                          echo "danger";
                                                                        } else {
                                                                          echo "info";
                                                                        } ?> mb-2" onclick="window.open('index.php?menu=MatchDay&date=2020-02-02','_self')">02</button>
                  <button class="ui-button ui-widget ui-corner-all btn-<?php if ($date == "2020-02-03") {
                                                                          echo "danger";
                                                                        } else {
                                                                          echo "info";
                                                                        } ?> mb-2" onclick="window.open('index.php?menu=MatchDay&date=2020-02-03','_self')">03</button>
                  <button class="ui-button ui-widget ui-corner-all btn-<?php if ($date == "2020-02-04") {
                                                                          echo "danger";
                                                                        } else {
                                                                          echo "info";
                                                                        } ?> mb-2" onclick="window.open('index.php?menu=MatchDay&date=2020-02-04','_self')">04</button>
                  <button class="ui-button ui-widget ui-corner-all btn-<?php if ($date == "2020-02-05") {
                                                                          echo "danger";
                                                                        } else {
                                                                          echo "info";
                                                                        } ?> mb-2" onclick="window.open('index.php?menu=MatchDay&date=2020-02-05','_self')">05</button>
                  <button class="ui-button ui-widget ui-corner-all btn-<?php if ($date == "2020-02-06") {
                                                                          echo "danger";
                                                                        } else {
                                                                          echo "info";
                                                                        } ?> mb-2" onclick="window.open('index.php?menu=MatchDay&date=2020-02-06','_self')">06</button>
                  <button class="ui-button ui-widget ui-corner-all btn-<?php if ($date == "2020-02-07") {
                                                                          echo "danger";
                                                                        } else {
                                                                          echo "info";
                                                                        } ?> mb-2" onclick="window.open('index.php?menu=MatchDay&date=2020-02-07','_self')">07</button>
                  <button class="ui-button ui-widget ui-corner-all btn-<?php if ($date == "2020-02-08") {
                                                                          echo "danger";
                                                                        } else {
                                                                          echo "info";
                                                                        } ?> mb-2" onclick="window.open('index.php?menu=MatchDay&date=2020-02-08','_self')">08</button>

                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                      <thead>
                        <tr>

                          <th>เวลา</th>
                          <th>โปรแกรมการแข่งขัน</th>
                          <th>ระหว่าง</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $sql2 = "select * from score_vs where date='" . $date . "' ";
                        $qr2 = mysql_query($sql2);
                        $i = 0;
                        $ii = 1;
                        while ($arr2 = mysql_fetch_array($qr2)) {
                          $sports_category = mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '" . $arr2['sport_type_id'] . "'"));
                          $round = mysql_fetch_array(mysql_query("select * from round where round_id = '" . $arr2['round_id'] . "'"));
                          $faculty1 = mysql_fetch_array(mysql_query("select * from university where id_university = '" . $arr2['faculty_id1'] . "'"));
                          $faculty2 = mysql_fetch_array(mysql_query("select * from university where id_university = '" . $arr2['faculty_id2'] . "'"));
                          $temporary1 = mysql_fetch_array(mysql_query("select * from temporary where temporary_name = '" . $arr2['temporary1'] . "'"));
                          $temporary2 = mysql_fetch_array(mysql_query("select * from temporary where temporary_name = '" . $arr2['temporary2'] . "'"));

                          $line = mysql_fetch_array(mysql_query("select * from line where line_id = '" . $arr2['line_id'] . "'"));
                          $value_date = explode("-", $arr2['date']);
                          $dd = ($value_date[2]) . "/" . $value_date[1] . "/" . ($value_date[0] + 543);
                          $value_date1 = explode(":", $arr2['times']);
                          $times = $value_date1[0] . "." . $value_date1[1] . " น";
                        ?>

                          <tr>

                            <td>
                              <?php echo $times; ?>
                            </td>
                            <td>
                              <?php echo $sports_category['name_Sports_category'] . " " . $arr2['sex'] . " " . $round['round_name'] . " " . $line['line_name']; ?>
                            </td>

                            <td>
                              <?php
                              if ($temporary1['temporary_id'] == "40") {
                                $t1 = $faculty1['subname_university'];
                              } else {
                                $t1 = $temporary1['temporary_name'];
                              }
                              if ($temporary2['temporary_id'] == "40") {
                                $t2 = $faculty2['subname_university'];
                              } else {
                                $t2 = $temporary2['temporary_name'];
                              }
                              echo $t1 . " " . "VS" . " " . $t2;

                              ?>
                            </td>

                          </tr>

                        <?php } ?>

                        <?php

                        $sql2 = "select * from score_vs2 where date='" . $date . "' ";
                        $qr2 = mysql_query($sql2);
                        $i = 0;
                        $ii = 1;
                        while ($arr2 = mysql_fetch_array($qr2)) {
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
                        ?>

                          <tr>

                            <td>
                              <?php echo $times; ?>
                            </td>
                            <td>
                              <?php echo $sports_category['name_Sports_category'] . " " . $arr2['sex'] . " " . $round['round_name'] . " " . $line['line_name']; ?>
                            </td>

                            <td>
                              <?php
                              if ($temporary1['temporary_id'] == "40") {
                                $t1 = $faculty1['subname_university'] . " " . "มือ" . " " . $faculty1['hand_ranks'];
                              } else {
                                $t1 = $temporary1['temporary_name'];
                              }
                              if ($temporary2['temporary_id'] == "40") {
                                $t2 = $faculty2['subname_university'] . " " . "มือ" . " " . $faculty2['hand_ranks'];
                              } else {
                                $t2 = $temporary2['temporary_name'];
                              }
                              echo $t1 . " " . "VS" . " " . $t2;

                              ?>
                            </td>

                          </tr>

                        <?php } ?>


                        <?php

                        $sql2 = "select * from score_all where date='" . $date . "'";
                        $qr2 = mysql_query($sql2);

                        while ($arr2 = mysql_fetch_array($qr2)) {
                          $sports_category = mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '" . $arr2['sport_type_id'] . "'"));
                          $round = mysql_fetch_array(mysql_query("select * from round where round_id = '" . $arr2['round_id'] . "'"));



                          $value_date = explode("-", $arr2['date']);
                          $dd = ($value_date[2]) . "/" . $value_date[1] . "/" . ($value_date[0] + 543);
                          $value_date1 = explode(":", $arr2['times']);
                          $times = $value_date1[0] . "." . $value_date1[1] . " น";
                        ?>

                          <tr>

                            <td>
                              <?php echo $times; ?>
                            </td>
                            <td>
                              <?php echo $sports_category['name_Sports_category'] . " " . $arr2['sex']; ?>
                            </td>

                            <td>

                              ทั้งหมด
                            </td>

                          </tr>

                        <?php } ?>







                      </tbody>
                      <tfoot>
                        <tr>

                          <th>เวลา</th>
                          <th>โปรแกรมการแข่งขัน</th>
                          <th>ระหว่าง</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <!-- Your Top Expenses -->
          <!-- Sales, Receipts and Dues -->
          <div class="col-lg-5 col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">ตารางสรุปเหรียญรางวัล</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body  px-0 py-0">
                  <div class="table-responsive">
                    <div id="showData"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Sales, Receipts and Dues -->
        </div>
        <!-- Total Receivables -->

        <!--/ Total Receivables -->
      </section>
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
        url: "gdata.php?menu=show_medal",
        data: "rev=1",
        async: false,
        success: function(getData) {
          $("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
        }
      }).responseText;
    }, 1000);
  });
</script>