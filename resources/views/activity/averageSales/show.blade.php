<div class="modal fade text-dark" id="averageSaleShow{{ $averageSale->id }}">
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
                  @if ($averageSale->activity)
                    {{ $averageSale->activity->evaluation->participant->application->id }}.- {{ $averageSale->activity->evaluation->participant->category->name }}.- {{ $averageSale->activity->evaluation->participant->client->lastName }} {{ $averageSale->activity->evaluation->participant->client->secondLastName }} {{ $averageSale->activity->evaluation->participant->client->name }} {{ $averageSale->activity->evaluation->participant->client->thirdLastName }}
                  @endif
                  @if ($averageSale->vehicle)
                    {{ $averageSale->vehicle->activity->evaluation->participant->application->id }}.- {{ $averageSale->vehicle->activity->evaluation->participant->category->name }}.- {{ $averageSale->vehicle->activity->evaluation->participant->client->lastName }} {{ $averageSale->vehicle->activity->evaluation->participant->client->secondLastName }} {{ $averageSale->vehicle->activity->evaluation->participant->client->name }} {{ $averageSale->vehicle->activity->evaluation->participant->client->thirdLastName }}
                  @endif
                </dd>
                <dt class="col-sm-4">Tipo de Producto</dt>
                <dd class="col-sm-8">
                    {{ $averageSale->type }}
                </dd>
                <dt class="col-sm-4">Buenas</dt>
                <dd class="col-sm-8">
                    {{ $averageSale->well }}
                </dd>
                <dt class="col-sm-4">Regular</dt>
                <dd class="col-sm-8">
                    {{ $averageSale->regular }}
                </dd>
                <dt class="col-sm-4">Mala</dt>
                <dd class="col-sm-8">
                    {{ $averageSale->bad }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
