 <?php
  ob_start();
  session_start();
  include("connect_db.php");
  if ($_SESSION['admin_id'] == "") {
    header("location: index.php");
    exit(0);
  }
  if ($_SESSION['university_id'] == "0") {
    header("location: index.php");
    exit(0);
  }

  if ($_GET['action'] == "add") {

    $sqlsport11 = "SELECT * FROM tb_f1 WHERE id_Sport_type = '" . $_GET["id"] . "' and id_unversity = '" . $_SESSION['university_id'] . "' ";
    $querysport11 = mysql_query($sqlsport11, $conn) or die(mysql_error());
    while ($arrsport11 = mysql_fetch_array($querysport11)) {

      if ($_POST['MF' . $arrsport11['id_f1']] == "") {
        echo $M = $_POST['M' . $arrsport11['id_f1']];
        echo $F = $_POST['F' . $arrsport11['id_f1']];
        if ($_POST['F' . $arrsport11['id_f1']] == "" && $_POST['M' . $arrsport11['id_f1']] == "") {
          $M = 0;
          $F = 0;
        } else if ($_POST['F' . $arrsport11['id_f1']] == "") {
          $M = 1;
          $F = 0;
        } else if ($_POST['M' . $arrsport11['id_f1']] == "") {
          $M = 0;
          $F = 1;
        }
        $sqlsport111 = "UPDATE  tb_f1 set M='$M',F='$F' where id_f1 = '" . $arrsport11['id_f1'] . "'";
        $querysport111 = mysql_query($sqlsport111, $conn) or die(mysql_error());
      } else {



        $sqlsport111 = "UPDATE  tb_f1 set M='1',F='1' where id_f1 = '" . $arrsport11['id_f1'] . "'";
        $querysport111 = mysql_query($sqlsport111, $conn) or die(mysql_error());
      }
    }

    $checkadd = 1;
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
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert.css">
 <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
 <!-- END MODERN CSS-->
 <!-- BEGIN Page Level CSS-->
 <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
 <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
 <link rel="stylesheet" type="text/css" href="app-assets/css/pages/users.css">

 <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">
 <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/switch.css">
 <!-- END Page Level CSS-->
 <!-- BEGIN Custom CSS-->
 <link rel="stylesheet" type="text/css" href="assets/css/style.css">
 <!-- END Custom CSS-->

 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert.css">

 <style>
   /* HEADING */

   .heading {
     text-align: center;
   }

   .heading__title {
     font-weight: 600;
   }

   .heading__credits {
     margin: 10px 0px;
     color: #888888;
     font-size: 25px;
     transition: all 0.5s;
   }

   .heading__link {
     text-decoration: none;
   }

   .heading__credits .heading__link {
     color: inherit;
   }

   /* CARDS */

   .cards_type {
     display: flex;
     flex-wrap: wrap;
     justify-content: space-between;
   }

   .card_type_2 {
     margin: 20px;
     padding: 20px;
     width: 120px;
     height: 80px;
     display: grid;
     grid-template-rows: 20px 50px 1fr 50px;
     border-radius: 10px;
     box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
     transition: all 0.2s;
   }

   .card_type {
     margin: 20px;
     padding: 20px;
     width: 200px;
     height: 150px;
     display: grid;
     grid-template-rows: 20px 50px 1fr 50px;
     border-radius: 0px;
     box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.25);
     transition: all 0.2s;
   }

   .card:hover {
     box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
     transform: scale(1.01);
   }

   .card__exit {
     grid-row: 1/2;
     justify-self: end;
   }

   .card__icon {
     grid-row: 2/3;
     font-size: 30px;
   }

   .card__title {
     grid-row: 3/4;
     font-weight: 400;
     font-size: medium;
   }

   .center {
     position: absolute;
     margin: auto;
     width: 50%;
     border: 0px solid white;
     padding-top: 120px;
     padding-left: 55px;
     vertical-align: center;

   }

   .card__apply {
     position: absolute;

   }

   /* CARD BACKGROUNDS */

   .card-1 {
     background: radial-gradient(#1fe4f5, #3fbafe);
   }

   .card-2 {
     background: radial-gradient(#fbc1cc, #fa99b2);
   }

   .card-3 {
     background: radial-gradient(#76b2fe, #b69efe);
   }

   .card-4 {
     background: radial-gradient(#60efbc, #58d5c9);
   }

   .card-5 {
     background: radial-gradient(#f588d8, #c0a3e5);
   }

   /* RESPONSIVE */

   @media (max-width: 1600px) {
     .cards_type {
       justify-content: center;
     }
   }
 </style>
 <br>
 <div class="row">
   <div class="col-md-12">
     <h4 class="text-primary text-center">แจ้งความจำนงสมัครเข้าร่วมแข่งขัน</h4>
   </div>
   <div class="col-md-12">
     <hr>
   </div>
   <div class="col-md-12">
     <h4 class="text-danger text-center"> กำหนดลงทะเบียนออนไลน์ วันที่ </small>25 ตุลาคม 2565 <small>ถึงวันที่</small> 28 พฤศจิกายน 2565</h4>
   </div>
   <div class="col-md-12">
     <hr>
   </div>
   <!-- 
      GRADIENT BANNER DESIGN BY SIMON LURWER ON DRIBBBLE:
      https://dribbble.com/shots/14101951-Banners
    -->
   <div class="col-md-12">

     <div class="main-container">

       <div class="cards_type mb-3">
         <?php
          $sqlsport_type = "select * from sport_type WHERE status = '1'";
          $querysport_type = mysql_query($sqlsport_type, $conn) or die(mysql_error());
          while ($arrsport_type = mysql_fetch_array($querysport_type)) {
          ?>
           <div class="card_type card-11">
             <div class="card__icon"><a href="home.php?menu=F1&id=<?php echo $arrsport_type['id_Sport_type']; ?>" id="btn-go-to-buttom">
                 <img src="mspig/<?php echo $arrsport_type['id_Sport_type'] . ".png";  ?>" width="170" /></a>
             </div>
             <p class="card__exit"><i class="fas fa-times"></i></p>
             <p class="card__apply11">
               <a class="center card__title text-dark" id="btn-go-to-buttom" href="home.php?menu=F1&id=<?php echo $arrsport_type['id_Sport_type']; ?>"><?php echo $arrsport_type['name_Sport_type']; ?>
                 <i class="fas fa-arrow-right"></i></a>
             </p>
           </div>
         <?php } ?>
       </div>
     </div>
   </div>

   <!-- ประเภทกีฬา -->
   <p>&nbsp;</p>

   <?php if ($_GET['id'] != "") { ?>

     <div class="col-md-12" align="center">
       <div class="card">
         <div class="card-header">
           <h4 class="card-title">เข้าร่วมการแข่งขัน | ไม่เข้าร่วมการแข่งขัน</h4>
           <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
           <div class="heading-elements">

             <ul class="list-inline mb-0">
               <?php if ($_SESSION['university_id'] != "0") { ?>
                 <button class="btn btn-primary btn-sm" onclick="window.open('reportF1.php','_blank')">
                   <i class="la la-print white"></i>PRINT F1</button>
               <?php } ?>
               <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
               <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

             </ul>
           </div>
         </div>
         <?php
          $sql0 = "SELECT * from university WHERE id_university = '" . $_SESSION['university_id'] . "'";
          $query0 = mysql_query($sql0, $conn) or die(mysql_error());
          $arr0 = mysql_fetch_array($query0);
          ?>
         <p><?php echo $arr0["name_university"]; ?></p>
         <div class="card-content">
           <div class="table-responsive">
             <form class="form-horizontal" method="post" action="home.php?menu=F1&id=<?php echo $_GET["id"] ?>&action=add" novalidate>
               <table class="table table-xl mb-0" border="1">
                 <thead>
                   <tr>
                     <th>#</th>
                     <th>กีฬา</th>
                     <th>ประเภทการแข่งขัน</th>
                     <th align="center">ชาย</th>
                     <th align="center">หญิง</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $i = 1;
                    $sqlsport = "SELECT * from tb_f1 WHERE id_Sport_type = '" . $_GET["id"] . "' and id_unversity = '" . $_SESSION['university_id'] . "' ";
                    $querysport = mysql_query($sqlsport, $conn) or die(mysql_error());
                    while ($arrsport = mysql_fetch_array($querysport)) {
                    ?>


                     <tr>
                       <th><?php echo $i; ?></th>
                       <?php
                        $sql1 = "select * from sport_type where id_Sport_type = '" . $arrsport["id_Sport_type"] . "'";
                        $query1 = mysql_query($sql1, $conn) or die(mysql_error());
                        $arr1 = mysql_fetch_array($query1);
                        ?>
                       <td><?php echo $arr1["name_Sport_type"]; ?></td>
                       <?php
                        $sql2 = "select * from sports_category where id_Sports_category = '" . $arrsport["id_Sports_category"] . "'";
                        $query2 = mysql_query($sql2, $conn) or die(mysql_error());
                        $arr2 = mysql_fetch_array($query2);
                        ?>
                       <td><?php echo $arr2["name_Sports_category"]; ?></td>
                       <?php if ($arr2['st'] == '0') { ?>
                         <td>
                           <fieldset class="checkboxsas">
                             <label>
                               <input type="checkbox" value="1" id="M<?php echo $arrsport["id_f1"]; ?>" name="M<?php echo $arrsport["id_f1"]; ?>" <?php if ($arr2["playerM"] == 0) { ?> disabled <?php } ?><?php if ($arrsport["M"] == 1) { ?> checked <?php } ?>>
                             </label>
                           </fieldset>
                         </td>
                         <td>
                           <fieldset class="checkboxsas">
                             <label>
                               <input type="checkbox" value="1" id="F<?php echo $arrsport["id_f1"]; ?>" name="F<?php echo $arrsport["id_f1"]; ?>" <?php if ($arr2["playerF"] == 0) { ?> disabled <?php } ?><?php if ($arrsport["F"] == 1) { ?> checked <?php } ?>>
                             </label>
                           </fieldset>
                         </td>
                       <?php  } else { ?>
                         <td colspan="2" align="center">
                           <fieldset class="checkboxsas">
                             <label>
                               <input type="checkbox" value="1" id="MF<?php echo $arrsport["id_f1"]; ?>" name="MF<?php echo $arrsport["id_f1"]; ?>" <?php if ($arr2["playerM"] == 0 and $arr2["playerF"] == 0) { ?> disabled <?php } ?><?php if ($arrsport["M"] == 1 and $arrsport["F"] == 1) { ?> checked <?php } ?>>
                             </label>
                           </fieldset>
                         </td>
                       <?php  } ?>
                     </tr>
                   <?php
                      $i++;
                    }
                    ?>
                 </tbody>
               </table>
               <br>
               <div class="col-md-6 col-sm-12">
                 <button type="submit" class="btn btn-lg btn-block btn-outline-success mb-2" id="type-success">บันทึกข้อมูล F1</button>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   <?php  }  ?>
 </div>

 <!-- <div class="col">
          <button
            type="button"
            class="btn btn-danger btn-floating btn-lg"
            id="btn-back-to-top"
            >
            <i class="fas fa-arrow-up"></i>
          </button>
        </div> -->

 <!-- 0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000 -->



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
 <script src="app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
 <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
 <script src="app-assets/js/core/app.js" type="text/javascript"></script>
 <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
 <!-- END MODERN JS-->
 <!-- BEGIN PAGE LEVEL JS-->
 <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
 <script src="app-assets/js/scripts/pages/users-contacts.js" type="text/javascript"></script>
 <script src="app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
 <!-- END PAGE LEVEL JS-->
 <!-- BEGIN PAGE LEVEL JS-->
 <script src="app-assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
 <!-- END PAGE LEVEL JS-->
 <?php
  if ($checkadd == 1) {
    echo '<SCRIPT language="javascript">
  swal({
      title: "บันทึกข้อมูลแล้ว",
      text: "ดำเนินการเสร็จสิ้น",
      icon: "success",
      buttons: {

              confirm: {
                  text: "OK",
                  value: true,
                  visible: true,
                  className: "",
                  closeModal: false
              }
      }
  }).then(isConfirm => {
      if (isConfirm) {
          	window.location="home.php?menu=F1&id=';
    echo $_GET["id"];
    echo '";
      }
  });

			</script>';
  }

  ?>

 <script>
   //Get the button
   let mybutton = document.getElementById("btn-back-to-top");

   let mybuttonButtom = document.getElementById("btn-go-to-buttom");


   // When the user scrolls down 20px from the top of the document, show the button
   window.onscroll = function() {
     scrollFunction();
   };

   function scrollFunction() {
     if (
       document.body.scrollTop > 20 ||
       document.documentElement.scrollTop > 20
     ) {
       mybutton.style.display = "block";
     } else {
       mybutton.style.display = "none";
     }
   }
   // When the user clicks on the button, scroll to the top of the document
   mybutton.addEventListener("click", backToTop);
   mybuttonButtom.addEventListener("click", backToButtom);

   function backToTop() {
     document.body.scrollTop = 0;
     document.documentElement.scrollTop = 0;
   }

   function backToButtom() {
     document.body.scrollTo = 700;
     document.documentElement.scrollTo = 700;
   }
 </script>