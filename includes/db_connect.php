<?php
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "db name ";

try {
    $conn = new PDO("mysql:host=$servername;dbname=task_manager" , $username , $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

} catch (PDOException $th) {
    echo "Connection failed: " . $th->getMessage();
}

$conn = null;
?>

?>