<div class="modal fade text-dark" id="evaluationPassiveEdit{{ $evaluationPassive->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('evaluation_passives.update', $evaluationPassive->id) }}" method="POST">
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
                                                <option value="{{ $evaluationPassive->evaluation->id }}">{{ $evaluationPassive->evaluation->participant->application->id }}.- {{ $evaluationPassive->evaluation->participant->category->name }}.- {{ $evaluationPassive->evaluation->participant->client->lastName }} {{ $evaluationPassive->evaluation->participant->client->secondLastName }} {{ $evaluationPassive->evaluation->participant->client->name }} {{ $evaluationPassive->evaluation->participant->client->thirdLastName }}</option>
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
                                            <option value="{{ $evaluationPassive->passiveType->id }}">{{ $evaluationPassive->passiveType->name }}</option>
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
                                    <label for="name">Cuota Mensual</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Cuota Mensual " name="share" value="{{ $evaluationPassive->share }}" step=".01" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Saldo Deudor</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Saldo Deudor " name="balace" value="{{ $evaluationPassive->balace }}" step=".01" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Fecha de Vencimiento</label>
                                    <input type="date" class="form-control form-control-border"
                                    placeholder="Fecha de Vencimiento " name="coming" value="{{ $evaluationPassive->coming }}" required>
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
