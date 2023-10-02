@extends('layout.session')

@section('contenido')
  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block text-center justify-content-center align-self-center">
              <img src="{{asset('/sbadmin2/img/Camanchaca.png')}}" class="center-block" alt="">
              {{-- <h1>BITÁCORAS</h1> --}}
              <h2>BITÁCORAS <span class="badge badge-primary">PRUEBAS</span></h2>
            </div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                </div>
                <form method="POST" action="{{ route('login') }}" class="user" autocomplete="nope">
                  @csrf
                  <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                          <label class="custom-control-label" for="remember">
                            {{ __('Recordarme') }}
                          </label>

                        </div>
                      </div>
                      {{-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> --}}
                    <button type="submit" name="button" class="btn btn-primary btn-user btn-block">Ingresar</button>
                    {{-- <hr> --}}
                    {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Login with Google
                  </a>
                  <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                </a> --}}
              </form>
              <hr>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

@endsection
