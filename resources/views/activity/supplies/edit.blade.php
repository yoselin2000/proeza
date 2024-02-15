<div class="modal fade text-dark" id="supplyEdit{{ $supply->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('supplies.update', $supply->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Articulo</label>
                                    <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="article_id" required>
                                        <option value="{{ $supply->article->id }}">{{ $supply->article->activity->evaluation->participant->application->id }}.- {{ $supply->article->activity->evaluation->participant->category->name }}.- {{ $supply->article->activity->evaluation->participant->client->lastName }} {{ $supply->article->activity->evaluation->participant->client->secondLastName }} {{ $supply->article->activity->evaluation->participant->client->name }} {{ $supply->article->activity->evaluation->participant->client->thirdLastName }}</option>
                                        @isset($articles)
                                            @foreach ($articles as $article)
                                                <option value="{{ $article->id }}">{{ $article->activity->evaluation->participant->application->id }}.- {{ $article->activity->evaluation->participant->category->name }}.- {{ $article->activity->evaluation->participant->client->lastName }} {{ $article->activity->evaluation->participant->client->secondLastName }} {{ $article->activity->evaluation->participant->client->name }} {{ $article->activity->evaluation->participant->client->thirdLastName }}</option>
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
                                    <input type="text" class="form-control form-control-border" placeholder="Insumo" name="name"  value="{{ $supply->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Cantidad</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Cantidad" name="cant" value="{{ $supply->cant }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Unidad</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Unidad" name="unit" value="{{ $supply->unit }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Rendimiento</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Rendimiento" name="performance" value="{{ $supply->performance }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Precio unitario</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Precio unitario" name="price" step="0.001" value="{{ $supply->price }}" required>
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
