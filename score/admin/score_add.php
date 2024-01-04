<?php
include("connect_db.php");
$sql = "select * from Sports_category where id_Sports_category = '" . $_POST['id_Sports_category'] . "'";
$qr = mysql_query($sql);
$arr = mysql_fetch_array($qr);

echo $arr['name_Sports_category'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">



          <div class="box">
            <div class="box-header">
              <center>
                <h3 class="box-title">จัดการผลแข่งขัน: <?php echo $_GET['sport_name'];?></h3>
                <br>

            </div><!-- /.box-header -->
            <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <h4>โปรแกรมการแข่งขันรายวัน:</h4>
                    <?php
                    

                    if ($_GET['date'] == '') {
                      $date = date('Y-m-d');
                    } else {
                      $date = $_GET['date'];
                    }

                    // status

                    $dataStatus = mysql_fetch_array(mysql_query("select status from  sports_category where id_Sport_type = '" . $_GET['sport_type'] . "' "));

                    if($dataStatus['status'] == '1'){
                      
                      $sqlDate = "SELECT MIN(sc.date) AS startDate, MAX(sc.date) AS endDate 
                          FROM score_vs sc 
                          INNER JOIN sports_category c ON sc.sport_type_id = c.id_Sports_category
                          WHERE c.id_Sport_type='" . $_GET['sport_type'] . "' 
                          ";
                      
                    } else if($dataStatus['status'] == '2'){
                        $sqlDate = "SELECT MIN(sc.date) AS startDate, MAX(sc.date) AS endDate 
                          FROM score_all sc 
                          INNER JOIN sports_category c ON sc.sport_type_id = c.id_Sports_category
                          WHERE c.id_Sport_type='" . $_GET['sport_type'] . "' 
                        ";

                    } else { //status = 3
                      $sqlDate = "SELECT MIN(sc.date) AS startDate, MAX(sc.date) AS endDate 
                        FROM score_vs2 sc 
                        INNER JOIN sports_category c ON sc.sport_type_id = c.id_Sports_category
                        WHERE c.id_Sport_type='" . $_GET['sport_type'] . "' 
                        ";
                    }
                    
                    $qrDate = mysql_query($sqlDate);
                    $dataDate = mysql_fetch_array($qrDate);

                    $startDate = $dataDate['startDate'];
                    $endDate = $dataDate['endDate'];

                    // วันเริ่มแข่ง
                    if ($date < $startDate) {
                       $date = $startDate;
                    }

                    

                    // วันแข่งทั้งหมด
                    if($dataStatus['status'] == '1'){
                      
                      $sql = "SELECT sc.date FROM score_vs sc 
                        INNER JOIN sports_category c ON sc.sport_type_id = c.id_Sports_category
                        WHERE c.id_Sport_type='" . $_GET['sport_type'] . "' 
                        GROUP BY sc.date
                        ORDER BY sc.date";
                      
                    } else if($dataStatus['status'] == '2'){
                      $sql = "SELECT sc.date FROM score_all sc 
                        INNER JOIN sports_category c ON sc.sport_type_id = c.id_Sports_category
                        WHERE c.id_Sport_type='" . $_GET['sport_type'] . "' 
                        GROUP BY sc.date
                        ORDER BY sc.date";

                    } else { //status = 3
                      $sql = "SELECT sc.date FROM score_vs2 sc 
                        INNER JOIN sports_category c ON sc.sport_type_id = c.id_Sports_category
                        WHERE c.id_Sport_type='" . $_GET['sport_type'] . "' 
                        GROUP BY sc.date
                        ORDER BY sc.date";
                    }

                    $qr = mysql_query($sql);

                    while ($dataqr = mysql_fetch_array($qr)) {
                      $dataqr_arr = explode('-', $dataqr['date']);
                      $date_d = $dataqr_arr[2];
                      
                    ?>
                      <button class="ui-button ui-widget ui-corner-all btn-<?php if ($date == $dataqr['date']) {
                                                                                    echo "danger";
                                                                                  } else {
                                                                                    echo "info";
                                                                                  } ?> mb-2" onclick="window.open('main.php?menu=score_add&date=<?php echo $dataqr['date'] ?>&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>','_self')"><?php echo $date_d; ?></button>

                    <?php } ?>
                  </div>
                </div>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="8%">วันที่</th>
                    <th width="5%">เวลา</th>
                    <th width="12%">ประเภทกีฬา</th>
                    <th width="5%">รอบ</th>
                    <th width="5%">สาย</th>
                    <th width="40%">การแข่งขัน</th>
                    <th width="10%">เพิ่มผลการแข่งขัน</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  //include("connect_db.php");
                  if($date > $endDate) {
                    $date = $startDate;
                  }                                                   

                  $sql = "SELECT * from score_vs s 
                  INNER JOIN sports_category c ON s.sport_type_id = c.id_Sports_category
                  WHERE c.id_Sport_type = '$_GET[sport_type]' 
                  AND s.date = '".$date."'
                  ORDER BY s.date ASC, s.times ASC";
                  $qr = mysql_query($sql);
                  while ($arr = mysql_fetch_array($qr)) {

                  ?>

                    <tr>
                      <td><?php echo $arr['date'];   ?> </td>
                      <td><?php echo $arr['times']; ?> </td>

                      <td><?php $type = (mysql_fetch_array(mysql_query("SELECT * from sports_category where id_Sports_category = '" . $arr['sport_type_id'] . "'")));
                          echo $type['name_Sports_category'];
                          echo " " . $arr['sex'];


                          ?></td>


                      <td><?php $round = (mysql_fetch_array(mysql_query("SELECT * from round where round_id = '" . $arr['round_id'] . "'")));
                          echo $round['round_name']; ?></td>
                      <td><?php
                          $line = (mysql_fetch_array(mysql_query("SELECT * from line where line_id = '" . $arr['line_id'] . "'")));
                          echo $line['line_name']; ?></td>

                      <td><?php
                          if ($arr['faculty_id1'] == "0") {
                            echo $arr['temporary1'];
                          } else {
                            $faculty_id1 = (mysql_fetch_array(mysql_query("SELECT * from university where id_university = '" . $arr['faculty_id1'] . "'")));
                            echo $faculty_id1['name_university'];
                          }
                          echo "&nbsp;&nbsp;";
                          echo "-";
                          echo "&nbsp;&nbsp;";
                          if ($arr['faculty_id2'] == "0") {
                            echo $arr['temporary2'];
                          } else {
                            $faculty_id2 = (mysql_fetch_array(mysql_query("SELECT * from university where id_university = '" . $arr['faculty_id2'] . "'")));
                            echo $faculty_id2['name_university'];
                          }
                          echo "<br>";

                          echo "ผลการแข่งขัน:  ";
                          echo $arr['score1'] . "  -  " . $arr['score2'] . "    " . $unit;
                          ?></td>

                      <th>
                        <?php
                        if ($arr['faculty_id1'] == "0" or $arr['faculty_id2'] == "0") {

                          echo "กรุณาเพิ่มทีมคู่แข่งขัน";
                        } else {
                        ?>
                          <a href="main.php?menu=score_vs_detail&sport_type=<?php echo $_GET['sport_type']?>&ID=<?php echo $arr['score_vs_id']; ?>" class="btn btn-app">
                            <i class="fa fa-edit"></i> <span>เพิ่มผลการแข่งขัน</span></a>
                        <?php } ?>
                      </th>


                    </tr>
                  <?php } ?>
                  <!--0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000-->

                  <?php
                  //include("connect_db.php");


                  $sql = "SELECT * from score_vs2 s 
                  INNER JOIN sports_category c ON s.sport_type_id = c.id_Sports_category
                  WHERE c.id_Sport_type = '$_GET[sport_type]'
                  AND s.date = '".$date."'
                  ORDER BY s.date ASC, s.times ASC";
                  $qr = mysql_query($sql);
                  while ($arr = mysql_fetch_array($qr)) {

                  ?>

                    <tr>
                      <td><?php echo $arr['date'];   ?> </td>
                      <td><?php echo $arr['times']; ?> </td>

                      <td><?php $type = (mysql_fetch_array(mysql_query("SELECT * from sports_category where id_Sports_category = '" . $arr['sport_type_id'] . "'")));
                          echo $type['name_Sports_category'];
                          echo " " . $arr['sex'];


                          ?></td>


                      <td><?php $round = (mysql_fetch_array(mysql_query("SELECT * from round where round_id = '" . $arr['round_id'] . "'")));
                          echo $round['round_name']; ?></td>
                      <td><?php
                          $line = (mysql_fetch_array(mysql_query("SELECT * from line where line_id = '" . $arr['line_id'] . "'")));
                          echo $line['line_name']; ?></td>

                      <td><?php
                          if ($arr['faculty_id1'] == "0") {
                            echo $arr['temporary1'];
                          } else {
                            $faculty_id11 = (mysql_fetch_array(mysql_query("SELECT * from teamvs2 where id_team = '" . $arr['faculty_id1'] . "'")));
                            $faculty_id1 = (mysql_fetch_array(mysql_query("SELECT * from university where id_university = '" . $faculty_id11['id_university'] . "'")));
                            echo $faculty_id1['name_university'] . " " . "มือวางอันดับ" . $faculty_id11['hand_ranks'];
                          }
                          echo "&nbsp;&nbsp;";
                          echo "-";
                          echo "&nbsp;&nbsp;";
                          if ($arr['faculty_id2'] == "0") {
                            echo $arr['temporary2'];
                          } else {
                            $faculty_id22 = (mysql_fetch_array(mysql_query("SELECT * from teamvs2 where id_team = '" . $arr['faculty_id2'] . "'")));
                            $faculty_id2 = (mysql_fetch_array(mysql_query("SELECT * from university where id_university = '" . $faculty_id22['id_university'] . "'")));
                            echo $faculty_id2['name_university'] . " " . "มือวางอันดับ" . $faculty_id22['hand_ranks'];
                          }
                          echo "<br>";

                          echo "ผลการแข่งขัน:  ";
                          echo $arr['score1'] . "  -  " . $arr['score2'] . "    " . $unit;
                          ?></td>

                      <th>
                        <?php
                        if ($arr['faculty_id1'] == "0" or $arr['faculty_id2'] == "0") {

                          echo "กรุณาเพิ่มทีมคู่แข่งขัน";
                        } else {
                        ?>
                          <a href="main.php?menu=score_vs2_detail&sport_type=<?php echo $_GET['sport_type']?>&ID=<?php echo $arr['score_vs_id']; ?>" class="btn btn-app"><i class="fa fa-edit"></i> <span>เพิ่มผลการแข่งขัน</span></a>
                        <?php } ?>
                      </th>


                    </tr>
                  <?php } ?>

                  <!--0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000-->
                  <?php


                  $sqlall = "SELECT * from score_all s 
                  INNER JOIN sports_category c ON s.sport_type_id = c.id_Sports_category
                  WHERE c.id_Sport_type = '$_GET[sport_type]'
                  AND s.date = '".$date."'
                  ORDER BY s.date ASC, s.times ASC";
                  $qrall = mysql_query($sqlall);
                  while ($arrall = mysql_fetch_array($qrall)) {

                  ?>

                    <tr>
                      <td><?php echo $arrall['date'];   ?> </td>
                      <td><?php echo $arrall['times'];   ?> </td>
                      <td><?php $typeall = (mysql_fetch_array(mysql_query("SELECT * from sports_category where id_Sports_category = '" . $arrall['sport_type_id'] . "'")));
                          echo $typeall['name_Sports_category'];
                          echo " " . $arrall['sex'];

                          ?></td>


                      <td><?php $roundall = (mysql_fetch_array(mysql_query("SELECT * from round where round_id = '" . $arrall['round_id'] . "'")));
                          echo $roundall['round_name']; ?></td>
                      <td><?php echo "ไม่มี";
                          ?></td>

                      <td><img src="img/1.png" width="20" height="20" alt="" /><?php $t1 = (mysql_fetch_array(mysql_query("SELECT * from university where id_university = '" . $arrall['faculty_id1'] . "'")));
                                                                                if ($arrall['faculty_id1'] != 0) {
                                                                                  echo $t1['name_university'];
                                                                                } ?> <br>
                        <img src="img/2.png" width="20" height="20" alt="" /><?php $t2 = (mysql_fetch_array(mysql_query("SELECT * from university where id_university = '" . $arrall['faculty_id2'] . "'")));
                                                                              if ($arrall['faculty_id2'] != 0) {
                                                                                echo $t2['name_university'];
                                                                              } ?><br>
                        <img src="img/3.png" width="20" height="20" alt="" /><?php $t3 = (mysql_fetch_array(mysql_query("SELECT * from university where id_university = '" . $arrall['faculty_id3'] . "'")));
                                                                              if ($arrall['faculty_id3'] != 0) {
                                                                                echo $t3['name_university'];
                                                                              } ?>
                      </td>

                      <th><a href="main.php?menu=score_all_detail&sport_type=<?php echo $_GET['sport_type']?>&ID=<?php echo $arrall['score_all_id']; ?>&check=edit" class="btn btn-app"><i class="fa fa-edit"></i> <span>เพิ่มผลการแข่งขัน</span></a></th>


                    </tr>
                  <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                                                                  
                    <th width="8%">วันที่</th>
                    <th width="5%">เวลา</th>
                    <th width="12%">ประเภทกีฬา</th>
                    <th width="5%">รอบ</th>
                    <th width="5%">สาย</th>
                    <th width="40%">การแข่งขัน</th>
                    <th width="10%">เพิ่มผลการแข่งขัน</th>

                  </tr>
                </tfoot>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->

    </div><!-- /.content-wrapper -->



    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- page script -->
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
      $(function() {
        $("#example1").DataTable({
          "order": [
            [0, "asc"]
          ]
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script>
      $(function() {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {
          "placeholder": "dd/mm/yyyy"
        });
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {
          "placeholder": "mm/dd/yyyy"
        });
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          format: 'MM/DD/YYYY h:mm A'
        });
        //Date range as a button
        $('#daterange-btn').daterangepicker({
            ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
          },
          function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
      $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
</body>

</html>