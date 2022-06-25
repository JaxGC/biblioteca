<div class="col-lx-8">
    <select id="id_administrador" name="id_administrador" class="form-control" hidden>
            @foreach ($administradores as $admin)
                <option value="{{$admin->id}}">{{$admin->name}}</option>    
            @endforeach
    </select>
</div>