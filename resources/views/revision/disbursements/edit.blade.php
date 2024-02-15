<div class="modal fade text-dark" id="disbursementEdit{{ $disbursement->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('disbursements.update', $disbursement->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Solicitud</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="application_id" required>
                                            <option value="{{ $disbursement->application->id }}">
                                                @if ($disbursement->application->debtor())
                                                    {{ $disbursement->application->id }}.-{{ $disbursement->application->debtor()->lastName }} {{ $disbursement->application->debtor()->secondLastName }} {{ $disbursement->application->debtor()->thirdLastName }} {{ $disbursement->application->debtor()->name }}
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="user_id" required>
                                            <option value="{{ $disbursement->user->id }}">{{ $disbursement->user->name }}</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
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
