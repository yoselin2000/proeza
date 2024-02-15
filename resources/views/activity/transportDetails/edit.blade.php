<div class="modal fade text-dark" id="transportDetailEdit{{ $transportDetail->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('transport_details.update', $transportDetail->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Transporte</label>
                                    <select class="custom-select form-control-border" name="transport_id" required>
                                        <option value="{{ $transportDetail->transport->id }}">{{ $transportDetail->transport->type }}</option>
                                        @isset($transports)
                                            @foreach ($transports as $transport)
                                                <option value="{{ $transport->id }}">{{ $transport->type }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Detalle</label>
                                    <select class="custom-select form-control-border" placeholder="Detalle" name="detail" required>
                                        <option>{{ $transportDetail->detail }}</option>
                                        <option>Bueno</option>
                                        <option>Regular</option>
                                        <option>Malo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Numero de Carga</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Numero de Carga" name="num" value="{{ $transportDetail->num }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Unidad</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Unidad" name="unit" value="{{ $transportDetail->unit }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Numero de viajes</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Numero de viajes" name="number" value="{{ $transportDetail->number }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Frecuencia</label>
                                    <select class="custom-select form-control-border" placeholder="Frecuencia" name="frequency" value="{{ $transportDetail->frequency }}" required>
                                        <option>{{ $transportDetail->frequency }}</option>
                                        <option>Diario</option>
                                        <option>Semanal</option>
                                        <option>Quincenal</option>
                                        <option>Mensual</option>
                                        <option>Bimestral</option>
                                        <option>Trimestral</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Precio</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Precio" name="price" step="0.001" value="{{ $transportDetail->price }}" required>
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
