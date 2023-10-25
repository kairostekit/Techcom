<?php

echo "Che le ma";
function sanitize_input($data)
{
    $data = trim($data); // remove leading or trailing
    $data = stripslashes($data); // remove backslashes in front of quotes
    $data = htmlspecialchars($data); // convert HTML control characters to the html code.
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    // if no post in form
    // redirect to jobs page
    header("Location: jobs.php");
    exit;
}

$isValid = true;
$errorMessages = array();
$checkother_skills = false;

$first_name = sanitize_input($_POST["first_name"]);
$last_name = sanitize_input($_POST["last_name"]);
$job_ref = sanitize_input($_POST["job_ref"]);
$dob = sanitize_input($_POST["dob"]);
$gender = sanitize_input($_POST["gender"]);
$email = sanitize_input($_POST["email"]);
$phone = sanitize_input($_POST["phone"]);
$address = sanitize_input($_POST["address"]);
$suburb_town = sanitize_input($_POST["suburb_town"]);
$state = sanitize_input($_POST["state"]);
$postcode = sanitize_input($_POST["postcode"]);
$status = sanitize_input($_POST["status"]);



// check select atleast 1 skill.
$selectedSkills = [];
if (isset($_POST["issues"])) {
    $selectedSkills = isset($_POST["issues"]) ? $_POST["issues"] : [];
    $skillsString = implode(",", $selectedSkills);
} else {
    if (count($selectedSkills) == 0) {
        $isValid = false;
        $errorMessages[] = "Select at least 1 Skill";
    }
}




// print_r($selectedSkills);
// if (isset($_POST['other_skills'])) {

//     $other_skills = $_POST['other_skills'];
//     $trimmed = trim($other_skills); //assign to variable

//     if (empty($trimmed)) { //then check empty
//         echo "Please fill in Other Skills";
//     }

// }

// die();

if (empty($first_name) || !preg_match("/^[a-zA-Z]{1,20}$/", $first_name)) {
    $isValid = false;
    $errorMessages[] = "Incorrect name (over 20 characters)";
}

if (empty($last_name) || !preg_match("/^[a-zA-Z]{1,20}$/", $last_name)) {
    $isValid = false;
    $errorMessages[] = "Incorrect lastname (over 20 characters)";
}

if (empty($job_ref) || strlen($job_ref) !== 5) {
    $isValid = false;
    $errorMessages[] = "Incorrect Job Reference  must be 5 characters)";
}

if (empty($dob)) {
    $isValid = false;
    $errorMessages[] = "Incorrect DOB";
} else {
    $dobDate = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $currentDate->diff($dobDate)->y;

    if ($age < 15 || $age > 80) {
        $isValid = false;
        $errorMessages[] = "Wrong age";
    }
}

if (empty($gender)) {
    $isValid = false;
    $errorMessages[] = "Plese select gender";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $isValid = false;
    $errorMessages[] = "plese enter your correct email";
}

// Check phone no.
$phone = $_POST['phone'];
$phonePattern = '/^\d{8,12}$/';

if (!preg_match($phonePattern, $phone)) {
    $errorMessages[] = 'Please fill in Phone Number with 8 to 12 digits';
    $isValid = false;
} else {
    // Clear the error message and remove the "error" class
    echo '';
}

if (empty($address) || strlen($address) > 40) {
    $isValid = false;
    $errorMessages[] = "address not over 40 characters";
}

if (empty($suburb_town) || strlen($suburb_town) > 40) {
    $isValid = false;
    $errorMessages[] = "suburb must not be over 40 characters)";
}

if (empty($state)) {
    $isValid = false;
    $errorMessages[] = "Plese select incorrect state";
}

if (empty($postcode)) {
    $selectedstate = $state;

    switch ($selectedstate) {
        case "VIC":
            if (!(substr($postcode, 0, 1) === "3" || substr($postcode, 0, 1) === "8")) {
                $isValid = false;
                $errorMessages[] = "postcode is not match with VIC";
            }
            break;
        case "NSW":
            if (!(substr($postcode, 0, 1) === "1" || substr($postcode, 0, 1) === "2")) {
                $isValid = false;
                $errorMessages[] = "postcode is not match with NSW";
            }
            break;
        case "QLD":
            if (!(substr($postcode, 0, 1) === "4" || substr($postcode, 0, 1) === "9")) {
                $isValid = false;
                $errorMessages[] = "postcode is not match with QLD";
            }
            break;
        case "NT":
            if (substr($postcode, 0, 1) !== "0") {
                $isValid = false;
                $errorMessages[] = "postcode is not match with NT";
            }
            break;
        case "WA":
            if (substr($postcode, 0, 1) !== "6") {
                $isValid = false;
                $errorMessages[] = "postcode is not match with WA";
            }
            break;
        case "SA":
            if (substr($postcode, 0, 1) !== "5") {
                $isValid = false;
                $errorMessages[] = "postcode is not match with SA";
            }
            break;
        case "TAS":
            if (substr($postcode, 0, 1) !== "7") {
                $isValid = false;
                $errorMessages[] = "postcode is not match with TAS";
            }
            break;
        case "ACT":
            if (substr($postcode, 0, 1) !== "0") {
                $isValid = false;
                $errorMessages[] = "postcode is not match with ACT";
            }
            break;
    }
}


// $skillError = "";
// $otherSkillsTextError = "";
// $other_skills = ""; // create empty variable

// if (isset($_POST['skill'])) {
//     $selectedSkills = $_POST['skill'];

//     if (count($selectedSkills) === 0) {
//         $skillError = "Select at least 1 Skill";
//     }

// }


foreach ($selectedSkills as $key => $item):
    if ($item == 'OtherSkills') {
        $checkother_skills = true;
    }
endforeach;



// if ($checkother_skills && empty($_POST['other_skills'])) {
//     echo "error: missing";
// }

if ($checkother_skills) {
    $other_skills = $_POST['other_skills'];
    $trimmed = trim($other_skills); //assign to variable

    if (empty($trimmed)) { //then check empty
        $isValid = false;
        $errorMessages[] = "Please fill in Other Skills";
    }

}

if (!$isValid) {
    // if put wrong data, display error
    echo "Please enter the correct data. <br>";
    foreach ($errorMessages as $errorMessage) {
        echo $errorMessage . "<br>";
    }
} else {
    // in case fill correctly
    // The data will be recorded
    include 'settings.php';

    $sql_table = "eoi";
    $fieldDefinition =
        "EOInumber int AUTO_INCREMENT PRIMARY KEY,
                      first_name varchar(50) NOT NULL,
                      last_name varchar(50) NOT NULL,
                      job_ref char(5) NOT NULL,
                      address varchar(100) NOT NULL,
                      suburb_town varchar(40) NOT NULL,
                      state char(3) NOT NULL,
                      postcode char(4) NOT NULL,
                      email varchar(100) NOT NULL,
                      phone varchar(12) NOT NULL,
                      skills varchar(255) NOT NULL,
                      other_skills text DEFAULT NULL,
                      status varchar(20) NOT NULL,
                      created_at timestamp NOT NULL DEFAULT current_timestamp()";


    // check: if table does not exist, create it
    $sqlString = "show tables like '$sql_table'"; // another alternative is to just use 'create table if not exists ...'
    $result = @mysqli_query($conn, $sqlString);
    // checks if any tables of this name
    if (mysqli_num_rows($result) == 0) {
        echo "<p>Table does not exist - create table $sql_table</p>"; // Might not show in a production script 
        $sqlString = "create table " . $sql_table . "(" . $fieldDefinition . ")";
        ;
        $result2 = @mysqli_query($conn, $sqlString);
        // checks if the table was created
        if ($result2 === false) {
            echo "<p class=\"wrong\">Unable to create Table $sql_table." . mysqli_error($conn) . ":" . mysqli_error($conn) . " </p>"; //Would not show in a production script 
        } else {
            // display an operation successful message
            echo "<p class=\"ok\">Table $sql_table created OK</p>"; //it not show in a production script 
        } // if successful query operation

    } else {
        // display an operation successful message
        echo "<p>Table  $sql_table already exists</p>"; //Would not show in a production script 
    } // if successful query operation

    // Set up the SQL command to add the data into the table
    $query = "INSERT INTO eoi (first_name, last_name, job_ref, email, phone, address, suburb_town, state, postcode, skills, other_skills, status) VALUES 
          ('$first_name', '$last_name', '$job_ref', '$email', '$phone', '$address', '$suburb_town', '$state', '$postcode', '$skillsString', '$other_skills', '$status')";

    // execute the query
    $result = mysqli_query($conn, $query);
    // checks if the execution was successful
    if ($result) {

        // Retrive created automatic number.
        $EOInumber = mysqli_insert_id($conn);

        // display an operation successful message
        echo '<script>alert("Record success! EOI number is ' . $EOInumber . '");</script>';
        echo '<script>window.location.href = "jobs.php";</script>'; //redirect to jobs page.
    } else {
        // record failure
        echo '<script>alert("something is wrong with: ' . $conn->error . '");</script>';
        echo '<script>window.location.href = "jobs.php";</script>'; //redirect to jobs page.
    }
    // close the database connection
    mysqli_close($conn);
} // if successful database connection


