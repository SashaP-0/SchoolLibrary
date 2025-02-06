<?php
include_once("connection.php");
session_start(); // Start session if needed
print_r($_POST);

// Sanitize input
$_POST = array_map("htmlspecialchars", $_POST);

$username = trim($_POST['username']);
$password = trim($_POST['password']);
$hashpassword = password_hash($pwd, PASSWORD_BCRYPT);

$stmt = $conn->prepare("SELECT * FROM tblusers WHERE username = :username");
$stmt->bindParam(":username", $username, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

print_r($user);
// Check if user exists and password is correct

if ($user['password'] == $hashpassword) {
    $_SESSION['user_id'] = $user['memberno'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    // header("Location: index.php");
    exit();
}  else {
    // Error message if login fails
    echo "Invalid username or password.";
}
?>
