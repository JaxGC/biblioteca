@extends('layouts.app')

@section('content')
@extends('layouts.bootstrapstilos')
<script>//para admitir solo letras en el input
    function soloLetras(e){
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
     especiales = "8-37-39-46";

     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break; 
          }
      }

      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }
    </script>

<div class="card-body shadow" style="background-color: #80ba26">
    <br>
    <br>
    <br>
</div>
<div class="card-body">
    <div> 
        @if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>

			</div>
			@endif
			@if(Session()->has('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
  				<strong>{{Session('success')}}</strong>.
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button>
			</div>
			@endif
            <div class="card ">
                <div class="card-body">
            <strong>
            <h1>Agregar Categoria</h1>
            </strong>
            <form method="POST" action="{{ url('agregarCategoria') }}"  role="form">
                {{ csrf_field() }}
            <div class="col-xl-4">
                <strong>
                <label> Nombre </label>
                </strong>
                <input value="{{ old('Nombre_categoria') }}" name="Nombre_categoria" id="Nombre_categoria" type="text" class="form-control form-control-muted" placeholder="ingrese el nombre " onkeypress="return soloLetras(event);" required>
            </div><br>
            
            <div class="form-group">
                <div class="col-xl-4">
                <button type="submit" class="btn btn-success btn-block">Guardar</button></div>
                </div><div class="form-group">
                    <div class="col-xl-4">
                    <a href="{{ route("categoria") }}" class="btn btn-info btn-block" >Atrás</a>
            </div></div>
            </form>
        </div>
    </div>
</div>

 @include('layouts.footers.auth')  
    

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush