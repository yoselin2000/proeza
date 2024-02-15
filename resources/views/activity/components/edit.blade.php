<div class="modal fade text-dark" id="componentEdit{{ $component->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('components.update', $component->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Vehiculo</label>
                                    <select class="custom-select form-control-border" name="vehicle_id" required>
                                        <option value="{{ $component->vehicle->id }}">{{ $component->vehicle->type }}</option>
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
                                    <label>Detalle de componente</label>
                                    <select class="custom-select form-control-border" name="component_detail_id" required>
                                        <option value="{{ $component->componentDetail->id }}">{{ $component->componentDetail->name }}</option>
                                        @foreach ($componentDetails as $componentDetail)
                                            <option value="{{ $componentDetail->id }}">{{ $componentDetail->state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Estado</label>
                                    <select class="custom-select form-control-border" placeholder="Estado" name="state" required>
                                        <option>{{ $component->state }}</option>
                                        <option>Bueno</option>
                                        <option>Regular</option>
                                        <option>Malo</option>
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
