<?php
session_start();if (!isset($_SESSION['usuario'])) {
header("Location: login.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio Exitoso!</title>
    <link rel="stylesheet" href="CSS/bienvenida.css">
</head>
<body>
    <div class="main-container">
        <div class="welcome-box">
            <img src="images/Crossfade.gif" alt="Welcome" class="welcome-gif">
        </div>
    <h1 class="welcome-text">🌟Bienvenido a mi pagina web, <?php echo $_SESSION['usuario']; ?> 🎉🌟</h1>
    <div class="status-section">
    <p class="status-message">Has iniciado sesión correctamente.</p>
    <img src="images/Pachi.gif" alt="Pachirisu" class="pachi top-left">
    <img src="images/Pachi2.gif" alt="Pachirisu" class="pachi top-right">
    <img src="images/Pachi.gif" alt="Pachirisu" class="pachi bottom-left">
    <img src="images/Pachi2.gif" alt="Pachirisu" class="pachi bottom-right">
    </div>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
