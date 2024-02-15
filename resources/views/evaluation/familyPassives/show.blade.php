<div class="modal fade text-dark" id="familyPassiveShow{{ $familyPassive->id }}">
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
                  {{ $familyPassive->evaluation->participant->application->id }}.- {{ $familyPassive->evaluation->participant->category->name }}.- {{ $familyPassive->evaluation->participant->client->lastName }} {{ $familyPassive->evaluation->participant->client->secondLastName }} {{ $familyPassive->evaluation->participant->client->name }} {{ $familyPassive->evaluation->participant->client->thirdLastName }}
              </dd>
              <dt class="col-sm-4">Participante</dt>
              <dd class="col-sm-8">
                  {{ $familyPassive->passiveType->name }}
              </dd>
              <dt class="col-sm-4">Monto</dt>
              <dd class="col-sm-8">
                  {{ $familyPassive->amount }}
              </dd>
              <dt class="col-sm-4">Cuota</dt>
              <dd class="col-sm-8">
                  {{ $familyPassive->share }}
              </dd>
              <dt class="col-sm-4">Plazo</dt>
              <dd class="col-sm-8">
                  {{ $familyPassive->term }}
              </dd>
              <dt class="col-sm-4">Frecuencia</dt>
              <dd class="col-sm-8">
                  {{ $familyPassive->frecuency }}
              </dd>
              <dt class="col-sm-4">Destino</dt>
              <dd class="col-sm-8">
                  {{ $familyPassive->destination }}
              </dd>
              <dt class="col-sm-4">Tipo de Garantia</dt>
              <dd class="col-sm-8">
                  {{ $familyPassive->warranty }}
              </dd>
              <dt class="col-sm-4">Saldo</dt>
              <dd class="col-sm-8">
                  {{ $familyPassive->balace }}
              </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
