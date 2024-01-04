<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
	include ("connect_db.php");
	$ID = $_GET['ID'];
 	$student = $_POST['student'];
	foreach($student as $valStd){
		$strSQL = "INSERT INTO user_sportvs2 VALUES (Null,'$ID','$valStd')";
		$objQuery = mysql_query($strSQL);
	}	  
	echo '<SCRIPT language="javascript">
			alert("บันทึกเรียบร้อยแล้ว");
			window.location="main.php?menu=addteam_add&sport_type='.$_GET['sport_type'].'&IDS='.$_GET['IDS'].'";
			</script>';

	mysql_close();
	

	
	
	
?>