
<!-- Incluir el CSS de SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

<!-- Incluir el JS de SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>

<div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tabla De Cambio Motor  Auxiliar  {{$i}}</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                
                <form action="{{ route('bdm_mantenedores.tablacambio_motores_aux_guardar') }}" method="post" id="miFormulario_tabla_cambio_aux">
                  @csrf
                  <div class="modal-body">
                    
           
                  <input type="hidden" name="id_bitacora" id="id_bitacora" value="{{$id}}">
                  <input type="hidden" name="numero_motor_aux" id="numero_motor_aux" value="{{$i}}">
 


                    <div class="table-responsive-xl form-row">
                    <table class="table class="form-group col-md-2">
                       
                        <thead class="thead-dark">
                          <tr>
                           
                            <th scope="col" style="min-width: 100px;">Tipos</th>  
                            
                          
                            <th scope="col" style="min-width: 90px">Horómetro</th>
                            <th scope="col" style="min-width: 90px;">Fecha</th>
                            <th scope="col" style="min-width: 90px;">	Duración</th>

                          </tr>
                        </thead>
                        <tbody>
     
                   
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col">Aceite</th>
                                          <td style="padding: 1px;"><input type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="horometro_Aceite" id="horometro_Aceite" value="{{ $tablacambio_motoresaux->horometro_Aceite ?? ''}}" autocomplete="off" step="1" min="0" readonly ></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_aceite" id="fecha_aceite" value="{{ $tablacambio_motoresaux->fecha_aceite ?? ''}}" autocomplete="off" step="1" min="0" required ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_aceite"  id="duracion_aceite"  value="{{ $tablacambio_motoresaux->duracion_aceite ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
                                      </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col">Filtro Aceite</th>
                                          <td style="padding: 1px;"><input type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="horometro_filtro_aceite" id="horometro_filtro_aceite" value="{{ $tablacambio_motoresaux->horometro_filtro_aceite ?? ''}}" autocomplete="off" step="1" min="0" readonly ></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_filtro_aceite" id="fecha_filtro_aceite" value="{{ $tablacambio_motoresaux->fecha_filtro_aceite ?? ''}}" autocomplete="off" step="1" min="0" required ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_filtro_aceite"  id="duracion_filtro_aceite"  value="{{ $tablacambio_motoresaux->duracion_filtro_aceite ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
                                        </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col">Filtro Combustible</th>
                                          <td style="padding: 1px;"><input type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="horometro_fitro_combustible" id="horometro_fitro_combustible" value="{{ $tablacambio_motoresaux->horometro_fitro_combustible ?? ''}}" autocomplete="off" step="1" min="0" readonly ></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_fitro_conbustible" id="fecha_fitro_conbustible" value="{{ $tablacambio_motoresaux->fecha_fitro_conbustible ?? ''}}" autocomplete="off" step="1" min="0" required ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_filtro_combustible"  id="duracion_filtro_combustible"  value="{{ $tablacambio_motoresaux->duracion_filtro_combustible ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
                                    
                                     
                                        </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col">Filtro Racor</th>
                                          <td style="padding: 1px;"><input type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="horometro_filtro_racor" id="horometro_filtro_racor" value="{{ $tablacambio_motoresaux->horometro_filtro_racor ?? ''}}" autocomplete="off" step="1" min="0" readonly ></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_filtro_racor" id="fecha_filtro_racor" value="{{ $tablacambio_motoresaux->fecha_filtro_racor ?? ''}}" autocomplete="off" step="1" min="0" required ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_filtro_racor"  id="duracion_filtro_racor"  value="{{ $tablacambio_motoresaux->duracion_filtro_racor ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
                                    
                                        </tr>
                                  </thead>
                            </td> 
                          </tr>

                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col">Filtro Aire</th>
                                          <td style="padding: 1px;"><input type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="horometro_filtro_aire" id="horometro_filtro_aire" value="{{ $tablacambio_motoresaux->horometro_filtro_aire ?? ''}}" autocomplete="off" step="1" min="0" readonly ></td>
                                          
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_filtro_aire" id="fecha_filtro_aire" value="{{ $tablacambio_motoresaux->fecha_filtro_aire ?? ''}}" autocomplete="off" step="1" min="0" required ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_filtro_aire"  id="duracion_filtro_aire"  value="{{ $tablacambio_motoresaux->duracion_filtro_aire ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
                                    
                                        </tr>
                                  </thead>
                            </td> 
                          </tr>


                        
                        </tbody>
                      </table>
                  </div>



                  <div class="modal-footer">
                  <button class="btn btn-outline-dark" type="button" id="resetButton" onclick="resetForm();">Reset</button>
                  <button class="btn btn-outline-dark" type="button" id="habilitarBtn">Habilitar Horometro</button>
                    <button class="btn  btn-outline-dark" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-dark" type="button" onclick="valida_campos_horometro();">Guardar</button>
     
                  </div>
                </form>
              </div>
            </div>


<script>
    document.getElementById("habilitarBtn").addEventListener("click", function() {
            habilitarhorometro();
        });

function resetForm() {

  
           
              document.getElementById("horometro_Aceite").value = "0";
              document.getElementById("horometro_filtro_aceite").value = "0";
              document.getElementById("horometro_fitro_combustible").value = "0";
              document.getElementById("horometro_filtro_racor").value = "0";
              document.getElementById("horometro_filtro_aire").value = "0";

            
        }


        function habilitarhorometro(){
          document.getElementById("horometro_Aceite").removeAttribute("readonly");
          document.getElementById("horometro_filtro_aceite").removeAttribute("readonly");
          document.getElementById("horometro_fitro_combustible").removeAttribute("readonly");
          document.getElementById("horometro_filtro_racor").removeAttribute("readonly");
          document.getElementById("horometro_filtro_aire").removeAttribute("readonly");

     }




     

      function valida_campos_horometro(){
        

      var horometro_Aceite                = document.getElementById('horometro_Aceite').value;
      var horometro_filtro_aceite         = document.getElementById('horometro_filtro_aceite').value;
      var horometro_fitro_combustible     = document.getElementById('horometro_fitro_combustible').value;
      var horometro_filtro_racor          = document.getElementById('horometro_filtro_racor').value;
      var horometro_filtro_aire           = document.getElementById('horometro_filtro_aire').value;

   
      if(horometro_Aceite =="" || horometro_filtro_aceite =="" || horometro_fitro_combustible =="" || horometro_filtro_racor =="" || horometro_filtro_aire =="" )
      {
  
        Swal.fire({
              title: "¡Alerta!",
              text: 'No es posible guardar los registros debido a horómetros incompletos. Por favor, ingrese los valores, los cuales pueden ser ceros. Si lo desea, puede presionar el botón "Reset" para establecer los horómetros a cero.',
              icon: "warning",
              buttons: {
                confirm: {
                  text: "Aceptar",
                  className: "btn-black",
                },
              },
            });

      }else{
            document.getElementById("miFormulario_tabla_cambio_aux").submit(); // Envía el formulario
            }
          }

    </script>

