<?php
include 'settings.php';

// 
$EOInumber = isset($_POST['EOInumber']) ? $_POST['EOInumber'] : '';
$EOInumber_GET = isset($_GET['EOInumber']) ? $_GET['EOInumber'] : '';

if (!empty($EOInumber_GET)) {

    $sql = "SELECT * FROM eoi";

    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($row as $key => $item):
        $sql = "DELETE FROM eoi WHERE `eoi`.`EOInumber` = {$item['EOInumber']}";
        if ($conn->query($sql)) {

        }
    endforeach;

    echo '<script>';
    echo 'alert("ลบข้อมูลสำเร็จ");location.assign("manage.php");';
    echo '</script>';

}

if (!empty($EOInumber)) {
    foreach ($EOInumber as $key => $item):
        $sql = "DELETE FROM eoi WHERE `eoi`.`EOInumber` = $item";
        if ($conn->query($sql)) {

        }
    endforeach;


    echo '<script>';
    echo 'alert("ลบข้อมูลสำเร็จ");location.assign("manage.php");';
    echo '</script>';


} else {
    echo '<script>';
    echo 'alert("ลบข้อมูลไม่สำเร็จ");history.back(-1);';
    echo '</script>';
}

?>