<div class="modal fade element12" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content element3">
          <div class="modal-header">
              <h4 class="modal-title" id="modal-title-default">Roles</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          
          <div class="modal-body">
            <form method="POST" action="{{route('cambioRol',[$alum->id,$alum->name])}}"  role="form">
                {{ csrf_field() }}
            
                <div class="col-sm"><strong>
                    <label> Nombre Completo</label></strong>
                    <input value="{{$alum->name}}" id="Nombre_completo" name="Nombre_completo" type="text" class="form-control form-control-muted" placeholder="ingrese su nombre completo" onkeypress="return soloLetras(event);" required>
                </div>
                <div class="col-sm">
                    <strong><label for="exampleFormControlSelect1">Elija un rol:</label></strong>
                    <div class="custom-control custom-radio mb-3">
                        <input value="Alum" name="roles" class="custom-control-input" id="customRadio5" type="radio">
                        <label class="custom-control-label" for="customRadio5">Alumno</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="Maes" class="custom-control-input" id="customRadio6"  type="radio">
                        <label class="custom-control-label" for="customRadio6">Maestro</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input name="roles"  value="Admin" class="custom-control-input" id="customRadio7" type="radio">
                        <label class="custom-control-label" for="customRadio7">Administrador</label>
                    </div>
                </div>
            </form>

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
