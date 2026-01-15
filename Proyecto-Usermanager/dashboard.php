<?php
require_once 'config/session.php';

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
<h1>Bienvenido, <?= htmlspecialchars($user['nombre']) ?></h1>

<p>
Has iniciado sesión como:
<strong><?= htmlspecialchars($user['rol']) ?></strong>
</p>

<div class="dashboard-actions">

<a class="btn" href="logout.php">Cerrar sesión</a>

<?php if ($user['rol'] === 'admin'): ?>
<a class="btn admin" href="admin/users_list.php">
Gestión de usuarios
</a>
<?php endif; ?>

</div>
</div>

</body>
</html>
