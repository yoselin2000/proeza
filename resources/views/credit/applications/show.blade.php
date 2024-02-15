<div class="modal fade text-dark" id="applicationShow{{ $application->id }}">
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
                <dt class="col-sm-4">Monto</dt>
                <dd class="col-sm-8">
                    {{ $application->amount }}
                </dd>
                <dt class="col-sm-4">Plazo</dt>
                <dd class="col-sm-8">
                    {{ $application->term }}
                </dd>
                <dt class="col-sm-4">Tipo de Couta</dt>
                <dd class="col-sm-8">
                    {{ $application->feeType }}
                </dd>
                <dt class="col-sm-4">Frecuencia</dt>
                <dd class="col-sm-8">
                    {{ $application->frequency }}
                </dd>
                <dt class="col-sm-4">Monto Posible</dt>
                <dd class="col-sm-8">
                    {{ $application->choose }}
                </dd>
                <dt class="col-sm-4">Tipo de Operación</dt>
                <dd class="col-sm-8">
                    {{ $application->operation }}
                </dd>
                <dt class="col-sm-4">Secuencia</dt>
                <dd class="col-sm-8">
                    {{ $application->sequence }}
                </dd><dt class="col-sm-4">Destino</dt>
                <dd class="col-sm-8">
                    {{ $application->destination_id }}
                </dd>
                <dt class="col-sm-4">Destino Especifico</dt>
                <dd class="col-sm-8">
                    {{ $application->specific }}
                </dd>
                <dt class="col-sm-4">Producto</dt>
                <dd class="col-sm-8">
                    {{ $application->product->name }}.- {{ $application->product->min }}-{{ $application->product->max }}.- {{ $application->product->currency }}.- {{ $application->product->rate }}% anual
                </dd>
                <dt class="col-sm-4">Usuarios</dt>
                <dd class="col-sm-8">
                    {{ $application->user->name }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
