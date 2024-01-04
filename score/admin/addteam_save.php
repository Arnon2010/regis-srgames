<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
	include ("connect_db.php");
	$id_university = $_POST['id_university'];
 	$id_Sports_category = $_POST['id_Sports_category'];
	$sex = $_POST['sex'];
	$hand_ranks = $_POST['hand_ranks'];
	
	$sql2 = "select * from  teamvs2";
	$qr2 = mysql_query($sql2);
	while($arr2 = mysql_fetch_array($qr2)){	 
		echo $arr2['id_team'];?><br/><?php
		if($arr2['id_university']==$id_university and $arr2['id_Sports_category']==$id_Sports_category and $arr2['sex']==$sex and $arr2['hand_ranks']==$hand_ranks ){
			
			echo '<SCRIPT language="javascript">
					alert("มีทีมการแข่งขันนี้แล้ว");
					window.location="main.php?menu=addteam_add";
					</script>';mysql_close();
		}
	}
	
	$strSQL = "INSERT INTO teamvs2 VALUES (Null,'$id_university','$id_Sports_category','$sex','$hand_ranks')";
	$objQuery = mysql_query($strSQL);
					  
	echo '<SCRIPT language="javascript">
			alert("บันทึกเรียบร้อยแล้ว");
			window.location="main.php?menu=addteam_add&sport_type='.$_POST['sport_type'].'&sport_name='.$_POST['sport_name'].'";
			</script>';mysql_close();
	

	
	
	
?>