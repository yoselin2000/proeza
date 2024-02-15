@isset($article)
    <div class="modal fade text-dark" id="supplyCreate{{ $article->id }}">
@endisset
@isset($articles)
    <div class="modal fade text-dark" id="supplyCreate">
@endisset
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('supplies.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Articulo</label>
                                    <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="article_id" required>
                                        @isset($article)
                                            <option value="{{ $article->id }}">{{ $article->name }}</option>
                                        @endisset
                                        @isset($articles)
                                            @foreach ($articles as $article)
                                                <option value="{{ $article->id }}">{{ $article->name }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Insumo</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Insumo" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Cantidad</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Cantidad" name="cant" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Unidad</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Unidad" name="unit" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Rendimiento</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Rendimiento" name="performance" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Precio unitario</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Precio unitario" name="price" step="0.001" required>
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
