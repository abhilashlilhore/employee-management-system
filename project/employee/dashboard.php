<?php
require_once '../common/auth.php';

if ($_SESSION['role'] != 'employee') {
    header('Location: ../login');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard">
    <h1>Employee Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['name']; ?></p>

    <a href="../logout" class="btn logout">Logout</a>
</div>

</body>
</html>