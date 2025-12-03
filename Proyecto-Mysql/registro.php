<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="CSS/register.css">
</head>
<body>
    <h1>Registro de usuario</h1>
    <form action="procesar_registro.php" method="post">
    <label>Usuario:</label>
    <input type="text" name="usuario" required><br><br>
    <label>Contraseña:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
    <div class="logo-container">
    <img src="images/Emol.gif" alt="Logo"> </div>
</body>
</html>
