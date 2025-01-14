<?php
   $servername = 'localhost';
   $username = 'root';
   $password= '';

$conn = new PDO("mysql:host=$servername", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE DATABASE IF NOT EXISTS Library";
$conn->exec($sql);
$sql = "USE Toilets";
$conn->exec($sql);
echo "DB created successfully";

// books table //
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblbooks;
CREATE TABLE tblbooks 
(bookid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(20) NOT NULL,
author VARCHAR(20) NOT NULL,
illistrator VARCHAR(20),
yearpublished INT(4),
length INT(4), 
readinglevel INT(2),
seriesposition INT(2), 
fiction VARCHAR(12),
genre VARCHAR(15),
location INT(4), 
onloan INT(1))
");
$stmt->execute();
$stmt->closeCursor();

// users table //
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblusers;
CREATE TABLE tblusers 
(memberno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(20),
surname VARCHAR(20),
title VARCHAR(4),
username VARCHAR(15),
password VARCHAR(200), 
dob DATE,
email VARCHAR(20),
role TINYINT(1)
");
$stmt->execute();
$stmt->closeCursor(); 

// loans table //
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblloans;
CREATE TABLE tblloans 
(loanid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
bookid INT(6) NOT NULL,
surname VARCHAR(20) NOT NULL,
dateborrows DATE,
password VARCHAR(20), 
dob DATE,
returned TINYINT(1), 
review TEXT,
");
$stmt->execute();
$stmt->closeCursor();

?>