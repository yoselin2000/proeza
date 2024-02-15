<div class="modal fade text-dark" id="referenceShow{{ $reference->id }}">
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
                    {{ $reference->evaluation->participant->application->id }}.- {{ $reference->evaluation->participant->category->name }}.- {{ $reference->evaluation->participant->client->lastName }} {{ $reference->evaluation->participant->client->secondLastName }} {{ $reference->evaluation->participant->client->name }} {{ $reference->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Nombre</dt>
                <dd class="col-sm-8">
                    {{ $reference->name }}
                </dd>
                <dt class="col-sm-4">Direccion</dt>
                <dd class="col-sm-8">
                    {{ $reference->address }}
                </dd>
                <dt class="col-sm-4">Telf. Movil</dt>
                <dd class="col-sm-8">
                    {{ $reference->mobile }}
                </dd>
                <dt class="col-sm-4">Tipo de Referencia</dt>
                <dd class="col-sm-8">
                    {{ $reference->type }}
                </dd>
                <dt class="col-sm-4">Vinculo</dt>
                <dd class="col-sm-8">
                    {{ $reference->link }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
