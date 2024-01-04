<style>
        @import url('https://fonts.googleapis.com/css?family=Kanit:400,400i,500,500i,600,600i,700,700i&display=swap&subset=latin-ext,thai');
        body {
            font-family: 'Kanit', sans-serif;
             font-size: 18px;
           }

}
        </style>
<table width="100%" border="0">
  <tbody>
    <tr>
      <th width="10%" scope="col">&nbsp;</th>
      <th width="50%" scope="col">&nbsp;</th>
      <th width="10%" scope="col" bgcolor="#e3bb1c">G</th>
      <th width="10%" scope="col" bgcolor="#adadad">S</th>
      <th width="10%" scope="col" bgcolor="#c68a2b">B</th>
      <th width="10%" scope="col">รวม</
    </tr>
    <?php
include("connect_db.php");
$sql11 = "select * from medal order by faculty_1 desc,faculty_2 desc,faculty_3 desc";
$qr11 = mysql_query($sql11);
$t = 1;
while($arr11 = mysql_fetch_array($qr11))
{
?>
    <tr>
	   <td colspan="6"><div style="width: 100%;height: 2px;border-top:1px solid #ebebeb;margin: 0 0 3px 0;"></div></td>
    </tr>
    <tr>
      <td scope="row"><?php echo $t; ?>.</td>
      <td><?php if($t==1 && $arr11['faculty_1']!="0"){ ?>
                                         <?php }
        $faculty1 = mysql_fetch_array(mysql_query("select * from university where id_university = '".$arr11['faculty_id']."'")); ?><?php echo $faculty1['subname_university']; ?></td>
        <td align="center"><?php echo $arr11['faculty_1']; $faculty_1 = $faculty_1+$arr11['faculty_1']; ?></td>
        <td align="center"><?php echo $arr11['faculty_2'];  $faculty_2 = $faculty_2+$arr11['faculty_2']; ?></td>
        <td align="center"><?php echo $arr11['faculty_3'];  $faculty_3 = $faculty_3+$arr11['faculty_3']; ?></td>
        <td align="center"><?php echo $aaa=$arr11['faculty_1']+$arr11['faculty_2']+$arr11['faculty_3']; $suma = $suma + $aaa; ?></td>
    </tr>
<?php
	$t++;
 } ?>
    <tr>
	   <td colspan="6"><div style="width: 100%;height: 5px;border-top:2px solid #333;margin-top: 8px;"></div></td>
    </tr>
    <tr>

      <td colspan="2" align="center">รวม</td>
      <td align="center"><?php echo $faculty_1; ?></td>

      <td align="center"><?php echo $faculty_2; ?></td>
<td align="center"><?php echo $faculty_3; ?></td>
<td align="center"><?php echo $suma; ?></td>
    </tr>
    <tr>
	   <td colspan="6"><div style="width: 100%;height: 5px;border-top:2px solid #333;margin-top: 8px;"></div></td>
    </tr>
  </tbody>
</table>
