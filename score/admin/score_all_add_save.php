<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
	include("connect_db.php");
	if ($_GET['check'] == "delete") {

		$strsql2 = "DELETE from score_all where score_all_id = '" . $_GET['ID'] . "'";
		$query3 = mysql_query($strsql2) or die(mysql_error());


		echo '<SCRIPT language="javascript">
			alert("ลบข้อมูลเรียบร้อยแล้ว");
			window.location="main.php?menu=score&sport_type='.$_GET['sport_type'].'&sport_name='.$_GET['sport_name'].'";
			</script>';




		mysql_close();
	} else if ($_GET['check'] == "edit") {

		$sport_type_id = $_POST['sport_type_id'];
		$faculty_id1 = $_POST['faculty_id1'];
		$faculty_id2 = $_POST['faculty_id2'];
		$faculty_id3 = $_POST['faculty_id3'];
		$score1 = $_POST['score1'];
		$score2 = $_POST['score2'];
		$score3 = $_POST['score3'];
		$times = $_POST['times'];
		$date = $_POST['date'];
		$round_id = $_POST['round_id'];
		$sex = $_POST['sex'];



		$strSQL = "UPDATE score_all set sport_type_id = '$sport_type_id',faculty_id1 = '$faculty_id1',faculty_id2 = '$faculty_id2',faculty_id3 = '$faculty_id3',score1 = '$score1', score2 = '$score2', score3 = '$score3', times = '$times',date = '$date',round_id = '$round_id' ,sex = '$sex' where score_all_id = '" . $_GET['id'] . "'";
		$objQuery = mysql_query($strSQL);


		echo '<SCRIPT language="javascript">
			alert("แก้ไขเรียบร้อยแล้ว");
			window.location="main.php?menu=score&sport_type=' . $_GET['sport_type'] . '&sport_name=' . $_GET['sport_name'] . '";
			</script>';
		mysql_close();
	} else {
		$sport_type_id = $_POST['sport_type_id'];
		$faculty_id1 = $_POST['faculty_id1'];
		$faculty_id2 = $_POST['faculty_id2'];
		$faculty_id3 = $_POST['faculty_id3'];
		$score1 = $_POST['score1'];
		$score2 = $_POST['score2'];
		$score3 = $_POST['score3'];
		$times = $_POST['times'];
		$date = $_POST['date'];
		$round_id = $_POST['round_id'];
		$sex = $_POST['sex'];


		$strSQL = "INSERT INTO score_all VALUES (Null,'$sport_type_id','$faculty_id1','$faculty_id2','$faculty_id3','$score1','$score2','$score3','$times','$date','$round_id','$sex')";
		$objQuery = mysql_query($strSQL);


		echo '<SCRIPT language="javascript">
			alert("บันทึกเรียบร้อยแล้ว");
			window.location="main.php?menu=score&sport_type=' . $_GET['sport_type'] . '&sport_name=' . $_GET['sport_name'] . '";
			</script>';
		mysql_close();
	}

	?>