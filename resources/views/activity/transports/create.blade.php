@isset($vehicle)
    <div class="modal fade text-dark" id="transportCreate{{ $vehicle->id }}">
@endisset
@isset($vehicles)
    <div class="modal fade text-dark" id="transportCreate">
@endisset
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('transports.store') }}" method="POST">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Tipo</label>
                                    <select class="custom-select form-control-border" placeholder="Tipo" name="type" required>
                                        <option>Ruta</option>
                                        <option>Libre</option>
                                        <option>Renta</option>
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
