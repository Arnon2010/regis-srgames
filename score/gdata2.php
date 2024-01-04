<style>
  img {
    max-width: 50%;
    border: none;
  }
</style>
<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
if ($_GET['rev'] == 1) {
?>
  <table class="table table-hover">
    <thead>
      <tr>
        <td>
          <h3>ลำดับ</h3>
        </td>
        <td width="60%">
          <h3>มหาวิทยาลัย</h3>
        </td>
        <td align="center"><img src="admin/img/1.png" alt="" width="60px" /></td>
        <td align="center"><img src="admin/img/2.png" alt="" width="60px" /></td>
        <td align="center"><img src="admin/img/3.png" alt="" width="60px" /></td>
        <td>
          <h3>รวม</h3>
        </td>
      </tr>
    </thead>
    <tbody>
      <?php
      include("connect_db.php");
      $sql11 = "select * from medal order by faculty_1 desc,faculty_2 desc,faculty_3 desc";
      $qr11 = mysql_query($sql11);
      $t = 1;
      while ($arr11 = mysql_fetch_array($qr11)) {
      ?>
        <tr>
          <td>
            <h3><?php echo $t; ?></h3>
          </td>
          <td>
            <h3><?php if ($t == 1 && $arr11['faculty_1'] != "0") { ?>
              <?php }
                $faculty1 = mysql_fetch_array(mysql_query("select * from university where id_university = '" . $arr11['faculty_id'] . "'")); ?>
              <a href="index.php?menu=medal_detail&action=view&FID=<?php echo $arr11['faculty_id']; ?>&go=fixture"><?php echo $faculty1['name_university']; ?></a>
            </h3>
          </td>
          <td align="center">
            <h3><?php echo $arr11['faculty_1'];
                $faculty_1 = $faculty_1 + $arr11['faculty_1']; ?></h3>
          </td>
          <td align="center">
            <h3><?php echo $arr11['faculty_2'];
                $faculty_2 = $faculty_2 + $arr11['faculty_2']; ?></h3>
          </td>
          <td align="center">
            <h3><?php echo $arr11['faculty_3'];
                $faculty_3 = $faculty_3 + $arr11['faculty_3']; ?></h3>
          </td>
          <td align="center">
            <h3><?php echo $aaa = $arr11['faculty_1'] + $arr11['faculty_2'] + $arr11['faculty_3'];
                $suma = $suma + $aaa; ?></h3>
          </td>
        </tr>
      <?php
        $t++;
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <td>
          <h3>รวม</h3>
        </td>

        <td align="center">
          <h3><?php echo $faculty_1; ?></h3>
        </td>

        <td align="center">
          <h3><?php echo $faculty_2; ?></h3>
        </td>
        <td align="center">
          <h3><?php echo $faculty_3; ?></h3>
        </td>
        <td align="center">
          <h3><?php echo $suma; ?></h3>
        </td>
      </tr>
    </tfoot>
  </table>
<?php
  exit;
}
?>