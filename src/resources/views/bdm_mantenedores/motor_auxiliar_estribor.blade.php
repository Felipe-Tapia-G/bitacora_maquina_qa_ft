

<div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Motor Auxiliar Estribor {{$id}} </h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form action="{{ route('bdm_mantenedores.motor_auxiliar_estribor_guardar') }}" method="post">
                  @csrf
                  <div class="modal-body">
                    
                  <input type="hidden" name="id_bitacora" id="id_bitacora" value="{{$id}}" autocomplete="off">


 


                    <div class="table-responsive-xl form-row">
                    <table class="table class="form-group col-md-2">
                        
                        <thead class="thead-dark">
                          <tr>                           
                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">Guardia</th> 
                          <th scope="col" style="min-width: 80px">Nivel Aceite</th>
                            <th scope="col" style="min-width: 80px;">Temperatura Aceite</th>
                            <th scope="col" style="min-width: 80px;">Voltaje</th>
                            <th scope="col" style="min-width: 80px;">Amperaje</th>
                            <th scope="col" style="min-width: 80px;">Ciclos (hz)</th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                      <tr>
                          
                                        <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">00-04</th>
                                        <td style="padding: 1px;">
                                        
                                            <select name="naceite_0004" id="naceite_0004" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_auxiliar_estribor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_auxiliar_estribor->naceite_0004 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                                
                                        </td>
                                        <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_0004"  id="taceite_0004"  value="{{ $motor_auxiliar_estribor->taceite_0004 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                        <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_0004"     id="volt_0004"     value="{{ $motor_auxiliar_estribor->volt_0004 ?? ''}}"        autocomplete="off" step="1" min="0"  ></td>
                                        <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_0004"      id="amp_0004"      value="{{ $motor_auxiliar_estribor->amp_0004 ?? ''}}"         autocomplete="off" step="1" min="0"  ></td>
                                        <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_0004"   id="ciclos_0004"   value="{{ $motor_auxiliar_estribor->ciclos_0004 ?? ''}}"      autocomplete="off" step="1" min="0"  ></td>

                                        </tr>
                                  </thead>
                            </td> 
                        </tr>
                        <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                         <tr>
                                            <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">04-08</th>
                                            <td style="padding: 1px;">
                                            
                                            <select name="naceite_0408" id="naceite_0408" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_auxiliar_estribor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_auxiliar_estribor->naceite_0408 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>

                                            </td>
                                            <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_0408"  id="taceite_0408"  value="{{ $motor_auxiliar_estribor->taceite_0408 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                            <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_0408"     id="volt_0408"     value="{{ $motor_auxiliar_estribor->volt_0408 ?? ''}}"        autocomplete="off" step="1" min="0"  ></td>
                                            <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_0408"      id="amp_0408"      value="{{ $motor_auxiliar_estribor->amp_0408 ?? ''}}"         autocomplete="off" step="1" min="0"  ></td>
                                            <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_0408"   id="ciclos_0408"   value="{{ $motor_auxiliar_estribor->ciclos_0408 ?? ''}}"      autocomplete="off" step="1" min="0"  ></td>
                                          </tr>
                                  </thead>
                            </td> 
                        </tr>

                        <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                         <tr>
                                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">08-12</th>
                                            <td style="padding: 1px;">

                                                <select name="naceite_0812" id="naceite_0812" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_auxiliar_estribor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_auxiliar_estribor->naceite_0812 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                                
                                            </td>
                                            <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_0812"  id="taceite_0812"  value="{{ $motor_auxiliar_estribor->taceite_0812 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                            <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_0812"     id="volt_0812"     value="{{ $motor_auxiliar_estribor->volt_0812 ?? ''}}"        autocomplete="off" step="1" min="0"  ></td>
                                            <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_0812"      id="amp_0812"      value="{{ $motor_auxiliar_estribor->amp_0812 ?? ''}}"         autocomplete="off" step="1" min="0"  ></td>
                                            <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_0812"   id="ciclos_0812"   value="{{ $motor_auxiliar_estribor->ciclos_0812 ?? ''}}"      autocomplete="off" step="1" min="0"  ></td>
                                            </tr>
                                  </thead>
                            </td> 
                        </tr>

                        <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                         <tr>
                                            <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">12-16</th>
                                              <td style="padding: 1px;">
                                              
                                              <select name="naceite_1216" id="naceite_1216" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_auxiliar_estribor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_auxiliar_estribor->naceite_1216 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                                
                                              
                                              </td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_1216"  id="paceite_1216"  value="{{ $motor_auxiliar_estribor->taceite_1216 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_1216"     id="volt_1216"     value="{{ $motor_auxiliar_estribor->volt_1216 ?? ''}}"        autocomplete="off" step="1" min="0"  ></td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_1216"      id="amp_1216"      value="{{ $motor_auxiliar_estribor->amp_1216 ?? ''}}"         autocomplete="off" step="1" min="0"  ></td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_1216"   id="ciclos_1216"   value="{{ $motor_auxiliar_estribor->ciclos_1216 ?? ''}}"      autocomplete="off" step="1" min="0"  ></td>
                                              </tr>
                                  </thead>
                            </td> 
                        </tr>

                        <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                         <tr>
                                            <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">16-20</th>
                                            <td style="padding: 1px;">
                                              <select name="naceite_1620" id="naceite_1620" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_auxiliar_estribor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_auxiliar_estribor->naceite_1620 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                                
                                               </td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_1620"  id="taceite_1620"  value="{{ $motor_auxiliar_estribor->taceite_1620 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_1620"     id="volt_1620"     value="{{ $motor_auxiliar_estribor->volt_1620 ?? ''}}"        autocomplete="off" step="1" min="0"  ></td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_1620"      id="amp_1620"      value="{{ $motor_auxiliar_estribor->amp_1620 ?? ''}}"         autocomplete="off" step="1" min="0"  ></td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_1620"   id="ciclos_1620"   value="{{ $motor_auxiliar_estribor->ciclos_1620 ?? ''}}"      autocomplete="off" step="1" min="0"  ></td> 
                                              </tr>
                                  </thead>
                            </td> 
                        </tr>

                        <tr>
                            <td style="padding: 1px;" >
                                  <thead class="thead-dark">
                                         <tr>
                                            <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">20-24</th>
                                              <td style="padding: 1px;">
                                              

                                              <select name="naceite_2024" id="naceite_2024" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($motor_auxiliar_estribor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($motor_auxiliar_estribor->naceite_2024 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                                
                                              
                                               
                                               </td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_2024"  id="taceite_2024"  value="{{ $motor_auxiliar_estribor->taceite_2024 ?? ''}}"     autocomplete="off" step="1" min="0"  ></td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_2024"     id="volt_2024"     value="{{ $motor_auxiliar_estribor->volt_2024 ?? ''}}"        autocomplete="off" step="1" min="0"  ></td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_2024"      id="amp_2024"      value="{{ $motor_auxiliar_estribor->amp_2024 ?? ''}}"         autocomplete="off" step="1" min="0"  ></td>
                                              <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_2024"   id="ciclos_2024"   value="{{ $motor_auxiliar_estribor->ciclos_2024 ?? ''}}"      autocomplete="off" step="1" min="0"  ></td>
                                              </tr>
                                  </thead>
                            </td> 
                        </tr>
                        </tbody>
                      </table>
                  </div>



                  <div class="modal-footer">
                    <button class="btn  btn-outline-dark" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-dark" type="submit">Guardar</button>
                  </div>
                </form>
              </div>
            </div>


