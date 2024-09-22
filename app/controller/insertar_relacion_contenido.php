<?php
// insertar_contenido.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "12345", "db_tradexa");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verificar si las claves existen en el array $_POST
    $tema_id = isset($_POST['tema_id']) ? mysqli_real_escape_string($conn, $_POST['tema_id']) : ''; // Cambiar 'subtema_id' a 'tema_id'
    $contenido_id = isset($_POST['contenido_id']) ? mysqli_real_escape_string($conn, $_POST['contenido_id']) : ''; // Cambiar 'informacion' a 'contenido_id'

    // Validar que tema_id no esté vacío
    if (empty($tema_id)) {
        echo "<script>alert('Error: tema_id no puede estar vacío.');</script>"; // Mensaje de alerta
        echo "<script>window.history.back();</script>"; // Regresar a la página anterior
        exit();
    }

    // Verificar si la relación ya existe
    $checkSql = "SELECT * FROM tema_contenido WHERE tema_id = '$tema_id' AND contenido_id = '$contenido_id'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        echo "<script>alert('Error: La relación ya existe.');</script>"; // Mensaje de alerta
        echo "<script>window.history.back();</script>"; // Regresar a la página anterior
        exit();
    }

    // Cambiar la consulta SQL para reflejar la estructura de la tabla tema_contenido
    $sql = "INSERT INTO tema_contenido (tema_id, contenido_id) VALUES ('$tema_id', '$contenido_id')"; // Actualizar la consulta SQL

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Nuevo contenido insertado con éxito');</script>"; // Mensaje de éxito
        echo "<script>window.location.href='../../app/view/busquedas.php';</script>"; // Redirigir a busquedas.php
        exit();
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>"; // Mensaje de error detallado
        echo "<script>window.history.back();</script>"; // Regresar a la página anterior
    }

    $conn->close();
}
?>