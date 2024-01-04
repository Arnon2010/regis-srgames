<style>
	img{ max-width:50%; border:none;}
</style>
<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
if($_GET['rev']==1){
    ?>

    <table class="table table-hover" >
                                    <thead>
                                      <tr >
                                        <td >ลำดับ</td>
                                        <td >มหาวิทยาลัย</td>
                                        <td align="center"><img src="admin/img/1.png" alt=""/></td>
                                        <td align="center"><img src="admin/img/2.png"  alt=""/></td>

                                        <td align="center"><img src="admin/img/3.png"  alt=""/></td>
                                       <td >รวม</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									 include("connect_db.php");
									 $sql11 = "select * from medal order by faculty_1 desc,faculty_2 desc,faculty_3 desc";
								  $qr11 = mysql_query($sql11);
								  $t = 1;
								  while($arr11 = mysql_fetch_array($qr11))
								  {
									?>
                                    <tr>
                                    <td ><?php echo $t; ?></td>
                                    <td><?php if($t==1 && $arr11['faculty_1']!="0"){ ?>
                                                                       <?php }
																			$faculty1 = mysql_fetch_array(mysql_query("select * from university where id_university = '".$arr11['faculty_id']."'")); ?>  
                                      <a  href="index.php?menu=medal_detail&FID=<?php echo $arr11['faculty_id'];?>&go=fixture"><?php echo $faculty1['subname_university']; ?></a></td>
                                    <td align="center"><?php echo $arr11['faculty_1']; ?></td>
                                    <td align="center"><?php echo $arr11['faculty_2']; ?></td>
                                    <td align="center"><?php echo $arr11['faculty_3']; ?></td>
                                    <td align="center"><?php echo $aaa=$arr11['faculty_1']+$arr11['faculty_2']+$arr11['faculty_3'] ; ?></td>
                                    </tr>
                                    <?php
									$t++;
								  }
									?>
                                    </tbody>
                                    </table>
    <?php
    exit;
}
?>
