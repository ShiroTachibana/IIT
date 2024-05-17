<?php
include("./db_conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $fname = $mysqli->real_escape_string($_POST['fname']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $idnum = $mysqli->real_escape_string($_POST['idnum']);
    // Perform insert query
    $sql = "INSERT INTO user (FullName, Username, Password, ID_NUMBER) VALUES ('$fname', '$username', '$password', '$idnum')";
    if ($mysqli->query($sql) === TRUE) {
        echo "Registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    } }
    