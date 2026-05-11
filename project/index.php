<?php
require_once 'common/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Management System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
    <h1>Employee Management System</h1>

    <?php if(isset($_SESSION['user_id'])): ?>
        <a href="dashboard" class="btn">Go to Dashboard</a>
        <a href="logout" class="btn logout">Logout</a>
    <?php else: ?>
        <a href="login" class="btn">Login</a>
    <?php endif; ?>
</div>

</body>
</html>