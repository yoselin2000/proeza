@isset($user)
    <div class="modal fade text-dark" id="observedCreate{{ $application->id }}">
@endisset
@isset($users)
    <div class="modal fade text-dark" id="observedCreate">
@endisset
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('observeds.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Solicitud</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="application_id" required>
                                            @isset($user)
                                                <option value="{{ $application->id }}">
                                                    @if ($application->debtor())
                                                        {{ $application->id }}.-{{ $application->debtor()->lastName }} {{ $application->debtor()->secondLastName }} {{ $application->debtor()->thirdLastName }} {{ $application->debtor()->name }}
                                                    @else
                                                        {{ $application->id }}.-Sin Deudor
                                                    @endif
                                                </option>
                                            @endisset
                                            @isset($users)
                                                @foreach ($applications as $application)
                                                    <option value="{{ $application->id }}">
                                                        @if ($application->debtor())
                                                            {{ $application->id }}.-{{ $application->debtor()->lastName }} {{ $application->debtor()->secondLastName }} {{ $application->debtor()->thirdLastName }} {{ $application->debtor()->name }}
                                                        @else
                                                            {{ $application->id }}.-Sin Deudor
                                                        @endif
                                                    </option>
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
                                    <label>Usuario</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="user_id" required>
                                            @isset($user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endisset
                                            @isset($users)
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                                    <label for="my-textarea">Descripcion</label>
                                    <textarea id="my-textarea" class="form-control" name="description" rows="3" required></textarea>
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
