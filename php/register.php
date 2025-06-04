<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';

// Get form data from POST (Form submission method="POST")
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? ''; 
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Validate input
if ($firstname && $lastname && $email && $phone && $password && $confirm_password) {
    if ($password !== $confirm_password) {
        echo json_encode(["success" => false, "error" => "Passwords do not match"]);
        exit;
    }

    $fullname = $firstname . ' ' . $lastname;
    $hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$fullname, $email, $phone, $hash]);
        echo json_encode(["success" => true]);
    } catch (PDOException $e) {
        // Check for duplicate entry error (MySQL error code 1062)
        if (str_contains($e->getMessage(), '1062')) {
            echo json_encode(["success" => false, "error" => "Email or phone already exists"]);
        } else {
            echo json_encode(["success" => false, "error" => "Database error: " . $e->getMessage()]);
        }
    }
} else {
    echo json_encode(["success" => false, "error" => "Missing required fields"]);
}
?>
