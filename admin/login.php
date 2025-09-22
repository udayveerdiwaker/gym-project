<?php
session_start();
include '../config/connection.php';

$error = "";

// Auto-login if cookie exists
if (isset($_COOKIE['admin_login'])) {
    $_SESSION['user'] = json_decode($_COOKIE['admin_login'], true);
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']);

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
    if (!$stmt) die("Prepare failed: " . $conn->error);

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['user'] = $admin;
            if ($remember) {
                setcookie('admin_login', json_encode($admin), time() + 86400 * 7, "/");
            }
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Admin not found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .login-box {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background: #111;
            border: 2px solid #FFD700;
            border-radius: 12px;
        }

        h2 {
            text-align: center;
            color: #FFD700;
            margin-bottom: 20px;
        }

        .btn-custom {
            background: #FFD700;
            border: none;
            color: #000;
            font-weight: bold;
        }

        .btn-custom:hover {
            background: #000;
            color: #FFD700;
        }

        .message {
            text-align: center;
            margin-bottom: 15px;
            color: #FFD700;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <?php if ($error) echo "<p class='message'>$error</p>"; ?>
        <form method="POST">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required placeholder="Admin username">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label for="remember" class="form-check-label">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-custom w-100">Login</button>
        </form>
    </div>
</body>

</html>