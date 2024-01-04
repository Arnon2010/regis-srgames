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
    

</head>

  <body class="hold-transition skin-blue sidebar-mini">
 <?php
 include('connect_db.php');
 $sql = "select * from score_vs2 where score_vs_id = '".$_GET['ID']."'";
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

            <form name="frm_regis" method="post" action="scor_vs2_d_save.php?ID=<?php echo $_GET['ID']; ?>"  enctype="multipart/form-data">
            
            	  <label> <h3> <?php $type = (mysql_fetch_array(mysql_query("select * from sports_category where id_Sports_category = '".$arr['sport_type_id']."'"))); echo $type['name_Sports_category'].$arr['sex']; ?></h3></label></br>
                    <label>การแข่งขันระหว่าง : <?php if($arr['faculty_id1']=="0")
						{
							echo $arr['temporary1'];
						}
						else
						{
							$faculty_id11 = (mysql_fetch_array(mysql_query("select * from teamvs2 where id_team = '".$arr['faculty_id1']."'")));
							$faculty_id1 = (mysql_fetch_array(mysql_query("select * from university where id_university = '".$faculty_id11['id_university']."'"))); 
							echo $faculty_id1['name_university']." "."มือวางอันดับ".$faculty_id11['hand_ranks'];
						}
						echo "&nbsp;&nbsp;";
						echo "-";
						echo "&nbsp;&nbsp;";
						if($arr['faculty_id2']=="0")
						{
							echo $arr['temporary2'];
						}
						else
						{
							$faculty_id22 = (mysql_fetch_array(mysql_query("select * from teamvs2 where id_team = '".$arr['faculty_id2']."'"))); 
							$faculty_id2 = (mysql_fetch_array(mysql_query("select * from university where id_university = '".$faculty_id22['id_university']."'"))); 
							echo $faculty_id2['name_university']." "."มือวางอันดับ".$faculty_id22['hand_ranks'];
						}
						echo "<br>";
						?></label></br>
                    <label>สาย : <?php 
						$line = (mysql_fetch_array(mysql_query("select * from line where line_id = '".$arr['line_id']."'"))); echo $line['line_name']; ?></label></br>
                    <label>รอบ : <?php $round = (mysql_fetch_array(mysql_query("select * from round where round_id = '".$arr['round_id']."'"))); echo $round['round_name']; ?></label></br>
                  
                  
                    <label>วันที่ : <?php echo $arr['date'];?></label></br>
                    
                    <label>เวลา : <?php echo $arr['times'];?></label></br>
                    </br></br>
                 
                     <div class="form-group">
                    <label><?php if($arr['faculty_id1']=="0")
						{
							echo $arr['temporary1'];
						}
						else
						{
							$faculty_id1 = (mysql_fetch_array(mysql_query("select * from university where id_university = '".$arr['faculty_id1']."'"))); 
							echo $faculty_id1['name_university'];
						}?>
                    <br />
                    <input name="score1" type="text"  id="score1"  value="<?php  echo $arr['score1'] ?>" onkeypress="CheckNum();" <?php if($type['unit']=="1"){?>readonly="readonly"<?php } ?>>
                    <?php  
					if($type['unit']=="1"){
							$unit = "เซต";
						}
						else if($type['unit']=="2"){
							$unit = "ลูก";
						}
						else if($type['unit']=="3"){
							$unit = "แต้ม";
						}
						else if($type['unit']=="4"){
							$unit = "วินาที";
						}
						else if($type['unit']=="5"){
							$unit = "คะแนน";
						}
						else if($type['unit']=="6"){
							$unit = "เมตร";
						}
						echo $unit;
					?>
                  </div><!-- /.form-group --></label></br>
                  
                   <div class="form-group">
                    <label><?php if($arr['faculty_id2']=="0")
						{
							echo $arr['temporary2'];
						}
						else
						{
							$faculty_id2 = (mysql_fetch_array(mysql_query("select * from faculty where faculty_id = '".$arr['faculty_id2']."'"))); 
							echo $faculty_id2['faculty_name'];
						}?>
                    <br />
                    <input name="score2" type="text"  id="score2"  value="<?php  echo $arr['score2'] ?>" onkeypress="CheckNum1();" <?php if($type['unit']=="1"){?>readonly="readonly"<?php } ?>>
                    <?php  
					if($type['unit']=="1"){
							$unit = "เซต";
						}
						else if($type['unit']=="2"){
							$unit = "ลูก";
						}
						else if($type['unit']=="3"){
							$unit = "แต้ม";
						}
						else if($type['unit']=="4"){
							$unit = "วินาที";
						}
						else if($type['unit']=="5"){
							$unit = "คะแนน";
						}
						else if($type['unit']=="6"){
							$unit = "เมตร";
						}
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
            <?php  
			if($type['unit']=="1"){
			?>
             <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header">
                <h4><a href=""><i class="fa fa-edit"></i>&nbsp;เพิ่มผลการแข่งขันแบบ SET </a></h4>
                  <form name="frm_set" method="post" action="set_vs2_save.php?ID=<?php echo $arr['score_vs_id']; ?>"  enctype="multipart/form-data">
                  <div class="form-group">
                    <label>set ที่:</label>
                    *
                    <select name="num_set" id="num_set" style="width:100%" class="form-control select2" required tabindex="1">
                      <option value="">----- SETที่ -----</option>
                      <?php
					  for($i=1;$i<=20;$i++)
					  {
					  ?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                      <?php }?>
                    </select>
                  </div><!-- /.form-group -->
                  <?php if($arr['faculty_id1']=="0")
						{
							echo $arr['temporary1'];
						}
						else
						{
							$faculty_id11 = (mysql_fetch_array(mysql_query("select * from teamvs2 where id_team = '".$arr['faculty_id1']."'")));
							$faculty_id1 = (mysql_fetch_array(mysql_query("select * from university where id_university = '".$faculty_id11['id_university']."'"))); 
							echo $faculty_id1['name_university']." "."มือวางอันดับ".$faculty_id11['hand_ranks'];
						}?>
                    <br />
                    <input name="score1" type="text"  id="score1"   onkeypress="CheckNum();" class="form-control"  required tabindex="1">
                  
                  </br>
                  <?php if($arr['faculty_id2']=="0")
						{
							echo $arr['temporary2'];
						}
						else
						{
							$faculty_id22 = (mysql_fetch_array(mysql_query("select * from teamvs2 where id_team = '".$arr['faculty_id2']."'"))); 
							$faculty_id2 = (mysql_fetch_array(mysql_query("select * from university where id_university = '".$faculty_id22['id_university']."'"))); 
							echo $faculty_id2['name_university']." "."มือวางอันดับ".$faculty_id22['hand_ranks'];
						}?>
                  </br>
				  <input name="score2" type="text"  id="score2"   onkeypress="CheckNum();" class="form-control"  required tabindex="1">
                  <br />
                   <br />
                    <br />
                  
                       &nbsp;&nbsp;&nbsp;&nbsp;<button  type="submit" class="btn btn-primary" />บันทึก</button>
                  </form>
                  
                  <br />
                  <br />
                   <div class="box-body">
                  <table  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th >SET ที่</th>
                       <th ><?php if($arr['faculty_id1']=="0")
						{
							echo $arr['temporary1'];
						}
						else
						{
							$faculty_id11 = (mysql_fetch_array(mysql_query("select * from teamvs2 where id_team = '".$arr['faculty_id1']."'")));
							$faculty_id1 = (mysql_fetch_array(mysql_query("select * from university where id_university = '".$faculty_id11['id_university']."'"))); 
							echo $faculty_id1['name_university']." "."มือวางอันดับ".$faculty_id11['hand_ranks'];
						}?></th>
                        <th ><?php if($arr['faculty_id2']=="0")
						{
							echo $arr['temporary2'];
						}
						else
						{
							$faculty_id22 = (mysql_fetch_array(mysql_query("select * from teamvs2 where id_team = '".$arr['faculty_id2']."'"))); 
							$faculty_id2 = (mysql_fetch_array(mysql_query("select * from university where id_university = '".$faculty_id22['id_university']."'"))); 
							echo $faculty_id2['name_university']." "."มือวางอันดับ".$faculty_id22['hand_ranks'];
						}?></th>
                        
                        <th >ลบ</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					
					$sqlvs = "select * from tb_set2 where score_vs_id='".$arr['score_vs_id']."'";
					 $qrvs = mysql_query($sqlvs);
					 while($arrvs = mysql_fetch_array($qrvs))
					 {
					?>
                    <tr>
                    <td><?php echo $arrvs['num_set']; ?></td>
                    <td><?php echo $arrvs['score1']; ?></td>
                    <td> <?php echo $arrvs['score2']; ?></td>
                   
                   <td><a href="JavaScript:if(confirm('คูณต้องการลบข้อมูลใช่หรือไม่?')==true){window.location='set_vs2_save.php?ID=<?php echo $arr['score_vs_id']; ?>&ID2=<?php echo $arrvs['tb_set_id']; ?>&check=delete'}" class="btn btn-app"><i class="fa fa-trash-o"></i> <span>ลบ</span></a></td>
                    <tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                       <th width="5%">SET ที่</th>
                				<th >ทีม 1</th>
                        <th >ทีม 2</th>
                       
                        <th >ลบ</th>
                       
                        
                     
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div>
            </div><!-- /.col -->
            <?php } ?>
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