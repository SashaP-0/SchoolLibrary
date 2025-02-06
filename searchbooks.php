<?php
include_once('connection.php'); 

$searchTerm = "";
$searchBy = "";
$books = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST['searchTerm'];
    $searchBy = $_POST['searchBy'];

    $query = "SELECT * FROM tblbooks WHERE $searchBy LIKE :searchTerm";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':searchTerm', "%$searchTerm%");
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Books</title>
</head>
<body>
    <h1>Search for a Book</h1>
    <form method="post" action="">
        <label for="searchTerm">Search:</label>
        <input type="text" id="searchTerm" name="searchTerm" value="<?= htmlspecialchars($searchTerm); ?>" placeholder="Enter search term">
        <label for="searchBy">Search by:</label>
        <select id="searchBy" name="searchBy" required>
            <option value="title" <?= $searchBy == "title" ? "selected" : ""; ?>>Title</option>
            <option value="bookid" <?= $searchBy == "bookid" ? "selected" : ""; ?>>Book ID</option>
            <option value="author" <?= $searchBy == "author" ? "selected" : ""; ?>>Author</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <br>
    <h2>Search Results</h2>
    <table border="1">
        <tr>
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
        </tr>
        <?php if (!empty($books)): ?>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= $book['bookid']; ?></td>
                    <td><?= $book['title']; ?></td>
                    <td><?= $book['author']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No books found.</td>
            </tr>
        <?php endif; ?>
    </table>
    <br>
    <a href="mainbooks.php">Back to Main Page</a>
</body>
</html>