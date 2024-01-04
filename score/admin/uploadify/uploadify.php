<?php
include('class/class.upload.php');
$hostname_connection = "localhost";
$database_connection = "tdev";
$username_connection = "root";
$password_connection = "1234";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection)
or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query( "SET NAMES UTF8" ) ;
 
if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetFile =  utf8_decode(str_replace('//','/',$targetPath) . $_FILES['Filedata']['name']);

	$file_id = md5($_FILES["Filedata"]["tmp_name"] + rand()*100000 + time());

	$handle = new Upload($_FILES['Filedata']);
		if ($handle->uploaded) {
			$handle->file_src_name_body      = time().$file_id; // hard name
			//$handle->file_overwrite = true;
			//$handle->file_auto_rename = false;
			$handle->image_resize            = true;
			$handle->image_ratio_y           = true;
			$handle->image_x                 = 600; //size of picture
			$handle->file_max_size = '1512000'; // max size
			$handle->Process($targetPath.'/');
			$img_part =  $handle->file_dst_name ; // name part picture
			// $handle-> Clean();
			
			
			//thumbnail creation:
			$handle->file_src_name_body      = time().$file_id; // hard name
			//$handle->file_overwrite = true;
			//$handle->file_auto_rename = false;
			$handle->image_resize            = true;
			//$handle->image_ratio_y           = true;
			$handle->image_ratio_x           = true;
			$handle->image_y                 = 100; //size of picture
			$handle->file_max_size = '1512000'; // max size
			$handle->Process($targetPath.'/'.'thumbs/');
			$img_thumb =  $handle->file_dst_name ; // name thumb picture
			
			$insertSQL = sprintf("INSERT INTO uploadify (img_part,img_thumb) VALUES ( '%s','%s' )", $img_part,$img_thumb );
            echo $insertSQL ;
            mysql_select_db($database_connection, $connection);
            $query = mysql_query($insertSQL, $connection) or die(mysql_error());
			$handle-> Clean();
			
			if($query){
			
			  echo "1";
			
			}
		} else {
		}
}	
?>