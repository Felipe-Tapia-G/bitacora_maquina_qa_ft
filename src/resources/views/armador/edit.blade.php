<script>
  $(document).ready(function() {
    $('select').select2({
      theme: 'bootstrap4',
      style:'resolve',
    });
  });
  </script>
  
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ route('armador.update',$armador) }}" method="post">
        @csrf
        @method('put')
        <div class="modal-body">
          
        
  
        <div class="form-group row" style="display:none;">
            <label for="armador.id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="id" id="id" value="{{ $armador->id }}" min="0" autocomplete="off" required readonly required>
            </div>
          </div>
        
  
          <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $armador->nombre }}" autocomplete="off" required>
            </div>
          </div>
  
  
  
          <div class="form-group row">
          <label for="estado" class="col-sm-2 col-form-label">Estado</label>
          <div class="col-sm-10">
          <select name="estado" class="form-control" id="estado" required>
                  <option value="">Seleccione</option>
                @foreach($estado as $esta)
                  <option value="{{ $esta->id }}" {{ ($armador->estado == $esta->id) ? 'selected' : '' }}>
                      {{ $esta->nombre }}
                  </option>
                @endforeach
          </select>
          </div>
        </div>
          
          
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-success" type="submit">Guardar</button>
        </div>
      </form>
    </div>
  </div>
  