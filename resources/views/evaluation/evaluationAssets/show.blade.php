<div class="modal fade text-dark" id="evaluationAssetShow{{ $evaluationAsset->id }}">
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
                    {{ $evaluationAsset->evaluation->participant->application->id }}.- {{ $evaluationAsset->evaluation->participant->category->name }}.- {{ $evaluationAsset->evaluation->participant->client->lastName }} {{ $evaluationAsset->evaluation->participant->client->secondLastName }} {{ $evaluationAsset->evaluation->participant->client->name }} {{ $evaluationAsset->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Tiupo de Activo</dt>
                <dd class="col-sm-8">
                    {{ $evaluationAsset->assetType->name }}
                </dd>
                <dt class="col-sm-4">Descripcion</dt>
                <dd class="col-sm-8">
                    {{ $evaluationAsset->description }}
                </dd>
                <dt class="col-sm-4">Registro, Placa, Otros</dt>
                <dd class="col-sm-8">
                    {{ $evaluationAsset->complement }}
                </dd>
                <dt class="col-sm-4">Valor</dt>
                <dd class="col-sm-8">
                    {{ $evaluationAsset->value }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
