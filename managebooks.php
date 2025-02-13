<?php 
include_once('connection.php'); 

$selectedBookId = "";
$books = [];
$stmt = $conn->prepare("SELECT bookid, title FROM tblbooks WHERE onloan = 0");
$stmt->execute();
$allBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['bookDropdown'])) {
        $selectedBookId = $_POST['bookDropdown'];
        $query = "SELECT * FROM tblbooks WHERE bookid = :bookid";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':bookid', $selectedBookId);
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    if (isset($_POST['borrowBook'])) {
        $bookIdToBorrow = $_POST['bookid'];
        $memberno = $_POST['memberno']; 
        $stmt = $conn->prepare("INSERT INTO tblloans (bookid, memberno, dateborrows, returned) VALUES (:bookid, :memberno, NOW(), 0)");
        $stmt->bindValue(':bookid', $bookIdToBorrow, PDO::PARAM_INT);
        $stmt->bindValue(':memberno', $memberno, PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $conn->prepare("UPDATE tblbooks SET onloan = 1 WHERE bookid = :bookid");
        $stmt->bindValue(':bookid', $bookIdToBorrow, PDO::PARAM_INT);
        $stmt->execute();
        echo "You have successfully borrowed the book!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Books (Dropdown)</title>
</head>
<body>
    <h1>Manage Books</h1>
    <form method="post" action="">
        <label for="bookDropdown">Select a Book:</label>
        <select id="bookDropdown" name="bookDropdown">
            <option value="">-- Select a Book --</option>
            <?php foreach ($allBooks as $book): ?>
                <option value="<?= $book['bookid']; ?>" <?= $selectedBookId == $book['bookid'] ? "selected" : ""; ?>><?= $book['title']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">View</button>
    </form>

    <br>
    <h2>Book Details</h2>
    <table border="1">
        <tr>
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($books)): ?>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= $book['bookid']; ?></td>
                    <td><?= $book['title']; ?></td>
                    <td><?= $book['author']; ?></td>
                    <td>
                        <form method="post" action="" style="display:inline;">
                            <input type="hidden" name="bookid" value="<?= $book['bookid']; ?>">
                            <input type="hidden" name="memberno" value="1"> 
                            <button type="submit" name="borrowBook">Borrow</button>
                        </form>

                        <form method="post" action="editbooks.php" style="display:inline;">
                            <input type="hidden" name="bookid" value="<?= $book['bookid']; ?>">
                            <button type="submit">Edit</button>
                        </form>

                        <form method="post" action="deletebooks.php" style="display:inline;">
                            <input type="hidden" name="bookid" value="<?= $book['bookid']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No book selected.</td>
            </tr>
        <?php endif; ?>
    </table>
    <br>
    <a href="mainbooks.php">Back to Main Page</a>
</body>
</html>
