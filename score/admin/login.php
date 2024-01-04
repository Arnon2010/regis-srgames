<?php
ob_start();
session_start();
if($_GET['go']=="edit")
{
			include("connect_db.php");

			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$sql = "select * from admin where username = '$username' and password = '$password'";
			 $query = mysql_query($sql,$conn) or die(mysql_error());
				$arr = mysql_fetch_array($query);
				 if($username==$arr['username'] && $password==$arr['password']){ 
				 $_SESSION['id_admin'] = $arr['id_admin'];
							 $_SESSION['username'] = $arr['username'];
							 $_SESSION['passname'] = $arr['passname'];
							 $_SESSION['passname'] = $arr['passname'];
								if($_POST['check']==0)
								{
								 	@setcookie("chant_id",$_SESSION['usermem'], time() + 259200);
								   	@setcookie("chant_id2",$_SESSION['passmem'], time() + 259200);
								    @setcookie("chant_id3",$_SESSION['st'], time() + 259200);
									echo '<SCRIPT language="javascript">
											window.location="index.php?menu=home";
											</script>'; 
 exit(0);	
								}
				 }
				 else
				 {
					 echo '<SCRIPT language="javascript">
					 		alert("username หรือ password ผิด");
							window.location="index.php?menu=login";
							</script>'; 

				 }
	
	
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php if($_SESSION['id_admin']==""){?>
        <section class="content">
		  <div class="row">
            <div class="col-md-4">
              <div class="box box-primary">
      <div class="login-logo">
      <br>
        <a href="index2.html"><b>RMUTTO</b> e-document</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="login.php?go=edit" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="username" name="username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            
          </div>
         <?php  echo $a; ?>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" value="0" name="check"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">เข้าสู่ระบบ</button>
            </div><!-- /.col -->
          </div>
        </form><!-- /.social-auth-links --></div><!-- /.login-box-body -->
              </div>
              
            </div><!-- /.col -->
  		  </div><!-- ./row -->
		</section><!-- /.content -->
<?php }else{ echo '<SCRIPT language="javascript">
				window.location="index.php";
				</script>'; }?>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
