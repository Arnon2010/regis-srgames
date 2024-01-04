<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>This is a Heading</h1>
<p>This is a paragraph.</p>

<?php
include("../../connect_db.php");

$u_id = $_GET['u_id'];
$sql = "SELECT  r.id_student, s.title_name, s.f_name, s.l_name, s.pic_student, u.subname_university
	FROM sport_regis r
    INNER JOIN student_sports s ON r.id_student = s.id_student
    INNER JOIN university u ON s.id_university = u.id_university
	WHERE r.id_university = '$u_id'
    GROUP BY r.id_student";
$result = mysql_query($sql);
$numrow = mysql_num_rows($result);
$i=0;
while($row=mysql_fetch_array($result)){ $i++;

?>
    <p><?php echo 'No.'.$i;?></p>
    <p><img src="<?php echo '../../filesutdent/'.$row['pic_student'];?>" width="70" /></p>

<?php }?>

</body>
</html>