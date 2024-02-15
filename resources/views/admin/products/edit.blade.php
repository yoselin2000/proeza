<div class="modal fade text-dark" id="productEdit{{ $product->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Producto</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Producto" name="name" value="{{ $product->name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Minimo</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Minimo" name="min" value="{{ $product->min }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Maximo</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Maximo" name="max" value="{{ $product->max }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Moneda</label>
                                    <select class="custom-select form-control-border" name="currency" required>
                                        <option>{{ $product->currency }}</option>
                                        <option>Boliviano</option>
                                        <option>Dolar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Interes %</label>
                                    <input type="number" step="any" class="form-control form-control-border" placeholder="Interes %" name="int" value="{{ $product->int }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Seguro %</label>
                                    <input type="number" step="any" class="form-control form-control-border" placeholder="Seguro %" name="seg" value="{{ $product->seg }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Interes Vencido</label>
                                    <input type="text" step="any" class="form-control form-control-border" placeholder="Interes Vencido" name="ven" value="{{ $product->ven }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Interes Penal</label>
                                    <input type="number" step="any" class="form-control form-control-border" placeholder="Interes Penal" name="pen" value="{{ $product->pen }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Interes Deferido</label>
                                    <input type="number" step="any" class="form-control form-control-border" placeholder="Interes Deferido" name="dif" value="{{ $product->dif }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    @if ($product->state)
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
