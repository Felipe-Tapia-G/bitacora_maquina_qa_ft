<style>
.swal-button.btn-black {
  background-color: black;
  color: white;
}

.swal-button.btn-black:hover {
  background-color: #808080;
  color: white;
 
}

</style>

<script>
  // Función para calcular las horas de navegación y validar las fechas
  function calcularHorasNavegacion() {
    var fechaZarpe = document.getElementById('fecha_zarpe').value;
    var fechaRecalada = document.getElementById('fecha_recalada').value;

    if (fechaZarpe && fechaRecalada) {
      var zarpe = new Date(fechaZarpe);
      var recalada = new Date(fechaRecalada);

      // Validar que la fecha de recalada sea mayor a la fecha de zarpe
      if (recalada <= zarpe) {
        //alert("La fecha de recalada debe ser mayor a la fecha de zarpe.");
        swal({
              title: "¡Alerta!",
              text: "La fecha de recalada debe ser mayor a la fecha de zarpe.",
              icon: "warning",
              buttons: {
                confirm: {
                  text: "Aceptar",
                  className: "btn-black",
                },
              },
            });

        document.getElementById('fecha_recalada').value = ''; // Limpiar el campo de fecha recalada
        document.getElementById('horas_navegac').value = ''; // Limpiar el campo de horas de navegación
        return;
      }

      var diff = Math.abs(recalada - zarpe);
      var horasNavegacion = Math.floor(diff / 3600000); // Calcula las horas en base a la diferencia en milisegundos
      document.getElementById('horas_navegac').value = horasNavegacion;
    }
  }

  // Agrega eventos onchange a los campos de fecha zarpe y recalada
  document.getElementById('fecha_zarpe').onchange = calcularHorasNavegacion;
  document.getElementById('fecha_recalada').onchange = calcularHorasNavegacion;



  
  $(document).ready(function() {
    $('textarea[name="obs"]').on('input', function() {
      var caracteresIngresados = $(this).val().length;
      var caracteresRestantes = 500 - caracteresIngresados;
      $('#caracteresRestantes').text(caracteresRestantes + ' caracteres restantes');
    });
  });


  
</script>




<div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Bitacora de Maquina - ID: {{$id}}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <form action="{{ route('bdm_mantenedores.bitacora_modificar') }}" method="post">
                  @csrf
                  <div class="modal-body">
                    
                  <input type="hidden" name="id_bitacora" id="id_bitacora" value="{{$id}}" autocomplete="off" >


                      <div class="form-row">
                            <div class="form-group col-md-4" >
                              <label for="inputCity">P.A.M</label>

                              <select name="pam" id="pam" class="form-control" required disabled>
                              <option value="">Seleccione</option>
                                @foreach ($embarcacion as $E)
                                  <option value="{{ $E->id }}" {{ ($bitacora->pam == $E->id) ? 'selected' : '' }}>
                                    {{ $E->nombre }}
                                  </option>
                                @endforeach
                              </select>
                            </div>

  



                            <div class="form-group col-md-4" >
                              <label for="inputCity">Motorista</label>

                              <select name="motorista" id="motorista" class="form-control" required>
                              <option value="">Seleccione</option>
                              @foreach ($motorista as $m)
                                    <option value="{{ $m->id }}" {{ ($bitacora->motorista == $m->id) ? 'selected' : '' }}>
                                    {{ $m->nombres }}
                                  </option>
                                @endforeach
                              </select>
                            </div>

                            
                            <div class="form-group col-md-4" >
                              <label for="inputCity">Motorista 2</label>

                              <select name="motorista2" id="motorista2" class="form-control" >
                              <option value="">Seleccione</option>
                              @foreach ($motorista as $m2)
                                  <option value="{{ $m2->id }}" {{ ($bitacora->motorista2 == $m2->id) ? 'selected' : '' }}>
                                    {{ $m2->nombres }}
                                  </option>
                                @endforeach
                              </select>
                            </div>


                      </div>

                      <div class="form-row">
                            <div class="form-group col-md-6" >
                              <label for="inputCity">Fecha Zarpe</label>
                              <input type="datetime-local" class="form-control" name="fecha_zarpe" id="fecha_zarpe" value="{{ $bitacora->fecha_zarpe ?? ''}}" required autocomplete="off">
                            </div>

                            <div class="form-group col-md-6" >
                              <label for="inputCity">Fecha Recalada</label>
                              <input type="datetime-local" class="form-control" name="fecha_recalada" id="fecha_recalada" value="{{ $bitacora->fecha_recalada ?? ''}}" autocomplete="off">
                            </div>
                      </div>

                      <div class="form-row">
                            <div class="form-group col-md-6" >
                              <label for="inputCity">Horas Navegación</label>
                              <input type="number" class="form-control" name="horas_navegac" id="horas_navegac"  value="{{ $bitacora->horas_navegac ?? ''}}" readonly autocomplete="off">
                            
                            </div>

                            <div class="form-group col-md-6" >
                              <label for="inputCity">Horas Operación  (incluye horas puerto)</label>
                              <input type="text"  oninput="limitarDigitos(this, 5)" class="form-control" name="horas_operac" id="horas_operac" value="{{ $bitacora->horas_operac ?? ''}}" autocomplete="off">
                            </div>

                            
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12" >
                          <label for="obs">Observaciones y pedidos de materiales</label>
                          
                          <textarea class="form-control" id="obs" name="obs" rows="3" maxlength="500" required>{{ $bitacora->obs ?? ''}}</textarea>
                          <span id="caracteresRestantes"></span>

                        </div>
                      </div>

                      <div class="modal-footer">
                        <button class="btn  btn-outline-dark" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-dark" type="submit">Guardar</button>
                      </div>




                      </div>

                </form>
              </div>
</div>


