<?php
require "includes/auth.php";
require_login(); // obliga a estar logado
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_nombre']); ?></h2>

<p>Has iniciado sesión correctamente.</p>

<!-- Mostrar zona Admin si el usuario es admin -->
<?php if ($_SESSION['user_rol'] === 'admin'): ?>
    <a href="admin/users_list.php">Gestión de Usuarios (Admin)</a>
<?php endif; ?>

<br><br>
<a href="logout.php">Cerrar sesión</a>

</body>
</html>
