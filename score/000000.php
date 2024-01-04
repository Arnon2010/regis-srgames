<?php
 include("connect_db.php");
 ?>
                                    
<table width="200" border="1">
  <tbody>
  
  <?php
      $sqlregis = "select * from student_sports";
      $queryregis = mysql_query($sqlregis,$conn) or die(mysql_error());
      while($arrregis = mysql_fetch_array($queryregis))
  {?>
    <tr>
      <td><?php echo $arrregis['id_student'];?></td>
      <td>
        <?php
      
      $sqlregis1 = "select * from sport_regis where id_student = '".$arrregis['id_student']."'  group by id_Sport_type";
      $queryregis1 = mysql_query($sqlregis1,$conn) or die(mysql_error());
      while($arrregis1 = mysql_fetch_array($queryregis1))
  {
	  
	  $sqlregis2 = "select * from sport_type where id_Sport_type = '".$arrregis1['id_Sport_type']."'";
      $queryregis2 = mysql_query($sqlregis2,$conn) or die(mysql_error());
      $arrregis2 = mysql_fetch_array($queryregis2);
	  
	  ?>
      
  <?php echo $arrregis2['name_Sport_type'].$idchk;?>,
   <?php 
	  
	}
	?>
      
      </td>
    </tr>
    <?php 
	}
	?>
  </tbody>
</table>




