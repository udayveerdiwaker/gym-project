<?php
session_start();

// Check if user is logged in and role is user
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Gym System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            color: #FFD700;
        }

        .btn-logout {
            background: #FFD700;
            color: #000;
            border: none;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #000;
            color: #FFD700;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1>💪 User Dashboard</h1>
        <p>Welcome, <?= htmlspecialchars($_SESSION['user']['username']) ?></p>
        <a href="../logout.php" class="btn btn-logout mt-3">Logout</a>
    </div>
</body>

</html>