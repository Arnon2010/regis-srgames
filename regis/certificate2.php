<?php
ob_start();
session_start();
include("connect_db.php");
require_once('mpdf/mpdf.php');
if ($_SESSION['admin_id'] == "") {
  header("location: index.php");
  exit(0);
}
$sql7 = "select * from student_sports where id_student = '" . $_GET['student'] . "' ";
$query7 = mysql_query($sql7, $conn) or die(mysql_error());
$arr7 = mysql_fetch_array($query7);


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
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>

</head>

<body><br><br><br><br><br><br><br>
  <table width="100%" border="0" background="piclogo/logo.jpg">
    <tbody>
      <tr>
        <td align="center" width="10%"></td>
        <td align="center" width="80%">

          <font color="#140958">
            <b style="font-family: thsarabun;  font-size: 36pt;">
              มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย</b>
          </font>

          <font color="#744C00">
            <p style="font-family: thsarabun;  font-size: 24pt;">
              มอบเกียรติบัตรฉบับนี้ให้ไว้เพื่อแสดงว่า</p>
          </font>
        </td>
        <td align="center" width="10%"></td>
      </tr>
    </tbody>
  </table>
  <!------------------1----------------->
  <table width="100%" border="0">
    <tbody>
      <tr>
        <td align="center">
          <b style="font-family: thsarabun;  font-size: 28pt;">
            <?php echo $arr7['title_name']; ?><?php echo $arr7['f_name']; ?> <?php echo $arr7['l_name']; ?></b>
          <p style="font-family: thsarabun;  font-size: 24pt;">
            <?php
            $sqluni = "select * from university where id_university = '" . $arr7['id_university'] . "' ";
            $queryuni = mysql_query($sqluni, $conn) or die(mysql_error());
            $arruni = mysql_fetch_array($queryuni);
            echo $arruni['name_university'];
            ?>
          </p>
        </td>
      </tr>
    </tbody>
  </table>

  <!------------------1----------------->

  <table width="100%" border="0">
    <tbody>
      <tr>
        <td align="center" style="color:#744C00">
          <b style="font-family: thsarabun;  font-size: 24pt;"> ได้รับรางวัล
            <?php

            $sql2 = "select * from medal_detail where id_university='" . $_SESSION['university_id'] . "'";
            $qr2 = mysql_query($sql2);
            while ($arr2 = mysql_fetch_array($qr2)) {
              $sql22 = "select * from sports_category where id_Sports_category='" . $arr2['id_Sports_category'] . "' and id_Sports_category='" . $_GET['id'] . "'";
              $qr22 = mysql_query($sql22);
              $arr22 = mysql_fetch_array($qr22);
              if ($arr2['sex'] == "ชาย") {
                $checkdex = "M";
              } else if ($arr2['sex'] == "หญิง") {
                $checkdex = "F";
              }

              if ($arr22['status'] == 1) { ?>

                <?php
                if ($arr2['sex'] == "คู่ผสม") {
                  $sql221 = "select * from sport_regis where id_university='" . $_SESSION['university_id'] . "' and  id_Sports_category = '" . $arr2['id_Sports_category'] . "'  and  id_student ='" . $arr7['id_student'] . "'";
                } else {
                  $sql221 = "select * from sport_regis where id_university='" . $_SESSION['university_id'] . "' and  id_Sports_category = '" . $arr2['id_Sports_category'] . "'  and  id_student ='" . $arr7['id_student'] . "' and sex='$checkdex' ";
                }

                $qr221 = mysql_query($sql221);
                while ($arr221 = mysql_fetch_array($qr221)) {
                ?>
                  <?php if ($arr2['ranks_medal'] == 1) { ?>
                    ชนะเลิศอันดับ 1
                  <?php } else if ($arr2['ranks_medal'] == 2) { ?>
                    รองชนะเลิศอันดับ 1
                  <?php } else if ($arr2['ranks_medal'] == 3) { ?>
                    รองชนะเลิศอันดับ 2
                  <?php } ?>
                <?php
                  echo $arr22['name_Sports_category'];
                }
                ?>

              <?php } else if ($arr22['status'] == 2) { ?>

                <?php

                $sql222 = "select * from score_all where sport_type_id = '" . $arr2['id_Sports_category'] . "' and sex='" . $arr2['sex'] . "'";
                $qr222 = mysql_query($sql222);
                $arr222 = mysql_fetch_array($qr222);


                $sql2221 = "select * from user_sportall where score_all_id = '" . $arr222['score_all_id'] . "' and id_student = '" . $arr7['id_student'] . " '
												 ";
                $qr2221 = mysql_query($sql2221);
                while ($arr2221 = mysql_fetch_array($qr2221)) {
                ?>
                  <?php if ($arr2['ranks_medal'] == 1) { ?>
                    ชนะเลิศอันดับ 1
                  <?php } else if ($arr2['ranks_medal'] == 2) { ?>
                    รองชนะเลิศอันดับ 1
                  <?php } else if ($arr2['ranks_medal'] == 3) { ?>
                    รองชนะเลิศอันดับ 2
                  <?php } ?>
                <?php
                  echo $arr22['name_Sports_category'];
                } ?>


              <?php } else if ($arr22['status'] == 3) { ?>

                <?php
                $sql223 = "select * from teamvs2 where id_university='" . $_SESSION['university_id'] . "' and id_Sports_category = '" . $arr2['id_Sports_category'] . "' and hand_ranks = '" . $arr2['hand_ranks'] . "' and sex ='" . $arr2['sex'] . "'";
                $qr223 = mysql_query($sql223);
                $arr223 = mysql_fetch_array($qr223);
                $sql2231 = "select * from user_sportvs2 where id_team='" . $arr223['id_team'] . "'";
                $qr2231 = mysql_query($sql2231);
                while ($arr2231 = mysql_fetch_array($qr2231)) {

                  $sql2232 = "select * from student_sports where id_student='" . $arr2231['id_student'] . "'";
                  $qr2232 = mysql_query($sql2232);
                  $arr2232 = mysql_fetch_array($qr2232);

                  if ($arr7['id_student'] == $arr2232['id_student']) {
                ?>
                    <?php if ($arr2['ranks_medal'] == 1) { ?>
                      ชนะเลิศอันดับ 1
                    <?php } else if ($arr2['ranks_medal'] == 2) { ?>
                      รองชนะเลิศอันดับ 1
                    <?php } else if ($arr2['ranks_medal'] == 3) { ?>
                      รองชนะเลิศอันดับ 2
                    <?php } ?>
                  <?php
                    echo $arr22['name_Sports_category'];
                  }


                  ?>
            <?php
                }
              }
            }
            ?>
          </b><br>
          <b style="font-family: thsarabun;  font-size: 25pt;">
            การแข่งขันกีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ครั้งที่ 37 "ศรีวิชัยเกมส์"</b>
        </td>
      </tr>
    </tbody>
  </table>

  <!------------------1----------------->
  <table width="100%" border="0">
    <tbody>
      <tr>
        <td align="center" style="color:#140958">
          <p style="font-family: thsarabun;  font-size: 22pt;">
            ระหว่างวันที่ 6 - 10 กุมภาพันธ์ พ.ศ. 2566</p>
        </td>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="0">
    <tbody>
      <tr>
        <td align="center" style="color:#140958">
          <p style="font-family: thsarabun;  font-size: 22pt;">
          ณ มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย ต.บ่อยาง อ.เมือง จ.สงขลา</p>
        </td>
      </tr>
    </tbody>
  </table>

  <!------------------1----------------->
  <table width="100%" border="0">
    <tbody>
      <tr>
        <td align="center">
          <img class="brand-logo" alt="modern admin logo" src="piclogo/ruts-athikarn.png" width="110">
        </td>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="0">
    <tbody>
    <tr>
      <td align="center" style="color:#050E6F">
      <p style="font-family: thsarabun;  font-size: 20pt;">
      ศาสตราจารย์ ดร.สุวัจน์  ธัญรส</p>
      <p style="font-family: thsarabun;  font-size: 16pt;">
      อธิการบดีมหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย</p>
      <p style="font-family: thsarabun;  font-size: 16pt;">
      ประธานคณะกรรมการจัดการแข่งขัน</p>
      <p style="font-family: thsarabun;  font-size: 16pt;">
      กีฬามหาวิทยาลัยเทคโนโลยีราชมงคลแห่งประเทศไทย ครั้งที่ 37</p>
      </td>
    </tr>
    </tbody>
  </table>
  <!------------------1----------------->

</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'THSaraban');
$pdf->AddPage('L');
//$pdf->SetAutoFont();
$pdf->SetDefaultBodyCSS('background', "url('piclogo/sirvijayagame-card-2566.png')");
$pdf->SetDefaultBodyCSS('background-image-resize', 1);
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$fileName = $arr7['title_name'].$arr7['f_name'].' '.$arr7['l_name'];
$pdf->Output($fileName.'-'.'เกียรติบัตรได้รับรางวัล.pdf','I');
?>
ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF/MyPDF.pdf">คลิกที่นี้</a>