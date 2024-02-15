<div class="modal fade" id="assignCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('assigns.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Usuarios</label>
                                    <div class="select2-primary">
                                        <select class="select2" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="user_id" required>
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
                                            @foreach ($applications as $application)
                                                @if ($application->debtor())
                                                    <option value="{{ $application->id }}">{{ $application->debtor()->lastName }} {{ $application->debtor()->secondLastName }} {{ $application->debtor()->name }} {{ $application->debtor()->thirdLastName }}</option>
                                                @else
                                                    <option value="{{ $application->id }}">Solicitud sin Deudor</option>
                                                @endif
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
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
