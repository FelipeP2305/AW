<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validacion.js" defer></script>
</head>
<body>

<h2>Iniciar Sesión</h2>

<form action="procesar_login.php" method="POST" id="formLogin">
    <label>Email:</label>
    <input type="email" name="email" id="loginEmail">

    <label>Contraseña:</label>
    <input type="password" name="password" id="loginPassword">

    <button type="submit">Entrar</button>
</form>

<div id="erroresLogin" style="color:red;"></div>

</body>
</html>
