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
        <form method="POST" action="{{ url('cambioRol') }}"  role="form">
            {{ csrf_field() }}
            @method('put')
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
            @include('pages.roles.tablaMaes')
            <div class="col-lx-8">
              <div class="table-responsive">
                  <table id="tabla_usu" name="tabla_usu" class="table table-bordered table-striped display" style="width:100%" hidden>
                      <thead class="thead-dark">
                          <tr>
                          <th>Matricula</th>
                          <th>Nombre de alumno</th>
                          <th>Acciones</th>
                          </tr>
                      </thead>
                     
                      <tbody> 
                          @foreach ($alumnos as $alum)
                          <tr>
                          <td>{{$alum->clave}}</td>
                          <td>{{$alum->name}}</td>
                          <td>
                             <button type="button" class="btn btn-sm badge-pill badge-info" data-toggle="modal" data-target="#modal-default" data-toggle="tooltip" data-placement="top" title="seleccione para cambiar el rol">Cambiar rol</button>
                          </td>
                          </tr>
                           @endforeach
                      </tbody> 
                      <tfoot>
                          <tr>
                              <th>Matricula</th>
                              <th>Nombre de alumno</th>
                              <th>Acciones</th>
                          </tr>
                      </tfoot> 
                  </table>
              </div>
          </div>
          <script>
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
          @include('pages.roles.modalCambioRolAlum')
            @include('pages.roles.tablaAdmin')
            
        </form>
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
          
</script>
@endpush