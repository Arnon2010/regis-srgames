<?php
ob_start();
session_start();
include("connect_db.php");
if($_SESSION['admin_id']=="" )
{
 header("location: index.php");
 exit(0);
}
if($_SESSION['admin_st']!="0")
{
 header("location: index.php");
 exit(0);
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
         <h3 class="content-header-title">รายงานชื่อนักกีฬาลงทะเบียน</h3>
         <div class="row breadcrumbs-top">
           <div class="breadcrumb-wrapper col-12">
             <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
               </li>
               <li class="breadcrumb-item">รายงานชื่อนักกีฬาลงทะเบียน
               </li>
             </ol>
           </div>
         </div>
       </div>
       <div class="content-header-right col-md-6 col-12">

       </div>
     </div>

     <div class="col-12">

       <div class="card">


               <div class="card-header">
                 <h4 class="card-title">เลือกชนิดกีฬา</h4>
                 <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
               </div>
               <div class="card-content collapse show">
                 <div class="card-body">
                   <?php
   				$sqlsport_type = "SELECT sport_type.id_Sport_type,sport_type.name_Sport_type 
                FROM sport_type INNER JOIN tb_f1 on sport_type.id_Sport_type = tb_f1.id_Sport_type 
                GROUP BY tb_f1.id_Sport_type";
   				$querysport_type = mysql_query($sqlsport_type,$conn) or die(mysql_error());
   				while($arrsport_type = mysql_fetch_array($querysport_type))
   				{
   				?>
                 	<a href="home.php?menu=show_regis2&id=<?php  echo $arrsport_type['id_Sport_type']; ?>&sport_name=<?php echo $arrsport_type['name_Sport_type']?>" class="btn btn-social width-250 mr-1 mb-1 btn-dropbox">
                 		<img src="mspig/<?php echo $arrsport_type['id_Sport_type'].".png";  ?>" /><?php  echo $arrsport_type['name_Sport_type']; ?>
                 	</a>
                   <?php
   					}
   				?>
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
