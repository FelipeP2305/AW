<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include "conexion.php";
$usuario = $_POST['usuario'];
$password = $_POST['password'];
// Encriptar contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);
// Preparar consulta segura
$stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
$stmt->bind_param("ss", $usuario, $hash);
if ($stmt->execute()) {
 echo "<h1>Usuario registrado correctamente 🎉</h1>";
 echo "<p><a href='login.php'>Iniciar sesión</a></p>";
} else {
 echo "<h1>Error: el usuario ya existe</h1>";
 echo "<p><a href='registro.php'>Volver al registro</a></p>";
}
$stmt->close();
$conn->close();
