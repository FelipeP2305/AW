<?php
// Este código comprueba si existe un usuario ya creado
function usuario_disponible($usuario) {
    if (!file_exists("usuarios.txt")) return false;
    $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);
    foreach ($usuarios as $linea) {
        list($user, $hash) = explode(":", $linea);
        if ($user === $usuario) {
            return true;
        }
    }
    return false;
}
?>

