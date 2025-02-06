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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];

    $stmt = $conn->prepare("UPDATE tblbooks SET title = :title, author = :author WHERE bookid = :bookid");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':bookid', $bookid);

    if ($stmt->execute()) {
        echo "Book updated successfully.";
        header("Location: managebooks.php");
        exit;
    } else {
        echo "Error updating book.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    <form method="post" action="">
        <input type="hidden" name="bookid" value="<?= $book['bookid']; ?>">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= $book['title']; ?>" required><br>
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="<?= $book['author']; ?>" required><br>
        <button type="submit" name="update">Update Book</button>
    </form>
    <br>
    <a href="mainbooks.php">Back to Main Books</a>
</body>
</html>
