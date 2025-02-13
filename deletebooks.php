<?php
include_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bookid'])) {
    $bookid = $_POST['bookid'];

    // Fetch book details to display before deletion
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

// Handle book deletion when user confirms
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    $stmt = $conn->prepare("DELETE FROM tblbooks WHERE bookid = :bookid");
    $stmt->bindParam(':bookid', $bookid);

    if ($stmt->execute()) {
        header("Location: managebooks.php");
        exit;
    } else {
        echo "Error deleting book.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Book</title>
</head>
<body>
    <h1>Delete Book</h1>
    <p>Are you sure you want to delete the book <strong><?= htmlspecialchars($book['title']); ?></strong> by <strong><?= htmlspecialchars($book['author']); ?></strong>?</p>
    
    <form method="post" action="">
        <input type="hidden" name="bookid" value="<?= $book['bookid']; ?>">
        <button type="submit" name="confirm_delete">Yes, Delete</button>
    </form>
    
    <br>
    <a href="managebooks.php">Back to Manage Books</a>
</body>
</html>
