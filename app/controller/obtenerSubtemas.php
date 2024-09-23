<?php
function listarSubtemas($idTema) {
    $host = 'localhost'; // Cambia esto si tu base de datos está en otro host
    $user = 'root'; // Reemplaza con tu usuario de la base de datos
    $password = '12345'; // Reemplaza con tu contraseña de la base de datos
    $database = 'db_tradexa'; // Nombre de la base de datos
    
    $conn = new mysqli($host, $user, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener subtemas
    $sql = "SELECT nombre FROM subtemas WHERE tema_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idTema);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si hay resultados
    if ($resultado->num_rows > 0) { // {{ edit_1 }}
        // Listar subtemas
        echo '<ul id="lista-subtemas">';
        while ($fila = $resultado->fetch_assoc()) {
            echo '<li>' . htmlspecialchars($fila['nombre']) . '</li>';
        }
        echo '</ul>';
    } else { // {{ edit_2 }}
        echo '<p>No se encontraron subtemas.</p>'; // Mensaje si no hay resultados
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
}
?>
