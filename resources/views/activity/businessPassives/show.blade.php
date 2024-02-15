<div class="modal fade text-dark" id="businessPassiveShow{{ $businessPassive->id }}">
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
                    {{ $businessPassive->activity->evaluation->participant->application->id }}.- {{ $businessPassive->activity->evaluation->participant->category->name }}.- {{ $businessPassive->activity->evaluation->participant->client->lastName }} {{ $businessPassive->activity->evaluation->participant->client->secondLastName }} {{ $businessPassive->activity->evaluation->participant->client->name }} {{ $businessPassive->activity->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Nombre del Banco u otro Acreedor</dt>
                <dd class="col-sm-8">
                    {{ $businessPassive->passiveType->name }}
                </dd>
                <dt class="col-sm-4">Monto</dt>
                <dd class="col-sm-8">
                    {{ $businessPassive->amount }}
                </dd>
                <dt class="col-sm-4">Cuota</dt>
                <dd class="col-sm-8">
                    {{ $businessPassive->share }}
                </dd>
                <dt class="col-sm-4">Plazo</dt>
                <dd class="col-sm-8">
                    {{ $businessPassive->term }}
                </dd>
                <dt class="col-sm-4">Frecuencia</dt>
                <dd class="col-sm-8">
                    {{ $businessPassive->frecuency }}
                </dd>
                <dt class="col-sm-4">Destino</dt>
                <dd class="col-sm-8">
                    {{ $businessPassive->destination }}
                </dd>
                <dt class="col-sm-4">Tipo de Garantia</dt>
                <dd class="col-sm-8">
                    {{ $businessPassive->warranty }}
                </dd>
                <dt class="col-sm-4">Saldo</dt>
                <dd class="col-sm-8">
                    {{ $businessPassive->balace }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
