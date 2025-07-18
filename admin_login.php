<?php
session_start();

$adminUsername = $_POST['adminUser'];
$adminPassword = $_POST['adminPass'];

// Simple check (for now, you can later connect MongoDB)
if ($adminUsername === 'Naran' && $adminPassword === 'nanu12321') {
    $_SESSION['admin'] = true;
    header("Location: admin-dashboard.php");
} else {
    echo "<script>alert('Invalid Credentials');window.location.href='admin-login.html';</script>";
}
?>
