<!-- Modal Editar-->
<div class="modal fade" id="editars<?php echo $fila['ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Trailer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="editarVideo.php" method="POST">
          
         <input type="hidden" name="id" value="<?php echo $dataVideo['id']; ?>">

          <div class="form-group">
            <label for="">Nombre de Pelicula</label>
            <input type="text" name="nombreVideo" id="nombreVideo" class="form-control" value="<?php echo $dataVideo['nombreVideo']; ?>" >
          </div>

          <div class="form-group">
            <label for="">Url del Video</label>
            <input type="text" name="urlVideo" id="urlVideo" class="form-control" value="<?php echo $dataVideo['urlVideo']; ?>" >
          </div>

          <div class="form-group">
            <label for="">Descripcion de Pelicula</label>
            <input type="text" name="descripcionVideo"  id="descripcionVideo" class="form-control" value="<?php echo $dataVideo['descripcionVideo']; ?>" >
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>
        
      </div>
      
    </div>
  </div>
</div>