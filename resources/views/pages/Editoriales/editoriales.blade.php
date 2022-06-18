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
                <h1 class="mb-0">Editoriales</h1>
            </div>
            <div class="col-4 text-right">
                <a class="" href="{{ route('agregarEditorial') }}">
                    <i class="btn btn-outline-success btn-sm btn-block">Añadir Editorial</i>
                </a>
            </div></div></div>
            <div class="table-responsive">
                <table  id="example" class="table table-bordered table-striped display" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                        <th>ID</th>
                        <th>Editorial</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        </tr>
                    </thead>
                    @foreach ($varedi as $edi)
                    <tbody>
                        <tr>
                        <td>{{$edi->id}}</td>
                        <td>{{$edi->Nombre_editorial}}</td>
                        <td><a href="{{route('Editoriales.editedi', $edi->id)}}"><i  class="btn btn-outline-warning ni ni-ruler-pencil"> Editar</i></a></td>
                        <td>
                            <form action="{{route('Editoriales.destroy', $edi)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger ni ni-basket">Eliminar</button>
                            </form>
                        </td>
                        </tr>
                    </tbody> 
                    @endforeach
                </table>
                {{$varedi->links()}}
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