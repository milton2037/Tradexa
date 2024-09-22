<?php
// Crear la conexión a la base de datos
$host = 'localhost'; // Cambia esto si tu base de datos está en otro host
$user = 'root'; // Reemplaza con tu usuario de la base de datos
$password = '12345'; // Reemplaza con tu contraseña de la base de datos
$database = 'db_tradexa'; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
// echo "Conectado exitosamente";

// Exportar la conexión para usarla en otros archivos
// ... código para exportar la conexión si es necesario ...
?>