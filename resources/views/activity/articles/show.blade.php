<div class="modal fade text-dark" id="articleShow{{ $article->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalles</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Nombre</dt>
                <dd class="col-sm-8">
                    {{ $article->name }}
                </dd>
                <dt class="col-sm-4">Rendimiento</dt>
                <dd class="col-sm-8">
                    {{ $article->performance }}
                </dd>
                <dt class="col-sm-4">Unidad de produccion</dt>
                <dd class="col-sm-8">
                    {{ $article->production }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
