<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="CSS/register.css">
</head>
<body>
    <div class="login-container">
    <h1>Registro</h1>
    <form action="procesar_registro.php" method="post">
    <label>Usuario:</label>
    <input type="text" name="usuario" required><br><br>
    <label>Contraseña:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Registrarse</button>
</form>
    <div class="logo-container">
        <img src="images/Pachi.gif" alt="Logo"> </div>
<p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
</div>
</body>
</html>
