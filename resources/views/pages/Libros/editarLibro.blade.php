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
            <h1>Editar Libro</h1>
            <form method="POST" action="{{ route('Libro.update', $varlib) }}"  role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
            <div class="row">
            <div class="col-sm"><strong>
                <label> Nombre del libro</label></strong>
                <input value="{{$varlib->Nombre_libro}}" id="Nombre_libro" name="Nombre_libro" type="text" class="form-control form-control-muted" placeholder="ingrese nombre libro" required>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <strong>
                    <label for="exampleFormControlSelect1">Autor</label></strong>
                    <select id="id_autor" name="id_autor" class="form-control">
                        @if ($varlib)
                            <option value="{{$varlib->id_autor}}">{{$varlib->id_autor}}</option>
                            @foreach ($auto as $autor)
                                <option value="{{$autor->Nombre_autor}}">{{$autor->Nombre_autor}}</option>
                            @endforeach
                            @else
                            <option value="0">Selecciona Autor</option>
                        @foreach ($auto as $autor)
                            <option value="{{$autor->Nombre_autor}}">{{$autor->Nombre_autor}}</option>
                        @endforeach
                        @endif
                    </select>
                  </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <strong>
                    <label for="exampleFormControlSelect1">Editorial</label></strong>
                    <select id="id_editorial" name="id_editorial" class="form-control">
                        @if ($varlib)
                            <option value="{{$varlib->id_editorial}}">{{$varlib->id_editorial}}</option>
                            @foreach ($editoria as $editorial)
                                <option value="{{$editorial->Nombre_editorial}}">{{$editorial->Nombre_editorial}}</option>
                            @endforeach
                            @else
                            <option value="0">Selecciona Editorial</option>
                        @foreach ($editoria as $editorial)
                            <option value="{{$editorial->Nombre_editorial}}">{{$editorial->Nombre_editorial}}</option>
                        @endforeach
                        @endif
                    </select>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group"><strong>
                    <label for="exampleFormControlSelect1">Categoria</label></strong>
                    <select id="id_categoria" name="id_categoria" class="form-control">
                        @if ($varlib)
                            <option value="{{$varlib->id_categoria}}">{{$varlib->id_categoria}}</option>
                            @foreach ($categori as $categoria)
                                <option value="{{$categoria->Nombre_categoria}}">{{$categoria->Nombre_categoria}}</option>
                            @endforeach
                            @else
                            <option value="0">Selecciona Categoria</option>
                        @foreach ($categori as $categoria)
                            <option value="{{$categoria->Nombre_categoria}}">{{$categoria->Nombre_categoria}}</option>
                        @endforeach
                        @endif
                    </select>
                  </div>
            </div>
            @push('js')
                        <script>
                            $(document).ready(function(e) {
                                $('#id_categoria').select2();

                                $('#id_editorial').select2();

                                $('#id_autor').select2();
                            });
                        </script>
                    @endpush
            <div class="col-sm"><strong>
                <label> Ejemplares</label></strong>
                <input value="{{$varlib->ejemplares}}" id="ejemplares" name="ejemplares" type="text" class="form-control form-control-muted" placeholder="ingrese ejemplares" required>
            </div>
            <div class="col-sm">
                <strong>
                <label > Año de edicion</label>
                </strong>
                <input value="{{$varlib->year_edicion}}" type="numeric" name="year_edicion" id="year_edicion" class="form-control form-control-muted" placeholder="ingrese el numero de edicion">

            </div>
            <div class="col-sm">
                <strong>
                <label > Numero Stand</label>
                </strong>
                <input value="{{$varlib->numero_stand}}" type="numeric" name="numero_stand" id="numero_stand" class="form-control form-control-muted" placeholder="ingrese el numero de stand">

            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <strong>
                <label> Libros Prestados </label>
                </strong>
                <input value="{{$varlib->libros_prestados}}" id="libros_prestados" name="libros_prestados" type="text" class="form-control form-control-muted" placeholder="ingrese libros prestados" required>
            </div>
            <div class="col-sm">
                <strong>
                <label for="exampleFormControlSelect1">Estado</label>
                </strong>
                 <div class="custom-control custom-radio mb-3">
                        <input name="estado" class="custom-control-input" id="customRadio5" type="radio"> 
                        <label class="custom-control-label" for="customRadio5">Bueno</label>      
                 </div>
                 <div class="custom-control custom-radio mb-3">
                        <input name="estado" class="custom-control-input" id="customRadio6" checked="" type="radio">
                        <label class="custom-control-label" for="customRadio6">Malo</label>
                 </div>
                 <div class="custom-control custom-radio mb-3">
                    <input name="estado" class="custom-control-input" id="customRadio7" checked="" type="radio">
                    <label class="custom-control-label" for="customRadio7">Regular</label>
             </div>
             </div>
             <div class="col-sm">
                <strong>
                <label> Observaciones </label>  
                </strong>
                <input value="{{$varlib->observaciones}}" id="observaciones" name="observaciones" type="text" class="form-control form-control-muted" placeholder="ingrese observaciones" required>
            </div>
            <div class="col-sm">
                <strong>
                <label > Código</label>
                </strong>
                <input value="{{$varlib->codigo}}" type="numeric" name="codigo" id="codigo" class="form-control form-control-muted" placeholder="ingrese el codigo de libro">

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
        </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Guardar</button></div>
                <div class="form-group">
                    <a href="{{ route("map") }}" class="btn btn-info btn-block" >Atrás</a>
                </div>
            </form>
        </div>
        </div>
    </div>@include('layouts.footers.auth') 
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