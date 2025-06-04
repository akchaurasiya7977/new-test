<?php
$host = 'mysqlcnt';   // your docker-compose MySQL service name
$dbname = 'authdb';
$username = 'user';
$password = 'userpass';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "error" => "Database error: " . $e->getMessage()]);
    exit;
}
