<div class="modal fade text-dark" id="recoveryShow{{ $recovery->id }}">
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
                    @if ($recovery->credit->application->debtor())
                        {{ $recovery->credit->application->debtor()->lastName }} {{ $recovery->credit->application->debtor()->secondLastName }} {{ $recovery->credit->application->debtor()->name }} {{ $recovery->credit->application->debtor()->thirdLastName }}
                    @endif
                </dd>
                <dt class="col-sm-4">Plazo</dt>
                <dd class="col-sm-8">
                    {{ $recovery->fecha }}
                </dd>
                <dt class="col-sm-4">Tipo de Couta</dt>
                <dd class="col-sm-8">
                    {{ $recovery->saldoIni }}
                </dd>
                <dt class="col-sm-4">Frecuencia</dt>
                <dd class="col-sm-8">
                    {{ $recovery->capital }}
                </dd>
                <dt class="col-sm-4">Monto Posible</dt>
                <dd class="col-sm-8">
                    {{ $recovery->interes }}
                </dd>
                <dt class="col-sm-4">Tipo de Operación</dt>
                <dd class="col-sm-8">
                    {{ $recovery->vencido }}
                </dd>
                <dt class="col-sm-4">Secuencia</dt>
                <dd class="col-sm-8">
                    {{ $recovery->penal }}
                </dd><dt class="col-sm-4">Destino</dt>
                <dd class="col-sm-8">
                    {{ $recovery->diferido }}
                </dd>
                <dt class="col-sm-4">Destino Especifico</dt>
                <dd class="col-sm-8">
                    {{ $recovery->seguro }}
                </dd>
                <dt class="col-sm-4">Producto</dt>
                <dd class="col-sm-8">
                    {{ $recovery->cuotaTotal }}
                </dd>
                <dt class="col-sm-4">Usuarios</dt>
                <dd class="col-sm-8">
                    {{ $recovery->saldoFin }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
