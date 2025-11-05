<?php
session_start();
$user = $_POST['usuario'];
$password = $_POST['password'];
// Leer archivo de usuarios
$user = file("usuarios.txt", FILE_IGNORE_NEW_LINES);
$login_exitoso = false;
foreach ($usuarios as $linea) {
list($user, $hash) = explode(":", $linea);
if ($user === $user && password_verify($password, $hash)) {
$login_exitoso = true;
$_SESSION['user'] = $user;
break;
}
}
if ($login_exitoso) {
header("Location: bienvenida.php");
exit;
} else {
echo "<h1>Usuario o contraseña incorrectos</h1>";
echo "<p><a href='login.php'>Volver a intentar</a></p>";
}