<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
	include ("connect_db.php");
	 $sportsname = $_POST['sportsname'];
	 $num = $_POST['num'];
	
	
	$strSQL = "update sport set sport_name = '$sportsname' , amount_coin = '$num' where sport_id = '".$_GET['ID']."'";
	$objQuery = mysql_query($strSQL);

	
	
	echo '<SCRIPT language="javascript">
			alert("บันทึกเรียบร้อยแล้ว");
			window.location="main.php?menu=sports";
			</script>';
	
			
		
	
	mysql_close();
	
?>