<?php 

include '../includes/db_connect.php';

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    //get user info 

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //get tasks for the user 

    $stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);


}

var_dump($user_id)



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- *************** form to submit new tasks for the use *************** -->


<h2> add tasks for <?= htmlspecialchars($user['name']); ?> </h2>

<form action="../includes/add_task.php" method="POST">
    <input type="hidden" name="user_id" value="<?= $user_id ?>" >
    <input type="text" name="title" placeholder="title of the task" requierd>
    <button type="submit"> Add Task </button>
    </form>


<!--*************** show all tasks for the user *************** -->

<h2>Tasks List</h2>
    <ul>
    <?php foreach ($tasks as $task): ?>
    <li> <?= htmlspecialchars($task['title'])?> </li>
    <li> <?= htmlspecialchars($task['created_at'])?> </li>
    <li> <?= htmlspecialchars($task['status'])?> </li>
    <?php endforeach; ?>
</ul>
    
<a href="./index.php">Back to Users</a> 

</body>
</html>