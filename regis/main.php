
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/weather-icons/climacons.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/fonts/meteocons/style.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
<!-- END VENDOR CSS-->

<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/pages/timeline.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ecommerce.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/line-awesome/css/line-awesome.min.css">
<!-- END Page Level CSS-->

<div class="app-content container center-layout mt-2">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- eCommerce statistic -->
      <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="info">
                      <?php
                      if($_SESSION['university_id']=="0")
                      {
                         $countf1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalf1 FROM tb_f1 where (M='1' and st='0') "));
                         $countf2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalf1 FROM tb_f1 where (F='1' and st='0') "));
                         $countf3 = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalf1 FROM tb_f1 where (M='1' or F='1' ) and st='1' "));
                      }
                      else
                      {
                        $countf1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalf1 FROM tb_f1 where id_unversity ='".$_SESSION['university_id']."' and M='1' and st='0' "));
                        $countf2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalf1 FROM tb_f1 where id_unversity ='".$_SESSION['university_id']."' and F='1' and st='0' "));
                        $countf3 = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalf1 FROM tb_f1 where id_unversity ='".$_SESSION['university_id']."' and M='1' and F='1' and st='1' "));
                      }

                         echo $countf1['totalf1']+$countf2['totalf1']+$countf3['totalf1']; ?>
                    </h3>
                    <h6>กีฬาที่ลงทะเบียน</h6>
                  </div>
                  <div>
                    <i class="la la-futbol-o info font-large-2 float-right"></i>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="warning"><?php
                    if($_SESSION['university_id']=="0")
                    {
                      $countst = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalst FROM student_sports  "));
                    }
                    else {
                      $countst = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalst FROM student_sports WHERE id_university ='".$_SESSION['university_id']."' "));
                    }
?>
                      <?php echo $countst['totalst']; ?></h3>
                    <h6>จำนวนนักกีฬา</h6>
                  </div>
                  <div>
                    <i class="la la-group warning font-large-2 float-right"></i>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="success"><?php
                    if($_SESSION['university_id']=="0")
                    {
                    $countma = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalst FROM manager where st ='0'"));
                    $countsf = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalst FROM  staff where staff_st ='0'"));
                  }
                  else {
                    $countma = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalst FROM manager WHERE id_university ='".$_SESSION['university_id']."' and  st ='0' "));
                    $countsf = mysql_fetch_array(mysql_query("SELECT COUNT(*) as totalst FROM  staff WHERE id_university ='".$_SESSION['university_id']."' and  staff_st ='0' "));
                  }
?>
                      <?php echo $countma['totalst']+$countsf['totalst']; ?>
                    </h3>
                    <h6>จำนวนผู้เข้าร่วมงาน</h6>
                  </div>
                  <div>
                    <i class="icon-user-follow success font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="danger">0</h3>
                    <h6>จำนวนเหรียญรางวัล</h6>
                  </div>
                  <div>
                    <i class="la la-empire danger font-large-2 float-right"></i>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ eCommerce statistic -->
      <!-- Products sell and New Orders -->
      <div class="row match-height">
        <div class="col-xl-8 col-12" id="ecommerceChartView">
          <div class="card card-shadow">
            <div class="card-header card-header-transparent py-20">
              <div class="btn-group dropdown">
                <a href="#" class="text-body dropdown-toggle blue-grey-700" data-toggle="dropdown">กำหนดการ</a>

              </div>
              <!-- <img src="http://tawanokgame.rmutto.ac.th/wp-content/uploads/2020/01/%E0%B8%81%E0%B8%B3%E0%B8%AB%E0%B8%99%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%81%E0%B8%82%E0%B9%88%E0%B8%87%E0%B8%82%E0%B8%B1%E0%B8%99%E0%B8%81%E0%B8%B5%E0%B8%AC%E0%B8%B2-%E0%B8%95%E0%B8%B0%E0%B8%A7%E0%B8%B1%E0%B8%99%E0%B8%AD%E0%B8%AD%E0%B8%81%E0%B9%80%E0%B8%81%E0%B8%A1%E0%B8%AA%E0%B9%8C-%E0%B8%AD%E0%B8%B1%E0%B8%9E%E0%B9%80%E0%B8%94%E0%B8%97-12.jpg" alt="branding logo" width="100%"> -->
            </div>

          </div>
        </div>
        <div class="col-xl-4 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">รายชื่อนักกีฬาที่ไม่ผ่านคุณสมบัติ</h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="card-content">
              <div id="new-orders" class="media-list position-relative">
                <div class="table-responsive">
                  <table id="new-orders-table" class="table table-hover table-xl mb-0">
                    <thead>

                      <tr>
                        <th class="border-top-0">ชื่อ</th>
                        <th class="border-top-0">สถานะ</th>

                      </tr>
                    </thead>
                    <tbody>

					<?php
					if($_SESSION['university_id']=="0")
					{

						$sqladmin = "select * from student_sports where  st='1' ";
					}
					else{
					$sqladmin = "select * from student_sports where id_university='".$_SESSION['university_id']."' and st='1' ";
					}
                                    $queryadmin = mysql_query($sqladmin,$conn) or die(mysql_error());
                                    while($arradmin = mysql_fetch_array($queryadmin))
                                    { ?>
                        <td class="text-truncate p-1">
                        <a href="home.php?menu=view&id=<?php echo $arradmin['id_student'];?>" target="_blank">
                                        <?php  echo $arradmin['title_name']; ?><?php  echo $arradmin['f_name']; ?>
                                        <?php  echo $arradmin['l_name']; ?>
                                        </a>
                        </td>
						<td >
                         <p class="text-danger">ข้อมูลไม่ถูกต้อง</p>

                        </td>

                      </tr>
									<?php  }  ?>


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ Products sell and New Orders -->

      <!--Recent Orders & Monthly Sales -->

      <!--/Recent Orders & Monthly Sales -->
      <!-- Basic Horizontal Timeline -->

      <!--/ Basic Horizontal Timeline -->
    </div>
  </div>
</div>
<!-- BEGIN VENDOR JS-->
<script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
