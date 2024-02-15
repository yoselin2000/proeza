<div class="modal fade text-dark" id="vehicleCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('vehicles.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Actividad Economica</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="activity_id" required>
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
                                    <label for="name">Tipo</label>
                                    <select class="custom-select form-control-border" placeholder="Tipo" name="type" required>
                                        <option>Cisterna</option>
                                        <option>Tractor</option>
                                        <option>Tractocamion</option>
                                        <option>Automovil</option>
                                        <option>Camioneta</option>
                                        <option>Minibus</option>
                                        <option>Micro</option>
                                        <option>Flota/bus</option>
                                        <option>Trans Plubial</option>
                                        <option>Mototaxi</option>
                                        <option>Camion</option>
                                        <option>Motocicleta</option>
                                        <option>Vagoneta</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Estado</label>
                                    <select class="custom-select form-control-border" placeholder="Estado" name="state" required>
                                        <option>Original</option>
                                        <option>Transformado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Marca</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Marca" name="brand" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Placa</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Placa" name="plate" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Color</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Color" name="color" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Cilindrada</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Cilindrada" name="cylinder" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Combustible</label>
                                    <select class="custom-select form-control-border" placeholder="Combustible" name="fuel" required>
                                        <option>Diesel</option>
                                        <option>Gasolina</option>
                                        <option>Gas Natural</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Año de fabricacion</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Año de fabricacion" name="manufacturing" required>
                                </div>
                            </div>
                           <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">soat</label>
                                    <input type="text" class="form-control form-control-border" placeholder="soat" name="soat" required>
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
