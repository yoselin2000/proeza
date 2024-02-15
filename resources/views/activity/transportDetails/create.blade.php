@isset($transport)
    <div class="modal fade text-dark" id="transportDetailCreate{{ $transport->id }}">
@endisset
@isset($transports)
    <div class="modal fade text-dark" id="transportDetailCreate">
@endisset
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('transport_details.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Transporte</label>
                                    <select class="custom-select form-control-border" name="transport_id" required>
                                        @isset($transport)
                                            <option value="{{ $transport->id }}">{{ $transport->type }}</option>
                                        @endisset
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
                                    <input type="number" class="form-control form-control-border" placeholder="Numero de Carga" name="num" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Unidad</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Unidad" name="unit" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Numero de viajes</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Numero de viajes" name="number" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Frecuencia</label>
                                    <select class="custom-select form-control-border" placeholder="Frecuencia" name="frequency" required>
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
                                    <input type="number" class="form-control form-control-border" placeholder="Precio" name="price" step="0.001" required>
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
