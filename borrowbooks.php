<?php
include_once('connection.php');

$bookid = $_POST['bookid'];
$stmt = $conn->prepare("SELECT * FROM tblbooks WHERE bookid = :bookid");
$stmt->bindParam(':bookid', $bookid);
$stmt->execute();
$book = $stmt->fetch(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    ################

    if ($stmt->execute()) {
        header("Location: managebooks.php");
        exit;
    } else {
        echo "Error deleting book.";
    }
}
?>

