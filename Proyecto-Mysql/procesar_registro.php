<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include "conexion.php";

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$stmt_check = $conn->prepare("SELECT usuario FROM usuarios WHERE usuario = ?");
$stmt_check->bind_param("s", $usuario);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <title>Error - Registro</title>
        <link rel='stylesheet' href='CSS/error.css'>
    </head>
    <body>
    <div class=contenedor-error>
            <h1>❌Lo sentimos, el usuario '$usuario' ya está registrado y no está disponible❌</h1>
            <p>intentelo otra vez</p>
            <p><a href='registro.php'>Volver al registro ⬅️</a></p>
    </div>
    </body>
    </html>
    ";
} else {

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt_insert = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
    $stmt_insert->bind_param("ss", $usuario, $hash);

    if ($stmt_insert->execute()) {
        echo "
        <!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Registro Completado! </title>
                <link rel='stylesheet' href='CSS/confirmar.css'>
            </head>
        <body>
            <div class='container'>
            <img src='images/Emol.gif' alt='Emolga registrado' class='centered-gif'>
            <h1 class='message-success'>Usuario registrado correctamente</h1>
            <p><a href='login.php'>Iniciar sesión ⬅️</a></p>
            </div>
        </body>
        </html>";
    } else {
        echo "<h1>Error al intentar registrar el usuario.</h1>";
        echo "<p><a href='registro.php'>Volver al registro</a></p>";
    }
    $stmt_insert->close();
}

$stmt_check->close();
$conn->close();

?>
