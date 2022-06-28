@extends('layouts.app')

@section('content')
@extends('layouts.bootstrapstilos')
<div class="card-body" ><br>
</div>
<div class="card-body">
    <div class="card-body shadow">
        <div class="card-body">
            <h1>Cambiar el rol para usuarios</h1>
        </div>
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <strong>
                      <label for="exampleFormControlSelect1">Seleccione el usuario al que cambiara el rol: </label>
                        </strong>
                         <select id="rolUsuario" name="rolUsuario" class="form-control" >
                            <option value="0">Seleccionar dato</option>
                            <option value="Alum">Alumno</option>
                            <option value="Maes">Maestro</option>
                            <option value="Admin">Administrador</option>
                        </select> 
                    </div>
                </div>
            </div>
            @include('pages.roles.tablaAlum')
    </div>@include('layouts.footers.auth')  
</div>
@endsection
            
@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script>
     $(function () {
            $('#rolUsuario').change(function (e) {
              if ($(this).val() === "Alum") {
                $('#tabla_usu').prop("hidden", false);
              } else {
                $('#tabla_usu').prop("hidden", true);
              }
              if ($(this).val() === "Admin") {
                $('#id_administrador').prop("hidden", false);
              } else {
                $('#id_administrador').prop("hidden", true);
              }
              if ($(this).val() === "Maes") {
                $('#id_maestro').prop("hidden", false);
              } else {
                $('#id_maestro').prop("hidden", true);
              }
            })
          });  
  $(document).ready(function() {
  $('#tabla_usu').DataTable({
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