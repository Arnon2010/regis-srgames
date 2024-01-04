<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
    include("connect_db.php");


    $sqlft = "SELECT * from medal_detail 
        WHERE id_Sports_category = '" . $_GET['CID'] . "' AND sex = '" . $_GET['sex'] . "'";
    $qrft = mysql_query($sqlft);
    while($arrft = mysql_fetch_array($qrft)) {

        $sqlft1 = "select * from medal where faculty_id = '" . $arrft['id_university'] . "'";
        $qrft1 = mysql_query($sqlft1);
        $arrft1 = mysql_fetch_array($qrft1);

        
        if ($arrft['ranks_medal'] == 1 && $arrft['chackio'] == 1) {

            $sum = $arrft1['faculty_1'] - 1;
    
            $strSQL = "update medal set faculty_1 = '$sum' where faculty_id =  '" . $arrft['id_university'] . "'";
            $objQuery = mysql_query($strSQL);
        } else if ($arrft['ranks_medal'] == 2 && $arrft['chackio'] == 1) {
    
            $sum = $arrft1['faculty_2'] - 1;
    
            $strSQL = "update medal set faculty_2 = '$sum' where faculty_id =  '" . $arrft['id_university'] . "'";
            $objQuery = mysql_query($strSQL);
        } else if ($arrft['ranks_medal'] == 3 && $arrft['chackio'] == 1) {
    
            $sum = $arrft1['faculty_3'] - 1;
    
            $strSQL = "update medal set faculty_3 = '$sum' where faculty_id =  '" . $arrft['id_university'] . "'";
            $objQuery = mysql_query($strSQL);
        }

    }

    $strsql222 = "DELETE FROM medal_detail WHERE id_Sports_category = '" . $_GET['CID'] . "' AND sex = '" . $_GET['sex'] . "'";
    $query222 = mysql_query($strsql222) or die(mysql_error());
    echo '<SCRIPT language="javascript">
    alert("บันทึกเรียบร้อยแล้ว");
    window.location="main.php?menu=medal_add";
    </script>';

    mysql_close();

    ?>