<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/db.php';

if (!isset($_POST['nombre'], $_POST['email'], $_POST['password'])) {
    die("Faltan datos del formulario");
}

$nombre = trim($_POST['nombre']);
$email  = trim($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $pdo->prepare(
    "INSERT INTO users (nombre, email, password, rol)
VALUES (?, ?, ?, 'user')"
);

$stmt->execute([$nombre, $email, $password]);

header("Location: ../login.php");
exit;
