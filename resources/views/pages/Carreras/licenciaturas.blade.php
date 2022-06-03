@extends('layouts.app')

@section('content')
<link href="/assets-old/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<div class="card-body shadow" style="background-color: #80ba26">
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
                        <h1 class="mb-0">Listado de las licenciaturas</h1>
                    </div>
                    <div class="col-4 text-right">
                        <a class="nav-link" href="{{ route('agregarLicenciatura') }}">
                            <i class="btn btn-outline-success btn-sm btn-block">Añadir licenciatura</i>
                        </a>
                    </div>
                </div>
            </div>

            <table id="example" class="table table-bordered table-striped display" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Licenciatura</th>
                        <th class="text-center">Acciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($varlic as $lic)
                    <tr>
                        <td>{{$lic->id}}</td>
                        <td>{{$lic->Nombre_licenciatura}}</td>
                        
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <div class="card border-0" style="align-items: center">
                                    <a href="{{route('Carrera.edit', $lic->id)}}"><i  class="btn btn-outline-warning btn-xls ni ni-ruler-pencil align-center"> Editar</i></a>
                                        <br>
                                </div> 
                                   <div class="card border-0 " style="align-items: center">
                                       <form action="{{route('Carrera.destroy', $lic)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-xls ni ni-basket">Eliminar</button>
                                    
                                </form>
                            </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    @endforeach 
                   
                </tbody>      
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Licenciatura</th>
                        <th class="text-center">Acciones</th>
                      
                    </tr>
                </tfoot>
            </table>
        </div>
        </div>@include('layouts.footers.auth') 
    </div>
</div>

  
    

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

//agregar para las datatables
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