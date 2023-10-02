
<script>
  // Función para calcular el valor de petro_consumo
  function calcularPetroConsumo() {

    var stock_zarpe     = document.getElementById('petro_stock_zar').value;
    var stock_recalada  = document.getElementById('petro_stock_rec').value;
   

    if (stock_recalada !== '' && stock_zarpe !== '') {
      var stock_zarpe_int     = parseInt(stock_zarpe, 10);
      var stock_recalada_int  = parseInt(stock_recalada, 10);
      

      if(stock_zarpe_int < stock_recalada_int){

        swal({
              title: "¡Alerta!",
              text: "Stock recalada, debe ser mayor al Stock de zarpe.",
              icon: "warning",
              buttons: {
                confirm: {
                  text: "Aceptar",
                  className: "btn-black",
                },
              },
            });

            

      }


      if (!isNaN(stock_recalada_int) && !isNaN(stock_zarpe_int)) {
        var consumo = stock_zarpe_int-stock_recalada_int;
        if(consumo < 0)
        {
          consumo="";
          document.getElementById('petro_stock_rec').value = "";
          
        }
        document.getElementById('petro_consumo').value = consumo.toString();
        
      }
    }
  }


  function calcularAceiteMotorConsumo()
  {

    var stock_zarpe     = document.getElementById('aceitemotor_stock_zar').value;
    var stock_recalada  = document.getElementById('aceite_motor_stock_rec').value;
   

    if (stock_recalada !== '' && stock_zarpe !== '') {
      var stock_zarpe_int     = parseInt(stock_zarpe, 10);
      var stock_recalada_int  = parseInt(stock_recalada, 10);
      

      if(stock_zarpe_int < stock_recalada_int){

        swal({
              title: "¡Alerta!",
              text: "Stock recalada, debe ser mayor al Stock de zarpe.",
              icon: "warning",
              buttons: {
                confirm: {
                  text: "Aceptar",
                  className: "btn-black",
                },
              },
            });

            

      }


      if (!isNaN(stock_recalada_int) && !isNaN(stock_zarpe_int)) {
        var consumo = stock_zarpe_int-stock_recalada_int ;
        if(consumo < 0)
        {
          consumo="";
          document.getElementById('aceite_motor_stock_rec').value = "";
          
        }
        document.getElementById('aceite_motor_consumo').value = consumo.toString();
        
      }
    }
  }






  function calcularAceiteMotorHid()
  {

    var stock_zarpe     = document.getElementById('aceite_hid_stock_zar').value;
    var stock_recalada  = document.getElementById('aceite_hid_stock_rec').value;
   

    if (stock_recalada !== '' && stock_zarpe !== '') {
      var stock_zarpe_int     = parseInt(stock_zarpe, 10);
      var stock_recalada_int  = parseInt(stock_recalada, 10);
      

      if(stock_zarpe_int < stock_recalada_int){

        swal({
              title: "¡Alerta!",
              text: "Stock recalada, debe ser mayor al Stock de zarpe.",
              icon: "warning",
              buttons: {
                confirm: {
                  text: "Aceptar",
                  className: "btn-black",
                },
              },
            });

            

      }


      if (!isNaN(stock_recalada_int) && !isNaN(stock_zarpe_int)) {
        var consumo =   stock_zarpe_int -stock_recalada_int;
        if(consumo < 0)
        {
          consumo="";
          document.getElementById('aceite_hid_stock_rec').value = "";
          
        }
        document.getElementById('aceite_hid_consumo').value = consumo.toString();
        
      }
    }
  }



  function calcularGrasa()
  {

    var stock_zarpe     = document.getElementById('grasa_stock_zar').value;
    var stock_recalada  = document.getElementById('grasa_stock_rec').value;
   

    if (stock_recalada !== '' && stock_zarpe !== '') {
      var stock_zarpe_int     = parseInt(stock_zarpe, 10);
      var stock_recalada_int  = parseInt(stock_recalada, 10);
      

      if(stock_zarpe_int < stock_recalada_int){

        swal({
              title: "¡Alerta!",
              text: "Stock recalada, debe ser mayor al Stock de zarpe.",
              icon: "warning",
              buttons: {
                confirm: {
                  text: "Aceptar",
                  className: "btn-black",
                },
              },
            });

            

      }


      if (!isNaN(stock_recalada_int) && !isNaN(stock_zarpe_int)) {
        var consumo =  stock_zarpe_int-stock_recalada_int;
        if(consumo < 0)
        {
          consumo="";
          document.getElementById('grasa_stock_rec').value = "";
          
        }
        document.getElementById('grasa_consumo').value = consumo.toString();
        
      }
    }
  }



    // Agrega eventos onchange a los campos de fecha zarpe y recalada
    document.getElementById('petro_stock_rec').onchange = calcularPetroConsumo;
    document.getElementById('petro_stock_zar').onchange = calcularPetroConsumo;

    document.getElementById('aceite_motor_stock_rec').onchange = calcularAceiteMotorConsumo;
    document.getElementById('aceitemotor_stock_zar').onchange = calcularAceiteMotorConsumo;

    document.getElementById('aceite_hid_stock_rec').onchange = calcularAceiteMotorHid;
    document.getElementById('aceite_hid_stock_zar').onchange = calcularAceiteMotorHid;

    document.getElementById('grasa_stock_rec').onchange = calcularGrasa;
    document.getElementById('grasa_stock_zar').onchange = calcularGrasa;

    
                          



</script>





<div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Control De Insumos - ID: {{$id}}</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                
                <form action="{{ route('bdm_mantenedores.controldeinsumo_guardar') }}" method="post" id="miFormulario_control_de_insumos">
                  @csrf
                  <div class="modal-body">
                    
                  <input type="hidden" name="id_bitacora" id="id_bitacora" value="{{$id}}" autocomplete="off">


 


                    <div class="table-responsive-xl form-row">
                    <table class="table class="form-group col-md-2">
                       
                        <thead class="thead-dark">
                          <tr>
                           
                          <th scope="col" style="min-width: 140px; position: sticky; left: 0; z-index: 1;">Insumo</th>  
                            
                            
                            <th scope="col" style="min-width: 90px;">Stock Zarpe</th>
                            <th scope="col" style="min-width: 90px">Stock Recalada</th>
                            <th scope="col" style="min-width: 90px;">Consumo</th>


                            <th scope="col" style="min-width: 90px;">Pedido Lts</th>
                            <th scope="col" style="min-width: 90px;">Numero Guía</th>
                        
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">Petróleo (Litros)</th>
                                              <td style="padding: 1px;"><input type="text" class="form-control" name="petro_stock_zar"   id="petro_stock_zar"    value="{{ $control_de_insumo->petro_stock_zar ?? '' }}"   autocomplete="off" step="1" min="0" required oninput="limitarDigitos(this, 5)"></td>
                                              <td style="padding: 1px;"><input type="text" class="form-control" name="petro_stock_rec"   id="petro_stock_rec"    value="{{ $control_de_insumo->petro_stock_rec ?? '' }}"   autocomplete="off" step="1" min="0" required oninput="limitarDigitos(this, 5)" ></td>
                                              <td style="padding: 1px;"><input type="text" class="form-control" name="petro_consumo"     id="petro_consumo"      value="{{ $control_de_insumo->petro_consumo ?? '' }}"     autocomplete="off" step="1" min="0" required oninput="limitarDigitos(this, 5)" readonly></td>
                                              <td style="padding: 1px;"><input type="text" class="form-control" name="petro_pedido_lts"  id="petro_pedido_lts"   value="{{ $control_de_insumo->petro_pedido_lts ?? ''}}"   autocomplete="off" step="1" min="0" required oninput="limitarDigitos(this, 5)"  ></td>
                                              <td style="padding: 1px;"><input type="text" class="form-control" name="petro_guia"        id="petro_guia"         value="{{ $control_de_insumo->petro_guia ?? ''}}"         autocomplete="off" step="1" min="0"  oninput="limitarDigitos(this, 5)"  ></td>
                                          
                                      </tr>
                                  </thead>
                            </td> 
                          </tr>

                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">Aceite Motor (Litros)</th>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="aceitemotor_stock_zar"    id="aceitemotor_stock_zar"   value="{{ $control_de_insumo->aceitemotor_stock_zar ?? ''}}"   autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)" required ></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="aceite_motor_stock_rec"   id="aceite_motor_stock_rec"  value="{{ $control_de_insumo->aceite_motor_stock_rec ?? ''}}"  autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)" required ></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="aceite_motor_consumo"     id="aceite_motor_consumo"    value="{{ $control_de_insumo->aceite_motor_consumo ?? ''}}"    autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)" readonly ></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="aceite_motor_pedido_lts"  id="aceite_motor_pedido_lts" value="{{ $control_de_insumo->aceite_motor_pedido_lts ?? ''}}" autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)"  ></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="aceite_motor_guia"        id="aceite_motor_guia"       value="{{ $control_de_insumo->aceite_motor_guia ?? ''}}"       autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)"  ></td>

                                      </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">Aceite Hid (Litros)</th>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="aceite_hid_stock_zar" id="aceite_hid_stock_zar"               value="{{ $control_de_insumo->aceite_hid_stock_zar ?? ''}}" autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)" required ></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="aceite_hid_stock_rec" id="aceite_hid_stock_rec"               value="{{ $control_de_insumo->aceite_hid_stock_rec ?? ''}}" autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)" required ></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="aceite_hid_consumo" id="aceite_hid_consumo"                   value="{{ $control_de_insumo->aceite_hid_consumo ?? ''}}"   autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)" readonly ></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="aceite_hid_stock_pedido_lts" id="aceite_hid_stock_pedido_lts" value="{{ $control_de_insumo->aceite_hid_stock_pedido_lts ?? ''}}" autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)" ></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="aceite_hid_guia" id="aceite_hid_guia"                         value="{{ $control_de_insumo->aceite_hid_guia ?? ''}}" autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)" ></td>
                                         
                                       </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">Grasa (kilos)</th>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="grasa_stock_zar" id="grasa_stock_zar"       value="{{ $control_de_insumo->grasa_stock_zar ?? ''}}"  autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)"  ></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="grasa_stock_rec" id="grasa_stock_rec"       value="{{ $control_de_insumo->grasa_stock_rec ?? ''}}"  autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)"  ></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="grasa_consumo" id="grasa_consumo"           value="{{ $control_de_insumo->grasa_consumo ?? ''}}"    autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)"  readonly></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="grasa_pedido" id="grasa_pedido"             value="{{ $control_de_insumo->grasa_pedido ?? ''}}"     autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)"  ></td>
                                          <td style="padding: 1px;"><input type="text" class="form-control" name="grasa_guia" id="grasa_guia"                 value="{{ $control_de_insumo->grasa_guia ?? ''}}"       autocomplete="off" step="1" min="0" oninput="limitarDigitos(this, 5)"  ></td>
                                          
                                      </tr>
                                  </thead>
                            </td> 
                          </tr>


                        
                        </tbody>
                      </table>
                  </div>



                  <div class="modal-footer">
                    <button class="btn  btn-outline-dark" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-dark" type="submit" onclick="valida_grasa()">Guardar</button>
                  </div>
                </form>
              </div>
            </div>


  <script>
    function valida_grasa() {
      

      var grasa_stock_zar  = document.getElementById('grasa_stock_zar').value;
      var grasa_stock_rec  = document.getElementById('grasa_stock_rec').value;
     if((grasa_stock_zar == "" ||  grasa_stock_rec=="") )
     {
      document.getElementById('grasa_consumo').value = '';
      document.getElementById('grasa_stock_zar').value = '';
      document.getElementById('grasa_stock_rec').value = '';
     }
     document.getElementById("miFormulario_control_de_insumos").submit(); // Envía el formulario
   
        
    }
</script>