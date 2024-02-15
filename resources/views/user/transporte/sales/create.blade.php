@isset($averageSale)
    <div class="modal fade text-dark" id="saleCreate{{ $averageSale->id }}">
@endisset
@isset($averageSales)
    <div class="modal fade text-dark" id="saleCreate">
@endisset
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sales.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ventas</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="average_sale_id" required>
                                            @isset($averageSale)
                                                <option value="{{ $averageSale->id }}">{{ $averageSale->type }}</option>
                                            @endisset
                                            @isset($averageSales)
                                                @foreach ($averageSales as $averageSale)
                                                    <option value="{{ $averageSale->id }}">{{ $averageSale->type }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @isset($averageSale)
                            @if ($averageSale->type == 'Diario')
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Lunes" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Martes" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Miercoles" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Jueves" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Viernes" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Sabado" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Domingo" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @elseif($averageSale->type == 'Semanal')
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Semana 1" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Semana 2" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Semana 3" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Semana 4" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @elseif($averageSale->type == 'Mensual')
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Enero" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Febrero" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Marzo" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Abril" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Mayo" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Junio" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Julio" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Agosto" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Septiembre" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Octubre" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Noviembre" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control form-control-border" name="item[]" value="Diciembre" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" name="amount[]">
                                                <option></option>
                                                <option>{{ $averageSale->well }}</option>
                                                <option>{{ $averageSale->regular }}</option>
                                                <option>{{ $averageSale->bad }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @else
                            @endif
                        @endisset

                        @isset($averageSales)
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-border" name="item" placeholder="Lunes, Semana 1, Enero">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="amount" class="form-control form-control-border">
                                </div>
                            </div>
                        @endisset
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
