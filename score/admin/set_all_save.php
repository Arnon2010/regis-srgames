<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
	include("connect_db.php");


	$faculty_id1 = $_POST['faculty_id1'];
	$faculty_id2 = $_POST['faculty_id2'];
	$faculty_id3 = $_POST['faculty_id3'];
	$score1 = $_POST['score1'];
	$score2 = $_POST['score2'];
	$score3 = $_POST['score3'];


	$strSQL = "update score_all set faculty_id1 = '$faculty_id1',faculty_id2 = '$faculty_id2',faculty_id3 = '$faculty_id3',score1 = '$score1', score2 = '$score2', score3 = '$score3'  where score_all_id = '" . $_GET['ID'] . "'";
	$objQuery = mysql_query($strSQL);
	$g = 0;
	$s = 0;
	$b = 0;
	$sqlf = "select * from faculty  ";
	$qrf = mysql_query($sqlf);

	while ($arrf = mysql_fetch_array($qrf)) {
		$g1 = 0;
		$s1 = 0;
		$b1 = 0;
		$g2 = 0;
		$s2 = 0;
		$b2 = 0;
		$g3 = 0;
		$s3 = 0;
		$b3 = 0;
		$sql2 = "select * from score_vs where faculty_id1='" . $arrf['faculty_id'] . "' or faculty_id2='" . $arrf['faculty_id'] . "'    ";
		$qr2 = mysql_query($sql2);

		while ($arr2 = mysql_fetch_array($qr2)) {

			if ($arr2['round_id'] == "7" && $arr2['faculty_id1'] == $arrf['faculty_id'] && $arr2['score1'] > $arr2['score2']) {
				$g1 = $g1 + 1;
			}
			if ($arr2['round_id'] == "7" && $arr2['faculty_id1'] == $arrf['faculty_id'] && $arr2['score1'] < $arr2['score2']) {
				$s1 = $s1 + 1;
			}
			if ($arr2['round_id'] == "7" && $arr2['faculty_id2'] == $arrf['faculty_id'] && $arr2['score1'] < $arr2['score2']) {
				$g2 = $g2 + 1;
			}
			if ($arr2['round_id'] == "7" && $arr2['faculty_id2'] == $arrf['faculty_id'] && $arr2['score1'] > $arr2['score2']) {
				$s2 = $s2 + 1;
			}
			if ($arr2['round_id'] == "8" && $arr2['faculty_id1'] == $arrf['faculty_id'] && $arr2['score1'] > $arr2['score2']) {
				$b1 = $b1 + 1;
			}
			if ($arr2['round_id'] == "8" && $arr2['faculty_id2'] == $arrf['faculty_id'] && $arr2['score1'] < $arr2['score2']) {
				$b2 = $b2 + 1;
			}
			if ($arr2['round_id'] == "12") {

				$b1 = $b1 + 1;
			}
		}


		$sql2 = "select * from  score_all where faculty_id1='" . $arrf['faculty_id'] . "' or faculty_id2='" . $arrf['faculty_id'] . "'  or faculty_id3='" . $arrf['faculty_id'] . "'   ";
		$qr2 = mysql_query($sql2);

		while ($arr2 = mysql_fetch_array($qr2)) {




			if ($arr2['faculty_id1'] == $arrf['faculty_id']) {
				$g3 = $g3 + 1;
			} else if ($arr2['faculty_id2'] == $arrf['faculty_id']) {
				$s3 = $s3 + 1;
			} else if ($arr2['faculty_id3'] == $arrf['faculty_id']) {
				$b3 = $b3 + 1;
			}
		}
		$g = $g1 + $g2 + $g3;
		$s = $s1 + $s2 + $s3;
		$b = $b1 + $b2 + $b3;
		$strSQL = "update medal set faculty_1 = '$g',faculty_2 = '$s',faculty_3 = '$b' where faculty_id = '" . $arrf['faculty_id'] . "'";
		$objQuery = mysql_query($strSQL);
	}
	echo '<SCRIPT language="javascript">
			alert("แก้ไขเรียบร้อยแล้ว");
			window.location="main.php?menu=score_all_detail&ID=';
	echo $_GET['ID'];
	echo '";
			</script>';




	mysql_close();

	?>