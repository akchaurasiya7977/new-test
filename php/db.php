<?php
$host = 'mysqlcnt';   // docker-compose service name jo mysql ka hostname bhi hai
$dbname = 'authdb';
$username = 'root';
$password = 'pwd@12345';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
