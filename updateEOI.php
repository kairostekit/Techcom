<?php
include 'settings.php';


$EOInumber = isset($_POST['EOInumber']) ? $_POST['EOInumber'] : '';
$State = isset($_POST["status"]) ? $_POST["status"] : '';

if (!empty($EOInumber) || !empty($State)) {

    switch (strtoupper($State)) {
        case 'NEW':
            $sql = " UPDATE `eoi` SET `status` = 'NEW' WHERE `eoi`.`EOInumber` = '$EOInumber';";
            break;
        case 'CURRENT':
            $sql = " UPDATE `eoi` SET `status` = 'CURRENT' WHERE `eoi`.`EOInumber` = '$EOInumber';";
            break;
        case 'FINAL':
            $sql = " UPDATE `eoi` SET `status` = 'FINAL' WHERE `eoi`.`EOInumber` = '$EOInumber';";
            break;

    }

    if ($conn->query($sql)) {
        echo '<script>';
        echo 'alert("บันทึกข้อมูลสำเร็จ");location.assign("manage.php");';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'alert("บันทึกข้อมูลไม่สำเร็จ");history.back(-1);';
        echo '</script>';
    }

} else {
    echo '<script>';
    echo 'alert("บันทึกข้อมูลไม่สำเร็จ");history.back(-1);';
    echo '</script>';
}



// UPDATE `eoi` SET `status` = 'CURRENT' WHERE `eoi`.`EOInumber` = 3;
?>