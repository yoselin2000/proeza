<div class="modal fade text-dark" id="accountShow{{ $account->id }}">
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
                <dt class="col-sm-4">Banco</dt>
                <dd class="col-sm-8">
                  {{ $account->name }}
                </dd>
                <dt class="col-sm-4">Numero de Cuenta</dt>
                <dd class="col-sm-8">
                  {{ $account->number }}
                </dd>
                <dt class="col-sm-4">Moneda</dt>
                <dd class="col-sm-8">
                  {{ $account->currency }}
              </dd>
              <dt class="col-sm-4">Sucursal</dt>
              <dd class="col-sm-8">
                {{ $account->agency->name }}
            </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
