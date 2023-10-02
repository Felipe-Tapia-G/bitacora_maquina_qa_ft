<script>
$(document).ready(function() {
  $('select').select2({
    theme: 'bootstrap4',
    style:'resolve',
  });
  
  // formateará el RUT cada vez que se escriba en el campo y
  // validará cuando el texto haya cambiado

  
});
</script>

<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Añadir</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <form action="{{ route('armador.store') }}" method="post">
      @csrf
      <div class="modal-body">
        

        <div class="form-group row">
          <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="" name="nombre" id="nombre" value="" autocomplete="off" required>
          </div>
        </div>
        

        <div class="form-group row">
          <label for="estado" class="col-sm-2 col-form-label">Estado</label>
          <div class="col-sm-10">
          <select name="estado" class="form-control" id="estado" required>
                    <option value="">Seleccione</option>
                    @foreach ($estado as $e)
                        <option value="{{ $e->id }}">{{ $e->nombre }}</option>
                    @endforeach
                </select>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-dark" type="button" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-dark" type="submit">Guardar</button>
      </div>
    </form>
  </div>
</div>
