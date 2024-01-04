   <?php

include("connect_db.php");
$checkadd = 0;

$sqlsut= "SELECT * from student_sports where id_student='".$_GET['id']."'";
$querysut = mysql_query($sqlsut,$conn) or die(mysql_error());
$arrsut = mysql_fetch_array($querysut);

?>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/pages/users.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- END Custom CSS-->

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">ข้อมูลส่วนบุคคล</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
                </li>
                <li class="breadcrumb-item"><a href="#">จัดการข้อมูลนักกีฬา</a>
                </li> -->
                <li class="breadcrumb-item active">ข้อมูลนักกีฬา
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">

        </div>
      </div>
      <div class="sidebar-detached sidebar-left" ,=",">
        <div class="sidebar">
          <div class="">
            <div class="card card border-teal border-lighten-2">
              <div class="text-center">
                <div class="card-body">
                  <img src="https://regissvg.rmutsv.ac.th/filesutdent/<?php echo $arrsut['pic_student'];?>" class="rounded-circle  height-150"
                  alt="Card image">
                </div>
                <div class="card-body">
                  <h4 class="card-title"><?php  echo $arrsut['title_name'].$arrsut['f_name']." ".$arrsut['l_name']; ?></h4>
                  <h6 class="card-subtitle text-muted">
                  					<?php
                                    $sqlsut1= "SELECT * from university where id_university='".$arrsut['id_university']."'";
                                    $querysut1 = mysql_query($sqlsut1,$conn) or die(mysql_error());
                                    $arrsut1 = mysql_fetch_array($querysut1);
									echo $arrsut1['subname_university'];
                                    ?>
                  </h6>
                </div>
              </div>
              <div class="list-group list-group-flush">
                <a href="#" class="list-group-item">วุฒิ : <?php echo $arrsut['education_level'];?></a>
                <a href="#" class="list-group-item">คณะ : <?php echo $arrsut['faculty'];?></a>
                <a href="#" class="list-group-item">ชั้นปี : ปี <?php echo $arrsut['year_level'];?></a><br/>
                <h3 align="center">
                		<?php if ($arrsut['st']==1)
										{
                    ?>
                                        <p class="text-danger">สถานะ : ข้อมูลไม่ถูกต้อง</p>
                                        <?php
                                        }
                                        else if($arrsut['st']==0)
                                        {
                                        ?>
                                        <p class="text-warning">สถานะ : รอการตรวจสอบ</p>
                                       <?php
										}
										else if($arrsut['st']==9)
                                        {
                                        ?>
                                        <p class="text-success">สถานะ : ข้อมูลผ่านการตรวจสอบ</p>
                    <?php
										}
										?>
                 </h3>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="content-detached content-right">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title">ข้อมูลการเล่นกีฬา</h4>
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
                            <th></th>
                            <th>ประเภทกีฬา</th>
                            <th>ชนิดกีฬา</th>
                          </tr>
                        </thead>
                        <tbody>
                                    <?php
                                    $sqlregis = "select * from sport_regis where id_student='".$arrsut['id_student']."'";
                                    $queryregis = mysql_query($sqlregis,$conn) or die(mysql_error());
                                    while($arrregis = mysql_fetch_array($queryregis))
                                    {
                                    ?>
                          <tr>
                            <td class="text-center"><i class="la la-star  yellow darken-2"></i></td>
                            <td>
                                    <?php
                                    $sqlregis1 = "select * from sports_category where id_Sports_category='".$arrregis['id_Sports_category']."'";
                                    $queryregis1 = mysql_query($sqlregis1,$conn) or die(mysql_error());
                                    $arrregis1 = mysql_fetch_array($queryregis1);
									echo $arrregis1['name_Sports_category'];
                                    ?>
                            </td>
                            <td>
                                    <?php
                                    $sqlregis2 = "select * from sport_type where id_Sport_type='".$arrregis['id_Sport_type']."'";
                                    $queryregis2 = mysql_query($sqlregis2,$conn) or die(mysql_error());
                                    $arrregis2 = mysql_fetch_array($queryregis2);
									echo $arrregis2['name_Sport_type'];
                                    ?>
                            </td>
                          </tr>
                                    <?php
									}
                                    ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card-head">
                  <div class="card-header">


                  </div>
                </div>
              </div>
            </div>
          </section>
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
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
  <!-- END PAGE LEVEL JS-->
