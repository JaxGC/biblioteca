<div class="modal fade element12" id="modal-Devolver{{$pres->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content element3">
          
          <div class="modal-header">
              <h4 class="modal-title" id="modal-title-default">Agregar observaciones </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          
          <div class="modal-body">
                
            <form method="POST" action="{{route('devolucionPres',$pres->id,'/',$pres->Nombre_libro)}}"  role="form">
                {{ csrf_field() }}
                <div class="col-sm">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Estado de Libro: </label>
            
                      <select id="estadolibro" name="estadolibro" class="form-control" >
                          <option value="0">Seleccionar dato</option>
                             
                          <option value="Bueno">Bueno</option>
                          <option value="Regular">Regular</option>
                          <option value="Malo">Malo</option>
                        </select>
                    </div>
                </div>
            <div class="col-sm">
                <label>Observaciones</label>
                <input name="observaciones" id="observaciones" type="text" class="form-control form-control-muted" placeholder="ingrese observaciones" hidden>
            </div><br>
              
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