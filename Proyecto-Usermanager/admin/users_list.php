<?php
require_once '../config/admin_session.php';
require_once '../config/db.php';

$stmt = $pdo->query("SELECT id, nombre, email, rol FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Gestión de usuarios</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<?php if (isset($_GET['msg'])): ?>
<div class="success">
<?php
if ($_GET['msg'] === 'usuario_actualizado') echo "Usuario actualizado correctamente";
if ($_GET['msg'] === 'usuario_creado') echo "Usuario creado correctamente";
if ($_GET['msg'] === 'deleted') echo "Usuario eliminado correctamente";
?>
</div>
<?php endif; ?>

<body>

<div class="container">
<h1>Gestión de usuarios</h1>

<a class="btn" href="user_create.php">+ Nuevo usuario</a>

<table>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Email</th>
<th>Rol</th>
<th>Acciones</th>
</tr>

<?php foreach ($users as $u): ?>
<tr>
<td><?= $u['id'] ?></td>
<td><?= htmlspecialchars($u['nombre']) ?></td>
<td><?= htmlspecialchars($u['email']) ?></td>
<td><?= $u['rol'] ?></td>
<td>
<a href="user_edit.php?id=<?= $u['id'] ?>">Editar</a>
<a href="user_delete.php?id=<?= $u['id'] ?>"
onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
Eliminar
</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<a class="btn" href="../dashboard.php">Volver</a>
</div>

</body>
</html>
