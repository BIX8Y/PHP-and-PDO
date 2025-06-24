<?php
$host = 'localhost';
$dbname = 'library';
$username = 'your_username';
$password = 'your_password';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
    echo "Connected successfully to library database.<br>";
    $pdo->exec("INSERT INTO books (title, author, published_year, genre) VALUES ('The Great Gatsby', 'F. Scott Fitzgerald', '1925', 'Novel')");
    echo "Inserted a new book.<br>";
    $stmt = $pdo->query("SELECT * FROM books");
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $book) {
        echo "ID: {$book['id']} | Title: {$book['title']} | Author: {$book['author']} | Year: {$book['published_year']} | Genre: {$book['genre']}<br>";
    }
    $pdo->exec("UPDATE books SET genre = 'Classic Novel' WHERE title = 'The Great Gatsby'");
    echo "Updated book.<br>";
    $pdo->exec("DELETE FROM books WHERE title = 'The Great Gatsby'");
    echo "Deleted book.<br>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} ?>