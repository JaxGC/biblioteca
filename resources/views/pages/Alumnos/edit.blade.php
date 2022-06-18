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
            <h1>Editar Alumno</h1>
            <form method="POST" action="{{ route('Alumno.update', $varAlu) }}"  role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="row">
            <div class="col-sm"><strong>
                <label> Matricula</label></strong>
                <input value="{{$varAlu->clave}}" id="matricula" name="matricula" type="text" class="form-control form-control-muted" placeholder="ingrese matricula" required>
            </div>
            <div class="col-sm"><strong>
                <label> Nombre Completo</label></strong>
                <input value="{{$varAlu->name}}" id="Nombre_completo" name="Nombre_completo" type="text" class="form-control form-control-muted" placeholder="ingrese su nombre completo" onkeypress="return soloLetras(event);" required>
            </div>
            <div class="col-sm"><strong>
                <label> Email</label></strong>
                <input value="{{$varAlu->email}}" id="Direccion" name="Direccion" type="email" class="form-control form-control-muted" placeholder="ingrese correo" required>
            </div>
                </div>
                <div class="row">
            <div class="col-sm"><strong>
                <label> Contraseña </label></strong>
                <input value="{{$varAlu->password}}" id="Password" name="Password" class="form-control form-control-muted" type="password" value="password" id="password" required>
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
            <div class="col-sm">
                <div class="form-group"><strong>
                    <label for="exampleFormControlSelect1">Licenciatura</label></strong>
                    <select id="id_licenciatura" name="id_licenciatura" class="form-control">
                        @foreach ($licen as $lic)
                            <option value="{{$lic->id}}">{{$lic->Nombre_licenciatura}}</option>
                        @endforeach
                    </select>
                  </div>
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
                <option value="">
                    Selecionar Estado
                </option>
                @foreach ($estados as $estado)
                    <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                @endforeach
            </select>
        </div></div>
        <div class="col-md-3">
        <strong>
            Municipio
            </strong>
        <select  name="selectmunicipio" id="selectmunicipio" class="form-control" aria-label="Default select example">
            <option value="">
                Selecionar Municipio
            </option>
    </select>
        </div>
        <div class="col-md-6">
           
    <strong>
       Localidad
        </strong>
    <select  name="selectlocalidad" id="selectlocalidad" class="form-select"aria-label="Default select example">
        <option value="">
            Selecionar Localidad
        </option>
    </select>
    </div>
    <div class="col-md-12">
        <strong>
            Referencia
        </strong>
        <textarea name="referencia" id="referencia" cols="20" rows="3" class="form-control">{{ old('referencia') }}</textarea>
    </div>
    </div>
    <script src="{{ asset('assets/js/crear.js') }}"></script>
        <div class="row">
        <div class="grid grid-cols-1 mt-5 mx-7">
            <img src="/imagen/{{ $varAlu->imagen_usuario }}" width="80px" id="imagenSeleccionada">
        </div>                                   
                        
                        <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                     
                    <input name="imagen" id="imagen" type='file' class="hidden" />
                   
                    </label>
                
            <div class="col-sm">
                <button type="submit" class="btn btn-success btn-block">Guardar</button>
            </div>
                <div class="col-sm">
                    <a href="{{ route("icons") }}" class="btn btn-info btn-block" >Atrás</a>
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