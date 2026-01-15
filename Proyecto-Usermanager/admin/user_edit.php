<?php
require_once '../config/admin_session.php';
require_once '../config/db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: users_list.php");
    exit;
}

$stmt = $pdo->prepare("SELECT nombre, email, rol FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Usuario no encontrado.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar usuario</title>
<link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/validacion.js" defer></script>
</head>

<?php if (isset($_GET['error']) && $_GET['error'] === 'email_exists'): ?>
<script>
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("errorEmail").textContent =
    "Este correo ya está en uso por otro usuario";
});
</script>
<?php endif; ?>

<body>

<div class="form-container">
<h1>Editar usuario</h1>

<form action="../process/procesar_edit.php" method="POST" id="userForm">
    <input type="hidden" name="id" value="<?= $id ?>">

    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre"
           value="<?= htmlspecialchars($user['nombre']) ?>">
    <small class="error" id="errorNombre"></small>

    <label>Email</label>
    <input type="email" name="email" id="email"
           value="<?= htmlspecialchars($user['email']) ?>">
    <small class="error" id="errorEmail"></small>

    <label>Rol</label>
    <select name="rol">
        <option value="user" <?= $user['rol']=='user'?'selected':'' ?>>Usuario</option>
        <option value="admin" <?= $user['rol']=='admin'?'selected':'' ?>>Administrador</option>
    </select>

    <button type="submit" class="btn">Actualizar</button>
</form>

<a href="users_list.php">Volver al listado</a>
</div>

</body>
</html>
