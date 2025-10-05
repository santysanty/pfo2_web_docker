<?php

// Configuración de la conexión a la base de datos (MariaDB)
$servername = "db_server"; // Nombre del servicio en docker-compose.yml
$username = "app_user";
$password = "app_password";
$dbname = "pfo2_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    // Si falla, el problema es el 'hostname' o la red.
    die("<h1>❌ Error de conexión a la base de datos: " . $conn->connect_error . "</h1>");
}

// =======================================================
// LÓGICA DE INICIALIZACIÓN: Crear la tabla si no existe
// =======================================================
function check_and_create_table($conn) {
    $table_name = 'productos';
    
    // 1. Consulta para verificar si la tabla existe
    $result = $conn->query("SHOW TABLES LIKE '$table_name'");

    // 2. Si la tabla NO existe (la primera vez que lo ejecutas), la creamos e insertamos datos
    if ($result->num_rows == 0) {
        echo "<h2 style='color: orange;'>⚠️ Tabla '$table_name' no encontrada. Creando tabla e insertando datos iniciales...</h2>";
        
        // Comando SQL para crear la tabla
        $sql_create = "CREATE TABLE $table_name (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(255) NOT NULL,
            descripcion VARCHAR(255),
            stock INT
        )";

        if ($conn->query($sql_create) === TRUE) {
            echo "<h3 style='color: green;'>✅ Tabla '$table_name' creada exitosamente.</h3>";

            // Comando SQL para insertar datos de prueba
            $sql_insert = "INSERT INTO $table_name (nombre, descripcion, stock) VALUES 
                ('Servidor NGINX', 'Contenedor base para la práctica', 1),
                ('Base de Datos MariaDB', 'Contenedor persistente de datos', 50),
                ('Proyecto Web PFO2', 'Aplicación de prueba para linkeo', 10)";
            
            $conn->query($sql_insert);
            echo "<h3 style='color: green;'>✅ Datos iniciales insertados.</h3>";

        } else {
            echo "<h3 style='color: red;'>❌ Error al crear la tabla: " . $conn->error . "</h3>";
            return false;
        }
    }
    return true;
}

// Ejecutar la función de chequeo/creación
if (!check_and_create_table($conn)) {
    die("No se pudo inicializar la base de datos.");
}

// =======================================================
// LÓGICA DE LECTURA (Línea 25 que antes fallaba)
// =======================================================
echo "<h1 style='color: blue;'>✅ Conexión a DB Exitosa: Infraestructura Docker Operativa.</h1>";

$sql = "SELECT id, nombre, descripcion, stock FROM productos";
$result = $conn->query($sql); // Esta línea ya no fallará

if ($result->num_rows > 0) {
    echo "<h2>Listado de Productos:</h2>";
    echo "<table border='1' style='width: 50%; text-align: left;'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Stock</th></tr>";
    
    // Salida de datos por cada fila
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["descripcion"] . "</td>";
        echo "<td>" . $row["stock"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();

?>