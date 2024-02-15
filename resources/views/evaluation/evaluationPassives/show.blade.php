<div class="modal fade text-dark" id="evaluationPassiveShow{{ $evaluationPassive->id }}">
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
                  {{ $evaluationPassive->evaluation->participant->application->id }}.- {{ $evaluationPassive->evaluation->participant->category->name }}.- {{ $evaluationPassive->evaluation->participant->client->lastName }} {{ $evaluationPassive->evaluation->participant->client->secondLastName }} {{ $evaluationPassive->evaluation->participant->client->name }} {{ $evaluationPassive->evaluation->participant->client->thirdLastName }}
              </dd>
              <dt class="col-sm-4">Participante</dt>
              <dd class="col-sm-8">
                  {{ $evaluationPassive->passiveType->name }}
              </dd>
              <dt class="col-sm-4">Cuota Mensual</dt>
              <dd class="col-sm-8">
                  {{ $evaluationPassive->share }}
              </dd>
              <dt class="col-sm-4">Saldo Deudor</dt>
              <dd class="col-sm-8">
                  {{ $evaluationPassive->balace }}
              </dd>
              <dt class="col-sm-4">Fecha de Vencimiento</dt>
              <dd class="col-sm-8">
                  {{ $evaluationPassive->coming }}
              </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
