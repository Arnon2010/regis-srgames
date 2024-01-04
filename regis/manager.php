<?php
ob_start();
session_start();
include("connect_db.php");
$checkadd = 0;
if($_SESSION['admin_id']=="")
{
	header("location: index.php");
 	exit(0);
}

$current_timestamp = time();

 if($_GET['ii']=="edi")
  {
	$sqlued1 = "select * from  manager where manager_id = '".$_GET["id"]."'";
  $queryued1 = mysql_query($sqlued1,$conn) or die(mysql_error());
  $arrued1 = mysql_fetch_array($queryued1);
	$nameed1 = $arrued1['manager_pic'];

  $strsqled = "update manager set manager_pic = '' where manager_id = '".$_GET["id"]."'";
	$objQueryed = mysql_query($strsqled) or die(mysql_error());
	$delete="filemanager/$nameed1"; //ใช้ในการทดสอบ
	unlink($delete);
  }
if($_GET['action']=="add")
{

  $manager_title = $_POST['manager_title'];
  $manager_name = $_POST['manager_name'];
  $manager_lastname = $_POST['manager_lastname'];
  $manager_tel = $_POST['manager_tel'];
  $manager_email = $_POST['manager_email'];
  $manager_position = $_POST['manager_position'];
  $st_date = date('Y-m-d');
  $st = 0;
  $id_university = $_SESSION['university_id'];

  $manager_pic=$_FILES['manager_pic']['tmp_name'];
	$manager_pic_name=$_FILES['manager_pic']['name'];
	$manager_pic_size=$_FILES['manager_pic']['size'];
	$manager_pic_type=$_FILES['manager_pic']['type'];


  $strSQL = "INSERT INTO manager VALUES (null,'$manager_title','$manager_name','$manager_lastname','$manager_tel','$manager_email','$manager_position','$st_date','$st','','$id_university')";
  $objQuery = mysql_query($strSQL);

  if($manager_pic!="")
   {
     $sql2 = "select max(manager_id) from manager";
     $query2 = mysql_query($sql2) or die(mysql_error());
     $r=mysql_fetch_array($query2);
     $id_max=$r[0];
     $ext = strtolower(end(explode('.',$manager_pic_name)));
     $filename = $current_timestamp.'_'.$id_max."manager.".$ext;

     if($objQuery!=false)
     {
       copy($_FILES['manager_pic']['tmp_name'],"filemanager/$filename");
     }
     $strsql2 = "update manager set manager_pic = '$filename' where manager_id = '$id_max'";
     $query3 = mysql_query($strsql2) or die(mysql_error());
     $checkadd = 1;
   }

}
else if($_GET['action']=="save")
{
  $manager_id = $_GET['id'];
  $manager_title = $_POST['manager_title'];
  $manager_name = $_POST['manager_name'];
  $manager_lastname = $_POST['manager_lastname'];
  $manager_tel = $_POST['manager_tel'];
  $manager_email = $_POST['manager_email'];
  $manager_position = $_POST['manager_position'];
  $st_date = date('Y-m-d');
  $st = 0;

  if($_FILES['manager_pic']['name']!=""){
	$manager_pic=$_FILES['manager_pic']['tmp_name'];
    $manager_pic_name=$_FILES['manager_pic']['name'];
    $manager_pic_size=$_FILES['manager_pic']['size'];
    $manager_pic_type=$_FILES['manager_pic']['type']; 

			$ext = strtolower(end(explode('.',$manager_pic_name)));
			$filename = $current_timestamp.'_'.$manager_id."manager.".$ext;

				copy($_FILES['manager_pic']['tmp_name'],"filemanager/$filename");

			$strsql2ed = "update manager set
						manager_pic = '$filename',
						manager_title = '$manager_title',
						manager_name = '$manager_name',
						manager_lastname = '$manager_lastname',
						manager_tel = '$manager_tel',
						manager_email = '$manager_email',
						manager_position = '$manager_position',
						st_date = '$st_date'
						where manager_id = '$manager_id'";
			$query2ed = mysql_query($strsql2ed) or die(mysql_error());


	$checkadd = 1;
	}else{


			$strsql2ed = "update manager set
						manager_title = '$manager_title',
						manager_name = '$manager_name',
						manager_lastname = '$manager_lastname',
						manager_tel = '$manager_tel',
						manager_email = '$manager_email',
						manager_position = '$manager_position',
						st_date = '$st_date'
						where manager_id = '$manager_id'";
			$query2ed = mysql_query($strsql2ed) or die(mysql_error());


	$checkadd = 1;
	}
}

else if($_GET['action']=="delete")
{
  $st = 1;
  $strSQL2 = "UPDATE manager SET st = '$st' where manager_id = '".$_GET['checkdel']."'";
 $objQuery2 = mysql_query($strSQL2);
  $checkadd = 2;

  echo '<SCRIPT language="javascript">

      window.location="home.php?menu=manager";
      </script>';
}

function DateThai($strDate)
{
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));

  $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear";
}
?>


<link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/app.css">

<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">

<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/toggle/switchery.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/selects/select2.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/switch.css">

<link href="sweetalert/sweetalert.css" rel="stylesheet" />
<script src="sweetalert/sweetalert.min.js"></script>

<?php
        $sqlu = "select * from  university where id_university = '".$_SESSION['university_id']."'  ";
        $queryu = mysql_query($sqlu,$conn) or die(mysql_error());
        $arru = mysql_fetch_array($queryu);
?>

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">รายการผู้บริหาร : <?php echo $arru['name_university']; ?></h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
              </li>
              <li class="breadcrumb-item"><a href="home.php?menu=admin">จัดการผู้บริหาร</a>
              </li>

            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body" >
      <!--from manager -->
      <section id="basic-tabs-components">
        <div class="row match-height">

          <div class="col-xl-12 col-lg-12">
            <div class="card">

              <div class="card-content">
                <div class="card-body">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="true">ลงทะเบียน แก้ไข - ผู้บริหาร</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="false">ข้อมูลผู้บริหาร</a>
                    </li>
                  </ul>
                  <div class="tab-content px-1 pt-1">
                  <!--start 1-->

                    <div role="tabpanel" class="tab-pane" id="tab1" aria-expanded="false" aria-labelledby="base-tab1">
                      <h2>ผู้บริหาร : <?php echo $arru['name_university']; ?></h2>
                        <section id="configuration">
                          <div class="row">
                            <div class="col-12">
                              <div class="card">
                                <div class="card-content collapse show">
                                  <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered zero-configuration">
                                      <thead>
                                        <tr>
                                          <th>ลำดับ</th>
                                          <th>รูปภาพ</th>
                                          <th>ชื่อ-นามสกุล</th>
                                          <th>Email</th>
                                          <th>เบอร์โทร</th>
                                          <th>ตำแหน่ง</th>
                                          <th>LastUpdate</th>
                                          <th>จัดการ</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
										$xi = 0;
                                        $sqladmin = "select * from manager where st='0' and id_university='".$_SESSION['university_id']."'
										or ".$_SESSION['university_id']."='0'";
                            $queryadmin = mysql_query($sqladmin,$conn) or die(mysql_error());
                            while($arradmin = mysql_fetch_array($queryadmin))
                            {
                                        $xi++;
										?>
                                        <tr>

                                          <td class="text-center">
                                            <?php  echo $xi; ?>
                                          </td>

                                          <td class="text-center">
                                                <img src="filemanager/<?php  echo $arradmin['manager_pic']; ?>" height="90" width="80" alt="avatar">
                                          </td>

                                          <td>
                                            <?php  echo $arradmin['manager_title']; ?><?php  echo $arradmin['manager_name']; ?>
                                            <?php  echo $arradmin['manager_lastname']; ?>
                                          </td>



                                          <td>
                                            <?php  echo $arradmin['manager_email']; ?>
                                          </td>

                                          <td>
                                            <?php  echo $arradmin['manager_tel']; ?>
                                          </td>

                                          <td class="text-center">
                                            <?php  echo $arradmin['manager_position']; ?><br>
                                            (
                                                        <?php
                                            $sql3 = "select * from  university where id_university = '".$arradmin['id_university']."'  ";
                            $query3 = mysql_query($sql3,$conn) or die(mysql_error());
                            $arr3 = mysql_fetch_array($query3);
                            echo $arr3['subname_university'];
                                            ?>
                                            )
                                          </td>

                                          <td>
                                            <?php


    $strDate=$arradmin['st_date'];
    	echo DateThai($strDate);
    ?>
                                          </td>

                                          <td>
                                            <?php if ($arradmin['st']==1) {
                                              ?>
                                              <p class="text-danger">ยกเลิกใช้งาน</p>
                                              <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <a href="home.php?menu=manager&id=<?php echo $arradmin['manager_id'];?>&action=edit">
                                            <button type="button" class="btn btn-block btn-outline-warning mb-2"><i class="ft-edit"></i> แก้ไข</button>
                                            </a>
                                            <button type="button" class="btn btn-block btn-outline-danger mb-2" disabled  onclick="archiveFunction(<?php echo $arradmin['manager_id'];  ?>)"><i class="ft-trash-2"></i> ลบ</button>

                                           <?php
                                         }
                                         ?>
                                          </td>

                                        </tr>

              <?php } ?>
                                      </tbody>

                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                    </div>

                  <!--end 1-->

                  <?php
				  if($_GET['action']==""){
				  ?>
                  <!-- start 2-->
                  <div class="tab-pane active" id="tab2" aria-labelledby="base-tab2">
                    <center><h2>เพิ่ม ข้อมูลผู้บริหาร-<?php echo $arru['name_university']; ?></h2></center>
                    <section class="input-validation">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-content collapse show">
                              <div class="card-body">
                                <form class="form-horizontal" method="post" action="home.php?menu=manager&action=add" enctype="multipart/form-data" novalidate>

                                  <h4 class="form-section"><i class="ft-user"></i> ข้อมูลส่วนบุคคล</h4>
                                  <div class="row">
                                    <div class="col-lg-2 col-md-4">
                                    <div class="form-group">
                                      <h5>คำนำหน้า
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <select name="manager_title" id="select" required class="select2 form-control">
                                          <option value="">เลือก</option>
											<?php
                                            $sqltitle = "select * from ref_prefix_name";
											$querytitle = mysql_query($sqltitle,$conn) or die(mysql_error());
											while($arrtitle = mysql_fetch_array($querytitle))
											{
											?>
                                            <option value="<?php echo $arrtitle['INITIALS'];?>"><?php echo $arrtitle['FULLNAME'];?></option>
                                            <?php }?>
                                        </select>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-5 col-md-4">
                                      <div class="form-group">
                                        <h5>ชื่อ
                                          <span class="required">*</span>
                                        </h5>
                                        <div class="controls">
                                          <input type="text" name="manager_name" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-5 col-md-4">
                                      <div class="form-group">
                                        <h5>นามสกุล
                                          <span class="required">*</span>
                                        </h5>
                                        <div class="controls">
                                          <input type="text" name="manager_lastname" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                    <div class="row">
                                      <div class="col-lg-3 col-md-4">
                                        <div class="form-group">
                                          <h5>เบอร์โทรศัพท์
                                            <span class="required">*</span>
                                          </h5>
                                          <div class="controls">
                                            <input type="text" name="manager_tel" class="form-control" required data-validation-containsnumber-regex="(\d)+" required data-validation-required-message="กรุณากรอกเฉพาะตัวเลข">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                          <h5>Email
                                          </h5>
                                          <div class="controls">
                                            <input type="email" name="manager_email" class="form-control">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-5 col-md-4">
                                        <div class="form-group">
                                          <h5>ตำแหน่ง
                                            <span class="required">*</span>
                                          </h5>
                                          <div class="controls">
                                            <input type="text" name="manager_position" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  <div class="row">
                                    <div class="col-lg-5 col-md-12">
                                      <div class="form-group">
                                        <h6>รูปผู้บริหาร*สามารถอัปโหลดภายหลังได้* *('png', 'jpg', 'jpeg','gif') [file < 5MB]
                                          <span class="required">*</span>
                                        </h6>
                                        <div class="controls">
                                          <input type="file" name="manager_pic" class="form-control" required>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="text-right">
                                  <?php
                                      //print_r($_SESSION);
                                      if($_SESSION['admin_username'] == 'RUTS') {
                                      ?>
                                    <button type="submit" class="btn btn-success">บันทึก <i class="la la-check-square-o position-right"></i></button>
                                    <button type="reset" class="btn btn-danger">ยกเลิก <i class="ft-x position-right"></i></button>
                                      <?php }?>
                                    <button type="button" class="btn btn-warning" disabled><strong>ระบบได้ปิดการลงทะเบียนแล้ว</strong></button>

                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                  <!--end 2-->
                  <?php
				  }else if($_GET['action']=="edit"){

				  $sqlued = "select * from  manager where manager_id = '".$_GET["id"]."'";
				  $queryued = mysql_query($sqlued,$conn) or die(mysql_error());
				  $arrued = mysql_fetch_array($queryued);
			   	  ?>
                  <!-- start 3-->
                  <div class="tab-pane active" id="tab2" aria-labelledby="base-tab2">
                    <center><h2>แก้ไข ข้อมูลผู้บริหาร-<?php echo $arru['name_university']; ?></h2></center>
                    <section class="input-validation">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-content collapse show">
                              <div class="card-body">
                                <form class="form-horizontal" method="post" action="home.php?menu=manager&action=save&id=<?php echo $arrued['manager_id'];?>" enctype="multipart/form-data" novalidate>

                                  <h4 class="form-section"><i class="ft-user"></i> ข้อมูลส่วนบุคคล</h4>
                                  <div class="row">
                                    <div class="col-lg-2 col-md-4">
                                    <div class="form-group">
                                      <h5>คำนำหน้า
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <select name="manager_title" id="select" required class="select2 form-control">
                                          <option value="<?php echo $arrued['manager_title'];?>"><?php echo $arrued['manager_title'];?></option>
                                          <?php
                                            $sqltitle = "select * from ref_prefix_name";
											$querytitle = mysql_query($sqltitle,$conn) or die(mysql_error());
											while($arrtitle = mysql_fetch_array($querytitle))
											{
											?>
                                            <option value="<?php echo $arrtitle['INITIALS'];?>"><?php echo $arrtitle['FULLNAME'];?></option>
                                            <?php }?>
                                        </select>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-5 col-md-4">
                                      <div class="form-group">
                                        <h5>ชื่อ
                                          <span class="required">*</span>
                                        </h5>
                                        <div class="controls">
                                          <input type="text" name="manager_name" value="<?php echo $arrued['manager_name'];?>" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-5 col-md-4">
                                      <div class="form-group">
                                        <h5>นามสกุล
                                          <span class="required">*</span>
                                        </h5>
                                        <div class="controls">
                                          <input type="text" name="manager_lastname" value="<?php echo $arrued['manager_lastname'];?>" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                    <div class="row">
                                      <div class="col-lg-3 col-md-4">
                                        <div class="form-group">
                                          <h5>เบอร์โทรศัพท์
                                            <span class="required">*</span>
                                          </h5>
                                          <div class="controls">
                                            <input type="text" name="manager_tel" value="<?php echo $arrued['manager_tel'];?>" class="form-control" required data-validation-containsnumber-regex="(\d)+" required data-validation-required-message="กรุณากรอกเฉพาะตัวเลข">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                          <h5>Email
                                          </h5>
                                          <div class="controls">
                                            <input type="email" name="manager_email" value="<?php echo $arrued['manager_email'];?>" class="form-control" >
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-5 col-md-4">
                                        <div class="form-group">
                                          <h5>ตำแหน่ง
                                            <span class="required">*</span>
                                          </h5>
                                          <div class="controls">
                                            <input type="text" name="manager_position" value="<?php echo $arrued['manager_position'];?>" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  <div class="row">
                                    <div class="col-lg-5 col-md-12">
                                      <div class="form-group">
                                        <h6>รูปผู้บริหาร*สามารถอัปโหลดภายหลังได้* *('png', 'jpg', 'jpeg','gif') [file < 5MB]
                                          <span class="required">*</span>
                                        </h6>
                                        <div class="controls">


                                          <?php if($arrued['manager_pic']==""){ ?>
                                            <input type="file" name="manager_pic" id="manager_pic" accept="image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                          <?php }else
                                          {?>
                                              <img src="filemanager/<?php echo $arrued['manager_pic'];?>" height="200" width="170" alt=""/><br/>
                                              <?php
                                              echo $arrued['manager_pic'];
                                              ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                              <a href="home.php?menu=manager&ii=edi&id=<?php echo $_GET["id"]?>&action=edit"><button type="button" class="btn btn-red btn-outline-primary mb-2"></i> ลบ</button></a><?php
                                          }?>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="text-right">
                                  <?php
                                      //print_r($_SESSION);
                                      if($_SESSION['admin_username'] == 'RUTS') {
                                      ?>
                                    <button type="submit" class="btn btn-success">บันทึกการแก้ไข<i class="la la-check-square-o position-right"></i></button>
                                    <?php }?>
                                    <button type="button" class="btn btn-warning" disabled><strong>ระบบได้ปิดการลงทะเบียนแล้ว</strong></button>

                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                  <!--end 3-->
                  <?php
				  }
				  ?>
				  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>




  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>

  <script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>

  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
  <script src="app-assets/js/scripts/tables/datatables/datatable-basic.js"type="text/javascript"></script>

  <script src="app-assets/js/scripts/navs/navs.js" type="text/javascript"></script>

  <script type="text/javascript" src=".app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script src="app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js"type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
 <script src="app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/validation/form-validation.js"type="text/javascript"></script>
  <?php
  if($checkadd=="1")
  {
   ?>
   <script type="text/javascript">
   swal({
   title: "คุณได้เพิ่มข้อมูลนักกีฬาแล้ว?",
   text: "ดำเนินการเสร็จสิ้น",
   type: "success",

   confirmButtonClass: "btn-danger",
   confirmButtonText: "ตกลง!",
   closeOnConfirm: false
  },
  function(){
   window.location.href="home.php?menu=manager";

  });

       </script>
       <?php
  }?>
  <script type="text/javascript">

  function archiveFunction(id) {
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
  function(isConfirm){
  if (isConfirm) {
    window.location.href="home.php?menu=manager&action=delete&checkdel="+id;

  } else {
    swal("ยกเลิก", "คุณได้ยกเลิกข้อมูลแล้ว:)", "error");
  }
  });
  }



  </script>
