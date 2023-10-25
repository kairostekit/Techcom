<?php
include 'settings.php';


$EOInumber = isset($_GET['EOInumber']) ? $_GET['EOInumber'] : '';



if (!empty($EOInumber)) {

    $sql = "DELETE FROM eoi WHERE `eoi`.`EOInumber` = $EOInumber";
    if ($conn->query($sql)) {
        echo '<script>';
        echo 'alert("ลบข้อมูลสำเร็จ");location.assign("manage.php");';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'alert("ลบข้อมูลไม่สำเร็จ");history.back(-1);';
        echo '</script>';
    }

} else {
    echo '<script>';
    echo 'alert("ลบข้อมูลไม่สำเร็จ");history.back(-1);';
    echo '</script>';
}

?>