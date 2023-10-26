<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="styles/style.css" />
    <script src="scripts/enhancements.js"></script>
</head>



<body>
    <?php include_once("header.inc"); ?>
    <?php include_once("menu.inc"); ?>


    <?php
    include 'settings.php';

    $sql = "SELECT * FROM eoi WHERE EOInumber = {$_GET['EOInumber']} ";

    $result = $conn->query($sql);
    $item = $result->fetch_all(MYSQLI_ASSOC)[0];

    ?>


    <center style=" margin: 30px; ">

        <form id="form-m-<?php echo $_GET['EOInumber'] ?>" action="updateEOI.php" method="post">
            <input type="hidden" name="EOInumber" value="<?php echo $_GET['EOInumber'] ?>">
            <h1 class="modal-title fs-5" id=" Label">
                <?php echo $item['job_ref'] ?> :
                <?php echo $item['first_name'] . " " . $item['last_name'] ?>
            </h1>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">อัพเดตสถานะ </label>
                <select name="status" class="" aria-label="Default select example">
                    <!-- <option selected>---- เลือก ----</option> -->
                    <option <?php echo strtoupper($item['status']) == 'NEW' ? "selected" : "" ?> value="NEW">NEW
                    </option>
                    <option <?php echo strtoupper($item['status']) == 'CURRENT' ? "selected" : "" ?> value="CURRENT">
                        CURRENT</option>
                    <option <?php echo strtoupper($item['status']) == 'FINAL' ? "selected" : "" ?> value="FINAL">FINAL
                    </option>
                </select>
            </div>
            <br>
            <br>


            <button type="button" onclick="history.back(-1)" class="">ยกเลิกแก้ไข</button>
            <button type="submit" class=" ">บันทึก</button>

        </form>

    </center>

    <?php include_once("footer.inc"); ?>

</body>

</html>