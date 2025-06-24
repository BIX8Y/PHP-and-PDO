<?php
$host = 'localhost';
$dbname = 'video_store';
$username = 'your_username';
$password = 'your_password';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
    echo "Connected to video_store database.<br>";
    $pdo->exec("INSERT INTO movies (title, director, release_year, available) VALUES ('Inception', 'Christopher Nolan', '2010', 1)");
    $stmt = $pdo->query("SELECT * FROM movies");
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $movie) {
        $availability = $movie['available'] ? 'Available' : 'Not Available';
        echo "ID: {$movie['id']} | Title: {$movie['title']} | Director: {$movie['director']} | Year: {$movie['release_year']} | $availability<br>";
    }
    $pdo->exec("UPDATE movies SET available = 0 WHERE title = 'Inception'");
    $pdo->exec("DELETE FROM movies WHERE title = 'Inception'");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} ?>