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
            <h1>Listado de categorias</h1>
            <div class="col-xl-4">
                <a class="nav-link" href="{{ route('agregarCategoria') }}">
                    <i class="btn btn-outline-success btn-lg btn-block">Añadir Categoria</i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>CATEGORIA</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    @foreach ($varcat as $cat)
                    <tbody>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->Nombre_categoria}}</td>
                        <td><a href="{{route('Categorias.editcate', $cat->id)}}"><i  class="btn btn-outline-warning ni ni-ruler-pencil"> Editar</i></a></td>
                        <td>
                            <form action="{{route('Categorias.destroy', $cat)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger ni ni-basket">Eliminar</button>
                            </form>
                        </td>
                    </tbody> 
                    @endforeach
                </table>
                {{$varcat->links()}}
            </div>
            

        </div>
    </div>
</div>

 @include('layouts.footers.auth')  
    

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush