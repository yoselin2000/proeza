<div class="modal fade text-dark" id="childrenEdit{{ $children->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('childrens.update', $children->id) }}" method="POST">
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
                                                <option value="{{ $children->evaluation->id }}">{{ $children->evaluation->participant->application->id }}.- {{ $children->evaluation->participant->category->name }}.- {{ $children->evaluation->participant->client->lastName }} {{ $children->evaluation->participant->client->secondLastName }} {{ $children->evaluation->participant->client->name }} {{ $children->evaluation->participant->client->thirdLastName }}</option>
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
                                        <option>{{ $children->state }}</option>
                                        <option>Dependiente</option>
                                        <option>Independiente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Edad</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Edad" name="age" value="{{ $children->age }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select class="custom-select form-control-border" name="gender" required>
                                        <option>{{ $children->gender }}</option>
                                        <option>Femenino</option>
                                        <option>Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Estudia</label>
                                    <select class="custom-select form-control-border" name="student" required>
                                        <option>{{ $children->student }}</option>
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
                                    <input type="text" class="form-control form-control-border" placeholder="Donde" name="place" value="{{ $children->place }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipo de Entidad</label>
                                    <select class="custom-select form-control-border" name="type" required>
                                        <option>{{ $children->type }}</option>
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
                                    <input type="text" class="form-control form-control-border" placeholder="Otras Actividades" name="other" value="{{ $children->other }}" required>
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
