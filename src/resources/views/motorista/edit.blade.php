<script>
  $(document).ready(function() {
    $('select').select2({
      theme: 'bootstrap4',
      style:'resolve',
    });
  });


  // Solo permite ingresar numeros.
function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}

function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');

    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();

    // Formatear RUN
    rut.value = cuerpo + '-'+ dv

    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;

    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {

        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);

        // Sumar al Contador General
        suma = suma + index;

        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }

    }

    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);

    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;

    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
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
      <form action="{{ route('motorista.update',$motorista) }}" method="post">
        @csrf
        @method('put')
        <div class="modal-body">
          
        
  
          <div class="form-group row" style="display:none;">
            <label for="rpi" class="col-sm-2 col-form-label">id</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="id" id="id" value="{{ $motorista->id }}" min="0" autocomplete="off" required readonly required>
            </div>
          </div>


          <div class="form-group row">
            <label for="embarcacion" class="col-sm-2 col-form-label">RUT</label>
            <div class="col-sm-10">
            <input  maxlength="20"  class="form-control" placeholder="" required oninput="checkRut(this)" name="rut" type="text" id="rut" value="{{$motorista->rut }}" >
            </div>
          </div>

  
          <div class="form-group row">
            <label for="motorista" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nombre" id="nombre" value="{{$motorista->nombres }}" autocomplete="off" required>
            </div>
          </div>

                
          <div class="form-group row">
          <label for="estado" class="col-sm-2 col-form-label">Estado</label>
            <div class="col-sm-10">
                <select name="estado" class="form-control" id="estado" required>
                        <option value="">Seleccione</option>
                      @foreach($estado as $e)
                        <option value="{{ $e->id }}" {{ ($motorista->estado == $e->id) ? 'selected' : '' }}>
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
  