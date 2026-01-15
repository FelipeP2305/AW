<?php
require_once '../config/admin_session.php';
require_once '../config/db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

header("Location: ../admin/users_list.php");
exit;
