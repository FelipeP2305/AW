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
     echo "<!DOCTYPE html>
     <html lang='es'>
     <head>
     <meta charset='UTF-8'>
     <title>Error - Inicio</title>
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
} else {
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
    <meta charset='UTF-8'>
    <title>Error - Usuario no encontrado</title>
    <link rel='stylesheet' href='CSS/error.css'>
    </head>
    <body>
    <div class=contenedor-error>
    <h1>❌Usuario no existe❌</h1>
    <p>intentelo otra vez</p>
    <p><a href='login.php'>Volver a intentar ⬅️</a></p
    </div>
    </body>
    </html>";
}
$stmt->close();
$conn->close();
