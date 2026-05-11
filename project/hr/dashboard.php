<?php
require_once '../common/auth.php';

if ($_SESSION['role'] != 'hr') {
    header('Location: ../login');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HR Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard">
    <h1>HR Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['name']; ?></p>

    <a href="../logout" class="btn logout">Logout</a>
</div>

</body>
</html>