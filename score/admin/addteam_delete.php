<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
	include ("connect_db.php");
	$ID = $_GET['ID'];
	
	$strSQL = "DELETE FROM teamvs2 WHERE id_team = '".$_GET["ID"]."' ";
	$arr2 = mysql_query($strSQL);
	
		
		
		echo '<SCRIPT language="javascript">
			alert("ลบข้อมูลเรียกร้อยแล้ว");
				window.location="main.php?menu=addteam_add";
				</script>';
	
	
	

	mysql_close();
?>