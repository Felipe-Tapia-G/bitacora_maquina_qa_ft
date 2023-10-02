@extends('layout.template')
@section('titulo','BITACORA DE MAQUINA  ')

@section('contenido')
<style>
  .btn.btn-dark.show.red-button {
    background-color: #dc3545;
    color: #fff;
  }

  .btn.btn-dark.show.red-button:hover {
    background-color: #fff;
    color: #dc3545;
  }
</style>



<div class="toolbar" style="float:left">

<a href="{{ route('bdm_mantenedores.bitacora_c') }}" data-toggle="modal" data-target="#mymodal" class="btn btn-sm btn-dark show red-button">
  + Crear Nueva Bitacora
</a>







  </div>

  <div class="toolbar" style="float:left">

  </div>



<!-- tabla-->

  <table class="table" id="dataTable">
  <thead class="thead-dark">
      <tr>
        <th>Id</th>
        <th>EMBARCACIÓN</th>
        <th>FOLIO</th>
        <th>FECHA ZARPE</th>
        <th>FECHA RECALADA</th>
        <th>MOTORISTA</th>

        <th>HORAS NAVEGACIÓN</th>
        <th>HORAS OPERACIÓN</th>

        <th>CREADOR</th>
        @if(Auth::user()->perfil==2 || Auth::user()->perfil==100 )
        <th class="text-center">PDF</th>
        @else
          <th class="text-center">Opciones</th>
        @endif

      </tr>
    </thead>
    <tbody>
      @foreach ($bitacora as $E)
        <tr>
          <td>{{ $E->id }}</td>
          <td>{{ $E->pam }}</td>
          <td>
            @if($E->folio)
              {{ $E->folio }}
            @else
              <span style="color: red;">Sin folio</span>
            @endif
          </td>

          <td>{{ $E->fecha_zarpe }}</td>
          <td>{{ $E->fecha_recalada }}</td>
          <td>{{ $E->motorista }}</td>

          <td>{{ $E->horas_navegac }}</td>
          <td>{{ $E->horas_operac }}</td>
          <td>
            {{ $E->name }} <br>
            {{ $E->created_at->format('d/m/Y H:i:s') }}

          </td>










          <td class="text-center">


            <a   target="_blank" href="{{ route('pdf', $E->id) }}" class="btn btn-outline-danger  btn btn-sm  btn-circle " >  Pdf</a>



            @if((Auth::user()->perfil != 1)  ||  ($E->estado != 2 ))
            <a href="{{ route('bitacora_detalles.index',$E->id) }}"   type="button" class="btn btn-outline-dark show btn btn-sm  btn-circle " ><i class="fas fa-pencil-alt"></i></a>
            @endif




          </td>


        </tr>
      @endforeach
    </tbody>
  </table>


@endsection


