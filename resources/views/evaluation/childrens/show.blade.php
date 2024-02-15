<div class="modal fade text-dark" id="childrenShow{{ $children->id }}">
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
                    {{ $children->evaluation->participant->application->id }}.- {{ $children->evaluation->participant->category->name }}.- {{ $children->evaluation->participant->client->lastName }} {{ $children->evaluation->participant->client->secondLastName }} {{ $children->evaluation->participant->client->name }} {{ $children->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Tipo</dt>
                <dd class="col-sm-8">
                    {{ $children->state }}
                </dd>
                <dt class="col-sm-4">Edad</dt>
                <dd class="col-sm-8">
                    {{ $children->age }}
                </dd>
                <dt class="col-sm-4">Sexo</dt>
                <dd class="col-sm-8">
                    {{ $children->gender }}
                </dd>
                <dt class="col-sm-4">Estudia</dt>
                <dd class="col-sm-8">
                    {{ $children->student }}
                </dd>
                <dt class="col-sm-4">Donde</dt>
                <dd class="col-sm-8">
                    {{ $children->place }}
                </dd>
                <dt class="col-sm-4">Tipo de Entidad</dt>
                <dd class="col-sm-8">
                    {{ $children->type }}
                </dd>
                <dt class="col-sm-4">Otras Actividades</dt>
                <dd class="col-sm-8">
                    {{ $children->other }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
