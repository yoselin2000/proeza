<div class="modal fade text-dark" id="elementComponentEdit{{ $elementComponent->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('elementComponents.update', $elementComponent->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sucursal</label>
                                    <select class="custom-select form-control-border" name="agency_id" required>
                                        <option value="{{ $elementComponent->agency->id }}">{{ $elementComponent->agency->name }}</option>
                                        @foreach ($agencies as $agency)
                                            <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="element_category_id" required>
                                            <option value="{{ $elementComponent->companyElement->elementCategory->id }}">{{ $elementComponent->companyElement->elementCategory->name }}</option>
                                            @foreach ($elementCategories as $elementCategory)
                                                <option value="{{ $elementCategory->id }}">{{ $elementCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Articulo</label>
                                    <div class="select2-primary">
                                        <select class="select2 form-control-border" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="company_element_id" required>
                                            <option value="{{ $elementComponent->companyElement->id }}">{{ $elementComponent->companyElement->name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Marca</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Marca" name="brand" value="{{ $elementComponent->brand }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Modelo</label>
                                    <input type="text" class="form-control form-control-border" placeholder="Modelo" name="model" value="{{ $elementComponent->model }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">SN</label>
                                    <input type="text" class="form-control form-control-border" placeholder="SN" name="SN" value="{{ $elementComponent->SN }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-textarea">Descripción</label>
                                    <textarea id="my-textarea" class="form-control form-control-border"
                                    name="description" rows="3">{{ $elementComponent->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="state">Estado</label>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="state" value="1" {{ $elementComponent->state == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label">Libre</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="state" value="0" {{ $elementComponent->state == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label">Ocupado</label>
                                    </div>
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
