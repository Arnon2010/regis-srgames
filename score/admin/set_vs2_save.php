<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php
	include ("connect_db.php");
	
	
	if($_GET['check']=="delete")
	{
		
		$strsql2 = "delete from tb_set2 where tb_set_id = '".$_GET['ID2']."'";
		$query3 = mysql_query($strsql2) or die(mysql_error());
	
	$v1 = 0;
	$v2 = 0;
		$sqlvs = "select * from tb_set2 where score_vs_id='".$_GET['ID']."'";
					 $qrvs = mysql_query($sqlvs);
					 while($arrvs = mysql_fetch_array($qrvs))
					 {
						 if($arrvs['score1']>$arrvs['score2'])
						 {
							 $v1 = $v1+1;
						 }
						 else  if($arrvs['score1']<$arrvs['score2'])
						 {
							 $v2 = $v2+1;
						 }
					 }
	     $strSQL = "update score_vs2 set score1 = '$v1',score2 = '$v2'  where score_vs_id = '".$_GET['ID']."'";
	$objQuery = mysql_query($strSQL);
	
	echo '<SCRIPT language="javascript">
			alert("ลบข้อมูลเรียบร้อยแล้ว");
			window.location="main.php?menu=score_vs2_detail&ID='; echo $_GET['ID']; echo'";
			</script>';
	mysql_close();
	}
	else
	{
	  $sport_type_id = $_GET['ID'];
	  $num_set = $_POST['num_set'];
 	  $score1 = $_POST['score1'];
	  $score2 = $_POST['score2'];
	
	$strSQL = "INSERT INTO tb_set2 VALUES (Null,'$sport_type_id','$num_set','$score1','$score2')";
	$objQuery = mysql_query($strSQL);
	$v1 = 0;
	$v2 = 0;
		$sqlvs = "select * from tb_set2 where score_vs_id='".$_GET['ID']."'";
					 $qrvs = mysql_query($sqlvs);
					 while($arrvs = mysql_fetch_array($qrvs))
					 {
						 if($arrvs['score1']>$arrvs['score2'])
						 {
							 $v1 = $v1+1;
						 }
						 else  if($arrvs['score1']<$arrvs['score2'])
						 {
							 $v2 = $v2+1;
						 }
					 }
	     $strSQL = "update score_vs2 set score1 = '$v1',score2 = '$v2'  where score_vs_id = '".$_GET['ID']."'";
	$objQuery = mysql_query($strSQL);
	
	
echo '<SCRIPT language="javascript">
			alert("บันทึกเรียบร้อยแล้ว");
			window.location="main.php?menu=score_vs2_detail&ID='; echo $_GET['ID']; echo'";
			</script>';

	}

	mysql_close();
?>