<div class="modal fade text-dark" id="productShow{{ $product->id }}">
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
            {{ $product->name }}
          </dd>
          <dt class="col-sm-4">Minimo</dt>
          <dd class="col-sm-8">
              {{ $product->min }}
          </dd>
          <dt class="col-sm-4">Maximo</dt>
          <dd class="col-sm-8">
            {{ $product->max }}
          </dd>
          <dt class="col-sm-4">Moneda</dt>
          <dd class="col-sm-8">
              {{ $product->currency }}
          </dd>
          <dt class="col-sm-4">Interes %</dt>
          <dd class="col-sm-8">
            {{ $product->int }}
          </dd>
          <dt class="col-sm-4">Seguro %</dt>
          <dd class="col-sm-8">
              {{ $product->seg }}
          </dd>
          <dt class="col-sm-4">Interes Vencido</dt>
          <dd class="col-sm-8">
              {{ $product->ven }}
          </dd>
          <dt class="col-sm-4">Interes Penal</dt>
          <dd class="col-sm-8">
              {{ $product->pen }}
          </dd>
          <dt class="col-sm-4">Interes Deferido</dt>
          <dd class="col-sm-8">
              {{ $product->dif }}
          </dd>
        </dl>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
