<?php
$host = 'localhost';
$dbname = 'company_db';
$username = 'your_username';
$password = 'your_password';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
    echo "Connected to company_db database.<br>";
    $pdo->exec("INSERT INTO timelogs (employee_name, log_date, log_time, type) VALUES ('John Smith', '2025-06-24', '09:00:00', 'IN')");
    $stmt = $pdo->query("SELECT * FROM timelogs");
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $log) {
        echo "ID: {$log['id']} | Employee: {$log['employee_name']} | Date: {$log['log_date']} | Time: {$log['log_time']} | Type: {$log['type']}<br>";
    }
    $pdo->exec("UPDATE timelogs SET type = 'OUT' WHERE employee_name = 'John Smith' AND log_date = '2025-06-24' AND type = 'IN'");
    $pdo->exec("DELETE FROM timelogs WHERE employee_name = 'John Smith' AND log_date = '2025-06-24'");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} ?>