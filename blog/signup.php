<?php
require 'db_conn.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

$username = trim($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        echo "Error: Username may already exist.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
</head>
<body>
<h2>Signup</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="submit" value="Register">
</form>
<br>
<a href="login.php">Already have an account? Login</a>
</body>
</html>

