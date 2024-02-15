<div class="modal fade text-dark" id="observedEdit{{ $observed->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('observeds.update', $observed->id) }}" method="POST">
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
                                            <option value="{{ $observed->application->id }}">
                                                @if ($observed->application->debtor())
                                                    {{ $observed->application->id }}.-{{ $observed->application->debtor()->lastName }} {{ $observed->application->debtor()->secondLastName }} {{ $observed->application->debtor()->thirdLastName }} {{ $observed->application->debtor()->name }}
                                                @else
                                                    {{ $observed->application->id }}.-Sin Deudor
                                                @endif
                                            </option>
                                            @foreach ($applications as $application)
                                                <option value="{{ $application->id }}">
                                                    @if ($application->debtor())
                                                        {{ $application->id }}.-{{ $application->debtor()->lastName }} {{ $application->debtor()->secondLastName }} {{ $application->debtor()->thirdLastName }} {{ $application->debtor()->name }}
                                                    @else
                                                    {{ $application->id }}.-Sin Deudor
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
                                            <option value="{{ $observed->user->id }}">{{ $observed->user->name }}</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-textarea">Descripcion</label>
                                    <textarea id="my-textarea" class="form-control" name="description" rows="3" required>{{ $observed->description }}</textarea>
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
