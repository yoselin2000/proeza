<div class="modal fade text-dark" id="articleEdit{{ $article->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('articles.update', $article->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Actividad Economica</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="activity_id" required>
                                            <option value="{{ $article->activity->id }}">{{ $article->activity->evaluation->participant->application->id }}.- {{ $article->activity->evaluation->participant->category->name }}.- {{ $article->activity->evaluation->participant->client->lastName }} {{ $article->activity->evaluation->participant->client->secondLastName }} {{ $article->activity->evaluation->participant->client->name }} {{ $article->activity->evaluation->participant->client->thirdLastName }}</option>
                                            @isset($activities)
                                                @foreach ($activities as $activity)
                                                    <option value="{{ $activity->id }}">{{ $activity->evaluation->participant->application->id }}.- {{ $activity->evaluation->participant->category->name }}.- {{ $activity->evaluation->participant->client->lastName }} {{ $activity->evaluation->participant->client->secondLastName }} {{ $activity->evaluation->participant->client->name }} {{ $activity->evaluation->participant->client->thirdLastName }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Nombre" name="name" value="{{ $article->name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Rendimiento</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Rendimiento" name="performance" value="{{ $article->performance }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Unidad de produccion</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Unidad de produccion" name="production" value="{{ $article->production }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Precio de Compra</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Precio de Compra" name="buys" step=".01" value="{{ $article->buys }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Precio de Venta</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Precio de Venta" name="sale" step=".01" value="{{ $article->sale }}">
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
