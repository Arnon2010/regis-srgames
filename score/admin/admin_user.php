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

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

  <link rel="stylesheet" href="jquery.datetimepicker.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <?php

  include("connect_db.php"); ?>


  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
              <center>
                <h3><a href=""><i class="fa fa-edit"></i>&nbsp;บันทึกข้อมูลผู้ใช้งานระบบ</a></h3>
              </center><br />
              <?php if($_GET['action'] == ''){?>
              <form name="frm_regis" method="post" action="admin_user_save.php" onSubmit="return check()" enctype="multipart/form-data">
                <div class="form-group">
                  <label>ชื่อ</label>
                  *
                  <input name="f_name" type="text" class="form-control" id="f_name" required tabindex="1">
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>นามสกุล</label>
                  *
                  <input name="s_name" type="text" class="form-control" id="s_name" required tabindex="1">
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>ชื่อผู้ใช้งาน</label>
                  *
                  <input name="admin_username" type="text" class="form-control" id="admin_username" required tabindex="1">
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>รหัสผ่าน</label>
                  *
                  <input name="admin_password" type="text" class="form-control" id="admin_password" required tabindex="1">
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>ประเภทผู้ใช้งาน</label>
                  *
                  <select name="admin_type_id" id="admin_type_id" style="width:100%" class="form-control select2" required tabindex="1">
                    <option value="">----- กรุณาเลือกประเภทผู้ใช้งานระบบ -----</option>
                    <?php
                    $sqltype = "select * from admin_type ";
                    $qrtype = mysql_query($sqltype);
                    while ($arrtype = mysql_fetch_array($qrtype)) {
                    ?> <option value="<?php echo $arrtype['admin_type_id']; ?>"><?php echo $arrtype['admin_type_name']; ?></option>
                    <?php } ?>

                  </select>
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>หน่วยงานสังกัด</label>
                  *
                  <select name="faculty_id" id="faculty_id" style="width:100%" class="form-control select2" required tabindex="1">
                    <option value="">----- หน่วยงานสังกัด -----</option>
                    <?php
                    $sqlfaculty = "select * from university ";
                    $qrfaculty = mysql_query($sqlfaculty);
                    while ($arrfaculty = mysql_fetch_array($qrfaculty)) {
                    ?> <option value="<?php echo $arrfaculty['id_university']; ?>"><?php echo $arrfaculty['name_university']; ?></option>
                    <?php } ?>

                  </select>
                </div><!-- /.form-group -->

                <div class="form-group">
                  <div class="col-md-12">
                    <?php 
                    $sqlStype = "SELECT * FROM sport_type 
                      WHERE status = '1'";
                    $resStype = mysql_query($sqlStype);
                    while($dataStype = mysql_fetch_array($resStype)) {
                    ?>

                    <div class="col-md-4">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checked_sport_type[<?php echo $dataStype['id_Sport_type'] ?>]" value="1">
                        <label class="form-check-label" for="exampleCheck1"><?php echo $dataStype['name_Sport_type'];?></label>
                      </div>
                    </div>
                    <?php }?>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-12">
                    <hr>
                    <BR>
                    <button type="submit" class="btn btn-primary">บันทึก</button>&nbsp;
                    <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                  </div>
                </div>
              </form>

              <?php } else {
                $sql = "SELECT * FROM admin WHERE admin_id = '$_GET[id]'";
                $result = mysql_query($sql);
                $data = mysql_fetch_array($result);
                ?>
              <form name="frm_regis" method="post" action="admin_user_edit.php" onSubmit="return check()" enctype="multipart/form-data">
                <div class="form-group">
                  <label>ชื่อ</label>
                  *
                  <input name="f_name" type="text" class="form-control" id="f_name" required tabindex="1" value="<?php echo $data['f_name']?>">
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>นามสกุล</label>
                  *
                  <input name="s_name" type="text" class="form-control" id="s_name" required tabindex="1" value="<?php echo $data['s_name']?>">
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>ชื่อผู้ใช้งาน</label>
                  *
                  <input name="admin_username" type="text" class="form-control" id="admin_username" required tabindex="1" value="<?php echo $data['admin_username']?>">
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>รหัสผ่าน</label>
                  *
                  <input name="admin_password" type="text" class="form-control" id="admin_password" required tabindex="1" value="<?php echo $data['admin_password']?>">
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>ประเภทผู้ใช้งาน</label>
                  *
                  <select name="admin_type_id" id="admin_type_id" style="width:100%" class="form-control select2" required tabindex="1">
                    <option value="">----- กรุณาเลือกประเภทผู้ใช้งานระบบ -----</option>
                    <?php
                    $sqltype = "select * from admin_type ";
                    $qrtype = mysql_query($sqltype);
                    while ($arrtype = mysql_fetch_array($qrtype)) {
                    ?> <option value="<?php echo $arrtype['admin_type_id']; ?>" <?php if($arrtype['admin_type_id'] == $data['admin_type_id']){echo 'selected';}?>><?php echo $arrtype['admin_type_name']; ?></option>
                    <?php } ?>

                  </select>
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>หน่วยงานสังกัด</label>
                  *
                  <select name="faculty_id" id="faculty_id" style="width:100%" class="form-control select2" required tabindex="1">
                    <option value="">----- หน่วยงานสังกัด -----</option>
                    <?php
                    $sqlfaculty = "select * from university ";
                    $qrfaculty = mysql_query($sqlfaculty);
                    while ($arrfaculty = mysql_fetch_array($qrfaculty)) {
                    ?> <option value="<?php echo $arrfaculty['id_university']; ?>" <?php if($arrtype['id_university'] == $data['id_university']){echo 'selected';}?>><?php echo $arrfaculty['name_university']; ?></option>
                    <?php } ?>

                  </select>
                </div><!-- /.form-group -->

                <div class="form-group">
                  <div class="col-md-12">
                    <?php 
                    $sqlStype = "SELECT * FROM sport_type 
                      WHERE status = '1'";
                    $resStype = mysql_query($sqlStype);
                    while($dataStype = mysql_fetch_array($resStype)) {
                    ?>

                    <div class="col-md-4">
                      <div class="form-check">
                      <?php 
                        echo $data['id_Sport_type'];

                        $sqlpermis = "SELECT * FROM admin_permis WHERE admin_id = '$_GET[id]' AND id_Sport_type = '$dataStype[id_Sport_type]'";
                        $respermis = mysql_query($sqlpermis);
                        $rowpermis = mysql_num_rows($respermis);
                      if($rowpermis == 1){
                        $checked = "checked='checked'";} else {$checked = "";}
                        ?>
                        <input type="checkbox" <?php echo $checked?>  class="form-check-input" id="exampleCheck1" name="checked_sport_type[<?php echo $dataStype['id_Sport_type'] ?>]" value="1">
                        <label class="form-check-label" for="exampleCheck1"><?php echo $dataStype['name_Sport_type'];?></label>
                      </div>
                    </div>
                    <?php }?>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-12">
                    <hr>
                    <BR>
                    <button type="submit" class="btn btn-primary">บันทึก</button>&nbsp;
                    <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                    <input type="hidden" name="admin_username_old" value="<?php echo $data['admin_username']?>"/>
                    <input type="hidden" name="admin_id" value="<?php echo $_GET['id']?>"/>
                  </div>
                </div>
              </form>
              <?php }?>
          </div><!-- /.box -->
        </div>
      </div><!-- /.col -->
    </div><!-- ./row -->

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box">
            <div class="box-header">
              <center>
                <h3 class="box-title">จัดการข้อมูลผู้ใช้งานระบบ</h3><br /><br />
              </center>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="10%">รหัส</th>
                    <th width="20%">ชื่อ</th>
                    <th width="10%">user_name</th>
                    <th width="10%">password</th>
                    <th width="20%">ประเภท</th>
                    <th width="30%">หน่วยงาน</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $i = 1;
                  $sql = "select * from admin";
                  $qr = mysql_query($sql);
                  while ($arr = mysql_fetch_array($qr)) {
                  ?>

                    <tr>
                      <td align="center"><?php echo $arr['admin_id']; ?></td>
                      <td><?php echo $arr['f_name'] . " " . $arr['s_name']; ?></td>
                      <td><?php echo $arr['admin_username']; ?></td>
                      <td><?php echo $arr['admin_password']; ?></td>
                      <td><?php
                          $sqltype = "select * from admin_type where admin_type_id='" . $arr['admin_type_id'] . "' ";
                          $qrtype = mysql_query($sqltype);
                          $arrtype = mysql_fetch_array($qrtype);

                          echo $arrtype['admin_type_name'];
                          ?></td>
                      <td><?php
                          $sqlfaculty = "select * from university where id_university='" . $arr['faculty_id'] . "' ";
                          $qrfaculty = mysql_query($sqlfaculty);
                          $arrfaculty = mysql_fetch_array($qrfaculty);
                          if ($arr['faculty_id'] == "0") {
                            echo "หน่วยงานส่วนกลาง ";
                          }
                          echo " " . $arrfaculty['name_university'];
                          ?></td>
                      <td><a href="main.php?menu=admin_user&action=edit&id=<?php echo $arr['admin_id']?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                      <td></td>


                    </tr>
                  <?php $i++;
                  } ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th width="10%">รหัส</th>
                    <th width="20%">ชื่อ</th>
                    <th width="10%">user_name</th>
                    <th width="10%">password</th>
                    <th width="20%">ประเภท</th>
                    <th width="30%">หน่วยงาน</th>
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
          [0, "desc"]
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

  <!-- Page script -->
  <script src="jquery.datetimepicker.js"></script>

  <!-- CK Editor -->
  <script src="plugins/ckeditor/ckeditor.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

  <script>
    $(function() {
      //Initialize Select2 Elements
      $(".select2").select2();

      //Datemask dd/mm/yyyy
      $("#datemask").inputmask("dd/mm/yyyy", {
        "placeholder": "dd/mm/yyyy"
      });
      //Datemask2 mm/dd/yyyy
      $("#datemask2").inputmask("mm/dd/yyyy", {
        "placeholder": "mm/dd/yyyy"
      });
      //Money Euro
      $("[data-mask]").inputmask();

      //Date range picker
      $('#reservation').daterangepicker();
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        format: 'MM/DD/YYYY h:mm A'
      });
      //Date range as a button
      $('#daterange-btn').daterangepicker({
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
        function(start, end) {
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
    $(function() {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1');
      //bootstrap WYSIHTML5 - text editor
      $(".textarea").wysihtml5();
    });
  </script>
  <script type="text/javascript">
    $(function() {

      var thaiYear = function(ct) {
        var leap = 3;
        var dayWeek = ["พฤ.", "ศ.", "ส.", "อา.", "จ.", "อ.", "พ."];
        if (ct) {
          var yearL = new Date(ct).getFullYear() - 543;
          leap = (((yearL % 4 == 0) && (yearL % 100 != 0)) || (yearL % 400 == 0)) ? 2 : 3;
          if (leap == 2) {
            dayWeek = ["ศ.", "ส.", "อา.", "จ.", "อ.", "พ.", "พฤ."];
          }
        }
        this.setOptions({
          i18n: {
            th: {
              dayOfWeek: dayWeek
            }
          },
          dayOfWeekStart: leap,
        })
      };

      $("#birthday").datetimepicker({
        timepicker: false,
        format: 'd/m/Y', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000			
        lang: 'th', // แสดงภาษาไทย
        onChangeMonth: thaiYear,
        onShow: thaiYear,
        yearOffset: 543, // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        closeOnDateSelect: true,
      });
      $("#At_work").datetimepicker({
        timepicker: false,
        format: 'Y/m/d', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000			
        lang: 'th', // แสดงภาษาไทย
        onChangeMonth: thaiYear,
        onShow: thaiYear,
        yearOffset: 543, // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        closeOnDateSelect: true,
      });
      $("#Year_Study").datetimepicker({
        timepicker: false,
        format: 'Y/m/d', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000			
        lang: 'th', // แสดงภาษาไทย
        onChangeMonth: thaiYear,
        onShow: thaiYear,
        yearOffset: 543, // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        closeOnDateSelect: true,
      });
      $("#testdate8").datetimepicker({
        timepicker: false,
        format: 'd/m/Y', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000			
        lang: 'th', // แสดงภาษาไทย
        onChangeMonth: thaiYear,
        onShow: thaiYear,
        yearOffset: 543, // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        closeOnDateSelect: true,
      });




    });
  </script>
</body>

</html>