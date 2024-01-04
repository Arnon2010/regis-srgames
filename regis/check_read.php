<?php
ob_start();
session_start();
include("connect_db.php");
if($_SESSION['admin_id']=="")
{
	header("location: index.php");
 	exit(0);
}
$arrsport_type = mysql_fetch_array(mysql_query("SELECT * FROM message_tb WHERE message_id = '".$_GET['idread']."'"));
if($_SESSION['admin_id']==$arrsport_type['id_user_admin']){
  $strSQL2 = "UPDATE message_tb SET st = '1' where message_id = '".$_GET['idread']."'";
  $objQuery2 = mysql_query($strSQL2);

  $urllink = $arrsport_type['message_url'];
    header("location: $urllink");
}
else {
  header("location: index.php");
}
?>
