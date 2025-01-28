<?php
include_once("connection.php");
//header('Location:login.php');
array_map("htmlspecialchars", $_POST);

$day = str_pad($_POST["day"], 2, "0", STR_PAD_LEFT);
$dob = $day."-".$_POST["month"]."-".$_POST["year"];
$role = 0;

print_r($_POST);
// Array ( [forename] => testing [surname] => test [title] => mr [day] => 4 [month] => 06 [year] => 2012 [email] => abc@gmail.com )

$stmt = $conn->prepare("INSERT INTO tblusers (memberno, forename, surname, title, username, password, dob, email, role)
VALUES (null,:forename,:surname,:title,:username,:password,:dob,:email,:role)");

$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':title', $_POST["title"]);

$stmt->bindParam(':password', $_POST["password"]);
$stmt->bindParam(':role', $dob);
$stmt->bindParam(':email', $_POST["email"]);
$stmt->bindParam(':role', $role);
?>