<div class="modal fade text-dark" id="averageSaleCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('average_sales.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Actividad Economica</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="activity_id">
                                            <option></option>
                                            @isset($activity)
                                                <option value="{{ $activity->id }}">{{ $activity->evaluation->participant->application->id }}.- {{ $activity->evaluation->participant->category->name }}.- {{ $activity->evaluation->participant->client->lastName }} {{ $activity->evaluation->participant->client->secondLastName }} {{ $activity->evaluation->participant->client->name }} {{ $activity->evaluation->participant->client->thirdLastName }}</option>
                                            @endisset
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Vehiculo</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="vehicle_id">
                                            <option></option>
                                            @isset($vehicle)
                                                <option value="{{ $vehicle->id }}">{{ $vehicle->activity->evaluation->participant->application->id }}.- {{ $vehicle->activity->evaluation->participant->category->name }}.- {{ $vehicle->activity->evaluation->participant->client->lastName }} {{ $vehicle->activity->evaluation->participant->client->secondLastName }} {{ $vehicle->activity->evaluation->participant->client->name }} {{ $vehicle->activity->evaluation->participant->client->thirdLastName }}.- {{ $vehicle->type }}</option>
                                            @endisset
                                            @isset($vehicles)
                                                @foreach ($vehicles as $vehicle)
                                                    <option value="{{ $vehicle->id }}">{{ $vehicle->activity->evaluation->participant->application->id }}.- {{ $vehicle->activity->evaluation->participant->category->name }}.- {{ $vehicle->activity->evaluation->participant->client->lastName }} {{ $vehicle->activity->evaluation->participant->client->secondLastName }} {{ $vehicle->activity->evaluation->participant->client->name }} {{ $vehicle->activity->evaluation->participant->client->thirdLastName }}.- {{ $vehicle->type }}</option>
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
                                    <label>Tipo de Producto</label>
                                    <select class="custom-select form-control-border" name="type" required>
                                        <option>Diario</option>
                                        <option>Semanal</option>
                                        <option>Mensual</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Buenas</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Buenas" name="well" step=".01" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Regular</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Regular" name="regular" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Mala</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Mala" name="bad" required>
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
