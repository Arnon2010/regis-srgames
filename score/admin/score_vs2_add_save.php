<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
	 include ("connect_db.php");
	 $sport_type_id = $_POST['sport_type_id'];
	 $line_id=$_POST['line_id'];
	 $faculty_id1 = $_POST['faculty_id1'];
	 $temporary1 = $_POST['temporary1'];
 	 $faculty_id2 = $_POST['faculty_id2'];
	  $temporary2 = $_POST['temporary2'];
	 $score1 = $_POST['score1'];
	 $score2 = $_POST['score2'];
	 $times = $_POST['times'];
	 $date = $_POST['date'];
	 $round_id = $_POST['round_id'];
	 $sex = $_POST['sex'];
	
	
	$strSQL = "INSERT INTO score_vs2 VALUES (Null,'$sport_type_id','$faculty_id1','$temporary1','$faculty_id2','$temporary2','$score1','$score2','$times','$date','$round_id','$line_id','$sex')";
	$objQuery = mysql_query($strSQL);

	echo '<SCRIPT language="javascript">
			alert("บันทึกเรียบร้อยแล้ว");
			window.location="main.php?menu=score&sport_type='.$_GET['sport_type'].'&sport_name='.$_GET['sport_name'].'";
			</script>';
	mysql_close();
	
?>