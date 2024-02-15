<div class="modal fade text-dark" id="saleDetailShow{{ $saleDetail->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Producto</dt>
                <dd class="col-sm-8">
                    {{ $saleDetail->inventory->name ?? '' }}
                </dd>
                <dt class="col-sm-4">Articulo</dt>
                <dd class="col-sm-8">
                    {{ $saleDetail->article->name ?? '' }}
                </dd>
                <dt class="col-sm-4">Cantidad</dt>
                <dd class="col-sm-8">
                    {{ $saleDetail->cant }}
                </dd>
                <dt class="col-sm-4">Frecuencia</dt>
                <dd class="col-sm-8">
                    {{ $saleDetail->frecuency }}
                </dd>
                <dt class="col-sm-4">MBP</dt>
                <dd class="col-sm-8">
                    {{ $saleDetail->mbp }}
                </dd>
                <dt class="col-sm-4">Total</dt>
                <dd class="col-sm-8">
                    {{ $saleDetail->total }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>
