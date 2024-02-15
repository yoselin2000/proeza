<div class="modal fade text-dark" id="familyPassiveEdit{{ $familyPassive->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('family_passives.update', $familyPassive->id) }}" method="POST">
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
                                                <option value="{{ $familyPassive->evaluation->id }}">{{ $familyPassive->evaluation->participant->application->id }}.- {{ $familyPassive->evaluation->participant->category->name }}.- {{ $familyPassive->evaluation->participant->client->lastName }} {{ $familyPassive->evaluation->participant->client->secondLastName }} {{ $familyPassive->evaluation->participant->client->name }} {{ $familyPassive->evaluation->participant->client->thirdLastName }}</option>
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
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="passive_type_id" required>
                                            <option value="{{ $familyPassive->passiveType->id }}">{{ $familyPassive->passiveType->name }}</option>
                                            @foreach ($passiveTypes as $passiveType)
                                                <option value="{{ $passiveType->id }}">{{ $passiveType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Monto</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Monto" name="amount" step="0.001" value="{{ $familyPassive->amount }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Cuota</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Cuota" name="share" value="{{ $familyPassive->share }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Plazo</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Plazo" name="term" value="{{ $familyPassive->term }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Frecuencia</label>
                                    <select class="custom-select form-control-border" name="frecuency" required>
                                        <option>{{ $familyPassive->frecuency }}</option>
                                        <option>Quinsenal</option>
                                        <option>Mensual</option>
                                        <option>Bimensual</option>
                                        <option>Trimestral</option>
                                        <option>Semestral</option>
                                        <option>Anual</option>
                                        <option>Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Destino</label>
                                    <select class="custom-select form-control-border" name="destination" required>
                                        <option>{{ $familyPassive->destination }}</option>
                                        <option>Cap. Inv.</option>
                                        <option>Cap. Op.</option>
                                        <option>Vivienda</option>
                                        <option>Libre Disp./option>
                                        <option>Otras Deudas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo de Garantia</label>
                                    <select class="custom-select form-control-border" name="warranty" required>
                                        <option>{{ $familyPassive->warranty }}</option>
                                        <option>Personal</option>
                                        <option>Prendaria</option>
                                        <option>Hipoteca</option>
                                        <option>Doc. en Custodia</option>
                                        <option>Otros</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Saldo</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Saldo" name="balace" step="0.001" value="{{ $familyPassive->balace }}" required>
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
