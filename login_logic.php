<?php
include_once("connection.php");
session_start(); // Start session if needed
print_r($_POST);
print('<br>');

// Sanitize input
$_POST = array_map("htmlspecialchars", $_POST);

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$stmt = $conn->prepare("SELECT * FROM tblusers WHERE username = :username");
$stmt->bindParam(":username", $username, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$hash = trim($user['password']);

if ($user) {
    echo('User Found <br>');
    echo($user['password'].'<br>');
    echo $password;
    echo('<br>');
    if (password_verify($password, $hash)) {
        echo "Password matches!";
        $_SESSION['memberno'] = $user['memberno'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
    } else {
        echo "Invalid Password";
    }
} else {
    echo "user not found";
}
?>