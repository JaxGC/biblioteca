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
        <div class="card ">
            <div class="card-body">
            <h1>Aplazar fecha de termino de préstamo</h1>
            <form method="POST" action="{{ route('Prestamos.update', $varpres) }}"  role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="row">
            <div class="col-sm">
                <label> Fecha inicial</label>
                <input value="<?php echo date('Y-m-d', strtotime($varpres['fecha_inicio'])) ?>" id="fecha_inicio" name="fecha_inico" type="date" class="form-control form-control-muted" placeholder="fecha" required disabled>
            </div>
            <div class="col-sm">
                <label> Fecha limite</label>
                <input value="<?php echo date('Y-m-d', strtotime($varpres['fecha_limite'])) ?>" id="fecha_limite" name="fecha_limite" type="date" class="form-control form-control-muted" placeholder="fecha de termino" required>
            </div>
                </div>
            <div class="row">
                <div class="col-sm">
                <label> Usuario del préstamo</label>
                @foreach ($alumnos as $item)
                    <input value="{{$item->name}}" id="clave_usuario" name="clave_usuario" type="text" class="form-control form-control-muted" placeholder="ingrese su nombre completo" onkeypress="return soloLetras(event);" required disabled>
                @endforeach
                </div>
                <div class="col-sm">
                    <label> Libro del préstamo</label>
                    @foreach ($libr as $item)
                        <input value="{{$item->Nombre_libro}}" id="clave_usuario" name="clave_usuario" type="text" class="form-control form-control-muted" placeholder="ingrese su nombre completo" onkeypress="return soloLetras(event);" required disabled>
                    @endforeach
                    </div>
            </div>
           {{--  <div class="col-sm">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">clave_usuario</label>
                    <select id="clave_usuario" name="clave_usuario" class="form-control">
                        <option value="{{$varpres->clave}}"></option>
                        @foreach ($alumnos as $alumno)
                            <option value="{{$alumno->matricula}}">{{$alumno->Nombre_completo}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Licenciatura</label>
                    <select id="id_licenciatura" name="id_licenciatura" class="form-control">
                        @foreach ($licen as $lic)
                            <option value="{{$lic->id}}">{{$lic->Nombre_licenciatura}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
        </div>
        <div class="row">
        <div class="grid grid-cols-1 mt-5 mx-7">
            <img src="/imagen/{{ $varAlu->imagen_usuario }}" width="80px" id="imagenSeleccionada">
        </div>                                   
                        
                        <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                     
                    <input name="imagen" id="imagen" type='file' class="hidden" />
                   
                    </label> --}}
                    <br>
                    <div class="row">  
            <div class="col-sm">
                <button type="submit" class="btn btn-success btn-block">Guardar</button>
            </div>
                <div class="col-sm">
                    <a href="{{ route("table") }}" class="btn btn-info btn-block" >Atrás</a>
                </div>
            </div>
            </form>
        
        </div>
        </div>
    </div>
            @include('layouts.footers.auth')  
    </div>
</div>

 
    

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Script para ver la imagen antes de CREAR UN NUEVO ADMIN -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>
@endpush