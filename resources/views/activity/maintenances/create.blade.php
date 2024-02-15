@isset($vehicle)
<div class="modal fade text-dark" id="maintenanceCreate{{ $vehicle->id }}">
@endisset
@isset($vehicles)
<div class="modal fade text-dark" id="maintenanceCreate">
@endisset
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('maintenances.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Vehiculo</label>
                                    <select class="custom-select form-control-border" name="vehicle_id" required>
                                        @isset($vehicle)
                                            <option value="{{ $vehicle->id }}">{{ $vehicle->type }}</option>
                                        @endisset
                                        @isset($vehicles)
                                            @foreach ($vehicles as $vehicle)
                                                <option value="{{ $vehicle->id }}">{{ $vehicle->type }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Detalle de mantenimiento</label>
                                    <select class="custom-select form-control-border" name="maintenance_detail_id" required>
                                        @foreach ($maintenanceDetails as $maintenanceDetail)
                                            <option value="{{ $maintenanceDetail->id }}">{{ $maintenanceDetail->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Detalle</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Detalle" name="detail" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Cantidad</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Cantidad" name="cant" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Precio</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Precio" name="price" step="0.001" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Frecuencia</label>
                                    <select class="custom-select form-control-border" placeholder="Frecuencia" name="frequency" required>
                                        <option>Diario</option>
                                        <option>Semanal</option>
                                        <option>Quincenal</option>
                                        <option>Mesual</option>
                                        <option>Bimestral</option>
                                        <option>Trimestral</option>
                                        <option>Semestral</option>
                                        <option>Anual</option>
                                        <option>1 año 1/2</option>
                                        <option>2 años</option>
                                        <option>3 años</option>
                                        <option>4 años</option>
                                        <option>5 años</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
