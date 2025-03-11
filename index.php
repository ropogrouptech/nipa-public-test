<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "testdb";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process user input
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // 🚨 SQL Injection Vulnerability: User input is directly inserted into SQL query
    $query = "SELECT email FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Email: " . $row['email'];
    } else {
        echo "User not found.";
    }
}

$conn->close();
?>
