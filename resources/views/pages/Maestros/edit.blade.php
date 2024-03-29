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
        <div class="card shadow">
            <div class="card-body">
            <h1>Editar Profesor</h1>
            <form method="POST" action="{{ route('Maestro.update', $varMa) }}"  role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="row">
            <div class="col-sm"><strong>
                    <label> Clave </label></strong>
                    <input value="{{$varMa->clave}}" id="clave_empleado" name="clave_empleado" type="number" class="form-control form-control-muted" placeholder="ingrese la Clave de empleado" required>
                </div>
                <div class="col-sm"><strong>
                    <label> Nombre Completo</label></strong>
                    <input value="{{$varMa->name}}" id="Nombre_maestro" name="Nombre_maestro" type="text" class="form-control form-control-muted" placeholder="ingrese el nombre completo" onkeypress="return soloLetras(event);" required>
                </div>
                <div class="col-sm"><strong>
                    <label> Email </label></strong>
                    <input value="{{$varMa->email}}" id="email" name="email" type="email" class="form-control form-control-muted" placeholder="Correo Ejemplo: nombre@usuario.com" required>
                </div>
                </div>
                <div class="row">
            <div class="col-sm"><strong>
                <label> Contraseña </label></strong>
                <input value="{{$varMa->clave}}" id="Password" name="Password" class="form-control form-control-muted" type="password" id="password" required>
            </div>
            <div class="col-sm"><strong>
                <label> Carrera </label></strong>
                <input value="{{$varMa->id_licenciatura}}" id="carrera_empleado" name="carrera_empleado" type="text" class="form-control form-control-muted" placeholder="ingrese la carrera que ejerce" required>
            </div>
            <div class="col-sm">
                <div class="form-group"><strong>
                    <label for="exampleFormControlSelect1">Estatus de usuario</label></strong>
                    <select id="id_status_usuario" name="id_status_usuario" class="form-control">
                        @foreach ($status as $statu)
                            <option value="{{$statu->id}}">{{$statu->Nombre_status_usu}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
            <strong>
                Estado
                </strong>
                <br>
                <select name="selectestado" id="selectestado" class="form-control" aria-label="Default select example">
                   
                    @if ($varEdit)
                    <option value="{{$varEdit->idestado}}">{{$varEdit->estado}}</option>
                    @foreach ($estados as $estado)
                        <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                    @endforeach
                    @else
                    <option value="0">Selecciona Estado</option>
                    @foreach ($estados as $estado)
                    <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                @endforeach  
                    @endif
                    
                </select>
            </div></div>
            <div class="col-md-3">
            <strong>
                Municipio
                </strong>
            <select  name="selectmunicipio" id="selectmunicipio" class="form-control" aria-label="Default select example">
                
                @if ($varEdit)
                <option value="{{$varEdit->idmunicipio}}">{{$varEdit->municipio}}</option>
                    
                @else
                <option value="0">Selecciona Municipio</option>
                @endif
               
        </select>
            </div>
            <div class="col-md-6">
               
        <strong>
           Localidad
            </strong>
        <select  name="selectlocalidad" id="selectlocalidad" class="form-select"aria-label="Default select example">
            
            @if ($varEdit)
           <option value="{{$varEdit->idlocalidad}}">{{$varEdit->localidad}}</option>
           @else
           <option value="0">Selecciona Localidad</option>
           @endif 
        </select>
        </div>
        <div class="col-md-12">
            <strong>
                Referencia
            </strong>
            <textarea name="referencia" id="referencia" cols="20" rows="3" class="form-control">
                @if ($varEdit)
                {{ old('referencia',$varEdit->referencia) }}
                @else
                    
                @endif
               
            </textarea>
        </div>
        </div>
        <script src="{{ asset('assets/js/crear.js') }}"></script>
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <img src="/imagen/{{ $varMa->imagen_usuario }}" width="80px" id="imagenSeleccionada">
                </div>                                    
                </div>
                <div class="row">
                <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                               
                            <input name="imagen" id="imagen" type='file' class="hidden" />
                           
                            </label>
                        
                </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Guardar</button></div>
                <div class="form-group">
                    <a href="{{ route("icons2") }}" class="btn btn-info btn-block" >Atrás</a>
                </div>
            </form>
        </div> @include('layouts.footers.auth') 
    </div>
    </div>
</div>

 
    

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->
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