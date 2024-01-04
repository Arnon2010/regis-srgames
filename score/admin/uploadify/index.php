<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutorial Development uploadify Lightbox &amp; class upload</title>
<link href="css/uploadify.css" type="text/css" rel="stylesheet" />
<link href="css/pagenavi.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/jquery.uploadify.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />    
<script type="text/javascript">
$(document).ready(function() {	
  load(); // เรียกใช้งานฟังชั่น เมื่อมีการโหลด page เสร็จสิ้น
  function load(){
	  // ภายในฟังชั่น
    $.get(
			'show.php',// หน้าที่ต้องการส่งค่าไป
			{},// ค่าพารามิเตอร์ที่ต้องการส่งไป ในที่นี้จะถูกส่งไปแบบ GET 
			function(data){
				$("#gallery").html(data);	// ค่าที่รับกลับมา ให้แสดงผลที่ ID="gallery"
				$('#gallery a').lightBox();	// lightbox ทำงาน 	
			});
			
}
  	$("#file_upload").uploadify({
		'uploader'       : 'uploadify.swf', // เรียกใช้ flash
		'script'         : 'uploadify.php', // file ที่ส่งค่าไป ในที่นี้ใช้ไฟล์ที่ มาพร้อมกับ demo ถ้าต้องการส่งไปไฟล์อื่นก็เปลี่ยนได้ที่นี่
		'cancelImg'      : 'cancel.png',    // รูปภาพปุ่มยกเลิก
		'folder'         : 'uploads',       // folder ที่ต้องการ อัพโหลดขึ้นไป
		'queueID'        : 'fileQueue',     
		'multi'          : true,            // อัพโหลดได้หลายภาพ 
		'queueSizeLimit' : 5,               // อัพโหลดได้สูงสุดกี่ภาพ
		'fileDesc'		 : 'jpg, gif',      
		'fileExt'		 : '*.jpg;*.gif',
		'sizeLimit'      : '512000',//max size bytes - 500kb
		'checkScript'    : 'check.php', //if we take this out, it will never replace files, otherwise asks if we want to replace
		'onAllComplete'  : function() {
			
			
                            load(); // อัพโหลดเสร็จสิ้นให้เรียกใช้ฟังชั่นload();
							}
	});
  
    
  
});
</script>
	<style type="text/css">
	/* jQuery lightBox plugin - Gallery style */
	#gallery {
		background-color: #444;
		padding: 10px;
		width: 520px;
	}
	#gallery ul { list-style: none; }
	#gallery ul li { display: inline; }
	#gallery ul img {
		border: 5px solid #3e3e3e;
		border-width: 5px 5px 20px;
	}
	#gallery ul a:hover img {
		border: 5px solid #fff;
		border-width: 5px 5px 20px;
		color: #fff;
	}
	#gallery ul a:hover { color: #fff; }
	</style>

</head>

<body>
    <h1>Tutorial Development uploadify Lightbox & class upload</h1>
    <div id="gallery">
     
     </div>

    <div style="float:left;">
          <div id="fileQueue"></div><p>
          <input id="file_upload" name="file_upload" type="file" /></p>
          <p> <a href="javascript:$('#file_upload').uploadifyUpload();">อัพโหลด</a> || <a href="javascript:jQuery('#uploadify').uploadifyClearQueue()">ยกเลิกทั้งหมด</a></p>
      </div>
     <p>&nbsp;</p>
     <br />
 
</body>
</html>