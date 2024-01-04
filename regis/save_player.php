 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
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
 if($_GET['action']=="add")
 {
	$CITIZEN_ID = $_POST['CITIZEN_ID'];
	$title_name = $_POST['title_name'];
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$nationality = $_POST['nationality'];
	$race = $_POST['race'];
	$food_group = $_POST['food_group'];
	$hbd = $_POST['hbd'];
	$id_university = $_SESSION['university_id'];
	$student_code = $_POST['student_code'];
	$education_level = $_POST['education_level'];
	$year_level = $_POST['year_level'];
	$faculty = $_POST['faculty'];

	$status_vaccine_covid19 = $_POST['status_vaccine_covid19'];

	$pic_vaccine_covid19=$_FILES['pic_vaccine_covid19']['tmp_name'];
	$pic_vaccine_covid19_name=$_FILES['pic_vaccine_covid19']['name'];
	$pic_vaccine_covid19_size=$_FILES['pic_vaccine_covid19']['size'];
	$pic_vaccine_covid19_type=$_FILES['pic_vaccine_covid19']['type'];

	$pic_card=$_FILES['pic_card']['tmp_name'];
	$pic_card_name=$_FILES['pic_card']['name'];
	$pic_card_size=$_FILES['pic_card']['size'];
	$pic_card_type=$_FILES['pic_card']['type'];
	
	$pic_student=$_FILES['pic_student']['tmp_name'];
	$pic_student_name=$_FILES['pic_student']['name'];
	$pic_student_size=$_FILES['pic_student']['size'];
	$pic_student_type=$_FILES['pic_student']['type'];
	
	$pic_cardstudent=$_FILES['pic_cardstudent']['tmp_name'];
	$pic_cardstudent_name=$_FILES['pic_cardstudent']['name'];
	$pic_cardstudent_size=$_FILES['pic_cardstudent']['size'];
	$pic_cardstudent_type=$_FILES['pic_cardstudent']['type'];

	$evidence=$_FILES['evidence']['tmp_name'];
	$evidence_name=$_FILES['evidence']['name'];
	$evidence_size=$_FILES['evidence']['size'];
	$evidence_type=$_FILES['evidence']['type'];
	
	$evidence1=$_FILES['evidence1']['tmp_name'];
	$evidence1_name=$_FILES['evidence1']['name'];
	$evidence1_size=$_FILES['evidence1']['size'];
	$evidence1_type=$_FILES['evidence1']['type'];

	$current_timestamp = time();

	$st = 0;    ?><br/><?php
	$st_date = date('Y-m-d');    ?><br/><?php
	$id_user_admin = $_SESSION['admin_id'];
	
	$strSQLq = "SELECT * FROM student_sports WHERE CITIZEN_ID = '$CITIZEN_ID' ";
	$objQueryq = mysql_query($strSQLq);
	$intRowsq = mysql_num_rows($objQueryq);
	if($intRowsq==0)
	{ 
		
	 

   $strSQL = "INSERT INTO student_sports VALUES 
  (null,'$CITIZEN_ID','$title_name','$f_name','$l_name','$nationality','$race','$food_group','$hbd','$id_university','$student_code',
  '$education_level','$year_level','$faculty','','','','','','$status_vaccine_covid19','$st','$st_date','$id_user_admin','','')";
   $objQuery = mysql_query($strSQL);
   
   

			$sql2 = "select max(id_student) from student_sports";
			$query2 = mysql_query($sql2) or die(mysql_error());
			$r=mysql_fetch_array($query2);
			$id_max=$r[0];
			$ext1 = strtolower(end(explode('.',$pic_card_name)));
			$ext2 = strtolower(end(explode('.',$pic_student_name)));
			$ext3 = strtolower(end(explode('.',$pic_cardstudent_name)));
			$ext4 = strtolower(end(explode('.',$evidence_name)));
			$ext5 = strtolower(end(explode('.',$evidence1_name)));
			
			if($_FILES['pic_card']['name']!=""){
			$filename1=$current_timestamp.'_'.$id_max."pic_card.".$ext1;
			}else{ $filename1="";}
			
			if($_FILES['pic_student']['name']!=""){
			$filename2=$current_timestamp.'_'.$id_max."pic_student.".$ext2;
			}else{ $filename2="";}
			
			if($_FILES['pic_cardstudent']['name']!=""){
			$filename3=$current_timestamp.'_'.$id_max."pic_cardstudent.".$ext3;
			}else{ $filename3="";}
			
			if($_FILES['evidence']['name']!=""){
			$filename4=$current_timestamp.'_'.$id_max."evidence.".$ext4;
			}else{ $filename4="";}
			
			if($_FILES['evidence1']['name']!=""){
			$filename5=$current_timestamp.'_'.$id_max."evidence1.".$ext5;
			}else{ $filename5="";}

			if($_FILES['pic_vaccine_covid19']['name']!=""){
				$filename6=$current_timestamp.'_'.$id_max."pic_vaccine_covid19.".$ext6;
			}else{ $filename6="";}
			
			if($objQuery!=false)
			{
				if($_FILES['pic_card']['name']!=""){
				copy($_FILES['pic_card']['tmp_name'],"filesutdent/$filename1");
				}
				if($_FILES['pic_student']['name']!=""){
				copy($_FILES['pic_student']['tmp_name'],"filesutdent/$filename2");
				}
				if($_FILES['pic_cardstudent']['name']!=""){
				copy($_FILES['pic_cardstudent']['tmp_name'],"filesutdent/$filename3");
				}
				if($_FILES['evidence']['name']!=""){
				copy($_FILES['evidence']['tmp_name'],"filesutdent/$filename4");
				}
				if($_FILES['evidence1']['name']!=""){
				copy($_FILES['evidence1']['tmp_name'],"filesutdent/$filename5");
				}
				if($_FILES['pic_vaccine_covid19']['name']!=""){
					copy($_FILES['pic_vaccine_covid19']['tmp_name'],"filesutdent/$filename6");
				}
			}
			$strsql2 = "update student_sports set 
			pic_student = '$filename2',
			pic_cardstudent = '$filename3',
			pic_card = '$filename1',
			evidence = '$filename4',
			evidence1 = '$filename5',
			vaccine_covid19 = '$filename6'
			where id_student = '$id_max'";
			$query3 = mysql_query($strsql2) or die(mysql_error());
			$checkadd = 1;
   			echo $checkadd;
	}
	else {
	$checkadd = 2;
	echo $checkadd;
	}
   
 }
 else if($_GET['action']=="edit")
 {
	 $CITIZEN_ID = $_GET['id'];
	 $title_name = $_POST['title_name'];
	 $f_name = $_POST['f_name'];
	 $l_name = $_POST['l_name'];
	 $nationality = $_POST['nationality'];
	 $race = $_POST['race'];
	 $food_group = $_POST['food_group'];
	 $hbd = $_POST['hbd'];
	 $id_university = $_SESSION['university_id'];
	 $student_code = $_POST['student_code'];
	 $education_level = $_POST['education_level'];
	 $year_level = $_POST['year_level'];
	 $faculty = $_POST['faculty'];
	 $st = 0; 
	 $st_date = date('Y-m-d');
	 $id_user_admin = $_SESSION['admin_id'];
	 
	 $sqlus = "select * from  student_sports where CITIZEN_ID = '$CITIZEN_ID'";
	 $queryus = mysql_query($sqlus,$conn) or die(mysql_error());
	 $arrus = mysql_fetch_array($queryus);
	 $id_max = $arrus['id_student'] ;

	 $current_timestamp = time();
			
	if($_FILES['pic_card']['name']!=""){
	$pic_card=$_FILES['pic_card']['name'];
	$pic_card_name=$_FILES['pic_card']['name'];
	$pic_card_size=$_FILES['pic_card']['size'];
	$pic_card_type=$_FILES['pic_card']['type'];

	
			
			$ext = strtolower(end(explode('.',$pic_card_name)));
			$filename = $current_timestamp.'_'.$id_max."pic_card.".$ext;
			
			copy($_FILES['pic_card']['tmp_name'],"filesutdent/$filename");
			
			$strsql2 = "update student_sports set pic_card = '$filename' where id_student = '$id_max'";
			$query3 = mysql_query($strsql2) or die(mysql_error());
			
	}
	if($_FILES['evidence']['name']!=""){
	$evidence=$_FILES['evidence']['name'];
	$evidence_name=$_FILES['evidence']['name'];
	$evidence_size=$_FILES['evidence']['size'];
	$evidence_type=$_FILES['evidence']['type'];
			
			$ext = strtolower(end(explode('.',$evidence_name)));
			$filename = $current_timestamp.'_'.$id_max."evidence.".$ext;
			
				copy($_FILES['evidence']['tmp_name'],"filesutdent/$filename");
			
			$strsql2 = "update student_sports set evidence = '$filename' where id_student = '$id_max'";
			$query3 = mysql_query($strsql2) or die(mysql_error());
		
	}
	if($_FILES['evidence1']['name']!=""){
	$evidence1=$_FILES['evidence1']['name'];
	$evidence1_name=$_FILES['evidence1']['name'];
	$evidence1_size=$_FILES['evidence1']['size'];
	$evidence1_type=$_FILES['evidence1']['type'];    ?><br/><?php
			
			$ext = strtolower(end(explode('.',$evidence1_name)));
			$filename = $current_timestamp.'_'.$id_max."evidence1.".$ext;    ?><br/><?php
			
				copy($_FILES['evidence1']['tmp_name'],"filesutdent/$filename");
			
			$strsql2 = "update student_sports set evidence1 = '$filename' where id_student = '$id_max'";
			$query3 = mysql_query($strsql2) or die(mysql_error());
		
	}
	if($_FILES['pic_cardstudent']['name']!=""){
	$pic_cardstudent=$_FILES['pic_cardstudent']['name'];
	$pic_cardstudent_name=$_FILES['pic_cardstudent']['name'];
	$pic_cardstudent_size=$_FILES['pic_cardstudent']['size'];
	$pic_cardstudent_type=$_FILES['pic_cardstudent']['type'];    ?><br/><?php
			
			$ext = strtolower(end(explode('.',$$pic_cardstudent_name)));
			$filename = $current_timestamp.'_'.$id_max."pic_cardstudent.".$ext;    ?><br/><?php
			
				copy($_FILES['pic_cardstudent']['tmp_name'],"filesutdent/$filename");
			
			$strsql2 = "update student_sports set pic_cardstudent = '$filename' where id_student = '$id_max'";
			$query3 = mysql_query($strsql2) or die(mysql_error());
		
	}
	if($_FILES['pic_student']['name']!=""){
	$pic_student=$_FILES['pic_student']['name'];
	$pic_student_name=$_FILES['pic_student']['name'];
	$pic_student_size=$_FILES['pic_student']['size'];
	$pic_student_type=$_FILES['pic_student']['type'];
			
			$ext = strtolower(end(explode('.',$pic_student_name)));
			$filename = $current_timestamp.'_'.$id_max."pic_student.".$ext;
			
				copy($_FILES['pic_student']['tmp_name'],"filesutdent/$filename");
			
			$strsql2 = "update student_sports set pic_student = '$filename' where id_student = '$id_max'";
			$query3 = mysql_query($strsql2) or die(mysql_error());
		
	}

	// vaccien covid 19
	if($_FILES['pic_vaccine_covid19']['name']!=""){
		$pic_vaccine_covid19=$_FILES['pic_vaccine_covid19']['name'];
		$pic_vaccine_covid19_name=$_FILES['pic_vaccine_covid19']['name'];
		$pic_vaccine_covid19_size=$_FILES['pic_vaccine_covid19']['size'];
		$pic_vaccine_covid19_type=$_FILES['pic_vaccine_covid19']['type'];
				
				$ext = strtolower(end(explode('.',$pic_vaccine_covid19_name)));
				$filename = $current_timestamp.'_'.$id_max."pic_vaccine_covid19.".$ext;
				
					copy($_FILES['pic_vaccine_covid19']['tmp_name'],"filesutdent/$filename");
				
				$strsql2 = "update student_sports set vaccine_covid19 = '$filename' where id_student = '$id_max'";
				$query3 = mysql_query($strsql2) or die(mysql_error());
			
		}

	
   $strSQL = "update student_sports set 
   title_name = '$title_name', 
   f_name = '$f_name', 
   l_name = '$l_name', 
   nationality = '$nationality', 
   race = '$race', 
   food_group = '$food_group', 
   hbd = '$hbd', 
   id_university = '$id_university', 
   student_code = '$student_code', 
   education_level = '$education_level',
   year_level = '$year_level',
   faculty = '$faculty', 
   status_vaccine_covid19 = '$status_vaccine_covid19',
   st = '0',
   st_date = '$st_date', 
   id_user_admin = '$id_user_admin' where id_student = '$id_max'";

   
//    $strSQL = "update student_sports set 
// 	st_date = '$st_date', 
// 	id_user_admin = '$id_user_admin' 
// 	where id_student = '$id_max'";
   $objQuery = mysql_query($strSQL);

	$checkadd = 3;
   	echo $checkadd;
	
 }
 
}

?>



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
 window.location.href="home.php?menu=player";
 swal("Deleted!", "Your imaginary file has been deleted.", "success");
});

     </script>
     <?php
}
if($checkadd=="2")
{
 ?>
 <script type="text/javascript">
 swal({
 title: "ข้อมูลนักกีฬามีอยู่แล้วค่ะ",
 text: "กรุณาตรวจสอบด้วยค่ะ",
 type: "success",

 confirmButtonClass: "btn-danger",
 confirmButtonText: "ตกลง!",
 closeOnConfirm: false
},
function(){
 window.location.href="home.php?menu=player";
 swal("Deleted!", "Your imaginary file has been deleted.", "success");
});

     </script>
     <?php
}
if($checkadd=="3")
{
 ?>
 <script type="text/javascript">
 swal({
 title: "คุณได้แก้ไขข้อมูลนักกีฬาแล้ว?",
 text: "ดำเนินการเสร็จสิ้น",
 type: "success",

 confirmButtonClass: "btn-danger",
 confirmButtonText: "ตกลง!",
 closeOnConfirm: false
},
function(){
 window.location.href="home.php?menu=player";
 swal("Deleted!", "Your imaginary file has been deleted.", "success");
});

     </script>
     <?php
}

?>