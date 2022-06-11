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
                        <a class="nav-link" href="{{ route('agregarPrestamo') }}">
                            <i class="btn btn-outline-success btn-sm btn-block">Añadir prestamo</i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped display" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                        <th>fecha inicio</th>
                        <th>fecha limite</th>
                        <th class="border px-4 py-2">documento</th>
                        <th>clave_usuario</th>
                        <th>id_libro</th>
                        <th>id_administrador</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>    
                    <tbody> 
                        @foreach ($varPres as $pres)
                        <tr>
                        <td>{{$pres->fecha_inicio}}</td>
                        <td>{{$pres->fecha_limite}}</td>
                        <td  class="border px-14 py-1">
                            <img src="/imagen/{{$pres->documento}}" width="50%">
                        </td>
                        <td>{{$pres->clave_usuario}}</td>
                        <td>{{$pres->id_libro}}</td>
                        <td>{{$pres->id_administrador}}</td>
                        
                               
                            </div>
                        </td>
                        </tr>
                         @endforeach
                    </tbody> 
                    <tfoot>
                        <tr>
                          <th>fecha inicio</th>
                          <th>fecha limite</th>
                          <th class="border px-4 py-2">documento</th>
                          <th>clave_usuario</th>
                          <th>id_libro</th>
                          <th>id_administrador</th>
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
    
    
        </script>
@endpush