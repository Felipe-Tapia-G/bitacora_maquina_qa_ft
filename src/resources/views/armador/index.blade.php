@extends('layout.template')
@section('titulo','Armadores')

@section('contenido')
  
  <div class="toolbar" style="float:left">
    <a href='{{ route('armador.create') }}' data-toggle="modal" data-target="#mymodal12" class="btn btn-sm btn-dark btn-circle show">+</a>
  </div>
  
  <table class="table" id="dataTable">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($armadores as $E)
        <tr>
          <td>{{ $E->id }}</td>
          <td>{{ $E->nombre }}</td>
          <td>{{ $E->estado }}</td>
    
          
          <td class="text-center">
            <form action="{{ route('armador.destroy',$E) }}" method="POST">
              
              <a href="{{ route('armador.edit',$E) }}" class="btn btn-outline-dark show btn btn-sm  btn-circle "  data-toggle="modal" data-target="#mymodal13"><i class="fas fa-pencil-alt"></i></a>
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
