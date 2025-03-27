<?php 

include './db_connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
$user_id = $_POST['user_id'];
$task_id = $_POST['task_id'];

$stmt = $conn->prepare("DELETE FROM tasks WHERE id = (?)");
$stmt->execute([$task_id]);

header("location: ../public/tasks.php?user_id=$user_id");
exit();

}

/* var_dump($user_id); */

?>