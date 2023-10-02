

<div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">ESTADOS DE EQUIPO Y ALARMA</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form action="{{ route('bdm_mantenedores.estados_de_equipo_y_alarma_guardar') }}" method="post">
                  @csrf
                  <div class="modal-body">
                  <input type="hidden" name="id_bitacora" id="id_bitacora" value="{{$id}}">
                    
                  <div class="table-responsive-xl form-row">
                    <table class="table class="form-group col-md-2">
                      
                        <thead class="thead-dark">
                          <tr>
                           
                            <th scope="col" style="min-width: 100px;">SISTEMA ELECTRONICO</th>
                            <th scope="col" ></th>
                            <th scope="col"style="min-width: 100px;">EQUIPO DE PESCA</th>
                            <th scope="col" ></th>
                        
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Alternador Motor Principal</th>
                                        <td style="padding: 1px;">
                                        

                                      <select name="alternador_mp" id="alternador_mp" class="form-control" required>
                                        <option value="">Seleccionar Opción</option>
                                        @if (empty($estados_de_equipo_y_alarma))
                                              @foreach ($estados_equipoyalarma as $m)
                                                  <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                              @endforeach
                                        @else
                                          @foreach ($estados_equipoyalarma as $E)
                                            <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->alternador_mp == $E->id) ? 'selected' : '' }}>
                                              {{ $E->nombre }}
                                            </option>
                                          @endforeach
                                        @endif
                                      </select>
                          
                                      
                                      
                                      </td>                                          
                                        <th scope="col">Bomba De Pescado  </th>
                                            <td style="padding: 1px;">
                                                <select name="bba_pescado" id="bba_pescado" class="form-control" required>
                                                <option value="">Seleccionar Opción</option>
                                                @if (empty($estados_de_equipo_y_alarma))
                                                      @foreach ($estados_equipoyalarma as $m)
                                                          <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                      @endforeach
                                                @else
                                                  @foreach ($estados_equipoyalarma as $E)
                                                    <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->bba_pescado == $E->id) ? 'selected' : '' }}>
                                                      {{ $E->nombre }}
                                                    </option>
                                                  @endforeach
                                                @endif
                                              </select>

                                        
                                          </td>                                          
                                    
                                      </tr>
                                </thead>
                            </td>     
                        </tr>
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Alternador Motor Auxiliar</th>
                                        <td style="padding: 1px;">
                                              <select name="alternador_ma" id="alternador_ma" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->alternador_ma == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                        </td>                         
                                        <th scope="col">Winche</th>
                                        <td style="padding: 1px;">
                                                    <select name="winche" id="winche" class="form-control" required>
                                                        <option value="">Seleccionar Opción</option>
                                                        @if (empty($estados_de_equipo_y_alarma))
                                                              @foreach ($estados_equipoyalarma as $m)
                                                                  <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                              @endforeach
                                                        @else
                                                          @foreach ($estados_equipoyalarma as $E)
                                                            <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->winche == $E->id) ? 'selected' : '' }}>
                                                              {{ $E->nombre }}
                                                            </option>
                                                          @endforeach
                                                        @endif
                                                      </select>
                                        
                                        
                                        
                                      </td>                                          
                                    
                                      </tr>
                                </thead>
                            </td>     
                        </tr>
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Luces</th>
                                        <td style="padding: 1px;">
                                               <select name="luces" id="luces" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->luces == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                        </td>                                         
                                        <th scope="col">Net Winch.</th>
                                        <td style="padding: 1px;">
                                                <select name="anet_winch" id="anet_winch" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->anet_winch == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                          </td>                                          
                                    
                                      </tr>
                                </thead>
                            </td>     
                        </tr>
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Baterias.</th>
                                        <td style="padding: 1px;">
                                              <select name="baterias" id="baterias" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->baterias == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                        </td>                                          
                                        <th scope="col">Net Stacker</th>
                                        <td style="padding: 1px;">

                                        <select name="net_stacker" id="net_stacker" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->net_stacker == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>

                                       </td>                                          
                                    
                                      </tr>
                                </thead>
                            </td>     
                        </tr>
           
                        </tbody>
                      </table>
                  </div>



                  <div class="table-responsive-xl form-row">
                    <table class="table class="form-group col-md-2">
                       
                        <thead class="thead-dark">
                          <tr>
                           
                            <th scope="col" style="min-width: 100px;">VARIOS</th>
                            <th scope="col" ></th>
                            <th scope="col" style="min-width: 100px;">ALARMA</th>
                            <th scope="col" ></th>
                        
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Gobierno</th>
                                        <td style="padding: 1px;">
                                              <select name="gobierno" id="gobierno" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->gobierno == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                              
                                          </td>                                          
                                        <th scope="col">Racel</th>
                                        <td style="padding: 1px;">
                                            <select name="racel" id="racel" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->racel == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                                                                        
                                        </td>                                          
                                    
                                      </tr>
                                </thead>
                            </td>     
                        </tr>
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Propulsión</th>
                                        <td style="padding: 1px;">
                                              <select name="propulsion" id="propulsion" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->propulsion == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                             </td>                                          
                                        <th scope="col">Sentina</th>
                                          <td style="padding: 1px;">
                                              <select name="sentina" id="sentina" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->sentina == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                          </td>                                          
                                    
                                      </tr>
                                </thead>
                            </td>     
                        </tr>
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Bomba De Archique</th>
                                        <td style="padding: 1px;">
                                              <select name="bra_archique" id="bra_archique" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->bra_archique == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                        </td>                                          
                                        <th scope="col">Presión motor principal</th>
                                        <td style="padding: 1px;">
                                                <select name="p_mp" id="p_mp" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->p_mp == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                                
                                                
                                               </td>                                          
                                    
                                      </tr>
                                </thead>
                            </td>     
                        </tr>
                        <tr>
                            <td style="padding: 1px;" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Estanques</th>
                                            <td style="padding: 1px;">
                                                <select name="estanque" id="estanque" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->estanque == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                             </td>                                          
                                        <th scope="col">Temperatura motor principal</th>
                                        <td style="padding: 1px;">
                                                <select name="t_mp" id="t_mp" class="form-control" required>
                                                  <option value="">Seleccionar Opción</option>
                                                  @if (empty($estados_de_equipo_y_alarma))
                                                        @foreach ($estados_equipoyalarma as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                                        @endforeach
                                                  @else
                                                    @foreach ($estados_equipoyalarma as $E)
                                                      <option value="{{ $E->id }}" {{ ($estados_de_equipo_y_alarma->t_mp == $E->id) ? 'selected' : '' }}>
                                                        {{ $E->nombre }}
                                                      </option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                          </td>                                          
                                    
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


