<?php
   $servername = 'localhost';
   $username = 'root';
   $password= '';

$conn = new PDO("mysql:host=$servername", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE DATABASE IF NOT EXISTS Library";
$conn->exec($sql);
$sql = "USE Library";
$conn->exec($sql);
echo "DB created successfully";

// books table //
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblbooks;
CREATE TABLE tblbooks 
(bookid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(20) NOT NULL,
author VARCHAR(20) NOT NULL,
illustrator VARCHAR(20),
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
echo"<br>tblbooks created";

// users table //
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblusers;
CREATE TABLE tblusers 
(memberno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
forename VARCHAR(20),
surname VARCHAR(20),
title VARCHAR(4),
username VARCHAR(15) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL, 
dob DATE NOT NULL,
email VARCHAR(50) NOT NULL UNIQUE,
role TINYINT(1))
");
$stmt->execute();
$stmt->closeCursor();
echo"<br>tblusers created";

// loans table //
$stmt = $conn->prepare("DROP TABLE IF EXISTS tblloans;
CREATE TABLE tblloans 
(loanid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
bookid INT(6) UNSIGNED NOT NULL,
memberno INT(6) UNSIGNED NOT NULL,
dateborrows DATE,
returned TINYINT(1), 
review TEXT)
");
$stmt->execute();
$stmt->closeCursor();
echo"<br>tblloans created";

/* Foreign Key for memberno for table tblloans*/
$stmt = $conn->prepare("
ALTER TABLE tblloans
ADD CONSTRAINT fk_memberno FOREIGN KEY (memberno)
REFERENCES tblusers(memberno)
ON DELETE CASCADE
ON UPDATE CASCADE");
$stmt->execute();
$stmt->closeCursor();
echo"<br>fk_memberno created for tblloans";

/* Foreign Key for bookid for table tblloans*/
$stmt = $conn->prepare("
ALTER TABLE tblloans
ADD CONSTRAINT fk_bookid FOREIGN KEY (bookid)
REFERENCES tblbooks(bookid)
ON DELETE CASCADE
ON UPDATE CASCADE");
$stmt->execute();
$stmt->closeCursor();
echo"<br>fk_bookid created";
?>