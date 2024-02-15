<div class="modal fade text-dark" id="returnComponentEdit{{ $returnComponent->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('returnComponents.update', $returnComponent->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>De</label>
                                    <select class="custom-select form-control-border" name="assignment_id" required>
                                        <option value="{{ $returnComponent->assignment->id }}">{{ $returnComponent->assignment->assignedToUser->name  }}</option>
                                        @foreach ($assignments as $assignment)
                                            <option value="{{ $assignment->id }}">{{  $assignment->assignedToUser->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Para</label>
                                    <select class="custom-select form-control-border" name="assigned_by" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if($user->id == $returnComponent->assigned_by) selected @endif>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Fecha</label>
                                    <input type="date" class="form-control form-control-border" placeholder="Fecha" name="date" value="{{ $returnComponent->date }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-textarea">Descripción</label>
                                    <textarea id="my-textarea" class="form-control form-control-border"
                                    name="descripcion" rows="3">{{ $returnComponent->descripcion }}</textarea>
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
