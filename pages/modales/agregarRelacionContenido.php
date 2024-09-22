<!-- Modal para relacionar Tema y Contenido -->
<div class="modal fade" id="modalTemaContenido" tabindex="-1" aria-labelledby="modalTemaContenidoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTemaContenidoLabel">Relacionar Tema y Contenido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../../app/controller/insertar_relacion_contenido.php" method="POST">
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
            <label for="contenido_id" class="form-label">Contenido</label>
            <select class="form-select" id="contenido_id" name="contenido_id" required>
            <?php
                  include '../../db.php'; // Incluir la conexión a la base de datos

                  // Consulta para obtener los temas
                  $query = "SELECT id, titulo, subtema_id FROM contenido"; // Asegúrate de que 'id' y 'titulo' sean los nombres correctos de las columnas
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Relación</button>
        </div>
      </form>
    </div>
  </div>
</div>
