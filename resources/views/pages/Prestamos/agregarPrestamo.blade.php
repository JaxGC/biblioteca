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
            <h1>Agregar prestamo</h1>
            <form method="POST" action="{{ url('agregarPres') }}"  role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="row">
          
                <div class="input-daterange datepicker row align-items-center">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input type="text" name="start_date" value="{{date('y-m-d')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control"  name ="finish_date" placeholder="End date" type="date" value="06/22/2018">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">
       <div class="col-sm">
           <label for="exampleFormControlSelect1">Documento</label>

       </div>
       
       <div class="col-sm">
        <form action="{{route('BuscarUser')}}" method="GET">
        <div class="form-row">
            <label for="">Usuario</label>
            <input type="text" class="form-control" name="texto" value="{{$texto}}">
           
           <br>
           <br>
          <input type="submit" class="btn-success" value="buscaru">
          </div>
        </form>
    </div>
    <div class="col-sm">
        <form action="">
        <div class="form-row">
            <label for="">Libro</label>
            <input type="text" class="form-control" name="texto">
           
           <br>
           <br>
          <input type="submit" class="btn-success" value="buscarl">
          </div>
        </form>
    </div>
      
        <div class="col-sm">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Administrador: </label>
                <label for="text"><h2 class="btn-success">{{auth()->user()->name}}</h2></label>
              </div>
        </div>
        </div>
        <br>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Guardar</button></div>
            <div class="form-group">
                <a href="{{ route("table") }}" class="btn btn-info btn-block" >Atrás</a>
            </div>
           
    </div>
            </form>
            </div>
        </div>
    </div>@include('layouts.footers.auth')  
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