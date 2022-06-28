<div class="col-lx-8">
    <select id="id_administrador" name="id_administrador" class="form-control" hidden>
            @foreach ($administradores as $admin)
                <option value="{{$admin->id}}">{{$admin->name}}</option>    
            @endforeach
    </select>
</div>
<div class="col-lx-8">
    <div class="table-responsive">
        <table id="tabla_admin" name="tabla_admin" class="table table-bordered table-striped display" style="width:100%" hidden>
            <thead class="thead-dark">
                <tr>
                <th>Nombre de administrador</th>
                <th>Acciones</th>
                </tr>
            </thead>
           
            <tbody> 
                @foreach ($administradores as $admin)
                <tr>
                <td>{{$admin->name}}</td>
                <td>
                   <button type="button" class="btn btn-sm badge-pill badge-info" data-toggle="modal" data-target="#modal-Admin{{$admin->id}}" data-toggle="tooltip" data-placement="top" title="seleccione para cambiar el rol">Cambiar rol</button>
                </td>
                </tr> 
                @include('pages.roles.modalCambioRolAdmin')
                 @endforeach
            </tbody> 
            <tfoot>
                <tr>
                    <th>Nombre de administrador</th>
                    <th>Acciones</th>
                </tr>
            </tfoot> 
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
    $('#tabla_admin').DataTable({
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
