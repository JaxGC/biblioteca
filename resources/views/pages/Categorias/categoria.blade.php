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
        <div class="card shadow">

            <div class="card-body">
            <div class="card-header border-0">
                <div class="row align-items-center">
            <div class="col-8">
            <h1>Categorias</h1>
            </div>
            <div class="col-4 text-right">
                <a class="" href="{{ route('agregarCategoria') }}">
                    <i class="btn btn-outline-success btn-sm btn-block">Añadir Categoria</i>
                </a>
            </div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped display" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                        <th>CATEGORIA</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    
                    <tbody>@foreach ($varcat as $cat)
                        <tr>
                        <td>{{$cat->Nombre_categoria}}</td>
                        <td><a href="{{route('Categorias.editcate', $cat->id)}}"><i  class="btn btn-outline-warning ni ni-ruler-pencil"> Editar</i></a></td>
                        <td>
                            <form action="{{route('Categorias.destroy', $cat)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger ni ni-basket" onclick="return EliminarRegistro('Eliminar Profesor')">Eliminar</button>
                            </form>
                            <script>
                                function EliminarRegistro(value){
                                    Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Se ah eliminado correctamente',
                                    showConfirmButton: false,
                                    timer: 1500
                                    })
                                }
                            </script>
                        </td>
                    </tr>
                        @endforeach
                    </tbody> 
                    <tfoot>
                        <tr>
                            <th>CATEGORIA</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            

        </div>
    </div>
</div>

 @include('layouts.footers.auth')  
    

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