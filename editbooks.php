<?php
include_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bookid'])) {
    $bookid = $_POST['bookid'];

    $stmt = $conn->prepare("SELECT * FROM tblbooks WHERE bookid = :bookid");
    $stmt->bindParam(':bookid', $bookid);
    $stmt->execute();
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $stmt = $conn->prepare("
        UPDATE tblbooks SET 
        title = :title, 
        author = :author, 
        illustrator = :illustrator, 
        yearpublished = :yearpublished, 
        length = :length, 
        readinglevel = :readinglevel, 
        seriesposition = :seriesposition, 
        fiction = :fiction, 
        genre = :genre, 
        location = :location, 
        onloan = :onloan 
        WHERE bookid = :bookid
    ");

    $stmt->execute([
        ':title' => $_POST['title'],
        ':author' => $_POST['author'],
        ':illustrator' => $_POST['illustrator'],
        ':yearpublished' => $_POST['yearpublished'],
        ':length' => $_POST['length'],
        ':readinglevel' => $_POST['readinglevel'],
        ':seriesposition' => $_POST['seriesposition'],
        ':fiction' => $_POST['fiction'],
        ':genre' => $_POST['genre'],
        ':location' => $_POST['location'],
        ':onloan' => $_POST['onloan'],
        ':bookid' => $_POST['bookid']
    ]);

    header("Location: managebooks.php");
    exit;
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

        <label>Title:</label>
        <input type="text" name="title" value="<?= $book['title']; ?>" required><br>

        <label>Author:</label>
        <input type="text" name="author" value="<?= $book['author']; ?>" required><br>

        <label>Illustrator:</label>
        <input type="text" name="illustrator" value="<?= $book['illustrator']; ?>"><br>

        <label>Year Published:</label>
        <input type="number" name="yearpublished" value="<?= $book['yearpublished']; ?>" required><br>

        <label>Length (pages):</label>
        <input type="number" name="length" value="<?= $book['length']; ?>" required><br>

        <label>Reading Level:</label>
        <input type="number" name="readinglevel" value="<?= $book['readinglevel']; ?>" required><br>

        <label>Series Position:</label>
        <input type="number" name="seriesposition" value="<?= $book['seriesposition']; ?>"><br>

        <label>Fiction (1 for Yes, 0 for No):</label>
        <input type="number" name="fiction" value="<?= $book['fiction']; ?>" required><br>

        <label>Genre:</label>
        <input type="text" name="genre" value="<?= $book['genre']; ?>" required><br>

        <label>Location:</label>
        <input type="number" name="location" value="<?= $book['location']; ?>" required><br>

        <label>On Loan (1 for Yes, 0 for No):</label>
        <input type="number" name="onloan" value="<?= $book['onloan']; ?>" required><br>

        <button type="submit" name="update">Update Book</button>
    </form>
    <br>
    <a href="managebooks.php">Back to Manage Books</a>
</body>
</html>
