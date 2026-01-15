-- Creación de base de datos --
CREATE DATABASE IF NOT EXISTS usermanager;

-- Usar base de datos --
USE usermanager;

-- Creación de tabla usuarios --
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM('admin','user') DEFAULT 'user'
);
 -- Cambiar rol de usuario a admin --
UPDATE users SET rol = 'admin' WHERE id = '1';