<!-- Modal para insertar un Tema -->
<div class="modal fade" id="modalTema" tabindex="-1" aria-labelledby="modalTemaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTemaLabel">Agregar Tema</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../../app/controller/insertar_tema.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" spellcheck="true" required>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label" >Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" spellcheck="true" required ></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Tema</button>
        </div>
      </form>
    </div>
  </div>
</div>
