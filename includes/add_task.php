<?php 
include './db_connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];

    $stmt = $conn->prepare("INSERT INTO tasks (user_id , title) VALUES (? , ?)");
    $stmt->execute([$user_id , $title]);
    
    header("Location: ../public/tasks.php?user_id=$user_id");
    exit();
}



?>