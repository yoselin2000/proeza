<div class="modal fade" id="assignEdit{{ $assign->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('assigns.update', $assign->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Usuarios</label>
                                    <div class="select2-primary">
                                        <select class="select2" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="user_id" required>
                                            <option value="{{ $assign->user->id }}">{{ $assign->user->name }}</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Solicitud</label>
                                    <div class="select2-primary">
                                        <select class="select2" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="application_id" required>
                                            <option value="{{ $assign->application->id }}">
                                                @if ($assign->application->debtor())
                                                    {{ $assign->application->id }}.-{{ $assign->application->debtor()->lastName }} {{ $assign->application->debtor()->secondLastName }} {{ $assign->application->debtor()->thirdLastName }} {{ $assign->application->debtor()->name }}
                                                @else
                                                    Solicitud sin Deudor
                                                @endif
                                            </option>
                                            @foreach ($applications as $application)
                                                <option value="{{ $application->id }}">
                                                    @if ($application->debtor())
                                                        {{ $application->id }}.-{{ $application->debtor()->lastName }} {{ $application->debtor()->secondLastName }} {{ $application->debtor()->thirdLastName }} {{ $application->debtor()->name }}
                                                    @else
                                                        {{ $application->id }}.-Solicitud sin Deudor
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
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
