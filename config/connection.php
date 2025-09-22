<?php
// Database connection file

$host = "localhost";      // Database host (usually localhost)
$user = "root";           // Database username (default in XAMPP = root)
$pass = "";               // Database password (default in XAMPP = empty)
$dbname = "gym_management";   // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Database Connection Failed: " . $conn->connect_error);
}

// Optional: set charset to utf8mb4 for better encoding
$conn->set_charset("utf8mb4");

// ✅ If everything is fine
// echo "✅ Connected Successfully";  // Uncomment for debugging
