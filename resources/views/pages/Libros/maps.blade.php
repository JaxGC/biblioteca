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
<div class="card-header border-0">
                    <div class="row align-items-center">
             <div class="col-8">
                        <h1 class="mb-0">Listado de las libros</h1>
                    </div>
<div class="col-4 text-right">

<a class="nav-link" href="{{route('agregarLibro')}}">
  <i class="btn btn-outline-success btn-sm btn-block">Añadir libro</i></a>
</a>
 </div>
                </div>
            </div>

  
 <table id="example" class="table table-bordered table-striped display" style="width:100%">
                
   <thead class="thead-dark">
<tr>
<th>ID</th>
<th>NOMBRE</th>
<th>ID_AUTOR</th>
<th>ID_EDITORIAL</th>
<th>ID_CATEGORIA</th>
 <th class="text-center">Acciones</th>
<th></th>
</tr>
   </thead>
<tbody>
   @foreach ($varlib as $lib)
       
  
 
<tr>
     <td> {{$lib->id}}</td>
     <td>{{$lib->Nombre_libro}}</td>
     <td>{{$lib->id_autor}}</td>
     <td>{{$lib->id_editorial}}</td>
     <td>{{$lib->id_categoria}}</td>
    
<td><a href="{{route('Libro.editarLibro',$lib->id)}}" ><i class="btn btn-outline-warning ni ni-ruler-pencil">Editar</i></a></td>
<td>
<form action="{{route('Libro.destroy',$lib)}}" method="POST">
@csrf
@method('delete') 
<button type="submit" class="btn btn-outline-danger ni ni-basket"->Eliminar</button>
</form></td>   

</tr>
   @endforeach
</tbody>
 <tfoot>
<tr>
<th>Id</th>
<th>Nombre_libro</th>
<th>id_autor</th>
<th>id_editorial</th>
<th>id_categoria</th>
<th class="text-center">Acciones</th>
  </tr>
</tfoot>
</table>
</div>
</div>
</div>
 



@include('layouts.footers.auth')  

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