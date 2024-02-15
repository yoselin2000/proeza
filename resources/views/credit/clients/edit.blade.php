<div class="modal fade text-dark" id="clientEdit{{ $client->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control form-control-border"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();"
                                    placeholder="Nombres" name="name" value="{{ $client->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Apellido Paterno</label>
                                    <input type="text" class="form-control form-control-border"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();"
                                    placeholder="Apellido Paterno" name="lastName" value="{{ $client->lastName }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Apellido Materno</label>
                                    <input type="text" class="form-control form-control-border"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();"
                                    placeholder="Apellido Materno" name="secondLastName" value="{{ $client->secondLastName }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Apellido de casado</label>
                                    <input type="text" class="form-control form-control-border"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();"
                                    placeholder="Apellido de casado" name="thirdLastName" value="{{ $client->thirdLastName }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select class="custom-select form-control-border" name="gender" required>
                                        <option>{{ $client->gender }}</option>
                                        <option>MASCULINO</option>
                                        <option>FEMENINO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha de nacimiento</label>
                                    <input type="date" class="form-control form-control-border"
                                    placeholder="Fecha de nacimiento" name="birth" value="{{ $client->birth }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nacionalidad</label>
                                    <select class="custom-select form-control-border" name="nacionality" required>
                                        <option>{{ $client->nacionality }}</option>
                                        <option>BOLIVIANO (A)</option>
                                        <option>EXTRANJERO(A)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Documento de Identidad</label>
                                    <select class="custom-select form-control-border" name="identification" required>
                                        <option>{{ $client->identification }}</option>
                                        <option>CARNET DE IDENTIDAD</option>
                                        <option>CARNET DE EXTRANJERO</option>
                                        <option>RUN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>N° de Documento</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="1234567" name="number" value="{{ $client->number }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Complemento</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="1234567" name="complement" value="{{ $client->complement }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Extensión</label>
                                    <select class="custom-select form-control-border" name="extension" required>
                                        <option>{{ $client->extension }}</option>
                                        <option>--</option>
                                        <option>CB</option>
                                        <option>CH</option>
                                        <option>TR</option>
                                        <option>PD</option>
                                        <option>BN</option>
                                        <option>SC</option>
                                        <option>LP</option>
                                        <option>OR</option>
                                        <option>PO</option>
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
