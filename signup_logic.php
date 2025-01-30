<?php
include_once("connection.php");
//header('Location:login.php');
array_map("htmlspecialchars", $_POST);

$day = str_pad($_POST["day"], 2, "0", STR_PAD_LEFT);
$dob = $_POST["year"]."-".$_POST["month"]."-".$day;
$role = 0;

$surname = trim($_POST["surname"]);
$forename = trim($_POST["forename"]);
$baseusername = strtolower($surname . substr($forename, 0, 2));
$username = preg_replace('/[^a-z0-9]/', '', $baseusername);
$counter = 1;
while (true) {
    $sql = "SELECT COUNT(*) AS count FROM tblusers WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row["count"] == 0) {
        break;
    }

    $username = $baseusername . $counter;
    $counter++;
}

$salt = bin2hex(random_bytes(16));
$saltpassword = $_POST["password"].$salt;
$hashpassword = password_hash($saltpassword, PASSWORD_BCRYPT);

print_r($_POST);
// Array ( [forename] => testing [surname] => test [title] => mr [day] => 4 [month] => 06 [year] => 2012 [email] => abc@gmail.com )

$sql = "INSERT INTO tblusers (memberno, forename, surname, title, username, password, dob, email, role)
VALUES (NULL, :forename, :surname, :title, :username, :password, :dob, :email, :role)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':forename', $forename);
$stmt->bindParam(':surname', $surname);
$stmt->bindParam(':title', $_POST["title"]);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $hashpassword);
$stmt->bindParam(':dob', $dob);
$stmt->bindParam(':email', $_POST["email"]);
$stmt->bindParam(':role', $role);
$stmt->execute();

?>