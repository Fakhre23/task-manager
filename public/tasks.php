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

/* var_dump('the user id is ', $user_id) */



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

<!-- *************** form to submit new tasks for the use *************** -->


<h2> add tasks for <?= htmlspecialchars($user['name']); ?> </h2>

<form action="../includes/add_task.php" method="POST">
    <input type="hidden" name="user_id" value="<?= $user_id ?>" >
    <input type="text" name="title" placeholder="title of the task" required>
    <button type="submit"> Add Task </button>
    </form>


<!--*************** show all tasks for the user *************** -->

<h2>Tasks List</h2>

    <ul id="tasklist">
    <?php foreach ($tasks as $task): ?>

        <li>
            <span class="task-title"><?= htmlspecialchars($task['title'])?> </span>
            <form action="../includes/delete_task.php" method="POST" style="display:inline">
                <input type="hidden" name="user_id" value="<?= $user_id ?>" >
                <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                <button type="submit" class="done-btn">✔ Done</button>
            </form> 
        </li>
        
    <?php endforeach; ?>
</ul>
    
<a href="./index.php">Back to Users</a> 
<script src="js/tasks.js"></script>

</body>
</html>