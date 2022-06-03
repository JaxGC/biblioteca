@extends('layouts.app')

@section('content')

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
        <div class="card shadow">
            <h1>Editar Libro</h1>
            <form method="POST" action="{{ route('Libro.update', $varlib) }}"  role="form">
                {{ csrf_field() }}
                @method('put')
            <div class="col-xl-4">
                <label> Nombre_libro</label>
                <input value="{{$varlib->Nombre_libro}}" id="Nombre_libro" name="Nombre_libro" type="text" class="form-control form-control-muted" placeholder="ingrese nombre libro" required>
            </div>
            <div class="col-xl-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">id_autor</label>
                    <select id="id_autor" name="id_autor" class="form-control">
                        @foreach ($auto as $autor)
                            <option value="{{$autor->id}}">{{$autor->Nombre_autor}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <div class="col-xl-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">id_editorial</label>
                    <select id="id_editorial" name="id_editorial" class="form-control">
                        @foreach ($editoria as $editorial)
                            <option value="{{$editorial->id}}">{{$editorial->Nombre_editorial}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <div class="col-xl-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">id_categoria</label>
                    <select id="id_categoria" name="id_categoria" class="form-control">
                        @foreach ($categori as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->Nombre_categoria}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Guardar</button></div>
                <div class="form-group">
                    <a href="{{ route("map") }}" class="btn btn-info btn-block" >Atrás</a>
                </div>
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