<?php
ob_start();
session_start();
$file_name = 'บุคลากร-'.$_GET['u_name'].'.xls';

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$file_name");
header("Pragma: no-cache");
header("Expires: 0");

include("connect_db.php");
if($_SESSION['admin_id']=="")
{
	header("location: index.php");
 	exit(0);
}
if($_SESSION['university_id']!="0"){
  header("location: home.php");
 	exit(0);
}
$sql2 = "select * from university where id_university = '".$_GET['u_id']."' ";
$query2 = mysql_query($sql2,$conn) or die(mysql_error());
$arr2 = mysql_fetch_array($query2);

function DateThai($strDate)
{
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));

  $strMonthCut = Array("","มกราคม","กุมภาพันธ์ ","มีนาคม","เมษายน.","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear";
}
$strDate= date("Y-m-d");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
    <center>
    
        <h3>กีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ครั้งที่ 37</h3>
        <h3>ณ มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย</h3>
        <h4>วันที่ 6 - 10 กุมภาพันธ์ 2566</h4>
        <h4>รายชื่อลงทะเบียน - บุคลากร</h4>
    
    </center>
    
    <table border="1"  cellspacing="0" cellpadding="0">
    <thead>
        <tr bgcolor="#FDB913" class="mt-3">
            <th width="5%" align="center">
                <b style="font-family: thsarabun;  font-size: 16pt;">ลำดับ</b>
            </th>
            
            </th>
            <th width="20%" align="left">
                <b style="font-family: thsarabun;  font-size: 16pt;">
                ชื่อ
            </b>
            </th>
            <th width="20%" align="left">
                <b style="font-family: thsarabun;  font-size: 16pt;">
                สกุล
            </b>
            </th>
            <th width="20%" align="left">
                <b style="font-family: thsarabun;  font-size: 16pt;">
                มหาวิทยาลัย
            </b>
            </th>
            <th width="20%" align="left">
                <b style="font-family: thsarabun;  font-size: 16pt;">
                ประเภทบุคลากร
            </b>
            </th>
            
        </tr>
    <tbody>
        <?php
        $sqlsport_type2 =  "SELECT * from personnel p 
        left join type_user t ON  p.type_user = t.id_type_user
        where p.id_university = '$_GET[u_id]'
        and p.personnel_st = '0'
        order by p.personnel_name, p.personnel_lastname ASC";
        $i = 0;
        $querysport_type2 = mysql_query($sqlsport_type2,$conn) or die(mysql_error());
        $i = 0;
        while($arrsport_type2 = mysql_fetch_array($querysport_type2))
        {
        $i++;
        ?>
        <tr bgcolor="#ffffff">
        <td align="center">
            <p style="font-family: thsarabun;  font-size: 16pt;"><?php echo $i; ?></p>
        </td>
        
        <td>
            <p style="font-family: thsarabun;  font-size: 16pt;">
            <?php echo $arrsport_type2['personnel_title'].''.$arrsport_type2['personnel_name']; ?></p>
        </td>
        <td>
            <p style="font-family: thsarabun;  font-size: 16pt;">
            <?php echo $arrsport_type2['personnel_lastname']; ?></p>
        </td>
        <td>
            <p style="font-family: thsarabun;  font-size: 16pt;">
            <?php echo $_GET['u_name']; ?></p>
        </td>
        <td>
            <p style="font-family: thsarabun;  font-size: 16pt;">
            <?php echo $arrsport_type2['name_type_user']; ?></p>
        </td>
        
        </tr>
        
    
    <?php } 
    ?>
    </tbody>
    </table>
</body>
</html>
