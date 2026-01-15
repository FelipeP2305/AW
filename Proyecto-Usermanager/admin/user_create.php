<?php
require_once '../config/admin_session.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Crear usuario</title>
<link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/validacion.js" defer></script>
</head>

<?php if (isset($_GET['error']) && $_GET['error'] === 'email_exists'): ?>
<script>
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("errorEmail").textContent =
    "Este correo ya está en uso";
});
</script>
<?php endif; ?>

<body>

<div class="form-container">
<h1>Nuevo usuario</h1>

<form action="../process/procesar_user_create.php" method="POST" id="userForm">

    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre">
    <small class="error" id="errorNombre"></small>

    <label>Email</label>
    <input type="email" name="email" id="email">
    <small class="error" id="errorEmail"></small>

    <label>Contraseña</label>
    <input type="password" name="password" id="password">
    <small class="error" id="errorPassword"></small>

    <label>Rol</label>
    <select name="rol">
        <option value="user">Usuario</option>
        <option value="admin">Administrador</option>
    </select>

    <button type="submit" class="btn">Guardar</button>
</form>

<a href="users_list.php">Volver</a>
</div>

</body>
</html>
