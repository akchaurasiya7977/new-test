<?php
try {
    $pdo = new PDO('mysql:host=db;dbname=authdb', 'user', 'userpass');
    echo "DB connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
