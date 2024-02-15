<div class="modal fade text-dark" id="rangeShow{{ $range->id }}">
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
                <dt class="col-sm-4">Tipo</dt>
                <dd class="col-sm-8">
                    {{ $range->type }}
                </dd>
                <dt class="col-sm-4">Minimo</dt>
                <dd class="col-sm-8">
                    {{ $range->min }}
                </dd>
                <dt class="col-sm-4">Maximo</dt>
                <dd class="col-sm-8">
                    {{ $range->max }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
