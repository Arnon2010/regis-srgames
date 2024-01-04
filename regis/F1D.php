<?php
ob_start();
session_start();
include("connect_db.php");
$checkadd = 0;
if($_SESSION['admin_id']=="" )
{
 header("location: index.php");
 exit(0);
}
else {
 if($_GET['action']=="add")
 {
   $name_user_admin = $_POST['name_user_admin'];
   $username_user_admin = $_POST['username_user_admin'];
   $password_user_admin = md5(md5(md5($_POST['password_user_admin'])));
   $id_Type_admin = $_POST['id_Type_admin'];
   $id_university = $_POST['id_university'];
   $phone_User_admin = $_POST['phone_User_admin'];
   $email_User_admin = $_POST['email_User_admin'];
   $st_User_admin = 0;
   $st = 0;
   $strSQL = "INSERT INTO user_admin
VALUES (null,'$name_user_admin','$username_user_admin','$password_user_admin','$id_Type_admin','$id_university','$phone_User_admin','$email_User_admin','$st_User_admin','$st')";
   $objQuery = mysql_query($strSQL);
   $checkadd = 1;
 }
 else if($_GET['action']=="delect")
 {

   $strSQL = "update user_admin  set st = '1' where id_user_admin = '".$_GET['checkdel']."'";
   $objQuery = mysql_query($strSQL);
   $checkadd = 2;
   echo '<SCRIPT language="javascript">

       window.location="home.php?menu=admin";
       </script>';
 }

}
?>
<!-- BEGIN VENDOR CSS-->
 <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/select.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/fixedColumns.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
   <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
 <!-- END VENDOR CSS-->
 <!-- BEGIN MODERN CSS-->
 <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
 <!-- END MODERN CSS-->
 <!-- BEGIN Page Level CSS-->
 <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
 <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
 <link rel="stylesheet" type="text/css" href="app-assets/css/pages/users.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/checkboxes-radios.css">
 <!-- END Page Level CSS-->
 <!-- BEGIN Custom CSS-->
 <link rel="stylesheet" type="text/css" href="assets/css/style.css">
 <!-- END Custom CSS-->

 <div class="app-content content">
   <div class="content-wrapper">
     <div class="content-header row">
       <div class="content-header-left col-md-6 col-12 mb-2">
         <h3 class="content-header-title"> ข้อมูลการลงทะเบียน F1</h3>
         <div class="row breadcrumbs-top">
           <div class="breadcrumb-wrapper col-12">
             <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
               </li>
               <li class="breadcrumb-item"><a href="home.php?menu=f1dashborad"> ข้อมูลการลงทะเบียน F1</a>
               </li>

             </ol>
           </div>
         </div>
       </div>
       <div class="content-header-right col-md-6 col-12">

       </div>
     </div>
  <div class="content-body">
    <section id="scrolling">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <?php if($_SESSION['university_id']!="0")
                  { ?>
  <button class="btn btn-primary btn-sm" onclick="window.open('reportF1.php','_blank')"><i class="la la-print white"></i>PRINT F1</button>
<?php  }?>
                  <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                </ul>
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body card-dashboard">

                <table class="table table-striped table-bordered order-column dataex-basic-initialisation">
                  <thead>
                    <tr>
                      <th rowspan="2"  class="text-center"  >ประเภทการแข่งขันกีฬา</th>
                          <th colspan="2">มทร.กรุงเทพ</th>
                          <th colspan="2">มทร.ตะวันออก</th>
                          <th colspan="2">มทร.ธัญบุรี</th>
                          <th colspan="2">มทร.พระนคร</th>
                          <th colspan="2">มทร.รัตนโกสินทร์</th>
                          <th colspan="2">มทร.ล้านนา</th>
                          <th colspan="2">มทร.ศรีวิชัย</th>
                          <th colspan="2">มทร.สุวรรณภูมิ</th>
                          <th colspan="2">มทร.อีสาน</th>
                          <th colspan="2">สรุป</th>
  			            </tr>
                    <tr class="text-center">
                      <th class="text-center">ชาย</th>
                      <th class="text-center">หญิง</th>
                      <th class="text-center">ชาย</th>
                      <th class="text-center">หญิง</th>
                      <th class="text-center">ชาย</th>
                      <th class="text-center">หญิง</th>
                      <th class="text-center">ชาย</th>
                      <th class="text-center">หญิง</th>
                      <th class="text-center">ชาย</th>
                      <th class="text-center">หญิง</th>
                      <th class="text-center">ชาย</th>
                      <th class="text-center">หญิง</th>
                      <th class="text-center">ชาย</th>
                      <th class="text-center">หญิง</th>
                      <th class="text-center">ชาย</th>
                      <th class="text-center">หญิง</th>
                      <th class="text-center">ชาย</th>
                      <th class="text-center">หญิง</th>
                      <th class="text-center">ชาย</th>
                      <th class="text-center">หญิง</th>
                  </tr>
          </thead>
      <tbody>
      <tr>
      <?php
      $sqlsports = "SELECT * FROM sports_category 
        ORDER BY id_Sport_type ASC ";
      $querysports = mysql_query($sqlsports,$conn) or die(mysql_error());
      while($arrsports = mysql_fetch_array($querysports))
      {

        $totalM = 0;
        $totalF = 0;
                      ?>
  			<td><?php echo $arrsports['name_Sports_category']; ?></td>
  									<td class="text-center"><?php
                    $sqlsports1 = "SELECT * FROM tb_f1 WHERE id_unversity='1' AND id_Sports_category='".$arrsports['id_Sports_category']."' ";
                    $querysports1 = mysql_query($sqlsports1,$conn) or die(mysql_error());
                    $arrsports1 = mysql_fetch_array($querysports1);
                    if($arrsports1['M']=="1")
                    {
                        //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                        echo '<div><strong>/</strong></div>';
                        $totalM += 1;
                    }

                    ?></td>

        									<td class="text-center"><?php
                          $sqlsports11 = "select * from tb_f1 where id_unversity='1' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
                          $querysports11 = mysql_query($sqlsports11,$conn) or die(mysql_error());
                          $arrsports11 = mysql_fetch_array($querysports11);
                          if($arrsports11['F']=="1")
                          {
                            echo '<div><strong>/</strong></div>';
                            //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                            $totalF += 1;

                          }

                          ?></td>
  											<td class="text-center"><?php
                        $sqlsports2 = "select * from tb_f1 where id_unversity='2' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
                        $querysports2 = mysql_query($sqlsports2,$conn) or die(mysql_error());
                        $arrsports2 = mysql_fetch_array($querysports2);
                        if($arrsports2['M']=="1")
                        {
                          //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                          echo '<div><strong>/</strong></div>';
                          $totalM += 1;
                        }

                        ?></td>
  						<td class="text-center"><?php
              $sqlsports22 = "select * from tb_f1 where id_unversity='2' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
              $querysports22 = mysql_query($sqlsports22,$conn) or die(mysql_error());
              $arrsports22 = mysql_fetch_array($querysports22);
              if($arrsports22['F']=="1")
              {
                //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                echo '<div><strong>/</strong></div>';
                $totalF += 1;
              }

              ?></td>
  											<td class="text-center"><?php
                        $sqlsports3 = "select * from tb_f1 where id_unversity='3' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
                        $querysports3 = mysql_query($sqlsports3,$conn) or die(mysql_error());
                        $arrsports3 = mysql_fetch_array($querysports3);
                        if($arrsports3['M']=="1")
                        {
                          //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                          echo '<div><strong>/</strong></div>';
                          $totalM += 1;
                        }

                        ?></td>
  						<td class="text-center"><?php
              $sqlsports33 = "select * from tb_f1 where id_unversity='3' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
              $querysports33 = mysql_query($sqlsports33,$conn) or die(mysql_error());
              $arrsports33 = mysql_fetch_array($querysports33);
              if($arrsports33['F']=="1")
              {
                //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                echo '<div><strong>/</strong></div>';
                $totalF += 1;
              }

              ?></td>
  											<td class="text-center"><?php
                        $sqlsports4 = "select * from tb_f1 where id_unversity='4' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
                        $querysports4 = mysql_query($sqlsports4,$conn) or die(mysql_error());
                        $arrsports4 = mysql_fetch_array($querysports4);
                        if($arrsports4['M']=="1")
                        {
                          //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                          echo '<div><strong>/</strong></div>';
                          $totalM += 1;
                        }

                        ?></td>
  						<td class="text-center"><?php
              $sqlsports44 = "select * from tb_f1 where id_unversity='4' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
              $querysports44 = mysql_query($sqlsports44,$conn) or die(mysql_error());
              $arrsports44 = mysql_fetch_array($querysports44);
              if($arrsports44['F']=="1")
              {
                //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                echo '<div><strong>/</strong></div>';
                $totalF += 1;
              }

              ?></td>
  											<td class="text-center"><?php
                        $sqlsports5 = "select * from tb_f1 where id_unversity='5' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
                        $querysports5 = mysql_query($sqlsports5,$conn) or die(mysql_error());
                        $arrsports5 = mysql_fetch_array($querysports5);
                        if($arrsports5['M']=="1")
                        {
                          //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                          echo '<div><strong>/</strong></div>';
                          $totalM += 1;
                        }

                        ?></td>
  						<td class="text-center"><?php
              $sqlsports55 = "select * from tb_f1 where id_unversity='5' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
              $querysports55 = mysql_query($sqlsports55,$conn) or die(mysql_error());
              $arrsports55 = mysql_fetch_array($querysports55);
              if($arrsports55['F']=="1")
              {
                //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                echo '<div><strong>/</strong></div>';
                $totalF += 1;
              }

              ?></td>
  											<td class="text-center"><?php
                        $sqlsports6 = "select * from tb_f1 where id_unversity='6' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
                        $querysports6 = mysql_query($sqlsports6,$conn) or die(mysql_error());
                        $arrsports6 = mysql_fetch_array($querysports6);
                        if($arrsports6['M']=="1")
                        {
                          //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                          echo '<div><strong>/</strong></div>';
                          $totalM += 1;
                        }

                        ?></td>
  						<td class="text-center"><?php
              $sqlsports66 = "select * from tb_f1 where id_unversity='6' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
              $querysports66 = mysql_query($sqlsports66,$conn) or die(mysql_error());
              $arrsports66 = mysql_fetch_array($querysports66);
              if($arrsports66['F']=="1")
              {
                //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                echo '<div><strong>/</strong></div>';
                $totalF += 1;
              }

              ?></td>
  											<td class="text-center"><?php
                        $sqlsports7 = "select * from tb_f1 where id_unversity='7' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
                        $querysports7 = mysql_query($sqlsports7,$conn) or die(mysql_error());
                        $arrsports7 = mysql_fetch_array($querysports7);
                        if($arrsports7['M']=="1")
                        {
                          //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                          echo '<div><strong>/</strong></div>';
                          $totalM += 1;
                        }

                        ?></td>
  						<td class="text-center"><?php
              $sqlsports77 = "select * from tb_f1 where id_unversity='7' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
              $querysports77 = mysql_query($sqlsports77,$conn) or die(mysql_error());
              $arrsports77 = mysql_fetch_array($querysports77);
              if($arrsports77['F']=="1")
              {
                //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                echo '<div><strong>/</strong></div>';
                $totalF += 1;
              }

              ?></td>
  											<td class="text-center"><?php
                        $sqlsports8 = "select * from tb_f1 where id_unversity='8' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
                        $querysports8 = mysql_query($sqlsports8,$conn) or die(mysql_error());
                        $arrsports8 = mysql_fetch_array($querysports8);
                        if($arrsports8['M']=="1")
                        {
                          //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                          echo '<div><strong>/</strong></div>';
                          $totalM += 1;
                        }

                        ?></td>
  						<td class="text-center"><?php
              $sqlsports88 = "select * from tb_f1 where id_unversity='8' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
              $querysports88 = mysql_query($sqlsports88,$conn) or die(mysql_error());
              $arrsports88 = mysql_fetch_array($querysports88);
              if($arrsports88['F']=="1")
              {
                //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                echo '<div><strong>/</strong></div>';
                $totalF += 1;
              }

              ?></td>
  											<td class="text-center"><?php
                        $sqlsports9 = "select * from tb_f1 where id_unversity='9' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
                        $querysports9 = mysql_query($sqlsports9,$conn) or die(mysql_error());
                        $arrsports9 = mysql_fetch_array($querysports9);
                        if($arrsports9['M']=="1")
                        {
                          //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                          echo '<div><strong>/</strong></div>';
                          $totalM += 1;
                        }

                        ?></td>
  						<td class="text-center"><?php
              $sqlsports99 = "select * from tb_f1 where id_unversity='9' and id_Sports_category='".$arrsports['id_Sports_category']."' ";
              $querysports99 = mysql_query($sqlsports99,$conn) or die(mysql_error());
              $arrsports99 = mysql_fetch_array($querysports99);
              if($arrsports99['F']=="1")
              {
                //echo '<div class="state icheckbox_flat-blue checked mr-1"></div>';
                echo '<div><strong>/</strong></div>';
                $totalF += 1;
              }

              ?></td>
              <td>
                <?php echo $totalM;?>
              </td>
              <td>
                <?php echo $totalF;?>
              </td>
  							</tr>
              <?php } ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
   </div>
 </div>


<!-- BEGIN VENDOR JS-->
 <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
 <!-- BEGIN VENDOR JS-->
 <!-- BEGIN PAGE VENDOR JS-->
 <script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
 <script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
 <script src="app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
 <script src="app-assets/vendors/js/tables/datatable/dataTables.fixedColumns.min.js"
 type="text/javascript"></script>
 <script src="app-assets/vendors/js/tables/buttons.colVis.min.js" type="text/javascript"></script>
 <script src="app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"
 type="text/javascript"></script>
 <script src="app-assets/vendors/js/tables/datatable/dataTables.select.min.js"
 type="text/javascript"></script>
 <script src="app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"
 type="text/javascript"></script>
 <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
 <!-- END PAGE VENDOR JS-->
 <!-- BEGIN MODERN JS-->
 <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
 <script src="app-assets/js/core/app.js" type="text/javascript"></script>
 <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
 <!-- END MODERN JS-->
 <!-- BEGIN PAGE LEVEL JS-->
 <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
 <script src="app-assets/js/scripts/tables/datatables-extensions/datatable-fixed-column.js"
 type="text/javascript"></script>
   <script src="app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
 <!-- END PAGE LEVEL JS-->
