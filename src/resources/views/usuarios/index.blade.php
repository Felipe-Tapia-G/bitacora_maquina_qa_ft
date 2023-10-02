@extends('layout.template')
@section('titulo','Usuarios')

@section('contenido')
  
  <div class="toolbar" style="float:left">
    <a href='{{ route('usuarios.create') }}' data-toggle="modal" data-target="#mymodal15" class="btn btn-sm btn-dark btn-circle show">+</a>
  </div>
  
  <table class="table" id="dataTable">
    <thead>
      <tr>
      <th>id</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Armador</th>
        <th>Perfil</th>
        <th>estado</th>

        <th class="text-center">CTRL</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($usuarios as $U)
        <tr>
          <td>{{ $U->id }}</td>
          <td>{{ $U->name }}</td>
          <td>{{ $U->email }}</td>
          <td>{{ $U->armador }}</td>
          <td>{{ $U->perfil }}</td>
          <td>{{ $U->estado }}</td>


          
          <td class="text-center">
            <form action="{{ route('usuarios.destroy',$U) }}" method="POST">
              
              <a href="{{ route('usuarios.edit',$U) }}" class="btn btn-outline-dark show btn btn-sm  btn-circle "  data-toggle="modal" data-target="#mymodal16"><i class="fas fa-pencil-alt"></i></a>
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
