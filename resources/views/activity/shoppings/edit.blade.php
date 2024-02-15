<div class="modal fade text-dark" id="shoppingEdit{{ $shopping->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('shoppings.update', $shopping->id) }}" method="POST">
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
                                            <option value="{{ $shopping->activity->id }}">{{ $shopping->activity->evaluation->participant->application->id }}.- {{ $shopping->activity->evaluation->participant->category->name }}.- {{ $shopping->activity->evaluation->participant->client->lastName }} {{ $shopping->activity->evaluation->participant->client->secondLastName }} {{ $shopping->activity->evaluation->participant->client->name }} {{ $shopping->activity->evaluation->participant->client->thirdLastName }}</option>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Producto</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Producto" name="name" value="{{ $shopping->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Cantidad</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Cantidad" name="amount" value="{{ $shopping->amount }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Unidad</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Unidad" name="unit" value="{{ $shopping->unit }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Frecuencia</label>
                                    <select class="custom-select form-control-border" name="frecuency" required>
                                        <option>{{ $shopping->frecuency }}</option>
                                        <option>Diario</option>
                                        <option>Semanal</option>
                                        <option>Quinsenal</option>
                                        <option>Mensual</option>
                                        <option>Bimensula</option>
                                        <option>Trimestral</option>
                                        <option>Semestral</option>
                                        <option>Anual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name">Precio Compra</label>
                                    <input type="number" class="form-control form-control-border" placeholder="Precio Compra" name="buys" step="0.001" value="{{ $shopping->buys }}" required>
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
