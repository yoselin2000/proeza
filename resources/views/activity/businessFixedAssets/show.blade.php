<div class="modal fade text-dark" id="businessFixedAssetShow{{ $businessFixedAsset->id }}">
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
                    {{ $businessFixedAsset->activity->evaluation->participant->application->id }}.- {{ $businessFixedAsset->activity->evaluation->participant->category->name }}.- {{ $businessFixedAsset->activity->evaluation->participant->client->lastName }} {{ $businessFixedAsset->activity->evaluation->participant->client->secondLastName }} {{ $businessFixedAsset->activity->evaluation->participant->client->name }} {{ $businessFixedAsset->activity->evaluation->participant->client->thirdLastName }}
                </dd>
                <dt class="col-sm-4">Tipo de Bien</dt>
                <dd class="col-sm-8">
                    {{ $businessFixedAsset->assetType->name }}
                </dd>
                <dt class="col-sm-4">Año/Compra</dt>
                <dd class="col-sm-8">
                    {{ $businessFixedAsset->year }}
                </dd>
                <dt class="col-sm-4">Valor Actual</dt>
                <dd class="col-sm-8">
                    {{ $businessFixedAsset->amount }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
