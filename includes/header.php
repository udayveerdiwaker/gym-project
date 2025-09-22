<?php
// index.php
session_start();

// Redirect logged-in users
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] === 'admin') {
        header('Location: admin/dashboard.php');
        exit;
    } else {
        header('Location: user/dashboard.php');
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Optional: Add Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Gym Management</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="user/register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="user/login.php">User Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin/login.php">Admin Login</a></li>
                </ul>
            </div>
        </div>
    </nav>