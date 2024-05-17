<?php
session_start();

// Database connection parameters
$host = "localhost"; // Host name
$Username = "root"; // MySQL username
$pass = ""; // MySQL password
$dbname = "iitportal"; // Database name

// Create connection
$conn = new mysqli($host, $Username, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password fields are set
    if (isset($_POST['Username'], $_POST['Password'])) {
        $Username = htmlspecialchars($_POST['Username']);
        $pass = htmlspecialchars($_POST['Password']);
    }
}
        // Validate input
        if (empty($Username) || empty($pass)) {
            $error_message = "Username and Password are required";
            header("Location: login.php?error=" . urlencode($error_message));
            exit();
        }

        // Prepare and bind parameters
        $stmt = $conn->prepare("SELECT * FROM user WHERE Username=?");
        $stmt->bind_param("s", $Username);
        $stmt->execute();
        $result = $stmt->get_result();

   // Check if the user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    // Debugging: Inspect contents of $row
    //var_dump($row);
    // Verify password
    if (isset($row['Password']) && password_verify($pass, $row['Password'])) {
        $_SESSION['Username'] = $row['Username'];
        header("Location: dashboard.html");
        exit();
    } else {
        $error_message = "Incorrect password";
       header("Location: login.php?error=" . urlencode($error_message));
       //header("Location: dashboard.html");
       exit();
    }
} else {
    $error_message = "User not found";
    header("Location: login.php?error=" . urlencode($error_message));
    exit();
}