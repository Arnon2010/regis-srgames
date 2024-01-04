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
<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
</head>

  <body class="hold-transition skin-blue sidebar-mini">
 <?php
 include('connect_db.php');
 $sql = "SELECT * from teamvs2 where id_team = '".$_GET['ID']."'";
 $qr = mysql_query($sql);
 $arr = mysql_fetch_array($qr);	 

 if($_GET['sex'] == 'ชาย') {
    $Sex = 'M';
    $cond = " AND r.sex = 'M'";
 } else if($_GET['sex'] == 'หญิง') { 
    $Sex = 'F';
    $cond = " AND r.sex = 'F'";
 } else {
    $Sex = 'MF';
    $cond = " AND r.sex IN ('M','F')";
 }
 ?>
<!-- Main content -->
<section class="content">

<div class="row">
            
            
<div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
        <center>
          <h3><a href=""><i class="fa fa-edit"></i>&nbsp;เพิ่มรายชื่อนักกีฬา</a></h3></center><br />
           		<h4>	  
					  <?php $arruni = mysql_fetch_array(mysql_query("SELECT * from university where id_university = '".$arr['id_university']."'"));
					  echo $arruni['name_university'];
					  ?><br/>
                      <?php $arrcategory = mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '".$arr['id_Sports_category']."'"));
					  echo $arrcategory['name_Sports_category']." (".$arr['sex'].") ";
					  ?>
                      <br/>
                      <?php echo "มือวางอันดับ"." ".$arr['hand_ranks'];?>
                </h4>

            <form name="frm_regis" method="post" action="addteam_user_save.php?sport_type=<?php echo $_GET['sport_type']?>&ID=<?php echo $_GET['ID']; ?>&IDU=<?php echo $_GET['IDU']; ?>&IDS=<?php echo $_GET['IDS']; ?>&sex=<?php echo $_GET['sex']; ?>"  enctype="multipart/form-data">
              </br></br>
              <div class="form-group">
                    <label>เลือกนักกีฬา</label>
                    <?php
                    
                    $sqlstd = "SELECT * FROM sport_regis r 
                    INNER JOIN  student_sports s ON r.id_student = s.id_student
                    WHERE r.id_university='".$_GET['IDU']."' 
                    AND r.id_Sport_type = '$_GET[sport_type]'
                    AND s.st = '9'
                    $cond 
                    GROUP BY r.id_student
                    ";
                    $qrstd = mysql_query($sqlstd);
                    $i = 0;
                    while($arrstd = mysql_fetch_array($qrstd))
                      {
                        $i++;

                        //check add student
                        $sql_checked = "SELECT * FROM user_sportvs2 
                          WHERE id_team = '$_GET[ID]' 
                          AND id_student = '$arrstd[id_student]'";
                        $row_check = mysql_num_rows(mysql_query($sql_checked));
                        if($row_check == 1){
                          $checked = "checked='checked' disabled";
                          $disabled = "disabled";
                        } else {
                          $checked = '';
                          $disabled = "";
                        }
                    ?>
                      <label class="container"><?php echo $arrstd['title_name']. $arrstd['f_name']." ".$arrstd['l_name'];?> 
                        <input type="checkbox" <?php echo $checked?>  name="student[<?php echo $i?>]" value="<?php echo $arrstd['id_student'];?>">
                        <span class="checkmark"></span>
                      </label>
                    <?php }?>
              		</div><!-- /.form-group -->
                  </br>
                  <?php 
                      if($type['unit']!="1"){
                      ?>
                       &nbsp;&nbsp;&nbsp;&nbsp;<button  type="submit" class="btn btn-primary" />บันทึก</button>
                       &nbsp;&nbsp;&nbsp;&nbsp;<a href="main.php?menu=addteam_add&sport_type=<?php echo $_GET['sport_type']?>&IDS=<?php echo $_GET['IDS']?>" class="btn btn-warning">ย้อนกลับ</a>
                       
                      <?php } ?>
                  <br/>
                </form>
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