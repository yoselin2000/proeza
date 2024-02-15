<div class="modal fade text-dark" id="rejectedShow{{ $rejected->id }}">
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
                  @if ($rejected->application->debtor())
                      {{ $rejected->application->debtor()->lastName }} {{ $rejected->application->debtor()->secondLastName }} {{ $rejected->application->debtor()->name }} {{ $rejected->application->debtor()->thirdLastName }}
                  @else
                      Solicitud sin Deudor
                  @endif
              </dd>
                <dt class="col-sm-4">Nombre de Asesor</dt>
                <dd class="col-sm-8">
                    {{ $rejected->application->user->name }}
                </dd>
                <dt class="col-sm-4">Nombre de Encargado</dt>
                <dd class="col-sm-8">
                    {{ $rejected->user->name }}
                </dd>
                <dt class="col-sm-4">Descripcion</dt>
                <dd class="col-sm-8">
                    {{ $rejected->description }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
