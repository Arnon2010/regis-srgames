 <?php
ob_start();
session_start();
include("connect_db.php");
$checkadd = 0;

if($_SESSION['admin_id']=="" and $_SESSION['admin_type_id']!='0' )
{
	header("location: index.php");
 	exit(0);
}
else {
  if($_GET['action']=="edit1")
  {
	$sqlued = "select * from  student_sports where CITIZEN_ID = '".$_GET["id"]."'";
    $queryued = mysql_query($sqlued,$conn) or die(mysql_error());
    $arrued = mysql_fetch_array($queryued);
	$nameed = $arrued['pic_student'];

    $strsqled = "update student_sports set pic_student = '' where CITIZEN_ID = '".$_GET["id"]."'";
	$objQueryed = mysql_query($strsqled) or die(mysql_error());
	$delete="filesutdent/$nameed"; //ใช้ในการทดสอบ
	unlink($delete);
  }
  else if($_GET['action']=="edit2")
  {
	$sqlued = "select * from  student_sports where CITIZEN_ID = '".$_GET["id"]."'";
    $queryued = mysql_query($sqlued,$conn) or die(mysql_error());
    $arrued = mysql_fetch_array($queryued);
	$nameed = $arrued['evidence'];

    $strsqled = "update student_sports set evidence = '' where CITIZEN_ID = '".$_GET["id"]."'";
	$objQueryed = mysql_query($strsqled) or die(mysql_error());
	$delete="filesutdent/$nameed"; //ใช้ในการทดสอบ
	unlink($delete);
  }
  else if($_GET['action']=="edit3")
  {
	$sqlued = "select * from  student_sports where CITIZEN_ID = '".$_GET["id"]."'";
    $queryued = mysql_query($sqlued,$conn) or die(mysql_error());
    $arrued = mysql_fetch_array($queryued);
	$nameed = $arrued['pic_cardstudent'];

    $strsqled = "update student_sports set pic_cardstudent = '' where CITIZEN_ID = '".$_GET["id"]."'";
	$objQueryed = mysql_query($strsqled) or die(mysql_error());
	$delete="filesutdent/$nameed"; //ใช้ในการทดสอบ
	unlink($delete);
  }
  else if($_GET['action']=="edit4")
  {
	$sqlued = "select * from  student_sports where CITIZEN_ID = '".$_GET["id"]."'";
    $queryued = mysql_query($sqlued,$conn) or die(mysql_error());
    $arrued = mysql_fetch_array($queryued);
	$nameed = $arrued['pic_card'];

    $strsqled = "update student_sports set pic_card = '' where CITIZEN_ID = '".$_GET["id"]."'";
	$objQueryed = mysql_query($strsqled) or die(mysql_error());
	$delete="filesutdent/$nameed"; //ใช้ในการทดสอบ
	unlink($delete);
  }
  else if($_GET['action']=="edit5")
  {
	$sqlued = "select * from  student_sports where CITIZEN_ID = '".$_GET["id"]."'";
    $queryued = mysql_query($sqlued,$conn) or die(mysql_error());
    $arrued = mysql_fetch_array($queryued);
	$nameed = $arrued['evidence1'];

    $strsqled = "update student_sports set evidence1 = '' where CITIZEN_ID = '".$_GET["id"]."'";
	$objQueryed = mysql_query($strsqled) or die(mysql_error());
	$delete="filesutdent/$nameed"; //ใช้ในการทดสอบ
	unlink($delete);
  }
  else if($_GET['action']=="delect")
  {
	$sqlued = "select * from  student_sports where id_student = '".$_GET["id_student"]."'";
    $queryued = mysql_query($sqlued,$conn) or die(mysql_error());
    $arrued = mysql_fetch_array($queryued);
	$nameed1 = $arrued['pic_student'];
	$nameed2 = $arrued['pic_cardstudent'];
	$nameed3 = $arrued['pic_card'];
	$nameed4 = $arrued['evidence'];
	$delete1="filesutdent/$nameed1";
	unlink($delete1);
	$delete2="filesutdent/$nameed2";
	unlink($delete2);
	$delete3="filesutdent/$nameed3";
	unlink($delete3);
	$delete4="filesutdent/$nameed4";
	unlink($delete4);

	$strSQL2del = "DELETE FROM student_sports where id_student = '".$_GET['checkdel']."'";
  	$objQuery2del = mysql_query($strSQL2del);


  }

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

<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/switch.css">

  <link href="sweetalert/sweetalert.css" rel="stylesheet" />
<script src="sweetalert/sweetalert.min.js"></script>

  <style type="text/css">
  .textred {
	color: #F00;
}
  </style>
  <script type="text/javascript" src="ajax.js" ></script>

  <script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () {
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                       }
                  }
             };
             req.open("GET", "localtion.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('province', -1);
    </script>
 <script language="JavaScript">
var HttPRequest = false;
function CallPOSTRequest(url,parameters) {
HttPRequest = false;
if (window.XMLHttpRequest) { // Mozilla, Safari,...
HttPRequest = new XMLHttpRequest();
if (HttPRequest.overrideMimeType) {
HttPRequest.overrideMimeType('text/html');
}
} else if (window.ActiveXObject) { // IE
try {
HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {}
}
}

if (!HttPRequest) {
alert('Cannot create XMLHTTP instance');
return false;
}


HttPRequest.onreadystatechange = alertContener;
HttPRequest.open('POST', url, true);
HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
HttPRequest.setRequestHeader("Content-length", parameters.length);
HttPRequest.setRequestHeader("Connection", "close");
HttPRequest.send(parameters);
}

function alertContener() {
if (HttPRequest.readyState == 4) {
if (HttPRequest.status == 200) {
result = HttPRequest.responseText;
document.getElementById('myspan').innerHTML = result;

} else {
//alert('There was a problem with the request.');

result = HttPRequest.responseText;
document.getElementById('myspan').innerHTML = result;

}
}
}


function SubmitContent(value) {
document.getElementById('myspan').style.visibility = 'hidden';
document.getElementById('myspan').style.visibility = 'visible';

var poststr = "User=" + encodeURI(document.getElementById('CITIZEN_ID').value);
CallPOSTRequest('ajax2.php',poststr);

}

</script>
<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}
</script>
<script type="text/javascript">
function Numbers(e){
	var keynum;
	var keychar;
	var numcheck;
	if(window.event) {// IE
	  keynum = e.keyCode;
	}
	else if(e.which) {// Netscape/Firefox/Opera
	  keynum = e.which;
	}
	if(keynum == 13 || keynum == 8 || typeof(keynum) == "undefined"){
			return true;
	}
	keychar= String.fromCharCode(keynum);
	numcheck = /^[0-9]$/;
	return numcheck.test(keychar);
}

function keyup(obj,e){
	var keynum;
	var keychar;
    var id = '';
	if(window.event) {// IE
	  keynum = e.keyCode;
	}
	else if(e.which) {// Netscape/Firefox/Opera
	  keynum = e.which;
	}
	keychar= String.fromCharCode(keynum);

	var tagInput = document.getElementById('CITIZEN_ID').value;

	if(obj.value.length == 13 )
	{

		if(checkID(tagInput))
		{
		SubmitContent();
		nextObj.focus();
		}
		else
		{
			alert('รหัสประชาชนไม่ถูกต้อง');
			document.getElementById('CITIZEN_ID').value="";
		nextObj.focus();





		}

	}
}

function checkID(id){
	if(id.length != 13) return false;
	for(i=0, sum=0; i < 12; i++)
		sum += parseFloat(id.charAt(i))*(13-i);
	if((11-sum%11)%10!=parseFloat(id.charAt(12)))
		return false;
	return true;

}
</script>
 				<?php
                $sqlu = "select * from  university where id_university = '".$_SESSION['university_id']."'  ";
                $queryu = mysql_query($sqlu,$conn) or die(mysql_error());
                $arru = mysql_fetch_array($queryu);
				?>

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title"> จัดการข้อมูลนักกีฬา <?php echo $arru['name_university']; ?></h3>
        </div>
      </div>

<div class="content-body" >
  <!--from manager -->
  <section id="basic-tabs-components">
    <div class="row match-height">

      <div class="col-xl-1 col-lg-1">
      </div>

      <div class="col-xl-10 col-lg-10">
        <div class="card">

          <div class="card-content">
            <div class="card-body">
              <ul class="nav nav-tabs">
              <?php if($_GET['action']=="delect"){?>
                <li class="nav-item">
                  <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
                  aria-expanded="false">ลงทะเบียน แก้ไข - นักกีฬา</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1"
                  href="#tab1" aria-expanded="true">ข้อมูลนักกีฬา</a>
                </li>
				<?php } else{?>
                <li class="nav-item">
                  <a class="nav-link active" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
                  aria-expanded="false">ลงทะเบียน แก้ไข - นักกีฬา</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="base-tab1" data-toggle="tab" aria-controls="tab1"
                  href="#tab1" aria-expanded="true">ข้อมูลนักกีฬา</a>
                </li>
				<?php }?>

              </ul>

              <div class="tab-content px-1 pt-1">
                <?php if($_GET['action']=="delect"){?>
                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                <?php } else{?>
                <div role="tabpanel" class="tab-pane" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
				<?php }?>
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
                                      <th>ขั้นปี/คณะ</th>
                                      <th>LastUpdate</th>
                                      <th>ตัวเลือก</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
									$xi = 0;
                                    $sqladmin = "select * from student_sports where id_university='".$_SESSION['university_id']."'
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
                                            <img src="filesutdent/<?php  echo $arradmin['pic_student']; ?>" height="70" width="55" alt="avatar">
                                      </td>

                                      <td>
                                      	<a href="home.php?menu=view&id=<?php echo $arradmin['id_student'];?>" target="_blank">
                                        <?php  echo $arradmin['title_name']; ?><?php  echo $arradmin['f_name']; ?>
                                        <?php  echo $arradmin['l_name']; ?>
                                        </a>
                                      </td>
                                      <td>
                                        ชั้นปีที่
                                        <?php  echo $arradmin['year_level']; ?> /
                                        <?php  echo $arradmin['faculty']; ?>
                                      </td>
                                      <td>
                                        <?php


                                        $strDate=$arradmin['st_date'];
	                                       echo DateThai($strDate);
                                         ?>
                                      </td>

                                      <td>
                                        <?php if ($arradmin['st']==1)
										{
                                        ?>
                                        <p class="text-danger">ข้อมูลไม่ถูกต้อง</p>
                                        <p><?php echo $arradmin['detail']; ?></p>
                                        <a href='home.php?menu=player&id=<?php echo $arradmin['CITIZEN_ID']; ?>'class="text-info"><i class="ft-edit"></i> แก้ไขคลิก</a><br><br>
                                       <button type="button" class="btn btn-block btn-outline-danger mb-2"  onclick="archiveFunction(<?php echo $arradmin['id_student'];  ?>)"><i class="ft-trash-2"></i> ลบ</button><!-- ลบไปเลย-->


                                        <?php
                                        }
                                        else if($arradmin['st']==0)
                                        {
                                        ?>
                                        <p class="text-warning">รอการตรวจสอบ</p>
                                        <a href='home.php?menu=player&id=<?php echo $arradmin['CITIZEN_ID']; ?>'class="text-info"><i class="ft-edit"></i> แก้ไขคลิก</a><br><br>
                                        <button type="button" class="btn btn-block btn-outline-danger mb-2"  onclick="archiveFunction(<?php echo $arradmin['id_student'];  ?>)"><i class="ft-trash-2"></i> ลบ</button><!-- ลบไปเลย-->
                                       <?php
										}
										else if($arradmin['st']==9)
                                        {
                                        ?>
                                        <p class="text-success">ข้อมูลผ่านการตรวจสอบ</p>
                                        <button type="button" class="btn btn-block btn-outline-success mb-2" onclick="window.open('reportstudent.php?student=<?php echo $arradmin['id_student']; ?>','_blank')"><i class="ft-printer"></i> พิมพ์</button>

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

                <?php

				if($_GET['id']==""){
					?>
                <div class="tab-pane <?php if($_GET['action']!="delect"){?>active<?php }?>" id="tab2" aria-labelledby="base-tab2">
                  <center><h2>เพิ่มนักกีฬา <?php echo $arru['name_university'];?></h2></center>
                  <section class="input-validation">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-content collapse show">
                            <div class="card-body">
                              <form class="form-horizontal" method="post" action="save_player.php?action=add" enctype="multipart/form-data" novalidate>

                              <h4 class="form-section"><i class="ft-user"></i> ข้อมูลส่วนบุคคล</h4>
                              <div class="row">
                                <div class="col-lg-5 col-md-12">
                                  <div class="form-group">
                                    <h5>รหัสบัตรประชาชน
                                      <span class="required">*</span>
                                    </h5>
                                    <div class="controls">
                                      <input class="form-control" placeholder="รหัสประจำตัวประชาชน 13 หลัก" size="20" minlength="13" maxlength="13" name="CITIZEN_ID" id="CITIZEN_ID"  tabindex="1" onkeyup="keyup(this,event)" onkeypress="return Numbers(event)" required>
                                    </div>
                                    <br>

                                    <span class="textred" id="myspan"></span>


                                  </div>
                                </div>

                              </div>

                                <div class="row">
                                  <div class="col-lg-2 col-md-4">
                                  <div class="form-group">
                                    <h5>คำนำหน้า
                                      <span class="required">*</span>
                                    </h5>
                                    <div class="controls">
                                      <select name="title_name" id="title_name" required data-validation-required-message="กรุณาเลือกข้อมูล" class="form-control">
                                        <option value="">เลือก</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                      </select>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                      <h5>ชื่อ
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="f_name" id="f_name" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-4">
                                    <div class="form-group">
                                      <h5>นามสกุล
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="l_name" id="l_name" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-2 col-md-3">
                                    <div class="form-group">
                                      <h5>สัญชาติ
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="nationality" id="nationality" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-2 col-md-3">
                                    <div class="form-group">
                                      <h5>เชื้อชาติ
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="race" id="race" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-2 col-md-3">
                                  <div class="form-group">
                                    <h5>เลือกกลุ่มอาหาร
                                      <span class="required">*</span>
                                    </h5>
                                    <div class="controls">
                                      <select name="food_group" id="food_group" required data-validation-required-message="กรุณาเลือกข้อมูล" class="form-control">
                                        <option value="">เลือก</option>
                                        <option value="ปกติ">ปกติ</option>
                                        <option value="มังสวิรัติ">มังสวิรัติ</option>
                                        <option value="อิสลาม">อิสลาม</option>
                                      </select>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                      <h5>วัน/เดือน/ปีเกิด
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="date" class="form-control" name="hbd" id="hbd" value="" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <h4 class="form-section"><i class="ft-user"></i> ข้อมูลสถานศึกษา</h4>
                                <div class="row">
                                  <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                      <h5>รหัสนักศึกษา
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="student_code" id="student_code" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3">
                                  <div class="form-group">
                                    <h5>ระดับการศึกษา
                                      <span class="required">*</span>
                                    </h5>
                                    <div class="controls">
                                      <select name="education_level" id="education_level" required data-validation-required-message="กรุณาเลือกข้อมูล" class="form-control">
                                        <option value="">เลือก</option>
                                        <option value="ประกาศนียบัตรวิชาชีพ">ประกาศนียบัตรวิชาชีพ</option>
                                        <option value="ประกาศนียบัตรวิชาชีพชั้นสูง">ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                                        <option value="ปริญญาโท">ปริญญาโท</option>
                                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                                      </select>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                      <h5>ชั้นปี
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                      <select name="year_level" id="year_level" required data-validation-required-message="กรุณาเลือกข้อมูล" class="form-control">
                                        <option value="">เลือก</option>
                                        <option value="1">ปี 1</option>
                                        <option value="2">ปี 2</option>
                                        <option value="3">ปี 3</option>
                                        <option value="4">ปี 4</option>
                                        <option value="5">ปี 5</option>
                                        <option value="6">ปี 6</option>
                                        <option value="7">ปี 7</option>
                                        <option value="8">ปี 8</option>
                                      </select>
                                    </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                      <h5>คณะ
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="faculty" id="faculty" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                      <h6>รูปนักศึกษา*('png', 'jpg', 'jpeg','gif')
                                        <span class="required">*</span>
                                      </h6>
                                      <div class="controls">
                                        <input type="file"  name="pic_student" id="pic_student" accept="image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                      <h6>หลักฐานใบทรานสคริปเทอม 1 *('pdf','png', 'jpg', 'jpeg','gif')
                                        <span class="required">*</span>
                                      </h6>
                                      <div class="controls">
                                        <input type="file" name="evidence" id="evidence" accept="application/pdf,image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                      <h6>รูปบัตรนักศึกษา*('png', 'jpg', 'jpeg','gif')
                                        <span class="required">*</span>
                                      </h6>
                                      <div class="controls">
                                        <input type="file" name="pic_cardstudent" id="pic_cardstudent" accept="image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                      <h6>หลักฐานใบลงทะเบียนเทอม 2 *('pdf','png', 'jpg', 'jpeg','gif')
                                        <span class="required">*</span>
                                      </h6>
                                      <div class="controls">
                                        <input type="file" name="evidence1" id="evidence1" accept="application/pdf,image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                      <h6>รูปบัตรประชาชน*('png', 'jpg', 'jpeg','gif')
                                        <span class="required">*</span>
                                      </h6>
                                      <div class="controls">
                                        <input type="file" name="pic_card" id="pic_card" accept="image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                  </div>
                                </div>


                                    <div class="text-right">
                                      <button type="submit" class="btn btn-success">บันทึก <i class="la la-check-square-o position-right"></i></button>
                                      <button type="reset" class="btn btn-danger">ยกเลิก <i class="ft-x position-right"></i></button>
                                    </div>
                              </form>
                            </div>
                          </div>

                          <?php }?>

                          <!-- 000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000 -->
                          <?php
				if($_GET['id']!=""){
					?>
                    <?php
					$sqlus = "select * from  student_sports where CITIZEN_ID = '".$_GET['id']."'  ";
					$queryus = mysql_query($sqlus,$conn) or die(mysql_error());
					$arrus = mysql_fetch_array($queryus);
					?>
                <div class="tab-pane active" id="tab2" aria-labelledby="base-tab2">
                  <center><h2>แก้ไขนักกีฬา <?php echo $arru['name_university'];?></h2></center>
                  <section class="input-validation">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-content collapse show">
                            <div class="card-body">
                              <form class="form-horizontal" method="post" action="save_player.php?action=edit&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data" novalidate>

                              <h4 class="form-section"><i class="ft-user"></i> ข้อมูลส่วนบุคคล</h4>
                              <div class="row">
                                <div class="col-lg-5 col-md-12">
                                  <div class="form-group">
                                    <h5>รหัสบัตรประชาชน
                                      <span class="required">*</span>
                                    </h5>
                                    <div class="controls">
                                      <input class="form-control" placeholder="รหัสประจำตัวประชาชน 13 หลัก" size="20" maxlength="13" value="<?php echo $_GET['id']; ?>" name="CITIZEN_ID" id="CITIZEN_ID"  tabindex="1" onkeyup="keyup(this,event)" onkeypress="return Numbers(event)" disabled>
                                    </div>
                                    <br>

                                  </div>
                                </div>

                              </div>

                                <div class="row">
                                  <div class="col-lg-2 col-md-4">
                                  <div class="form-group">
                                    <h5>คำนำหน้า
                                      <span class="required">*</span>
                                    </h5>
                                    <div class="controls">
                                      <select name="title_name" id="title_name" required data-validation-required-message="กรุณาเลือกข้อมูล" class="form-control">
                                        <option value="<?php echo $arrus['title_name'];?>"><?php echo $arrus['title_name'];?></option>
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                      </select>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                      <h5>ชื่อ
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="f_name" id="f_name" value="<?php echo $arrus['f_name'];?>" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-4">
                                    <div class="form-group">
                                      <h5>นามสกุล
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="l_name" id="l_name" value="<?php echo $arrus['l_name'];?>" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-2 col-md-3">
                                    <div class="form-group">
                                      <h5>สัญชาติ
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="nationality" id="nationality" value="<?php echo $arrus['nationality'];?>" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-2 col-md-3">
                                    <div class="form-group">
                                      <h5>เชื้อชาติ
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="race" id="race" value="<?php echo $arrus['nationality'];?>" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-2 col-md-3">
                                  <div class="form-group">
                                    <h5>เลือกกลุ่มอาหาร
                                      <span class="required">*</span>
                                    </h5>
                                    <div class="controls">
                                      <select name="food_group" id="food_group" required data-validation-required-message="กรุณาเลือกข้อมูล" class="form-control">
                                        <option value="<?php echo $arrus['food_group'];?>"><?php echo $arrus['food_group'];?></option>
                                        <option value="ปกติ">ปกติ</option>
                                        <option value="มังสวิรัติ">มังสวิรัติ</option>
                                        <option value="อิสลาม">อิสลาม</option>
                                      </select>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                      <h5>วัน/เดือน/ปีเกิด
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="date" class="form-control" name="hbd" id="hbd" value="<?php echo $arrus['hbd'];?>" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <h4 class="form-section"><i class="ft-user"></i> ข้อมูลสถานศึกษา</h4>
                                <div class="row">
                                  <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                      <h5>รหัสนักศึกษา
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="student_code" id="student_code" value="<?php echo $arrus['student_code'];?>" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3">
                                  <div class="form-group">
                                    <h5>ระดับการศึกษา
                                      <span class="required">*</span>
                                    </h5>
                                    <div class="controls">
                                      <select name="education_level" id="education_level" required data-validation-required-message="กรุณาเลือกข้อมูล" class="form-control">
                                        <option value="<?php echo $arrus['education_level'];?>"><?php echo $arrus['education_level'];?></option>
                                        <option value="ประกาศนียบัตรวิชาชีพ">ประกาศนียบัตรวิชาชีพ</option>
                                        <option value="ประกาศนียบัตรวิชาชีพชั้นสูง">ประกาศนียบัตรวิชาชีพชั้นสูง</option>
                                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                                        <option value="ปริญญาโท">ปริญญาโท</option>
                                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                                      </select>
                                    </div>
                                  </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                      <h5>ชั้นปี
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                      <select name="year_level" id="year_level" required data-validation-required-message="กรุณาเลือกข้อมูล" class="form-control">
                                        <option value="<?php echo $arrus['year_level'];?>">ปี <?php echo $arrus['year_level'];?></option>
                                        <option value="1">ปี 1</option>
                                        <option value="2">ปี 2</option>
                                        <option value="3">ปี 3</option>
                                        <option value="4">ปี 4</option>
                                        <option value="5">ปี 5</option>
                                        <option value="6">ปี 6</option>
                                        <option value="7">ปี 7</option>
                                        <option value="8">ปี 8</option>
                                      </select>
                                    </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                      <h5>คณะ
                                        <span class="required">*</span>
                                      </h5>
                                      <div class="controls">
                                        <input type="text" name="faculty" id="faculty" value="<?php echo $arrus['faculty'];?>" class="form-control" required data-validation-required-message="กรุณากรอกข้อมูล">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                      <h6>รูปนักศึกษา*('png', 'jpg', 'jpeg','gif')
                                        <span class="required">*</span>
                                      </h6>
                                      <div class="controls">
                                      <?php if($arrus['pic_student']==""){ ?>
                                        <input type="file"  name="pic_student" id="pic_student" accept="image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                      <?php }else
									  {?>
										  <a href="filesutdent/<?php echo $arrus['pic_student'];?>" target="_blank">
                                          <img src="filesutdent/<?php echo $arrus['pic_student'];?>" height="100" width="80" alt=""/><br/>
										  <?php
										  echo $arrus['pic_student'];
										  ?>
                                          </a>
                                          <a href="home.php?menu=player&id=<?php echo $_GET['id'];?>&action=edit1"><button type="button" class="btn btn-block btn-outline-primary mb-2"></i> ลบ</button></a><?php
									  }?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                      <h6>หลักฐานใบทรานสคริปเทอม 1 *('pdf','png', 'jpg', 'jpeg','gif')
                                        <span class="required">*</span>
                                      </h6>
                                      <div class="controls">
                                      <?php if($arrus['evidence']==""){ ?>
                                        <input type="file" name="evidence" id="evidence" accept="application/pdf,image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
									  <?php }else
									  {?>
										  <a href="filesutdent/<?php echo $arrus['evidence'];?>" target="_blank">
                                          <img src="filesutdent/<?php echo $arrus['evidence'];?>" height="100" width="80" alt=""/><br/>
										  <?php
										  echo $arrus['evidence'];
                                          ?>
                                          </a>
                                          <a href="home.php?menu=player&id=<?php echo $_GET['id'];?>&action=edit2"><button type="button" class="btn btn-block btn-outline-primary mb-2"></i> ลบ</button></a><?php
									  }?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                      <h6>รูปบัตรนักศึกษา*('png', 'jpg', 'jpeg','gif')
                                        <span class="required">*</span>
                                      </h6>
                                      <div class="controls">
                                      <?php if($arrus['pic_cardstudent']==""){ ?>
                                        <input type="file" name="pic_cardstudent" id="pic_cardstudent" accept="image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                      <?php }else
									  {?>
										  <a href="filesutdent/<?php echo $arrus['pic_cardstudent'];?>" target="_blank">
                                          <img src="filesutdent/<?php echo $arrus['pic_cardstudent'];?>" height="100" width="80" alt=""/><br/>
                                          <?php
										  echo $arrus['pic_cardstudent'];
										  ?>
                                          </a>
                                          <a href="home.php?menu=player&id=<?php echo $_GET['id'];?>&action=edit3"><button type="button" class="btn btn-block btn-outline-primary mb-2"></i> ลบ</button></a><?php
									  }?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                      <h6>หลักฐานใบลงทะเบียนเทอม 2 *('pdf','png', 'jpg', 'jpeg','gif')
                                        <span class="required">*</span>
                                      </h6>
                                      <div class="controls">
                                      <?php if($arrus['evidence1']==""){ ?>
                                        <input type="file" name="evidence1" id="evidence1" accept="application/pdf,image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
									  <?php }else
									  {?>
										  <a href="filesutdent/<?php echo $arrus['evidence1'];?>" target="_blank">
                                          <img src="filesutdent/<?php echo $arrus['evidence1'];?>" height="100" width="80" alt=""/><br/>
                                          <?php
										  echo $arrus['evidence1'];
										  ?>
                                          </a>
                                          <a href="home.php?menu=player&id=<?php echo $_GET['id'];?>&action=edit5"><button type="button" class="btn btn-block btn-outline-primary mb-2"></i> ลบ</button></a><?php
									  }?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                      <h6>รูปบัตรประชาชน*('png', 'jpg', 'jpeg','gif')
                                        <span class="required">*</span>
                                      </h6>
                                      <div class="controls">
                                      <?php if($arrus['pic_card']==""){ ?>
                                        <input type="file" name="pic_card" id="pic_card" accept="image/gif,image/png,image/jpeg,image/tiff" class="form-control" required data-validation-required-message="กรุณาเลือกข้อมูล">
                                      <?php }else
									  {?>
										  <a href="filesutdent/<?php echo $arrus['pic_card'];?>" target="_blank">
                                          <img src="filesutdent/<?php echo $arrus['pic_card'];?>" height="100" width="80" alt=""/><br/>
                                          <?php
										  echo $arrus['pic_card'];
										  ?>
                                          </a>
                                          <a href="home.php?menu=player&id=<?php echo $_GET['id'];?>&action=edit4"><button type="button" class="btn btn-block btn-outline-primary mb-2"></i> ลบ</button></a>

										  <?php
									  }?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6">
                                  </div>
                                </div>


                                    <div class="text-right">
                                      <button type="submit" class="btn btn-success">แก้ไขข้อมูล <i class="la la-check-square-o position-right"></i></button>
                                    </div>
                              </form>
                            </div>
                          </div>

                          <?php }?>


                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </section>

                  <!-- Input Validation end -->
            </div>
          </div>
        </div>
      </div>
    </div>

      <div class="col-xl-1 col-lg-1">
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

  <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
  <script src="app-assets/js/scripts/tables/datatables/datatable-basic.js"type="text/javascript"></script>

  <script src="app-assets/js/scripts/navs/navs.js" type="text/javascript"></script>

  <script type="text/javascript" src=".app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script src="app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js"type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>

  <script src="app-assets/js/scripts/forms/validation/form-validation.js"type="text/javascript"></script>
<?php
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
  window.location.href="home.php?menu=player&action=delect&checkdel="+id;

} else {
  swal("ยกเลิก", "คุณได้ยกเลิกข้อมูลแล้ว:)", "error");
}
});
}



</script>