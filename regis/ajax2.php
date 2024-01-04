<?php
//************ MySQL Check *************//

ob_start();
session_start();
include("connect_db.php");
if($_SESSION['admin_id']=="")
{
	header("location: index.php");
 	exit(0);
}
$strSQL = "SELECT * FROM student_sports WHERE CITIZEN_ID = '".trim($_POST["User"])."' ";
$objQuery = mysql_query($strSQL);
$intRows = mysql_num_rows($objQuery);
$arradmin = mysql_fetch_array($objQuery);
if($intRows>0)
{
echo "[".$_POST["User"]."] หมายเลขบัตรนี้มีในระบบแล้ว."."<br>";
	if($arradmin['st']!=9)
	{
		echo "<a href='home.php?menu=player&id=".$_POST["User"]."'>ต้องการแก้ไขข้อมูลคลิกที่นี่</a>";
	}else{
		echo "<a href='#'>ข้อมูลได้ผ่านการอนุมัติแล้ว</a>";
		}
}
?>