<div class="modal fade text-dark" id="maintenanceHistoryEdit{{ $maintenanceHistory->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('maintenanceHistories.update', $maintenanceHistory->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Articulo</label>
                                    <select class="custom-select form-control-border" name="element_component_id" required>
                                        <option value="{{ $maintenanceHistory->elementComponent->id }}">{{ $maintenanceHistory->elementComponent->companyElement->name }}</option>
                                        @foreach ($elementComponents as $elementComponent)
                                            <option value="{{ $elementComponent->id }}">{{ $elementComponent->companyElement->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Fecha de salida</label>
                                    <input type="date" class="form-control form-control-border" placeholder="Fecha de salida" name="FDeparture" value="{{ $maintenanceHistory->FDeparture }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Fecha de entrada</label>
                                    <input type="date" class="form-control form-control-border" placeholder="Fecha de entrada" name="FEntry" value="{{ $maintenanceHistory->FEntry }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-textarea">Descripción</label>
                                    <textarea id="my-textarea" class="form-control form-control-border"
                                    name="description" rows="3">{{ $maintenanceHistory->description }}</textarea>
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
