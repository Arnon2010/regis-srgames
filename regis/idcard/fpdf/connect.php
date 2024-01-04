<?php
mysql_connect("linuxdb2.rmutsv.ac.th","srgames","HjCZhaLurFr2XJQP") or die(mysql_error());
mysql_select_db("srgames_system");
mysql_query("set names utf8");

$sql = "select * from `setting` ";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$_SESSION[sgames_name] = $row[name];
$_SESSION[sgames_desire] = $row[desire];
$_SESSION[sgames_regis] = $row[regis];
$_SESSION[sgames_program] = $row[program];
$_SESSION[sgames_line] = $row[line];
$_SESSION[splayer_regis] = $row[player_regis];
$_SESSION[handler_regis] = $row[handler_regis];
?>