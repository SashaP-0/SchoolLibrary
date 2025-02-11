<?php
include_once('connection.php');
array_map("htmlspecialchars", $_POST);

$bookid = $_POST['bookid'];
$title = $_POST['title'];
$author = $_POST['author'];
$illustrator = $_POST['illustrator'] ?? null;
$yearpublished = $_POST['yearpublished'] ?? null;
$length = $_POST['length'] ?? null;
$readinglevel = $_POST['readinglevel'] ?? null;
$seriesposition = $_POST['seriesposition'] ?? null;
$fiction = $_POST['fiction'] ?? null;
$genre = $_POST['genre'] ?? null;
$location = $_POST['location'] ?? null;
$onloan = 0;

$stmt = $conn->prepare("INSERT INTO tblbooks (bookid, title, author, illustrator, yearpublished, length, readinglevel, seriesposition, fiction, genre, location, onloan)
                            VALUES (:bookid, :title, :author, :illustrator, :yearpublished, :length, :readinglevel, :seriesposition, :fiction, :genre, :location, :onloan)");    
$stmt->bindParam(':bookid', $bookid);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':author', $author);
$stmt->bindParam(':illustrator', $illustrator);
$stmt->bindParam(':yearpublished', $yearpublished);
$stmt->bindParam(':length', $length);
$stmt->bindParam(':readinglevel', $readinglevel);
$stmt->bindParam(':seriesposition', $seriesposition);
$stmt->bindParam(':fiction', $fiction);
$stmt->bindParam(':genre', $genre);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':onloan', $onloan);

$stmt->execute();
header("Location: addbooks.php");
?>
