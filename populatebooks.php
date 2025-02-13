<?php
require 'connection.php';

try {
    // Insert predefined books
    $stmt = $conn->prepare("
        INSERT INTO tblbooks (title, author, illustrator, yearpublished, length, readinglevel, seriesposition, fiction, genre, location, onloan) 
        VALUES
        ('The Hobbit', 'J.R.R. Tolkien', 'Alan Lee', 1937, 310, 12, 0, 1, 'Fantasy', 101, 0),
        ('Charlotte\'s Web', 'E.B. White', 'Garth Williams', 1952, 192, 8, 0, 1, 'Children\'s', 102, 0),
        ('Harry Potter', 'J.K. Rowling', 'Mary GrandPré', 1997, 309, 10, 1, 1, 'Fantasy', 103, 0),
        ('The Giver', 'Lois Lowry', '', 1993, 240, 10, 1, 1, 'Dystopian', 104, 0),
        ('Matilda', 'Roald Dahl', 'Quentin Blake', 1988, 240, 9, 0, 1, 'Children\'s', 105, 0),
        ('The Lightning Thief', 'Rick Riordan', '', 2005, 377, 10, 1, 1, 'Fantasy', 106, 0),
        ('1984', 'George Orwell', '', 1949, 328, 12, 0, 1, 'Dystopian', 107, 0),
        ('The Hunger Games', 'Suzanne Collins', '', 2008, 374, 11, 1, 1, 'Dystopian', 108, 0),
        ('To Kill a Mockingbird', 'Harper Lee', '', 1960, 281, 12, 0, 1, 'Classic', 109, 0),
        ('Diary of a Wimpy Kid', 'Jeff Kinney', 'Jeff Kinney', 2007, 217, 8, 1, 1, 'Humor', 110, 0),
        ('Pride and Prejudice', 'Jane Austen', '', 1813, 279, 12, 0, 1, 'Classic', 111, 0),
        ('The Catcher in the Rye', 'J.D. Salinger', '', 1951, 277, 13, 0, 1, 'Classic', 112, 0),
        ('Moby-Dick', 'Herman Melville', '', 1851, 635, 12, 0, 1, 'Adventure', 113, 0),
        ('The Great Gatsby', 'F. Scott Fitzgerald', '', 1925, 180, 12, 0, 1, 'Classic', 114, 0),
        ('Little Women', 'Louisa May Alcott', '', 1868, 759, 11, 0, 1, 'Classic', 115, 0),
        ('Brave New World', 'Aldous Huxley', '', 1932, 311, 12, 0, 1, 'Dystopian', 116, 0),
        ('The Outsiders', 'S.E. Hinton', '', 1967, 192, 10, 0, 1, 'Young Adult', 117, 0),
        ('Fahrenheit 451', 'Ray Bradbury', '', 1953, 256, 12, 0, 1, 'Dystopian', 118, 0),
        ('Jane Eyre', 'Charlotte Brontë', '', 1847, 500, 12, 0, 1, 'Classic', 119, 0),
        ('The Maze Runner', 'James Dashner', '', 2009, 375, 11, 1, 1, 'Dystopian', 120, 0),
        ('Divergent', 'Veronica Roth', '', 2011, 487, 11, 1, 1, 'Dystopian', 121, 0),
        ('Percy Jackson: The Sea of Monsters', 'Rick Riordan', '', 2006, 279, 10, 2, 1, 'Fantasy', 122, 0),
        ('The Fault in Our Stars', 'John Green', '', 2012, 313, 12, 0, 1, 'Romance', 123, 0),
        ('The Book Thief', 'Markus Zusak', '', 2005, 584, 12, 0, 1, 'Historical', 124, 0),
        ('Ender\'s Game', 'Orson Scott Card', '', 1985, 324, 12, 1, 1, 'Sci-Fi', 125, 0),
        ('The Chronicles of Narnia', 'C.S. Lewis', '', 1950, 768, 9, 1, 1, 'Fantasy', 126, 0),
        ('The Secret Garden', 'Frances Hodgson Burnett', '', 1911, 331, 9, 0, 1, 'Children\'s', 127, 0),
        ('Anne of Green Gables', 'L.M. Montgomery', '', 1908, 320, 9, 0, 1, 'Classic', 128, 0),
        ('The Alchemist', 'Paulo Coelho', '', 1988, 208, 12, 0, 1, 'Philosophical', 129, 0),
        ('War and Peace', 'Leo Tolstoy', '', 1869, 1225, 14, 0, 1, 'Historical', 130, 0),
        ('Crime and Punishment', 'Fyodor Dostoevsky', '', 1866, 671, 14, 0, 1, 'Psychological', 131, 0),
        ('Frankenstein', 'Mary Shelley', '', 1818, 280, 12, 0, 1, 'Horror', 132, 0),
        ('Dracula', 'Bram Stoker', '', 1897, 418, 12, 0, 1, 'Horror', 133, 0),
        ('Dune', 'Frank Herbert', '', 1965, 412, 14, 1, 1, 'Sci-Fi', 134, 0),
        ('The Stand', 'Stephen King', '', 1978, 1153, 14, 0, 1, 'Horror', 135, 0),
        ('The Green Mile', 'Stephen King', '', 1996, 432, 14, 0, 1, 'Drama', 136, 0),
        ('A Game of Thrones', 'George R.R. Martin', '', 1996, 694, 15, 1, 1, 'Fantasy', 137, 0),
        ('The Road', 'Cormac McCarthy', '', 2006, 287, 14, 0, 1, 'Post-Apocalyptic', 138, 0),
        ('The Martian', 'Andy Weir', '', 2011, 369, 14, 0, 1, 'Sci-Fi', 139, 0),
        ('Ready Player One', 'Ernest Cline', '', 2011, 374, 14, 1, 1, 'Sci-Fi', 140, 0),
        ('It', 'Stephen King', '', 1986, 1138, 15, 0, 1, 'Horror', 141, 0),
        ('The Girl with the Dragon Tattoo', 'Stieg Larsson', '', 2005, 465, 14, 0, 1, 'Mystery', 142, 0)
    ");
    
    $stmt->execute();
    echo "Books added successfully.";

} catch (PDOException $e) {
    echo "Error inserting books: " . $e->getMessage();
}
?>
