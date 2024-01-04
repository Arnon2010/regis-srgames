<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect_db.php");
$am = $_GET['am'];
$value_date1=explode("-",$am);
$acolum = $value_date1[0];
$aname = $value_date1[1];
if (!empty($_FILES)) {
	$date=date("Y-m-d");
	$photo=$_FILES['Filedata']['tmp_name'];
		$photo_name=$_FILES['Filedata']['name'];
		$photo_size=$_FILES['Filedata']['size'];
		$photo_type=$_FILES['Filedata']['type'];
	$targetPath = 'file_photos/';	
	$targetFile = str_replace('//','/',$targetPath).$_FILES['Filedata']['name'];
		$ext = strtolower(end(explode('.',$photo_name)));
		if($ext == "jpg" or $ext =="jpeg" or $ext =="png" or $ext=="gif")
		{
		
		$sql = "insert into photos VALUES(null,'','".$_GET['ID']."')";
		$query = mysql_query($sql,$conn) or die(mysql_error());
		if($ext == "jpg" or $ext =="jpeg" or $ext =="png" or $ext=="gif")
		{
			$sql2 = "select max(photos_id) from photos";
			$query2 = mysql_query($sql2,$conn) or die(mysql_error());
			$r=mysql_fetch_array($query2);
			$id_max=$r[0];
			
			$filename=$id_max."picture.".$ext;
			if($ext == "jpg" or $ext == "jpeg")
			{
				$ori_img1 = imagecreatefromjpeg($photo);
			}
			else if($ext =="png")
			{
				$ori_img1 = imagecreatefrompng($photo);
			}
			else if($ext =="gif")
			{
				$ori_img1 = imagecreatefromgif($photo);
			}
			$ori_size1 = getimagesize($photo);
			$ori_w1 = $ori_size1[0];
			$ori_h1 = $ori_size1[1];
			if($ori_w1>=$ori_size1)
			{
				$new_w1=800;
				$new_h1=round(($new_w1/$ori_w1) * $ori_h1);
			}
			else
			{
				$new_h1=800;
				$new_w1=round(($new_h1/$ori_h1) * $ori_w1);
			}
			$new_img1 = imagecreatetruecolor($new_w1,$new_h1);
			imagecopyresized($new_img1,$ori_img1,0,0,0,0,$new_w1,$new_h1,$ori_w1,$ori_h1);
			if($ext == "jpg" or $ext == "jpeg")
			{
				imagejpeg($new_img1,"file_photos/$filename");
			}
			else if($ext == "png")
			{
				imagepng($new_img1,"file_photos/$filename");
			}
			else if($ext == "gif")
			{
				imagegif($new_img1,"file_photos/$filename");
			}
			imagedestroy($ori_img1);
			imagedestroy($new_img1);
			if($ext == "jpg" or $ext == "jpeg")
			{
				$ori_img = imagecreatefromjpeg($photo);
			}
			else if($ext =="png")
			{
				$ori_img = imagecreatefrompng($photo);
			}
			else if($ext =="gif")
			{
				$ori_img = imagecreatefromgif($photo);
			}
			$ori_size = getimagesize($photo);
			$ori_w = $ori_size[0];
			$ori_h = $ori_size[1];
			if($ori_w>=$ori_size)
			{
				$new_w=120;
				$new_h=round(($new_w/$ori_w) * $ori_h);
			}
			else
			{
				$new_h=120;
				$new_w=round(($new_h/$ori_h) * $ori_w);
			}
			$new_img = imagecreatetruecolor($new_w,$new_h);
			imagecopyresized($new_img,$ori_img,0,0,0,0,$new_w,$new_h,$ori_w,$ori_h);
			if($ext == "jpg" or $ext == "jpeg")
			{
				imagejpeg($new_img,"small_file_photos/$filename");
			}
			else if($ext == "png")
			{
				imagepng($new_img,"small_file_photos/$filename");
			}
			else if($ext == "gif")
			{
				imagegif($new_img,"small_file_photos/$filename");
			}
			imagedestroy($ori_img);
			imagedestroy($new_img);
			$sql3="update photos set photos_name='$filename' where photos_id ='$id_max'";
			$query3 = mysql_query($sql3,$conn) or die(mysql_error());
			
		}
		}
		echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
		mysql_close();
}
	
?>