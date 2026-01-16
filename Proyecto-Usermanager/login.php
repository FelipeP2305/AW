<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/validacion.js" defer></script>
</head>
<body>

<h2>Iniciar Sesión</h2>

<form action="process/procesar_login.php" method="POST" id="loginForm">

    <label>Email:</label>
    <input type="email" name="email" id="email">
    <small class="error" id="errorEmail"></small>

    <label>Contraseña:</label>
    <input type="password" name="password" id="password">
    <small class="error" id="errorPassword"></small>

    <button type="submit">Entrar</button>
</form>
<?php if (isset($_GET['error']) && $_GET['error'] === 'login'): ?>
<div class="error">
    Email o contraseña incorrectos
</div>
<?php endif; ?>

</body>
</html>
