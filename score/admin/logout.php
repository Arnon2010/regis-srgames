<?php
if (!isset($_SESSION)) {
  session_start();
}
	unset($_SESSION['admin_id']);
	unset($_SESSION['admin_username']);
	unset($_SESSION['admin_type_id']);
	 echo '<SCRIPT language="javascript">
				window.location="index.php";
				</script>'; 

?>