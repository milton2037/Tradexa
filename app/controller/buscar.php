<?php
// Incluir la conexión a la base de datos
require_once('../../db.php'); // Asegúrate de que la ruta a tu archivo de conexión sea correcta

// Verificar si se envió la búsqueda
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query'])) {
    // Escapar la entrada del usuario para evitar inyecciones SQL
    $query = $conn->real_escape_string(trim($_POST['query']));

    // Verificar que la búsqueda no esté vacía
    if (!empty($query)) {
        // Consultar la base de datos en las tablas temas, subtemas y contenido
        $sql = "
            SELECT 'tema' AS tipo, id, titulo AS resultado, descripcion
            FROM temas
            WHERE titulo LIKE '%$query%' OR descripcion LIKE '%$query%'
            
            UNION

            SELECT 'subtema' AS tipo, id, subtitulo AS resultado, descripcion
            FROM subtemas
            WHERE subtitulo LIKE '%$query%' OR descripcion LIKE '%$query%'

            UNION

            SELECT 'contenido' AS tipo, id, informacion AS resultado, informacion AS descripcion
            FROM contenido
            WHERE informacion LIKE '%$query%'
        ";

        // Ejecutar la consulta
        $result = $conn->query($sql);

        // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
            // Mostrar los resultados
            echo "<h2>Resultados de búsqueda:</h2>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                // Reemplazar puntos con un contenedor que tenga un margen
                $descripcion = nl2br(str_replace('.', '.<div style="margin-bottom: 0.1px;"></div>', $row['descripcion']));
                echo "<li><h3>" . $row['resultado'] . "</h3> <br>" . $descripcion . "</li>";
            }
            echo "</ul>";
        } else {
            // Si no hay resultados
            echo "<p>No se encontraron resultados para <strong>'$query'</strong>.</p>";
        }
    } else {
        // Mensaje de error si el campo de búsqueda está vacío
        echo "<p>Por favor, ingrese un término de búsqueda.</p>";
    }
} else {
    // Redirigir si se accede al archivo sin enviar el formulario
    header('Location: ../index.php');
}
?>
