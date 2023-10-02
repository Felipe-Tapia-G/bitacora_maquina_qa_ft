@extends('layout.template')
@section('titulo','Motoristas')

@section('contenido')
  
  <div class="toolbar" style="float:left">
    <a href="{{ route('motorista.create') }}" data-toggle="modal" data-target="#mymodal17" class="btn btn-sm btn-dark btn-circle show">+</a>
  </div>

  <table class="table" id="dataTable">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>RUT</th>
        <th>Estado</th>
        <th class="text-center">CTRL</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($motorista as $E)
        <tr>
          <td>{{ $E->id }}</td>
          <td>{{ $E->nombre }}</td>
          <td>{{ $E->rut }}</td>
          <td>{{ $E->estado }}</td>

          <td class="text-center">
            <form action="{{ route('motorista.destroy',$E->id) }}" method="POST">
              
              <a href="{{ route('motorista.edit',$E) }}" class="btn btn-outline-dark show btn btn-sm  btn-circle " data-toggle="modal" data-target="#mymodal18"><i class="fas fa-pencil-alt"></i></a>
              @csrf
              @method('delete')
              
              <button type="submit" title="delete" onclick="return confirm('¿Está seguro que desea eliminar este elemto?')" class="show btn btn-sm btn-danger btn-circle">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td>

        </tr>
      @endforeach
    </tbody>
  </table>
  
@endsection

