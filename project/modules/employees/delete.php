<?php
require_once '../../common/auth.php';
require_once '../../common/config.php';

$id = $_GET['id'];

$conn->query("DELETE FROM employees WHERE id='$id'");

header('Location: list');
exit;
?>