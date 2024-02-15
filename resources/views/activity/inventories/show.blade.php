<div class="modal fade text-dark" id="inventoryShow{{ $inventory->id }}">
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
                <dt class="col-sm-4">Participante</dt>
                <dd class="col-sm-8">
                    {{ $inventory->activity->evaluation->participant->application->id }}.- {{ $inventory->activity->evaluation->participant->category->name }}.- {{ $inventory->activity->evaluation->participant->client->lastName }} {{ $inventory->activity->evaluation->participant->client->secondLastName }} {{ $inventory->activity->evaluation->participant->client->name }} {{ $inventory->activity->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Tipo de Producto</dt>
                <dd class="col-sm-8">
                    {{ $inventory->type }}
                </dd>
                <dt class="col-sm-4">Cantidad</dt>
                <dd class="col-sm-8">
                    {{ $inventory->amount }}
                </dd>
                <dt class="col-sm-4">Unidad</dt>
                <dd class="col-sm-8">
                    {{ $inventory->unit }}
                </dd>
                <dt class="col-sm-4">Producto</dt>
                <dd class="col-sm-8">
                    {{ $inventory->name }}
                </dd>
                <dt class="col-sm-4">Precio de Compra</dt>
                <dd class="col-sm-8">
                    {{ $inventory->buys }}
                </dd>
                <dt class="col-sm-4">Precio de Venta</dt>
                <dd class="col-sm-8">
                    {{ $inventory->sale }}
                </dd>
                {{--  <dt class="col-sm-4">% Avance</dt>
                <dd class="col-sm-8">
                    {{ $inventory->advance }}
                </dd>
                <dt class="col-sm-4">Cantidad Vendida</dt>
                <dd class="col-sm-8">
                    {{ $inventory->cant }}
                </dd>
                <dt class="col-sm-4">Frecuencia</dt>
                <dd class="col-sm-8">
                    {{ $inventory->frecuency }}
                </dd>
                <dt class="col-sm-4">Valor materia prima</dt>
                <dd class="col-sm-8">
                    {{ $inventory->vimp }}
                </dd>
                <dt class="col-sm-4">Valor producto en proceso</dt>
                <dd class="col-sm-8">
                    {{ $inventory->vipp }}
                </dd>
                <dt class="col-sm-4">Valor producto terminado</dt>
                <dd class="col-sm-8">
                    {{ $inventory->vipt }}  --}}
                </dd>
                <dt class="col-sm-4">MB</dt>
                <dd class="col-sm-8">
                    {{ $inventory->mb }} %
                </dd>
                {{--  <dt class="col-sm-4">MBP</dt>
                <dd class="col-sm-8">
                    {{ $inventory->mbp }}
                </dd>
                <dt class="col-sm-4">Total</dt>
                <dd class="col-sm-8">
                    {{ $inventory->total }}
                </dd>  --}}
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
