<div class="modal fade text-dark" id="receptionShow{{ $reception->id }}">
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
                <dt class="col-sm-4">Evaluacion</dt>
                <dd class="col-sm-8">
                    {{ $reception->evaluation->participant->application->id }}.- {{ $reception->evaluation->participant->category->name }}.- {{ $reception->evaluation->participant->client->lastName }} {{ $reception->evaluation->participant->client->secondLastName }} {{ $reception->evaluation->participant->client->name }} {{ $reception->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Tipo de Garantia</dt>
                <dd class="col-sm-8">
                    {{ $reception->warranty->name }}
                </dd>
                <dt class="col-sm-4">Tipo de Bien</dt>
                <dd class="col-sm-8">
                    {{ $reception->document->element->name }}
                </dd>
                <dt class="col-sm-4">Tipo de Documento</dt>
                <dd class="col-sm-8">
                    {{ $reception->document->name }}
                </dd>
                <dt class="col-sm-4">N° Doc</dt>
                <dd class="col-sm-8">
                    {{ $reception->doc }}
                </dd>
                <dt class="col-sm-4">N° de Fojas</dt>
                <dd class="col-sm-8">
                    {{ $reception->fojas }}
                </dd>
                <dt class="col-sm-4">Documento</dt>
                <dd class="col-sm-8">
                    {{ $reception->type }}
                </dd>
                <dt class="col-sm-4">Estado</dt>
                <dd class="col-sm-8">
                    {{ $reception->estate }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
