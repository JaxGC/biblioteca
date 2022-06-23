@extends('layouts.app')

@section('content')
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
                        <h1 class="mb-0">Listado de libros</h1>
                    </div>
<div class="col-4 text-right">
    @can('icons3')
        <a class="" href="{{route('agregarLibro')}}">
            <i class="btn btn-outline-success btn-sm btn-block">Añadir libro</i></a>
        </a>
    @endcan
</div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped display" style="width:100%">
                    <thead class="thead-dark">
<tr>
<th>NOMBRE</th>
<th>CATEGORIA</th>
<th>EJEMPLARES</th>
{{-- @can('PrestamoLibro') --}}
 <th class="text-center">ACCIONES</th>
 {{-- @endcan --}}
 @can('icons3')<th></th>
<th></th>@endcan
</tr>
   </thead>
<tbody>
   @foreach ($varlib as $lib)
<tr>

     <td>{{$lib->Nombre_libro}}</td>
     <td>{{$lib->id_categoria}}</td>
     <td>{{$lib->ejemplares}}</td>
    {{--  @can('PrestamoLibro') --}}
     <td><a href="{{route('agregarPrestamo',$lib->id)}}" ><i class="btn btn-outline-warning ni ni-ruler-pencil">Prestamo</i></a></td>
   
     {{-- @endcan --}}
  @can('icons3')
<td><a href="{{route('Libro.editarLibro',$lib->id)}}" ><i class="btn btn-outline-warning ni ni-ruler-pencil">Editar</i></a></td>
<td>
<form action="{{route('Libro.destroy',$lib)}}" method="POST">
@csrf
@method('delete') 
<button type="submit" class="btn btn-outline-danger ni ni-basket"->Eliminar</button>
</form></td>   
@endcan
</tr>
   @endforeach
</tbody>
 <tfoot>
<tr>

<th>Nombre libro</th>

<th>Categoria</th>
<th>Ejemplares</th>
{{-- @can('PrestamoLibro') --}}
 <th class="text-center">Acciones</th>   
{{-- @endcan --}}
@can('icons3')
<th></th>
<th></th>
@endcan
  </tr>
</tfoot>
</table>
</div>
</div></div>



@include('layouts.footers.auth')  

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

<script>
    //datatables
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