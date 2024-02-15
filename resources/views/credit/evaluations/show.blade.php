<div class="modal fade text-dark" id="evaluationShow{{ $evaluation->id }}">
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
                    {{ $evaluation->participant->application->id }}.- {{ $evaluation->participant->category->name }}.- {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Edad</dt>
                <dd class="col-sm-8">
                    {{ $evaluation->age }}
                </dd>
                <dt class="col-sm-4">Estado Civil</dt>
                <dd class="col-sm-8">
                    {{ $evaluation->civil }}
                </dd>
                <dt class="col-sm-4">Telf. Movil</dt>
                <dd class="col-sm-8">
                    {{ $evaluation->mobile }}
                </dd>
                <dt class="col-sm-4">Telf. Fijo</dt>
                <dd class="col-sm-8">
                    {{ $evaluation->landline }}
                </dd>
                <dt class="col-sm-4">Situación Laboral</dt>
                <dd class="col-sm-8">
                    {{ $evaluation->employment }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
