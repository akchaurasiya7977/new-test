<?php
$host = 'db';  // Docker service name for MySQL container, matches `depends_on: db`
$dbname = 'authdb';
$user = 'user';
$pass = 'userpass';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,      
    PDO::ATTR_EMULATE_PREPARES   => false,                 
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "DB connection successful!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
