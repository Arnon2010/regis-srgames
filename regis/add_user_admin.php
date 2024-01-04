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
else if($_SESSION['admin_type_id']!="4")
{
	header("location: index.php");
 	exit(0);
}
else {
  if($_GET['action']=="add")
  {
    $name_user_admin = $_POST['name_user_admin'];
    $username_user_admin = $_POST['username_user_admin'];
    $password_user_admin = md5(md5(md5($_POST['password_user_admin'])));
    $id_Type_admin = $_POST['id_Type_admin'];
    $id_university = $_POST['id_university'];
    $phone_User_admin = $_POST['phone_User_admin'];
    $email_User_admin = $_POST['email_User_admin'];
    $st_User_admin = 0;
    $st = 0;
    $strSQL = "INSERT INTO user_admin VALUES (null,'$name_user_admin','$username_user_admin','$password_user_admin','$id_Type_admin','$id_university','$phone_User_admin','$email_User_admin','$st_User_admin','$st')";
		$objQuery = mysql_query($strSQL);
    $password_user_admin2=$_POST['password_user_admin'];
    $arrsport_type = mysql_fetch_array(mysql_query("SELECT * FROM university WHERE id_university = '$id_university'"));
    $sportname = $arrsport_type['name_university'];

    // date_default_timezone_set('Asia/Bangkok');
    // require 'PHPMailer/PHPMailerAutoload.php';
    // $name2=$arr2['name_university'];
    // //Create a new PHPMailer instance
    // $mail = new PHPMailer;
    // //Tell PHPMailer to use SMTP
    // $mail->isSMTP();
    // //Enable SMTP debugging
    // // 0 = off (for production use)
    // // 1 = client messages
    // // 2 = client and server messages
    // $mail->SMTPDebug = 0;
    // //Ask for HTML-friendly debug output
    // $mail->Debugoutput = 'html';
    // //Set the hostname of the mail server
    // $mail->Host = "smtp.gmail.com";
    // //Set the SMTP port number - likely to be 25, 465 or 587
    // $mail->Port = 587;
    // //Set the encryption system to use - ssl (deprecated) or tls
    // $mail->SMTPSecure = 'tls';
    // //Whether to use SMTP authentication
    // $mail->SMTPAuth = true;
    // //Username to use for SMTP authentication..........................................................
    // $mail->Username = "";
    // //Password to use for SMTP authentication.........................................................
    // $mail->Password = "";
    // //Set who the message is to be sent from
    // $mail->setFrom('info_arit@rmutto.ac.th', 'Tawan-ok GAME');
    // //Set who the message is to be sent to
    // $mail->addAddress($email_User_admin, 'arit-rmutto');
    // //Set the subject line
    // $mail->Subject = 'ระบบจัดการงานกีฬาตะวันออกเกมส์';

    // $mail->CharSet = "utf-8";
    // //Read an HTML message body from an external file, convert referenced images to embedded,
    // //convert HTML into a basic plain-text alternative body
    // //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
    // $mail->msgHTML("ระบบแจ้งข้อความ อัตโนมัติ<br>
    // ผู้ดูและระบบงานกีฬาของ:$name2  ได้เพิ่มท่านเป็นผู้จัดการชนิดกีฬาแล้ว <br>
    // <br>
    // ชนิดกีฬา:$sportname
    // <br>
    // ชื่อผู้ใช้งาน:$username_user_admin
    // <br>
    // รหัสผ่าน:$password_user_admin2
    // <br>
    // <br>
    // ท่านสามารถใช้ ชื่อผู้ใช้งาน และ รหัสผ่านเข้าสู่ระบบเพื่อเพิ่มข้อมูลนักกีฬาและจัดการชนิดกีฬาของท่าน
    // http://twokg.rmutto.ac.th/
    // <br>
    // สอบถามรายละเอียดเพิ่มเติมได้ที่:
    // <br>
    // มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก
    // <br>
    // เบอโทรศัพท์ติดต่อ :0-3835-8201 ต่อ 8313
    // <br>
    // info_arit@rmutto.ac.th
    // <br>");

    // //send the message, check for errors
    // if (!$mail->send()) {
    //     echo "Mailer Error: " . $mail->ErrorInfo;
    // } else {
    // 	$checkadd = 1;
    // 	}

  }
  else if($_GET['action']=="delect")
  {
    $st = 1;
    $strSQL2 = "UPDATE user_admin SET st = '$st' where id_user_admin = '".$_GET['checkdel']."'";
  	$objQuery2 = mysql_query($strSQL2);
    $checkadd = 2;

    echo '<SCRIPT language="javascript">

        window.location="home.php?menu=admin";
        </script>';
  }

}
?>
 <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">

  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/pages/users.css">

  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">

  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- END Custom CSS-->
  <link href="sweetalert/sweetalert.css" rel="stylesheet" />
<script src="sweetalert/sweetalert.min.js"></script>

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">จัดการผู้ดูแลระบบ</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
                </li>
                <li class="breadcrumb-item"><a href="home.php?menu=admin">จัดการผู้ดูแลระบบ</a>
                </li>

              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">

        </div>
      </div>
      <div class="content-detached content-right">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title">ผู้ดูแลระบบทั้งหมด</h4>
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

                            <th>ชื่อผู้ดูแลระบบ</th>
                            <th>Email</th>
							<th>เบอร์โทรศัพท์</th>
                            <th>หน่วยงาน</th>
                            <th>ประเภทผู้ใช้ </th>
                            <th>จัดการ</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php
								$sqladmin = "select * from user_admin where id_user_admin != '1'";
$queryadmin = mysql_query($sqladmin,$conn) or die(mysql_error());
while($arradmin = mysql_fetch_array($queryadmin))
{
								?>
                          <tr>

                            <td>
                              <div class="media">
                                <div class="media-left pr-1">
                                  <span class="avatar avatar-sm avatar-<?php if ($arradmin['st']==0) {
                                    echo "online";
                                  }else{
                                    echo "busy";
                                  } ?> rounded-circle">
                                    <img src="app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
                                </div>
                                <div class="media-body media-middle">
                                  <a href="#" class="media-heading"><?php  echo $arradmin['name_user_admin']; ?></a>
                                </div>
                              </div>
                            </td>
                            <td class="text-center">
                              <a href="mailto:email@example.com"><?php  echo $arradmin['email_User_admin']; ?></a>
                            </td>
							 <td class="text-center">
                             <?php  echo $arradmin['phone_User_admin']; ?>
                            </td>
                            <td>	<?php
								$sql3 = "select * from  university where id_university = '".$arradmin['id_university']."'  ";
$query3 = mysql_query($sql3,$conn) or die(mysql_error());
$arr3 = mysql_fetch_array($query3);
echo $arr3['name_university'];
								?></td>
                            <td class="text-center"><?php
								$sql2 = "select * from type_admin where id_Type_admin='".$arradmin['id_Type_admin']."' ";
$query2 = mysql_query($sql2,$conn) or die(mysql_error());
$arr2 = mysql_fetch_array($query2);
echo $arr2['name_Type_admin'];

								?></td>
                            <td>
                              <?php if ($arradmin['st']==1) {
                                ?>
                                <p class="text-danger">ยกเลิกใช้งาน</p
                                <?php
                              }
                              else
                              {
                              ?>

                              <button type="button" class="btn btn-block btn-outline-primary mb-2"  onclick="archiveFunction(<?php echo $arradmin['id_user_admin'];  ?>)"><i class="ft-trash-2"></i> ลบ</button>

                             <?php
                           }
                           ?>
      </td>
                          </tr>

<?php } ?>

                        </tbody>
                        <tfoot>
                          <tr>

                            <th>ชื่อผู้ดูแลระบบ</th>
                            <th>Email</th>
							<th>เบอร์โทรศัพท์</th>
                            <th>หน่วยงาน</th>
                            <th>ประเภทผู้ใช้ </th>
                            <th>จัดการ</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
      <div class="sidebar-detached sidebar-left" ,=",">
	   <div  class="sidebar">
          <div class="bug-list-sidebar-content">
        <div class="card">
                <div class="card-header">
                  <h4 class="card-title">เพิ่มผู้ดูแลระบบ</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form class="form-horizontal" method="post" action="home.php?menu=admin&action=add" novalidate>
                      <div class="row">
                        <div class="col-lg-12 col-md-12">
                          <div class="form-group">
                            <h5>ชื่อ-สกุล ผู้ใช้งาน
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                              <input type="text" name="name_user_admin" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                            </div>
                          </div>
                          <div class="form-group">
                            <h5>UserName
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                              <input type="text" name="username_user_admin" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                            </div>
                          </div>
                          <div class="form-group">
                            <h5>Password Input Field
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                              <input type="password" name="password_user_admin" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                            </div>
                          </div>
                          <div class="form-group">
                            <h5>เบอร์โทรศัพท์
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                              <input type="text" name="phone_User_admin" class="form-control" required data-validation-containsnumber-regex="(\d)+"
                              data-validation-containsnumber-message="กรุณากรอกเฉพาะตัวเลข">
                            </div>
                          </div>
                          <div class="form-group">
                            <h5>Email Address
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                              <input type="text" name="email_User_admin" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})"
                              data-validation-regex-message="รูปแบบข้อมูลไม่ถูกต้อง">
                            </div>
                          </div>
                          <div class="form-group">
                            <h5>ประเภทผู้ใช้
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                              <select name="id_Type_admin" id="select" required class="form-control">
                                <option value="">-- กรุณาเลือก --</option>
								<?php
								$sql2 = "select * from type_admin  ";
$query2 = mysql_query($sql2,$conn) or die(mysql_error());
while($arr2 = mysql_fetch_array($query2))
{
								?>
                                <option value="<?php echo $arr2['id_Type_admin']; ?>"><?php echo $arr2['name_Type_admin']; ?></option>
<?php }?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <h5>สังกัด
                              <span class="required">*</span>
                            </h5>
                            <div class="controls">
                              <select name="id_university" id="select" required class="form-control">
                                <option value="">-- กรุณาเลือก --</option>
								<?php
								$sql3 = "select * from  university  ";
$query3 = mysql_query($sql3,$conn) or die(mysql_error());
while($arr3 = mysql_fetch_array($query3))
{
								?>
                                <option value="<?php echo $arr3['id_university']; ?>"><?php echo $arr3['name_university']; ?></option>
                               <?php }?>
                              </select>
                            </div>
                          </div>
                          <div class="text-right">
                            <button type="submit" class="btn btn-success">บันทึกข้อมูล<i class="la la-thumbs-o-up position-right"></i></button>
                            <button type="reset" class="btn btn-danger">ยกเลิกข้อมูล<i class="la la-refresh position-right"></i></button>

                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
			  </div>
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
  <script src="app-assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>


  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
  <script src="app-assets/js/scripts/pages/users-contacts.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/validation/form-validation.js"
  type="text/javascript"></script>

  <!-- END PAGE LEVEL JS-->
<?php
if($checkadd=="1")
{
  ?>
  <script type="text/javascript">
  swal({
  title: "คุณได้เพิ่มข้อมูลผู้ดูแลระบบแล้ว?",
  text: "ดำเนินการเสร็จสิ้น",
  type: "success",

  confirmButtonClass: "btn-danger",
  confirmButtonText: "ตกลง!",
  closeOnConfirm: false
},
function(){
  window.location.href="home.php?menu=admin";
  swal("Deleted!", "Your imaginary file has been deleted.", "success");
});

			</script>
      <?php
}

?>
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
  window.location.href="home.php?menu=admin&action=delect&checkdel="+id;

} else {
  swal("ยกเลิก", "คุณได้ยกเลิกข้อมูลแล้ว:)", "error");
}
});
}



</script>
