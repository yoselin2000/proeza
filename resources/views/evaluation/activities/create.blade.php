<div class="modal fade text-dark" id="activityCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('activities.store') }}" method="POST">
                {{ csrf_field() }}
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
                                    <label>Actividad Economica</label>
                                    <select class="custom-select form-control-border" name="form" required>
                                        <option>Comercio</option>
                                        <option>Servicio</option>
                                        <option>Produccion</option>
                                        <option>Transporte</option>
                                        <option>Dependiente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Caedec</label>
                                    <div class="select2-primary">
                                      <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="caedec_id" required>
                                        @foreach ($caedecs as $caedec)
                                            <option value="{{ $caedec->id }}">{{ $caedec->code }}.- {{ $caedec->heading }}.- {{ $caedec->description }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Actividad Especifica</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="Actividad Especifica" name="specific" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Profesion/Ocupacion</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="Profesion/Ocupación" name="profession" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Realizada por</label>
                                    <select class="custom-select form-control-border" name="responsable" required>
                                        <option>Cliente</option>
                                        <option>Conyuge</option>
                                        <option>Ambos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Experiencia en el Rubro (meses)</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Experiencia en el Rubr" name="experience" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Antiguedad del Negocio (meses)</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Antiguedad del Negocio" name="antiquity" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Propiedad del puesto y/o Lugar</label>
                                    <select class="custom-select form-control-border" name="property" required>
                                        <option>Propio</option>
                                        <option>Alquiles</option>
                                        <option>Anticretico</option>
                                        <option>Familiar</option>
                                        <option>Prestado</option>
                                        <option>Ambulante</option>
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
