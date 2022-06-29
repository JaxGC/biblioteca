<div class="modal fade element12" id="modal-Maes{{$maes->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content element3">
          <div class="modal-header">
              <h4 class="modal-title" id="modal-title-default">Roles</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          
          <div class="modal-body">
            <form method="POST" action="{{route('cambioRol',[$maes->id])}}"  role="form">
                {{ csrf_field() }}
                @method('put')
                <div class="col-sm"><strong>
                    <label> Nombre Completo</label></strong>
                    <input value="{{$maes->name}}" id="Nombre_completo" name="Nombre_completo" type="text" class="form-control form-control-muted" placeholder="ingrese su nombre completo" onkeypress="return soloLetras(event);" required>
                </div>
                <div class="col-sm">
                    <strong><label for="exampleFormControlSelect1">Elija un rol:</label></strong>
                    <div class="custom-control custom-radio mb-3">
                        <input value="2" name="roles" class="custom-control-input" id="custom1{{$maes->id}}" type="radio">
                        <label class="custom-control-label" for="custom1{{$maes->id}}">Alumno</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="3" class="custom-control-input" id="custom2{{$maes->id}}"  type="radio" checked>
                        <label class="custom-control-label" for="custom2{{$maes->id}}">Maestro</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="1" class="custom-control-input" id="custom3{{$maes->id}}" type="radio">
                        <label class="custom-control-label" for="custom3{{$maes->id}}">Administrador</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="4" class="custom-control-input" id="custom4{{$maes->id}}" type="radio">
                        <label class="custom-control-label" for="custom4{{$maes->id}}">Invitado</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="5" class="custom-control-input" id="custom5{{$maes->id}}" type="radio">
                        <label class="custom-control-label" for="custom5{{$maes->id}}">Co-Administrador</label>
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
