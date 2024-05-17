<?php
$host = "localhost";
$username = "root";
$password = ""; // Assuming no password is set for the root user
$db_name = "iitportal";

// Create connection
$mysqli = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $fname = $mysqli->real_escape_string($_POST['fname']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $idnum = $mysqli->real_escape_string($_POST['idnum']);
    // Perform insert query
    $sql = "INSERT INTO user (FullName, Username, Password, ID_NUMBER) VALUES ('$fname', '$username', '$password', '$idnum')";
    if ($mysqli->query($sql) === TRUE) {
        // Redirect to login.php with success message
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Close connection
    $mysqli->close();
}
?>
<!-- Move this script tag to the end of the body section -->
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
