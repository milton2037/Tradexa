<?php
// Conexión a la base de datos
$host = 'localhost'; // Cambia esto si tu base de datos está en otro host
$user = 'root'; // Reemplaza con tu usuario de la base de datos
$password = '12345'; // Reemplaza con tu contraseña de la base de datos
$database = 'db_tradexa'; // Nombre de la base de datos

$conn = new mysqli($host, $user, $password, $database); // Cambiar $pass y $db por $password y $database

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del tema desde la solicitud
$idTema = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar el contenido del tema usando declaraciones preparadas
$stmtTema = $conn->prepare("SELECT * FROM temas WHERE id = ?");
if (!$stmtTema) {
    die("Error en la preparación de la consulta: " . $conn->error);
}
$stmtTema->bind_param("i", $idTema);
$stmtTema->execute();
$resultTema = $stmtTema->get_result();

if ($resultTema->num_rows > 0) {
    $tema = $resultTema->fetch_assoc();
    echo "<h1>" . $tema['titulo'] . "</h1>";
    echo "<p>" . nl2br(isset($tema['descripcion']) && !empty($tema['descripcion']) ? $tema['descripcion'] : 'Contenido no disponible') . "</p>"; // Agregado nl2br

    // Consultar contenido relacionado usando declaraciones preparadas
    $stmtRelacionado = $conn->prepare("SELECT * FROM subtemas WHERE tema_id = ?");
    if (!$stmtRelacionado) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    $stmtRelacionado->bind_param("i", $idTema);
    $stmtRelacionado->execute();
    $resultRelacionado = $stmtRelacionado->get_result();

    if ($resultRelacionado->num_rows > 0) {
        echo "<h5>Contenido Relacionado:</h5>";
        while ($relacionado = $resultRelacionado->fetch_assoc()) {
            echo "<h3>" . (isset($relacionado['subtitulo']) ? $relacionado['subtitulo'] : 'Título no disponible') . "</h3>"; // Mostrar título del subtema
            echo "<p>" . nl2br(isset($relacionado['descripcion']) && !empty($relacionado['descripcion']) ? $relacionado['descripcion'] : 'Contenido no disponible') . "</p>"; // Agregado nl2br
        }
    } else {
        echo "<p>No hay contenido relacionado.</p>";
    }
} else {
    echo "<p>Tema no encontrado.</p>";
}

// Cerrar conexión
$conn->close();
?>
