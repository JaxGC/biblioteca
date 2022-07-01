@extends('layouts.app')

@section('content')
<div class="card-body " style="background-color: #80ba26">
    <br>
    <br>
    <br>
</div>
<div class="card-body">
    <div>
        <div class="card">
<div class="card-body">

            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h1 class="mb-0">Prestamos</h1>
                    </div>
                    <div class="col-4 text-right">
                        <a class="" href="{{ route('agregarPrestamo',$id=0) }}">
                            <i class="btn btn-outline-success btn-sm btn-block">Añadir prestamo</i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped display" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Alumno</th>
                        <th>Fecha inicio</th>
                        <th>Fecha limite</th>
                        <th >Documento</th>
                        <th>Nombre del libro</th>
                        <th>Estado del Prestamo</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>    
                    <tbody>
                        @foreach ($varPres as $pres)
                        <tr>
                            <td>{{$pres->Alumno}}</td>
                        <td>{{$pres->fecha_inicio}}</td>
                        <td>{{$pres->fecha_limite}}</td>
                        <td>
                           {{ $pres->documento}}
                        </td> 
                       
                        <td>{{$pres->Nombre_libro}}
                           </td>
                       <td>
                        @if($pres->estado_prestamo==1)
                            <label  class ="badge-pill badge-success">Activo</label>
                        @elseif($pres->estado_prestamo==0)
                            <a href="{{route('agregarPres2',$pres->id)}}" class ="btn btn-sm badge-pill badge-warning">Pausado</a>
                        @endif
                        </td>
                        <td>
                            @if($pres->devolucion==1 && $pres->estado_prestamo==1)
                                {{-- <a href="{{route('devolucionPres',[$pres->id,$pres->Nombre_libro])}}" class =" btn btn-info">Devolver al stand</a> --}}
                                <button type="button" class="btn btn-sm badge-pill badge-info" data-toggle="modal" data-target="#modal-Devolver{{$pres->id}}" data-toggle="tooltip" data-placement="top" title="seleccione para recibir el libro">Recibir libro</button>
                            @elseif($pres->devolucion==0 && $pres->estado_prestamo==0)
                                <label  class ="badge-pill badge-warning">En espera de confirmacion</label>
                            @endif
                        </td>   
                        @include('pages.prestamos.modalDevo')
                        </tr>
                         @endforeach
                    </tbody> 
                    <tfoot>
                        <tr>
                            <th>Alumno</th>
                            <th>Fecha inicio</th>
                            <th>Fecha limite</th>
                            <th >Documento</th>
                            <th>Nombre del libro</th>
                            <th>Estado del Prestamo</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot> 
                </table>
            </div>

        </div>
    </div>@include('layouts.footers.auth')  </div>
</div>

 
    

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script>
    
    $(document).ready(function() {
    $('#example').DataTable({
        order: [[5, 'desc']],
        responsive: true,
        lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'Todos'],
            ],
    "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
    
    });
    });
    $(function () {
            $('#estadolibro').change(function (e) {
              if ($(this).val() === "Malo") {
                $('#observaciones').prop("hidden", false);
              } else {
                $('#observaciones').prop("hidden", true);
              }
            })
          });
    
    
        </script>
@endpush