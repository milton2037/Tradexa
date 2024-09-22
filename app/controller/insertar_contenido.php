<?php
// insertar_contenido.php

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "12345", "db_tradexa");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = mysqli_real_escape_string($conn, $_POST['titulo']); // Obtener el título
    $informacion = mysqli_real_escape_string($conn, $_POST['informacion']);

    // Escapar cada subtema seleccionado
    $subtemas = $_POST['subtema_id']; // Esto es un array
    $subtemas_escapados = array_map(function($subtema) use ($conn) {
        return mysqli_real_escape_string($conn, $subtema);
    }, $subtemas);

    // Verificar si las claves existen en el array $_POST
    $subtema_id = isset($_POST['subtema_id']) ? implode(',', $subtemas_escapados) : ''; // Obtener el id del subtema como string
    $informacion = isset($_POST['informacion']) ? $informacion : ''; // Cambiar 'titulo' a 'informacion'

    // Verificar el contenido de $subtema_id
    var_dump($subtema_id); // Agrega esta línea para depuración

    // Cambiar la consulta SQL para reflejar la estructura de la tabla
    $sql = "INSERT INTO contenido (titulo, subtema_id, informacion) VALUES ('$titulo', '$subtema_id', '$informacion')"; // Incluir título en la consulta

    if ($conn->query($sql) === TRUE) {
        $contenido_id = $conn->insert_id; // Obtener el ID del contenido insertado
        foreach ($subtemas_escapados as $subtema) {
            $sql_subtema = "INSERT INTO contenido_subtemas (contenido_id, subtema_id) VALUES ('$contenido_id', '$subtema')";
            $conn->query($sql_subtema);
        }
        echo "Nuevo contenido insertado con éxito"; // Mensaje actualizado
        header("Location: ../../app/view/busquedas.php"); // Redirigir a busquedas.php
        exit(); // Asegurarse de que no se ejecute más código
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Mensaje de error detallado
    }

    $conn->close();
}
?>