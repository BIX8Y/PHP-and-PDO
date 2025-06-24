<?php
$host = 'localhost';
$dbname = 'school';
$username = 'your_username';
$password = 'your_password';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
    echo "Connected to school database.<br>";
    $pdo->exec("INSERT INTO attendance (student_name, date, status) VALUES ('Alice Johnson', '2025-06-24', 'Present')");
    $stmt = $pdo->query("SELECT * FROM attendance");
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $record) {
        echo "ID: {$record['id']} | Student: {$record['student_name']} | Date: {$record['date']} | Status: {$record['status']}<br>";
    }
    $pdo->exec("UPDATE attendance SET status = 'Late' WHERE student_name = 'Alice Johnson' AND date = '2025-06-24'");
    $pdo->exec("DELETE FROM attendance WHERE student_name = 'Alice Johnson' AND date = '2025-06-24'");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} ?>