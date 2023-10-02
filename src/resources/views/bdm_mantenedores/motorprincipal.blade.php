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
                  <h5 class="modal-title" id="exampleModalLabel">MOTOR PRINCIPAL  - ID: {{$id}}</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                
                <form action="{{ route('bdm_mantenedores.motorprincipal_guardar') }}" method="post">
                  @csrf
                  <div class="modal-body">
                    
           
                  <input type="hidden" name="id_bitacora" id="id_bitacora" value="{{$id}}">

 

              <div style="width: 100%; overflow-x: auto;"><!-- AGregando scroll-->
                    <div class="table-responsive-xl form-row">
                    <table class="table class="form-group col-md-2">
                       
                        <thead class="thead-dark">
                          <tr>
                           
                         
                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">Guardia</th> 
                            <th scope="col" style="min-width: 80px;">R.P.M</th>
                            <th scope="col" style="min-width: 103px">Nivel Aceite</th>
                            <th scope="col" style="min-width: 80px;">Relleno</th>
                            <th scope="col" style="min-width: 80px;">Presión Aceite</th>
                            <th scope="col" style="min-width: 80px;">Temperatura  Aceite</th>
                            <th scope="col" style="min-width: 80px;">Voltaje bateria</th>
                            <th scope="col" style="min-width: 82px;">Temperatura Escape Babor</th>
                            <th scope="col" style="min-width: 82px;">Temperatura Escape Estribor</th>
                            <th scope="col" style="min-width: 82px;">Temperatura admision general</th>

                            <th scope="col" style="min-width: 82px;">Presión Aire </th>
                            <th scope="col" style="min-width: 82px;">Presión Agua</th>
                            <th scope="col" style="min-width: 82px;">Presión Combustible </th>
                           
                            
                          </tr>
                        </thead>
                       
                        <tbody>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">00-04</th>
                                          <td style="padding: 1px;"><input type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="rpm_0004"       id="rpm_0004"       value="{{ $motor_principal->rpm_0004 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;">

             


                                                  <select name="naceite_0004" id="naceite_0004" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_principal))
                                                        @foreach ($niveles_de_aceite as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_de_aceite as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_principal->naceite_0004 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>




                                          </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="relleno_0004"   id="relleno_0004"   value="{{ $motor_principal->relleno_0004 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aceite_0004"   id="presion_aceite_0004"   value="{{ $motor_principal->presion_aceite_0004 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="voltaje_bateria_0004"    id="voltaje_bateria_0004"    value="{{ $motor_principal->voltaje_bateria_0004 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_aceite_0004"       id="temperatura_aceite_0004"       value="{{ $motor_principal->temperatura_aceite_0004 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_babor_0004"     id="temperatura_escape_babor_0004"     value="{{ $motor_principal->temperatura_escape_babor_0004 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_estribor_0004"     id="temperatura_escape_estribor_0004"     value="{{ $motor_principal->temperatura_escape_estribor_0004 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_admision_general_0004"     id="temperatura_admision_general_0004"     value="{{ $motor_principal->temperatura_admision_general_0004 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>

                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aire_0004"     id="presion_aire_0004"     value="{{ $motor_principal->presion_aire_0004 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_agua_0004"     id="presion_agua_0004"     value="{{ $motor_principal->presion_agua_0004 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input   type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_combustible_0004"     id="presion_combustible_0004"     value="{{ $motor_principal->presion_combustible_0004 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                     
                                        </tr>
                                  </thead>
                            </td> 
                          </tr>
                   
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                        <tr>
                                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">04-08</th>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="rpm_0408"       id="rpm_0408"       value="{{ $motor_principal->rpm_0408 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;">
                                                

                                                  <select name="naceite_0408" id="naceite_0408" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_principal))
                                                        @foreach ($niveles_de_aceite as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_de_aceite as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_principal->naceite_0408 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>



                                          </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="relleno_0408"   id="relleno_0408"   value="{{ $motor_principal->relleno_0408 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aceite_0408"   id="presion_aceite_0408"   value="{{ $motor_principal->presion_aceite_0408 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="voltaje_bateria_0408"    id="voltaje_bateria_0408"    value="{{ $motor_principal->voltaje_bateria_0408 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_aceite_0408"       id="temperatura_aceite_0408"       value="{{ $motor_principal->temperatura_aceite_0408 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_babor_0408"     id="temperatura_escape_babor_0408"     value="{{ $motor_principal->temperatura_escape_babor_0408 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_estribor_0408"     id="temperatura_escape_estribor_0408"     value="{{ $motor_principal->temperatura_escape_estribor_0408 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_admision_general_0408"     id="temperatura_admision_general_0408"     value="{{ $motor_principal->temperatura_admision_general_0408 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>

                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aire_0408"     id="presion_aire_0408"     value="{{ $motor_principal->presion_aire_0408 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_agua_0408"     id="presion_agua_0408"     value="{{ $motor_principal->presion_agua_0408 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_combustible_0408"     id="presion_combustible_0408"     value="{{ $motor_principal->presion_combustible_0408 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                        </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                        <tr>
                                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">08-12</th>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="rpm_0812"       id="rpm_0812"       value="{{ $motor_principal->rpm_0812 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;">


                                              <select name="naceite_0812" id="naceite_0812" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_principal))
                                                        @foreach ($niveles_de_aceite as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_de_aceite as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_principal->naceite_0812 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>




                                          </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="relleno_0812"   id="relleno_0812"   value="{{ $motor_principal->relleno_0812 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aceite_0812"   id="presion_aceite_0812"   value="{{ $motor_principal->presion_aceite_0812 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="voltaje_bateria_0812"    id="voltaje_bateria_0812"    value="{{ $motor_principal->voltaje_bateria_0812 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_aceite_0812"       id="temperatura_aceite_0812"       value="{{ $motor_principal->temperatura_aceite_0812 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_babor_0812"     id="temperatura_escape_babor_0812"     value="{{ $motor_principal->temperatura_escape_babor_0812 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_estribor_0812"     id="temperatura_escape_estribor_0812"     value="{{ $motor_principal->temperatura_escape_estribor_0812 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_admision_general_0812"     id="temperatura_admision_general_0812"     value="{{ $motor_principal->temperatura_admision_general_0812 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>

                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aire_0812"     id="presion_aire_0812"     value="{{ $motor_principal->presion_aire_0812 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_agua_0812"     id="presion_agua_0812"     value="{{ $motor_principal->presion_agua_0812 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_combustible_0812"     id="presion_combustible_0812"     value="{{ $motor_principal->presion_combustible_0812 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                        </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                  <tr>
                                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">12-16</th>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="rpm_1216"       id="rpm_1216"       value="{{ $motor_principal->rpm_1216 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;">


                                              <select name="naceite_1216" id="naceite_1216" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_principal))
                                                        @foreach ($niveles_de_aceite as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_de_aceite as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_principal->naceite_1216 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>



                                          </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="relleno_1216"   id="relleno_1216"   value="{{ $motor_principal->relleno_1216 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aceite_1216"   id="presion_aceite_1216"   value="{{ $motor_principal->presion_aceite_1216 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="voltaje_bateria_1216"    id="voltaje_bateria_1216"    value="{{ $motor_principal->voltaje_bateria_1216 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_aceite_1216"       id="temperatura_aceite_1216"       value="{{ $motor_principal->temperatura_aceite_1216 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_babor_1216"     id="temperatura_escape_babor_1216"     value="{{ $motor_principal->temperatura_escape_babor_1216 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_estribor_1216"     id="temperatura_escape_estribor_1216"     value="{{ $motor_principal->temperatura_escape_estribor_1216 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_admision_general_1216"     id="temperatura_admision_general_1216"     value="{{ $motor_principal->temperatura_admision_general_1216 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>

                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aire_1216"     id="presion_aire_1216"     value="{{ $motor_principal->presion_aire_1216 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_agua_1216"     id="presion_agua_1216"     value="{{ $motor_principal->presion_agua_1216 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_combustible_1216"     id="presion_combustible_1216"     value="{{ $motor_principal->presion_combustible_1216 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                        </tr>
                                  </thead>
                            </td> 
                          </tr>

                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                        <tr>
                                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">16-20</th>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="rpm_1620"       id="rpm_1620"       value="{{ $motor_principal->rpm_1620 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;">

                                                  

                                              <select name="naceite_1620" id="naceite_1620" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_principal))
                                                        @foreach ($niveles_de_aceite as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_de_aceite as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_principal->naceite_1620 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>


                                          </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="relleno_1620"   id="relleno_1620"   value="{{ $motor_principal->relleno_1620 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aceite_1620"   id="presion_aceite_1620"   value="{{ $motor_principal->presion_aceite_1620 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="voltaje_bateria_1620"    id="voltaje_bateria_1620"    value="{{ $motor_principal->voltaje_bateria_1620 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_aceite_1620"       id="temperatura_aceite_1620"       value="{{ $motor_principal->temperatura_aceite_1620 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_babor_1620"     id="temperatura_escape_babor_1620"     value="{{ $motor_principal->temperatura_escape_babor_1620 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_estribor_1620"     id="temperatura_escape_estribor_1620"     value="{{ $motor_principal->temperatura_escape_estribor_1620 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_admision_general_1620"     id="temperatura_admision_general_1620"     value="{{ $motor_principal->temperatura_admision_general_1620 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>

                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aire_1620"     id="presion_aire_1620"     value="{{ $motor_principal->presion_aire_1620 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_agua_1620"     id="presion_agua_1620"     value="{{ $motor_principal->presion_agua_1620 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_combustible_1620"     id="presion_combustible_1620"     value="{{ $motor_principal->presion_combustible_1620 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                        
                                        </tr>
                                  </thead>
                            </td> 
                          </tr>
                          <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                        <tr>
                                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">20-24</th>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="rpm_2024"       id="rpm_2024"       value="{{ $motor_principal->rpm_2024 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;">



                                                  <select name="naceite_2024" id="naceite_2024" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_principal))
                                                        @foreach ($niveles_de_aceite as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_de_aceite as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_principal->naceite_2024 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>



                                          </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="relleno_2024"   id="relleno_2024"   value="{{ $motor_principal->relleno_2024 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aceite_2024"   id="presion_aceite_2024"   value="{{ $motor_principal->presion_aceite_2024 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="voltaje_bateria_2024"    id="voltaje_bateria_2024"    value="{{ $motor_principal->voltaje_bateria_2024 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_aceite_2024"       id="temperatura_aceite_2024"       value="{{ $motor_principal->temperatura_aceite_2024 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_babor_2024"     id="temperatura_escape_babor_2024"     value="{{ $motor_principal->temperatura_escape_babor_2024 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_escape_estribor_2024"     id="temperatura_escape_estribor_2024"     value="{{ $motor_principal->temperatura_escape_estribor_2024 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="temperatura_admision_general_2024"     id="temperatura_admision_general_2024"     value="{{ $motor_principal->temperatura_admision_general_2024 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>

                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_aire_2024"     id="presion_aire_2024"     value="{{ $motor_principal->presion_aire_2024 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_agua_2024"     id="presion_agua_2024"     value="{{ $motor_principal->presion_agua_2024 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="presion_combustible_2024"     id="presion_combustible_2024"     value="{{ $motor_principal->presion_combustible_2024 ?? ''}}"   autocomplete="off" step="1" min="0"  ></td>
                                        
                                        </tr>
                                  </thead>
                            </td> 
                          </tr>


                        
                        </tbody>
                      </table>
                      </div> <!-- fin de scroll-->  
                  </div>



                  <div class="modal-footer">
                    <button class="btn  btn-outline-dark" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-dark" type="submit">Guardar</button>
                  </div>
                </form>
              </div>
            </div>


