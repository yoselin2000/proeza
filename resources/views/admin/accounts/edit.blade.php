<div class="modal fade text-dark" id="accountEdit{{ $account->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('accounts.update', $account->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banco</label>
                                    <select class="custom-select form-control-border" name="name" required>
                                        <option>{{ $account->name }}</option>
                                        <option>BNB Banco Nacional de Bolivia S.A.</option>
                                        <option>BME Banco Mercantil Santa Cruz S.A.</option>
                                        <option>BIS Banco Bisa S.A.</option>
                                        <option>BCR Banco de Crédito de Bolivia S.A.</option>
                                        <option>BEC Banco Económico S.A.</option>
                                        <option>BGA Banco Ganadero S.A.</option>
                                        <option>BSO Banco Solidario S.A.</option>
                                        <option>BNA Banco de la Nación Argentina</option>
                                        <option>BIE Banco para el Fomento a Iniciativas Económicas S.A.</option>
                                        <option>BFO Banco Fortaleza S.A.</option>
                                        <option>BPR Banco Prodem S.A.</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Numero de Cuenta</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Numero de Cuenta" name="number" value="{{ $account->number }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Moneda</label>
                                    <select class="custom-select form-control-border" name="currency" value="{{ $account->number }}" required>
                                        <option>Bolivianos</option>
                                        <option>Dolares</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sucursal</label>
                                    <select class="custom-select form-control-border" name="agency_id" required>
                                        <option value="{{ $account->agency->id }}">{{ $account->agency->name }}</option>
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
                                    @if ($account->state)
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
