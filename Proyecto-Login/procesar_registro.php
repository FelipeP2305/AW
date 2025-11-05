<?php
$user = $_POST['user'];
$password = $_POST['password'];

// Guardamos en un texto (user:password encriptada)
$file = fopen("usuarios.txt", "a");
fwrite($file, $usuario . ":" . password_hash($password, PASSWORD_DEFAULT) . "\n");
fclose($file);
echo "<h1>Usuario registrado correctamente</h1>";
echo "<p><a href='login.php'>Iniciar sesión</a></p>";