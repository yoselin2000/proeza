<div class="modal fade text-dark" id="complementShow{{ $complement->id }}">
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
                    {{ $complement->activity->evaluation->participant->application->id }}.- {{ $complement->activity->evaluation->participant->category->name }}.- {{ $complement->activity->evaluation->participant->client->lastName }} {{ $complement->activity->evaluation->participant->client->secondLastName }} {{ $complement->activity->evaluation->participant->client->name }} {{ $complement->activity->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Informacion sobre</dt>
                <dd class="col-sm-8">
                    {{ $complement->type }}
                </dd>
                <dt class="col-sm-4">Descripcion</dt>
                <dd class="col-sm-8">
                    {{ $complement->description }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
