<?php
include_once('connection.php');

try {
    // Insert predefined books
    $stmt = $conn->prepare("
        INSERT INTO tblbooks (title, author, illustrator, yearpublished, length, readinglevel, seriesposition, fiction, genre, location, onloan) 
        VALUES
        ('The Hobbit', 'J.R.R. Tolkien', 'Alan Lee', 1937, 310, 12, 0, 1, 'Fantasy', 101, 0),
        ('Charlotte\'s Web', 'E.B. White', 'Garth Williams', 1952, 192, 8, 0, 1, 'Children\'s', 102, 0),
        ('Harry Potter', 'J.K. Rowling', 'Mary GrandPré', 1997, 309, 10, 1, 1, 'Fantasy', 103, 1),
        ('The Giver', 'Lois Lowry', '', 1993, 240, 10, 1, 1, 'Dystopian', 104, 0),
        ('Matilda', 'Roald Dahl', 'Quentin Blake', 1988, 240, 9, 0, 1, 'Children\'s', 105, 0),
        ('The Lightning Thief', 'Rick Riordan', '', 2005, 377, 10, 1, 1, 'Fantasy', 106, 1),
        ('1984', 'George Orwell', '', 1949, 328, 12, 0, 1, 'Dystopian', 107, 0),
        ('The Hunger Games', 'Suzanne Collins', '', 2008, 374, 11, 1, 1, 'Dystopian', 108, 1),
        ('To Kill a Mockingbird', 'Harper Lee', '', 1960, 281, 12, 0, 1, 'Classic', 109, 0),
        ('Diary of a Wimpy Kid', 'Jeff Kinney', 'Jeff Kinney', 2007, 217, 8, 1, 1, 'Humor', 110, 0)
    ");
    
    $stmt->execute();
    echo "Books added successfully.";

} catch (PDOException $e) {
    echo "Error inserting books: " . $e->getMessage();
}
?>
