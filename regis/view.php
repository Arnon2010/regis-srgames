   <?php
ob_start();
session_start();
include("connect_db.php");
$checkadd = 0;

              $sqlsut= "select * from student_sports where id_student='".$_GET['id']."'";
              $querysut = mysql_query($sqlsut,$conn) or die(mysql_error());
              $arrsut = mysql_fetch_array($querysut);
if($_SESSION['admin_id']=="")
{
	header("location: index.php");
 	exit(0);
}
if($arrsut['id_student']=="")
{
	header("location: index.php");
 	exit(0);
}
if($arrsut['id_university']!=$_SESSION['university_id'] or $_SESSION['university_id']=="0")
{
	if($_SESSION['university_id']!="0")
	{
	header("location: index.php");
 	exit(0);
	}
}
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
                <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
                </li>
                <li class="breadcrumb-item"><a href="#">จัดการข้อมูลนักกีฬา</a>
                </li>
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
                  <img src="filesutdent/<?php echo $arrsut['pic_student'];?>" class="rounded-circle  height-150"
                  alt="Card image">
                </div>
                <div class="card-body">
                  <h4 class="card-title"><?php  echo $arrsut['title_name'].$arrsut['f_name']." ".$arrsut['l_name']; ?></h4>
                  <h6 class="card-subtitle text-muted">
                  					<?php
                                    $sqlsut1= "select * from university where id_university='".$arrsut['id_university']."'";
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
                                        <p><?php echo $arrsut['detail']; ?></p>
                                        <a href='home.php?menu=player&id=<?php echo $arrsut['CITIZEN_ID']; ?>'class="text-info"><i class="ft-edit"></i> แก้ไขคลิก</a>

                                        <?php
                                        }
                                        else if($arrsut['st']==0)
                                        {
											if($arrsut['pic_cardstudent']=="" || $arrsut['pic_card']=="" || $arrsut['evidence']=="" || $arrsut['evidence1']==""){
                                        ?>
                                        <p class="text-danger">ข้อมูลไม่ครบถ้วน</p>
                                        
                                        <?php }else{?>
                                        <p class="text-warning">สถานะ : รอการตรวจสอบ</p>
                                        <?php }?>
                                      
                                        
                                        
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
                   					    <?php
										if($arrsut['st']==9)
                                        {
                                        ?>
                                        <button type="button" class="btn btn-block btn-outline-success mb-2" onclick="window.open('reportstudent.php?student=<?php echo $arrsut['id_student']; ?>','_blank')"><i class="ft-printer"></i> พิมพ์</button>
                                       <?php
										}
										?>
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
                    <h4 class="card-title">ข้อมูลเอกสารทั่วไป</h4><br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    รูปบัตรนักศึกษา : <a href="filesutdent/<?php echo $arrsut['pic_cardstudent'];?>" target="_blank"><?php echo $arrsut['pic_cardstudent'];?></a>
                    <br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    รูปบัตรประชาชน : <a href="filesutdent/<?php echo $arrsut['pic_card'];?>" target="_blank"><?php echo $arrsut['pic_card'];?></a>
                    <br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    เอกสารใบทรานสคริปเทอม 1 : <a href="filesutdent/<?php echo $arrsut['evidence'];?>" target="_blank"><?php echo $arrsut['evidence'];?></a>
                    <br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    เอกสารใบลงทะเบียนเทอม 2 : <a href="filesutdent/<?php echo $arrsut['evidence1'];?>" target="_blank"><?php echo $arrsut['evidence1'];?></a>




                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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
