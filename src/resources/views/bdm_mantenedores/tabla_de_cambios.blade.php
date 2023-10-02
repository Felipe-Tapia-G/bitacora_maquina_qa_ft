
<!-- Incluir el CSS de SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

<!-- Incluir el JS de SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>

<style>
  .sticky-th {
    position: sticky;
    left: 0;
    background-color: #f2f2f2;
  }
</style>



<div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tabla  de Cambios </h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                
                <form action="{{ route('bdm_mantenedores.tabla_de_cambios_guardar') }}" method="post" id="miFormulario_tabla_cambio">
                  @csrf
                  <div class="modal-body">
                  <input type="hidden" name="id_bitacora" id="id_bitacora" value="{{$id}}">
                    <div class="table-responsive-xl form-row">
                    <table class="table class="form-group col-md-2" >
                       
                        <thead class="thead-dark">
                          <tr>
                           
                         
                          <th scope="col" style="width: 150px; position: sticky; left: 0; z-index: 1;">Tipos</th> 
                            <th scope="col" style="width: 30px;">Horómetro</th>
                            <th scope="col" style="width: 30px">Fecha</th>
                            <th scope="col" style="width: 30px;">Duración</th>
                        
                          </tr>
                        </thead>
                        <tbody>

            
                            <td style="padding: 1px;" >
                            <div class="form-group col-md-4" >
                                  <thead class="thead-dark">
                                      <tr>
                                         
                                          <th scope="col" style= "position: sticky; left: 0; z-index: 1;">Motor Principal / Aceite</th>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="horometro_mp_aceite" id="horometro_mp_aceite" value="{{ $tabla_de_cambios->horometro_mp_aceite ?? ''}}" autocomplete="off" step="1" min="0"  readonly  required></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_mp_aceite" id="fecha_mp_aceite" value="{{ $tabla_de_cambios->fecha_mp_aceite ?? ''}}" autocomplete="off" step="1" min="0"  required></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)"type="text" class="form-control" name="duracion_mp_aceite"  id="aceiteduracion_mp_aceite_0004"  value="{{ $tabla_de_cambios->duracion_mp_aceite ?? ''}}"  autocomplete="off" step="1" min="0"  required></td>
                                      </tr>
                                  </thead>
                            </div>
                            </td> 
                          </tr>
                   
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style=" position: sticky; left: 0; z-index: 1;">Motor Principal / Filtro Combustible</th>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)"type="text" class="form-control" name="horometro_mp_filtro_combustible" id="horometro_mp_filtro_combustible" value="{{ $tabla_de_cambios->horometro_mp_filtro_combustible ?? ''}}" autocomplete="off" step="1" min="0" readonly required></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_mp_filtro_combustible" id="fecha_mp_filtro_combustible" value="{{ $tabla_de_cambios->fecha_mp_filtro_combustible ?? ''}}" autocomplete="off" step="1" min="0" required ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_mp_filtro_combustible"  id="duracion_mp_filtro_combustible"  value="{{ $tabla_de_cambios->duracion_mp_filtro_combustible ?? ''}}"  autocomplete="off" step="1" min="0"  required></td>
                                      </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style=" position: sticky; left: 0; z-index: 1;">Motor Principal / Filtro Aceite</th>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)"  type="text" class="form-control" name="horometro_mp_filtro_aceite" id="horometro_mp_filtro_aceite" value="{{ $tabla_de_cambios->horometro_mp_filtro_aceite ?? ''}}" autocomplete="off" step="1" min="0"  readonly required></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_mp_filtro_aceite" id="fecha_mp_filtro_aceite" value="{{ $tabla_de_cambios->fecha_mp_filtro_aceite ?? ''}}" autocomplete="off" step="1" min="0"  required></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_mp_filtro_aceite"  id="duracion_mp_filtro_aceite"  value="{{ $tabla_de_cambios->duracion_mp_filtro_aceite ?? ''}}"  autocomplete="off" step="1" min="0" required ></td>
                                      </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style="position: sticky; left: 0; z-index: 1;">Motor Principal / Filtro Racor</th>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="horometro_mp_filtro_racor" id="horometro_mp_filtro_racor" value="{{ $tabla_de_cambios->horometro_mp_filtro_racor ?? ''}}" autocomplete="off" step="1" min="0"  readonly required></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_mp_filtro_racor" id="fecha_mp_filtro_racor" value="{{ $tabla_de_cambios->fecha_mp_filtro_racor ?? ''}}" autocomplete="off" step="1" min="0" required ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_mp_filtro_racor"  id="duracion_mp_filtro_racor"  value="{{ $tabla_de_cambios->duracion_mp_filtro_racor ?? ''}}"  autocomplete="off" step="1" min="0" required  ></td>
                                      </tr>
                                  </thead>
                            </td> 
                          </tr>


                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style="position: sticky; left: 0; z-index: 1;">Motor Principal / Filtro Aire</th>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="horometro_mp_filtro_aire" id="horometro_mp_filtro_aire" value="{{ $tabla_de_cambios->horometro_mp_filtro_aire ?? ''}}" autocomplete="off" step="1" min="0" readonly required></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_mp_filtro_aire" id="fecha_mp_filtro_aire" value="{{ $tabla_de_cambios->fecha_mp_filtro_aire ?? ''}}" autocomplete="off" step="1" min="0" required ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_mp_filtro_aire"  id="duracion_mp_filtro_aire"  value="{{ $tabla_de_cambios->duracion_mp_filtro_aire ?? ''}}"  autocomplete="off" step="1" min="0"  required></td>
                                      </tr>
                                  </thead>
                            </td> 
                          </tr>



                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style=" position: sticky; left: 0; z-index: 1;">Contra Marcha / Aceite</th>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)"  type="text" class="form-control" name="horometro_cm_aceite" id="horometro_cm_aceite" value="{{ $tabla_de_cambios->horometro_cm_aceite ?? ''}}" autocomplete="off" step="1" min="0" readonly required></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_cm_aceite" id="fecha_cm_aceite" value="{{ $tabla_de_cambios->fecha_cm_aceite ?? ''}}" autocomplete="off" step="1" min="0" required ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_cm_aceite"  id="duracion_cm_aceite"  value="{{ $tabla_de_cambios->duracion_cm_aceite ?? ''}}"  autocomplete="off" step="1" min="0"  required></td>
                                      </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style=" position: sticky; left: 0; z-index: 1;">Contra Marcha / Filtro Aceite</th>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="horometro_cm_filtro_aceite" id="horometro_cm_filtro_aceite" value="{{ $tabla_de_cambios->horometro_cm_filtro_aceite ?? ''}}" autocomplete="off" step="1" min="0" readonly  required></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_cm_filtro_aceite" id="fecha_cm_filtro_aceite" value="{{ $tabla_de_cambios->fecha_cm_filtro_aceite ?? ''}}" autocomplete="off" step="1" min="0"  required></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_cm_filtro_aceite"  id="duracion_cm_filtro_aceite"  value="{{ $tabla_de_cambios->duracion_cm_filtro_aceite ?? ''}}"  autocomplete="off" step="1" min="0"  required></td>
                                      </tr>
                                  </thead>
                            </td> 
                          </tr>

                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style=" position: sticky; left: 0; z-index: 1;">Hytek / Aceite</th>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="horometro_hy_aceite" id="horometro_hy_aceite" value="{{ $tabla_de_cambios->horometro_hy_aceite ?? ''}}" autocomplete="off" step="1" min="0" readonly required></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_hy_aceite" id="fecha_hy_aceite" value="{{ $tabla_de_cambios->fecha_hy_aceite ?? ''}}" autocomplete="off" step="1" min="0"  required></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)"  type="text" class="form-control" name="duracion_hy_aceite"  id="duracion_hy_aceite"  value="{{ $tabla_de_cambios->duracion_hy_aceite ?? ''}}"  autocomplete="off" step="1" min="0"  required></td>
                                      </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style=" position: sticky; left: 0; z-index: 1;">Hytek / Filtro Aceite</th>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="horometro_hy_filtro_aceite" id="horometro_hy_filtro_aceite" value="{{ $tabla_de_cambios->horometro_hy_filtro_aceite ?? ''}}" autocomplete="off" step="1" min="0" readonly required></td>
                                          <td style="padding: 1px;"><input type="date" class="form-control" name="fecha_hy_filtro_aceite" id="fecha_hy_filtro_aceite" value="{{ $tabla_de_cambios->fecha_hy_filtro_aceite ?? ''}}" autocomplete="off" step="1" min="0"  required></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="duracion_hy_filtro_aceite"  id="duracion_hy_filtro_aceite"  value="{{ $tabla_de_cambios->duracion_hy_filtro_aceite ?? ''}}"  autocomplete="off" step="1" min="0" required ></td>
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

  
           
              document.getElementById("horometro_mp_aceite").value = "0";
              document.getElementById("horometro_mp_filtro_combustible").value = "0";
              document.getElementById("horometro_mp_filtro_aceite").value = "0";
              document.getElementById("horometro_mp_filtro_racor").value = "0";
              document.getElementById("horometro_mp_filtro_aire").value = "0";
              document.getElementById("horometro_cm_aceite").value = "0";
              document.getElementById("horometro_cm_filtro_aceite").value = "0";
              document.getElementById("horometro_hy_aceite").value = "0";
              document.getElementById("horometro_hy_filtro_aceite").value = "0";
            
        }


        function habilitarhorometro(){
          document.getElementById("horometro_mp_aceite").removeAttribute("readonly");
          document.getElementById("horometro_mp_filtro_combustible").removeAttribute("readonly");
          document.getElementById("horometro_mp_filtro_aceite").removeAttribute("readonly");
          document.getElementById("horometro_mp_filtro_racor").removeAttribute("readonly");
          document.getElementById("horometro_mp_filtro_aire").removeAttribute("readonly");
          document.getElementById("horometro_cm_aceite").removeAttribute("readonly");
          document.getElementById("horometro_cm_filtro_aceite").removeAttribute("readonly");
          document.getElementById("horometro_hy_aceite").removeAttribute("readonly");
          document.getElementById("horometro_hy_filtro_aceite").removeAttribute("readonly");


     }

     function valida_campos_horometro(){



      var horometro_mp_aceite               = document.getElementById('horometro_mp_aceite').value;
      var horometro_mp_filtro_combustible   = document.getElementById('horometro_mp_filtro_combustible').value;
      var horometro_mp_filtro_aceite        = document.getElementById('horometro_mp_filtro_aceite').value;
      var horometro_mp_filtro_racor         = document.getElementById('horometro_mp_filtro_racor').value;
      var horometro_mp_filtro_aire          = document.getElementById('horometro_mp_filtro_aire').value;
      var horometro_cm_aceite               = document.getElementById('horometro_cm_aceite').value;
      var horometro_cm_filtro_aceite        = document.getElementById('horometro_cm_filtro_aceite').value;
      var horometro_hy_aceite               = document.getElementById('horometro_hy_aceite').value;
      var horometro_hy_filtro_aceite        = document.getElementById('horometro_hy_filtro_aceite').value;
     
     if(horometro_mp_aceite =="" || horometro_mp_filtro_combustible =="" || horometro_mp_filtro_aceite =="" || horometro_mp_filtro_racor =="" || horometro_mp_filtro_aire =="" || horometro_cm_aceite =="" || horometro_cm_filtro_aceite =="" || horometro_hy_aceite =="" ||  horometro_hy_filtro_aceite =="" )
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
       document.getElementById("miFormulario_tabla_cambio").submit(); // Envía el formulario
      }
    }
    </script>


