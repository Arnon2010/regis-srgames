<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<script language="javascript">
function CheckNum(){
	if (event.keyCode < 48 || event.keyCode > 57){
		alert("กรุณาระบุเฉพาะตัวเลข");
		frm_regis.score1.focus();
		event.returnValue = false;
	}
}
</script>
<script language="javascript">
function CheckNum1(){
	if (event.keyCode < 48 || event.keyCode > 57){
		alert("กรุณาระบุเฉพาะตัวเลข");
		frm_regis.score2.focus();
		event.returnValue = false;
	}
}
</script>
<script language="javascript">
function CheckNum2(){
	if (event.keyCode < 48 || event.keyCode > 57){
		alert("กรุณาระบุเฉพาะตัวเลข");
		frm_regis.score3.focus();
		event.returnValue = false;
	}
}
</script>


  <meta content="width=device-width, initial-scale=1, maximum-scale=1, admin-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="jquery.datetimepicker.css">
    
<script language="javascript">
<!--
	function Left(str, n)
	{
		if (n <= 0)
	    	return "";
		else if (n > String(str).length)
	   	 	return str;
		else
	    	return String(str).substring(0,n);
	}
	
	function Right(str, n)
	{
		if (n <= 0)
    	   return "";
    	else if (n > String(str).length)
			return str;
    	else 
		{
       		var iLen = String(str).length;
      		return String(str).substring(iLen, iLen - n);
    	}
	}

	function check()
	{
		
		if(document.frm_regis.photo.value!="")
		{
			if(Right(document.frm_regis.photo.value,4).toLowerCase() != ".jpg" && Right(document.frm_regis.photo.value,4).toLowerCase() != ".gif" && Right(document.frm_regis.photo.value,4).toLowerCase() != ".bmp" && Right(document.frm_regis.photo.value,4).toLowerCase() != ".png")
			{
				alert('รูป ต้องเป็นไฟล์ .jpg,.gif,.png และ .bmp เท่านั้นค่ะ');
				document.frm_regis.photo.focus();
				return false;
			}
		}
	}

</script>
</head>

  <body class="hold-transition skin-blue sidebar-mini">
 <?php
 include('connect_db.php');

 if(isset($_POST['btnSubmitName'])) {
  //print_r($_POST);
  $ID = $_GET['ID'];
	$sex = $_POST['sex'];
  $namerankall = $_POST['namerankall'];
 	$rankall = $_POST['rankall'];
	
	$strSQL = "INSERT INTO user_sportall VALUES (Null,'$ID','$namerankall','$rankall','$sex')";
	$objQuery = mysql_query($strSQL);
 } 
 $sql = "SELECT * from score_all where score_all_id = '".$_GET['ID']."'";
 $qr = mysql_query($sql);
 $arr = mysql_fetch_array($qr);	 
 ?>
<!-- Main content -->
        <section class="content">
		  <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
        <center>
          <h3><a href=""><i class="fa fa-edit"></i>&nbsp;เพิ่มผลการแข่งขัน</a></h3></center><br />

            <form name="frm_regis" method="post" action="set_all_save.php?ID=<?php echo $_GET['ID']; ?>"  enctype="multipart/form-data">
            
            	  <label> <h3> <?php $type = (mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '".$arr['sport_type_id']."'"))); echo $type['name_Sports_category']." ".$arr['sex']; ?></h3></label></br>
                  
                   
              <label>รอบ : <?php $round = (mysql_fetch_array(mysql_query("select * from round where round_id = '".$arr['round_id']."'"))); echo $round['round_name']; ?></label></br>
                  
                  
                    <label>วันที่ : <?php echo $arr['date'];?></label></br>
                    
                    <label>เวลา : <?php echo $arr['times'];?></label></br>
                    </br></br>
                 <?php $type = (mysql_fetch_array(mysql_query("select * from sport_type where sport_type_id = '".$arr['sport_type_id']."'"))); ?>
                  
                       <div class="form-group">
                    <label>เลือกทีมแข่งขันอันดับ 1 <img src="img/1.png" width="20" height="20" alt=""/></label>
                    
                    <select name="faculty_id1" id="faculty_id1" style="width:100%" class="form-control select2" >
                      <option value="">----- กรุณาเลือกทีมแข่งขันอันดับ 1 -----</option>
                      <?php
					  $sql1 = "select * from  university where id_university != '0'";
					  $qr1 = mysql_query($sql1);
					  while($arr1 = mysql_fetch_array($qr1))
					  {
					  ?>
                      <option <?php if($arr['faculty_id1']==$arr1['id_university']){?>selected="selected"<?php }?> value="<?php echo $arr1['id_university'];?>"><?php echo $arr1['name_university'];?></option>
                      <?php }?>
                    </select>
              </div><!-- /.form-group -->
                 
                  <div class="form-group">
                    <label>สกอร์ของทีมที่ 1</label>
                    
                    <input name="score1" type="text"  id="score1"  value="<?php echo $arr['score1'];?>"  >
                    <?php echo $unit; ?>
                    
                  </div><!-- /.form-group -->
                  
                  <div class="form-group">
                    <label>เลือกทีมแข่งขันอันดับ 2 <img src="img/2.png" width="20" height="20" alt=""/></label>
                    
                    <select name="faculty_id2" id="faculty_id2" style="width:100%" class="form-control select2" >
                      <option value="">----- กรุณาเลือกทีมแข่งขันอันดับ 2 -----</option>
                      <?php
					  $sql2 = "select * from  university where id_university != '0'";
					  $qr2 = mysql_query($sql2);
					  while($arr2 = mysql_fetch_array($qr2))
					  {
					  ?>
                       <option <?php if($arr['faculty_id2']==$arr2['id_university']){?>selected="selected"<?php }?> value="<?php echo $arr2['id_university'];?>"><?php echo $arr2['name_university'];?></option>
                      <?php }?>
                    </select>
              </div><!-- /.form-group -->
                  
            	  <div class="form-group">
                    <label>สกอร์ของทีมที่ 2</label>
                    
                    <input name="score2" type="text"  id="score2"  value="<?php echo $arr['score2'];?>" >
                    <?php
					echo $unit;
					?>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label>เลือกทีมแข่งขันอันดับ 3 <img src="img/3.png" width="20" height="20" alt=""/></label>
                    
                    <select name="faculty_id3" id="faculty_id3" style="width:100%" class="form-control select2" >
                      <option value="">----- กรุณาเลือกทีมแข่งขันอันดับ 3 -----</option>
                      <?php
					  $sql3 = "select * from  university where id_university != '0'";
					  $qr3 = mysql_query($sql3);
					  while($arr3 = mysql_fetch_array($qr3))
					  {
					  ?>
                       <option <?php if($arr['faculty_id3']==$arr3['id_university']){?>selected="selected"<?php }?> value="<?php echo $arr3['id_university'];?>"><?php echo $arr3['name_university'];?></option>
                      <?php }?>
                    </select>
              </div><!-- /.form-group -->
                  
            	  <div class="form-group">
                    <label>สกอร์ของทีมที่ 3</label>
                    
                    <input name="score3" type="text"  id="score3"  value="<?php echo $arr['score3'];?>" >
                    <?php
					echo $unit;
					?>
                  </div><!-- /.form-group --></label></br>
                 
                    </br>
				  
                  <?php 
				  if($type['unit']!="1"){
				   ?>
                       &nbsp;&nbsp;&nbsp;&nbsp;<button  type="submit" class="btn btn-primary" />บันทึก</button>&nbsp;<button type="button" class="btn btn-primary" onclick="javascript:window.location='main.php?menu=score_add'" />ย้อนกลับ</button>
                       <?php } ?>
              <br/>
                </form>
				</div><!-- /.box -->
              </div>
            </div><!-- /.col -->
            
<div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
        <center>
          <h3><a href=""><i class="fa fa-edit"></i>&nbsp;เพิ่มรายชื่อผลการแข่งขัน</a></h3></center><br />

            <!-- <form name="frm_regis" method="post" action="user_add_allsave.php?ID=<?php echo $_GET['ID']; ?>&check=add&sex=<?php echo $arr['sex']; ?>"  enctype="multipart/form-data"> -->
            <form name="frm_regis" method="post" action="">
       
            </br></br>
                    <div class="form-group">
                    <label>เลือกอันดับ</label>
                    <select name="rankall" onchange="this.form.submit()" id="rankall" style="width:100%" class="form-control select2" required="required">
                      <option value="">----- กรุณาเลือกอันดับ -----</option>
                      <option value="1" <?php if($_POST['rankall'] == '1'){echo "selected";}?>>----- อันดับ 1 -----</option>
                      <option value="2" <?php if($_POST['rankall'] == '2'){echo "selected";}?>>----- อันดับ 2 -----</option>
                      <option value="3" <?php if($_POST['rankall'] == '3'){echo "selected";}?>>----- อันดับ 3 -----</option>
                     
                    </select>
              		</div><!-- /.form-group -->
                 <?php 
                 // GET รายชื่อตามชนิดกีฬา และมหาลัย
                  if($_POST['rankall'] == '1') {
                    $sqlUniv = "SELECT faculty_id1 as univ_id, sport_type_id  FROM score_all WHERE score_all_id = '$_GET[ID]'";

                  } else if($_POST['rankall'] == '2') {
                    $sqlUniv = "SELECT faculty_id2 as univ_id, sport_type_id  FROM score_all WHERE score_all_id = '$_GET[ID]'";

                  } else if($_POST['rankall'] == '3') {
                    $sqlUniv = "SELECT faculty_id3 as univ_id, sport_type_id  FROM score_all WHERE score_all_id = '$_GET[ID]'";
                  }

                  $resUniv = mysql_query($sqlUniv);
                  $dataUniv = mysql_fetch_array($resUniv);
                  $univ_id = $dataUniv['univ_id'];
                  $id_Sports_category = $dataUniv['sport_type_id'];

                  $type = (mysql_fetch_array(mysql_query("SELECT * from sport_type where sport_type_id = '".$arr['sport_type_id']."'"))); ?>
                  	<div class="form-group">
                    <label>เลือกนักกีฬา</label>
                    <?php
                      //$sqlstd = "select * from  student_sports ";
                      if($arr['sex'] == 'ชาย') {
                        $cond_sex = " AND r.sex = 'M'";
                      } else if($arr['sex'] == 'หญิง') {
                        $cond_sex = " AND r.sex = 'F'";
                      } else {
                        $cond_sex = " AND r.sex IN ('F','M')";
                      }

                    $sqlstd = "SELECT * FROM  student_sports s 
                      LEFT JOIN sport_regis r ON s.id_student= r.id_student
                      WHERE r.id_Sport_type = '$_GET[sport_type]' 
                      AND s.id_university = '$univ_id' 
                      $cond_sex
                      GROUP BY r.id_student
                      ";
                      $qrstd = mysql_query($sqlstd);
                     
                    ?> 
                    
                    <select name="namerankall" id="namerankall" style="width:100%" class="form-control select2" required="required">
                      <option value="">----- กรุณาเลือกนักกีฬา -----</option>
                      <?php
                      while($arrstd = mysql_fetch_array($qrstd))
                      {
                      ?>
                       <option value="<?php echo $arrstd['id_student'];?>"><?php echo $arrstd['title_name'].$arrstd['f_name']." ".$arrstd['l_name'];?></option>
                      <?php }?>
                    </select>
              		</div><!-- /.form-group -->
                    
                  	
                    </br>
				  
                  <?php 
				  if($type['unit']!="1"){
				   ?>
                       &nbsp;&nbsp;&nbsp;&nbsp;<button name="btnSubmitName"  type="submit" class="btn btn-primary" />เพิ่มรายชื่อ </button>
                       <input type="hidden" name="sex" value="<?php echo $arr['sex'];?>" />
                       <?php } ?>
              <br/>
                </form>
                <br/>
                <div class="form-group">
                    <label>อันดับ 1 <img src="img/1.png" width="20" height="20" alt=""/></label>
              		</div><!-- /.form-group -->
                    
                     <?php
					  $sqlstd1 = "select * from  user_sportall where score_all_id = '".$_GET['ID']."' and university_ranking = '1' ";
					  $qrstd1 = mysql_query($sqlstd1);
					  while($arrstd1 = mysql_fetch_array($qrstd1))
					  {
						  $sqlstd11 = "select * from  student_sports where id_student = '".$arrstd1['id_student']."' ";
						  $qrstd11 = mysql_query($sqlstd11);
						  $arrstd11 = mysql_fetch_array($qrstd11);
						  echo $arrstd11['title_name'].$arrstd11['f_name']." ".$arrstd11['l_name']; ?>
                          
						  <a href="user_add_allsave.php?check=delete&ID=<?php echo $_GET['ID']?>&IDSTD=<?php echo $arrstd1['id_student']?>"> <span>ลบ</span></a>
						  <br/>
						  <?php
						  
					  }?>
                
                
                <br/>
                <div class="form-group">
                    <label>อันดับ 2 <img src="img/2.png" width="20" height="20" alt=""/></label>
              		</div><!-- /.form-group -->
                
                     <?php
					  $sqlstd2 = "select * from  user_sportall where score_all_id = '".$_GET['ID']."' and university_ranking = '2' ";
					  $qrstd2 = mysql_query($sqlstd2);
					  while($arrstd2 = mysql_fetch_array($qrstd2))
					  {
						  $sqlstd22 = "select * from  student_sports where id_student = '".$arrstd2['id_student']."' ";
						  $qrstd22 = mysql_query($sqlstd22);
						  $arrstd22 = mysql_fetch_array($qrstd22);
						  echo $arrstd22['title_name'].$arrstd22['f_name']." ".$arrstd22['l_name']; ?>
                          
						  <a href="user_add_allsave.php?check=delete&ID=<?php echo $_GET['ID']?>&IDSTD=<?php echo $arrstd2['id_student']?>"> <span>ลบ</span></a>
						  <br/>
						  <?php
						  
					  }?>
                
                <br/>
                <div class="form-group">
                    <label>อันดับ 3 <img src="img/3.png" width="20" height="20" alt=""/></label>
              		</div><!-- /.form-group -->
                    
                    <?php
					  $sqlstd3 = "select * from  user_sportall where score_all_id = '".$_GET['ID']."' and university_ranking = '3' ";
					  $qrstd3 = mysql_query($sqlstd3);
					  while($arrstd3 = mysql_fetch_array($qrstd3))
					  {
						  $sqlstd33 = "select * from  student_sports where id_student = '".$arrstd3['id_student']."' ";
						  $qrstd33 = mysql_query($sqlstd33);
						  $arrstd33 = mysql_fetch_array($qrstd33);
						  echo $arrstd33['title_name'].$arrstd33['f_name']." ".$arrstd33['l_name']; ?>
                          
						  <a href="user_add_allsave.php?check=delete&ID=<?php echo $_GET['ID']?>&IDSTD=<?php echo $arrstd3['id_student']?>"> <span>ลบ</span></a>
						  <br/>
						  <?php
						  
					  }?>
                    
                    
				</div>
            </div>
            </div>
  		  </div><!-- ./row -->
          
    </section>
      

 <!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
   <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
    
    <!-- Page script -->
<script src="jquery.datetimepicker.js"></script>
 <script>
      $(function () {
        $("#example1").DataTable({
			"order": [[ 0, "asc" ]]
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
<script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
<script type="text/javascript">
    $(function(){

    var thaiYear = function (ct) {
        var leap=3;  
        var dayWeek=["พฤ.", "ศ.", "ส.", "อา.","จ.", "อ.", "พ."];  
        if(ct){  
            var yearL=new Date(ct).getFullYear()-543;  
            leap=(((yearL % 4 == 0) && (yearL % 100 != 0)) || (yearL % 400 == 0))?2:3;  
            if(leap==2){  
                dayWeek=["ศ.", "ส.", "อา.", "จ.","อ.", "พ.", "พฤ."];  
            }  
        }              
        this.setOptions({  
            i18n:{ th:{dayOfWeek:dayWeek}},dayOfWeekStart:leap,  
        })                
    };    
    
    $("#brithday").datetimepicker({
        timepicker:false,
        format:'Y-m-d',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000			
        lang:'th',  // แสดงภาษาไทย
        onChangeMonth:thaiYear,          
        onShow:thaiYear,                  
        yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        closeOnDateSelect:true,
    });  
	 $("#At_work").datetimepicker({
        timepicker:false,
        format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000			
        lang:'th',  // แสดงภาษาไทย
        onChangeMonth:thaiYear,          
        onShow:thaiYear,                  
        yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        closeOnDateSelect:true,
    });    
	 $("#Year_Study").datetimepicker({
        timepicker:false,
        format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000			
        lang:'th',  // แสดงภาษาไทย
        onChangeMonth:thaiYear,          
        onShow:thaiYear,                  
        yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        closeOnDateSelect:true,
    });     
	 $("#testdate8").datetimepicker({
        timepicker:false,
        format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000			
        lang:'th',  // แสดงภาษาไทย
        onChangeMonth:thaiYear,          
        onShow:thaiYear,                  
        yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        closeOnDateSelect:true,
    });            
     

    
    
});
      </script>
 <script language="javascript">
// Start XmlHttp Object
function uzXmlHttp(){
    var xmlhttp = false;
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
        try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlhttp = false;
        }
    }
 
    if(!xmlhttp && document.createElement){
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
// End XmlHttp Object

function data_show(select_id,result){
	var url = 'data.php?select_id='+select_id+'&result='+result;
	//alert(url);
	
    xmlhttp = uzXmlHttp();
    xmlhttp.open("GET", url, false);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
    xmlhttp.send(null);
	document.getElementById(result).innerHTML =  xmlhttp.responseText;
}
//window.onLoad=data_show(5,'amphur'); 
</script>
</body>
</html>