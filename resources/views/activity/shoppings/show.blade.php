<div class="modal fade text-dark" id="shoppingShow{{ $shopping->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalle de compras</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Participante</dt>
                <dd class="col-sm-8">
                    {{ $shopping->activity->evaluation->participant->application->id }}.- {{ $shopping->activity->evaluation->participant->category->name }}.- {{ $shopping->activity->evaluation->participant->client->lastName }} {{ $shopping->activity->evaluation->participant->client->secondLastName }} {{ $shopping->activity->evaluation->participant->client->name }} {{ $shopping->activity->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Producto</dt>
                <dd class="col-sm-8">
                    {{ $shopping->name }}
                </dd>
                <dt class="col-sm-4">Cantidad</dt>
                <dd class="col-sm-8">
                    {{ $shopping->amount }}
                </dd>
                <dt class="col-sm-4">Unidad</dt>
                <dd class="col-sm-8">
                    {{ $shopping->unit }}
                </dd>
                <dt class="col-sm-4">Frecuencia</dt>
                <dd class="col-sm-8">
                    {{ $shopping->frecuency }}
                </dd>
                <dt class="col-sm-4">Precio Compra</dt>
                <dd class="col-sm-8">
                    {{ $shopping->buys }}
                </dd>
                <dt class="col-sm-4">Total</dt>
                <dd class="col-sm-8">
                    {{ $shopping->total }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
