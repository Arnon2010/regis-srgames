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
 $sql = "select * from score_all where score_all_id = '".$_GET['ID']."'";
 $qr = mysql_query($sql);
 $arr = mysql_fetch_array($qr);	 
 ?>
<!-- Main content -->
        <section class="content">
		  <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
        <center>
          <h3><a href=""><i class="fa fa-edit"></i>&nbsp;เพิ่มทีมการแข่งขัน VS2</a> :<strong><?php echo $_GET['sport_name'];?></strong></h3></center><br />

            <form name="frm_regis" method="post" action="addteam_save.php"  enctype="multipart/form-data">
        
              <div class="form-group">
                    <label>เลือกมหาวิทยาลัย</label>
                    
                    <select name="id_university" id="id_university" style="width:100%" class="form-control select2" >
                      <option value="">----- เลือกมหาวิทยาลัย  -----</option>
                      <?php
					  $sql1 = "select * from  university where id_university != '0'";
					  $qr1 = mysql_query($sql1);
					  while($arr1 = mysql_fetch_array($qr1))
					  {
					  ?>
                      <option value="<?php echo $arr1['id_university'];?>"><?php echo $arr1['name_university'];?></option>
                      <?php }?>
                    </select>
              </div><!-- /.form-group -->
              
              <div class="form-group">
                    <label>เลือกประเภทกีฬา</label>
                    
                    <select name="id_Sports_category" id="id_Sports_category" style="width:100%" class="form-control select2" >
                      <option value="">----- เลือกประเภทกีฬา  -----</option>
                      <?php
                      $sql2 = "SELECT * from  sports_category where status = 3 AND id_Sport_type = '$_GET[sport_type]'";
                      $qr2 = mysql_query($sql2);
                      while($arr2 = mysql_fetch_array($qr2))
                      {
                      ?>
                      <option value="<?php echo $arr2['id_Sports_category'];?>"><?php echo $arr2['name_Sports_category'];?></option>
                      <?php }?>
                    </select>
              </div><!-- /.form-group -->
              
              <div class="form-group">
                    <label>เลือกประเภท</label>
                    *
                    <select name="sex" id="sex" style="width:100%" class="form-control select2" required tabindex="1">
                      <option value="">----- กรุณาเลือกประเภท -----</option>
                     
                      <option value="ชาย">ชาย</option>
                      <option value="หญิง">หญิง</option>
                      <option value="คู่ผสม">คู่ผสม</option>
                      
                    </select>
              </div><!-- /.form-group -->
              
              <div class="form-group">
                    <label>เลือกมือวาง</label>
                    *
                    <select name="hand_ranks" id="hand_ranks" style="width:100%" class="form-control select2" required tabindex="1">
                      <option value="">----- เลือกมือวาง -----</option>
                     
                      <option value="1">มือวางอันดับ 1</option>
                      <option value="2">มือวางอันดับ 2</option>
                      
                    </select>
              </div><!-- /.form-group -->
                 
                 
                    </br>
				  
                 
                       &nbsp;&nbsp;&nbsp;&nbsp;<button  type="submit" class="btn btn-primary" />บันทึก</button>
                       <input type="hidden" name="sport_type" value="<?php echo $_GET['sport_type']?>" />
                       <input type="hidden" name="sport_name" value="<?php echo $_GET['sport_name']?>" />
              <br/>
                </form>
				</div><!-- /.box -->
              </div>
            </div><!-- /.col -->
            

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