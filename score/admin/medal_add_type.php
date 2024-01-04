<?php
ob_start();
session_start();
include("connect_db.php");
if( $_SESSION['admin_id']=="")
{
	header("location: index.php");
 	exit(0);	
}

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    
  <div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">สรุปเหรียญตามชนิดกีฬา
          <?php if ($_GET['action'] != 'view') { ?>
            <a href="index.php?menu=showfixture&action=view" class="btn btn-secondary btn-sm">view</a>
          <?php } ?>
        </h3>
        <!-- <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              
              <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
              </li>
              
              <li class="breadcrumb-item">ตารางการแข่งขันกีฬา:
              </li>

            </ol>
          </div>
        </div> -->
      </div>
      <div class="content-header-right col-md-6 col-12">
      </div>
    </div>

    <div class="col-12">

      <div class="card">


        <div class="card-header">
          <h4 class="card-title">เลือกชนิดกีฬา</h4>
          
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        </div>
        <div class="card-content collapse show">
          <div class="card-body">
            <?php
            $sqlss = "select * from  sport_type where status = '1'";
            $qrss = mysql_query($sqlss);
            while ($arrss = mysql_fetch_array($qrss)) {
              $sqlss2 = "select * from  sports_category where id_Sport_type='" . $arrss['id_Sport_type'] . "'";
              $qrss2 = mysql_query($sqlss2);
              $arrss2 = mysql_fetch_array($qrss2);
            ?>
              <?php if ($arrss2['status'] == "1") {?>
                <a class="btn btn-social width-250 mr-1 mb-1 btn-dropbox" href="index.php?menu=medal_type_detail&action=view&ID=<?php echo $arrss['id_Sport_type']; ?>"> <img src="mspig/<?php echo $arrss['id_Sport_type'] . ".png";  ?>" /><?php echo $arrss['name_Sport_type']; ?></a><?php  } else if ($arrss2['status'] == "2") { ?>
                <a class="btn btn-social width-250 mr-1 mb-1 btn-dropbox" href="index.php?menu=medal_type_detail&action=view&ID=<?php echo $arrss['id_Sport_type']; ?>"> <img src="mspig/<?php echo $arrss['id_Sport_type'] . ".png";  ?>" /><?php echo $arrss['name_Sport_type']; ?></a><?php  } else if ($arrss2['status'] == "3") { ?>
                <a class="btn btn-social width-250 mr-1 mb-1 btn-dropbox" href="index.php?menu=medal_type_detail&action=view&ID=<?php echo $arrss['id_Sport_type']; ?>"> <img src="mspig/<?php echo $arrss['id_Sport_type'] . ".png";  ?>" /><?php echo $arrss['name_Sport_type']; ?></a><?php  } ?>

            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  </body>

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
      $(function () {
        $("#example1").DataTable({
			"order": [[ 2, "asc" ]]
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
