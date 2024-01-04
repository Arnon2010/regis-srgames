<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
	include ("connect_db.php");
	if($_GET['check']=="delete"){
		
		$strsql2 = "delete from user_sportall where score_all_id = '".$_GET['ID']."' and id_student = '".$_GET['IDSTD']."'";
		$query3 = mysql_query($strsql2) or die(mysql_error());
		
			echo '<SCRIPT language="javascript">
			alert("ลบข้อมูลเรียบร้อยแล้ว");
			window.location="main.php?menu=score_all_detail&ID='; echo $_GET['ID']; echo'";
			</script>';
	
	}
	
	if($_GET['check']=="add"){
	echo  $ID = $_GET['ID'];
	echo  $sex = $_GET['sex'];
	 echo $namerankall = $_POST['namerankall'];
 	 echo $rankall = $_POST['rankall'];
	
	
	$strSQL = "INSERT INTO user_sportall VALUES (Null,'$ID','$namerankall','$rankall','$sex')";
	$objQuery = mysql_query($strSQL);
					  
	echo '<SCRIPT language="javascript">
			alert("บันทึกเรียบร้อยแล้ว");
			window.location="main.php?menu=score_all_detail&ID='; echo $_GET['ID']; echo'";
			</script>';
	
	
	}
	mysql_close();
?>