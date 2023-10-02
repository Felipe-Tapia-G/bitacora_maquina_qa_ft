@extends('layout.template')

@section('titulo', 'Sin Acceso')

@section('contenido')

<div class="card text-center">
  <div class=" card-header alert alert-danger" role="alert">
    Error!!
  </div>
  <div class="card-body">
    <h7 class="alert alert-danger" role="alert">Lo sentimos, no tienes acceso para acceder a la solicitud. Por favor, comunícate con el superadministrador del sistema para obtener más información sobre tus permisos de acceso. Gracias..</h7>
 
    
  </div>

</div>
  
@endsection
