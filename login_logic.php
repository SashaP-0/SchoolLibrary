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

print_r($user);
// Check if user exists and password is correct
print('<br>');
print($user['password']);
print('<br>');



$plain_password = "mypassword";
$stored_hash = password_hash($plain_password, PASSWORD_BCRYPT);

if (password_verify($plain_password, $stored_hash)) {
    echo "Password matches! -- test";
} else {
    echo "Invalid password. -- test";
}

echo('<br>');
echo('<br>');

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