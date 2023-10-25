<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css" />
    <script src="scripts/enhancements.js"></script>
</head>
<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    // connect database
    include 'settings.php';

    // Get dat from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // check how many attemp time do users access?
    $sql = "SELECT * FROM login_attempts WHERE manager_id = (SELECT manager_id FROM managers WHERE username = '$username')";
    $result = $conn->query($sql);
    $attempts = $result->num_rows;

    if ($attempts >= 3) {
        // if users log in more than 2 time, alert notify message.
        echo "";

        // wait 10 second before กdelete login_attempts then users can start again. 
        sleep(10);

        // delete login_attempts
        $delete_sql = "DELETE FROM login_attempts WHERE manager_id = (SELECT manager_id FROM managers WHERE username = '$username')";
        $conn->query($delete_sql);
    } else {
        // set SQL comand to search user data
        $sql = "SELECT * FROM managers WHERE username = '$username' AND password_hash = '$password'";
        $result = $conn->query($sql);

        // Validate log in
        if ($result->num_rows > 0) { //if enter correct username and password, log in success.
            

            // delete all login_attempts 
            $delete_all_attempts_sql = "DELETE FROM login_attempts WHERE manager_id = (SELECT manager_id FROM managers WHERE username = '$username')";
            $conn->query($delete_all_attempts_sql);

            session_start();
            $_SESSION['username'] = $username;
            header("Location: manage.php"); // After log in successfully, redirect to manage page.
        } else {
            // log in fail
            // record failed access attempt into table login_attempts.
            $insert_sql = "INSERT INTO login_attempts (manager_id, attempt_time) VALUES ((SELECT manager_id FROM managers WHERE username = '$username'), NOW())";
            $conn->query($insert_sql);

            header("Location: login.php"); // When log in fail, redirect to log in page along with error message.
        }
    }

    // close the database connection
    $conn->close();
}

?>

<?php include_once("header.inc"); ?>

<body></body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<?php include_once("footer.inc"); ?>

</body>

</html>