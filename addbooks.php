<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Books</title>
</head>
<body>
    <h1>Add a Book</h1>
    <form action="books.php" method="post">
        Book ID*: <input type="text" name="bookid" required><br>
        Title*: <input type="text" name="title" required><br>
        Author*: <input type="text" name="author" required><br>
        
        Illustrator: <input type="text" name="illustrator"><br>
        Year Published: <input type="number" name="yearpublished"><br>
        Length (pages): <input type="number" name="length"><br>
        Reading Level: <input type="number" name="readinglevel"><br>
        Series Position: <input type="number" name="seriesposition"><br>
        Fiction (Yes/No): <input type="text" name="fiction"><br>
        Genre: <input type="text" name="genre"><br>
        Location: <input type="number" name="location"><br>
        On Loan (1 for Yes, 0 for No): <input type="number" name="onloan"><br>
        
        <input type="submit" value="Add Book">
    </form>
    <br>
    <a href="mainbooks.php">Back to Main Page</a>
</body>
</html>
