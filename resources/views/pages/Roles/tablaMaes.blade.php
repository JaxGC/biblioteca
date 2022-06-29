<div class="col-lx-8">
        <div class="table-responsive">
            <table id="tabla_maes" name="tabla_maes" class="table table-bordered table-striped display" style="width:100%" hidden>
                <thead class="thead-dark">
                    <tr>
                    <th>Nombre de administrador</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
               
                <tbody> 
                    @foreach ($maestros as $maes)
                    <tr>
                    <td>{{$maes->name}}</td>
                    <td>
                       <button type="button" class="btn btn-sm badge-pill badge-info" data-toggle="modal" data-target="#modal-Maes{{$maes->id}}" data-toggle="tooltip" data-placement="top" title="seleccione para cambiar el rol">Cambiar rol</button>
                    </td>
                    </tr> 
                    @include('pages.roles.modalCambioRolMaes')
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
        $('#tabla_maes').DataTable({
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
    