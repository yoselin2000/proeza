<div class="modal fade text-dark" id="supplyShow{{ $supply->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Insumo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Insumo</dt>
                <dd class="col-sm-8">
                    {{ $supply->name }}
                </dd>
                <dt class="col-sm-4">Cantidad</dt>
                <dd class="col-sm-8">
                    {{ $supply->cant }}
                </dd>
                <dt class="col-sm-4">Unidad</dt>
                <dd class="col-sm-8">
                    {{ $supply->unit }}
                </dd>
                <dt class="col-sm-4">Rendimiento</dt>
                <dd class="col-sm-8">
                    {{ $supply->performance }}
                </dd>
                <dt class="col-sm-4">Precio unitario</dt>
                <dd class="col-sm-8">
                    {{ $supply->price }}
                </dd>
                <dt class="col-sm-4">Total</dt>
                <dd class="col-sm-8">
                    {{ $supply->total}}
                </dd>
                <dt class="col-sm-4">Articulo</dt>
                <dd class="col-sm-8">
                    {{ $supply->article->name }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
