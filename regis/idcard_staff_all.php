<?php
ob_start();
session_start();
include("connect_db.php");
$checkadd = 0;
if ($_SESSION['admin_id'] == "") {
    header("location: index.php");
    exit(0);
} 
else if ($_SESSION['university_id'] != "0") {
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

<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
<!-- END MODERN CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/pages/users.css">

<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">

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
                <h3 class="content-header-title">ปริ้นข้อมูล ID CARD เจ้าหน้าที่ทีม</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
                            </li>
                            <li class="breadcrumb-item"><a href="home.php?menu=idcard_student">ปริ้นข้อมูล ID CARD เจ้าหน้าที่ทีม</a>
                            </li>
                            <li class="breadcrumb-item"><?php echo $arr2['name_university']; ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-12 col-12">

            </div>
        </div>
        <div class="content-detached">
            <div class="content-body">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-head">
                                
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo $_GET['u_name'];?></h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Task List table -->
                                    <div class="table-responsive">
                                        <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>คำนำหน้า</th>
                                                    <th>ชื่อ</th>
                                                    <th>สกุล</th>
                                                    <th>ตำแหน่ง</th>
                                                    <th>PRINT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sqladmin = "SELECT * from staff 
                                                where id_university = '$_GET[u_id]'
                                                GROUP BY staff_name, staff_lastname
                                                and staff_st = '0'
                                                order by staff_name, staff_lastname ASC";
                                                $i = 0;
                                                $queryadmin = mysql_query($sqladmin, $conn) or die(mysql_error());
                                                while ($arradmin = mysql_fetch_array($queryadmin)) { $i++;
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $i;?>
                                                        </td>
                                                        <td>
                                                            <?php echo $arradmin['staff_title']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $arradmin['staff_name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $arradmin['staff_lastname']; ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                            $position_name = '';
                                                            $sqlp = "SELECT  staff_cposition
                                                                FROM staff
                                                                WHERE staff_name = '$arradmin[staff_name]' 
                                                                AND staff_lastname = '$arradmin[staff_lastname]' 
                                                                GROUP BY staff_cposition";
                                                            $resp = mysql_query($sqlp);
                                                            while($datap = mysql_fetch_array($resp)){
                                                                $position_name.= $datap['staff_cposition'];
                                                                $position_name.= ' ';
                                                            }

                                                            echo $position_name;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm" 
                                                                onclick="window.open('idcard/fpdf/print_idcard_staff_one.php?s_name=<?php echo $arradmin['staff_name']; ?>&s_lname=<?php echo $arradmin['staff_lastname']?>','_blank')">
                                                                <i class="la la-print white"></i>PRINT IDCARD</button>
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
</div>


<!-- BEGIN VENDOR JS-->
<script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
<script src="app-assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>


<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
<script src="app-assets/js/scripts/pages/users-contacts.js" type="text/javascript"></script>
<script src="app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>

<!-- END PAGE LEVEL JS-->
<?php
if ($checkadd == "1") {
?>
    <script type="text/javascript">
        swal({
                title: "คุณได้เพิ่มข้อมูลผู้ดูแลระบบชนิดกีฬาแล้ว?",
                text: "ดำเนินการเสร็จสิ้น",
                type: "success",

                confirmButtonClass: "btn-danger",
                confirmButtonText: "ตกลง!",
                closeOnConfirm: false
            },
            function() {
                window.location.href = "home.php?menu=sportadmin";
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
    </script>
<?php
} else if ($checkadd == "3") {
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
            function() {
                window.location.href = "home.php?menu=sportadmin";
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
    </script>
<?php
}

?>
<script type="text/javascript">
    function archiveFunction(id) {
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
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = "home.php?menu=sportadmin&action=delect&checkdel=" + id;

                } else {
                    swal("ยกเลิก", "คุณได้ยกเลิกข้อมูลแล้ว:)", "error");
                }
            });
    }
</script>