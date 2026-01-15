<?php
require_once '../config/db.php';

$nombre = trim($_POST['nombre'] ?? '');
$email  = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare(
        "INSERT INTO users (nombre, email, password, rol)
    VALUES (?, ?, ?, 'user')"
    );
    $stmt->execute([$nombre, $email, $passwordHash]);

    header("Location: ../login.php?msg=registered");
    exit;

} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        header("Location: ../register.php?error=email_exists");
        exit;
    }

    die("Error inesperado");
}
