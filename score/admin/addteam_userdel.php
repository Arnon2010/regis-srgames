<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
	include ("connect_db.php");
		
		$strsql2 = "delete from user_sportvs2 where id_team = '".$_GET['id_team']."' and id_student = '".$_GET['IDSTD']."'";
		$query3 = mysql_query($strsql2) or die(mysql_error());
		
			echo '<SCRIPT language="javascript">
			alert("ลบข้อมูลเรียบร้อยแล้ว");
			window.location="main.php?menu=addteam_add";
			</script>';mysql_close();
	
	
	
	
?>