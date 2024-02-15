<div class="modal fade text-dark" id="maintenanceShow{{ $maintenance->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Mantenimiento</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Vehiculo</dt>
                <dd class="col-sm-8">
                    {{ $maintenance->vehicle->type }}
                </dd>
                <dt class="col-sm-4">Detalle de mantenimiento</dt>
                <dd class="col-sm-8">
                    {{ $maintenance->maintenanceDetail->name }}
                </dd>
                <dt class="col-sm-4">Detalle</dt>
                <dd class="col-sm-8">
                    {{ $maintenance->detail }}
                </dd>
                <dt class="col-sm-4">Cantidad</dt>
                <dd class="col-sm-8">
                    {{ $maintenance->cant }}
                </dd>
                <dt class="col-sm-4">Precio</dt>
                <dd class="col-sm-8">
                    {{ $maintenance->price }}
                </dd>
                <dt class="col-sm-4">Total</dt>
                <dd class="col-sm-8">
                    {{ $maintenance->total }}
                </dd>
                <dt class="col-sm-4">Frecuencia</dt>
                <dd class="col-sm-8">
                    {{ $maintenance->frequency }}
                </dd>
                <dt class="col-sm-4">Monto mensual</dt>
                <dd class="col-sm-8">
                    {{ $maintenance->month }}
                </dd>
                <dt class="col-sm-4">Monto anual</dt>
                <dd class="col-sm-8">
                    {{ $maintenance->year }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
