<?php
$host = 'dp';  // Docker me container name ya 'localhost'
$dbname = 'authdb';
$user = 'user';
$pass = 'userpass';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Exceptions for errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Use native prepares if possible
];

try {
    $pdo = new PDO('mysql:host=mysql-dp;dbname=authdb', 'user', 'userpass', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    // echo "DB connection successful!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

