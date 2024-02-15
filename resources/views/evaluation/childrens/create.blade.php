<div class="modal fade text-dark" id="childrenCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('childrens.store') }}" method="POST">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <select class="custom-select form-control-border" name="state" required>
                                        <option>Dependiente</option>
                                        <option>Independiente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Edad</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Edad" name="age" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select class="custom-select form-control-border" name="gender" required>
                                        <option>Femenino</option>
                                        <option>Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Estudia</label>
                                    <select class="custom-select form-control-border" name="student" required>
                                        <option>Si</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Donde</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Donde" name="place" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipo de Entidad</label>
                                    <select class="custom-select form-control-border" name="type" required>
                                        <option value="Nuevo">Fiscal</option>
                                        <option value="Paralelo">Particular</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Otras Actividades</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Otras Actividades" name="other" required>
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
