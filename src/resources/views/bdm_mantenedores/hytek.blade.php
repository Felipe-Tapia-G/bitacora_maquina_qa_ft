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
                  <h5 class="modal-title" id="exampleModalLabel">Hytek {{$id}}</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                
                <form action="{{ route('bdm_mantenedores.hytek_guardar') }}" method="post">
                  @csrf
                  <div class="modal-body">
                  <input type="hidden" name="id_bitacora" id="id_bitacora" value="{{$id}}">
                    <div class="table-responsive-xl form-row">
                    <table class="table class="form-group col-md-2">
                       
                        <thead class="thead-dark">
                          <tr>
                           
                         
                          <th scope="col" style="min-width: 70px; position: sticky; left: 0; z-index: 1;">Guardia</th> 
                            <th scope="col" style="min-width: 80px;">Nivel De Aceite</th>
                            <th scope="col" style="min-width: 80px">Presión De Aceite</th>
                            <th scope="col" style="min-width: 80px;">Temperatura De Aceite</th>
                        
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
                                                  @if (empty($hytek))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($hytek->naceite_0004 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                              
                                             </td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="paceite_0004" id="paceite_0004" value="{{ $hytek->paceite_0004 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="aceite_0004"  id="aceite_0004"  value="{{ $hytek->aceite_0004 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
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
                                                  @if (empty($hytek))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($hytek->naceite_0408 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                              
                                              
                                              </td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="paceite_0408" id="paceite_0408" value="{{ $hytek->paceite_0408 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="aceite_0408"  id="aceite_0408"  value="{{ $hytek->aceite_0408 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
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
                                                  @if (empty($hytek))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($hytek->naceite_0812 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                              </td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="paceite_0812" id="paceite_0812" value="{{ $hytek->paceite_0812 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="aceite_0812"  id="aceite_0812"  value="{{ $hytek->aceite_0812 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
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
                                                  @if (empty($hytek))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($hytek->naceite_1216 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                              
                                              
                                          </td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="paceite_1216" id="paceite_1216" value="{{ $hytek->paceite_1216 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="aceite_1216"  id="aceite_1216"  value="{{ $hytek->aceite_1216 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
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
                                                  @if (empty($hytek))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($hytek->naceite_1620 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                              
                                          </td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="paceite_1620" id="paceite_1620" value="{{ $hytek->paceite_1620 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="aceite_1620"  id="aceite_1620"  value="{{ $hytek->aceite_1620 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
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
                                                  @if (empty($hytek))
                                                        @foreach ($niveles_aceites as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($niveles_aceites as $E)
                                                      <option value="{{ $E->id }}" {{ ($hytek->naceite_2024 == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                          
                                          </td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="paceite_2024" id="paceite_2024" value="{{ $hytek->paceite_2024 ?? ''}}" autocomplete="off" step="1" min="0"  ></td>
                                          <td style="padding: 1px;"><input  oninput="limitarDigitos(this, 5)" type="text" class="form-control" name="aceite_2024"  id="aceite_2024"  value="{{ $hytek->aceite_2024 ?? ''}}"  autocomplete="off" step="1" min="0"  ></td>
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


