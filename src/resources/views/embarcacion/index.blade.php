@extends('layout.template')
@section('titulo','Embarcaciones (PAM)')

@section('contenido')
  
  <div class="toolbar" style="float:left">
    <a href='{{ route('embarcacion.create') }}' data-toggle="modal" data-target="#mymodal19" class="btn btn-sm btn-dark btn-circle show">+</a>
  </div>

  <table class="table" id="dataTable">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Estado</th>
        <th class="text-center">CTRL</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($embarcacion as $E)
        <tr>
          <td>{{ $E->id }}</td>
          <td>{{ $E->nombre }}</td>
          <td>{{ $E->estado }}</td>
      


          <td class="text-center">
            <form action="{{ route('embarcacion.destroy',$E->id) }}" method="POST">
              
              <a href="{{ route('embarcacion.edit',$E) }}" class="btn btn-outline-dark show btn btn-sm  btn-circle " data-toggle="modal" data-target="#mymodal20"><i class="fas fa-pencil-alt"></i></a>
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
