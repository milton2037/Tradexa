<!-- Modal para insertar un Subtema -->
<div class="modal fade" id="modalSubtema" tabindex="-1" aria-labelledby="modalSubtemaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSubtemaLabel">Agregar Subtema</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../../app/controller/insertar_subtema.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="tema_id" class="form-label">Tema</label>
            <select class="form-select" id="tema_id" name="tema_id" required>
            <?php
                  include '../../db.php'; // Incluir la conexión a la base de datos

                  // Consulta para obtener los temas
                  $query = "SELECT id, titulo FROM temas"; // Asegúrate de que 'id' y 'titulo' sean los nombres correctos de las columnas
                  $result = $conn->query($query);

                  // Verificar si hay resultados
                  if ($result->num_rows > 0) {
                    // Salida de cada fila
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['id'] . "'>" . $row['titulo'] . "</option>"; // Cambiado a <option> para selección
                    }
                  } else {
                    echo "<option>No hay temas disponibles.</option>"; // Cambiado a <option>
                  }
                  ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="subtitulo" class="form-label">Subtítulo</label>
            <input type="text" class="form-control" id="subtitulo" name="subtitulo" spellcheck="true" required>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" spellcheck="true" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Subtema</button>
        </div>
      </form>
    </div>
  </div>
</div>
