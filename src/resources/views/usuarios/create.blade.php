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
      <h5 class="modal-title" id="exampleModalLabel">Añadir</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <form action="{{ route('usuarios.store') }}" method="post">
      @csrf
      <div class="modal-body">
        
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name" value="" autocomplete="off" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Correo</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="email" value="" autocomplete="off" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="password" value="" autocomplete="off" required>
          </div>
        </div>




    

        <div class="form-group row">
          <label for="estado" class="col-sm-2 col-form-label">Perfil </label>
          <div class="col-sm-10">
          <select name="perfil" class="form-control" id="perfil" required>
                    <option value="">Seleccione</option>
                    @foreach ($perfil as $e)
                        <option value="{{ $e->id }}">{{ $e->nombre }}</option>
                    @endforeach
                </select>
          </div>
        </div>




      @if(Auth::user()->perfil==100)
      <div class="form-group row" id="div_armado">
            <label for="armador" class="col-sm-2 col-form-label">Armador</label>
            <div class="col-sm-10">
                <select name="armador" class="form-control" id="armador" required>
                    <option value="null">Seleccione</option>
                    @foreach ($armadores as $armador)
                        <option value="{{ $armador->id }}">{{ $armador->nombre }}</option>
                    @endforeach
                </select>
            </div>
          </div>
    @endif
    
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



<script>
    $(document).ready(function() {
        // esconde los campos ocultos al cargar la página
  
        $('#div_embarcacion').hide();

        // muestra u oculta campos dependiendo de la opción seleccionada
        $('#perfil').change(function() {
            var seleccion = $(this).val();

            if(seleccion == '1'){
                $('#div_embarcacion').show();
              //  $('#div_armado').hide();
            
            }else if (seleccion == '2'){
                $('#div_embarcacion').hide();
               // $('#div_armado').hide();
       
            }else if(seleccion == '100')
            {
              $('#div_armado').show();
             // $('#div_embarcacion').hide();
                
              
         
            }else{
             // $('#div_armado').hide();
              $('#div_embarcacion').hide();
            }
        });
    });
</script>

