<div class="modal fade text-dark" id="userEdit{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
            {{ csrf_field() }}
            {{ @method_field('PUT') }}
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control form-control-border" placeholder="Nombre" name="name" value="{{ $user->name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Correo</label>
                                <input type="text" class="form-control form-control-border" placeholder="Correo" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Contraseña</label>
                                <input type="text" class="form-control form-control-border" placeholder="Contraseña" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Confirmar Contraseña</label>
                                <input type="text" class="form-control form-control-border" placeholder="Confirmar contraseña" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Rango de revisión</label>
                                <div class="select2-primary">
                                    <select class="select2" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="range_id" required>
                                        <option value="{{ $user->range->id }}">{{ $user->range->type }}: {{ $user->range->min }} - {{ $user->range->max }}</option>
                                        @foreach ($ranges as $range)
                                            <option value="{{ $range->id }}">{{ $range->type }}: {{ $range->min }} - {{ $range->max }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Rol</label>
                                @foreach ($roles as $role)
                                    @if ($user->hasRole($role->name))
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="role[]"  value="{{ $role->name }}" checked>
                                            <label class="form-check-label">{{ $role->name }}</label>
                                        </div>
                                    @else
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->name }}" >
                                            <label class="form-check-label">{{ $role->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Agencia</label>
                                <div class="select2-primary">
                                    <select class="select2" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="agency_id" required>
                                        <option value="{{ $user->agency->id }}">{{ $user->agency->name }}</option>
                                        @foreach ($agencies as $agency)
                                            <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                @if ($user->state)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="state" value="1" checked>
                                        <label class="form-check-label">Activo</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="state" value="0">
                                        <label class="form-check-label">Inactivo</label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="state" value="1">
                                        <label class="form-check-label">Activo</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="state" value="0" checked>
                                        <label class="form-check-label">Inactivo</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"  onclick="cerraModalEditUser()">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            </form>
        </div>
    </div>
</div>
