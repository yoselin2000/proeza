<div class="modal fade text-dark" id="approvedShow{{ $approved->id }}">
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
                <dt class="col-sm-4">Nombre de cliente</dt>
                <dd class="col-sm-8">
                  @if ($approved->application->debtor())
                      {{ $approved->application->debtor()->lastName }} {{ $approved->application->debtor()->secondLastName }} {{ $approved->application->debtor()->name }} {{ $approved->application->debtor()->thirdLastName }}
                  @else
                      Solicitud sin Deudor
                  @endif
              </dd>
                <dt class="col-sm-4">Nombre de Asesor</dt>
                <dd class="col-sm-8">
                    {{ $approved->application->user->name }}
                </dd>
                <dt class="col-sm-4">Nombre de Encargado</dt>
                <dd class="col-sm-8">
                    {{ $approved->user->name }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
