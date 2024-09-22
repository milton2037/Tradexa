<?php
// insertar_tema.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "12345", "db_tradexa");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $titulo = mysqli_real_escape_string($conn, $_POST['titulo']); // Escapar entrada
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']); // Escapar entrada

    $sql = "INSERT INTO temas (titulo, descripcion) VALUES ('$titulo', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo tema insertado con éxito";
        header("Location: ../../app/view/busquedas.php"); // Redirigir a busquedas.php
        exit(); // Asegurarse de que no se ejecute más código
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Mensaje de error detallado
    }

    $conn->close();
}
?>