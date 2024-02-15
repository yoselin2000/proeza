<div class="modal fade text-dark" id="elementComponentShow{{ $elementComponent->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Articulos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-4">Sucursal</dt>
                    <dd class="col-sm-8">
                        {{ $elementComponent->agency->name}}
                    </dd>
                    <dt class="col-sm-4">Categoria</dt>
                    <dd class="col-sm-8">
                        {{ $elementComponent->companyElement->elementCategory->name}}
                    </dd>
                    <dt class="col-sm-4">Articulo</dt>
                    <dd class="col-sm-8">
                        {{ $elementComponent->companyElement->name}}
                    </dd>
                    <dt class="col-sm-4">Marca</dt>
                    <dd class="col-sm-8">
                        {{ $elementComponent->brand }}
                    </dd>
                    <dt class="col-sm-4">Modelo</dt>
                    <dd class="col-sm-8">
                        {{ $elementComponent->model }}
                    </dd>
                    <dt class="col-sm-4">SN</dt>
                    <dd class="col-sm-8">
                        {{ $elementComponent->SN }}
                    </dd>
                    <dt class="col-sm-4">Descripcion</dt>
                    <dd class="col-sm-8">
                        {{ $elementComponent->description }}
                    </dd>
                </dl>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
