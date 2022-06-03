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
            <div class="card-body">
            <h1>Editar Administrador</h1>
            <form method="POST" action="{{ route('Admin.update', $varAdmin) }}"  role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
            <div class="row">
                <div class="col-sm">
                <label> Nombre de usuario</label>
                <input value="{{$varAdmin->email}}" id="email" name="email" type="text" class="form-control form-control-muted" placeholder="ingrese de usuario" onkeypress="return soloLetras(event);" required>
            </div>
            <div class="col-sm">
                <label> Nombre </label>
                <input value="{{$varAdmin->name}}" id="name" name="name" type="text" class="form-control form-control-muted" placeholder="ingrese su nombre completo" required>
            </div></div>
            <div class="row">
            <div class="col-sm">
                <label> Contraseña </label>
                <input value="{{$varAdmin->password}}" id="password" name="password" class="form-control form-control-muted" type="password" required>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Estatus de usuario</label>
                    <select id="id_status_usuario" name="id_status_usuario" class="form-control">
                        @foreach ($status as $statu)
                            <option value="{{$statu->id}}">{{$statu->Nombre_status_usu}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <div class="grid grid-cols-1 mt-5 mx-7">
                <img src="/imagen/{{ $varAdmin->imagen_usuario }}" width="80px" id="imagenSeleccionada">
            </div>                                    
            </div>
            <div class="row">
            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-0'>
                            <svg width="50px" class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                            </div>
                        <input name="imagen" id="imagen" type='file' class="hidden" />
                       
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <button type="submit" class="btn btn-success btn-block">Guardar</button>
                </div>
                <div class="col-xl-4">
                    <a href="{{ route("icons3") }}" class="btn btn-info btn-block" >Atrás</a>
                </div>
            </div>
            </form>
        </div>
    </div>@include('layouts.footers.auth') 
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