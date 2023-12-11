<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "woody_db";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
        if ($password == $row["password"]) {
            echo "ok";
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo 'User not found. Please register.';
}
}

$conn->close();
?>
