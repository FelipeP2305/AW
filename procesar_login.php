<?php
session_start();
$usuario = $_POST['usuario'];
$password = $_POST['password'];
// Leer archivo de usuarios
$usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);
$login_exitoso = false;
foreach ($usuarios as $linea) {
list($user, $hash) = explode(":", $linea);
if ($user === $usuario && password_verify($password, $hash)) {
$login_exitoso = true;
$_SESSION['usuario'] = $usuario;
break;
}
}
if ($login_exitoso) {
header("Location: bienvenida.php");
exit;
} else {
echo "<!DOCTYPE html>
<html lang='es'>
<head>
<meta charset='UTF-8'>
<title>Error - Registro</title>
<link rel='stylesheet' href='CSS/error.css'>
</head>
<body>
<div class=contenedor-error>
<h1>❌Usuario o contraseña incorrectos❌</h1>
<p>intentelo otra vez</p>
<p><a href='login.php'>Volver a intentar ⬅️</a></p
</div>
</body>
</html>";
}
