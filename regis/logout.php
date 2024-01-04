<?php
if (!isset($_SESSION)) {
  session_start();
}
	unset(  $_SESSION['admin_id']);
  unset(  $_SESSION['admin_username']);
  unset(  $_SESSION['admin_type_id']);
  unset(  $_SESSION['phone_User_admin']);
  unset(  $_SESSION['email_User_admin']);
  unset(  $_SESSION['admin_st']);
  
	 echo '<SCRIPT language="javascript">
				window.location="index.php";
				</script>';

?>
