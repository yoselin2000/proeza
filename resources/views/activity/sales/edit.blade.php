<div class="modal fade text-dark" id="saleEdit{{ $sale->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Actividad Economica</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="average_sale_id" required>
                                            <option value="{{ $sale->averageSale->id }}">{{ $sale->averageSale->activity->evaluation->participant->application->id }}.- {{ $sale->averageSale->activity->evaluation->participant->category->name }}.- {{ $sale->averageSale->activity->evaluation->participant->client->lastName }} {{ $sale->averageSale->activity->evaluation->participant->client->secondLastName }} {{ $sale->averageSale->activity->evaluation->participant->client->name }} {{ $sale->averageSale->activity->evaluation->participant->client->thirdLastName }}</option>
                                            @isset($averageSales)
                                                @foreach ($averageSales as $averageSale)
                                                    <option value="{{ $averageSale->id }}">{{ $averageSale->activity->evaluation->participant->application->id }}.- {{ $averageSale->activity->evaluation->participant->category->name }}.- {{ $averageSale->activity->evaluation->participant->client->lastName }} {{ $averageSale->activity->evaluation->participant->client->secondLastName }} {{ $averageSale->activity->evaluation->participant->client->name }} {{ $averageSale->activity->evaluation->participant->client->thirdLastName }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                            <input type="text" class="form-control form-control-border" name="item" placeholder="Lunes, Semana 1, Enero" value="{{ $sale->item }}">
                            </div>
                            <div class="col-md-4">
                            <input type="number" name="amount" class="form-control form-control-border" value="{{ $sale->amount }}">
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
