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
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $role = 'user';

    if($password == $confirmPassword){
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, number, email, password, role) VALUES ('$username', '$phone', '$email', '$password', '$role')";
    }
    if ($conn->query($sql) === TRUE) {
        header("Location:../index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
