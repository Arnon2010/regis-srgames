<?php include("connect_db.php");?>
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
                <h3 class="box-title">จัดการข้อมูลการแข่งขัน: <?php echo $_GET['sport_name']; ?></h3><br /><br />
                <button type="button" class="btn btn-primary" 
                  onclick="javascript:window.location='main.php?menu=score_vs_add&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>'" />เพิ่มข้อมูลการแข่งขันแบบ VS </button>&nbsp;
                <button type="button" class="btn btn-primary" 
                  onclick="javascript:window.location='main.php?menu=score_vs2_add&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>'" />เพิ่มข้อมูลการแข่งขันแบบ VS2 </button>&nbsp;
                  <button type="button" class="btn btn-primary" 
                  onclick="javascript:window.location='main.php?menu=score_all_add&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>'" />เพิ่มข้อมูลการแข่งขันแบบ all </button>
              </center>
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
                                                                                  } ?> mb-2" onclick="window.open('main.php?menu=score&date=<?php echo $dataqr['date'] ?>&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>','_self')"><?php echo $date_d; ?></button>

                    <?php } ?>
                  </div>
                </div>
              </div>
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="8%">วันที่</th>
                    <th width="5%">เวลา</th>
                    <th width="10%">รูปแบบกีฬา</th>
                    <th width="12%">ประเภทกีฬา</th>
                    <th width="10%">รอบ</th>
                    <th width="5%">สาย</th>
                    <th width="40%">การแข่งขัน</th>
                    <th width="10%" class="text-center">แก้ไข</th>
                    <th width="10%" class="text-center">ลบ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  if($date > $endDate) {
                    $date = $startDate;
                  }

                  $sql = "SELECT * from score_vs s 
                  INNER JOIN sports_category c ON s.sport_type_id = c.id_Sports_category
                  WHERE c.id_Sport_type = '$_GET[sport_type]'
                  AND s.date = '".$date."'";
                  $qr = mysql_query($sql);
                  while ($arr = mysql_fetch_array($qr)) {

                  ?>

                    <tr>
                      <td><?php echo $arr['date'];   ?> </td>
                      <td><?php echo $arr['times'];   ?> </td>
                      <td><?php $type1 = (mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '" . $arr['sport_type_id'] . "'")));
                          if ($type1['status'] == "1") {
                            echo "การแข่งขันแบบ vs";
                          } else {
                            echo "การแข่งขันแบบ all";
                          }
                          ?></td>
                      <td><?php $type = (mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '" . $arr['sport_type_id'] . "'")));
                          echo $type['name_Sports_category'];
                          echo " " . $arr['sex'];
                          ?></td>


                      <td><?php $round = (mysql_fetch_array(mysql_query("select * from round where round_id = '" . $arr['round_id'] . "'")));
                          echo $round['round_name']; ?></td>
                      <td><?php
                          $line = (mysql_fetch_array(mysql_query("select * from line where line_id = '" . $arr['line_id'] . "'")));
                          echo $line['line_name']; ?></td>

                      <td><?php
                          if ($arr['faculty_id1'] == "0") {
                            echo $arr['temporary1'];
                          } else {
                            $faculty_id1 = (mysql_fetch_array(mysql_query("select * from university where id_university = '" . $arr['faculty_id1'] . "'")));
                            echo $faculty_id1['name_university'];
                          }
                          echo "&nbsp;&nbsp;";
                          echo "-";
                          echo "&nbsp;&nbsp;";
                          if ($arr['faculty_id2'] == "0") {
                            echo $arr['temporary2'];
                          } else {
                            $faculty_id2 = (mysql_fetch_array(mysql_query("select * from university where id_university = '" . $arr['faculty_id2'] . "'")));
                            echo $faculty_id2['name_university'];
                          }
                          echo "<br>";

                          ?></td>

                      <th class="text-center"><a href="main.php?menu=score_vs_edit&ID=<?php echo $arr['score_vs_id']; ?>&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>" class="btn btn-app"><i class="fa fa-edit"></i> <span>แก้ไข</span></a></th>
                      <th class="text-center"><a href="JavaScript:if(confirm('คูณต้องการลบข้อมูลใช่หรือไม่?')==true){window.location='score_vs_delete.php?ID=<?php echo $arr['score_vs_id']; ?>&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>'}" class="btn btn-app"><i class="fa fa-trash-o"></i> <span>ลบ</span></a></th>

                    </tr>
                  <?php } ?>

                  <!--00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000-->

                  <?php

                  $sqlvs2 = "SELECT * from score_vs2 s 
                  INNER JOIN sports_category c ON s.sport_type_id = c.id_Sports_category
                  WHERE c.id_Sport_type = '$_GET[sport_type]'
                  AND s.date = '".$date."'";
                  $qrvs2 = mysql_query($sqlvs2);
                  while ($arrvs2 = mysql_fetch_array($qrvs2)) {

                  ?>

                    <tr>
                      <td><?php echo $arrvs2['date'];   ?> </td>
                      <td><?php echo $arrvs2['times'];   ?> </td>
                      <td><?php $type1vs2 = (mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '" . $arrvs2['sport_type_id'] . "'")));
                          if ($type1vs2['status'] == "3") {
                            echo "การแข่งขันแบบ vs2";
                          } else {
                            echo "การแข่งขันแบบ all";
                          }
                          ?></td>
                      <td><?php $typevs2 = (mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '" . $arrvs2['sport_type_id'] . "'")));
                          echo $typevs2['name_Sports_category'];
                          echo " " . $arrvs2['sex'];


                          ?></td>


                      <td><?php $roundvs2 = (mysql_fetch_array(mysql_query("select * from round where round_id = '" . $arrvs2['round_id'] . "'")));
                          echo $roundvs2['round_name']; ?></td>
                      <td><?php
                          $linevs2 = (mysql_fetch_array(mysql_query("select * from line where line_id = '" . $arrvs2['line_id'] . "'")));
                          echo $linevs2['line_name']; ?></td>

                      <td><?php
                          if ($arrvs2['faculty_id1'] == "0") {
                            echo $arrvs2['temporary1'];
                          } else {
                            $faculty_id1vs2 = (mysql_fetch_array(mysql_query("select * from teamvs2 where id_team = '" . $arrvs2['faculty_id1'] . "'")));
                            $faculty_id1vs21 = (mysql_fetch_array(mysql_query("select * from university where id_university = '" . $faculty_id1vs2['id_university'] . "'")));
                            echo $faculty_id1vs21['name_university'] . "(" . " มือวางอันดับ" . $faculty_id1vs2['hand_ranks'] . ")";
                          }
                          echo "&nbsp;&nbsp;";
                          echo "-";
                          echo "&nbsp;&nbsp;";
                          if ($arrvs2['faculty_id2'] == "0") {
                            echo $arrvs2['temporary2'];
                          } else {
                            $faculty_id2vs2 = (mysql_fetch_array(mysql_query("select * from teamvs2 where id_team = '" . $arrvs2['faculty_id2'] . "'")));
                            $faculty_id2vs21 = (mysql_fetch_array(mysql_query("select * from university where id_university = '" . $faculty_id2vs2['id_university'] . "'")));
                            echo $faculty_id2vs21['name_university'] . "(" . " มือวางอันดับ" . $faculty_id2vs2['hand_ranks'] . ")";
                          }
                          echo "<br>";

                          ?></td>

                      <th class="text-center"><a href="main.php?menu=score_vs2_edit&ID=<?php echo $arrvs2['score_vs_id']; ?>&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>" class="btn btn-app"><i class="fa fa-edit"></i> <span>แก้ไข</span></a></th>
                      <th class="text-center"><a href="JavaScript:if(confirm('คูณต้องการลบข้อมูลใช่หรือไม่?')==true){window.location='score_vs2_delete.php?ID=<?php echo $arrvs2['score_vs_id']; ?>&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>'}" class="btn btn-app"><i class="fa fa-trash-o"></i> <span>ลบ</span></a></th>

                    </tr>
                  <?php } ?>

                  <!--00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000-->

                  <?php
                  $sqlall = "SELECT * from score_all s 
                  INNER JOIN sports_category c ON s.sport_type_id = c.id_Sports_category
                  WHERE c.id_Sport_type = '$_GET[sport_type]' 
                  AND s.date = '".$date."'";
                  $qrall = mysql_query($sqlall);
                  while ($arrall = mysql_fetch_array($qrall)) {

                  ?>

                    <tr>
                      <td><?php echo $arrall['date'];   ?> </td>
                      <td><?php echo $arrall['times'];   ?> </td>
                      <td><?php $type1all = (mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '" . $arrall['sport_type_id'] . "'")));
                          if ($type1all['status'] == "1") {
                            echo "การแข่งขันแบบ vs";
                          } else {
                            echo "การแข่งขันแบบ all";
                          }
                          ?></td>
                      <td><?php $typeall = (mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '" . $arrall['sport_type_id'] . "'")));
                          echo $typeall['name_Sports_category'];
                          echo " " . $arrall['sex'];


                          ?></td>


                      <td><?php $roundall = (mysql_fetch_array(mysql_query("select * from round where round_id = '" . $arrall['round_id'] . "'")));
                          echo $roundall['round_name']; ?></td>
                      <td><?php echo "ไม่มี";
                          ?></td>

                      <td><img src="img/1.png" width="20" height="20" alt="" /><?php $t1 = (mysql_fetch_array(mysql_query("select * from university where id_university = '" . $arrall['faculty_id1'] . "'")));
                                                                                if ($arrall['faculty_id1'] != 0) {
                                                                                  echo $t1['name_university'];
                                                                                } ?> <br>
                        <img src="img/2.png" width="20" height="20" alt="" /><?php $t2 = (mysql_fetch_array(mysql_query("select * from university where id_university = '" . $arrall['faculty_id2'] . "'")));
                                                                              if ($arrall['faculty_id2'] != 0) {
                                                                                echo $t2['name_university'];
                                                                              } ?> <br>
                        <img src="img/3.png" width="20" height="20" alt="" /><?php $t3 = (mysql_fetch_array(mysql_query("select * from university where id_university = '" . $arrall['faculty_id3'] . "'")));
                                                                              if ($arrall['faculty_id3'] != 0) {
                                                                                echo $t3['name_university'];
                                                                              } ?>
                      </td>

                      <th class="text-center"><a href="main.php?menu=score_all_add&ID=<?php echo $arrall['score_all_id']; ?>&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>&check=edit" class="btn btn-app"><i class="fa fa-edit"></i> <span>แก้ไข</span></a></th>
                      <th class="text-center"><a href="JavaScript:if(confirm('คูณต้องการลบข้อมูลใช่หรือไม่?')==true){window.location='score_all_add_save.php?check=delete&ID=<?php echo $arrall['score_all_id']; ?>&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>'}" class="btn btn-app"><i class="fa fa-trash-o"></i> <span>ลบ</span></a></th>

                    </tr>
                  <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                    <th width="8%">วันที่</th>
                    <th width="5%">เวลา</th>
                    <th width="10%">รูปแบบกีฬา</th>
                    <th width="12%">ประเภทกีฬา</th>
                    <th width="10%">รอบ</th>
                    <th width="5%">สาย</th>
                    <th width="40%">การแข่งขัน</th>
                    <th width="10%" class="text-center">แก้ไข</th>
                    <th width="10%" class="text-center">ลบ</th>
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
</body>

</html>