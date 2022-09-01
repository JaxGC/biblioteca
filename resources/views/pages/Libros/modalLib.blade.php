<div class="modal fade element12" id="modal-default{{$lib->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content element3" style="width: 600cm">
            
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default"><h3>Detalles del libro</h3></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
              <div class="row">
                  <div class="col-sm-4">
                      <img src="/imagen_libro/{{$lib->imagen}}" width="100%" class="imagen img-responsive">
                  </div>
                  <div class="col-sm-8">
                      <dl>
                          <dt>CODIGO:</dt>
                          <dd class="codigo_libro">{{$lib->codigo}}</dd>
                          <dt>TITULO:</dt>
                          <dd class="titulo_libro">{{$lib->Nombre_libro}}</dd>
                          <dt>AUTOR:</dt>
                          <dd class="autor_libro">{{$lib->id_autor}}</dd>
                          <dt>EDITORIAL:</dt>
                          <dd class="editorial_libro">{{$lib->id_editorial}}</dd>
                          <dt>AÑO DE EDICION:</dt>
                          <dd class="codigo_libro">{{$lib->year_edicion}}</dd>
                          <dt>NUMERO DE STAND:</dt>
                          <dd class="codigo_libro">{{$lib->numero_stand}}</dd>
                          <dt>CATEGORIA:</dt>
                          <dd class="codigo_libro">{{$lib->id_categoria}}</dd>
                      </dl>
                  </div>
              </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-default element btn-sm btn-block" data-dismiss="modal">Cerrar</button>
            </div>
            
        </div>
    </div>
</div>