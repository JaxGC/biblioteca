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
                        <h1 class="mb-0">Usuarios</h1>
                    </div>
                    <div class="col-4 text-right">
                        <a class="nav-link" href="{{ route('agregarUsuario') }}">
                            <i class="btn btn-outline-success btn-sm btn-block">Añadir usuario</i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped display" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                        <th>Matricula</th>
                        <th>Nombre de alumno</th>
                        <th>Direccion</th>
                        <th class="border px-4 py-2">IMAGEN</th>
                        <th>Contraseña</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>
                   
                    <tbody> 
                        @foreach ($varAlu as $alu)
                        <tr>
                        <td>{{$alu->clave}}</td>
                        <td>{{$alu->name}}</td>
                        <td>{{$alu->email}}</td>
                        <td  class="border px-14 py-1">
                            <img src="/imagen/{{$alu->imagen_usuario}}" width="50%">
                        </td>
                        <td>{{$alu->password}}</td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <div class="card border-0" style="align-items: center">
                                        <a href="{{route('Alumno.edit', $alu->id)}}"><i  class="btn btn-outline-warning ni ni-ruler-pencil"> Editar</i></a>
                                        <br>
                                    </div>
                                <div class="card border-0 " style="align-items: center">
                                    <form action="{{route('Alumno.destroy', $alu)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger ni ni-basket">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        </tr>
                         @endforeach
                    </tbody> 
                    <tfoot>
                        <tr>
                            <th>Matricula</th>
                            <th>Nombre de alumno</th>
                            <th>Direccion</th>
                            <th class="border px-4 py-2">IMAGEN</th>
                            <th>Contraseña</th>
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