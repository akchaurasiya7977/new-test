<?php
// Safe require path
require_once __DIR__ . '/dp.php';

// Set content type for JSON response
header('Content-Type: application/json');

// Read raw POST JSON input
$data = json_decode(file_get_contents("php://input"));

$name = $data->name ?? '';
$email = $data->email ?? '';
$password = $data->password ?? '';

if ($name && $email && $password) {
    // Hash the password securely
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare insert query
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$name, $email, $hash]);
        echo json_encode(["success" => true]);
    } catch (PDOException $e) {
        // Error, e.g. duplicate email (assuming email unique constraint in DB)
        echo json_encode(["success" => false, "error" => "Email may already be used."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Missing required fields"]);
}
?>
