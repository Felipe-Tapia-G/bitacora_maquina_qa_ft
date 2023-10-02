
<!-- Incluir el CSS de SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

<!-- Incluir el JS de SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>


<style>

.verde { background-color: green; }
        .amarillo { background-color: yellow; }
        .rojo { background-color: red; }

    
    .titulos{
                width: 140px; /* Define el ancho deseado */
            }

    .inputs {
                width:65px; /* Define el ancho deseado */
            }

    .input-oculto {
                    visibility: hidden;
                    opacity: 0;
                    width:65px; /* Define el ancho deseado */
                    }


     .oculto_sin_espacio {
        display: none;
        padding: 0;
        border: none;
        }


        input[readonly].rojo-claro {
            border: 1px solid #ef9a9a;
            background-color: #efd9db;
            color: #c62828;
            }

            




/* quitar estilo de tablas*/ 

            table {
                border-collapse: separate;
                border-spacing: 0;
                }

                table tr {
                border: none;
                }

                table td,
                table th {
                border: none;
                }

/* fin quitar estilo de tablas*/ 


</style>





<script>
  function restarValores() {
    var horasMP = parseInt(document.getElementById('horasmotor_principal_recalada').value);

            if (isNaN(horasMP)) {
           
                document.getElementById('horas_contra_marcha').value = ""; 
                document.getElementById('hora_de_hytek').value = ""; 
            
            } else {
          
                document.getElementById('horas_contra_marcha').value = horasMP;
                document.getElementById('hora_de_hytek').value = horasMP;
            }

    var h_zarpe     = parseInt(document.getElementById('horasmotor_principal_zarpe').value);
    var h_recalada  = parseInt(document.getElementById('horasmotor_principal_recalada').value);
    var resultado =  h_recalada - h_zarpe;


    if (!isNaN(resultado)) {
      document.getElementById('horas_aceite_mp').value = resultado;
      document.getElementById('hora_filtro_ac_mp').value = resultado;
      document.getElementById('hora_filtro_petr_mp').value = resultado;
      document.getElementById('hora_filtro_racor').value = resultado;
      document.getElementById('horas_aceite_cm').value = resultado;
      
      document.getElementById('hora_filtro_ac_cm').value = resultado;
      document.getElementById('hora_aceite_hytek').value = resultado;
      document.getElementById('hora_filtro_hytek').value = resultado;
      document.getElementById('horas_filtro_de_aire_mp').value = resultado;






    }


  } 
</script>



<div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Motor Principal, Contra Marcha, Hytek (Ingresar lectura de Horometro) </h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                
                <form action="{{ route('bdm_mantenedores.motor_principal_y_cm_guardar') }}" method="post">
                  @csrf
                  <div class="modal-body">
                  <input type="hidden" name="id_bitacora" id="id_bitacora" value="{{$id}}">
                  <div class="table-responsive-xl form-row">
                    <table class="table class="form-group col-md-2" >
                     
                   
                        <tbody>

                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"  class="titulos">Horas Motor Principal Zarpe</th>
                                        <td style="padding: 1px;"  class="input"><input type="text" class="form-control" name="horasmotor_principal_zarpe" id="horasmotor_principal_zarpe" value="{{ $motor_principal_y_cm->horasmotor_principal_zarpe ?? ''}}"  oninput="restarValores()" onkeypress="limitarDigitos(this, 5)" required autocomplete="off" step="1" min="0"></td>   
                                        <td style="padding: 1px;"  class="input-oculto"><input type="text" class="form-control" name="horas_mp_oculto" id="horas_mp_oculto" value="{{ $motor_principal_y_cm->horas_mp_oculto ?? ''}}" autocomplete="off" step="1" min="0"  ></td>                                       
                                       
                                    </tr>
                                </thead>
                            </td>     
                        </tr>


                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"  class="titulos">Horas Motor Principal Recalada</th>
                                        <td style="padding: 1px;"  class="input"><input type="text" class="form-control" name="horasmotor_principal_recalada" id="horasmotor_principal_recalada" value="{{ $motor_principal_y_cm->horasmotor_principal_recalada ?? ''}}"  oninput="restarValores()" onkeypress="limitarDigitos(this, 5)" required autocomplete="off" step="1" min="0"></td>   
                                        <td style="padding: 1px;"  class="input-oculto"><input type="text" class="form-control" name="horas_mp_oculto" id="horas_mp_oculto" value="{{ $motor_principal_y_cm->horas_mp_oculto ?? ''}}" autocomplete="off" step="1" min="0"  ></td>                                       
                                        
                                        
                                        <th scope="col" class="titulos">Horas Aceite MP</th>
                                        
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control" name="horas_aceite_mp" id="horas_aceite_mp" value="" autocomplete="off" step="1" min="0" required readonly ></td>                                         
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control   " name="duracion_mp_aceite" id="duracion_mp_aceite" value="" autocomplete="off" step="1" min="0" readonly ></td>
                                                                                         
                                    </tr>
                                </thead>
                            </td>     
                        </tr>
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                       
                                        <th scope="col" class="titulos">Horas Contra Marcha</th>
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control" name="horas_contra_marcha" id="horas_contra_marcha"          value="{{ $motor_principal_y_cm->horas_contra_marcha ?? ''}}"    onkeypress="limitarDigitos(this, 5)"  autocomplete="off" step="1" min="0"    ></td>                                          
                                        <td style="padding: 1px;" class="input-oculto"><input type="text" class="form-control" name="horas_cm_oculto" id="horas_cm_oculto"            value="{{ $motor_principal_y_cm->horas_cm ?? ''}}" autocomplete="off" step="1" min="0"  ></td> 
                                        <th scope="col" class="titulos">Hora Filtro Ac MP</th>
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control" name="hora_filtro_ac_mp" id="hora_filtro_ac_mp"     value="" autocomplete="off" step="1" min="0" required readonly></td>                                          
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control  " name="duracion_mp_filtro_aceite" id="duracion_mp_filtro_aceite"     value="" autocomplete="off" step="1" min="0" required readonly ></td>                                          
                                          </tr>
                                </thead>
                            </td>     
                        </tr>
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="titulos">Hora de Hytek</th>
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control" name="hora_de_hytek" id="hora_de_hytek"         value="{{ $motor_principal_y_cm->hora_de_hytek ?? ''}}" autocomplete="off" step="1" min="0" onkeypress="limitarDigitos(this, 5)"  ></td>                                          
                                        <td style="padding: 1px;" class="input-oculto"><input type="text" class="form-control" name="sist_iny_oculto" id="sist_iny_oculto"         value="{{ $motor_principal_y_cm->sist_iny ?? ''}}" autocomplete="off" step="1" min="0"  ></td>                                          
                                       
                                        <th scope="col" class="titulos">Hora Filtro Petr. MP</th>
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control" name="hora_filtro_petr_mp" id="hora_filtro_petr_mp" value="" autocomplete="off" step="1" min="0"  readonly></td>                                          
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control  " name="duracion_mp_filtro_combustible" id="duracion_mp_filtro_combustible" value="" autocomplete="off" step="1" min="0"  readonly ></td>                                          
                                          </tr>
                                </thead>
                            </td>     
                        </tr>
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="titulos">Hora Aceite Hytek</th>
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control"            name="hora_aceite_hytek"    id="hora_aceite_hytek"  value="" autocomplete="off" step="1" min="0"  readonly></td>                                          
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control " name="duracion_hy_aceite"   id="duracion_hy_aceite" value="" autocomplete="off" step="1" min="0"  readonly ></td>   
                                     
                                        <th scope="col" class="titulos">Hora Filtro Racor</th>
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control" name="hora_filtro_racor" id="hora_filtro_racor" value="" autocomplete="off" step="1" min="0"   readonly></td>                                          
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control  " name="duracion_mp_filtro_racor" id="duracion_mp_filtro_racor" value="" autocomplete="off" step="1" min="0"  readonly ></td>                                          
                                        
                                    </tr>
                                </thead>
                            </td>     
                        </tr>

                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="titulos">Hora Filtro Hytek</th>
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control" name="hora_filtro_hytek" id="hora_filtro_hytek" value="" autocomplete="off" step="1" min="0"  readonly></td>                                          
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control  " name="duracion_hy_filtro_aceite" id="duracion_hy_filtro_aceite" value="" autocomplete="off" step="1" min="0"  readonly ></td>                                          

                                        <th scope="col" class="titulos">Horas Aceite CM.</th>
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control" name="horas_aceite_cm" id="horas_aceite_cm" value="" autocomplete="off" step="1" min="0"  readonly ></td>                                          
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control  " name="duracion_cm_aceite" id="duracion_cm_aceite" value="" autocomplete="off" step="1" min="0"  readonly ></td>                                          
                                           </tr>
                                </thead>
                            </td>     
                        </tr>

                        
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="titulos">Horas Filtro de Aire MP</th>
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control" name="horas_filtro_de_aire_mp" id="horas_filtro_de_aire_mp" value="" autocomplete="off" step="1" min="0"  readonly ></td>                                          
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control  " name="duracion_mp_filtro_aire" id="duracion_mp_filtro_aire" value="" autocomplete="off" step="1" min="0"  readonly></td>                                          
                        
                                        <th scope="col" class="titulos"> Hora Filtro AC CM.</th>
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control" name="hora_filtro_ac_cm" id="hora_filtro_ac_cm" value="" autocomplete="off" step="1" min="0"  readonly></td>                                          
                                        <td style="padding: 1px;" class="inputs"><input type="text" class="form-control  " name="duracion_cm_filtro_aceite" id="duracion_cm_filtro_aceite" value="" autocomplete="off" step="1" min="0"  readonly></td>                                          
                                       
                                    </tr>
                                </thead>
                            </td>     
                        </tr>
           
                        </tbody>
                      </table>
                  </div>



                  <div class="modal-footer">
                 
                  <button class="btn btn-outline-dark" type="button" id="calcularButton" onclick="calcular();">Calcular</button>

                    <button class="btn  btn-outline-dark" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-dark" type="submit" id="guardar" disabled >Guardar</button>
                  </div>
                </form>
              </div>
            </div>


            




            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>




function calcular(){
            let timerInterval;
            
            // Mostrar SweetAlert2 con indicador de carga
            const loadingSwal = Swal.fire({
                title: 'Calculando...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                    timerInterval = setInterval(() => {
                        const timerLeft = Swal.getTimerLeft();
                        if (timerLeft <= 0) {
                            clearInterval(timerInterval);
                        }
                    }, 100);

                    // Realizar la solicitud AJAX
                    var zarpe       = parseInt(document.getElementById('horasmotor_principal_zarpe').value);
                    var recalada    = parseInt(document.getElementById('horasmotor_principal_recalada').value);
                    var id_bitacora = parseInt(document.getElementById('id_bitacora').value);

                    //HORAS
                    var hora_aceite_hytek       = parseInt(document.getElementById('hora_aceite_hytek').value);
                    var hora_filtro_hytek       = parseInt(document.getElementById('hora_filtro_hytek').value);
                    var horas_filtro_de_aire_mp = parseInt(document.getElementById('horas_filtro_de_aire_mp').value);
                    var horas_aceite_mp         = parseInt(document.getElementById('horas_aceite_mp').value);
                    var hora_filtro_ac_mp       = parseInt(document.getElementById('hora_filtro_ac_mp').value);
                    var hora_filtro_petr_mp     = parseInt(document.getElementById('hora_filtro_petr_mp').value);
                    var hora_filtro_racor       = parseInt(document.getElementById('hora_filtro_racor').value);
                    var horas_aceite_cm         = parseInt(document.getElementById('horas_aceite_cm').value);
                    var hora_filtro_ac_cm       = parseInt(document.getElementById('hora_filtro_ac_cm').value);

                    if(zarpe<recalada){
                    
                                        $.ajax({
                                            url: "{{ route('calcula_motorprincipalcm') }}",
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            type: 'POST',
                                            dataType: 'json',
                                            data: { 
                                                    id_bitacora: id_bitacora,
                                                    zarpe: zarpe,
                                                    recalada: recalada,
                                                    hora_aceite_hytek: hora_aceite_hytek,
                                                    hora_filtro_hytek:hora_filtro_hytek,
                                                    horas_filtro_de_aire_mp:horas_filtro_de_aire_mp,
                                                    horas_aceite_mp:horas_aceite_mp,
                                                    hora_filtro_ac_mp:hora_filtro_ac_mp,
                                                    hora_filtro_petr_mp:hora_filtro_petr_mp,
                                                    hora_filtro_racor:hora_filtro_racor,
                                                    horas_aceite_cm:horas_aceite_cm,
                                                    hora_filtro_ac_cm:hora_filtro_ac_cm
                                                
                                                },
                                            success: function(data) {
                                                clearInterval(timerInterval);
                                                Swal.hideLoading();
                                                loadingSwal.close(); // Cerrar el SweetAlert2

                                          
                                                var respuesta = data.respuesta;
                                               
                                                if(respuesta == 'ok')
                                                {

                                                    Swal.fire({
                                                                position: 'top-end',
                                                                icon: 'success',
                                                                title: '¡Los cálculos se realizaron correctamente!',
                                                                showConfirmButton: false,
                                                                timer: 1500
                                                                })

                                                            var resultado_calculo = data.resultado_calculo;
                                                            var sema_resultado_calculo = data.sema_resultado_calculo;
                                                        

                                                            // Actualizar los valores de los campos de entrada
                                                            for (var key in resultado_calculo) {
                                                                if (resultado_calculo.hasOwnProperty(key)) {
                                                                    var inputElement = document.getElementById(key);
                                                                    if (inputElement) {
                                                                        
                                                                        inputElement.value = resultado_calculo[key];
                                                                    // alert(resultado_calculo[key]);
                                                                    }
                                                                }
                                                            }
                                                    
                                                            for (var key in sema_resultado_calculo) {
                                                            if (sema_resultado_calculo.hasOwnProperty(key)) {
                                                                var valor = sema_resultado_calculo[key];
                                                                var nombre_input = key.replace("sema_", "");
                                                                cambiarColorInput(nombre_input, valor);
                                                            }
                                                        }
                                            }else{

                                                
                                            Swal.fire({
                                                        icon: 'error',
                                                        title: 'Oops...',
                                                        text: 'no se realizan los calculos, por ser folio 1',
                                                        confirmButtonColor: '#3085d6',  // Cambia el color del botón de confirmación
                                                        });

                                            }

                                  



                                            },
                                            error: function(xhr, status, error) {
                                                clearInterval(timerInterval);
                                                Swal.hideLoading();
                                                loadingSwal.close(); // Cerrar el SweetAlert2
                                                console.error(error);
                                            }
                                        });

                            
                                    }else{

                                            Swal.fire({
                                                        icon: 'error',
                                                        title: 'Oops...',
                                                        text: 'Hora de zarpe debe ser menor que  hora de recalada',
                                                        confirmButtonColor: '#3085d6',  // Cambia el color del botón de confirmación
                                                        });


                                                            document.getElementById("horasmotor_principal_zarpe").value = "";
                                                            document.getElementById("horasmotor_principal_zarpe").focus();
                                                        }








                }
            });
        }


    //function cambiarColorInput(inputId, valor,duracion2) {
    function cambiarColorInput(inputId, valor) {

            // Calculamos la parte decimal restando la parte entera del número
            const parteDecimal = valor - Math.floor(valor);

            // Declaración de la variable donde almacenaremos el resultado redondeado
            let horasAceiteMp;

            // Comprobamos si la parte decimal es mayor o igual a 0.5
            if (parteDecimal >= 0.5) {
                // Redondeamos hacia arriba sumando 1 a la parte entera
                valor = Math.floor(valor) + 1;
            } else {
                // Mantenemos la parte entera sin cambios
                valor = Math.floor(valor);
            }


            horasmotor_principal_zarpe.readOnly     = true;
            horasmotor_principal_recalada.readOnly  = true;
            horas_contra_marcha.readOnly            = true;
            hora_de_hytek.readOnly                  = true;
            calcularButton.disabled                 = true;



        const botonGuardar = document.getElementById("guardar");
        botonGuardar.disabled = false; 


    var inputElement = document.getElementById(inputId);
   

    if (valor === 'verde' || valor === 'amarillo') {
        inputElement.style.backgroundColor = valor === 'verde' ? 'green' : 'yellow';
    } else {
        var valorNum = parseFloat(valor);
        
    

        
        if (!isNaN(valorNum)) {
            
               // if (valorNum <= 10   || duracion2 <0) {
                if (valorNum <= 10  ) {
                inputElement.style.border = '1px solid #ef9a9a';
                inputElement.style.backgroundColor = '#efd9db';
                inputElement.style.color = '#c62828';

               
               
            } else if (valorNum >= 11 && valorNum <= 49) {
                //inputElement.style.backgroundColor = 'yellow';
                inputElement.style.border = '1px solid #e0e087';
                inputElement.style.backgroundColor = '#fff9db';
                inputElement.style.color = '#b8a632';


            } else if (valorNum >= 50 && valorNum <= 100) {
                //inputElement.style.backgroundColor = 'green';

                inputElement.style.border = '1px solid #a0dca0';
                inputElement.style.backgroundColor = '#d7f9d7';
                inputElement.style.color = '#3a873a';

            } else {
                inputElement.style.backgroundColor = '';
            }
        } else {
            inputElement.style.backgroundColor = '';
        }
    }

}

 
 
</script>