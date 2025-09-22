<?php
session_start();
session_unset();
session_destroy();

if (isset($_COOKIE['admin_login'])) setcookie('admin_login', '', time() - 3600, "/");
if (isset($_COOKIE['user_login'])) setcookie('user_login', '', time() - 3600, "/");

header("Location: ../login.php");
exit;
