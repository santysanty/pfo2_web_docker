-- 1. Asegurarse de usar la base de datos correcta
USE pfo2_db;

-- 2. Crear la tabla 'productos' si no existe. Esto evita errores si ya fue creada por PHP.
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255),
    stock INT
);

-- 3. Insertar datos de prueba
INSERT INTO productos (nombre, descripcion, stock) VALUES 
('Servidor NGINX', 'Contenedor base para la práctica', 1),
('Base de Datos MariaDB', 'Contenedor persistente de datos', 50),
('Proyecto Web PFO2', 'Aplicación de prueba para linkeo', 10)
ON DUPLICATE KEY UPDATE id=id; -- Esto evita errores si intentas ejecutar el script dos veces.