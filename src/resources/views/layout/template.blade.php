<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

  <meta name="author" content="">

  <title>@yield('titulo') - {{ env('APP_NAME') }}</title>


  <script>

        // Función para validar que solo se ingresen números enteros en el campo
        function validarEnteroInput(input) {
          input.value = input.value.replace(/\D/g, ''); // Remover cualquier carácter que no sea un número
          input.value = input.value.replace(/^0+/, ''); // Remover ceros iniciales

          // Limitar la longitud máxima a 5 dígitos
          if (input.value.length > 5) {
            input.value = input.value.slice(0, 5);
          }

          // Validar el valor mínimo (0) después de cualquier cambio
          if (input.value < 0) {
            input.value = 0;
          }
        }


        function limitarDigitos(input, maxDigits) {
            input.value = input.value.replace(/\D/g, ''); // Remover cualquier carácter que no sea un número

            // Limitar la longitud máxima a maxDigits
            if (input.value.length > maxDigits) {
              input.value = input.value.slice(0, maxDigits);
            }

            // Validar que el valor sea un número positivo
            if (input.value < 0) {
              input.value = '';
            }
          }


</script>


  <!-- implementacion de alartas js  (sweetalert )-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- Custom fonts for this template-->
  <link href="{{asset('sbadmin2/css/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css" integrity="sha512-FEQLazq9ecqLN5T6wWq26hCZf7kPqUbFC9vsHNbXMJtSZZWAcbJspT+/NEAQkBfFReZ8r9QlA9JHaAuo28MTJA==" crossorigin="anonymous" /> --}}
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('sbadmin2/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="{{asset('sbadmin2/css/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{asset('sbadmin2/vendor/bootstrap-table/bootstrap-table.min.css')}}"> --}}

  {{-- Select2 --}}
  <link href="{{asset('sbadmin2/css/select2.min.css')}}" rel="stylesheet">
  <link href="{{asset('sbadmin2/css/select2-bootstrap4-theme.min.css')}}" rel="stylesheet">
  <livewire:styles />

  {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> --}}
  <style>
    body {
      margin: 0;
      font-family: Nunito, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-size: 12px;
      font-weight: 400;
      line-height: 1;
      color: black;
      text-align: left;
      background-color: #fff;
    }

    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: black;
    }
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          {{-- <i class="fas fa-laugh-wink"></i> --}}
          <img class="img-fluid" src="{{asset('/sbadmin2/img/logo93_2.png')}}" alt="img">
        </div>

      </a>



      <button type="button" class="btn btn-dark btn-sm">BITACORA  srptest <span class="badge badge-light">Maquina</span> </button>
<br>

      <!-- Heading -->
      <div class="sidebar-heading">
        Modulos
      </div>

 @if(Auth::user()->perfil==1 )
 @endif



      <!-- Nav Item - Pages Collapse Menu -->
      @if(Auth::user()->perfil==2 || Auth::user()->perfil==100 )
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Admin</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            {{-- <h6 class="collapse-header">Login Screens:</h6> --}}
            <h6 class="collapse-header">Mantenedor</h6>





            <a class="collapse-item" href="{{url('/bitacora_maquina')}}"><i class="fas fa-clipboard"></i><span>&nbsp;Bitacora de maquina</span></a>








          </div>
        </div>

        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <h6 class="collapse-header">Mantenedor Admin</h6>

            <a class="collapse-item" href="{{url('/embarcacion')}}"><i class="fas fa-ship"></i>&nbsp;Embarcacion (PAM)</a>
            <a class="collapse-item" href="{{url('/motorista')}}"> <i class="fas fa-users"></i>&nbsp;Motoristas</a>




          </div>
        </div>

          @if(Auth::user()->perfil == 100)
            <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                  <h6 class="collapse-header">Mantenedor Super Admin</h6>
                  <a class="collapse-item" href="{{url('/usuarios')}}"><i class="fas fa-user"></i>&nbsp; Usuarios</a>
                  <a class="collapse-item" href="{{url('/armador')}}"><i class="fas fa-house-user"></i>&nbsp;Armador</a>





                </div>
            </div>
          @endif

      </li>
      @else
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/bitacora_maquina')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Bitacoras</span></a>
      </li>

      @endif


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <button type="button" class="btn btn-dark btn-sm">División : <span class="badge badge-light">{{ $armador->nombre }}</span> </button>&nbsp;&nbsp;&nbsp;
          <button type="button" class="btn btn-dark btn-sm">Perfil: <span class="badge badge-light">{{ $perfil->nombre}}</span> </button>&nbsp;&nbsp;&nbsp;
          <button type="button" class="btn btn-success btn-sm">Entorno: <span class="badge badge-light">Pruebas</span> </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

                <button type="button" class="btn btn-dark btn-sm">{{ Auth::user()->email }}</button>


                <img class="img-profile rounded-circle" src="{{asset('sbadmin2/img/undraw_profile.svg')}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                  Salir
                </a>

              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
                @if(session()->has('alert'))
                  @if(session('type') == 'success')
                    <div class="alert alert-success" role="alert">
                  @elseif(session('type') == 'error')
                    <div class="alert alert-danger" role="alert">
                  @endif
                  <strong>{{ session('alert') }}</strong> {{ session('message') }}
                </div>
               @endif
          <!-- Page Heading -->
          {{-- <h1 class="h3 mb-4 text-gray-800">@yield('titulo')</h1> --}}

          <div class="card mb-3">
            <div class="card-header bg-gray-900">
              <h6 class="m-0 font-weight-bold text-gray-100">@yield('titulo')</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @yield('contenido')
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">



            <span>Copyright &copy; Camanchaca Pesca  - <button type="button" class="btn btn-dark btn-sm">BITACORA   <span class="badge badge-light">Maquina V3.2.1</span> </button></span>








          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-backdrop="static" data-keyboard="false">

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('sbadmin2/js/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('sbadmin2/js/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  {{-- Select2 --}}
  <script src="{{asset('sbadmin2/js/select2.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('sbadmin2/js/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('sbadmin2/js/sb-admin-2.min.js')}}"></script>
  <!-- Page level plugins -->
  <script src="{{asset('sbadmin2/js/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('sbadmin2/js/datatables/dataTables.bootstrap4.min.js')}}"></script>
  {{-- <script src="{{asset('sbadmin2/vendor/bootstrap-table/bootstrap-table.min.js')}}"></script> --}}

  <script src="{{asset('sbadmin2/js/jquery.rut.min.js')}}"></script>
  <script src="{{asset('sbadmin2/js/controles.js')}}"></script>
  <livewire:scripts />

</body>

</html>
