<div class="modal fade text-dark" id="activityShow{{ $activity->id }}">
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
                    {{ $activity->evaluation->participant->application->id }}.- {{ $activity->evaluation->participant->category->name }}.- {{ $activity->evaluation->participant->client->lastName }} {{ $activity->evaluation->participant->client->secondLastName }} {{ $activity->evaluation->participant->client->name }} {{ $activity->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Actividad Economica</dt>
                <dd class="col-sm-8">
                    {{ $activity->form }}
                </dd>
                <dt class="col-sm-4">Caedec</dt>
                <dd class="col-sm-8">
                    {{ $activity->caedec->code }}.- {{ $activity->caedec->heading }}.- {{ $activity->caedec->description }}
                </dd>
                <dt class="col-sm-4">Actividad Especifica</dt>
                <dd class="col-sm-8">
                    {{ $activity->specific }}
                </dd>
                <dt class="col-sm-4">Profesion/Ocupacion</dt>
                <dd class="col-sm-8">
                    {{ $activity->profession }}
                </dd>
                <dt class="col-sm-4">Realizada por</dt>
                <dd class="col-sm-8">
                    {{ $activity->responsable }}
                </dd>
                <dt class="col-sm-4">Experiencia en el Rubro (meses)</dt>
                <dd class="col-sm-8">
                    {{ $activity->experience }}
                </dd>
                <dt class="col-sm-4">Antiguedad del Negocio (meses)</dt>
                <dd class="col-sm-8">
                    {{ $activity->antiquity }}
                </dd>
                <dt class="col-sm-4">Propiedad del puesto y/o Lugar</dt>
                <dd class="col-sm-8">
                    {{ $activity->property }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
