<?php
require_once '../config/admin_session.php';
require_once '../config/db.php';

$nombre = trim($_POST['nombre'] ?? '');
$email  = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$rol = $_POST['rol'] ?? 'user';

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare(
        "INSERT INTO users (nombre, email, password, rol)
    VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([$nombre, $email, $passwordHash, $rol]);

    header("Location: ../admin/users_list.php?msg=usuario_creado");
    exit;

} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        header("Location: ../admin/user_create.php?error=email_exists");
        exit;
    }

    die("Error al crear el usuario");
}
