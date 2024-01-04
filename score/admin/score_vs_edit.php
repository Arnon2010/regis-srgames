<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, banner-scalable=no" name="viewport">
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
<!-- Main content -->
<?php 
include("connect_db.php");
$sql = "select * from score_vs where score_vs_id = '".$_GET['ID']."'";
$qr = mysql_query($sql);
$arr = mysql_fetch_array($qr);
?>
        <section class="content">
		  <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
        <center>
          <h3><a href=""><i class="fa fa-edit"></i>&nbsp;แก้ไขข้อมูลการแข่งขันแบบ VS</a></h3></center><br />

            <form name="frm_regis" method="post" action="score_vs_edit_save.php?ID=<?php echo $_GET['ID'];?>&sport_type=<?php echo $_GET['sport_type']?>&sport_name=<?php echo $_GET['sport_name']?>" onSubmit="return check()" enctype="multipart/form-data">
            	  
                  <div class="form-group">
                    <label>รอบ</label>
                    *
                    <select name="round_id" id="round_id" style="width:100%" class="form-control select2" required tabindex="1">
                     
                      <?php
					  $sqlr = "select * from round";
					  $qrr = mysql_query($sqlr);
					  while($arrr = mysql_fetch_array($qrr))
					  {
					  ?>
                      <option <?php if($arr['round_id']==$arrr['round_id']){?>selected="selected"<?php }?> value="<?php echo $arrr['round_id'];?>"><?php echo $arrr['round_name'];?></option>
                      <?php }?>
                    </select>
                  </div><!-- /.form-group -->
                   <div class="form-group">
                    <label>สาย</label>
                    *
                    <select name="line_id" id="line_id" style="width:100%" class="form-control select2" required tabindex="1">
                    
                      <?php
					  $sqlline = "select * from line order by line_id asc";
					  $qrline = mysql_query($sqlline);
					  while($arrline = mysql_fetch_array($qrline))
					  {
					  ?>
                      <option <?php if($arrline['line_id']==$arr['line_id']){?>selected="selected"<?php }?> value="<?php echo $arrline['line_id'];?>"><?php echo $arrline['line_name'];?></option>
                      <?php }?>
                    </select>
                  </div>
                  <!-- /.form-group -->
                  
                  <div class="form-group">
                    <label>เลือกประเภทกีฬา</label>
                    *
                    <select name="sport_type_id" id="sport_type_id" style="width:100%" class="form-control select2" required tabindex="1">
                    
                      <?php
                      $sqlt = "select * from sports_category where status='1' AND id_Sport_type = '$_GET[sport_type]'";
                      $qrt = mysql_query($sqlt);
                      while($arrt = mysql_fetch_array($qrt))
                      {
                      ?>
                      <option <?php if($arr['sport_type_id']==$arrt['id_Sports_category']){?>selected="selected"<?php }?> value="<?php echo $arrt['id_Sports_category'];?>"><?php echo $arrt['name_Sports_category'];?></option>
                      <?php }?>
                    </select>
                  </div><!-- /.form-group -->
                  
                  <div class="form-group">
                    <label>เลือกทีมแข่งขันที่ 1</label>
                    
                    <select name="faculty_id1" id="faculty_id1" style="width:100%" class="form-control select2" >
                      <option value="">----- กรุณาเลือกทีมแข่งขันที่ 1 -----</option>
                      <?php
					  $sql1 = "select * from university where id_university != '0'";
					  $qr1 = mysql_query($sql1);
					  while($arr1 = mysql_fetch_array($qr1))
					  {
					  ?>
                      <option <?php if($arr['faculty_id1']==$arr1['id_university']){?>selected="selected"<?php }?> value="<?php echo $arr1['id_university'];?>"><?php echo $arr1['name_university'];?></option>
                      <?php }?>
                    </select>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label>เลือกทีมแข่งขันชั่วคราว 1</label>
                    *
                    <select name="temporary1" id="temporary1" style="width:100%" class="form-control select2" required tabindex="1">
                      <?php
					  $sql1temporary1 = "select * from temporary";
					  $qr1temporary1 = mysql_query($sql1temporary1);
					  while($arr1temporary1 = mysql_fetch_array($qr1temporary1))
					  {
					  ?>
                     <option <?php if($arr1temporary1['temporary_name']==$arr['temporary1']){?>selected="selected"<?php }?> value="<?php echo $arr1temporary1['temporary_name'];?>"><?php echo $arr1temporary1['temporary_name'];?></option>
                      <?php }?>
                    </select>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label>สกอร์ของทีมที่ 1</label>
                    *
                    <input name="score1" type="text" value="<?php echo $arr['score1'];?>" class="form-control" id="score1" required tabindex="1">
                  </div><!-- /.form-group -->
                  
                  <div class="form-group">
                    <label>เลือกทีมแข่งขันที่ 2</label>
                    
                    <select name="faculty_id2" id="faculty_id2" style="width:100%" class="form-control select2" >
                      <option value="">----- กรุณาเลือกทีมแข่งขันที่ 2 -----</option>
                      <?php
					  $sql2 = "select * from university where id_university != '0'";
					  $qr2 = mysql_query($sql1);
					  while($arr2 = mysql_fetch_array($qr2))
					  {
					  ?>
                      <option <?php if($arr['faculty_id2']==$arr2['id_university']){?>selected="selected"<?php }?> value="<?php echo $arr2['id_university'];?>"><?php echo $arr2['name_university'];?></option>
                      <?php }?>
                    </select>
                  </div><!-- /.form-group -->
                   <div class="form-group">
                    <label>เลือกทีมแข่งขันชั่วคราว 2</label>
                    *
                    <select name="temporary2" id="temporary2" style="width:100%" class="form-control select2" required tabindex="1">
                      <?php
					  $sql1temporary2 = "select * from temporary";
					  $qr1temporary2 = mysql_query($sql1temporary2);
					  while($arr1temporary2 = mysql_fetch_array($qr1temporary2))
					  {
					  ?>
                     <option <?php if($arr1temporary2['temporary_name']==$arr['temporary2']){?>selected="selected"<?php }?> value="<?php echo $arr1temporary2['temporary_name'];?>"><?php echo $arr1temporary2['temporary_name'];?></option>
                      <?php }?>
                    </select>
                  </div><!-- /.form-group -->
            	  <div class="form-group">
                    <label>สกอร์ของทีมที่ 2</label>
                    *
                    <input name="score2" type="text" value="<?php echo $arr['score2'];?>" class="form-control" id="score2" required tabindex="1">
                  </div><!-- /.form-group -->
                  
                  <div class="form-group">
                    <label>เวลาการแข่งขัน</label>
                    *
                    <input name="times" type="time" value="<?php echo $arr['times'];?>" class="form-control" id="times" required tabindex="1">
                  </div><!-- /.form-group -->
                  
                  <div class="form-group">
                    <label>วันที่การแข่งขัน</label>
                    *
                    <input name="date" type="date" value="<?php echo $arr['date'];?>" class="form-control" id="date" required tabindex="1">
                  </div><!-- /.form-group -->
                  
              &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">บันทึก</button>&nbsp;&nbsp;<button type="button" class="btn btn-primary" onclick="javascript:window.location='main.php?menu=score'" />ย้อนกลับ </button>
              <br/>
                </form>
				</div><!-- /.box -->
              </div>
              <br />
                  <br />
                  <br /><br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
            </div><!-- /.col -->
  		  </div><!-- ./row -->
          
    </section>

          


 <!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
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
	  $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
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
    
    $("#birthday").datetimepicker({
        timepicker:false,
        format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000			
        lang:'th',  // แสดงภาษาไทย
        onChangeMonth:thaiYear,          
        onShow:thaiYear,                  
        yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        closeOnDateSelect:true,
    });  
	 $("#At_work").datetimepicker({
        timepicker:false,
        format:'Y/m/d',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000			
        lang:'th',  // แสดงภาษาไทย
        onChangeMonth:thaiYear,          
        onShow:thaiYear,                  
        yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        closeOnDateSelect:true,
    });    
	 $("#Year_Study").datetimepicker({
        timepicker:false,
        format:'Y/m/d',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000			
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
</body>
</html>