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
                  <h5 class="modal-title" id="exampleModalLabel">Motor Auxiliar Babor </h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                
                <form action="{{ route('bdm_mantenedores.m_aux_babor_guardar') }}" method="post">
                  @csrf
                  <div class="modal-body">
                    
           

                  <input type="hidden" name="id_bitacora" id="id_bitacora" value="{{$id}}">
 

             
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
                                                  @if (empty($m_aux_babor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($m_aux_babor->naceite_0004 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                              
                                            </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_0004" id="taceite_0004"   value="{{ $m_aux_babor->taceite_0004 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_0004"    id="volt_0004"      value="{{ $m_aux_babor->volt_0004 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_0004"     id="amp_0004"       value="{{ $m_aux_babor->amp_0004 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_0004"  id="ciclos_0004"    value="{{ $m_aux_babor->ciclos_0004 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          
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
                                                  @if (empty($m_aux_babor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($m_aux_babor->naceite_0408 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                                
                                                
                                          </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_0408" id="taceite_0408"   value="{{ $m_aux_babor->taceite_0408 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_0408"    id="volt_0408"      value="{{ $m_aux_babor->volt_0408 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_0408"     id="amp_0408"       value="{{ $m_aux_babor->amp_0408 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_0408"  id="ciclos_0408"    value="{{ $ciclos_0408->naceite_0004 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          
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
                                                  @if (empty($m_aux_babor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($m_aux_babor->naceite_0812 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>

                                          </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_0812"   id="taceite_0812"   value="{{ $m_aux_babor->taceite_0812 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_0812"      id="volt_0812"      value="{{ $m_aux_babor->volt_0812 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_0812"       id="amp_0812"       value="{{ $m_aux_babor->amp_0812 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_0812"    id="ciclos_0812"    value="{{ $m_aux_babor->ciclos_0812 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          
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
                                                  @if (empty($m_aux_babor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($m_aux_babor->naceite_1216 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                                
                                                
                                          </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_1216" id="taceite_1216"   value="{{ $m_aux_babor->taceite_1216 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_1216"    id="volt_1216"      value="{{ $m_aux_babor->volt_1216 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_1216"     id="amp_1216"       value="{{ $m_aux_babor->amp_1216 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_1216"  id="ciclos_1216"    value="{{ $m_aux_babor->ciclos_1216 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          
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
                                                  @if (empty($m_aux_babor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($m_aux_babor->naceite_1620 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                                
                                                
                                          </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_1620" id="taceite_1620"   value="{{ $m_aux_babor->taceite_1620 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_1620"    id="volt_1620"      value="{{ $m_aux_babor->volt_1620 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_1620"     id="amp_1620"       value="{{ $m_aux_babor->amp_1620 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_1620"  id="ciclos_1620"    value="{{ $m_aux_babor->ciclos_1620 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          
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
                                                  @if (empty($m_aux_babor))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($m_aux_babor->naceite_2024 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                          
                                          
                                         </td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="taceite_2024" id="taceite_2024"   value="{{ $m_aux_babor->taceite_2024 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="volt_2024"    id="volt_2024"      value="{{ $m_aux_babor->volt_2024 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="amp_2024"     id="amp_2024"       value="{{ $m_aux_babor->amp_2024 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  type="text" oninput="limitarDigitos(this, 5)" class="form-control" name="ciclos_2024"  id="ciclos_2024"    value="{{ $m_aux_babor->ciclos_2024 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          
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


