<?php
require_once '../config/admin_session.php';
require_once '../config/db.php';

$id     = $_POST['id'];
$nombre = trim($_POST['nombre']);
$email  = trim($_POST['email']);
$rol    = $_POST['rol'];

$stmt = $pdo->prepare(
    "UPDATE users SET nombre=?, email=?, rol=? WHERE id=?"
);
$stmt->execute([$nombre, $email, $rol, $id]);

header("Location: ../admin/users_list.php");
exit;
