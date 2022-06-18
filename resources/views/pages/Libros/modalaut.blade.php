<div class="modal fade element12" id="modal-default1" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content element3">
          
          <div class="modal-header">
              <h4 class="modal-title" id="modal-title-default">Agregar Autor </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          
          <div class="modal-body">
               
            <form method="POST" action="{{ route('agregarAutor') }}"  role="form">
                {{ csrf_field() }}
            <div class="col-sm">
                <label> Nombre </label>
                <input name="Nombre_autor" id="Nombre_autor" type="text" class="form-control form-control-muted" placeholder="ingrese el nombre de autor" onkeypress="return soloLetras(event);" required>
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
