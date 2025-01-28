<?php
include_once("connection.php");
//header('Location:login.php');
array_map("htmlspecialchars", $_POST);


print_r($_POST);
// Array ( [forename] => testing [surname] => test [title] => mr [day] => 4 [month] => 06 [year] => 2012 [email] => abc@gmail.com )
$stmt = $conn->prepare("INSERT INTO tblusers (memberno, firstname, surname, title, username, password, dob, email, role)
VALUES (null,:forename,:surname,:title,:username,:password,:dob,:email,:role)")
?>