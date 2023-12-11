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

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    $sql = "INSERT INTO contacts (first_name, last_name, email, message) VALUES ('$fname', '$lname', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../contact.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
