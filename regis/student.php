<?php
 include("connect_db.php");
 $date = $_GET['date'];
  $sport_type = mysql_fetch_array(mysql_query("select * from  sport_type where id_Sport_type = '".$_GET['ID']."' "));

 function DateThai($strDate)
{
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));

  $strMonthCut = Array("","มกราคม","กุมภาพันธ์ ","มีนาคม","เมษายน.","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear";
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
         <h3 class="content-header-title">รายชื่อนักกีฬา</h3>
         <div class="row breadcrumbs-top">
           <div class="breadcrumb-wrapper col-12">
             <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
               </li>
               <li class="breadcrumb-item"><a href="index.php?menu=student">รายชื่อนักกีฬา</a>
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
           <h4 class="card-title">คณะ</h4>
         </div>
         <div class="card-content">
           <div class="card-body">

             <ul class="nav nav-tabs nav-underline no-hover-bg">
               <?php
			   $checka==0;
                   $sqlsport_type = "SELECT * from university where id_university != '0'";
				   $querysport_type = mysql_query($sqlsport_type,$conn) or die(mysql_error());
				   while($arrsport_type = mysql_fetch_array($querysport_type))
				   {?>

               <li class="nav-item">
                 <a class="nav-link <?php if($checka==0) {?>active<?php } ?>" id="base-tab<?php echo $arrsport_type['id_university'];?>" data-toggle="tab" aria-controls="tab<?php echo $arrsport_type['id_university']; ?>"
                 href="#tab<?php echo $arrsport_type['id_university']; ?>" aria-expanded="true"><i class="la la-align-justify"></i><?php echo $arrsport_type['name_university']; ?></a>
               </li>

                <?php $checka++;} ?>

             </ul>
             <div class="tab-content px-1 pt-1">


             <?php
			   $checka11==0;

                   $sqlsport_type1 = "SELECT * from university where id_university != '0'";
				   $querysport_type1 = mysql_query($sqlsport_type1,$conn) or die(mysql_error());
				   while($arrsport_type1 = mysql_fetch_array($querysport_type1))
				   {?>

                   <div role="tabpanel" class="tab-pane <?php if($checka11==0) {?>active<?php } ?>" id="tab<?php echo $arrsport_type1['id_university']; ?>" aria-expanded="true" aria-labelledby="base-tab<?php echo $arrsport_type1['id_university']; ?>">

                        <div class="card-content">
                          <div class="card-body  px-0 py-0">
                            <div class="table-responsive">
                            	<table id="users-contacts" class="table table-hover">
                                	<thead>
                                    	<tr>
                                                       <th>ลำดับ</th>
                                                       <th>ชื่อ-สกุล</th>
                                                       <th>เพศ</th>
                                                       <th>สังกัด</th>
                            						   <th>รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
									   $ii=1;
									   $sqlsport_type11 = "SELECT * from student_sports where id_university ='".$arrsport_type1['id_university']."'";
									   $querysport_type11 = mysql_query($sqlsport_type11,$conn) or die(mysql_error());
									   while($arrsport_type11 = mysql_fetch_array($querysport_type11))
									   {?>
                                    	<tr>
                                                       <th><?php echo $ii;?></th>

                                                       <th><?php echo $arrsport_type11['title_name'].$arrsport_type11['f_name']." ".$arrsport_type11['l_name'];?></th>

                                                       <th>
                                                       <?php
                                                       if($arrsport_type11['title_name']==นาย){ echo "ชาย";}
													   else if($arrsport_type11['title_name']==นาง || $arrsport_type11['title_name']==นางสาว){ echo "หญิง";}
													   ?>
                                                       </th>

                                                       <th><?php echo $arrsport_type1['subname_university'];?></th>

                            						   <th><a href="index.php?menu=studentdetail&id=<?php echo $arrsport_type11['id_student']?>" target="_blank">รายละเอียด</a></th>
                                        </tr>
                                        <?php $ii++; }?>
                                    </tbody>
                                    <tfoot>
                                    	<tr>
                                                       <th>ลำดับ</th>
                                                       <th>ชื่อ-สกุล</th>
                                                       <th>เพศ</th>
                                                       <th>สังกัด</th>
                            						   <th>รายละเอียด</th>
                                        </tr>
                                    </tfoot>
                                 </table>
                             </div>
                          </div>
                        </div>

                   </div>



                <?php $checka11++; } ?>



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
