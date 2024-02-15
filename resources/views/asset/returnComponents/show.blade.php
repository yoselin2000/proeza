<div class="modal fade text-dark" id="returnComponentShow{{ $returnComponent->id }}">
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
                <dt class="col-sm-4">Asignado</dt>
                <dd class="col-sm-8">
                    {{ $returnComponent->assignedToUser->name }}
                </dd>
                <dt class="col-sm-4">Activo</dt>
                <dd class="col-sm-8">
                    @foreach ($returnComponent->assignment->elementComponents as $elementComponent)
                        <li>{{ $elementComponent->companyElement->name }}</li>
                    @endforeach
                </dd>
                <dt class="col-sm-4">Fecha</dt>
                <dd class="col-sm-8">
                    {{ $returnComponent->date }}
                </dd>
                <dt class="col-sm-4">Descripcion</dt>
                <dd class="col-sm-8">
                    {{ $returnComponent->descripcion }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
