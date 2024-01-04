<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
	include("connect_db.php");
	$admin_username = $_POST['admin_username'];
	$admin_password = $_POST['admin_password'];
	$admin_type_id = $_POST['admin_type_id'];
	$faculty_id = $_POST['faculty_id'];
	$f_name = $_POST['f_name'];
	$s_name = $_POST['s_name'];

	$status = '0';

	$sqlcheck = "SELECT * FROM admin WHERE admin_username = '$_POST[admin_username]'";
	$rescheck = mysql_query($sqlcheck);
	$row = mysql_num_rows($rescheck);
	if($row == 0) {
		$strSQL = "INSERT INTO admin
 		VALUES (Null,'$admin_username','$admin_password','$admin_type_id','$faculty_id','$f_name','$s_name')";
		$objQuery = mysql_query($strSQL);

		$admin_id = mysql_insert_id();

		// add permission sport type 
		foreach($_POST['checked_sport_type'] as $sport_type => $value){
			echo $sql = "INSERT INTO admin_permis VALUES(NULL, '$admin_id', '$sport_type', '1')";
			mysql_query($sql);
		}

		$status = '1';
	} else {

		$status = '2';

	}

	if($status == '1') {
		echo '<SCRIPT language="javascript">
			alert("บันทึกเรียบร้อยแล้ว");
			window.location="main.php?menu=admin_user";
			</script>';

	}else if($status == '2') {
		echo '<SCRIPT language="javascript">
			alert("ชื่อผู้ใช้งานซ้ำ กรุณาลองใหม่อีกครั้ง !");
			window.location="main.php?menu=admin_user";
			</script>';

	}else {
		echo '<SCRIPT language="javascript">
			alert("ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง");
			window.location="main.php?menu=admin_user";
			</script>';

	}
	
	mysql_close();

	?>