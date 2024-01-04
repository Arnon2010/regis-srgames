<?php
ob_start();
session_start();
include("connect_db.php");
$checkadd = 0;
if($_SESSION['admin_id']=="")
{
 header("location: index.php");
 exit(0);
}
if($_SESSION['admin_st']=="0")
{
 header("location: index.php");
 exit(0);
}
else {

 if($_GET['action']=="add")
 {
   $id_student = $_POST['id_student'];
   $id_Sports_category = $_POST['id_Sports_category'];
   $id_Sport_type = $_POST['id_Sport_type'];
   $id_university = $_SESSION['university_id'];
   $sex = $_POST['sex'];
   $id_user_admin = $_SESSION['admin_id'];
   $arrusername = mysql_fetch_array(mysql_query("SELECT * FROM user_admin WHERE username_user_admin = '".$_POST['username_user_admin']."'"));
   $strSQL = "INSERT INTO sport_regis VALUES (null,'$id_student','$id_Sports_category','$id_Sport_type','$id_university','$sex','$id_user_admin')";
   $objQuery = mysql_query($strSQL);
   $checkadd = 1;
}


 else if($_GET['action']=="delect")
 {
   $strsql2 = "delete from sport_regis where sport_regis_id = '".$_GET['checkdel']."'";
   $query3 = mysql_query($strsql2) or die(mysql_error());

   echo '<SCRIPT language="javascript">

       window.location="home.php?menu=regissport&tab='; echo $_GET['tab'];  echo '&tab2='; echo $_GET['tab2'];  echo '";
       </script>';
 }


}
?>
<!-- BEGIN VENDOR CSS-->
 <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/toggle/switchery.min.css">
   <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/selects/select2.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
 <!-- END VENDOR CSS-->
 <!-- BEGIN MODERN CSS-->
 <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
 <!-- END MODERN CSS-->
 <!-- BEGIN Page Level CSS-->
 <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
 <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
 <link rel="stylesheet" type="text/css" href="app-assets/css/pages/users.css">
 <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/switch.css">
 <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">

<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-callout.css">

 <!-- END Page Level CSS-->
 <!-- BEGIN Custom CSS-->
 <link rel="stylesheet" type="text/css" href="assets/css/style.css">
 <!-- END Custom CSS-->
 <link href="sweetalert/sweetalert.css" rel="stylesheet" />
<script src="sweetalert/sweetalert.min.js"></script>

 <div class="app-content content">
   <div class="content-wrapper">
     <div class="content-header row">
       <div class="content-header-left col-md-6 col-12 mb-2">
         <h3 class="content-header-title">ลงทะเบียนทีมการแข่งขัน</h3>
         <div class="row breadcrumbs-top">
           <div class="breadcrumb-wrapper col-12">
             <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
               </li>
               <li class="breadcrumb-item"><a href="home.php?menu=regissport">ลงทะเบียนทีมการแข่งขัน</a>
               </li>
               <li class="breadcrumb-item"><?php echo $arr2['name_university']; ?>
               </li>
             </ol>
           </div>
         </div>
       </div>
       <div class="content-header-right col-md-6 col-12">

       </div>
     </div>
     <div class="col-xl-12 col-lg-12">
       <div class="card">
         <div class="card-header">
           <h4 class="card-title">ลงทะเบียนทีมการแข่งขัน:<?php $arrsport_type = mysql_fetch_array(mysql_query("SELECT * FROM sport_type WHERE id_Sport_type = '".$_SESSION['admin_st']."'")); echo $arrsport_type['name_Sport_type']; ?></h4>
         </div>
         <div class="card-content">
           <div class="card-body">
             <div class="nav-vertical">
               <ul class="nav nav-tabs nav-left">
                 <?php
     								$sqlsport_type = "SELECT sports_category.id_Sports_category,sports_category.name_Sports_category   from sports_category INNER JOIN tb_f1 ON sports_category.id_Sports_category = tb_f1.id_Sports_category  where (sports_category.id_Sport_type='".$_SESSION['admin_st']."' and tb_f1.id_unversity = '".$_SESSION['university_id']."') and (tb_f1.M='1'or tb_f1.F='1') ";
     $querysport_type = mysql_query($sqlsport_type,$conn) or die(mysql_error());
     while($arrsport_type = mysql_fetch_array($querysport_type))
     {

     								?>
                 <li class="nav-item">
                   <a class="nav-link <?php if($_GET['tab']==$arrsport_type['id_Sports_category']){ echo 'active';} ?>" id="baseVerticalLeft2-tab<?php echo $arrsport_type['id_Sports_category']; ?>" data-toggle="tab" aria-controls="tabVerticalLeft21"
                   href="#tabVerticalLeft2<?php echo $arrsport_type['id_Sports_category']; ?>" aria-expanded="true"><i class="la la-align-justify"></i><?php echo $arrsport_type['name_Sports_category']; ?></a>
                 </li>
               <?php  }?>
               </ul>
               <div class="tab-content px-1">
                 <?php
     								$sqlsport_type2 = "SELECT sports_category.id_Sports_category,sports_category.id_Sport_type,sports_category.name_Sports_category,sports_category.playerM,sports_category.playerF,tb_f1.M,tb_f1.F   from sports_category INNER JOIN tb_f1 ON sports_category.id_Sports_category = tb_f1.id_Sports_category  where (sports_category.id_Sport_type='".$_SESSION['admin_st']."' and tb_f1.id_unversity = '".$_SESSION['university_id']."') and (tb_f1.M='1'or tb_f1.F='1') ";
     $querysport_type2 = mysql_query($sqlsport_type2,$conn) or die(mysql_error());
     while($arrsport_type2 = mysql_fetch_array($querysport_type2))
     {
     								?>
                 <div role="tabpanel" class="tab-pane <?php if($_GET['tab']==$arrsport_type2['id_Sports_category']){ echo 'active';} ?>" id="tabVerticalLeft2<?php echo $arrsport_type2['id_Sports_category']; ?>" aria-expanded="true"
                 aria-labelledby="baseVerticalLeft2-tab<?php echo $arrsport_type2['id_Sports_category']; ?>">
                 <div class="col-xl-12 col-lg-12">
                   <div class="card">

                     <div class="card-content">
                       <div class="card-body">
                         <ul class="nav nav-tabs nav-linetriangle">
                           <?php if( $arrsport_type2['M']==1){?>
                           <li class="nav-item">
                             <a class="nav-link <?php if($_GET['tab2']=='M' and $_GET['tab']==$arrsport_type2['id_Sports_category']){echo 'active'; } ?><" id="baseIcon-tab3<?php echo $arrsport_type2['id_Sports_category']; ?>1" data-toggle="tab" aria-controls="tabIcon3<?php echo $arrsport_type2['id_Sports_category']; ?>1"
                             href="#tabIcon3<?php echo $arrsport_type2['id_Sports_category']; ?>1" aria-expanded="true"><i class="la la-user-secret"></i>ชาย</a>
                           </li>
                         <?php }if( $arrsport_type2['F']==1){ ?>
                           <li class="nav-item">
                             <a class="nav-link <?php if($_GET['tab2']=='F' and $_GET['tab']==$arrsport_type2['id_Sports_category']){echo 'active'; } ?>" id="baseIcon-tab3<?php echo $arrsport_type2['id_Sports_category']; ?>2" data-toggle="tab" aria-controls="tabIcon3<?php echo $arrsport_type2['id_Sports_category']; ?>2"
                             href="#tabIcon3<?php echo $arrsport_type2['id_Sports_category']; ?>2" aria-expanded="false"><i class="la la-female"></i>หญิง</a>
                           </li>
<?php } ?>
                         </ul>
                         <div class="tab-content px-1 pt-1">
                            <?php if( $arrsport_type2['M']==1){?>
                           <div role="tabpanel" class="tab-pane <?php if($_GET['tab2']=='M' and $_GET['tab']==$arrsport_type2['id_Sports_category']){echo 'active'; } ?>" id="tabIcon3<?php echo $arrsport_type2['id_Sports_category']; ?>1" aria-expanded="true"
                           aria-labelledby="baseIcon-tab3<?php echo $arrsport_type2['id_Sports_category']; ?>1">
                           <div class="app-content content">
                             <div class="content-wrapper">

                               <div class="content-detached content-right">
                                 <div class="content-body">
                                   <section class="row">
                                     <div class="col-12">
                                       <div class="card">
                                         <div class="card-head">
                                           <div class="card-header">
                                             <h4 class="card-title">นักกีฬา:<?php echo $arrsport_type2['name_Sports_category']; ?></h4>
                                             <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                             <div class="text-center" id="example-caption-2"><h3>จำนวนนักกีฬา  <?php

                                             $countst = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM sport_regis WHERE id_Sports_category = '".$arrsport_type2['id_Sports_category']."' and id_university ='".$_SESSION['university_id']."' and sex='M' "));
                                              echo $countst['total'];
                                              ?>/<?php echo $arrsport_type2['playerM']; ?></h3></div>
                           <div class="progress">
                             <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0"
                             aria-valuemax="2" style="width:<?php  $countw=($countst['total']/$arrsport_type2['playerM'])*100; echo $countw.'%';  ?>" aria-describedby="example-caption-2"></div>
                           </div>
                                         </div>
                                         <div class="card-content">
                                           <div class="card-body">
                                             <!-- Task List table -->
                                             <div class="table-responsive">
                                               <table id="users-contacts<?php echo $arrsport_type2['id_Sports_category']; ?>" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                                 <thead>
                                                   <tr>

                                                     <th>ชื่อนักกีฬา</th>

                                                     <th>มหาวิทยาลัย</th>
         <th>ลบ</th>
                                                   </tr>
                                                 </thead>
                                                 <tbody>
                                     <?php

                                         $sqladmin = "select * from sport_regis where id_Sports_category='".$arrsport_type2['id_Sports_category']."' and id_university='".$_SESSION['university_id']."' and sex='M'";
                          $queryadmin = mysql_query($sqladmin,$conn) or die(mysql_error());
                          while($arradmin = mysql_fetch_array($queryadmin))
                          {
                                         ?>
                                                   <tr>

                                                     <td>
                                                       <?php   $arrnames = mysql_fetch_array(mysql_query("SELECT * FROM student_sports WHERE id_student = '".$arradmin['id_student']."'")); ?>
                                                       <div class="media">
                                                         <div class="media-left pr-1">
                                                           <span class="avatar avatar-sm avatar-online rounded-circle">
                                                             <img src="filesutdent/<?php echo $arrnames['pic_student']; ?>" alt="avatar"><i></i></span>
                                                         </div>
                                                         <div class="media-body media-middle">
                                                           <a href="home.php?menu=view&id=<?php echo $arrnames['id_student']; ?>" class="media-heading" target="_blank"><?php echo $arrnames['title_name'].$arrnames['f_name']."  ".$arrnames['l_name']; ?></a>
                                                         </div>
                                                       </div>
                                                     </td>

                                                     <td>	<?php
                                         $sql3 = "select * from  university where id_university = '".$arradmin['id_university']."'  ";
                          $query3 = mysql_query($sql3,$conn) or die(mysql_error());
                          $arr3 = mysql_fetch_array($query3);
                          echo $arr3['name_university'];
                                         ?></td>
                                         <td>

 <button type="button" class="btn btn-block btn-outline-primary mb-2"  onclick="archiveFunction(<?php echo $arradmin['sport_regis_id'];  ?>,<?php echo $arrsport_type2['id_Sports_category']; ?>,'M')"><i class="ft-trash-2"></i> ลบ</button>
                                         </td>
                                                   </tr>

                          <?php } ?>

                                                 </tbody>
                                                 <tfoot>
                                                   <tr>
                                                     <th>ชื่อนักกีฬา</th>

                                                     <th>มหาวิทยาลัย</th>
                                                     <th>ลบ</th>

                                                   </tr>
                                                 </tfoot>
                                               </table>
                                             </div>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
									 </div>
                                   </section>
                                 </div>
                               </div>
                               <div class="sidebar-detached sidebar-left" ,=",">
                              <div  class="sidebar">
                                   <div class="bug-list-sidebar-content">
                                 <div class="card">
                                         <div class="card-header">
                                           <h4 class="card-title">เลือกนักกีฬาที่จะทำการลงแข่งขัน</h4>
                                           <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                                         </div>
                                         <div class="card-content collapse show">
                                           <div class="card-body">
                                             <form class="form-horizontal" method="post" action="home.php?menu=regissport&action=add&tab=<?php echo $arrsport_type2['id_Sports_category'] ?>&tab2=M" novalidate>
                                               <div class="row">
                                                 <?php if($countw!=100){ ?>
                                                 <div class="col-lg-12 col-md-12">

                                                   <div class="form-group">
                                                     <h5>รายชื่อนักกีฬา
                                                       <span class="required">*</span>
                                                     </h5>
                                                     <div class="controls">
                                                       <select name="id_student"  required class="select2 form-control" style="width: 100%">
                                                         <option value="">-- กรุณาเลือก --</option>
                                         <?php
                                         $sql2 = "select * from student_sports where id_university='".$_SESSION['university_id']."' and st!='1' and title_name='นาย' ";
                          $query2 = mysql_query($sql2,$conn) or die(mysql_error());
                          while($arr2 = mysql_fetch_array($query2))
                          {
                            $arrcst = mysql_fetch_array(mysql_query("SELECT * FROM sport_regis WHERE id_student = '".$arr2['id_student']."' and id_Sports_category='".$arrsport_type2['id_Sports_category']."' "));
                            if(  $arrcst['sport_regis_id']==""){


                                         ?>
                                                         <option value="<?php echo $arr2['id_student']; ?>"><?php echo $arr2['title_name'].$arr2['f_name']."  ".$arr2['l_name']; ?></option>
                          <?php }}?>
                                                       </select>
                                                     </div>
                                                     <input type="hidden" id="custId" name="id_Sports_category" value="<?php echo $arrsport_type2['id_Sports_category'] ?>">
                                                     <input type="hidden" id="custId" name="id_Sport_type" value="<?php echo $arrsport_type2['id_Sport_type'] ?>">
                                                     <input type="hidden" id="custId" name="sex" value="M">
                                                   </div>

                                                   <div class="text-right">
                                                     <button type="submit" class="btn btn-success">บันทึกข้อมูล<i class="la la-thumbs-o-up position-right"></i></button>
                                                     <button type="reset" class="btn btn-danger">ยกเลิกข้อมูล<i class="la la-refresh position-right"></i></button>

                                                   </div>
                                                 </div>
                                               <?php }else{ ?>
                                                 <div class="bs-callout-danger callout-bordered callout-border-right p-1">
                            <strong>ไม่สามารถเพิ่มนักกีฬา</strong>
                            <p>เนื่องจากจำนวนนักกีฬาได้เต็มแล้ว</p>
                          </div>
                        <?php  } ?>
                                               </div>
                                             </form>
                                           </div>
                                         </div>
                                       </div>
                                 </div>
                             </div>
                               </div>
                             </div>
                           </div>

                              </div>
                         <?php }if( $arrsport_type2['F']==1){ ?>
                           <div class="tab-pane <?php if($_GET['tab2']=='F' and $_GET['tab']==$arrsport_type2['id_Sports_category']){echo 'active'; } ?>" id="tabIcon3<?php echo $arrsport_type2['id_Sports_category']; ?>2" aria-labelledby="baseIcon-tab3<?php echo $arrsport_type2['id_Sports_category']; ?>2">
                             <div class="app-content content">
                                                          <div class="content-wrapper">

                                                            <div class="content-detached content-right">
                                                              <div class="content-body">
                                                                <section class="row">
                                                                  <div class="col-12">
                                                                    <div class="card">
                                                                      <div class="card-head">
                                                                        <div class="card-header">
                                                                          <h4 class="card-title">นักกีฬา:<?php echo $arrsport_type2['name_Sports_category']; ?></h4>
                                                                          <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                                                          <div class="text-center" id="example-caption-2"><h3>จำนวนนักกีฬา  <?php

                                                                          $countst = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM sport_regis WHERE id_Sports_category = '".$arrsport_type2['id_Sports_category']."' and id_university ='".$_SESSION['university_id']."' and sex='F' "));
                                                                           echo $countst['total'];
                                                                           ?>/<?php echo $arrsport_type2['playerM']; ?></h3></div>
                                                        <div class="progress">
                                                          <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0"
                                                          aria-valuemax="2" style="width:<?php  $countw=($countst['total']/$arrsport_type2['playerF'])*100; echo $countw.'%';  ?>" aria-describedby="example-caption-2"></div>
                                                        </div>
                                                                      </div>
                                                                      <div class="card-content">
                                                                        <div class="card-body">
                                                                          <!-- Task List table -->
                                                                          <div class="table-responsive">
                                                                            <table id="users-contacts<?php echo $arrsport_type2['id_Sports_category']; ?>" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                                                              <thead>
                                                                                <tr>

                                                                                  <th>ชื่อนักกีฬา</th>

                                                                                  <th>มหาวิทยาลัย</th>
                                      <th>ลบ</th>
                                                                                </tr>
                                                                              </thead>
                                                                              <tbody>
                                                                  <?php

                                                                      $sqladmin = "select * from sport_regis where id_Sports_category='".$arrsport_type2['id_Sports_category']."' and id_university='".$_SESSION['university_id']."' and sex='F'";
                                                       $queryadmin = mysql_query($sqladmin,$conn) or die(mysql_error());
                                                       while($arradmin = mysql_fetch_array($queryadmin))
                                                       {
                                                                      ?>
                                                                                <tr>

                                                                                  <td>
                                                                                    <?php   $arrnames = mysql_fetch_array(mysql_query("SELECT * FROM student_sports WHERE id_student = '".$arradmin['id_student']."'")); ?>
                                                                                    <div class="media">
                                                                                      <div class="media-left pr-1">
                                                                                        <span class="avatar avatar-sm avatar-online rounded-circle">
                                                                                          <img src="filesutdent/<?php echo $arrnames['pic_student']; ?>" alt="avatar"><i></i></span>
                                                                                      </div>
                                                                                      <div class="media-body media-middle">
                                                                                        <a href="home.php?menu=view&id=<?php echo $arrnames['id_student']; ?>" class="media-heading" target="_blank" class="media-heading"><?php echo $arrnames['title_name'].$arrnames['f_name']."  ".$arrnames['l_name']; ?></a>
                                                                                      </div>
                                                                                    </div>
                                                                                  </td>

                                                                                  <td>	<?php
                                                                      $sql3 = "select * from  university where id_university = '".$arradmin['id_university']."'  ";
                                                       $query3 = mysql_query($sql3,$conn) or die(mysql_error());
                                                       $arr3 = mysql_fetch_array($query3);
                                                       echo $arr3['name_university'];
                                                                      ?></td>
                                                                      <td>

                              <button type="button" class="btn btn-block btn-outline-primary mb-2"  onclick="archiveFunction(<?php echo $arradmin['sport_regis_id'];  ?>,<?php echo $arrsport_type2['id_Sports_category']; ?>,'F')"><i class="ft-trash-2"></i> ลบ</button>
                                                                      </td>
                                                                                </tr>

                                                       <?php } ?>

                                                                              </tbody>
                                                                              <tfoot>
                                                                                <tr>
                                                                                  <th>ชื่อนักกีฬา</th>

                                                                                  <th>มหาวิทยาลัย</th>
                                                                                  <th>ลบ</th>

                                                                                </tr>
                                                                              </tfoot>
                                                                            </table>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                             									 </div>
                                                                </section>
                                                              </div>
                                                            </div>
                                                            <div class="sidebar-detached sidebar-left" ,=",">
                                                           <div  class="sidebar">
                                                                <div class="bug-list-sidebar-content">
                                                              <div class="card">
                                                                      <div class="card-header">
                                                                        <h4 class="card-title">เลือกนักกีฬาที่จะทำการลงแข่งขัน</h4>
                                                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                                                                      </div>
                                                                      <div class="card-content collapse show">
                                                                        <div class="card-body">
                                                                          <form class="form-horizontal" method="post" action="home.php?menu=regissport&action=add&tab=<?php echo $arrsport_type2['id_Sports_category'] ?>&tab2=F" novalidate>
                                                                            <div class="row">
                                                                              <?php if($countw!=100){ ?>
                                                                              <div class="col-lg-12 col-md-12">

                                                                                <div class="form-group">
                                                                                  <h5>รายชื่อนักกีฬา
                                                                                    <span class="required">*</span>
                                                                                  </h5>
                                                                                  <div class="controls">
                                                                                    <select name="id_student"  required class="select2 form-control" style="width: 100%">
                                                                                      <option value="">-- กรุณาเลือก --</option>
                                                                      <?php
                                                                      $sql2 = "select * from student_sports where id_university='".$_SESSION['university_id']."' and st!='1' and (title_name='นาง' or title_name='นางสาว') ";
                                                       $query2 = mysql_query($sql2,$conn) or die(mysql_error());
                                                       while($arr2 = mysql_fetch_array($query2))
                                                       {
                                                         $arrcst = mysql_fetch_array(mysql_query("SELECT * FROM sport_regis WHERE id_student = '".$arr2['id_student']."' and id_Sports_category='".$arrsport_type2['id_Sports_category']."' "));
                                                         if(  $arrcst['sport_regis_id']==""){


                                                                      ?>
                                                                                      <option value="<?php echo $arr2['id_student']; ?>"><?php echo $arr2['title_name'].$arr2['f_name']."  ".$arr2['l_name']; ?></option>
                                                       <?php }}?>
                                                                                    </select>
                                                                                  </div>
                                                                                  <input type="hidden" id="custId" name="id_Sports_category" value="<?php echo $arrsport_type2['id_Sports_category'] ?>">
                                                                                  <input type="hidden" id="custId" name="id_Sport_type" value="<?php echo $arrsport_type2['id_Sport_type'] ?>">
                                                                                  <input type="hidden" id="custId" name="sex" value="F">
                                                                                </div>

                                                                                <div class="text-right">
                                                                                  <button type="submit" class="btn btn-success">บันทึกข้อมูล<i class="la la-thumbs-o-up position-right"></i></button>
                                                                                  <button type="reset" class="btn btn-danger">ยกเลิกข้อมูล<i class="la la-refresh position-right"></i></button>

                                                                                </div>
                                                                              </div>
                                                                            <?php }else{ ?>
                                                                              <div class="bs-callout-danger callout-bordered callout-border-right p-1">
                                                         <strong>ไม่สามารถเพิ่มนักกีฬา</strong>
                                                         <p>เนื่องจากจำนวนนักกีฬาได้เต็มแล้ว</p>
                                                       </div>
                                                     <?php  } ?>
                                                                            </div>
                                                                          </form>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                              </div>
                                                          </div>
                                                            </div>
                                                          </div>
                                                        </div>

                           </div>
<?php  } ?>

                       </div>
                     </div>
                   </div>
                 </div>
                 </div>
                 </div>
               <?php  } ?>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>

   </div>
 </div>


<!-- BEGIN VENDOR JS-->
 <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
 <!-- BEGIN VENDOR JS-->
 <!-- BEGIN PAGE VENDOR JS-->
 <script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
 <script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
 <script src="app-assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
 <script src="app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"
 type="text/javascript"></script>

 <script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"
 type="text/javascript"></script>
 <script src="app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js"
 type="text/javascript"></script>
 <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
 type="text/javascript"></script>
   <script src="app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
   <script src="app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"
    type="text/javascript"></script>
    <script src="https://www.google.com/jsapi" type="text/javascript"></script>
   <script src="app-assets/vendors/js/charts/jquery.sparkline.min.js" type="text/javascript"></script>
 <!-- END PAGE VENDOR JS-->
 <!-- BEGIN MODERN JS-->
 <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
 <script src="app-assets/js/core/app.js" type="text/javascript"></script>
 <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
 <!-- END MODERN JS-->
 <!-- BEGIN PAGE LEVEL JS-->
 <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
 <script src="app-assets/js/scripts/pages/users-contacts.js" type="text/javascript"></script>
 <script src="app-assets/js/scripts/forms/validation/form-validation.js"
 type="text/javascript"></script>
   <script src="app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
   <script src="app-assets/js/scripts/tables/components/table-components.js"
   type="text/javascript"></script>
 <!-- END PAGE LEVEL JS-->
<?php
if($checkadd=="1")
{
 ?>
 <script type="text/javascript">
 swal({
 title: "คุณได้เพิ่มนักกีฬาแล้ว?",
 text: "ดำเนินการเสร็จสิ้น",
 type: "success",

 confirmButtonClass: "btn-danger",
 confirmButtonText: "ตกลง!",
 closeOnConfirm: false
},
function(){
 window.location.href="home.php?menu=regissport&tab=<?php echo $_GET['tab']; ?>&tab2=<?php echo $_GET['tab2']; ?>";

});

     </script>
     <?php
}else if($checkadd=="3")
{
  ?>
  <script type="text/javascript">
  swal({
  title: "ไม่สามารถเพิ่มข้อมูลผู้ดูแลระบบชนิดกีฬา?",
  text: "เนื่องจากมีชื่อผู้ใช้นี้ในระบบแล้ว",
  type: "warning",

  confirmButtonClass: "btn-danger",
  confirmButtonText: "ตกลง!",
  closeOnConfirm: false
 },
 function(){
  window.location.href="home.php?menu=sportadmin";
  swal("Deleted!", "Your imaginary file has been deleted.", "success");
 });

      </script>
      <?php
}

?>
<script type="text/javascript">

function archiveFunction(id,id2,id3) {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
     swal({
title: "คุณต้องการลบข้อมูลใช่หรือไม่?",
text: "",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
cancelButtonText: "ไม่, ยกเลิกการลบข้อมูล!",
confirmButtonText: "ตกลง, คุณต้องการลบข้อมูล!",
closeOnConfirm: false,
closeOnCancel: false
},
function(isConfirm){
if (isConfirm) {
 window.location.href="home.php?menu=regissport&action=delect&checkdel="+id+"&tab="+id2+"&tab2="+id3;

} else {
 swal("ยกเลิก", "คุณได้ยกเลิกข้อมูลแล้ว:)", "error");
}
});
}



</script>
