<?php
require 'dp.php';

$data = json_decode(file_get_contents("php://input"));

$name = $data->name ?? '';
$email = $data->email ?? '';
$password = $data->password ?? '';

if ($name && $email && $password) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$name, $email, $hash])) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Email already used"]);
    }
}
?>
