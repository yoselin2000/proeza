<div class="modal fade text-dark" id="safeEdit{{ $safe->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('safes.update', $safe->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Nombre" name="name" value="{{ $safe->name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sucursal</label>
                                    <select class="custom-select form-control-border" name="agency_id" required>
                                        <option value="{{ $safe->agency->id }}">{{ $safe->agency->name }}</option>
                                        @foreach ($agencies as $agency)
                                            <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    @if ($safe->state)
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>