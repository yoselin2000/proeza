<div class="modal fade text-dark" id="agencyShow{{ $agency->id }}">
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
                <dt class="col-sm-4">Nombre</dt>
                <dd class="col-sm-8">
                    {{ $agency->name }}
                </dd>
                <dt class="col-sm-4">Codigo</dt>
                <dd class="col-sm-8">
                    {{ $agency->code }}
                </dd>
                <dt class="col-sm-4">Departamento</dt>
                <dd class="col-sm-8">
                    {{ $agency->city->name }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
