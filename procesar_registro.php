<?php
include "plugins/comprobar_disponible.php";

$usuario = $_POST['usuario'];
$password = $_POST['password'];
// Guardamos en un archivo de texto (usuario:contraseña encriptada)
if (usuario_disponible($usuario)) {
    // Integracion de HTMl en PHP
    echo "
    <!DOCTYPE html>
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
    exit;
}
$file = fopen("usuarios.txt", "a");
fwrite($file, $usuario . ":" . password_hash($password, PASSWORD_DEFAULT) . "\n");
fclose($file);
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
