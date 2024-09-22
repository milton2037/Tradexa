<!-- Modal para insertar un Contenido -->
<div class="modal fade" id="modalContenido" tabindex="-1" aria-labelledby="modalContenidoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalContenidoLabel">Agregar Contenido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../../app/controller/insertar_contenido.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" spellcheck="true" required> <!-- Campo para el título -->
          </div>
          <div class="mb-3">
            <label for="subtema_id" class="form-label">Subtemas</label>
            <select class="form-select" id="subtema_id" name="subtema_id[]" multiple required style="height: 300px;"> <!-- Aumentado el tamaño del cuadro de selección -->
              <optgroup label="Grupo 1"> <!-- División entre opciones -->
                <?php
                  include '../../db.php'; // Incluir la conexión a la base de datos

                  // Consulta para obtener los temas
                  $query = "SELECT id, subtitulo FROM subtemas"; // Asegúrate de que 'id' y 'titulo' sean los nombres correctos de las columnas
                  $result = $conn->query($query);

                  // Verificar si hay resultados
                  if ($result->num_rows > 0) {
                    // Salida de cada fila
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['id'] . "'>" . $row['subtitulo'] . "</option>"; // Cambiado a <option> para selección
                    }
                  } else {
                    echo "<option>No hay temas disponibles.</option>"; // Cambiado a <option>
                  }
                ?>
              </optgroup>
              <!-- Aquí puedes agregar más <optgroup> si es necesario -->
            </select>
          </div>
          <div class="mb-3">
            <label for="informacion" class="form-label">Información</label>
            <textarea class="form-control" id="informacion" name="informacion" rows="4" spellcheck="true" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Contenido</button>
        </div>
      </form>
    </div>
  </div>
</div>


