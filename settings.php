<?php
// `setting connection databases.

// $servername = "feenix-mariadb.swin.edu.au";
// $username = "s103503476";
// $password = "141292";
// $dbname = "s103503476_db";

$servername = "feenix-mariadb.swin.edu.au";
$username = "s103503476";
$password = "141292";
$dbname = "s103503476_db";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "s103503476_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Something is wrong with: " . $conn->connect_error);
}
?>