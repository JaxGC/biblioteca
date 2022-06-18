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
                        <h1 class="mb-0">Autores</h1>
                    </div>
                
            <div class="col-4 text-right">
                <a class="" href="{{ route('agregarAutor') }}">
                    <i class="btn btn-outline-success btn-sm btn-block">Añadir autor</i>
                </a></div>
            </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <th>AUTOR</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    @foreach ($varaut as $aut)
                    <tbody>
                        <td>{{$aut->Nombre_autor}}</td>
                        <td><a href="{{route('Autores.editaut', $aut->id)}}"><i  class="btn btn-outline-warning ni ni-ruler-pencil"> Editar</i></a></td>
                        <td>
                            <form action="{{route('Autores.destroy', $aut)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger ni ni-basket">Eliminar</button>
                            </form>
                        </td>
                    </tbody> 
                    @endforeach
                </table>
                {{$varaut->links()}}
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