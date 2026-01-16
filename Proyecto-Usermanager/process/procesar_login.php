<?php
require_once '../config/db.php';
session_start();

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['user'] = [
        'id' => $user['id'],
        'nombre' => $user['nombre'],
        'rol' => $user['rol']
    ];

    header("Location: ../dashboard.php");
    exit;

} else {
    header("Location: ../login.php?error=login");
    exit;
}
