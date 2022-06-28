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
                   <button type="button" class="btn btn-sm badge-pill badge-info" data-toggle="modal" data-target="#modal-default{{$alum->id}}" data-toggle="tooltip" data-placement="top" title="seleccione para cambiar el rol">Cambiar rol</button>
                </td>
                </tr>
                @include('pages.roles.modalCambioRolAlum')
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


