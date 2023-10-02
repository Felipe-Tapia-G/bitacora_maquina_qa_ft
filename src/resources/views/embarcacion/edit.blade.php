<script>
  $(document).ready(function() {
    $('select').select2({
      theme: 'bootstrap4',
      style:'resolve',
    });
  });


  function validarRango() {
    const input = document.getElementById('cantidad_motores_aux');
    const value = parseFloat(input.value);

    if (value < 1) {
      input.value = 1;
    } else if (value > 4) {
      input.value = 4;
    }
  }


  </script>
  
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ route('embarcacion.update',$embarcacion) }}" method="post">
        @csrf
        @method('put')
        <div class="modal-body">
          
        
  
          <div class="form-group row" style="display:none;">
            <label for="rpi" class="col-sm-2 col-form-label">id</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="id" id="id" value="{{ $embarcacion->id }}" min="0" autocomplete="off"  readonly required>
            </div>
          </div>
  
          <div class="form-group row">
            <label for="embarcacion" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nombre" id="embarcacion" value="{{$embarcacion->nombre }}" autocomplete="off" required>
            </div>
          </div>

          
          <div class="form-group row">
            <label for="embarcacion" class="col-sm-2 col-form-label">Cantidad de motores auxiliares</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="cantidad_motores_aux" id="cantidad_motores_aux" value="{{$embarcacion->cantidad_motores_aux }}"  autocomplete="off" required oninput="validarRango()" >
            </div>
          </div>



          <div class="form-group row">
          <label for="estado" class="col-sm-2 col-form-label">Estado</label>
            <div class="col-sm-10">
                <select name="estado" class="form-control" id="estado" required>
                        <option value="">Seleccione</option>
                      @foreach($estado as $e)
                        <option value="{{ $e->id }}" {{ ($embarcacion->estado == $e->id) ? 'selected' : '' }}>
                            {{ $e->nombre }}
                        </option>
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
  