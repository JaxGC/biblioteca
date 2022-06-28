<div class="modal fade element12" id="modal-Admin{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content element3">
          <div class="modal-header">
              <h4 class="modal-title" id="modal-title-default">Roles</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          
          <div class="modal-body">
            <form method="POST" action="{{route('cambioRol',[$admin->id])}}"  role="form">
                {{ csrf_field() }}
                @method('put')
                <div class="col-sm"><strong>
                    <label> Nombre Completo</label></strong>
                    <input value="{{$admin->name}}" id="Nombre_completo" name="Nombre_completo" type="text" class="form-control form-control-muted" placeholder="ingrese su nombre completo" onkeypress="return soloLetras(event);" required>
                </div>
                <div class="col-sm">
                    <strong><label for="exampleFormControlSelect1">Elija un rol:</label></strong>
                    <div class="custom-control custom-radio mb-3">
                        <input value="2" name="roles" class="custom-control-input" id="custom1{{$admin->id}}" type="radio">
                        <label class="custom-control-label" for="custom1{{$admin->id}}">Alumno</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="3" class="custom-control-input" id="custom2{{$admin->id}}"  type="radio">
                        <label class="custom-control-label" for="custom2{{$admin->id}}">Maestro</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="1" class="custom-control-input" id="custom3{{$admin->id}}" type="radio">
                        <label class="custom-control-label" for="custom3{{$admin->id}}">Administrador</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="4" class="custom-control-input" id="custom4{{$admin->id}}" type="radio">
                        <label class="custom-control-label" for="custom4{{$admin->id}}">Invitado</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="5" class="custom-control-input" id="custom5{{$admin->id}}" type="radio">
                        <label class="custom-control-label" for="custom5{{$admin->id}}">Co-Administrador</label>
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
