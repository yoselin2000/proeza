<div class="modal fade text-dark" id="saleDetailEdit{{ $saleDetail->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('saleDetails.update', $saleDetail->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Actividad Economica</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="activity_id" required>
                                            <option value="{{ $saleDetail->activity->id }}">{{ $saleDetail->activity->evaluation->participant->application->id }}.- {{ $saleDetail->activity->evaluation->participant->category->name }}.- {{ $saleDetail->activity->evaluation->participant->client->lastName }} {{ $saleDetail->activity->evaluation->participant->client->secondLastName }} {{ $saleDetail->activity->evaluation->participant->client->name }} {{ $saleDetail->activity->evaluation->participant->client->thirdLastName }}</option>
                                            @isset($activities)
                                                @foreach ($activities as $activity)
                                                    <option value="{{ $activity->id }}">{{ $activity->evaluation->participant->application->id }}.- {{ $activity->evaluation->participant->category->name }}.- {{ $activity->evaluation->participant->client->lastName }} {{ $activity->evaluation->participant->client->secondLastName }} {{ $activity->evaluation->participant->client->name }} {{ $activity->evaluation->participant->client->thirdLastName }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @isset($inventories)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Detalle de productos Inventario</label>
                                        <div class="select2-primary">
                                            <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="inventory_id">
                                                <option value="{{ $saleDetail->inventory->id ?? '' }}">{{ $saleDetail->inventory->name ?? '' }}</option>
                                                @isset($inventory)
                                                    <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                                                @endisset
                                                @isset($inventories)
                                                    @foreach ($inventories as $inventory)
                                                        <option></option>
                                                        <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        @isset($articles)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Detalle de productos Articulo</label>
                                        <div class="select2-primary">
                                            <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="article_id">
                                                <option value="{{ $saleDetail->article->id ?? '' }}">{{ $saleDetail->article->name ?? '' }}</option>
                                                @isset($article)
                                                    <option value="{{ $article->id }}">{{ $article->name }}</option>
                                                @endisset
                                                @isset($articles)
                                                    @foreach ($articles as $article)
                                                        <option></option>
                                                        <option value="{{ $article->id }}">{{ $article->name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Cantidad</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Cantidad " name="cant" step=".01" value="{{ $saleDetail->cant }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Frecuencia</label>
                                    <select class="custom-select form-control-border" name="frecuency">
                                        <option>{{ $saleDetail->frecuency }}</option>
                                        <option>Diario</option>
                                        <option>Semanal</option>
                                        <option>Quinsenal</option>
                                        <option>Mensual</option>
                                        <option>Bimensula</option>
                                        <option>Trimestral</option>
                                        <option>Semestral</option>
                                        <option>Anual</option>
                                    </select>
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
