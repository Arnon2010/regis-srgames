<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
	include ("connect_db.php");
	 $score1 = $_POST['score1'];
	 $score2 = $_POST['score2'];
	
	$g = 0;
 	$s= 0;
	$b = 0;
	$strSQL = "update score_vs set 	score1 = '$score1',
		score2 = '$score2' 
	where score_vs_id = '".$_GET['ID']."'";
	$objQuery = mysql_query($strSQL);

					

	
	
	echo '<SCRIPT language="javascript">
			alert("บันทึกเรียบร้อยแล้ว");
			window.location="main.php?menu=score_vs_detail&ID=';echo $_GET['ID'];echo'";
			</script>';
	
			
		
	
	mysql_close();
	
?>