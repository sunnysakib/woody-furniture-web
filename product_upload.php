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
    $productName = $_POST["proName"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    // Check if a file was uploaded
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $conn->query("INSERT INTO products(name, price, description, image) VALUES ('$productName', '$price', '$description', '$imgContent')"); 
             
            if($insert){ 
                
                echo "File uploaded successfully."; 
            }else{ 
                echo "Error: " . $sql . "<br>" . $conn->error;
            }  
        }else{ 
            echo "Error: " . $sql . "<br>" . $conn->error; 
        } 
    }else{ 
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
}

// Close the database connection
$conn->close();
?>