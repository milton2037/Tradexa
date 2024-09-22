<?php
function obtenerTemas() {
  // Conexión a la base de datos
  $conn = new mysqli("localhost", "root", "12345", "db_tradexa");
  if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
  }

  // Consulta para obtener los temas
  $sql = "SELECT id, nombre FROM temas"; // Asegúrate de que 'nombre' es el campo correcto
  $result = $conn->query($sql);
  $temas = [];

  if ($result->num_rows > 0) {
    // Salida de cada fila
    while($row = $result->fetch_assoc()) {
      $temas[] = $row;
    }
  }

  $conn->close();
  return $temas;
}
?>