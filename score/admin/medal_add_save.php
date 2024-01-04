<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
	include ("connect_db.php");
	
	
	  $id_university = $_POST['id_university'];
 	  $hand_ranks = $_POST['hand_ranks'];
	  $id_Sports_category = $_POST['id_Sports_category'];
	  $sex = $_POST['sex'];
	  $ranks_medal = $_POST['ranks_medal'];
	  $chackio = $_POST['chackio'];
	
	
	if($ranks_medal=="1"&&$chackio=="1"){
		
		$sqlft = "select * from medal where faculty_id = $id_university";
		$qrft = mysql_query($sqlft);
		$arrft = mysql_fetch_array($qrft);
		
		$sum = $arrft['faculty_1']+1;
		
		$strSQL = "update medal set faculty_1 = '$sum' where faculty_id = $id_university";
		$objQuery = mysql_query($strSQL);
		
		$strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university','$hand_ranks','$id_Sports_category','$sex','$ranks_medal','$chackio')";
		$objQuery = mysql_query($strSQL);
		
	}else if($ranks_medal=="2"&&$chackio=="1"){
		
		$sqlft = "select * from medal where faculty_id = $id_university";
		$qrft = mysql_query($sqlft);
		$arrft = mysql_fetch_array($qrft);
		
		$sum = $arrft['faculty_2']+1;
		
		$strSQL = "update medal set faculty_2 = '$sum' where faculty_id = $id_university";
		$objQuery = mysql_query($strSQL);
		
		$strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university','$hand_ranks','$id_Sports_category','$sex','$ranks_medal','$chackio')";
		$objQuery = mysql_query($strSQL);
		
	}else if($ranks_medal=="3"&&$chackio=="1"){
		
		$sqlft = "select * from medal where faculty_id = $id_university";
		$qrft = mysql_query($sqlft);
		$arrft = mysql_fetch_array($qrft);
		
		$sum = $arrft['faculty_3']+1;
		
		$strSQL = "update medal set faculty_3 = '$sum' where faculty_id = $id_university";
		$objQuery = mysql_query($strSQL);
		
		$strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university','$hand_ranks','$id_Sports_category','$sex','$ranks_medal','$chackio')";
		$objQuery = mysql_query($strSQL);
		
	}else if($chackio=="0"){
		
		$strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university','$hand_ranks','$id_Sports_category','$sex','$ranks_medal','$chackio')";
		$objQuery = mysql_query($strSQL);
		
	}
	
			echo '<SCRIPT language="javascript">
			alert("บันทึกเรียบร้อยแล้ว");
			window.location="main.php?menu=medal_add";
			</script>';
			
			mysql_close();
?>