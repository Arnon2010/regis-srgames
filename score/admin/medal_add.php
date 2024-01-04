<?php
ob_start();
session_start();
include("connect_db.php");
if ($_SESSION['admin_id'] == "") {
  header("location: index.php");
  exit(0);
}

if($_POST['btnSubmit'] != '') {
  $id_university1 = $_POST['id_university1'];
 	  $hand_ranks1 = $_POST['hand_ranks1'];

	  $id_university2 = $_POST['id_university2'];
 	  $hand_ranks2 = $_POST['hand_ranks2'];

	  $id_university3_1 = $_POST['id_university3_1'];
 	  $hand_ranks3_1 = $_POST['hand_ranks3_1'];

	  $id_university3_2 = $_POST['id_university3_2'];
 	  $hand_ranks3_2 = $_POST['hand_ranks3_2'];

	  $id_Sports_category = $_POST['id_Sports_category'];
	  $sex = $_POST['sex'];
	  //$ranks_medal = $_POST['ranks_medal'];
	  $chackio = $_POST['chackio'];
	
	
	if($id_university1 != "" && $chackio=="1"){
		
		$sqlft = "select * from medal where faculty_id = $id_university1";
		$qrft = mysql_query($sqlft);
		$arrft = mysql_fetch_array($qrft);
		
		$sum = $arrft['faculty_1']+1;
		
		$strSQL = "update medal set faculty_1 = '$sum' where faculty_id = $id_university1";
		$objQuery = mysql_query($strSQL);
		
		$strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university1','$hand_ranks1','$id_Sports_category','$sex','1','$chackio')";
		$objQuery = mysql_query($strSQL);
		
	}

	if($id_university2 != ""){

		if($chackio == '1') {
			$sqlft = "select * from medal where faculty_id = $id_university2";
			$qrft = mysql_query($sqlft);
			$arrft = mysql_fetch_array($qrft);
			
			$sum = $arrft['faculty_2']+1;
			
			$strSQL = "update medal set faculty_2 = '$sum' where faculty_id = $id_university2";
			$objQuery = mysql_query($strSQL);
		}
		
		$strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university2','$hand_ranks2','$id_Sports_category','$sex','2','$chackio')";
		$objQuery = mysql_query($strSQL);
		
	}
	
	if($id_university3_1 != ""){

		if($chackio == '1') {
			$sqlft = "select * from medal where faculty_id = $id_university3_1";
			$qrft = mysql_query($sqlft);
			$arrft = mysql_fetch_array($qrft);
			
			$sum = $arrft['faculty_3']+1;
			
			$strSQL = "update medal set faculty_3 = '$sum' where faculty_id = $id_university3_1";
			$objQuery = mysql_query($strSQL);
		}
		
		$strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university3_1','$hand_ranks3_1','$id_Sports_category','$sex','3','$chackio')";
		$objQuery = mysql_query($strSQL);
		
	}

	if($id_university3_2 != ""){

		if($chackio == '1') {
			$sqlft = "select * from medal where faculty_id = $id_university3_2";
			$qrft = mysql_query($sqlft);
			$arrft = mysql_fetch_array($qrft);
			
			$sum = $arrft['faculty_3']+1;
			
			$strSQL = "update medal set faculty_3 = '$sum' where faculty_id = $id_university3_2";
			$objQuery = mysql_query($strSQL);
		}
		
		$strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university3_2','$hand_ranks3_2','$id_Sports_category','$sex','3','$chackio')";
		$objQuery = mysql_query($strSQL);
		
	}

			echo '<SCRIPT language="javascript">
			alert("บันทึกเรียบร้อยแล้ว");
			window.location="main.php?menu=medal_add";
			</script>';
			
			mysql_close();
}

//เหรียญร่วม ทอง, เงิน

if($_POST['btnSubmitOne'] != '') {
  $id_university = $_POST['id_university'];
  $hand_ranks = $_POST['hand_ranks'];
  $id_Sports_category = $_POST['id_Sports_category'];
  $sex = $_POST['sex'];
  $ranks_medal = $_POST['ranks_medal'];
  $chackio = $_POST['chackio'];


if($ranks_medal=="1"&&$chackio=="1"){
 
    $sqlft = "select * from medal where faculty_id = $id_university";
    $qrft = mysql_query($sqlft);
    $arrft = mysql_fetch_array($qrft);
    
    $sum = $arrft['faculty_1']+1;
    
    $strSQL = "update medal set faculty_1 = '$sum' where faculty_id = $id_university";
    $objQuery = mysql_query($strSQL);
    
    $strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university','$hand_ranks','$id_Sports_category','$sex','$ranks_medal','$chackio')";
    $objQuery = mysql_query($strSQL);
    
    }else if($ranks_medal=="2"&&$chackio=="1"){
    
    $sqlft = "select * from medal where faculty_id = $id_university";
    $qrft = mysql_query($sqlft);
    $arrft = mysql_fetch_array($qrft);
    
    $sum = $arrft['faculty_2']+1;
    
    $strSQL = "update medal set faculty_2 = '$sum' where faculty_id = $id_university";
    $objQuery = mysql_query($strSQL);
    
    $strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university','$hand_ranks','$id_Sports_category','$sex','$ranks_medal','$chackio')";
    $objQuery = mysql_query($strSQL);
    
    }else if($ranks_medal=="3"&&$chackio=="1"){
    
    $sqlft = "select * from medal where faculty_id = $id_university";
    $qrft = mysql_query($sqlft);
    $arrft = mysql_fetch_array($qrft);
    
    $sum = $arrft['faculty_3']+1;
    
    $strSQL = "update medal set faculty_3 = '$sum' where faculty_id = $id_university";
    $objQuery = mysql_query($strSQL);
    
    $strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university','$hand_ranks','$id_Sports_category','$sex','$ranks_medal','$chackio')";
    $objQuery = mysql_query($strSQL);
    
    }else if($chackio=="0"){
    
    $strSQL = "INSERT INTO medal_detail VALUES (Null,'$id_university','$hand_ranks','$id_Sports_category','$sex','$ranks_medal','$chackio')";
    $objQuery = mysql_query($strSQL);
    
    }

      echo '<SCRIPT language="javascript">
      alert("บันทึกเรียบร้อยแล้ว");
      window.location="main.php?menu=medal_add";
      </script>';
      
      mysql_close();
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">เพิ่มข้อมูลเหรียญรางวัล</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <form name="frmadd" id="frmadd" action="" method="post">
                <div class="form-group">
                    <label>เลือกกีฬา</label>
                    <select class="form-control select2" name="id_Sport_type" onchange="this.form.submit();" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือกกีฬา -----</option>
                      <?php
                      $sqlst = "select * from sport_type";
                      $qrst = mysql_query($sqlst);
                      while ($arrst = mysql_fetch_array($qrst)) {

                        if($arrst['id_Sport_type'] == $_POST['id_Sport_type'])
                        {
                          $selected = "selected='selected'";
                        } else {
                          $selected = '';
                        }
                      ?>

                        <option value="<?php echo $arrst['id_Sport_type']; ?>" <?php echo $selected;?>>
                          <?php echo $arrst['name_Sport_type']; ?></option>
                      <?php } ?>
                    </select>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label>เลือกประเภทชนิดกีฬา</label>
                    <?php
                      $sqlft1 = "select * from sports_category WHERE id_Sport_type = '$_POST[id_Sport_type]'";
                      $qrft1 = mysql_query($sqlft1);
                      ?>
                    <select class="form-control select2" name="id_Sports_category" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือกชนิดกีฬา -----</option>
                      <?php
                      while ($arrft1 = mysql_fetch_array($qrft1)) {
                      ?>
                        <option value="<?php echo $arrft1['id_Sports_category']; ?>"><?php echo $arrft1['name_Sports_category']; ?></option>
                      <?php } ?>
                    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>เลือกประเภท</label>
                    <select class="form-control select2" name="sex" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือกประเภท -----</option>
                      <option value="ชาย">ชาย</option>
                      <option value="หญิง">หญิง</option>
                      <option value="คู่ผสม">คู่ผสม</option>
                    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>ชนะเลิศ</label>
                    <select class="form-control select2" name="id_university1" style="width: 60%;" required>
                      <option value="">----- กรุณาเลือกคณะ -----</option>
                      <?php
                      $sqlft = "select * from university where id_university!='0'";
                      $qrft = mysql_query($sqlft);
                      while ($arrft = mysql_fetch_array($qrft)) {
                      ?>

                        <option value="<?php echo $arrft['id_university']; ?>"><?php echo $arrft['name_university']; ?></option>
                      <?php } ?>
                    </select>
                    <br/>
                    <select class="form-control select2" name="hand_ranks1" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือกมือวาง -----</option>
                      <option value="1">มือวางอันดับ 1</option>
                      <option value="2">มือวางอันดับ 2</option>
                    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>รองชนะเลิศอันดับ 1</label>
                    <select class="form-control select2" name="id_university2" style="width: 60%;" required>
                      <option value="">----- กรุณาเลือกคณะ -----</option>
                      <?php
                      $sqlft = "select * from university where id_university!='0'";
                      $qrft = mysql_query($sqlft);
                      while ($arrft = mysql_fetch_array($qrft)) {
                      ?>

                        <option value="<?php echo $arrft['id_university']; ?>"><?php echo $arrft['name_university']; ?></option>
                      <?php } ?>
                    </select>
                    <br/>
                    <select class="form-control select2" name="hand_ranks2" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือกมือวาง -----</option>
                      <option value="1">มือวางอันดับ 1</option>
                      <option value="2">มือวางอันดับ 2</option>
                    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>รองชนะเลิศอันดับ 2</label>
                    <select class="form-control select2" name="id_university3_1" style="width: 60%;" required>
                      <option value="">----- กรุณาเลือกคณะ -----</option>
                      <?php
                      $sqlft = "select * from university where id_university!='0'";
                      $qrft = mysql_query($sqlft);
                      while ($arrft = mysql_fetch_array($qrft)) {
                      ?>

                        <option value="<?php echo $arrft['id_university']; ?>"><?php echo $arrft['name_university']; ?></option>
                      <?php } ?>
                    </select>
                    <br/>
                    <select class="form-control select2" name="hand_ranks3_1" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือกมือวาง -----</option>
                      <option value="1">มือวางอันดับ 1</option>
                      <option value="2">มือวางอันดับ 2</option>
                    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>รองชนะเลิศอันดับ 2 (ร่วม)</label>
                    <select class="form-control select2" name="id_university3_2" style="width: 60%;">
                      <option value="">----- กรุณาเลือกคณะ -----</option>
                      <?php
                      $sqlft = "select * from university where id_university!='0'";
                      $qrft = mysql_query($sqlft);
                      while ($arrft = mysql_fetch_array($qrft)) {
                      ?>

                        <option value="<?php echo $arrft['id_university']; ?>"><?php echo $arrft['name_university']; ?></option>
                      <?php } ?>
                    </select>
                    <br/>
                    <select class="form-control select2" name="hand_ranks3_2" style="width: 40%;">
                      <option value="">----- กรุณาเลือกมือวาง -----</option>
                      <option value="1">มือวางอันดับ 1</option>
                      <option value="2">มือวางอันดับ 2</option>
                    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>เลือกการนับเหรียญ</label>
                    <select class="form-control select2" name="chackio" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือก -----</option>
                      <option value="1">นับเหรียญ</option>
                      <option value="0">ไม่นับเหรียญ</option>
                    </select>
                  </div><!-- /.form-group -->

                  <input type="submit" name="btnSubmit" class="btn btn-primary" value="เพิ่มข้อมูล">
                </form>

              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
      <!-- เพิ่มครั้งละเหรียญ -->
      <div class="col-md-6">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">เพิ่มข้อมูลเหรียญรางวัล เหรียญรางวัลร่วม</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <form name="frmadd_one" id="frmadd" action="" method="post">
                <div class="form-group">
                    <label>เลือกกีฬา</label>
                    <select class="form-control select2" name="id_Sport_type" onchange="this.form.submit();" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือกกีฬา -----</option>
                      <?php
                      $sqlst = "select * from sport_type";
                      $qrst = mysql_query($sqlst);
                      while ($arrst = mysql_fetch_array($qrst)) {

                        if($arrst['id_Sport_type'] == $_POST['id_Sport_type'])
                        {
                          $selected = "selected='selected'";
                        } else {
                          $selected = '';
                        }
                      ?>

                        <option value="<?php echo $arrst['id_Sport_type']; ?>" <?php echo $selected;?>>
                          <?php echo $arrst['name_Sport_type']; ?></option>
                      <?php } ?>
                    </select>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label>เลือกประเภทชนิดกีฬา</label>
                    <?php
                      $sqlft1 = "select * from sports_category WHERE id_Sport_type = '$_POST[id_Sport_type]'";
                      $qrft1 = mysql_query($sqlft1);
                      ?>
                    <select class="form-control select2" name="id_Sports_category" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือกชนิดกีฬา -----</option>
                      <?php
                      while ($arrft1 = mysql_fetch_array($qrft1)) {
                      ?>
                        <option value="<?php echo $arrft1['id_Sports_category']; ?>"><?php echo $arrft1['name_Sports_category']; ?></option>
                      <?php } ?>
                    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>เลือกประเภท</label>
                    <select class="form-control select2" name="sex" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือกประเภท -----</option>
                      <option value="ชาย">ชาย</option>
                      <option value="หญิง">หญิง</option>
                      <option value="คู่ผสม">คู่ผสม</option>
                    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>คณะ/มหาลัย</label>
                    <select class="form-control select2" name="id_university" style="width: 60%;" required>
                      <option value="">----- กรุณาเลือกคณะ -----</option>
                      <?php
                      $sqlft = "select * from university where id_university!='0'";
                      $qrft = mysql_query($sqlft);
                      while ($arrft = mysql_fetch_array($qrft)) {
                      ?>

                        <option value="<?php echo $arrft['id_university']; ?>"><?php echo $arrft['name_university']; ?></option>
                      <?php } ?>
                    </select>
                    <br/>
                    <select class="form-control select2" name="hand_ranks" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือกมือวาง -----</option>
                      <option value="1">มือวางอันดับ 1</option>
                      <option value="2">มือวางอันดับ 2</option>
                    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>อันดับรางวัล</label>
                    <select class="form-control select2" name="ranks_medal" style="width: 40%;">
                      <option value="">----- กรุณาเลือกอันดับ -----</option>
                      <option value="1">ชนะเลิศ</option>
                      <option value="2">รองชนะเลิศอันดับ 1</option>
                      <option value="3">รองชนะเลิศอันดับ 2</option>
                    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>เลือกการนับเหรียญ</label>
                    <select class="form-control select2" name="chackio" style="width: 40%;" required>
                      <option value="">----- กรุณาเลือก -----</option>
                      <option value="1">นับเหรียญ</option>
                      <option value="0">ไม่นับเหรียญ</option>
                    </select>
                  </div><!-- /.form-group -->

                  <input type="submit" name="btnSubmitOne" class="btn btn-warning" value="เพิ่มข้อมูลเหรียญร่วม">
                </form>

              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
      <div class="col-xs-12">
        <div class="box">


          <!--00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000-->

          <!--00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000-->
          <div class="box">
            <div class="box-header">
              <center>
                <h3 class="box-title">จัดการข้อมูลเหรียญ</h3><br /><br />
              </center>
            </div><!-- /.box-header -->
            <div class="box-body">

              <div class="row">
                
                <div class="col-md-4">
                  <form name="frm_medal" method="post" action="">
                    <div class="form-group">
                        <?php 
                        $sqlType = "SELECT * FROM sport_type";
                        $resType = mysql_query($sqlType);
                        ?>
                        <label class="form-label">เลือกชนิดกีฬา: </label>
                        <select name="sport_type" id="sport_type" class="form-control" onchange="this.form.submit()">
                              <option value="">-----ชนิดกีฬาทั้งหมด-----</option>
                              <?php
                              while($dataType = mysql_fetch_array($resType)) {
                              ?>
                              <option value="<?php echo $dataType['id_Sport_type'];?>" 
                                <?php if($_GET['sport_type'] == $dataType['id_Sport_type']){echo "selected";}?>>
                                <?php echo $dataType['name_Sport_type'];?></option>
                              <?php }?>
                        </select>
                      </div>
                    </form>
              </div>
              </div>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="15%">ประเภทกีฬา</th>
                    <th width="10%">ประเภท</th>
                    <th width="30%">อันดับ</th>
                    <th width="15%" class="text-center">ลบ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($_POST['sport_type'] != '') {
                    $cond_stype = " WHERE c.id_Sport_type = '$_POST[sport_type]'";
                  } else {
                    $cond_stype = "";
                  }
                  $i = 0 ;
                  $sqlStype = "SELECT * from medal_detail m 
                      LEFT JOIN sports_category c ON m.id_Sports_category = c.id_Sports_category 
                      $cond_stype
                      GROUP BY  m.id_Sports_category,m.sex
                      ORDER BY  m.id_medal_detail DESC
                      ";
                  $qrStype = mysql_query($sqlStype);
                  while ($arrStype = mysql_fetch_array($qrStype)) { $i++;

                  ?>
                    <tr>
                      <th><?php echo $arrStype['name_Sports_category']; ?></th>
                      <td><?php echo $arrStype['sex']; ?></td>
                      <td><?php 
                      // แบบ vs
                      $sql = "SELECT * from medal_detail m 
                          LEFT JOIN university u ON m.id_university = u.id_university 
                          WHERE m.id_Sports_category = '$arrStype[id_Sports_category]' 
                          AND m.sex = '$arrStype[sex]'
                          ORDER BY  m.id_Sports_category ASC, m.id_medal_detail ASC
                          ";
                      $qr = mysql_query($sql);
                      while ($arr = mysql_fetch_array($qr)) {
                        ?>
                        <div class="col"><?php echo "<strong> อันดับที่ " . $arr['ranks_medal'].'</strong> '.$arr['subname_university'];?></div>

                        <?PHP }?>
                      </td>
                      <th class="text-center"><a href="JavaScript:if(confirm('คูณต้องการลบข้อมูลใช่หรือไม่?')==true){window.location='medal_delete_all.php?CID=<?php echo $arrStype['id_Sports_category']; ?>&sex=<?php echo $arrStype['sex']; ?>'}" class="btn btn-app"><i class="fa fa-trash-o"></i> <span>ลบ</span></a></th>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th width="15%">ประเภทกีฬา</th>
                    <th width="10%">ประเภท</th>
                    <th width="30%">อันดับ</th>
                    <th width="15%">ลบ</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->



  <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="plugins/fastclick/fastclick.min.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "order": [
          [2, "asc"]
        ]
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>
</body>

</html>