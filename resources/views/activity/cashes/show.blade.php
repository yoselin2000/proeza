<div class="modal fade text-dark" id="cashShow{{ $cash->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalle de efectivo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Participante</dt>
                <dd class="col-sm-8">
                    {{ $cash->activity->evaluation->participant->application->id }}.- {{ $cash->activity->evaluation->participant->category->name }}.- {{ $cash->activity->evaluation->participant->client->lastName }} {{ $cash->activity->evaluation->participant->client->secondLastName }} {{ $cash->activity->evaluation->participant->client->name }} {{ $cash->activity->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Fecha de evaluacion</dt>
                <dd class="col-sm-8">
                    {{ $cash->assessment }}
                </dd>
                <dt class="col-sm-4">Fecha Ultima Compra</dt>
                <dd class="col-sm-8">
                    {{ $cash->buys }}
                </dd>
                <dt class="col-sm-4">UnidEfectivo Realad</dt>
                <dd class="col-sm-8">
                    {{ $cash->real }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
