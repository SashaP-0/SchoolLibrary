<?php
include_once('connection.php');

$memberno = 1; 
$stmt = $conn->prepare("SELECT b.title, l.dateborrows, l.returned FROM tblloans l JOIN tblbooks b ON l.bookid = b.bookid WHERE l.memberno = :memberno AND l.returned = 0");
$stmt->bindValue(':memberno', $memberno);
$stmt->execute();
$borrowedBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['returnBook'])) {
    $loanid = $_POST['loanid'];

    $stmt = $conn->prepare("UPDATE tblloans SET returned = 1 WHERE loanid = :loanid");
    $stmt->bindValue(':loanid', $loanid, PDO::PARAM_INT);
    $stmt->execute();

    $stmt = $conn->prepare("UPDATE tblbooks SET onloan = 0 WHERE bookid IN (SELECT bookid FROM tblloans WHERE loanid = :loanid)");
    $stmt->bindValue(':loanid', $loanid, PDO::PARAM_INT);
    $stmt->execute();

    echo "You have successfully returned the book!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Borrowed Books</title>
</head>
<body>
    <h1>Your Borrowed Books</h1>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Date Borrowed</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($borrowedBooks)): ?>
            <?php foreach ($borrowedBooks as $book): ?>
                <tr>
                    <td><?= $book['title']; ?></td>
                    <td><?= $book['dateborrows']; ?></td>
                    <td>
                        <form method="post" action="" style="display:inline;">
                            <input type="hidden" name="loanid" value="<?= $book['loanid']; ?>">
                            <button type="submit" name="returnBook">Return</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No borrowed books.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
