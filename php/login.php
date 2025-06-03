<?php
require 'dp.php';

$data = json_decode(file_get_contents("php://input"));

$email = $data->email ?? '';
$password = $data->password ?? '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    session_start();
    $_SESSION['user'] = $user['name'];
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>
