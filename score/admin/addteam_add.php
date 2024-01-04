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
  
  <style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
      width: 40%;
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
      padding: 2px 16px;
    
    }

  </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">

  <!-- Main content -->
  <section class="content">
    <?php if($_GET['sport_type'] == ''){?>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
          <h4><i class="fa fa-edit"></i>&nbsp;เลือกชนิดกีฬา</h4>
        </div>
      </div>
      <div class="col-md-12">
        
        <?php
          $sqlss = "SELECT * from  sport_type t 
                inner join sports_category c ON t.id_Sport_type = c.id_Sport_type
                where c.status = '3' and t.status = '1'
                group by t.id_Sport_type";
          $qrss = mysql_query($sqlss);
          while ($arrss = mysql_fetch_array($qrss)) {
        ?>
        <div class="col-md-4 mt-3">
          <div class="card">
          <a href="main.php?menu=addteam_add&sport_type=<?php echo $arrss['id_Sport_type']?>&sport_name=<?php echo $arrss['name_Sport_type']?>"> 
            <img src="../mspig/<?php echo $arrss['id_Sport_type'] . ".png";  ?>" alt="Avatar" style="width:100%"/></a>

            <div class="container">
              <h4><b>
                <a href="main.php?menu=addteam_add&sport_type=<?php echo $arrss['id_Sport_type']?>&sport_name=<?php echo $arrss['name_Sport_type']?>"> 
                          <?php echo $arrss['name_Sport_type']; ?></a></b></h4> 
              <p><hr></p> 
            </div>
          </div>
          
          <!--.card-->
        </div> 

        <?php } ?>
      </div>
      
    </div>
    <?php } else {?>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <?php
          if($_POST['CID'] != '' ) {
            $categoty_type = $_POST['CID'];
          }

          if($_GET['IDS'] != '' ) {
            $categoty_type = $_GET['IDS'];
          }

          ?>

          <div class="box">
            <div class="box-header">
              <center>
                <h3 class="box-title">จัดการทีมแข่งขันแบบ VS2 :<strong><?php echo $_GET['sport_name'];?></strong></h3><br /><br /><button type="button" class="btn btn-primary" 
                  onclick="javascript:window.location='main.php?menu=addteam_team&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>'" />เพิ่มทีมการแข่งขันแบบ VS2 </button>
                
              </center>
              <div class="col-md-4">
                <form name="frm_regis" method="post" action="">
                  <div class="form-group">
                      <?php 
                      $sqlType = "SELECT * FROM sports_category WHERE id_Sport_type = '$_GET[sport_type]'";
                      $resType = mysql_query($sqlType);
                      ?>
                      <label class="form-label">เลือกประเภทกีฬา: </label>
                      <select name="CID" id="CID" class="form-control" onchange="this.form.submit()">
                            <option value="">-----ประเภทกีฬาทั้งหมด-----</option>
                            <?php
                            while($dataType = mysql_fetch_array($resType)) {
                            ?>
                            <option value="<?php echo $dataType['id_Sports_category'];?>" 
                              <?php if($categoty_type == $dataType['id_Sports_category']){echo "selected";}?>>
                              <?php echo $dataType['name_Sports_category'];?></option>
                            <?php }?>
                      </select>
                    </div>
                  </form>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">ลำดับ</th>
                    <th width="45%">ทีม</th>
                    <th width="10%">ประเภทกีฬา</th>
                    <th width="30%">นักกีฬา</th>
                    <th class="text-center" width="10%">เพิ่มนักกีฬา</th>
                    <th class="text-center" width="10%">ลบ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //include("connect_db.php");

                  if($_POST['CID'] != '' || $_GET['IDS'] != '') {
                    $cond_cid = " AND c.id_Sports_category = '$categoty_type'";
                  } else {
                    $cond_cid = '';
                  }
                  $i = 1;
                  $sql = "SELECT * from teamvs2 t 
                    INNER JOIN sports_category c ON t.id_Sports_category = c.id_Sports_category 
                    AND c.id_Sport_type = '$_GET[sport_type]' 
                    $cond_cid
                    ORDER BY id_team DESC";
                  $qr = mysql_query($sql);
                  while ($arr = mysql_fetch_array($qr)) {

                  ?>

                    <tr>
                      <td><?php echo $i; ?> </td>
                      <td>
                        <?php $arruni = mysql_fetch_array(mysql_query("select * from university where id_university = '" . $arr['id_university'] . "'"));
                        echo $arruni['name_university'];
                        ?>
                      </td>
                      <td>
                        <?php $arrcategory = mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '" . $arr['id_Sports_category'] . "'"));
                        echo $arrcategory['name_Sports_category'] . " (" . $arr['sex'] . ") ";
                        ?>
                        <br />
                        <?php echo "มือวางอันดับ" . " " . $arr['hand_ranks']; ?>
                      </td>
                      <td> รายชื่อนักกีฬา <br />
                        <?php
                        $sqlstd3 = "select * from  user_sportvs2 where id_team = '" . $arr['id_team'] . "'";
                        $qrstd3 = mysql_query($sqlstd3);
                        while ($arrstd3 = mysql_fetch_array($qrstd3)) {
                          $sqlstd33 = "select * from  student_sports where id_student = '" . $arrstd3['id_student'] . "' ";
                          $qrstd33 = mysql_query($sqlstd33);
                          $arrstd33 = mysql_fetch_array($qrstd33);
                          echo $arrstd33['title_name'] . $arrstd33['f_name'] . " " . $arrstd33['l_name']; ?>

                          <a href="addteam_userdel.php?id_team=<?php echo $arr['id_team'] ?>&IDSTD=<?php echo $arrstd3['id_student'] ?>"> <span>ลบ</span></a>
                          <br />
                        <?php

                        } ?>

                      </td>
                      <th class="text-center"><a href="main.php?menu=addteam_user&sport_type=<?php echo $arr['id_Sport_type'] ?>&ID=<?php echo $arr['id_team']; ?>&IDU=<?php echo $arr['id_university']; ?>&IDS=<?php echo $arr['id_Sports_category']; ?>&sex=<?php echo $arr['sex'] ?>" class="btn btn-app">
                          <i class="fa fa-edit"></i> <span>เพิ่มนักกีฬา</span></a></th>
                      <th class="text-center"><a href="JavaScript:if(confirm('คูณต้องการลบข้อมูลใช่หรือไม่?')==true){window.location='addteam_delete.php?ID=<?php echo $arr['id_team']; ?>'}" class="btn btn-app"><i class="fa fa-trash-o"></i> <span>ลบ</span></a></th>

                    </tr>
                  <?php $i++;
                  } ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>ลำดับ</th>
                    <th>ทีม</th>
                    <th>ประเภทกีฬา</th>
                    <th width="30%">นักกีฬา</th>
                    <th class="text-center" width="10%">เพิ่มนักกีฬา</th>
                    <th class="text-center" width="10%">ลบ</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
      <?php }?>

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