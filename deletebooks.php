<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Book</title>
</head>
<body>
    <h1>Delete Book</h1>
    <p>Are you sure you want to delete the book <strong><?= $book['title']; ?></strong> by <strong><?= $book['author']; ?></strong>?</p>
    <form method="post" action="">
        <input type="hidden" name="bookid" value="<?= $book['bookid']; ?>">
        <button type="submit" name="confirm_delete">Yes, Delete</button>
    </form>
    <br>
    <a href="managebooks.php">Back to Manage Books</a>
</body>
</html>

<?php
include_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bookid'])) {
    $bookid = $_POST['bookid'];

    $stmt = $conn->prepare("SELECT * FROM tblbooks WHERE bookid = :bookid");
    $stmt->bindParam(':bookid', $bookid);
    $stmt->execute();
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$book) {
        echo "Book not found.";
        exit;
    }
} else {
    echo "No book selected.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    $stmt = $conn->prepare("DELETE FROM tblbooks WHERE bookid = :bookid");
    $stmt->bindParam(':bookid', $bookid);

    if ($stmt->execute()) {
        echo "Book deleted successfully.";
        header("Location: managebooks.php");
        exit;
    } else {
        echo "Error deleting book.";
    }
}
?>

<?php
include_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookid = $_POST['bookid'];
    $title = $_POST['title'];
    $author = $_POST['author'];

    $stmt = $conn->prepare("INSERT INTO tblbooks (bookid, title, author) VALUES (:bookid, :title, :author)");
    $stmt->bindValue(':bookid', $bookid);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':author', $author);
    $stmt->execute();

}
?>
