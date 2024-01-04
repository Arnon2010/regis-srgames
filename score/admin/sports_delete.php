<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
	include ("connect_db.php");
	$ID = $_GET['ID'];
	
	$sql2 = "select * from sport where sport_id = '".$_GET['ID']."'";
	$qr2 = mysql_query($sql2);
	$arr2 = mysql_fetch_array($qr2);
	
	$strSQL = "DELETE FROM sport WHERE sport_id = '".$_GET["ID"]."' ";
	$arr = mysql_query($strSQL);
	if($arr)
	{
		
		echo '<SCRIPT language="javascript">
			alert("ลบข้อมูลเรียกร้อยแล้ว");
				window.location="main.php?menu=sports";
				</script>';
	}
	else
	{
		echo'<SCRIPT language="javascript">
			alert("Error Delete [".$strSQL."]");
				window.location="main.php?menu=sports";
				</script>'; 
		;
	}

	exit();
	
	

	mysql_close();
?>