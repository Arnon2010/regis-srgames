<?php
include("connect_db.php");
$date = $_GET['date'];
$sport_type = mysql_fetch_array(mysql_query("select * from  sport_type where id_Sport_type = '" . $_GET['ID'] . "' "));

function DateThai($strDate)
{
  $strYear = date("Y", strtotime($strDate)) + 543;
  $strMonth = date("n", strtotime($strDate));
  $strDay = date("j", strtotime($strDate));

  $strMonthCut = array("", "มกราคม", "กุมภาพันธ์ ", "มีนาคม", "เมษายน.", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
  $strMonthThai = $strMonthCut[$strMonth];
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
<style>

  hr.gold {
  border: 10px solid #FFD700;
  border-radius: 5px;
  }

  hr.silver {
  border: 10px solid #C0C0C0;
  border-radius: 5px;
  }
  hr.copper {
  border: 10px solid #B87333;
  border-radius: 5px;
  }
</style>
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">

      <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">สรุปเหรียญตามชนิดกีฬา:<?php echo $sport_type['name_Sport_type']; ?></h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <!-- <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a>
               </li>
               <li class="breadcrumb-item"><a href="index.php?menu=score1&ID=<?php echo $_GET['ID']; ?>">ผลแข่งขันกีฬา:<?php echo $sport_type['name_Sport_type']; ?></a>
               </li>

             </ol> -->
          </div>
        </div>
      </div>
      <div class="content-header-right col-md-6 col-12">

      </div>
    </div>
    <div class="col-xl-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">ประเภทการแข่งขัน:</h4>
        </div>
        <div class="card-content">
          <div class="card-body">

            <ul class="nav nav-tabs nav-underline no-hover-bg">
              <?php
              $checka = 0;
              $sqlsport_type = "SELECT * from sports_category where 	id_Sport_type = '" . $_GET['ID'] . "' order by id_Sports_category  ";
              $querysport_type = mysql_query($sqlsport_type, $conn) or die(mysql_error());
              while ($arrsport_type = mysql_fetch_array($querysport_type)) {
              if ($arrsport_type['playerM'] != '0' &&   $arrsport_type['st'] == '0') {
              ?>
                  <li class="nav-item">
                    <a class="nav-link <?php if ($checka == 0) { ?>active<?php $checka++;
                                                                        }  ?>" id="base-tab<?php echo $arrsport_type['id_Sports_category'] . "M"; ?>31" data-toggle="tab" aria-controls="tab<?php echo $arrsport_type['id_Sports_category'] . "M"; ?>31" href="#tab<?php echo $arrsport_type['id_Sports_category'] . "M"; ?>31" aria-expanded="true"><i class="la la-align-justify"></i><?php echo $arrsport_type['name_Sports_category'] . "ชาย"; ?></a>
                  </li>
                <?php }
                if ($arrsport_type['playerF'] != '0' &&   $arrsport_type['st'] == '0') { ?>
                  <li class="nav-item">
                    <a class="nav-link " id="base-tab<?php echo $arrsport_type['id_Sports_category'] . "F"; ?>31" data-toggle="tab" aria-controls="tab<?php echo $arrsport_type['id_Sports_category'] . "F"; ?>31" href="#tab<?php echo $arrsport_type['id_Sports_category'] . "F"; ?>31" aria-expanded="true"><i class="la la-align-justify"></i><?php echo $arrsport_type['name_Sports_category'] . "หญิง"; ?></a>
                  </li>
                <?php }
                if ($arrsport_type['st'] == '1') { ?>
                  <li class="nav-item">
                    <a class="nav-link <?php if ($checka == 0) { ?>active<?php } ?>" id="base-tab<?php echo $arrsport_type['id_Sports_category'] . "MF"; ?>31" data-toggle="tab" aria-controls="tab<?php echo $arrsport_type['id_Sports_category'] . "MF"; ?>31" href="#tab<?php echo $arrsport_type['id_Sports_category'] . "MF"; ?>31" aria-expanded="true"><i class="la la-align-justify"></i><?php echo $arrsport_type['name_Sports_category'] . "คู่ผสม"; ?></a>
                  </li>
              <?php }
              } ?>

            </ul>
            <div class="tab-content px-1 pt-1">
              <?php
              $checka = 0;
              $sqlsport_type = "SELECT * from sports_category where 	id_Sport_type = '" . $_GET['ID'] . "' order by id_Sports_category  ";
              $querysport_type = mysql_query($sqlsport_type, $conn) or die(mysql_error());
              while ($arrsport_type = mysql_fetch_array($querysport_type)) {
                if ($arrsport_type['playerM'] != '0' &&   $arrsport_type['st'] == '0') { // ชาย M
              ?>
                  <div role="tabpanel" class="tab-pane <?php if ($checka == 0) { ?>active<?php $checka++;
                                                                                        } ?>" id="tab<?php echo $arrsport_type['id_Sports_category'] . "M"; ?>31" aria-expanded="true" aria-labelledby="base-tab<?php echo $arrsport_type['id_Sports_category'] . "M"; ?>31">
                    <p>
                    <div class="card-content">
                      <div class="card-body  px-0 py-0">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="card" style="max-width: 25rem;">
                              <div class="card-header" style="background-color: #FFD700;">
                                <h4 class="card-title"><img src="admin/img/1.png" width="50" /> <strong>เหรียญทอง</strong></h4>
                              </div>
                              <div class="card-content">
                                <div class="card-body">
                                  <?php
                                  $sqlM1 = "SELECT * FROM medal_detail m 
                                            LEFT JOIN university u ON m.id_university = u.id_university
                                            WHERE m.id_Sports_category = '" . $arrsport_type['id_Sports_category'] . "'
                                            AND m.ranks_medal = '1' AND m.sex = 'ชาย'
                                            ";
                                  $resM1 = mysql_query($sqlM1);
                                  while($dataM1 = mysql_fetch_array($resM1) ) {
                                  ?>
                                  
                                  <div class="col">
                                    <h3><?php 
                                      if($dataM1['hand_ranks'] == ''){
                                        echo 'รอการยืนยัน...';
                                      }else if($arrsport_type['status'] == '3'){
                                        echo $dataM1['subname_university']. ' ('.$dataM1['hand_ranks'].')';
                                      } else {
                                        echo $dataM1['subname_university'];
                                      }
                                      ?> </h3>
                                    <hr class="gold">
                                  </div>
                                  <?php if ($arrsport_type['status'] == 1) { ?>
                                    <?php
                                    $sql221 = "SELECT * from sport_regis r
                                            LEFT JOIN student_sports s ON r.id_student = s.id_student
                                            where r.id_university='" . $dataM1['id_university'] . "' 
                                            AND r.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                            AND r.sex = 'M' 
                                            AND s.st = '9'";
                                    $qr221 = mysql_query($sql221);
                                    while ($arr221 = mysql_fetch_array($qr221)) {
                                    ?>
                                        <div class="col">
                                          <h4>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                              <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg>
                                            <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                          </h4>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                  <?php } //End if status
                                  else if ($arrsport_type['status'] == 2) {  //ทีม sv all กรีฑา ว่ายน้ำ
                                    ?>
                                  <?php
                                      $sql221 = "SELECT * from user_sportall u 
                                        LEFT JOIN score_all sa ON u.score_all_id = sa.score_all_id 
                                        LEFT JOIN student_sports s ON u.id_student = s.id_student
                                        where s.id_university='" . $dataM1['id_university'] . "' 
                                        AND sa.sport_type_id = '" . $dataM1['id_Sports_category'] . "'
                                        AND u.sex = 'ชาย' 
                                        AND sa.round_id = '7' 
                                        AND u.university_ranking = '$dataM1[ranks_medal]'
                                        ";
                                      $qr221 = mysql_query($sql221);
                                      while ($arr221 = mysql_fetch_array($qr221)) {

                                        // $sqlStd = "SELECT us.id_student 
                                        //   FROM user_sportall us 
                                        //   LEFT JOIN score_all sa ON us.score_all_id = sa.score_all_id 
                                        //   WHERE sa.sport_type_id = '$dataM1[id_Sports_category]' 
                                        //   AND sa.round_id = '7' 
                                        //   AND us.id_student = '$arr221[id_student]' 
                                        //   AND us.university_ranking = '$dataM1[ranks_medal]'";
                                        // $rowStd = mysql_num_rows(mysql_query($sqlStd));
                                        // if($rowStd == 1) {
                                        
                                      ?>
                                          <div class="col">
                                            <h4>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                              </svg>
                                              <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                            </h4>
  
                                          </div>
                                        <?php //}?>
                                    
                                      <?php
                                      } // END While
                                      
                                }// End if status = 2 
                                else if ($arrsport_type['status'] == 3) { //ทีม sv 2 เช่น แบตมินตัน
                                ?>
                                <?php
                                      $sql221 = "SELECT * from user_sportvs2 u
                                      LEFT JOIN teamvs2 t ON u.id_team = t.id_team
                                      LEFT JOIN student_sports s ON u.id_student = s.id_student
                                      where s.id_university='" . $dataM1['id_university'] . "' 
                                      AND t.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                      AND t.sex = 'ชาย' 
                                      AND t.hand_ranks = '$dataM1[hand_ranks]'
                                      ";
                                      $qr221 = mysql_query($sql221);
                                      while ($arr221 = mysql_fetch_array($qr221)) {
                                        
                                      ?>
                                          <div class="col">
                                            <h4>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                              </svg>
                                              <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                            </h4>
  
                                          </div>
                                      <?php
                                      } // END While
                                      ?>
                                <?php } //End if status = 3 
                                ?>
                                <hr>
                                <?php
                                } //end while medal
                                ?>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="card" style="max-width: 25rem;">
                              <div class="card-header" style="background-color: #C0C0C0;">
                                <h4 class="card-title"><img src="/admin/img/2.png" width="50" /> <strong>เหรียญเงิน</strong></h4>
                              </div>
                              <div class="card-content">
                                <div class="card-body">
                                  <?php
                                  $sqlM1 = "SELECT * FROM medal_detail m 
                                            LEFT JOIN university u ON m.id_university = u.id_university
                                            WHERE m.id_Sports_category = '" . $arrsport_type['id_Sports_category'] . "'
                                            AND m.ranks_medal = '2' AND m.sex = 'ชาย'
                                            ";
                                  $resM1 = mysql_query($sqlM1);
                                  while($dataM1 = mysql_fetch_array($resM1) ) {
                                  
                                  ?>
                                  <div class="col">
                                    <h3>
                                    <?php 
                                      if($dataM1['hand_ranks'] == ''){
                                        echo 'รอการยืนยัน...';
                                      }else if($arrsport_type['status'] == '3'){
                                        echo $dataM1['subname_university']. ' ('.$dataM1['hand_ranks'].')';
                                      } else {
                                        echo $dataM1['subname_university'];
                                      }
                                      ?> </h3>
                                    <hr class="silver">
                                  </div>
                                  
                                  <?php if ($arrsport_type['status'] == 1) { // ทีม vs เช่น ฟุตบอล บาส?>
                                    <?php
                                    $sql221 = "SELECT * from sport_regis r
                                    LEFT JOIN student_sports s ON r.id_student = s.id_student
                                    where r.id_university='" . $dataM1['id_university'] . "' 
                                    AND r.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                    AND r.sex = 'M' 
                                    AND s.st = '9'";
                                    $qr221 = mysql_query($sql221);
                                    while ($arr221 = mysql_fetch_array($qr221)) {
                                      
                                    ?>
                                        <div class="col">
                                          <h4>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                              <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg>
                                            <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                          </h4>

                                        </div>
                                  
                                    <?php
                                    }
                                    ?>
                                <?php } //End if status = 1
                                 
                                else if ($arrsport_type['status'] == 2) {  //ทีม sv all กรีฑา ว่ายน้ำ
                                  ?>
                                <?php
                                      $sql221 = "SELECT * from user_sportall u 
                                        LEFT JOIN score_all sa ON u.score_all_id = sa.score_all_id 
                                        LEFT JOIN student_sports s ON u.id_student = s.id_student
                                        where s.id_university='" . $dataM1['id_university'] . "' 
                                        AND sa.sport_type_id = '" . $dataM1['id_Sports_category'] . "'
                                        AND u.sex = 'ชาย' 
                                        AND sa.round_id = '7' 
                                        AND u.university_ranking = '$dataM1[ranks_medal]'
                                        ";
                                      $qr221 = mysql_query($sql221);
                                      while ($arr221 = mysql_fetch_array($qr221)) {
                                      ?>
                                          <div class="col">
                                            <h4>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                              </svg>
                                              <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                            </h4>
  
                                          </div>
                                      <?php
                                      } // END While
                                    
                              }// End if status = 2 
                              else if ($arrsport_type['status'] == 3) { //ทีม sv 2 เช่น แบตมินตัน, เทเบิลเทนนิส
                              ?>
                              <?php
                                    $sql221 = "SELECT * from user_sportvs2 u
                                    LEFT JOIN teamvs2 t ON u.id_team = t.id_team
                                    LEFT JOIN student_sports s ON u.id_student = s.id_student
                                    where s.id_university='" . $dataM1['id_university'] . "' 
                                    AND t.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                    AND t.sex = 'ชาย' 
                                    AND t.hand_ranks = '$dataM1[hand_ranks]'
                                    ";
                                    $qr221 = mysql_query($sql221);
                                    while ($arr221 = mysql_fetch_array($qr221)) {
                                  ?>
                                      <div class="col">
                                        <h4>
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                          </svg>
                                          <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                        </h4>

                                      </div>
                                    <?php
                                    } // END While
                                    ?>
                              <?php } //End if status = 3
                              } //end while medal ?>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="card" style="max-width: 25rem;">
                              <div class="card-header" style="background-color: #B87333;">
                              <h4 class="card-title"><img src="/admin/img/3.png" width="50" /> <strong>เหรียญทองแดง</strong></h4>
                              </div>
                              <div class="card-content">
                                <div class="card-body">
                                  <?php
                                  $sqlM1 = "SELECT * FROM medal_detail m 
                                            LEFT JOIN university u ON m.id_university = u.id_university
                                            WHERE m.id_Sports_category = '" . $arrsport_type['id_Sports_category'] . "'
                                            AND m.ranks_medal = '3'  AND m.sex = 'ชาย'
                                            ";
                                  $resM1 = mysql_query($sqlM1);
                                  //$dataM1 = mysql_fetch_array($resM1);
                                  while($dataM1 = mysql_fetch_array($resM1)){
                                  ?>
                                  <div class="col">
                                    <h3>
                                    <?php 
                                      if($dataM1['hand_ranks'] == ''){
                                        echo 'รอการยืนยัน...';
                                      }else if($arrsport_type['status'] == '3'){
                                        echo $dataM1['subname_university']. ' ('.$dataM1['hand_ranks'].')';
                                      } else {
                                        echo $dataM1['subname_university'];
                                      }
                                      ?> 
                                        </h3>
                                    <hr class="copper">
                                  </div>
                                  
                                  <?php if ($arrsport_type['status'] == 1) { // ทีม vs เช่น ฟุตบอล บาส?>
                                    <?php
                                    $sql221 = "SELECT * from sport_regis r
                                    LEFT JOIN student_sports s ON r.id_student = s.id_student
                                    where r.id_university='" . $dataM1['id_university'] . "' 
                                    AND r.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                    AND r.sex = 'M' 
                                    AND s.st = '9'";
                                    $qr221 = mysql_query($sql221);
                                    while ($arr221 = mysql_fetch_array($qr221)) {
                                      
                                    ?>
                                        <div class="col">
                                          <h4>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                              <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg>
                                            <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                          </h4>

                                        </div>
                                  
                                    <?php
                                    }
                                    ?>
                            <?php } //End if status = 1
                                 
                                else if ($arrsport_type['status'] == 2) {  //ทีม sv all กรีฑา ว่ายน้ำ
                                  ?>
                                <?php
                                      $sql221 = "SELECT * from user_sportall u 
                                        LEFT JOIN score_all sa ON u.score_all_id = sa.score_all_id 
                                        LEFT JOIN student_sports s ON u.id_student = s.id_student
                                        where s.id_university='" . $dataM1['id_university'] . "' 
                                        AND sa.sport_type_id = '" . $dataM1['id_Sports_category'] . "'
                                        AND u.sex = 'ชาย' 
                                        AND sa.round_id = '7' 
                                        AND u.university_ranking = '$dataM1[ranks_medal]'
                                      ";
                                      $qr221 = mysql_query($sql221);
                                      while ($arr221 = mysql_fetch_array($qr221)) {

                                        $sqlStd = "SELECT us.id_student 
                                          FROM user_sportall us 
                                          LEFT JOIN score_all sa ON us.score_all_id = sa.score_all_id 
                                          WHERE sa.sport_type_id = '$dataM1[id_Sports_category]' 
                                          AND sa.round_id = '7' 
                                          AND us.id_student = '$arr221[id_student]'
                                          AND us.university_ranking = '$dataM1[ranks_medal]'";
                                        $rowStd = mysql_num_rows(mysql_query($sqlStd));
                                        if($rowStd == 1) {
                                        
                                      ?>
                                          <div class="col">
                                            <h4>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                              </svg>
                                              <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                            </h4>
  
                                          </div>
                                        <?php }?>
                                    
                                      <?php
                                      } // END While
                                    
                              }// End if status = 2 
                              else if ($arrsport_type['status'] == 3) { //ทีม sv 2 เช่น แบตมินตัน, เปตอง, เทเบิลเทนนิส
                              ?>
                              <?php
                                    $sql221 = "SELECT * from user_sportvs2 u
                                    LEFT JOIN teamvs2 t ON u.id_team = t.id_team
                                    LEFT JOIN student_sports s ON u.id_student = s.id_student
                                    where s.id_university='" . $dataM1['id_university'] . "' 
                                    AND t.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                    AND t.sex = 'ชาย' 
                                    AND t.hand_ranks = '$dataM1[hand_ranks]'
                                    ";
                                    
                                    $qr221 = mysql_query($sql221);
                                    while ($arr221 = mysql_fetch_array($qr221)) {
                                    
                                  ?>
                                      <div class="col">
                                        <h4>
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                          </svg>
                                          <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                        </h4>
                                      </div>
                                    <?php
                                    } // END While
                                    ?>
                              <?php } //End if status = 3 
                              ?>
                              <hr>
                              <?php
                              } //end while medal
                              ?>
                              </div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!--End row.-->

                      </div>
                    </div>

                    </p>
                  </div>
                <?php }
                if ($arrsport_type['playerF'] != '0' &&   $arrsport_type['st'] == '0') { // หญิง
                  ?>
                      <div role="tabpanel" class="tab-pane <?php if ($checka == 0) { ?>active<?php $checka++;
                                                                                            } ?>" id="tab<?php echo $arrsport_type['id_Sports_category'] . "F"; ?>31" aria-expanded="true" aria-labelledby="base-tab<?php echo $arrsport_type['id_Sports_category'] . "F"; ?>31">
                        <p>
                        <div class="card-content">
                          <div class="card-body  px-0 py-0">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="card" style="max-width: 25rem;">
                                  <div class="card-header" style="background-color: #FFD700;">
                                    <h4 class="card-title"><img src="admin/img/1.png" width="50" /> <strong>เหรียญทอง</strong></h4>
                                  </div>
                                  <div class="card-content">
                                    <div class="card-body">
                                      <?php
                                      $sqlM1 = "SELECT * FROM medal_detail m 
                                                LEFT JOIN university u ON m.id_university = u.id_university
                                                WHERE m.id_Sports_category = '" . $arrsport_type['id_Sports_category'] . "'
                                                AND m.ranks_medal = '1'  AND m.sex = 'หญิง'
                                                ";
                                      $resM1 = mysql_query($sqlM1);
                                      while($dataM1 = mysql_fetch_array($resM1)) {
                                      ?>
                                      
                                      <div class="col">
                                        <h3>
                                        <?php 
                                        if($dataM1['hand_ranks'] == ''){
                                          echo 'รอการยืนยัน...';
                                        }else if($arrsport_type['status'] == '3'){
                                          echo $dataM1['subname_university']. ' ('.$dataM1['hand_ranks'].')';
                                        } else {
                                          echo $dataM1['subname_university'];
                                        }
                                        ?> </h3>
                                        <hr class="gold">
                                      </div>
                                      <?php if ($arrsport_type['status'] == 1) { ?>
                                        <?php
                                        $sql221 = "SELECT * from sport_regis r
                                                LEFT JOIN student_sports s ON r.id_student = s.id_student
                                                where r.id_university='" . $dataM1['id_university'] . "' 
                                                AND r.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                                AND r.sex = 'F' 
                                                AND s.st = '9'";
                                        $qr221 = mysql_query($sql221);
                                        while ($arr221 = mysql_fetch_array($qr221)) {
                                        ?>
                                            <div class="col">
                                              <h4>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                  <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                </svg>
                                                <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                              </h4>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                      <?php } //End if status
                                      else if ($arrsport_type['status'] == 2) {  //ทีม sv all กรีฑา ว่ายน้ำ
                                        ?>
                                      <?php
                                          $sql221 = "SELECT * from user_sportall u 
                                            LEFT JOIN score_all sa ON u.score_all_id = sa.score_all_id 
                                            LEFT JOIN student_sports s ON u.id_student = s.id_student
                                            where s.id_university='" . $dataM1['id_university'] . "' 
                                            AND sa.sport_type_id = '" . $dataM1['id_Sports_category'] . "'
                                            AND u.sex = 'หญิง' 
                                            AND sa.round_id = '7' 
                                            AND u.university_ranking = '$dataM1[ranks_medal]'
                                            ";
                                          $qr221 = mysql_query($sql221);
                                          while ($arr221 = mysql_fetch_array($qr221)) {
                                          ?>
                                              <div class="col">
                                                <h4>
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                  </svg>
                                                  <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                                </h4>
      
                                              </div>
                                          <?php
                                          } // END While
                                          
                                    }// End if status = 2 
                                    else if ($arrsport_type['status'] == 3) { //ทีม sv 2 เช่น แบตมินตัน
                                    ?>
                                    <?php
                                        $sql221 = "SELECT * from user_sportvs2 u
                                          LEFT JOIN teamvs2 t ON u.id_team = t.id_team
                                          LEFT JOIN student_sports s ON u.id_student = s.id_student
                                          where s.id_university='" . $dataM1['id_university'] . "' 
                                          AND t.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                          AND t.sex = 'หญิง' 
                                          AND t.hand_ranks = '$dataM1[hand_ranks]'
                                          ";
                                        $qr221 = mysql_query($sql221);
                                        while ($arr221 = mysql_fetch_array($qr221)) {
                                            
                                          ?>
                                              <div class="col">
                                                <h4>
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                  </svg>
                                                  <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                                </h4>
      
                                              </div>
                                        
                                          <?php
                                          } // END While
                                          ?>
                                    <?php } //End if status = 3 
                                      ?>
                                      <hr>
                                      <?php
                                      } //end while medal
                                      ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="card" style="max-width: 25rem;">
                                  <div class="card-header" style="background-color: #C0C0C0;">
                                    <h4 class="card-title"><img src="/admin/img/2.png" width="50" /> <strong>เหรียญเงิน</strong></h4>
                                  </div>
                                  <div class="card-content">
                                    <div class="card-body">
                                      <?php
                                      $sqlM1 = "SELECT * FROM medal_detail m 
                                                LEFT JOIN university u ON m.id_university = u.id_university
                                                WHERE m.id_Sports_category = '" . $arrsport_type['id_Sports_category'] . "'
                                                AND m.ranks_medal = '2'  AND m.sex = 'หญิง'
                                                ";
                                      $resM1 = mysql_query($sqlM1);
                                      while($dataM1 = mysql_fetch_array($resM1)) {
                                      ?>
                                      <div class="col">
                                        <h3>
                                        <?php 
                                        if($dataM1['hand_ranks'] == ''){
                                          echo 'รอการยืนยัน...';
                                        }else if($arrsport_type['status'] == '3'){
                                          echo $dataM1['subname_university']. ' ('.$dataM1['hand_ranks'].')';
                                        } else {
                                          echo $dataM1['subname_university'];
                                        }
                                        ?> </h3>
                                        <hr class="silver">
                                      </div>
                                      
                                      <?php if ($arrsport_type['status'] == 1) { // ทีม vs เช่น ฟุตบอล บาส?>
                                        <?php
                                        $sql221 = "SELECT * from sport_regis r
                                        LEFT JOIN student_sports s ON r.id_student = s.id_student
                                        where r.id_university='" . $dataM1['id_university'] . "' 
                                        AND r.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                        AND r.sex = 'F' 
                                        AND s.st = '9'";
                                        $qr221 = mysql_query($sql221);
                                        while ($arr221 = mysql_fetch_array($qr221)) {
                                          
                                        ?>
                                            <div class="col">
                                              <h4>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                  <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                </svg>
                                                <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                              </h4>
    
                                            </div>
                                      
                                        <?php
                                        }
                                        ?>
                                <?php } //End if status = 1
                                     
                                    else if ($arrsport_type['status'] == 2) {  //ทีม sv all กรีฑา ว่ายน้ำ
                                      ?>
                                    <?php
                                          $sql221 = "SELECT * from user_sportall u 
                                          LEFT JOIN score_all sa ON u.score_all_id = sa.score_all_id 
                                          LEFT JOIN student_sports s ON u.id_student = s.id_student
                                          where s.id_university='" . $dataM1['id_university'] . "' 
                                          AND sa.sport_type_id = '" . $dataM1['id_Sports_category'] . "'
                                          AND u.sex = 'หญิง' 
                                          AND sa.round_id = '7' 
                                          AND u.university_ranking = '$dataM1[ranks_medal]'
                                          ";
                                          $qr221 = mysql_query($sql221);
                                          while ($arr221 = mysql_fetch_array($qr221)) {
                                          ?>
                                              <div class="col">
                                                <h4>
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                  </svg>
                                                  <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                                </h4>
      
                                              </div>
                                          <?php
                                          } // END While
                                        
                                  }// End if status = 2 
                                  else if ($arrsport_type['status'] == 3) { //ทีม sv 2 เช่น แบตมินตัน
                                  ?>
                                  <?php
                                      $sql221 = "SELECT * from user_sportvs2 u
                                         LEFT JOIN teamvs2 t ON u.id_team = t.id_team
                                         LEFT JOIN student_sports s ON u.id_student = s.id_student
                                         where s.id_university='" . $dataM1['id_university'] . "' 
                                         AND t.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                         AND t.sex = 'หญิง' 
                                         AND t.hand_ranks = '$dataM1[hand_ranks]'
                                         ";
                                      $qr221 = mysql_query($sql221);
                                      while ($arr221 = mysql_fetch_array($qr221)) {
                                        
                                      ?>
                                          <div class="col">
                                            <h4>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                              </svg>
                                              <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                            </h4>
    
                                          </div>
                                        <?php
                                        } // END While
                                        ?>
                                  <?php } //End if status = 3 
                                    ?>
                                    <hr>
                                    <?php
                                    } //end while medal
                                    ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="card" style="max-width: 25rem;">
                                  <div class="card-header" style="background-color: #B87333;">
                                  <h4 class="card-title"><img src="/admin/img/3.png" width="50" /> <strong>เหรียญทองแดง</strong></h4>
                                  </div>
                                  <div class="card-content">
                                    <div class="card-body">
                                      <?php
                                      $sqlM1 = "SELECT * FROM medal_detail m 
                                                LEFT JOIN university u ON m.id_university = u.id_university
                                                WHERE m.id_Sports_category = '" . $arrsport_type['id_Sports_category'] . "'
                                                AND m.ranks_medal = '3'  AND m.sex = 'หญิง'
                                                ";
                                      $resM1 = mysql_query($sqlM1);
                                      while($dataM1 = mysql_fetch_array($resM1)) {
                                      ?>
                                      <div class="col">
                                        <h3>
                                        <?php 
                                        if($dataM1['hand_ranks'] == ''){
                                          echo 'รอการยืนยัน...';
                                        }else if($arrsport_type['status'] == '3'){
                                          echo $dataM1['subname_university']. ' ('.$dataM1['hand_ranks'].')';
                                        } else {
                                          echo $dataM1['subname_university'];
                                        }
                                        ?> 
                                        </h3>
                                        <hr class="copper">
                                      </div>
                                      
                                      <?php if ($arrsport_type['status'] == 1) { // ทีม vs เช่น ฟุตบอล บาส?>
                                        <?php
                                        $sql221 = "SELECT * from sport_regis r
                                        LEFT JOIN student_sports s ON r.id_student = s.id_student
                                        where r.id_university='" . $dataM1['id_university'] . "' 
                                        AND r.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                        AND r.sex = 'F' 
                                        AND s.st = '9'";
                                        $qr221 = mysql_query($sql221);
                                        while ($arr221 = mysql_fetch_array($qr221)) {
                                          
                                        ?>
                                            <div class="col">
                                              <h4>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                  <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                </svg>
                                                <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                              </h4>
    
                                            </div>
                                      
                                        <?php
                                        }
                                        ?>
                                <?php } //End if status = 1
                                     
                                    else if ($arrsport_type['status'] == 2) {  //ทีม sv all กรีฑา ว่ายน้ำ
                                      ?>
                                    <?php
                                          $sql221 = "SELECT * from user_sportall u 
                                          LEFT JOIN score_all sa ON u.score_all_id = sa.score_all_id 
                                          LEFT JOIN student_sports s ON u.id_student = s.id_student
                                          where s.id_university='" . $dataM1['id_university'] . "' 
                                          AND sa.sport_type_id = '" . $dataM1['id_Sports_category'] . "'
                                          AND u.sex = 'หญิง' 
                                          AND sa.round_id = '7' 
                                          AND u.university_ranking = '$dataM1[ranks_medal]'
                                          ";
                                          $qr221 = mysql_query($sql221);
                                          while ($arr221 = mysql_fetch_array($qr221)) {
                                          ?>
                                              <div class="col">
                                                <h4>
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                  </svg>
                                                  <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                                </h4>
                                              </div>
                                          <?php
                                          } // END While
                                        
                                  }// End if status = 2 
                                  else if ($arrsport_type['status'] == 3) { //ทีม sv 2 เช่น แบตมินตัน
                                  ?>
                                  <?php
                                      $sql221 = "SELECT * from user_sportvs2 u
                                         LEFT JOIN teamvs2 t ON u.id_team = t.id_team
                                         LEFT JOIN student_sports s ON u.id_student = s.id_student
                                         where s.id_university='" . $dataM1['id_university'] . "' 
                                         AND t.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                         AND t.sex = 'หญิง' 
                                         AND t.hand_ranks = '$dataM1[hand_ranks]'
                                         ";
                                      $qr221 = mysql_query($sql221);
                                      while ($arr221 = mysql_fetch_array($qr221)) {
                                        
                                      ?>
                                          <div class="col">
                                            <h4>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                              </svg>
                                              <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                            </h4>
    
                                          </div>
                                      
                                        <?php
                                        } // END While
                                        ?>
                                  <?php } //End if status = 3 
                                  ?>
                                  <hr>
                                  <?php
                                  } //end while medal
                                  ?>
                                    </div>
                                  </div>
    
                                </div>
                              </div>
                            </div>
                            <!--End row.-->
    
                          </div>
                        </div>
    
                        </p>
                      </div>
                    <?php }
                if ($arrsport_type['st'] == '1') { // vs 2 คู่ผสม
                  ?>
                      <div role="tabpanel" class="tab-pane <?php if ($checka == 0) { ?>active<?php $checka++;
                                                                                            } ?>" id="tab<?php echo $arrsport_type['id_Sports_category'] . "MF"; ?>31" aria-expanded="true" aria-labelledby="base-tab<?php echo $arrsport_type['id_Sports_category'] . "MF"; ?>31">
                        <p>
                        <div class="card-content">
                          <div class="card-body  px-0 py-0">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="card" style="max-width: 25rem;">
                                  <div class="card-header" style="background-color: #FFD700;">
                                    <h4 class="card-title"><img src="admin/img/1.png" width="50" /> <strong>เหรียญทอง</strong></h4>
                                  </div>
                                  <div class="card-content">
                                    <div class="card-body">
                                      <?php
                                      $sqlM1 = "SELECT * FROM medal_detail m 
                                                LEFT JOIN university u ON m.id_university = u.id_university
                                                WHERE m.id_Sports_category = '" . $arrsport_type['id_Sports_category'] . "'
                                                AND m.ranks_medal = '1'  AND m.sex = 'คู่ผสม'
                                                ";
                                      $resM1 = mysql_query($sqlM1);
                                      while($dataM1 = mysql_fetch_array($resM1)) {
                                      ?>
                                      
                                      <div class="col">
                                      <h3>
                                      <?php 
                                      if($dataM1['hand_ranks'] == ''){
                                        echo 'รอการยืนยัน...';
                                      }else if($arrsport_type['status'] == '3'){
                                        echo $dataM1['subname_university']. ' ('.$dataM1['hand_ranks'].')';
                                      } else {
                                        echo $dataM1['subname_university'];
                                      }
                                      ?>  
                                      </h3>
                                        <hr class="gold">
                                      </div>
                                      <?php
                                      if ($arrsport_type['status'] == 2) {  //ทีม sv all กรีฑา ว่ายน้ำ
                                          $sql221 = "SELECT * from user_sportall u 
                                            LEFT JOIN score_all sa ON u.score_all_id = sa.score_all_id 
                                            LEFT JOIN student_sports s ON u.id_student = s.id_student
                                            where s.id_university='" . $dataM1['id_university'] . "' 
                                            AND sa.sport_type_id = '" . $dataM1['id_Sports_category'] . "'
                                            AND u.sex = 'คู่ผสม' 
                                            AND sa.round_id = '7' 
                                            AND u.university_ranking = '$dataM1[ranks_medal]'
                                            ";
                                          $qr221 = mysql_query($sql221);
                                          while ($arr221 = mysql_fetch_array($qr221)) {
                                          ?>
                                              <div class="col">
                                                <h4>
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                  </svg>
                                                  <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                                </h4>
      
                                              </div>
                                          <?php
                                          } // END While
                                          
                                    }// End if status = 2 
                                      else if ($arrsport_type['status'] == 3) { //ทีม sv 2 เช่น แบตมินตัน
                                  
                                          $sql221 = "SELECT * from user_sportvs2 u
                                          LEFT JOIN teamvs2 t ON u.id_team = t.id_team
                                          LEFT JOIN student_sports s ON u.id_student = s.id_student
                                          where s.id_university='" . $dataM1['id_university'] . "' 
                                          AND t.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                          AND t.sex = 'คู่ผสม' 
                                          AND t.hand_ranks = '$dataM1[hand_ranks]'
                                          ";
                                          $qr221 = mysql_query($sql221);
                                          while ($arr221 = mysql_fetch_array($qr221)) {
                                          ?>
                                              <div class="col">
                                                <h4>
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                  </svg>
                                                  <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                                </h4>
      
                                              </div>
                                          <?php
                                          } // END While
                                          ?>
                                    <?php } //End if status = 3 
                                    ?>
                                    <hr>
                                    <?php
                                    } //end while medal
                                    ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="card" style="max-width: 25rem;">
                                  <div class="card-header" style="background-color: #C0C0C0;">
                                    <h4 class="card-title"><img src="/admin/img/2.png" width="50" /> <strong>เหรียญเงิน</strong></h4>
                                  </div>
                                  <div class="card-content">
                                    <div class="card-body">
                                      <?php
                                      $sqlM1 = "SELECT * FROM medal_detail m 
                                                LEFT JOIN university u ON m.id_university = u.id_university
                                                WHERE m.id_Sports_category = '" . $arrsport_type['id_Sports_category'] . "'
                                                AND m.ranks_medal = '2' AND m.sex = 'คู่ผสม'
                                                ";
                                      $resM1 = mysql_query($sqlM1);
                                      while($dataM1 = mysql_fetch_array($resM1)) {
                                      ?>
                                      <div class="col">
                                      <h3>
                                      <?php 
                                      if($dataM1['hand_ranks'] == ''){
                                        echo 'รอการยืนยัน...';
                                      }else if($arrsport_type['status'] == '3'){
                                        echo $dataM1['subname_university']. ' ('.$dataM1['hand_ranks'].')';
                                      } else {
                                        echo $dataM1['subname_university'];
                                      }
                                      ?> 
                                      </h3>
                                        <hr class="silver">
                                      </div>
                                      
                                      <?php
                                      if ($arrsport_type['status'] == 2) {  //ทีม sv all กรีฑา ว่ายน้ำ
                                          $sql221 = "SELECT * from user_sportall u 
                                            LEFT JOIN score_all sa ON u.score_all_id = sa.score_all_id 
                                            LEFT JOIN student_sports s ON u.id_student = s.id_student
                                            where s.id_university='" . $dataM1['id_university'] . "' 
                                            AND sa.sport_type_id = '" . $dataM1['id_Sports_category'] . "'
                                            AND u.sex = 'คู่ผสม' 
                                            AND sa.round_id = '7' 
                                            AND u.university_ranking = '$dataM1[ranks_medal]'
                                            ";
                                          $qr221 = mysql_query($sql221);
                                          while ($arr221 = mysql_fetch_array($qr221)) {
                                          ?>
                                              <div class="col">
                                                <h4>
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                  </svg>
                                                  <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                                </h4>
      
                                              </div>
                                          <?php
                                          } // END While
                                          
                                    }// End if status = 2 
                                      else  if ($arrsport_type['status'] == 3) { //ทีม sv 2 เช่น แบตมินตัน
                                  
                                        $sql221 = "SELECT * from user_sportvs2 u
                                          LEFT JOIN teamvs2 t ON u.id_team = t.id_team
                                          LEFT JOIN student_sports s ON u.id_student = s.id_student
                                          where s.id_university='" . $dataM1['id_university'] . "' 
                                          AND t.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                          AND t.sex = 'คู่ผสม' 
                                          AND t.hand_ranks = '$dataM1[hand_ranks]'
                                          ";
                                        $qr221 = mysql_query($sql221);
                                        while ($arr221 = mysql_fetch_array($qr221)) {
                                      ?>
                                          <div class="col">
                                            <h4>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                              </svg>
                                              <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                            </h4>
    
                                          </div>
                                        <?php
                                        } // END While
                                        ?>
                                  <?php } //End if status = 3 
                                  ?>
                                  <hr>
                                  <?php
                                  } //end while medal
                                  ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="card" style="max-width: 25rem;">
                                  <div class="card-header" style="background-color: #B87333;">
                                  <h4 class="card-title"><img src="/admin/img/3.png" width="50" /> <strong>เหรียญทองแดง</strong></h4>
                                  </div>
                                  <div class="card-content">
                                    <div class="card-body">
                                      <?php
                                      $sqlM1 = "SELECT * FROM medal_detail m 
                                                LEFT JOIN university u ON m.id_university = u.id_university
                                                WHERE m.id_Sports_category = '" . $arrsport_type['id_Sports_category'] . "'
                                                AND m.ranks_medal = '3' AND m.sex = 'คู่ผสม'
                                                ";
                                      $resM1 = mysql_query($sqlM1);
                                      while($dataM1 = mysql_fetch_array($resM1)) {
                                      ?>
                                      <div class="col">
                                        <h3>
                                        <?php 
                                      if($dataM1['hand_ranks'] == ''){
                                        echo 'รอการยืนยัน...';
                                      }else if($arrsport_type['status'] == '3'){
                                        echo $dataM1['subname_university']. ' ('.$dataM1['hand_ranks'].')';
                                      } else {
                                        echo $dataM1['subname_university'];
                                      }
                                      ?> 
                                       </h3>
                                        <hr class="copper">
                                      </div>
                                      
                                      <?php
                                      if ($arrsport_type['status'] == 2) {  //ทีม sv all กรีฑา ว่ายน้ำ
                                          $sql221 = "SELECT * from user_sportall u 
                                            LEFT JOIN score_all sa ON u.score_all_id = sa.score_all_id 
                                            LEFT JOIN student_sports s ON u.id_student = s.id_student
                                            where s.id_university='" . $dataM1['id_university'] . "' 
                                            AND sa.sport_type_id = '" . $dataM1['id_Sports_category'] . "'
                                            AND u.sex = 'คู่ผสม' 
                                            AND sa.round_id = '7' 
                                            AND u.university_ranking = '$dataM1[ranks_medal]'
                                            ";
                                          $qr221 = mysql_query($sql221);
                                          while ($arr221 = mysql_fetch_array($qr221)) {
                                          ?>
                                              <div class="col">
                                                <h4>
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                  </svg>
                                                  <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                                </h4>
      
                                              </div>
                                          <?php
                                          } // END While
                                          
                                    }// End if status = 2 
                                      else  if ($arrsport_type['status'] == 3) { //ทีม sv 2 เช่น แบตมินตัน
                                        $sql221 = "SELECT * from user_sportvs2 u
                                          LEFT JOIN teamvs2 t ON u.id_team = t.id_team
                                          LEFT JOIN student_sports s ON u.id_student = s.id_student
                                          where s.id_university='" . $dataM1['id_university'] . "' 
                                          AND t.id_Sports_category = '" . $dataM1['id_Sports_category'] . "'
                                          AND t.sex = 'คู่ผสม' 
                                          AND t.hand_ranks = '$dataM1[hand_ranks]'
                                          ";
                                        $qr221 = mysql_query($sql221);
                                        while ($arr221 = mysql_fetch_array($qr221)) {
                                      ?>
                                          <div class="col">
                                            <h4>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                              </svg>
                                              <?php echo " " . $arr221['title_name'] . $arr221['f_name'] . " " . $arr221['l_name']; ?>
                                            </h4>
    
                                          </div>
                                        <?php
                                        } // END While
                                        ?>
                                  <?php } //End if status = 3 
                                  ?>
                                  <hr>
                                  <?php
                                  } //end while medal
                                  ?>
                                    </div>
                                  </div>
    
                                </div>
                              </div>
                            </div>
                            <!--End row.-->
    
                          </div>
                        </div>
    
                        </p>
                      </div>
                    <?php }
                $checka++;
              } ?>

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
<script src="app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
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
<script src="app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<script src="app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
<script src="app-assets/js/scripts/tables/components/table-components.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<?php
if ($checkadd == "1") {
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
      function() {
        window.location.href = "home.php?menu=regissport&tab=<?php echo $_GET['tab']; ?>&tab2=<?php echo $_GET['tab2']; ?>";

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
  function archiveFunction(id, id2, id3) {
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
          window.location.href = "home.php?menu=regissport&action=delect&checkdel=" + id + "&tab=" + id2 + "&tab2=" + id3;

        } else {
          swal("ยกเลิก", "คุณได้ยกเลิกข้อมูลแล้ว:)", "error");
        }
      });
  }
</script>