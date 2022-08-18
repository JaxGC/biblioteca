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
            @if ($libr->ejemplares>=1)
                
            
            <form method="POST" action="{{ url('agregarPres') }}"  role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="row">
          
                <div class="input-daterange datepicker row align-items-center">
                    <div class="col">
                        <label >Fecha de entrega</label><br>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control" type="text" name="start_date" value="{{date('y-m-d')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label >Fecha de devolución</label><br>
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
                <label for="exampleFormControlSelect1">Documento:</label>
                 <div class="custom-control custom-radio mb-3">
                        <input value="Credencial UMB" name="documento" class="custom-control-input" id="customRadio5" type="radio">
                        <label class="custom-control-label" for="customRadio5">Credencial UMB</label>
                 </div>
                 <div class="custom-control custom-radio mb-3">
                        <input name="documento"  value="INE" class="custom-control-input" id="customRadio6" checked="" type="radio">
                        <label class="custom-control-label" for="customRadio6">INE</label>
                 </div>
             </div> 
             @if(auth()->user()->rol!='Alum' && auth()->user()->rol!='Maes')
       <div class="col-sm">
        <label for="exampleFormControlSelect1">Alumno o Maestro:</label>
        <div class="custom-control custom-radio mb-3">
           
        <select id="id_alumno" name="id_alumno" class="form-control" >
            <option value="0">Seleccionar dato</option>
                @foreach ($alumnos as $alu)
                    <option value="{{$alu->id}}">{{$alu->clave}}: {{$alu->name}}</option>    
                @endforeach
          </select>
        </div>
          
    </div>
    @endif
    <div class="col-sm">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Estado de Libro: </label>

          <select id="estadolibro" name="estadolibro" class="form-control" >
              <option value="0">Seleccionar dato</option>
                 
              <option value="Bueno">Bueno</option>
              <option value="Regular">Regular</option>
              <option value="Malo">Malo</option>
            </select>
         
        </div>
      </div>
      <div class="col-sm">
        <label>Observaciones</label>
        <input value="{{ old('ovservaciones') }}" name="observaciones" id="observaciones" type="text" class="form-control form-control-muted" placeholder="ingrese observaciones" hidden>
    </div>
    <div class="col-sm">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Libro: </label>
            <label for="text" id="varlib" name="varlib"><h2 class="btn-success">{{$libr->Nombre_libro}}</h2></label>
         
 <input type="hidden" value="{{$libr->id}}" name="id_libro" id="id_libro">       </div>
    </div>
  
        <div class="col-sm">
            <div class="form-group">
                @if(auth()->user()->rol!='Alum' && auth()->user()->rol!='Maes')
                <label for="exampleFormControlSelect1">Administrador: </label>
                <label for="text"><h2 class="btn-success">{{auth()->user()->name}}</h2></label>
                @else
                <label for="exampleFormControlSelect1">Alumno: </label>
                <label for="text"><h2 class="btn-success">{{auth()->user()->name}}</h2></label>
                <input type="hidden" name="id_alumno" id="id_alumno" value="{{auth()->user()->id}}">
                @endif
                
              </div>
        </div>
        </div>
        <br>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Guardar</button></div>
            
            <div class="form-group">
                @if(auth()->user()->rol!='Alum')
                    <a href="{{ route("table") }}" class="btn btn-info btn-block" >Atrás</a>
                @else
                <a href="{{ route("map") }}" class="btn btn-info btn-block" >Atrás</a>
                @endif
            </div>
           
    </div>
            </form>
            @else
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'NO ESTA DISPONIBLE!',
                showConfirmButton: false,
                footer: '<a href="{{ route("map") }}" class="btn btn-info btn-block" >Atrás</a>'
                })
            </script>
            <div class="alert alert-danger" role="alert">
                <strong>Danger!</strong> NO ESTA DISPONIBLE!
            </div> 
            <div class="">
                <a href="{{ route("map") }}" class="btn btn-info btn-block" >Atrás</a>    
            </div> 
            @endif
            </div>
        </div>@include('layouts.footers.auth')  
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

    $(function(){
        $("#id_alumno").select2();
      
    });
    $(function () {
            $('#estadolibro').change(function (e) {
              if ($(this).val() === "Malo") {
                $('#observaciones').prop("hidden", false);
              } else {
                $('#observaciones').prop("hidden", true);
              }
            })
          });
</script>

@endpush