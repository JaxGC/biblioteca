@extends('layouts.app')

@section('content')
@if (session('siaccess')=='ok')
<script>
    Swal.fire({
    icon: 'success',
    title: 'Excelente!',
    text: '¡Cambio de rol correcto!',
    showConfirmButton: false,
    footer: '<a href="{{ route("rolesUsu") }}" class="btn btn-info btn-block" >Atrás</a>'
    })
</script>
@endif
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
                            <option value="Invi">Invitado</option>
                            <option value="CoAdmin">CoAdministrador</option>
                        </select> 
                    </div>
                </div>
            </div>
            @include('pages.roles.tablaAlum')
            @include('pages.roles.tablaAdmin')
            @include('pages.roles.tablaMaes')
            @include('pages.roles.tablaInvi')
            @include('pages.roles.tablaCoAdmin')
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
                $('#tabla_admin').prop("hidden", false);
              } else {
                $('#tabla_admin').prop("hidden", true);
              }
              if ($(this).val() === "Maes") {
                $('#tabla_maes').prop("hidden", false);
              } else {
                $('#tabla_maes').prop("hidden", true);
              }
              if ($(this).val() === "Invi") {
                $('#tabla_Invi').prop("hidden", false);
              } else {
                $('#tabla_Invi').prop("hidden", true);
              }
              if ($(this).val() === "CoAdmin") {
                $('#tabla_Coadmin').prop("hidden", false);
              } else {
                $('#tabla_Coadmin').prop("hidden", true);
              }
            })
          });  
 
</script>
@endpush