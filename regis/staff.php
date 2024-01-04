<?php
ob_start();
session_start();
include("connect_db.php");
if($_SESSION['admin_id']=="")
{
	header("location: index.php");
 	exit(0);
}

$current_timestamp = time();

$checkadd = 0;
 if($_GET['ii']=="edi")
  {
	$sqlued1 = "select * from  staff where staff_id = '".$_GET["id"]."'";
    $queryued1 = mysql_query($sqlued1,$conn) or die(mysql_error());
    $arrued1 = mysql_fetch_array($queryued1);
	$nameed1 = $arrued1['staff_pic'];

    $strsqled = "update staff set staff_pic = '' where staff_id = '".$_GET["id"]."'";
	$objQueryed = mysql_query($strsqled) or die(mysql_error());
	$delete="filestaff/$nameed1"; //ใช้ในการทดสอบ
	unlink($delete);
  }
if($_GET['action']=="add")
{

  $staff_title = $_POST['staff_title'];
  $staff_name = $_POST['staff_name'];
  $staff_lastname	 = $_POST['staff_lastname'];
  $staff_tel = $_POST['staff_tel'];
  $staff_email = $_POST['staff_email'];
  $staff_cposition = $_POST['staff_cposition'];
  $staff_csport = $_POST['staff_csport'];
  $staff_cplayer = $_POST['staff_cplayer'];
  $staff_update = date('Y-m-d');
  $staff_st = 0;
  $id_university = $_SESSION['university_id'];

  $staff_pic=$_FILES['staff_pic']['tmp_name'];
	$staff_pic_name=$_FILES['staff_pic']['name'];
	$staff_pic_size=$_FILES['staff_pic']['size'];
	$staff_pic_type=$_FILES['staff_pic']['type'];

  


  $strSQL = "INSERT INTO staff VALUES (null,'$staff_title','$staff_name','$staff_lastname','$staff_tel','$staff_email','$staff_cposition','$staff_csport','$staff_cplayer','$staff_update','$staff_st','$id_university','')";
  $objQuery = mysql_query($strSQL);

  if($staff_pic!="")
   {
     $sql2 = "select max(staff_id) from staff";
     $query2 = mysql_query($sql2) or die(mysql_error());
     $r=mysql_fetch_array($query2);
     $id_max=$r[0];
     $ext = strtolower(end(explode('.',$staff_pic_name)));
     $filename = $current_timestamp.'_'.$id_max."staff.".$ext;

     if($objQuery!=false)
     {
       copy($_FILES['staff_pic']['tmp_name'],"filestaff/$filename");
     }
     $strsql2 = "update staff set staff_pic = '$filename' where staff_id = '$id_max'";
     $query3 = mysql_query($strsql2) or die(mysql_error());
     $checkadd = 1;
   }

}
else if($_GET['action']=="save")
{
  $staff_id = $_GET['id'];
  $staff_title = $_POST['staff_title'];
  $staff_name = $_POST['staff_name'];
  $staff_lastname = $_POST['staff_lastname'];
  $staff_tel = $_POST['staff_tel'];
  $staff_email = $_POST['staff_email'];
  $staff_cposition = $_POST['staff_cposition'];
  $staff_csport = $_POST['staff_csport'];
  $staff_cplayer = $_POST['staff_cplayer'];
  $staff_update = date('Y-m-d');
  $staff_st = 0;

  if($_FILES['staff_pic']['name']!=""){

	$staff_pic=$_FILES['staff_pic']['tmp_name'];
  $staff_pic_name=$_FILES['staff_pic']['name'];
  $staff_pic_size=$_FILES['staff_pic']['size'];
  $staff_pic_type=$_FILES['staff_pic']['type'];

			$ext = strtolower(end(explode('.',$staff_pic_name)));
			$filename = $current_timestamp.'_'.$staff_id."staff.".$ext;

				copy($_FILES['staff_pic']['tmp_name'],"filestaff/$filename");

			$strsql2ed = "update staff set
						staff_pic = '$filename',
						staff_title = '$staff_title',
						staff_name = '$staff_name',
						staff_lastname = '$staff_lastname',
						staff_tel = '$staff_tel',
						staff_email = '$staff_email',
						staff_cposition = '$staff_cposition',
            staff_csport = '$staff_csport',
            staff_cplayer = '$staff_cplayer',
						staff_update = '$staff_update'
						where staff_id = '$staff_id'";
			$query2ed = mysql_query($strsql2ed) or die(mysql_error());


	$checkadd = 1;
	}else{

			$strsql2ed = "update staff set
            staff_title = '$staff_title',
            staff_name = '$staff_name',
            staff_lastname = '$staff_lastname',
            staff_tel = '$staff_tel',
            staff_email = '$staff_email',
            staff_cposition = '$staff_cposition',
            staff_csport = '$staff_csport',
            staff_cplayer = '$staff_cplayer',
            staff_update = '$staff_update'
            where staff_id = '$staff_id'";
			$query2ed = mysql_query($strsql2ed) or die(mysql_error());


	$checkadd = 1;
	}
}

else if($_GET['action']=="delete")
{
  $staff_st = 1;
  $strSQL2 = "UPDATE staff SET staff_st = '$staff_st' where staff_id = '".$_GET['checkdel']."'";
  $objQuery2 = mysql_query($strSQL2);
  $checkadd = 2;

  echo '<SCRIPT language="javascript">

      window.location="home.php?menu=staff";
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
        <h3 class="content-header-title">รายการเจ้าหน้าที่ทีม : <?php echo $arru['name_university']; ?></h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
              </li>
              <li class="breadcrumb-item"><a href="home.php?menu=admin">จัดการเจ้าหน้าที่</a>
              </li>

            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body" >
      <!--from staff -->
      <section id="basic-tabs-components">
        <div class="row match-height">

          <div class="col-xl-12 col-lg-12">
            <div class="card">

              <div class="card-content">
                <div class="card-body">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="true">ลงทะเบียน แก้ไข - เจ้าหน้าที่</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="false">ข้อมูลเจ้าหน้าที่</a>
                    </li>
                  </ul>
                  <div class="tab-content px-1 pt-1">
                  <!--start 1-->

                    <div role="tabpanel" class="tab-pane" id="tab1" aria-expanded="false" aria-labelledby="base-tab1">
                      <h2>เจ้าหน้าที่ : <?php echo $arru['name_university']; ?></h2>
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
                                          <th>ตำแหน่ง (ดูแลกีฬา/นักกีฬา)</th>
                                          <th>LastUpdate</th>
                                          <th>จัดการ</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
										$xi = 0;
                                        $sqladmin = "select * from staff where staff_st='0' and id_university='".$_SESSION['university_id']."'
										or '".$_SESSION['university_id']."'='0'";
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
                                                <img src="filestaff/<?php  echo $arradmin['staff_pic']; ?>" height="90" width="80" alt="avatar">
                                          </td>

                                          <td class="text-center">
                                            <?php  echo $arradmin['staff_title']; ?><?php  echo $arradmin['staff_name']; ?>
                                            <?php  echo $arradmin['staff_lastname']; ?>
                                          </td>



                                          <td class="text-center">
                                            <?php  echo $arradmin['staff_email']; ?>
                                          </td>

                                          <td class="text-center">
                                            <?php  echo $arradmin['staff_tel']; ?>
                                          </td>

                                          <td class="text-center">
                                            <?php  echo $arradmin['staff_cposition']; ?><br>
                                            (<?php
                								$sql3 = "select * from  sport_type where id_Sport_type = '".$arradmin['staff_csport']."'  ";
                $query3 = mysql_query($sql3,$conn) or die(mysql_error());
                $arr3 = mysql_fetch_array($query3);
                echo $arr3['name_Sport_type'];
                								?>/<?php  echo $arradmin['staff_cplayer']; ?>)<br>
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
                                            $strDate=$arradmin['staff_update'];
                                            	echo DateThai($strDate);
                                            ?>
                                          </td>

                                          <td>
                                            <?php if ($arradmin['staff_st']==1) {
                                              ?>
                                              <p class="text-danger">ยกเลิกใช้งาน</p>
                                              <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <a href="home.php?menu=staff&id=<?php echo $arradmin['staff_id'];?>&action=edit">
                                            <button type="button" disabled class="btn btn-block btn-outline-warning mb-2"><i class="ft-edit"></i> แก้ไข</button>
                                            </a>
                                            <button type="button" disabled class="btn btn-block btn-outline-danger mb-2"  onclick="archiveFunction(<?php echo $arradmin['staff_id'];  ?>)"><i class="ft-trash-2"></i> ลบ</button>

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
                    <center><h2>เพิ่ม ข้อมูลเจ้าหน้าที่-<?php echo $arru['name_university']; ?></h2></center>
                    <section class="input-validation">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-content collapse show">
                              <div class="card-body">
                                <form class="form-horizontal" method="post" action="home.php?menu=staff&action=add" enctype="multipart/form-data" novalidate>

                                  <h4 class="form-section"><i class="ft-user"></i> ข้อมูลส่วนบุคคล</h4>
                                  <div class="row">
                                    <div class="col-lg-2 col-md-4">
                                    <div class="form-group">
                                      <h5>คำนำหน้า
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <select name="staff_title" id="select" required class="select2 form-control">
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
                                          <input type="text" name="staff_name" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-5 col-md-4">
                                      <div class="form-group">
                                        <h5>นามสกุล
                                          <span class="required">*</span>
                                        </h5>
                                        <div class="controls">
                                          <input type="text" name="staff_lastname" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                    <div class="row">
                                      <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                          <h5>เบอร์โทรศัพท์
                                            <span class="required">*</span>
                                          </h5>
                                          <div class="controls">
                                            <input type="text" name="staff_tel" class="form-control" required data-validation-containsnumber-regex="(\d)+" required data-validation-required-message="กรุณากรอกเฉพาะตัวเลข">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                          <h5>Email
                                          </h5>
                                          <div class="controls">
                                            <input type="email" name="staff_email" class="form-control">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  <div class="row">
                                    <div class="col-lg-5 col-md-12">
                                      <div class="form-group">
                                        <h6>รูปเจ้าหน้าที่*สามารถอัปโหลดภายหลังได้* *('png', 'jpg', 'jpeg','gif')
                                          <span class="required">*</span>
                                        </h6>
                                        <div class="controls">
                                          <input type="file" name="staff_pic" class="form-control" required>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <h4 class="form-section"><i class="la la-soccer-ball-o"></i> ประเภทกีฬาที่จะทำการดูแล</h4>
                                  <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                      <h5>ระบุตำแหน่งดูแลกีฬา
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <select name="staff_cposition" id="select" required class="form-control">
                                          <option value="">-- กรุณาเลือก --</option>
                                          <option value="ผู้จัดการทีม">ผู้จัดการทีม</option>
                                          <option value="ผู้ช่วยผู้จัดการทีม">ผู้ช่วยผู้จัดการทีม</option>
                                          <option value="ผู้ฝึกสอน">ผู้ฝึกสอน</option>
                                          <option value="ผู้ช่วยผู้ฝึกสอน">ผู้ช่วยผู้ฝึกสอน</option>
                                        </select>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                      <h5>ดูแลกีฬา
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <select name="staff_csport" id="select" required class="form-control">
                                          <option value="">-- กรุณาเลือก --</option>
          								<?php
          								$sql3 = "select * from  sport_type  ";
          $query3 = mysql_query($sql3,$conn) or die(mysql_error());
          while($arr3 = mysql_fetch_array($query3))
          {
          								?>
                                          <option value="<?php echo $arr3['id_Sport_type']; ?>"><?php echo $arr3['name_Sport_type']; ?></option>
                                         <?php }?>
                                        </select>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                      <h5>ดูแลนักกีฬา
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <select name="staff_cplayer" id="select" required class="form-control">
                                          <option value="">-- กรุณาเลือก --</option>
                                          <option value="ทีมชาย">ทีมชาย</option>
                                          <option value="ทีมหญิง">ทีมหญิง</option>
                                          <option value="ทีมชายและทีมหญิง">ทีมชายและทีมหญิง</option>
                                        </select>
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

				  $sqlued = "select * from  staff where staff_id = '".$_GET["id"]."'";
				  $queryued = mysql_query($sqlued,$conn) or die(mysql_error());
				  $arrued = mysql_fetch_array($queryued);
			   	  ?>
                  <!-- start 3-->
                  <div class="tab-pane active" id="tab2" aria-labelledby="base-tab2">
                    <center><h2>แก้ไข ข้อมูลเจ้าหน้าที่-<?php echo $arru['name_university']; ?></h2></center>
                    <section class="input-validation">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-content collapse show">
                              <div class="card-body">
                                <form class="form-horizontal" method="post" action="home.php?menu=staff&action=save&id=<?php echo $arrued['staff_id'];?>" enctype="multipart/form-data" novalidate>

                                  <h4 class="form-section"><i class="ft-user"></i> ข้อมูลส่วนบุคคล</h4>
                                  <div class="row">
                                    <div class="col-lg-2 col-md-4">
                                    <div class="form-group">
                                      <h5>คำนำหน้า
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <select name="staff_title" id="select" required class="select2 form-control">
                                          <?php
                                            $sqltitle = "select * from ref_prefix_name";
											$querytitle = mysql_query($sqltitle,$conn) or die(mysql_error());
											while($arrtitle = mysql_fetch_array($querytitle))
											{
											?>
                                            <option value="<?php echo $arrtitle['INITIALS'];?>"<?php if($arrued['staff_title']==$arrtitle['INITIALS']) {?>selected<?php }?>><?php echo $arrtitle['FULLNAME'];?></option>
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
                                          <input type="text" name="staff_name" value="<?php echo $arrued['staff_name'];?>" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-5 col-md-4">
                                      <div class="form-group">
                                        <h5>นามสกุล
                                          <span class="required">*</span>
                                        </h5>
                                        <div class="controls">
                                          <input type="text" name="staff_lastname" value="<?php echo $arrued['staff_lastname'];?>" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                    <div class="row">
                                      <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                          <h5>เบอร์โทรศัพท์
                                            <span class="required">*</span>
                                          </h5>
                                          <div class="controls">
                                            <input type="text" name="staff_tel" value="<?php echo $arrued['staff_tel'];?>" class="form-control" required data-validation-containsnumber-regex="(\d)+" required data-validation-required-message="กรุณากรอกเฉพาะตัวเลข">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                          <h5>Email
                                          </h5>
                                          <div class="controls">
                                            <input type="email" name="staff_email" value="<?php echo $arrued['staff_email'];?>" class="form-control">
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  <div class="row">
                                    <div class="col-lg-5 col-md-12">
                                      <div class="form-group">
                                        <h6>รูปเจ้าหน้าที่*สามารถอัปโหลดภายหลังได้* *('png', 'jpg', 'jpeg','gif')
                                          <span class="required">*</span>
                                        </h6>
                                        <div class="controls">


                                          <?php if($arrued['staff_pic']==""){ ?>
                                            <input type="file" name="staff_pic" id="staff_pic" accept="image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                          <?php }else
                                          {?>
                                              <img src="filestaff/<?php echo $arrued['staff_pic'];?>" height="200" width="170" alt=""/><br/>
                                              <?php
                                              echo $arrued['staff_pic'];
                                              ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                              <a href="home.php?menu=staff&ii=edi&id=<?php echo $_GET["id"]?>&action=edit"><button type="button" class="btn btn-red btn-outline-primary mb-2"></i> ลบ</button></a><?php
                                          }?>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <h4 class="form-section"><i class="la la-soccer-ball-o"></i> ประเภทกีฬาที่จะทำการดูแล</h4>
                                  <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                      <h5>ระบุตำแหน่งดูแลกีฬา
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <select name="staff_cposition" id="select" required class="form-control">
                                          <option value="ผู้จัดการทีม" <?php if($arrued['staff_cposition']=="ผู้จัดการทีม") {?>selected<?php }?>>ผู้จัดการทีม</option>
                                          <option value="ผู้ช่วยผู้จัดการทีม" <?php if($arrued['staff_cposition']=="ผู้ช่วยผู้จัดการทีม") {?>selected<?php }?>>ผู้ช่วยผู้จัดการทีม</option>
                                          <option value="ผู้ฝึกสอน" <?php if($arrued['staff_cposition']=="ผู้ฝึกสอน") {?>selected<?php }?>>ผู้ฝึกสอน</option>
                                          <option value="ผู้ช่วยผู้ฝึกสอน" <?php if($arrued['staff_cposition']=="ผู้ช่วยผู้ฝึกสอน") {?>selected<?php }?>>ผู้ช่วยผู้ฝึกสอน</option>
                                        </select>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                      <h5>ดูแลกีฬา
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <select name="staff_csport" id="select" required class="form-control">

          								<?php
          								$sql3 = "select * from  sport_type  ";
          $query3 = mysql_query($sql3,$conn) or die(mysql_error());
          while($arr3 = mysql_fetch_array($query3))
          {
          								?>
                                          <option value="<?php echo $arr3['id_Sport_type']; ?>"<?php if($arr3['id_Sport_type']==$arrued['staff_csport']) {?>selected<?php }?>><?php echo $arr3['name_Sport_type']; ?></option>
                                         <?php }?>
                                        </select>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                      <h5>ดูแลนักกีฬา
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <select name="staff_cplayer" id="select" required class="form-control">
                                          <option value="ทีมชาย"<?php if($arrued['staff_cplayer']=="ทีมชาย") {?>selected<?php }?>>ทีมชาย</option>
                                          <option value="ทีมหญิง"<?php if($arrued['staff_cplayer']=="ทีมหญิง") {?>selected<?php }?>>ทีมหญิง</option>
                                          <option value="ทีมชายและทีมหญิง"<?php if($arrued['staff_cplayer']=="ทีมชายและทีมหญิง") {?>selected<?php }?>>ทีมชายและทีมหญิง</option>
                                        </select>
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
   title: "คุณได้เพิ่มข้อมูลเจ้าหน้าที่แล้ว?",
   text: "ดำเนินการเสร็จสิ้น",
   type: "success",

   confirmButtonClass: "btn-danger",
   confirmButtonText: "ตกลง!",
   closeOnConfirm: false
  },
  function(){
   window.location.href="home.php?menu=staff";

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
    window.location.href="home.php?menu=staff&action=delete&checkdel="+id;

  } else {
    swal("ยกเลิก", "คุณได้ยกเลิกข้อมูลแล้ว:)", "error");
  }
  });
  }



  </script>
