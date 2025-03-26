<?php

include '../includes/db_connect.php';

/* echo $_SERVER['REQUEST_METHOD']; */

if ($_SERVER["REQUEST_METHOD"] =='POST'){
  $name = $_POST['name'];


     /* *****  get user image from uploads->Dir  ******/

$targetDir = "uploads/";                 
$fileNme = basename($_FILES["profile-image"]["name"]);                                    // omar.jpg
$targetFilePath = $targetDir . $fileNme;                                                  // uploads/omar.jpg 
$fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));                   //jpg
$allowedTypes = ['jpg' , 'jpeg' , 'png'];

if(in_array($fileType,$allowedTypes)){                                                  // Checking if the File Type is Allowed
  if(move_uploaded_file($_FILES["profile-image"]["tmp_name"], $targetFilePath)){       // Checking if the Files in uploads/ 

    $stmt = $conn->prepare("INSERT INTO users (name , profile_image) VALUES (? , ?);");
    $stmt->execute([$name , $targetFilePath]);
    echo "User registered successfully!";

  } else {
    echo "Error uploading file.";
  }
}  else { 
  echo "Invalid file type. Only JPG, PNG, and GIF allowed.";
}   
}

/* var_dump($fileNme); */




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/main.css";>
</head>
<body>
  <h1>this is register page</h1> 
  
  <form action="register.php" method="POST" enctype="multipart/form-data" >
    <input type="text" name="name" placeholder="Enter Name" required>
    <input type="file" name="profile-image" accept="images/*" required>
    <button type="submit">Register</button>

  </form>
  <a href="index.php">Back</a>
</body>
</html>