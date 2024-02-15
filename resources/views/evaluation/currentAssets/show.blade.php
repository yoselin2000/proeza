<div class="modal fade text-dark" id="currentAssetShow{{ $currentAsset->id }}">
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
                    {{ $currentAsset->evaluation->participant->application->id }}.- {{ $currentAsset->evaluation->participant->category->name }}.- {{ $currentAsset->evaluation->participant->client->lastName }} {{ $currentAsset->evaluation->participant->client->secondLastName }} {{ $currentAsset->evaluation->participant->client->name }} {{ $currentAsset->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Tiupo de Activo</dt>
                <dd class="col-sm-8">
                    {{ $currentAsset->assetType->name }}
                </dd>
                <dt class="col-sm-4">Valor</dt>
                <dd class="col-sm-8">
                    {{ $currentAsset->amount }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
