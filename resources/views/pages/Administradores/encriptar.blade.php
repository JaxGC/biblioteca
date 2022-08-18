<form method="POST" action="{{ url('encriptar') }}"  role="form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-sm"><strong>
            <label> Ingrese correo electronico de usuario</label> <!--onkeypress="return soloLetras(event);" para solo letras-->
            </strong><input value="{{ old('Usuario') }}"id="Usuario" name="Usuario" type="text" class="form-control form-control-muted" placeholder="ingrese correo" required>
        </div>
    </div>
    <div class="col-xl-4">
        <button type="submit" class="btn btn-success btn-block">Guardar</button>
    </div>
</form>