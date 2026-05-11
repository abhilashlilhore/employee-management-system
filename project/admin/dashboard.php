<?php
require_once '../common/auth.php';

if ($_SESSION['role'] != 'admin') {
    header('Location: ../login');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-container">

    <?php include '../common/sidebar.php'; ?>

    <div class="content-area">

        <?php include '../common/navbar.php'; ?>

        <div class="../dashboard-content">

            <div class="card">
                <h3>Total Employees</h3>
                <p>120</p>
            </div>

            <div class="card">
                <h3>Pending Leaves</h3>
                <p>12</p>
            </div>

            <div class="card">
                <h3>Attendance Today</h3>
                <p>95%</p>
            </div>

            <div class="card">
                <h3>Payroll Status</h3>
                <p>Processed</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>