<div class="modal fade text-dark" id="inventoryEdit{{ $inventory->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
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
                                            <option value="{{ $inventory->activity->id }}">{{ $inventory->activity->evaluation->participant->application->id }}.- {{ $inventory->activity->evaluation->participant->category->name }}.- {{ $inventory->activity->evaluation->participant->client->lastName }} {{ $inventory->activity->evaluation->participant->client->secondLastName }} {{ $inventory->activity->evaluation->participant->client->name }} {{ $inventory->activity->evaluation->participant->client->thirdLastName }}</option>
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
                                    <label>Tipo de Producto</label>
                                    <select class="custom-select form-control-border" name="type" required>
                                        <option>{{ $inventory->type }}</option>
                                        {{-- <option>MP</option>
                                        <option>PP</option> --}}
                                        <option>PT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Cantidad</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Cantidad " name="amount" step=".01" value="{{ $inventory->amount }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Unidad</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="UNIDAD " name="unit" value="{{ $inventory->unit }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Producto</label>
                                    <input type="text" class="form-control form-control-border"
                                    placeholder="Producto " name="name" value="{{ $inventory->name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Precio de Compra</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Precio de Compra" name="buys" step=".01" value="{{ $inventory->buys }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Precio de Venta</label>
                                    <input type="number" class="form-control form-control-border"
                                    placeholder="Precio de Venta" name="sale" step=".01" value="{{ $inventory->sale }}">
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
