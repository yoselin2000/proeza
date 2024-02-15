<div class="modal fade text-dark" id="familyFixedAssetEdit{{ $familyFixedAsset->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('family_fixed_assets.update', $familyFixedAsset->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Evaluacion</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="evaluation_id" required>
                                            @isset($evaluation)
                                                <option value="{{ $evaluation->id }}">{{ $evaluation->participant->application->id }}.- {{ $evaluation->participant->category->name }}.- {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }}</option>
                                            @endisset
                                            @isset($evaluations)
                                                <option value="{{ $familyFixedAsset->evaluation->id }}">{{ $familyFixedAsset->evaluation->participant->application->id }}.- {{ $familyFixedAsset->evaluation->participant->category->name }}.- {{ $familyFixedAsset->evaluation->participant->client->lastName }} {{ $familyFixedAsset->evaluation->participant->client->secondLastName }} {{ $familyFixedAsset->evaluation->participant->client->name }} {{ $familyFixedAsset->evaluation->participant->client->thirdLastName }}</option>
                                                @foreach ($evaluations as $evaluation)
                                                    <option value="{{ $evaluation->id }}">{{ $evaluation->participant->application->id }}.- {{ $evaluation->participant->category->name }}.- {{ $evaluation->participant->client->lastName }} {{ $evaluation->participant->client->secondLastName }} {{ $evaluation->participant->client->name }} {{ $evaluation->participant->client->thirdLastName }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipo de Activo</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="asset_type_id" required>
                                            <option value="{{ $familyFixedAsset->assetType->id }}">{{ $familyFixedAsset->assetType->name }}</option>
                                            @foreach ($assetTypes as $assetType)
                                                <option value="{{ $assetType->id }}">{{ $assetType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Año/Compra</label>
                                    <input type="date" class="form-control form-control-border" placeholder="Año/Compra" name="year" value="{{ $familyFixedAsset->year }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Valor Actual</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Valor Actual" name="amount" value="{{ $familyFixedAsset->amount }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>