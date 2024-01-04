<?php
	$hostname_connection = "localhost";
	$database_connection = "tdev";
	$username_connection = "root";
	$password_connection = "1234";
	$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection)
	or trigger_error(mysql_error(),E_USER_ERROR); 
	mysql_query( "SET NAMES UTF8" ) ;
	mysql_select_db($database_connection, $connection);
	$query=mysql_query("SELECT * FROM uploadify");          
    ?>
	<ul>
		 <?php           
               while($rs=mysql_fetch_array($query))
			   {
		  ?>
             <li>
             <a href='uploads/<?=$rs['img_part']?>' ><img  src='uploads/thumbs/<?=$rs['img_thumb']?>'/></a>	
             </li>
        <?php }?> 
	</ul>