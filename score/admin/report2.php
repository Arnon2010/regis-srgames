<?php
ob_start();
session_start();
include("connect_db.php");
if( $_SESSION['admin_id']=="")
{
	header("location: index.php");
 	exit(0);	
}
$sqladmin = "select * from admin where admin_id = '".$_SESSION['admin_id']."'";
			$queryadmin = mysql_query($sqladmin,$conn) or die(mysql_error());
			$arradmin = mysql_fetch_array($queryadmin);
			
$sqlfaculty = "select * from faculty where faculty_id='".$_SESSION['faculty_id']."' ";
					
					 $qrfaculty = mysql_query($sqlfaculty);
					$arrfaculty = mysql_fetch_array($qrfaculty);

$sqlreport = "select * from report  ";
					
					 $qrreport = mysql_query($sqlreport);
					$arrreport = mysql_fetch_array($qrreport);
echo $arrreport['report_head'];
?>
