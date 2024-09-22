<?php
// insertar_subtema.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "12345", "db_tradexa");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verificar si las claves existen en el array $_POST
    $tema_id = isset($_POST['tema_id']) ? mysqli_real_escape_string($conn, $_POST['tema_id']) : ''; // Obtener el id del tema
    $titulo = isset($_POST['subtitulo']) ? mysqli_real_escape_string($conn, $_POST['subtitulo']) : ''; // Escapar entrada
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conn, $_POST['descripcion']) : ''; // Escapar entrada

    // Cambiar la tabla de 'temas' a 'subtemas' y agregar tema_id
    $sql = "INSERT INTO subtemas (tema_id, subtitulo, descripcion) VALUES ('$tema_id', '$titulo', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo subtema insertado con éxito"; // Mensaje actualizado
        header("Location: ../../app/view/busquedas.php"); // Redirigir a busquedas.php
        exit(); // Asegurarse de que no se ejecute más código
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Mensaje de error detallado
    }

    $conn->close();
}
?>