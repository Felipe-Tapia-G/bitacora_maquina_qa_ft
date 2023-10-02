@extends('layout.template')

@if($folio > 1 )
@section('Registro Inicial de Bitácora: Seguimiento Detallado de Operaciones de Máquinas')
@else
@section('titulo', 'BITACORA DE MAQUINA  ' . $id .' / Folio '. $folio)
@endif


@section('contenido')


<!-- Incluir el CSS de SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

<!-- Incluir el JS de SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>

<script>
 function msnconfirmar()
{

            Swal.fire({
                        title: '¿Está Seguro de finalizar la bitácora?',
                        text: "¡No podrás editar los cambios después!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, finalizar!'

                    })


     var url = "{{ route('finalizabitacora', $id) }}";
	location.href = url;
}

</script>



<style>

/* Estilos normales del botón */
.btn.btn-outline-dark {
  background-color: transparent;
  border-color: #343a40;
  color: #343a40;
}

/* Estilos para el estado de hover */
.btn.btn-outline-dark:hover {
  background-color: #343a40;
  border-color: #343a40;
  color: #ffffff;
}
</style>
<div class="container">
    <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">

            <div class="toolbar">


            @if(Auth::user()->perfil==2 || Auth::user()->perfil==100 )
            <a href="{{ route('bdm_mantenedores.tabla_de_cambios', $id) }}" data-toggle="modal" data-target="#mymodal2" class="btn btn-outline-primary btn-block show">Tabla de cambios</a>
            @endif
                <a href="{{ route('bdm_mantenedores.bitacora', $id) }}" data-toggle="modal" data-target="#mymodal1" class="btn btn-outline-dark btn-block show" disabled>Informacion General</a>

            @if($folio > 1 )   <a target="_blank" href="{{ route('pdf', $id) }}" class="btn btn-danger btn-block"><i class="fas fa-file-pdf"></i> PDF</a> @endif
            </div>





            <!-- Control Horas De Servicios -->
            <div class="card">
                <div class="card-header">
                   <h6 class="card-title">Control Horas De Servicios</h6>
                </div>
                <div class="card-body">
                @if($folio > 1 )
                    <a href="{{ route('bdm_mantenedores.control_de_insumos', $id) }}" data-toggle="modal" data-target="#mymodal3" class="btn btn-outline-dark btn-block show">Control de Insumo</a>
                    <a href="{{ route('bdm_mantenedores.motorprincipalycm', $id) }}" data-toggle="modal" data-target="#mymodal4" class="btn btn-outline-dark btn-block show">Motor Principal y CM</a>
                    <br/><br/>
                @endif




            @if(Auth::user()->perfil==2 || Auth::user()->perfil==100 )
                    @for ($i = 0; $i < $embarcacion_cantidad_motores_aux; $i++)
                        @php
                            $encontrado = true;
                            for ($j = 0; $j < $cantidadRegistros; $j++) {
                                if ($cantidad_maux[$j]->numero_motor_aux == ($i + 1)){
                                    $encontrado = false;
                                    break;
                                }
                            }
                            if(($cantidadRegistros)== $i ){ $encontrado = false;}
                        @endphp
                        <a href="{{ route('bdm_mantenedores.tablacambio_motoresaux', ['id_bitacora' => $id, 'i' => $i + 1]) }}" data-toggle="modal" data-target="#mymodal5" class="btn btn-outline-primary btn-block show @if ($encontrado)  @endif">
                        Tabla Cambio M. Aux. {{$i + 1}}
                        </a>
                    @endfor
            @endif

    @if($folio > 1 )
                    @for ($i = 0; $i < $embarcacion_cantidad_motores_aux; $i++)
                        @php
                            $encontrado = true;
                            for ($j = 0; $j < $cantidadRegistros; $j++) {
                                if ($cantidad_maux[$j]->numero_motor_aux == ($i + 1)){
                                    $encontrado = false;
                                    break;
                                }
                            }
                            if(($cantidadRegistros)== $i ){ $encontrado = false;}
                        @endphp
                        <a href="{{ route('bdm_mantenedores.motoresaux', ['id_bitacora' => $id, 'i' => $i + 1]) }}" data-toggle="modal" data-target="#mymodal5" class="btn btn-outline-dark btn-block show @if ($encontrado) disabled @endif">
                            Motor auxiliar {{$i + 1}}
                        </a>
                    @endfor
    @endif
                </div>
            </div>

            <!-- Control De Operaciones -->
    @if($folio > 1 )
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Control De Operaciones</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('bdm_mantenedores.motorprincipal', $id) }}" data-toggle="modal" data-target="#mymodal6" class="btn btn-outline-dark btn-block show">Motor Principal</a>
                    <br />
                    <a href="{{ route('bdm_mantenedores.cotramarcha', $id) }}" data-toggle="modal" data-target="#mymodal7" class="btn btn-outline-dark btn-block show">Contra Marcha</a>
                    <a href="{{ route('bdm_mantenedores.hytek', $id) }}" data-toggle="modal" data-target="#mymodal8" class="btn btn-outline-dark btn-block show">Hytek</a>
                    <a href="{{ route('bdm_mantenedores.mauxbabor', $id) }}" data-toggle="modal" data-target="#mymodal9" class="btn btn-outline-dark btn-block show">Motor Auxiliar Babor</a>
                    <a href="{{ route('bdm_mantenedores.motor_auxiliar_estribor', $id) }}" data-toggle="modal" data-target="#mymodal10" class="btn btn-outline-dark btn-block show">Motor Auxiliar Estribor</a>
                    <a href="{{ route('bdm_mantenedores.estadosdeequipoyalarma', $id) }}" data-toggle="modal" data-target="#mymodal11" class="btn btn-outline-dark btn-block show">Estado de equipo y alarma</a>
                </div>
            </div>

            <a   class="btn btn btn-primary btn-block " onclick="msnconfirmar();">Finalizar Bitacora</a>

            @endif
        </div>


        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
            <div class="toolbar">
            <div class="embed-responsive embed-responsive-16by9" style="height: 128vh; overflow: hidden;">
                @if(isset($pdfBase64))
                    <iframe class="embed-responsive-item" src="data:application/pdf;base64,{{ $pdfBase64 }}" style="height: 100%; width: 100%; border: none;" allowfullscreen="vertical"></iframe>
                @endif
          </div>
            </div>

        </div>

    </div>
</div>
@endsection




