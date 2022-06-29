<div class="modal fade element12" id="modal-default{{$alum->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content element3">
          <div class="modal-header">
              <h4 class="modal-title" id="modal-title-default">Roles</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          
          <div class="modal-body">
            <form method="POST" action="{{route('cambioRol',[$alum->id])}}"  role="form">
                {{ csrf_field() }}
                @method('put')
                <div class="col-sm"><strong>
                    <label> Nombre Completo</label></strong>
                    <input value="{{$alum->name}}" id="Nombre_completo" name="Nombre_completo" type="text" class="form-control form-control-muted" placeholder="ingrese su nombre completo" onkeypress="return soloLetras(event);" required>
                </div>
                <div class="col-sm">
                    <strong><label for="exampleFormControlSelect1">Elija un rol:</label></strong>
                    <div class="custom-control custom-radio mb-3">
                        <input value="2" name="roles" class="custom-control-input" id="customRadio5{{$alum->id}}" type="radio" checked>
                        <label class="custom-control-label" for="customRadio5{{$alum->id}}">Alumno</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="3" class="custom-control-input" id="customRadio6{{$alum->id}}"  type="radio">
                        <label class="custom-control-label" for="customRadio6{{$alum->id}}">Maestro</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="1" class="custom-control-input" id="customRadio7{{$alum->id}}" type="radio">
                        <label class="custom-control-label" for="customRadio7{{$alum->id}}">Administrador</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="4" class="custom-control-input" id="customRadio8{{$alum->id}}" type="radio">
                        <label class="custom-control-label" for="customRadio8{{$alum->id}}">Invitado</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="5" class="custom-control-input" id="customRadio9{{$alum->id}}" type="radio">
                        <label class="custom-control-label" for="customRadio9{{$alum->id}}">Co-Administrador</label>
                    </div>
                </div>
        <div class="modal-footer">
        <div class="row">
            <div class="col-sm">
                <button type="submit" class="btn btn-success btn-block">Guardar</button>
            </div>
            <div class="col-sm">
                <button type="button" class="btn btn-danger  btn-block" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
            </form>
            
        </div>
</div>
        </div>
        </div>
        </div>
