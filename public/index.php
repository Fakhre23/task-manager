<?php

include '../includes/db_connect.php';

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./css/main.css";>
</head>
<body>
    <h1>Users</h1>

    <div class="user-container">
        
    <?php foreach ($users as $user):?>
        <a href="tasks.php?user_id=<?= $user['id'] ?>" class="user-card">
        <div class="user-card">
            <img src="<?= htmlspecialchars($user['profile_image']) ?> "alt="User Image">
            <h2><?= htmlspecialchars($user['name']) ?></h2>
        </div>
    <?php endforeach; ?>
    </div>

    <a href="register.php">Add New User</a>

</body>
</html> 