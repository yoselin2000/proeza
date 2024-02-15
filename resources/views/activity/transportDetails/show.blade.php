<div class="modal fade text-dark" id="transportDetailShow{{ $transportDetail->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalle de transporte</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Transporte</dt>
                <dd class="col-sm-8">
                    {{ $transportDetail->transport->type }}
                </dd>
                <dt class="col-sm-4">Detalle</dt>
                <dd class="col-sm-8">
                    {{ $transportDetail->detail }}
                </dd>
                <dt class="col-sm-4">Numero de Carga</dt>
                <dd class="col-sm-8">
                    {{ $transportDetail->num }}
                </dd>
                <dt class="col-sm-4">Unidad</dt>
                <dd class="col-sm-8">
                    {{ $transportDetail->unit }}
                </dd>
                <dt class="col-sm-4">Numero de viajes</dt>
                <dd class="col-sm-8">
                    {{ $transportDetail->number }}
                </dd>
                <dt class="col-sm-4">Frecuencia</dt>
                <dd class="col-sm-8">
                    {{ $transportDetail->frequency }}
                </dd>
                <dt class="col-sm-4">Precio</dt>
                <dd class="col-sm-8">
                    {{ $transportDetail->price }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
