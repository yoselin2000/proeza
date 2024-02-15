@if (Auth::user()->hasRole('admin'))
    <div class="modal fade text-dark" id="returnComponentCreate">
@else
    <div class="modal fade text-dark" id="returnComponentCreate{{ $assignment->id }}">
@endif
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('returnComponents.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>De</label>
                                    <select class="custom-select form-control-border" name="assignment_id" required>
                                        @if (Auth::user()->hasRole('admin'))
                                            @foreach ($assignments as $assignment)
                                                <option value="{{ $assignment->id }}">{{ $assignment->assignedToUser->name }}</option>
                                            @endforeach
                                        @else
                                            <option value="{{ $assignment->id }}">{{ $assignment->assignedToUser->name }}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if (Auth::user()->hasRole('admin'))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Para</label>
                                        <select class="custom-select form-control-border" name="assigned_by" required>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Fecha</label>
                                        <input type="date" class="form-control form-control-border" placeholder="Fecha" name="date" required>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-textarea">Descripción</label>
                                    <textarea id="my-textarea" class="form-control form-control-border" name="descripcion" rows="3"></textarea>
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
