<?php
include 'settings.php';


$searchText = isset($_POST["s"]) ? $_POST["s"] : '';
$searchState = isset($_POST["state"]) ? $_POST["state"] : 'all';

if ($searchState == 'all') {
    $sqlS = '';
} else {
    $sqlS = "AND  state IN ('$searchState')";
}

$sqlText = " WHERE ( first_name  LIKE '%$searchText%' OR  last_name LIKE '%$searchText%'  OR  address LIKE '%$searchText%' OR  suburb_town LIKE '%$searchText%' OR  email LIKE '%$searchText%' OR  phone LIKE '%$searchText%'   OR  skills LIKE '%$searchText%' OR  job_ref LIKE '%$searchText%' OR  postcode LIKE '%$searchText%')";

$sql = "SELECT * FROM eoi $sqlText $sqlS";

$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Search Applicant Info</title>
</head>

<body>
    <div class="container-fluid">
        <?php

        ?>
        <h1 class="text-center mt-3">Applicant Info</h1>

        <form action="manage.php" method="post" >
            <div class="row">
                <div class="col-3">
                    <div class="mb-3">
                        <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                        <input type="text" class="" name="s" value="<?php echo $searchText ?>"
                            placeholder="กรอกรายละเอียด">

                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">

                        <select id="state" name="state" class="">
                            <option <?php echo $searchState == 'all' ? "selected" : "" ?> value="all">---- ทั้งหมด ----
                            </option>
                            <option <?php echo $searchState == 'VIC' ? "selected" : "" ?> value="VIC">VIC</option>
                            <option <?php echo $searchState == 'NSW' ? "selected" : "" ?> value="NSW">NSW</option>
                            <option <?php echo $searchState == 'QLD' ? "selected" : "" ?> value="QLD">QLD</option>
                            <option <?php echo $searchState == 'NT' ? "selected" : "" ?> value="NT">NT</option>
                            <option <?php echo $searchState == 'WA' ? "selected" : "" ?> value="WA">WA</option>
                            <option <?php echo $searchState == 'SA' ? "selected" : "" ?> value="SA">SA</option>
                            <option <?php echo $searchState == 'TAS' ? "selected" : "" ?> value="TAS">TAS</option>
                            <option <?php echo $searchState == 'ACT' ? "selected" : "" ?> value="ACT">ACT</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <button type="submit" class=" ">ค้นหา</button>

                    </div>
                </div>

                <div class="col-2"></div>
            </div>


        </form>
        <form action="deleteEOI.php" method="post">
            <table class="" border="1" style="width: 100%;  border:1px solid black; ">
                <thead class="">
                    <tr style=" border:1px solid black; ">
                        <th>EOI No</th>
                        <th>Job</th>
                        <th>Name</th>
                        <th>address</th>
                        <th>state</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>skills</th>
                        <th>Status</th>
                        <th> <button type="submit" name="" class=" ">ลบที่เลือก</button>  <button type="button" onclick="setDeleteEoi('all')" name="all" class=" ">ลบทั้งหมด</button></th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $key => $item): ?>
                        <tr style=" border:1px solid black; ">
                            <td>
                                <?php echo ++$key ?>  <input type="checkbox"  name="EOInumber[]" value="<?php echo $item['EOInumber'] ?>" >
                            </td>
                            <td>
                                <?php echo $item['job_ref'] ?>
                            </td>
                            <td>
                                <?php echo $item['first_name'] . " " . $item['last_name'] ?>
                            </td>
                            <td>
                                <p class="m-0 p-0">address :
                                    <?php echo $item['address'] ?>
                                </p>
                                <p class="m-0 p-0">suburb_town :
                                    <?php echo $item['suburb_town'] ?>
                                </p>
                                <p class="m-0 p-0">postcode :
                                    <?php echo $item['postcode'] ?>
                                </p>

                            </td>
                            <td>
                                <?php echo $item['state'] ?>
                            </td>
                            <td>
                                <?php echo $item['email'] ?>
                            </td>
                            <td>
                                <?php echo $item['phone'] ?>
                            </td>
                            <td>
                                <p class="m-0 p-0">skills :
                                    <?php echo $item['skills'] ?>
                                </p>
                                <p class="m-0 p-0">other_skills :
                                    <?php echo empty($item['other_skills']) ? "-" : $item['other_skills'] ?>
                                </p>
                            </td>
                            <td>
                                <?php
                                switch (strtoupper($item['status'])) {
                                    case 'NEW':
                                        echo '<span class="">New</span>';
                                        break;
                                    case 'CURRENT':
                                        echo '<span class="">Current</span>';
                                        break;
                                    case 'FINAL':
                                        echo '<span class="">Final</span>';
                                        break;
                                } ?>
                            </td>
                            <td>
                                <a href="jobs.php?EOInumber=<?php echo $item['EOInumber'] ?>" class=" ">description</a>
                                <button type="button" class=" " data-bs-toggle="modal"
                                    data-bs-target="#m-<?php echo $item['EOInumber'] ?>">
                                    จัดการ
                                </button>
                                
                                <!-- <button onclick="setDeleteEoi('<?php echo $item['EOInumber'] ?>')" type="button"
                                    class="">Delete</button> -->
                            </td>
                            <div class="modal fade" id="m-<?php echo $item['EOInumber'] ?>" tabindex="-1"
                                aria-labelledby=" Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="updateEOI.php" method="post">
                                            <input type="hidden" name="EOInumber" value="<?php echo $item['EOInumber'] ?>">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id=" Label">
                                                    <?php echo $item['job_ref'] ?> :
                                                    <?php echo $item['first_name'] . " " . $item['last_name'] ?>
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">อัพเดตสถานะ </label>
                                                    <select name="status" class="" aria-label="Default select example">
                                                        <!-- <option selected>---- เลือก ----</option> -->
                                                        <option <?php echo strtoupper($item['status']) == 'NEW' ? "selected" : "" ?> value="NEW">NEW</option>
                                                        <option <?php echo strtoupper($item['status']) == 'CURRENT' ? "selected" : "" ?> value="CURRENT">CURRENT</option>
                                                        <option <?php echo strtoupper($item['status']) == 'FINAL' ? "selected" : "" ?> value="FINAL">FINAL</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="" data-bs-dismiss="modal">ปิด</button>
                                                <button type="submit" class=" ">บันทึก</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </form>


    </div>
    <script>
        function setDeleteEoi(id) {
            if (confirm("คุณต้องการลบ?")) {

                location.assign("deleteEOI.php?EOInumber=" + id);
            }
        }
    </script>

</body>

</html>



</body>

</html>