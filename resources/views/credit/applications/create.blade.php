<div class="modal fade text-dark" id="applicationCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('applications.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Monto</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Monto" name="amount" step="0.001" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Plazo</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Plazo" name="term" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipo de Couta</label>
                                    <select class="custom-select form-control-border" name="feeType" required>
                                        <option>Francés(Couta Fija)</option>
                                        <option>Alemám(Couta Variable)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Frecuencia</label>
                                    <select class="custom-select form-control-border" name="frequency" required>
                                        <option>Mensual</option>
                                        <option>Bimestral</option>
                                        <option>Trimestral</option>
                                        <option>Cuatrimestral</option>
                                        <option>Semestral</option>
                                        <option>Anual</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Monto Cuota</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Monto Posible" name="choose" step="0.001" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tipo de Operación</label>
                                    <select class="custom-select form-control-border" name="operation" required>
                                        <option value="Nuevo">Nuevo</option>
                                        <option value="Paralelo">Paralelo</option>
                                        <option value="Represtamo">Represtamo</option>
                                        <option value="Refinanciamiento">Refinanciamiento</option>
                                        <option value="Reprogramación">Reprogramación</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Secuencia</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Secuencia" name="sequence" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Destino</label>
                                    <select class="custom-select form-control-border" name="destination_id" required>
                                        @foreach ($destinations as $destination)
                                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Destino Especifico</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Destino Especifico" name="specific" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Producto</label>
                                    <select class="custom-select form-control-border" name="product_id" required>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}.- {{ $product->min }}-{{ $product->max }}.- {{ $product->currency }}.- {{ $product->int }}% anual</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Usuarios</label>
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
