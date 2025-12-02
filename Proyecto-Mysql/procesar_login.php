<?php
session_start();
include "conexion.php";
$usuario = $_POST['usuario'];
$password = $_POST['password'];
// Consulta segura
$stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
 $stmt->bind_result($id, $hash);
 $stmt->fetch();
 if (password_verify($password, $hash)) {
 $_SESSION['usuario'] = $usuario;
 header("Location: bienvenida.php");
 exit;
 } else {
 echo "<h1>Contraseña incorrecta ❌</h1>";
 echo "<p><a href='login.php'>Volver a intentar</a></p>";
 }
} else {
 echo "<h1>Usuario no encontrado ❌</h1>";
 echo "<p><a href='registro.php'>Registrarse</a></p>";
}
$stmt->close();
$conn->close();