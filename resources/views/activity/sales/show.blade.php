<div class="modal fade text-dark" id="saleShow{{ $sale->id }}">
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
                <dt class="col-sm-4">Participante</dt> {{--  participante? o venta?  --}}
                <dd class="col-sm-8">
                    {{ $sale->averageSale->activity->evaluation->participant->application->id }}.- {{ $sale->averageSale->activity->evaluation->participant->category->name }}.- {{ $sale->averageSale->activity->evaluation->participant->client->lastName }} {{ $sale->averageSale->activity->evaluation->participant->client->secondLastName }} {{ $sale->averageSale->activity->evaluation->participant->client->name }} {{ $sale->averageSale->activity->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Item</dt>
                <dd class="col-sm-8">
                    {{ $sale->item }}
                </dd>
                <dt class="col-sm-4">Cantidad</dt>
                <dd class="col-sm-8">
                    {{ $sale->amount }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
