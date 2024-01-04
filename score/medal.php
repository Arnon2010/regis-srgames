<?php
 include("connect_db.php");
 $date = date('Y-m-d');
 ?>
 <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/weather-icons/climacons.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/fonts/meteocons/style.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist-plugin-tooltip.css">

<!-- END VENDOR CSS-->
<!-- BEGIN MODERN CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
<!-- END MODERN CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- END Custom CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">



  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
        <section id="invoice-summary">

          <div class="row">
            <!-- Your Top Expenses -->
            
            <!-- Your Top Expenses -->
            <!-- Sales, Receipts and Dues -->
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">ตารางสรุปเหรียญรางวัล</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <a href="index.php?menu=medal&action=view" class="btn btn-warning btn-sm">view</a>
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body  px-0 py-0">
                    <div class="table-responsive">
                      <div id="showData"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Sales, Receipts and Dues -->
          </div>
          <!-- Total Receivables -->

          <!--/ Total Receivables -->
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

  <!-- END PAGE LEVEL JS-->
  <script type="text/javascript">
          $(function(){
              setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
                  // 1 วินาที่ เท่า 1000
                  // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
                  var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                          url:"gdata2.php?menu=show_medal",
                          data:"rev=1",
                          async:false,
                          success:function(getData){
                              $("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                          }
                  }).responseText;
              },1000);
          });
          </script>
